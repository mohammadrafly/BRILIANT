<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserDetail;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('dashboard/pages/index');
    }
}
