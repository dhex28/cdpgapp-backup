<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PersonalDataExam;


class ExamController extends BaseController
{
    public function getExamData()
    {
        $personalDataExamModel = new PersonalDataExam();

        // Fetch data from the database
        $data = $personalDataExamModel->findAll();
    
        // Define the passing score (60% of the maximum score)
        $passingScore = 30; // Assuming the maximum score is 50
    
        // Pass the data and passing score to the view
        return view('admin/examinationdata', ['data' => $data, 'passingScore' => $passingScore]);
    }



    public function submitExam()
{
    $personalDataExamModel = new PersonalDataExam();

        // Retrieve form data
        $formData = $this->request->getPost();

    // Define the array of correct answers
    $correctAnswers = [
        'q1' => 'B',
        'q2' => 'A',
        'q3' => 'B',
        'q4' => 'B',
        'q5' => 'C',
        'q6' => 'B',
        'q7' => 'D',
        'q8' => 'B',
        'q9' => 'B',
        'q10' => 'C',
        'q11' => 'B',
        'q12' => 'C',
        'q13' => 'B',
        'q14' => 'B',
        'q15' => 'A',
        'q16' => 'A',
        'q17' => 'A',
        'q18' => 'B',
        'q19' => 'C',
        'q20' => 'C',
        'q21' => 'B',
        'q22' => 'C',
        'q23' => 'A',
        'q24' => 'A',
        'q25' => 'B',
        'q26' => 'C',
        'q27' => 'A',
        'q28' => 'A',
        'q29' => 'B',
        'q30' => 'A',
        'q31' => 'B',
        'q32' => 'B',
        'q33' => 'A',
        'q34' => 'B',
        'q35' => 'A',
        'q36' => 'A',
        'q37' => 'B',
        'q38' => 'B',
        'q39' => 'A',
        'q40' => 'C',
        'q41' => 'C',
        'q42' => 'A',
        'q43' => 'A', 
        'q44' => 'A',
        'q45' => 'A',
        'q46' => 'A',
        'q47' => 'C',
        'q48' => 'B',
        'q49' => 'A',
        'q50' => 'A',
    ];
    

    // Compare user's answers with correct answers and calculate the score
    $score = 0;
    foreach ($correctAnswers as $question => $correctAnswer) {
        if ($formData[$question] === $correctAnswer) {
            $score++;
        }
    }

    // Insert data into the database including the score
    $dataToInsert = array_merge($formData, ['result' => $score]);
    $personalDataExamModel->insert($dataToInsert);

    // Redirect to a success page or a different route
    return redirect()->to('/show_result')->with('success', 'Exam submitted successfully! Your score: ' . $score);
}



public function showResult()
{
    $email = session()->get('email');

    // Load the model
    $personalDataExamModel = new PersonalDataExam();

    // Get the result from the database based on the user's email
    $result = $personalDataExamModel->where('Email', $email)->first();

    // If the result doesn't exist, redirect or handle the case accordingly
    if (!$result) {
        // Handle the case where the result doesn't exist
        return redirect()->back()->with('error', 'Result not found.');
    }

    // Define the passing score (60% of the maximum score)
    $passingScore = 30; // Assuming the maximum score is 50

    // Pass data to the view
    return view('enrollment/successexam', [
        'result' => $result,
        'passingScore' => $passingScore,
    ]);
}


}
