<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\SupplierProject;
use App\Models\SupplierSurvey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class InitController extends Controller
{
    public function index(Request $request, $id)
    {
        $project = SupplierProject::find($id);
        if ($project->project->status == 'open') {
            if (!SupplierSurvey::where(['supplier_project_id' => $id, 'project_id' => $project->project_id, 'respondent_id' => $request->uid])->first()) {
                $uid = SupplierSurvey::create([
                    'project_id' => $project->project_id,
                    'supplier_id' => $project->supplier_id,
                    'respondent_id' => $request->uid,
                    'starting_ip' => $request->ip(),
                    'supplier_project_id' => $id,
                ]);
                return Redirect::to(str_replace('RespondentID', $uid->id, $project->project->client_live_url));
            }
            $data = ['message' => 'You have already attempt this survey please try agian later.'];
            return view('error', compact('data'));
        }
        $data = ['message' => 'Project is not live please try again later.'];
        return view('error', compact('data'));
    }
}
