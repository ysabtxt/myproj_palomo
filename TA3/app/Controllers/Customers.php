<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    protected $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
    }

    public function index()
    {
        $data = [
            'title'     => 'Customer Accounts',
            'customers' => $this->customerModel->findAll()
        ];

        return view('customer_msg', $data);
    }

    public function new()
    {
        return view('customers/new');
    }

    public function create()
    {
        $rules = [
            'full_name' => 'required|min_length[2]|max_length[150]|alpha_space',
            'email'     => 'required|valid_email|max_length[254]|is_unique[customers.email]',
            'phone'     => 'required|regex_match[/^09[0-9]{9}$/]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->customerModel->insert([
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone'),
        ]);

        return redirect()->to('/customers')
            ->with('success', 'Customer added successfully.');
    }

    public function edit($id)
    {
        $customer = $this->customerModel->find($id);

        if (!$customer) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('customers/edit', [
            'customer' => $customer
        ]);
    }

    public function update($id)
    {
        $rules = [
            'full_name' => 'required|min_length[2]|max_length[150]|alpha_space',
            'email'     => "required|valid_email|max_length[254]|is_unique[customers.email,id,$id]",
            'phone'     => 'required|regex_match[/^09[0-9]{9}$/]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->customerModel->update($id, [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone'),
        ]);

        return redirect()->to('/customers')
            ->with('success', 'Customer updated successfully.');
    }

    public function delete($id)
    {
        $customerModel = new CustomerModel();

        $customer = $customerModel->find($id);

        if (!$customer) {
            return redirect()->to(site_url('customers'))
                            ->with('error', 'Customer not found.');
        }

        $customerModel->delete($id);

        return redirect()->to(site_url('customers'))
                        ->with('success', 'Customer deleted successfully.');
    }
}