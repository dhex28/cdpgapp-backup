<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SignupController extends BaseController
{
    public function index()
    {
        helper(['form']);
        echo view('login-register/signup');
    }
    public function userdata()
    {
        $userModel = new UserModel();
        $userData = $userModel->findAll(); // Retrieve all user data from the database
        
        // Pass user data to the view
        return view('admin/allusers', ['users' => $userData]);
    }


    public function delete($id)
    {
        $userModel = new UserModel();

        // Find the user by ID
        $user = $userModel->find($id);

        // Check if the user exists
        if (!$user) {
            // If user not found, return an error or redirect to an error page
            return redirect()->to('/error-page');
        }

        // Delete the user from the database
        $userModel->delete($user['id']);

        // Redirect back to the user listing page
        return redirect()->to('/allusers')->with('success', 'user deleted successfully');
    }

    protected $validation; // Define $validation property

    public function __construct()
    {
        $this->validation = \Config\Services::validation(); // Load validation library
    }

    public function store()
    {
        helper(['form']);
        
        // Validation rules
        $rules = [
            'name' => 'required|min_length[2]|max_length[50]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[4]|max_length[50]',
            'confirmpassword' => 'matches[password]',
            // 'status' => 'required|in_list[active,inactive]'
        ];
        
        // Run validation
        if (!$this->validation->setRules($rules)->withRequest($this->request)->run()) {
            return redirect()->to('/verification_form')->withInput()->with('validation', $this->validation);
        }
        
        // Generate verification code
        $verificationCode = uniqid();

        $expirationTime = time() + 10; // 10 seconds from now

        // Save user data to the database
        $userModel = new UserModel();
        $userData = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'verification_code' => $verificationCode,
            'verification_code_expires_at' => date('Y-m-d H:i:s', $expirationTime),
            'is_super_admin' => $this->determineSuperAdminStatus($this->request->getPost('email')), // Determine super admin status
            // 'status' => $this->request->getPost('status') // Assign status value from form
            
        ];
        $userModel->insert($userData);
        

        // Send verification email
        $this->sendVerificationEmail($userData['email'], $verificationCode);

        // Store email in session for verification
        session()->set('email', $userData['email']);

        // Redirect to verification page
        return redirect()->to('/verification_form');
    }

    // Function to determine super admin status based on email
    private function determineSuperAdminStatus($email)
    {
        // Example: Check if the email belongs to a super admin domain
        $superAdminDomains = ['degaleracolegio@gmail.com']; // Replace with your super admin domains
        $domain = explode('@', $email)[1];
        
        return in_array($domain, $superAdminDomains) ? 1 : 0;
       
    }

    // Function to send verification email
    private function sendVerificationEmail($recipientEmail, $verificationCode)
    {
        // PHPMailer configuration
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Update with your SMTP host
            $mail->SMTPAuth = true;
            $mail->Username = 'degaleracolegio@gmail.com'; // SMTP username
            $mail->Password = 'hrxlrwtdyjguxivk'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('degaleracolegio@gmail.com', 'ColegiodePuertoGalera');
            $mail->addAddress($recipientEmail); // Add a recipient
            
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Email Verification';
            $mail->Body    = 'Your verification code is: ' . $verificationCode;

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
