<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share navbar and footer views with all views
        View::composer('*', function ($view) {
            // Default views for guests
            $navbarView = 'layouts.navigations.navbar-guest';
            $footerView = 'layouts.footer.footer-guest-customer';

            // Check if a user is logged in
            if (Auth::check()) {
                $user = Auth::user();


                if ($user->hasRole('superadmin')) {
                    $navbarView = 'layouts.navigations.navbar-superadmin';
                    $footerView = 'layouts.footer.footer-admin-superadmin';
                } elseif ($user->hasRole('admin')) {
                    $navbarView = 'layouts.navigations.navbar-admin';
                    $footerView = 'layouts.footer.footer-admin-superadmin';
                } elseif ($user->hasRole('customer')) {
                    $navbarView = 'layouts.navigations.navbar-customer';
                    // The default footer is already correct for customers
                }
            }

            // Share the determined view names with the view
            $view->with('navbarView', $navbarView)->with('footerView', $footerView);
        });
    }
}
