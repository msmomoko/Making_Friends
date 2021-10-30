<?php

namespace App\Http\Controllers;

use App\Recruitment;
use Illuminate\Http\Request;


class RecruitmentController extends Controller
{
    public function index(Recruitment $recruitment)
    {
        return view('recruitments.index')->with(['recruitments' => $recruitment->get()]);
    }
}
