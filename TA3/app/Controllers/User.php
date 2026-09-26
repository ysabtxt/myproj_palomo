<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'User Accounts',
            'users' => $this->userModel->findAll()
        ];

        return view('user_msg', $data);
    }

    public function new()
    {
        return view('users/new');
    }

    public function create()
    {
        $rules = [
            'username'  => 'required|min_length[3]|max_length[30]|alpha_numeric_punct|is_unique[users.username]',
            'full_name' => 'required|min_length[2]|max_length[150]|alpha_space',
            'avatar'    => 'permit_empty|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $avatarName = null;
        $avatar = $this->request->getFile('avatar');

        if ($avatar && $avatar->isValid() && !$avatar->hasMoved()) {
            $avatarName = $avatar->getRandomName();
            $avatar->move(FCPATH . 'uploads/avatars', $avatarName);
        }

        $this->userModel->insert([
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'avatar'    => $avatarName,
        ]);

        return redirect()->to('/user')
            ->with('success', 'User added successfully.');
    }

    public function edit($id)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('users/edit', [
            'user' => $user
        ]);
    }

    public function update($id)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'username'  => "required|min_length[3]|max_length[30]|alpha_numeric_punct|is_unique[users.username,id,$id]",
            'full_name' => 'required|min_length[2]|max_length[150]|alpha_space',
            'avatar'    => 'permit_empty|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $avatarName = $user['avatar'];
        $avatar = $this->request->getFile('avatar');

        if ($avatar && $avatar->isValid() && !$avatar->hasMoved()) {
            $avatarName = $avatar->getRandomName();
            $avatar->move(FCPATH . 'uploads/avatars', $avatarName);
        }

        $this->userModel->update($id, [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'avatar'    => $avatarName,
        ]);

        return redirect()->to('/user')
            ->with('success', 'User updated successfully.');
    }
public function delete($id)
{
    $userModel = new UserModel();

    $user = $userModel->find($id);

    if ($user && !empty($user['avatar'])) {
        $avatarPath = FCPATH . 'uploads/avatars/' . $user['avatar'];

        if (file_exists($avatarPath)) {
            unlink($avatarPath);
        }
    }

    $userModel->delete($id);

    return redirect()->to(site_url('user'))
                     ->with('success', 'User deleted successfully.');
}
   
}