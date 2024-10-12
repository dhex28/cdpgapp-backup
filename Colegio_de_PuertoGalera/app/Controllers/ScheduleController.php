<?php

namespace App\Controllers;

use App\Models\Schedule;
use App\Models\ScheduleHistory; 
use App\Models\FacultyModel;
use App\Models\SubjectModel;
use App\Controllers\BaseController;

class ScheduleController extends BaseController
{
    public function index()
    {
        $scheduleModel = new Schedule();
        $facultyModel = new FacultyModel();
        $subjectModel = new SubjectModel();
    
        $perPage = 10; // Set the number of items per page
        $schedules = $scheduleModel->paginate($perPage);
        $pager = $scheduleModel->pager;
    
        $data = [
            'schedules' => $schedules,
            'pager' => $pager,
            'faculty' => $facultyModel->findAll(),
            'subjects' => $subjectModel->findAll()
        ];
    
        return view('schedule/index', $data);
    }
    
    public function create()
    {
        $facultyModel = new FacultyModel();
    $data['faculty'] = $facultyModel->findAll();

    if ($this->request->getMethod() === 'post') {
        $model = new Schedule();

        $scheduleData = [
            'faculty_name' => $this->request->getPost('faculty_name'),
            'days_of_week' => $this->request->getPost('days_of_week'),
            'title' => $this->request->getPost('title'),
            'time_from' => $this->request->getPost('time_from'),
            'time_to' => $this->request->getPost('time_to'),
            'schedule_type' => $this->request->getPost('schedule_type'),
            'sem' => $this->request->getPost('sem'),
            'room' => $this->request->getPost('room'),
            'description' => $this->request->getPost('description'),
        ];

        // Check if faculty_name is provided and valid
        if (empty($scheduleData['faculty_name'])) {
            return redirect()->back()->with('error', 'Faculty name is required.');
        }

        // Save the schedule data to the database
        $model->insert($scheduleData);

        return redirect()->to('/schedule');
    }

    return view('schedule/create', $data);

    }
    
    public function update($id)
    {
        if ($this->request->getMethod() === 'post') {
            $model = new Schedule();
            $historyModel = new ScheduleHistory();
    
            $data = [
                'faculty_name' => $this->request->getPost('faculty_name'),
                'days_of_week' => $this->request->getPost('days_of_week'),
                'title' => $this->request->getPost('title'),
                'time_from' => $this->request->getPost('time_from'),
                'time_to' => $this->request->getPost('time_to'),
                'schedule_type' => $this->request->getPost('schedule_type'),
                'sem' => $this->request->getPost('sem'),
                'room' => $this->request->getPost('room'),
                'description' => $this->request->getPost('description'),
            ];
    
            $model->update($id, $data);
    
            // Log the update into the history model
            $historyData = [
                'schedule_id' => $id,
                'updated_by' => 'admin', // Update to reflect the actual user
                'update_time' => date('Y-m-d H:i:s'),
            ];
    
            $historyModel->insert($historyData);
    
            // Set a flash message to indicate success
            session()->setFlashdata('update_success', 'Schedule updated successfully.');
    
            return redirect()->to('/schedule');
        }
    
        return view('schedule/edit', ['id' => $id]);
    }
    
    public function delete($id)
{
    $scheduleModel = new Schedule();

    // Find the schedule by ID
    $schedule = $scheduleModel->find($id);

    // Delete the schedule from the database
    $scheduleModel->delete($id);

    // Redirect back to the schedule listing page
    return redirect()->to('/schedule')->with('success', 'Schedule deleted successfully');
}




}
