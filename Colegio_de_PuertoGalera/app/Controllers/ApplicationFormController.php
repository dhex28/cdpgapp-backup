<?php

namespace App\Controllers;
use App\Models\ApplicationFormModel;
use App\Models\PersonalDataExam;

use App\Controllers\BaseController;

class ApplicationFormController extends BaseController
{
    public function applicationform()
    {
        return view('enrollment/applicationForm');
    }

    public function currentenroll()
    {
        $email = session()->get('email'); // Adjust this according to your authentication mechanism
    
        // Check if the email exists in the perosanldataexam table
        $personaldataExamModel = new PersonalDataExam();
        $examExists = $personaldataExamModel->where('Email', $email)->first();
    
        if ($examExists) {
            // If the email exists in the table, it means the user has already taken an exam
            // You can add a message or perform any action here
            $message = "Hey there! Just a heads-up: it seems like the account has already tackled an exam. Hang tight for any updates or messages regarding the interview if the exam is aced. Stay tuned!";
        } else {
            // If the email doesn't exist in the table, proceed with normal sidenav operation
            $message = ""; // Set an empty message
        }
        return view('enrollment/currentenroll', ['examExists' => $examExists, 'message' => $message]);
    }

    // public function sidenav()
    // {
    //     // Get the email of the logged in user, assuming it's stored in session or retrieved from authentication
    //     $email = session()->get('email'); // Adjust this according to your authentication mechanism
    
    //     // Check if the email exists in the perosanldataexam table
    //     $personaldataExamModel = new PersonalDataExam();
    //     $examExists = $personaldataExamModel->where('Email', $email)->first();
    
    //     if ($examExists) {
    //         // If the email exists in the table, it means the user has already taken an exam
    //         // You can add a message or perform any action here
    //         $message = "The account has already taken an exam.";
    //         // You might want to pass this message to the view
    //         return view('enrollment/message', ['message' => $message]);
    //     } else {
    //         // If the email doesn't exist in the table, proceed with normal sidenav operation
    //         return view('enrollment/index');
    //     }
    // }


    public function sidenav()
    {
        // Get the email of the logged in user, assuming it's stored in session or retrieved from authentication
        $email = session()->get('email'); // Adjust this according to your authentication mechanism
    
        // Check if the email exists in the perosanldataexam table
        $personaldataExamModel = new PersonalDataExam();
        $examExists = $personaldataExamModel->where('Email', $email)->first();
    
        if ($examExists) {
            // If the email exists in the table, it means the user has already taken an exam
            // You can add a message or perform any action here
            $message = "The account has already taken an exam.";
        } else {
            // If the email doesn't exist in the table, proceed with normal sidenav operation
            $message = ""; // Set an empty message
        }
    
        // Pass the $examExists and $message variables to the view
        return view('enrollment/index', ['examExists' => $examExists, 'message' => $message]);
    }



    

    public function submitApplication()
    {
        // Load the model
        $applicationModel = new ApplicationFormModel();

        // Get form data
        $formData = [
            'first_name' => $this->request->getPost('first_name'),
            'middle_initial' => $this->request->getPost('middle_initial'),
            'last_name' => $this->request->getPost('last_name'),
            'birth_date' => $this->request->getPost('birth_year') . '-' . $this->request->getPost('birth_month') . '-' . $this->request->getPost('birth_day'),
            'gender' => $this->request->getPost('gender'),
            'citizenship' => $this->request->getPost('citizenship'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'street_address' => $this->request->getPost('street_address'),
            'city' => $this->request->getPost('city'),
            'state' => $this->request->getPost('state'),
            'zip_code' => $this->request->getPost('zip_code'),
            'emergency_first_name' => $this->request->getPost('emergency_first_name'),
            'emergency_relationship' => $this->request->getPost('emergency_relationship'),
            'emergency_last_name' => $this->request->getPost('emergency_last_name'),
            'emergency_email' => $this->request->getPost('emergency_email'),
            'emergency_phone' => $this->request->getPost('emergency_phone')
        ];

        // Insert data into the database
        if ($applicationModel->insert($formData)) {
            // Data inserted successfully
            echo "Application submitted successfully.";
        } else {
            // Failed to insert data
            echo "Failed to submit application.";
        }
    }


}
