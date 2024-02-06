<?php

use App\Http\Controllers\Api\User\Content\ContentController;
use App\Http\Controllers\Api\User\Notification\NotificationController;
use App\Http\Controllers\Api\User\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(["prefix" => "v1"], function () {

    // Users
    Route::group(["prefix" => "user"], function () {

        Route::controller(AuthController::class)->group(function () {
            Route::post("register", "register");
            Route::post("login", "login");
            Route::post("verify-otp", "verifyOtp");
            Route::post("resend-otp", "resendOtp");
            Route::post("forgot-password", "forgotPassword");
            Route::post("reset-password", "resetPassword");

            Route::group(['prefix' => 'social'], function() {
                Route::post('/google', "googleAuth");
                Route::post('/facebook', "facebookAuth");
                Route::post('/apple', "appleAuth");
            });

            Route::middleware(["auth:api"])->group(function () {
                Route::get("getProfile", "getProfile");
                Route::patch("update-profile", "updateProfile");
                Route::post("update-password", "updatePassword");
                Route::delete("delete-account", "deleteAccount");
                Route::post("saveUserDeviceToken", "saveUserDeviceToken");
                Route::post("logout", "logout");
            });
        });

        // Notifications
        Route::controller(NotificationController::class)->prefix("notifications")->middleware(["auth:api"])->group(function () {
            
            Route::get("/", "index");
            Route::post("/notificationRead", "notificationRead");
            Route::delete("/notificationDelete", "notificationDelete");
        });

        // Contents
        Route::get('/contents', ContentController::class);
    });

});

Route::fallback(
    function (Request $request) {
        if ($request->is("api/*")) {
            return response()->json(["message" => "Not Found."], 404);
        }
    }
);