<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use Illuminate\Support\Facades\RateLimiter;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Contracts\RegisterResponse;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // The register method should be kept clean for simple container bindings.
        // All application bootstrapping and configuration logic goes in boot().
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // --- FORTIFY ACTION BINDINGS ---
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        // --- FORTIFY VIEW BINDINGS ---
        Fortify::loginView(fn() => view('auth.login'));
        Fortify::registerView(fn() => view('auth.register'));
        Fortify::requestPasswordResetLinkView(fn() => view('auth.forgot-password'));
        Fortify::resetPasswordView(fn(Request $request) => view('auth.reset-password', ['request' => $request]));
        Fortify::verifyEmailView(fn() => view('auth.verify-email'));

        // --- RATE LIMITING ---
        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())) . '|' . $request->ip());
            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        // --- CUSTOM RESPONSE BINDINGS (The Fix) ---

        // ! FIX: Switched from singleton() to instance() because we are binding an
        // ! already-created object. This is the best practice and clears the IDE warning.

        // ! for custom redirect after logout
        $this->app->instance(LogoutResponse::class, new class implements LogoutResponse
        {
            public function toResponse($request)
            {
                return redirect()->route('home');
            }
        });

        // ! for custom redirect after login
        $this->app->instance(LoginResponse::class, new class implements LoginResponse
        {
            public function toResponse($request)
            {
                $user = $request->user();
                Log::info('Custom login redirect triggered', ['roles' => $user->getRoleNames()]);

                if ($user->hasRole('superadmin')) {
                    return redirect()->route('superadmin.dashboard');
                } elseif ($user->hasRole('admin')) {
                    return redirect()->route('admin.dashboard');
                }

                return redirect()->route('customer.welcome');
            }
        });

        // ! for custom redirect after registration
        $this->app->instance(RegisterResponse::class, new class implements RegisterResponse
        {
            public function toResponse($request)
            {
                return redirect()->route('customer.welcome');
            }
        });





        // RateLimiter::for('login', function (Request $request) {
        //     $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())) . '|' . $request->ip());

        //     return Limit::perMinute(5)->by($throttleKey);
        // });

        // RateLimiter::for('two-factor', function (Request $request) {
        //     return Limit::perMinute(5)->by($request->session()->get('login.id'));
        // });


        // Fortify::loginView(function () {
        //     return view('auth.login');
        // });


        // Fortify::authenticateUsing(function (Request $request) {
        //     $user = User::where('email', $request->email)->first();

        //     if (
        //         $user &&
        //         Hash::check($request->password, $user->password)
        //     ) {
        //         return $user;
        //     }
        // });

        // Fortify::requestPasswordResetLinkView(function () {
        //     return view('auth.forgot-password');
        // });

        // Fortify::resetPasswordView(function (Request $request) {
        //     return view('auth.reset-password', ['request' => $request]);
        // });


        // Fortify::registerView(function () {
        //     return view('auth.register');
        // });

        // Fortify::verifyEmailView(function () {
        //     return view('auth.verify-email');
        // });
    }
}
