<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recruitment;
use Auth;

class FavoriteController extends Controller
{
    public function store(Recruitment $recruitment)
    {
        $recruitment->users()->attach(Auth::id());
        return redirect('/recruitments/');
    }

    public function destroy(Recruitment $recruitment)
    {
        $recruitment->users()->detach(Auth::id());
        return redirect('/recruitments/');
    }
}
