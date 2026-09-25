<?php

namespace App\Controllers;

use App\Models\TaskModel;

class TaskList extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

        $data['tasks'] = $taskModel
            ->orderBy('task_date', 'ASC')
            ->findAll();

        return view('taskslist_msg', $data);
    }
}