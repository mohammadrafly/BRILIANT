<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Course;
use App\Models\Soal;
use App\Models\Answer;
use App\Models\Mapel;
use App\Models\User;

class ExampController extends BaseController
{
    public function index()
    {
        $model = new Course();
        $data = [
            'content' => $model->getDetailCourse()->getResult(),
            'title' => 'List Examp'
        ];
        //dd($data);
        return view('dashboard/pages/examp/index', $data);
    }

    public function add()
    {
        $model = new User();
        $modelM = new Mapel();
        $data = [
            'title' => 'Tambah Examp',
            'mapel' => $modelM->findAll(),
            'tutor' => $model->getAllTutor()->getResult(),
            //'tutor' => $model->where('role', 'tutor')->first(),
        ];
        //dd($data);
        return view('dashboard/pages/examp/add', $data);
    }

    public function save()
    {
        $req = $this->request;
        $kode = substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZ", 6)), 0, 6);
        $model = new Course();
        $tutor = $req->getVar('id_token_tutor');
        $check = $model->where('id_token_tutor', $tutor)->first();
        //dd($tutor, $check);
        //$checkpoint = $tutor === $check;
        if ($check === null) {
            //dd($checkpoint);
            $data = [
                'id_mapel' => $req->getVar('id_mapel'),
                'id_token_tutor' => $tutor,
                'start_time' => $req->getVar('start_time'),
                'end_time' => $req->getVar('end_time'),
                'status' => 'undone',
                'kode' => $kode
            ];
            $model->save($data);
            //dd($data);
            session()->setFlashdata('success', 'Berhasil tambah data.');
            return redirect()->to('dashboard/master/tutor-examp/list');
        } else {
            session()->setFlashdata('error', 'Tutor telah memiliki jadwal, silahkan pilih tutor lainnya.');
            return redirect()->to('dashboard/master/tutor-examp/list');
        }
        
    }

    public function edit($id)
    {
        $modelM = new Course();
        $data = [
            'content' => $modelM->where('id', $id)->first(),
            'title' => 'Edit Jadwal Ujian Tutor'
        ];
        return view('dashboard/pages/examp/edit', $data);
    }

    public function update()
    {
        $req = $this->request;
        $id = $req->getVar('id');
        $model = new Course();
        $data = [
            'start_time' => $req->getVar('start_time'),
            'end_time' => $req->getVar('end_time'),
        ];
        $model->update($id, $data);

        session()->setFlashdata('success', 'Berhasil update data.');
        return redirect()->to('dashboard/master/tutor-examp/list');
    }

    public function delete($id)
    {
        $model = new Course();
        $model->where('id', $id)->delete();

        session()->setFlashdata('success', 'Berhasil delete data.');
        return redirect()->to('dashboard/master/tutor-examp/list');
    }

    public function TutorExamps($token)
    {
        $model = new Course();
        $data = [
            'content' => $model->ExampsByToken($token)->getResult(),
            'title' => 'List Examp Saya',
        ];
        //dd($data);
        return view('dashboard/pages/examp/list_examp', $data);
    }

    public function TutorExampsJoin($id)
    {
        $model = new Course();
        $data = [
            'content' => $model->ExampsByID($id)->getResult(),
            'title' => 'Ujian Tutor',
        ];
        //dd($data);
        return view('dashboard/pages/examp/before_examp', $data);
    }

    public function ExampsOnProgres($id)
    {
        $model = new Soal();
        $modelM = new Course();
        $req = $this->request;
        $check = $modelM->where('id_token_tutor', session()->get('id_token'))->first();
        $checkpoint = $req->getVar('kode') === $check['kode'];
        //dd($checkpoint);
        if ($checkpoint) {
            $status = [
                'status' => 'on_progres'
            ];
            if ($modelM->update($id, $status)) {
                $data = [
                    'content' => $model->getSoalByMapel($check['id_mapel'])->getResult(),
                    'id_course' => $id,
                ];
                //dd($data);
                return view('dashboard/pages/examp/on_examp', $data);
            }
        } else {
            echo 'Error';
        }
    }

    public function SubmitExamp()
    {
        $model = new Answer();
        $modelM = new Course();
        $user = new User();
        $id_user = $this->request->getVar('id_user');
        $pertanyaan = $this->request->getVar('pertanyaan');
        $answer = $this->request->getVar('answer');
        $correct_answer = $this->request->getVar('correct_answer');
        $id = $this->request->getVar('id_course');
        
        $jmldata = count($id_user);

        for ($i = 0; $i < $jmldata; $i++) {
            $model->save([
                'id_user' => $id_user[$i],
                'pertanyaan' => $pertanyaan[$i],
                'answer' => $answer[$i],
                'correct_answer' => $correct_answer[$i]
            ]);
            $diff = array_diff($answer,$correct_answer);
            $nilai = $jmldata - count($diff);
            $persen = $nilai / $jmldata * 100;
            $status = [
                'status' => 'done',
                'score' => $persen,
            ];
            $modelM->update($id, $status);
            if ($persen >= 75) {
                $ids = session()->get('id_token');
                $check = $user->where('id_token', $ids)->first();
                //$check = $user->where('id_token', $id_user)->first();
                $data_user = [
                    'is_verified' => 'yes'
                ];
                $user->update($check['id'], $data_user);
                //dd($user->find($id_user));
                session()->setFlashdata('success', 'Anda telah submit ujian dengan score '.$persen);
                return redirect()->to('dashboard/tutor/examp/'.session()->get('id_token'));
            } else {
                $modelM->update($id, $status);
                $msg = 'Score anda tidak memenuhi syarat. silahkan coba lagi di ujian selanjutnya!';
                session()->setFlashdata('success', $msg);
                return redirect()->to('dashboard/tutor/examp/'.session()->get('id_token'));
            }
            //dd($diff,$persen,count($diff),$jmldata);
            
        }
    }
}
