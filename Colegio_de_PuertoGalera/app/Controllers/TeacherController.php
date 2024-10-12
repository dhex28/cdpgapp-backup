<?php

namespace App\Controllers;

use App\Models\TeachersModel;
use App\Controllers\BaseController;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Dompdf\Dompdf;
use Dompdf\Options;


class TeacherController extends BaseController
{

    public function teacher()
    {
       
    
        // Pass the teacher data to the view
        return view('admin/addteachers');
    }

    public function show()
    {
        $teacherModel = new TeachersModel();

        // Fetch all teachers from the database
        $teachers = $teacherModel->findAll();

        // Pass the teachers data to the view
        return view('admin/allteachers', ['teachers' => $teachers]);
    }

    private function getTotalTeachersCount()
    {
        $teacherModel = new TeachersModel();

        // Fetch all teachers from the database
        $teachers = $teacherModel->findAll();

        // Calculate the total count of teachers
        $totalTeachers = count($teachers);

        return $totalTeachers;
    }
    

    public function index()
    {
        $teacherModel = new TeachersModel();

        // Fetch all teachers from the database
        $teachers = $teacherModel->findAll();

        // Pass the teachers data to the view
        return view('userpage/aboutus', ['teachers' => $teachers]);
    }

    public function insert()
{
    $teacherModel = new TeachersModel();

    // Handle image upload
    $file = $this->request->getFile('image');
    $newName = $file->getRandomName();
    $file->move('./uploads', $newName);

    // Example data, replace this with actual data received from form inputs
    $data = [
        'name' => $this->request->getPost('name'),
        'designation' => $this->request->getPost('designation'),
        'description' => $this->request->getPost('description'),
        'image' => $newName, // Store the image name in the database
        // Add other fields as needed
    ];

    // Insert teacher data into the database
    $teacherModel->insert($data);

    // Redirect back to the teacher listing page
    return redirect()->to('/teacherform');
}

public function delete($id)
{
    $teacherModel = new TeachersModel();

    // Find the teacher by ID
    $teacher = $teacherModel->find($id);

    // Check if the teacher exists
    if (!$teacher) {
        // If teacher not found, return an error or redirect to an error page
        return redirect()->to('/error-page');
    }

    // Delete the teacher from the database
    $teacherModel->delete($id);

    // Redirect back to the teacher listing page
    return redirect()->to('/allteachers')->with('success', 'Teacher deleted successfully');
}

public function generateReport()
{
    $teacherModel = new TeachersModel();

    // Fetch all teachers from the database
    $teachers = $teacherModel->findAll();

    // Pass the teachers data to the report view
    $data['teachers'] = $teachers;

    // Load the report view file
    $content = view('admin/report', $data);

    // Generate the PDF report using DOMPDF
    $dompdf = new Dompdf();
    $dompdf->loadHtml($content);
    $dompdf->setPaper('A4', 'landscape'); // Optional: Set paper size and orientation (e.g., landscape)
    $dompdf->render();
    $dompdf->stream('teachers_report.pdf', ['Attachment' => true]);
}





}
