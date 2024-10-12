<?php

namespace App\Controllers;

use App\Models\UserModel;

use App\Controllers\BaseController;

class VerificationController extends BaseController
{
    public function index()
    {
        return view('login-register/verification_form');
    }

    public function verify()
    {
        $verificationCode = $this->request->getPost('verification_code');
        $email = session()->get('email');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if ($user && $user['verification_code'] === $verificationCode) {
            // Verification successful, mark the user as verified
            $userModel->update($user['id'], ['verified' => true]);

            // Redirect the user to the login page or any other page
            return redirect()->to('/login-register/signin')->with('success', 'Your email has been verified successfully. Please login.');
        } else {
            // Verification failed, show an error message
            return redirect()->back()->withInput()->with('error', 'Invalid verification code. Please check your email and try again.');
        }
    }
}
