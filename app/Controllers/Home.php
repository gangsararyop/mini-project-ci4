<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Home extends BaseController
{
    public function index()
    {
        $tasks = new TaskModel();
        $data['tasks'] = $tasks->findAll();
        echo view('Home', $data);
    }

    public function tambahTugas()
    {
        $tasks = new TaskModel();
        $tasks->insert([
            "judul" => $this->request->getPost('judul'),
            "status" => $this->request->getPost('status'),
        ]);
    }

    public function tampilTugas()
    {
        $tasks = new TaskModel();
        $data['tasks'] = $tasks->findAll();
        echo view('Tabel', $data);
    }

    public function editTugas()
    {
        $tasks = new TaskModel();

        $tasks->update($this->request->getPost('id'), [
            "judul" => $this->request->getPost('judul'),
            "status" => $this->request->getPost('status')
        ]);
    }

    public function deleteTugas()
    {
        $tasks = new TaskModel();
        $tasks->delete($this->request->getPost('id'));
    }
}