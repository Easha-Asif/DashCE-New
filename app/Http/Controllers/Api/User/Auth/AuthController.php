<?php

namespace App\Http\Controllers\Api\User\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\Auth\AuthRepositories;
use App\Http\Requests\Api\Register\RegisterRequest;
use App\Http\Requests\Api\UpdateProfile\UpdateProfileRequest;
use App\Http\Requests\Api\GoogleAuth\GoogleAuthRequest;
use App\Http\Requests\Api\FacebookAuth\FacebookAuthRequest;
use App\Http\Requests\Api\AppleAuth\AppleAuthRequest;
use App\Http\Traits\ApiResponse;
use Spatie\Permission\Traits\HasRoles;
use App\Http\Resources\Frontend\User\Auth\GetUser;

class AuthController extends Controller
{
    use ApiResponse, HasRoles;

    private $authRepository;
    public function __construct(AuthRepositories $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->authRepository->userRegister();
        return $user;
    }

    public function verifyOtp(Request $request)
    {
        $user = $this->authRepository->userVerifyOtp();
        return $user;
    }

    public function login(Request $request)
    {
        $user = $this->authRepository->userLogin();
        return $user;
    }

    public function resendOtp(Request $request)
    {
        $user = $this->authRepository->userResendOtp();
        return $user;
    }

    public function forgotPassword(Request $request)
    {
        $user = $this->authRepository->userForgotPassword();
        return $user;
    }

    public function resetPassword(Request $request)
    {
        $user = $this->authRepository->userResetPassword();
        return $user;
    }

    public function updatePassword(Request $request)
    {
        $user = $this->authRepository->userUpdatePassword();
        return $user;
    }

    public function logout(Request $request)
    {
        $user = $this->authRepository->userLogout();
        return $user;
    }

    public function getProfile(Request $request)
    {
        $user = $this->authRepository->userGetProfile();
        return $user;
    }

    public function updateProfile(UpdateProfileRequest $authRepository)
    {
        $user = $this->authRepository->userUpdateProfile();
        return $user;
    }

    public function deleteAccount(Request $request)
    {
        $user = $this->authRepository->userDeleteAccount();
        return $user;
    }

    public function saveUserDeviceToken(Request $request)
    {
        $user = $this->authRepository->userDeviceToken();
        return $user;
    }

    public function googleAuth(GoogleAuthRequest $authRepository)
    {
        $user = $this->authRepository->userGoogleAuth();
        return $user;
    }

    public function facebookAuth(FacebookAuthRequest $authRepository)
    {
        $user = $this->authRepository->userFacebookAuth();
        return $user;
    }

    public function appleAuth(AppleAuthRequest $authRepository)
    {
        $user = $this->authRepository->userAppleAuth();
        return $user;
    }
}
