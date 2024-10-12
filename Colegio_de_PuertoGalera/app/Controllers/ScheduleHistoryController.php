<?php

namespace App\Controllers;

use App\Models\ScheduleHistory; 
use App\Controllers\BaseController;

class ScheduleHistoryController extends BaseController
{
    public function index()
    {
        $model = new ScheduleHistory();  
        $historyLogs = $model->findAll();

        return view('schedule/history', ['historyLogs' => $historyLogs]); 
    }
}
