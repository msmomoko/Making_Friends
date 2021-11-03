<?php

namespace App\Http\Controllers;

use App\Recruitment;
use App\Http\Requests\RecruitmentRequest;
use Illuminate\Support\Facades\Auth;


class RecruitmentController extends Controller
{
    public function index(Recruitment $recruitment)
    {
        return view('recruitments.index')->with(['recruitments' => $recruitment->get()]);
    }
    
    //新しい募集内容作成フォームの表示
    public function create(Recruitment $recruitment)
    {
        return view('recruitments.create');
    }
    
    //新しい募集内容の保存
    public function store(RecruitmentRequest $request, Recruitment $recruitment)
    {
        $input = $request['recruitment'];
        $recruitment->fill($input)->save();
        return redirect('/recruitments/');
    }
}