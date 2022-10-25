<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\SupplierSurvey;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $projects['open'] = Project::where('status','open')->count();
        $projects['total'] = Project::count();
        $projects['close'] = Project::where('status','close')->count();
        $projects['pause'] = Project::where('status','pause')->count();
        $projects['achieved'] = Project::where('status','achieved')->count();
        $surveys = new SupplierSurvey();
        $surveys =[
            'total_clicks'=>$surveys->count(),
            'complete'=>$surveys->where('status','complete')->count(),
            'terminate'=>$surveys->where('status','terminate')->count(),
            'quotafull'=>$surveys->where('status','quotafull')->count(),
            'incomplete'=>$surveys->where('status',null)->count(),
        ];
        return view('welcome',compact('projects','surveys'));
    }
}
