<?php

namespace App\Controllers;

use App\Models\TaskModel;

class TaskList extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

        $data['tasks'] = $taskModel
            ->where('is_archived', 0)
            ->findAll();

        return view('tasks/index', $data);
    }

    public function new()
    {
        return view('tasks/new');
    }

    public function create()
    {
        $rules = [
            'title' => 'required|min_length[2]',
            'task_date' => 'required|valid_date',
        'status' => 'required|in_list[Pending,Complete]'
            ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();

        $taskModel->insert([
            'title' => $this->request->getPost('title'),
            'task_date' => $this->request->getPost('task_date'),
            'status' => $this->request->getPost('status'),
            'is_archived' => 0
        ]);

        return redirect()->to('/tasks')
            ->with('message', 'Task added successfully.');
    }

    public function edit($id)
    {
        $taskModel = new TaskModel();

        $data['task'] = $taskModel->find($id);

        return view('tasks/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'title' => 'required|min_length[2]',
            'task_date' => 'required|valid_date',
            'status' => 'required|in_list[Pending,Complete]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();

        $taskModel->update($id, [
            'title' => $this->request->getPost('title'),
            'task_date' => $this->request->getPost('task_date'),
            'status' => $this->request->getPost('status')
        ]);

        return redirect()->to('/tasks')
            ->with('message', 'Task updated successfully.');
    }

    public function delete($id)
    {
        $taskModel = new TaskModel();

        $taskModel->update($id, [
            'is_archived' => 1
        ]);

        return redirect()->to('/tasks')
            ->with('message', 'Task archived successfully.');
    }
    
}

