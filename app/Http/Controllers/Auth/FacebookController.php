<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Carbon\Carbon;
use Exception;
use Socialite;

class FacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();

            $userModel = User::firstOrCreate(['email' => $user->getId()]);
            $userModel->name = $user->getName();
            $userModel->facebook_email = $user->getEmail();
            if (!$userModel->email_verified_at) {
                $userModel->email_verified_at = Carbon::now();
            }
            $userModel->save();

            Auth::loginUsingId($userModel->id);

            return redirect('news');
        } catch (Exception $e) {
            return redirect('auth/facebook');
        }
    }
}
