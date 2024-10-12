<?php

namespace App\Controllers;

use App\Models\SubjectModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;

class SubjectListController extends BaseController
{
    public function create()
    {
        return view('admin/subject_list'); // Return the view for the form
    }
    public function index()
    {
        $subjectModel = new SubjectModel();

        // Get all subjects from the database
        $subjects = $subjectModel->findAll();

        // Pass the data to the view
        return view('admin/subject_list_table', ['subjects' => $subjects]);
    }

    public function store()
    {
        // Create an instance of the SubjectModel
        $subjectModel = new SubjectModel();

        // Get the data from the POST request
        $data = [
            'name' => $this->request->getPost('name'), // Subject name from the form
            'description' => $this->request->getPost('description'), // Description from the form
        ];

        // Insert the data into the database
        $subjectModel->insert($data);

        // Redirect to a success page or show a success message
        return redirect()->to('/subject_list/create')->with('success', 'Subject created successfully.');    
    }
    public function edit($id)
    {
        $subjectModel = new SubjectModel();
        $subject = $subjectModel->find($id); // Find subject by ID

        if (!$subject) {
            return redirect()->to('/subject_list')->with('error', 'Subject not found.');
        }

        return view('admin/subject_edit', ['subject' => $subject]);
    }

    public function update($id)
    {
        $subjectModel = new SubjectModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ];

        $subjectModel->update($id, $data); // Update subject
        return redirect()->to('/subject_list')->with('success', 'Subject updated successfully.');
    }

    public function delete($id)
    {
        $subjectModel = new SubjectModel();
        $subjectModel->delete($id); // Delete subject by ID

        return redirect()->to('/subject_list')->with('success', 'Subject deleted successfully.');
    }
}
