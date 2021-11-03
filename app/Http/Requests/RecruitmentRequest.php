<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecruitmentRequest extends FormRequest
{

    public function rules()
    {
        return [
            'recruitment.recruitment_contents' => 'required|string',
            'recruitment.category' => 'required',
            'recruitment.conditions' => 'required',
            'recruitment.class' => 'required',
        ];
    }
}
