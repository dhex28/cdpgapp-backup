<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ForgotPasswordModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use App\Controllers\BaseController;

class ForgotPasswordController extends BaseController
{
    public function forgotPassword()
    {
        helper(['form']);
        echo view('login-register/forgot_password');
    }
    

    public function sendVerificationCode()
    {
        $email = $this->request->getVar('email');
        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();
        
        if ($user) {
            $forgotPasswordModel = new ForgotPasswordModel();
            
            // Check if there is already a reset record for this email
            $existingRecord = $forgotPasswordModel->where('email', $email)->first();
            if ($existingRecord) {
                // If a reset record exists, display an error message
                $session = session();
                $session->setFlashdata('error', 'A password reset request has already been sent to this email address.');
                return redirect()->to('/forgot_password');
            }
            
            // Generate verification code and expiration time
            $verificationCode = random_int(100000, 999999);
            $expirationTime = date('Y-m-d H:i:s', strtotime('+10 minutes'));
            
            // Save the verification code in the password_resets table
            $forgotPasswordModel->insertPasswordReset($email, $verificationCode, $expirationTime);
            
            // Create a new instance of PHPMailer
            $mail = new PHPMailer(true);
            try {
                // SMTP configuration
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP host
                $mail->SMTPAuth = true;
                $mail->Username = 'degaleracolegio@gmail.com'; // Replace with your SMTP username
                $mail->Password = 'hrxlrwtdyjguxivk'; // Replace with your SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Encryption type
                $mail->Port = 587; // SMTP port (e.g., 587 for TLS, 465 for SSL)
                
                // Email settings
                $mail->setFrom('degaleracolegio@gmail.com', 'ColegiodePuertoGalera'); // Replace with your email and name
                $mail->addAddress($email);
                $mail->Subject = 'Verification Code';
                $mail->Body = "Your verification code is: $verificationCode";
    
                // Send the email
                $mail->send();
    
                $session = session();
                $session->setFlashdata('success', 'A verification code has been sent to your email.');
                return redirect()->to('/forgot_password/verify');
            } catch (Exception $e) {
                // Handle the error
                $session = session();
                $session->setFlashdata('error', 'Failed to send email: ' . $mail->ErrorInfo);
                return redirect()->to('/forgot_password');
            }
        } else {
            // If email does not exist in the user table, display an error message
            $session = session();
            $session->setFlashdata('error', 'Email does not exist.');
            return redirect()->to('/forgot_password');
        }
    }    
    public function verifyCode()
    {
        helper(['form']);
        echo view('login-register/verify_code');
    }

    public function checkVerificationCode()
    {
        $session = session();
        $email = $this->request->getVar('email');
        $code = $this->request->getVar('verification_code');
    
        // Load the UserModel and ForgotPasswordModel
        $userModel = new UserModel();
        $forgotPasswordModel = new ForgotPasswordModel();
    
        // Fetch user and verification code record from the database
        $user = $userModel->where('email', $email)->first();
        $resetRecord = $forgotPasswordModel->where('email', $email)->first();
    
        if ($resetRecord) {
            // Check if the stored code matches the user input and is within the expiration time
            $storedCode = trim($resetRecord['verification_code']);
            $inputCode = trim($code);
            $expiresAt = strtotime($resetRecord['expires_at']);
            $currentTime = time();
    
            if ($storedCode === $inputCode && $currentTime <= $expiresAt) {
                // Verification successful, proceed to the new password page
                $session->set('email', $email);
                return redirect()->to('/forgot_password/new_password');
            } else {
                // Verification failed, provide a flash error message
                $session->setFlashdata('error', 'Invalid verification code or code expired.');
                return redirect()->to('/forgot_password/verify');
            }
        } else {
            // No reset record found, provide a flash error message
            $session->setFlashdata('error', 'Email not found or verification code not requested.');
            return redirect()->to('/forgot_password/verify');
        }
    }
    
    public function newPassword()
    {
        helper(['form']);
        echo view('login-register/new_password');
    }

    public function updatePassword()
    {
        // Get the email from session
        $email = session('email');
        if (!$email) {
            // Handle session expiration
            $session = session();
            $session->setFlashdata('error', 'Session expired. Please try again.');
            return redirect()->to('/forgot_password/new_password');
        }
    
        // Get the new password from the request
        $password = $this->request->getVar('password');
    
        // Load the UserModel
        $userModel = new UserModel();
        // Find the user by email
        $user = $userModel->where('email', $email)->first();
    
        // Check if user is found
        if (!$user) {
            // If user is not found, handle the error
            $session = session();
            $session->setFlashdata('error', 'Failed to find user account.');
            return redirect()->to('/forgot_password/new_password');
        }
    
        // Hash the new password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
        // Update the user's password
        $updateSuccess = $userModel->update($user['id'], ['password' => $hashedPassword]);
    
        // Check if the update was successful
        if ($updateSuccess) {
            $session = session();
            $session->setFlashdata('success', 'Password updated successfully.');
            return redirect()->to('/signin');
        } else {
            // If update failed, handle the error
            $session = session();
            $session->setFlashdata('error', 'Failed to update password. Please try again.');
            return redirect()->to('/forgot_password/new_password');
        }
    }    

}
