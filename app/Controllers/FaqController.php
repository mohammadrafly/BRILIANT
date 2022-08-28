<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Faq;

class FaqController extends BaseController
{
    public function index()
    {
        $model = new Faq();
        $data = [
            'content' => $model->findAll(),
            'title' => 'List FAQ',
        ];
        return view('dashboard/pages/faqs/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah FAQ',
        ];
        return view('dashboard/pages/faqs/add', $data);
    }

    public function save()
    {
        $req = $this->request;
        $model = new Faq();
        $data = [
            'pertanyaan' => $req->getVar('pertanyaan'),
            'jawaban' => $req->getVar('jawaban'),
        ];
        $model->save($data);

        session()->setFlashdata('success', 'Berhasil menambah data.');
        return redirect()->to('dashboard/faq/list');
    }

    public function edit($id)
    {
        $model = new Faq();
        $data = [
            'content' => $model->where('id', $id)->first(),
            'title' => 'Edit FAQ',
        ];
        return view('dashboard/pages/faqs/edit', $data);
    }

    public function update()
    {
        $req = $this->request;
        $id = $req->getVar('id');
        $model = new Faq();
        $data = [
            'pertanyaan' => $req->getVar('pertanyaan'),
            'jawaban' => $req->getVar('jawaban'),
        ];
        $model->update($id, $data);
        
        session()->setFlashdata('success', 'Berhasil update data.');
        return redirect()->to('dashboard/faq/list');
    }

    public function delete($id)
    {
        $model = new Faq();
        $model->where('id', $id)->delete();

        session()->setFlashdata('success', 'Berhasil delete data.');
        return redirect()->to('dashboard/faq/list');
    }
}
