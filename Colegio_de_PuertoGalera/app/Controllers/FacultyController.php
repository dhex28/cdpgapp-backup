<?php

namespace App\Controllers;
use App\Models\FacultyModel;
use App\Models\Schedule;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Dompdf\Dompdf;
use Dompdf\Options;

use App\Controllers\BaseController;

class FacultyController extends BaseController
{
     protected $facultyModel;

    public function __construct()
    {
        $this->facultyModel = new FacultyModel();
        $this->scheduleModel = new Schedule();
    }

    public function index()
    {
        // Fetch all faculty records from the model
        $data['faculty'] = $this->facultyModel->findAll();

        // Pass the data to the view
        return view('admin/faculty_list', $data);
    }

    public function create()
    {
        return view('admin/faculty_create');
    }

    public function store()
    {
        $this->facultyModel->save([
            'id_no' => $this->request->getPost('id_no'),
            'last_name' => $this->request->getPost('last_name'),
            'first_name' => $this->request->getPost('first_name'),
            'middle_name' => $this->request->getPost('middle_name'),
            'email' => $this->request->getPost('email'),
            'contact' => $this->request->getPost('contact'),
            'gender' => $this->request->getPost('gender'),
            'address' => $this->request->getPost('address'),
        ]);

        return redirect()->to('/faculty');
    }

    public function edit($id)
    {
        $data['faculty'] = $this->facultyModel->find($id);
        return view('admin/faculty_edit', $data);
    }

    public function update($id)
    {
        $this->facultyModel->update($id, [
            'id_no' => $this->request->getPost('id_no'),
            'last_name' => $this->request->getPost('last_name'),
            'first_name' => $this->request->getPost('first_name'),
            'middle_name' => $this->request->getPost('middle_name'),
            'email' => $this->request->getPost('email'),
            'contact' => $this->request->getPost('contact'),
            'gender' => $this->request->getPost('gender'),
            'address' => $this->request->getPost('address'),
        ]);

        return redirect()->to('/faculty');
    }

    public function delete($id)
    {
        $this->facultyModel->delete($id);
        return redirect()->to('/faculty');
    }
    public function details($id)
    {
        $faculty = $this->facultyModel->find($id);
        $schedules = []; // Initialize schedules array
        
        // Fetch schedules associated with the faculty member
        if (!empty($faculty)) {
            // Extract first and last name of faculty member
            $facultyName = $faculty['last_name'] . ', ' . $faculty['first_name'];
            
            // Fetch schedules where faculty name matches (using LIKE condition)
            $schedules = $this->scheduleModel->like('faculty_name', $facultyName)->findAll();
        }
        
        // Check if $faculty is not empty and is an array
        if (!empty($faculty) && is_array($faculty)) {
            $data['faculty'] = $faculty;
            $data['schedules'] = $schedules; // Pass schedules data to the view
            return view('admin/facultyscheduledetails', $data);
        } else {
            // Render an error view
            return view('admin/details_not_found', ['id' => $id]);
        }
    }
    
    public function generateReport($id)
    {
        $facultyModel = new FacultyModel();
        $scheduleModel = new Schedule();
    
        // Fetch specific faculty member by ID
        $faculty = $facultyModel->find($id);
    
        // Fetch schedules associated with the specific faculty member
        $schedules = [];
        if (!empty($faculty)) {
            $facultyName = $faculty['last_name'] . ', ' . $faculty['first_name'] . ' ' .$faculty['middle_name'];
            $schedules = $scheduleModel->like('faculty_name', $facultyName)->findAll();
        }
    
        // Pass the faculty and schedules data to the report view
        $data['faculty'] = $faculty;
        $data['schedules'] = $schedules;
    
        // Load the report view file
        $content = view('admin/facultyschedreport', $data);
    
        // Generate the PDF report using DOMPDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($content);
        $dompdf->setPaper('A4', 'landscape'); // Optional: Set paper size and orientation (e.g., landscape)
        $dompdf->render();
        $dompdf->stream('facultysched_report.pdf', ['Attachment' => true]);
    }


}
