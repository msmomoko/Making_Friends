<?php

namespace App\Http\Controllers;

use App\Recruitment;
use App\Http\Requests\RecruitmentRequest;
use Illuminate\Support\Facades\Auth;


class RecruitmentController extends Controller
{
    //募集内容の一覧表示
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
    
    //募集内容の編集フォームの表示
    public function edit(Recruitment $recruitment)
    {
        return view('recruitments.edit')->with(['recruitment' => $recruitment]);
    }
    
    //募集内容編集の保存
    public function update(RecruitmentRequest $request, Recruitment $recruitment)
    {
        $input_recruitment = $request['recruitment'];
        $recruitment->fill($input_recruitment)->save();
        return redirect('/recruitments/');
    }
}