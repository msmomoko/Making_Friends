<?php

namespace App\Http\Controllers;

use App\Recruitment;
use Illuminate\Http\Request;
use App\Http\Requests\RecruitmentRequest;
use Illuminate\Support\Facades\Auth;


class RecruitmentController extends Controller
{
    //募集内容の一覧表示
    public function index(Recruitment $recruitment, Request $request)
    {
        $keyword = $request->input('keyword');
        $query = Recruitment::query();
        
        if (!empty($keyword)){
            $query->where('recruitment_contents', 'like', "%{$keyword}%")
                ->orWhere('category', 'like', "%{$keyword}%")
                ->orWhere('conditions', 'like', "%{$keyword}%")
                ->orWhere('class', 'like', "%{$keyword}%")
                ->orWhere('location', 'like', "%{$keyword}%");
        }
        
        $recruitment = $query->with('user')->orderBy('updated_at', 'DESC')->get();
        
        return view('recruitments.index')->with(['recruitments' => $recruitment]);
    }
    
    //募集内容の詳細ページ
    public function show(Recruitment $recruitment)
    {
        return view('recruitments.show')->with(['recruitment' => $recruitment]);
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
        $input += ['user_id' => $request->user()->id];
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
        $input_recruitment += ['user_id' => $request->user()->id];
        $recruitment->fill($input_recruitment)->save();
        return redirect('/recruitments/' . $recruitment->id);
    }
    
    //募集内容の削除
    public function delete(Recruitment $recruitment)
    {
        $recruitment->delete();
        return redirect('/recruitments');
    }
}