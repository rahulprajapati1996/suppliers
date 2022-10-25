<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class RespondentController extends Controller
{
    public function index(Request $request){
        $surveys = Survey::orderBy('created_at','desc');
        if($request->pid){
            $surveys = $surveys->where('pid','like',"%$request->pid%");
        }
        if($request->uid){
            $surveys = $surveys->where('uid','like',"%$request->uid%");
        }
        $surveys = $surveys->paginate(10)->appends(request()->query());
        return view('respondent.index',compact('surveys'));
    }
}
