<?php

namespace App\Http\Controllers;

use App\Models\SupplierProject;
use App\Models\SupplierSurvey;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class RedirectController extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function complete()
    {
        return $this->store('complete', 'complete');
    }
    public function terminate(Request $request)
    {
        return $this->store('terminate', 'terminate');
    }
    public function overquota(Request $request)
    {
        return $this->store('quotafull', 'quotafull');
    }
    public function secTerminate(Request $request)
    {
        return $this->store('terminate', 'terminate');
    }
    public function store($status, $page)
    {
        $survey = SupplierSurvey::where('id', $this->request->uid)->first();
        if ($survey) {
            if ($survey->status == null) {
                SupplierSurvey::where(['id' => $survey->id])->update([
                    'end_ip' => $this->request->ip(),
                    'status' => $status,
                ]);
                $project = SupplierProject::where(['id' => $survey->supplier_project_id])->first();
                $url = str_replace('ProjectID', $project->project->project->project_id, $project->complete_url);
                $url = str_replace('RespondentID', $survey->respondent_id, $url);
                return view("redirect." . $page, compact('url'));
            }
            $data = ['message' => 'You have already completed the survey.'];
            return view('error',compact('data'));
        }
        $data = ['message' => 'Opps Survey Paramters Are Not Valid.'];
        return view('error', compact('data'));
    }
}
