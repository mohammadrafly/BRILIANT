<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Faq;

class LandingController extends BaseController
{
    public function index()
    {
        $modelFAQ = new Faq();
        //$kode = bin2hex(random_bytes(16));
        $data = [
            'content2' => $modelFAQ->findAll(),
        ];
        //dd($kode);
        return view('landingpage/index', $data);
    }
}
