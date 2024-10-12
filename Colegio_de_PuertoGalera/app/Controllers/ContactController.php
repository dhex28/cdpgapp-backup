<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContactModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactController extends BaseController
{
    public function index()
    {
        // Load the contact form view
        return view('/contact');
    }

    public function sendEmail()
    {
        // Get form data
        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $subject = $this->request->getVar('subject');
        $message = $this->request->getVar('msg');
    
        // Save contact data to database
        $contactModel = new ContactModel();
        $contactData = [
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'message' => $message
        ];
        $contactModel->insert($contactData);
    
        // Send email using PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'degaleracolegio@gmail.com'; // Your Gmail email address
            $mail->Password = 'hrxlrwtdyjguxivk'; // Your Gmail password or app password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
    
            $mail->setFrom($email, $name);
            $mail->addAddress('degaleracolegio@gmail.com');
    
            $mail->isHTML(false);
            $mail->Subject = 'Contact Form Submission: ' . $subject;
            $mail->Body = "Name: $name\nEmail: $email\nMessage:\n$message";
    
            $mail->send();
            return redirect()->to('/contact')->with('success', 'Email sent successfully.');
        } catch (Exception $e) {
            return redirect()->to('/contact')->with('error', 'Failed to send email. Please try again later.');
        }
    }
}
