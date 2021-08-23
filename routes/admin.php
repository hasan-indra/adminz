<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserProfileController;
use App\Http\Controllers\Admin\UserPasswordController;

Route::get(Admin::generateAdminUrl('profile-user'), [UserProfileController::class, 'profile'])
    ->middleware('auth')
    ->name('profile');

Route::post(Admin::generateAdminUrl('profile-user'), [UserProfileController::class, 'updateProfile'])
    ->middleware('auth');

Route::get(Admin::generateAdminUrl('password-user'), [UserPasswordController::class, 'password'])
    ->middleware('auth')
    ->name('password.user');

Route::post(Admin::generateAdminUrl('password-user'), [UserPasswordController::class, 'updatePassword'])
    ->middleware('auth');

Route::post(Admin::generateAdminUrl('profile'), [UserProfileController::class, 'updateProfile'])
    ->middleware('auth');

// dashboard
Route::get(Admin::generateAdminUrl(env('APP_DASHBOARD')), function () {
    return view('admin');
})->middleware(['auth'])->name(env('APP_DASHBOARD'));

// generated admin menu
foreach (config('menus') as $slug => $menu) {

    if ($menu['view'] !== "") {
        Route::get(Admin::generateAdminUrl($slug), function () use ($menu) {
            return view($menu['view']);
        })->middleware(['auth'])->name($slug);
    }

    foreach ($menu["children"] as $childSlug => $childMenu) {
        Route::get(Admin::generateAdminUrl($childSlug), function () use ($childMenu) {
            return view($childMenu['view']);
        })->middleware(['auth', 'access'])->name($childSlug);
    }
}
