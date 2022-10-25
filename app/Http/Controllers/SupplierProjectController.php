<?php
namespace App\Exports;

namespace App\Http\Controllers;
use App\Exports\SurveyExport;
use App\Models\SupplierProject;
use App\Models\Project;
use App\Models\ProjectLink;
use Illuminate\Http\Request;
use Validator;
use Maatwebsite\Excel\Facades\Excel;
class SupplierProjectController extends Controller
{

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pid' => 'required',
            'sid' => 'required',
            'cpi' => 'required',
            'terminate_url' => 'required',
            'quotafull_url' => 'required',
            'complete_url' => 'required',
            'security_terminate' => 'required',
            'number_of_completes' => 'required',
            'project_status' => 'required',
            'notes' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message'=>$validator->errors()->first()], 400);
        }
        if (!SupplierProject::where(['project_id' => $request->pid, 'supplier_id' => $request->sid])->first()) {
            if ($id = SupplierProject::create([
                'project_id' => $request->pid,
                'supplier_id' => $request->sid,
                'cpi' => $request->cpi,
                'terminate_url' => $request->terminate_url,
                'quotafull_url' => $request->quotafull_url,
                'complete_url' => $request->complete_url,
                'security_terminate' => $request->security_terminate,
                'no_of_completes' => $request->number_of_completes,
                'status' => $request->project_status,
                'notes' => $request->notes,
            ])) {
                SupplierProject::where(['id'=>$id->id])->update(['survey_link' => env('APP_URL')."/surveyInit/$id->id?uid=XXX",]);
                return response()->json(['message' => 'Supplier added successfully.'],200);
            }
        }
        return response()->json(['message' => 'Supplier already added.'],400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $project = SupplierProject::with('supplier')->find($id);
       if($project){
        return response()->json(['data'=>$project]);
       }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cpi' => 'required',
            'terminate_url' => 'required',
            'quotafull_url' => 'required',
            'complete_url' => 'required',
            'security_terminate' => 'required',
            'number_of_completes' => 'required',
            'project_status' => 'required',
            'notes' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message'=>$validator->errors()->first()], 400);
        }
            if ($id = SupplierProject::where(['id'=>$request->id])->update([
                'cpi' => $request->cpi,
                'terminate_url' => $request->terminate_url,
                'quotafull_url' => $request->quotafull_url,
                'complete_url' => $request->complete_url,
                'security_terminate' => $request->security_terminate,
                'no_of_completes' => $request->number_of_completes,
                'status' => $request->project_status,
                'notes' => $request->notes,
            ])) {
                return response()->json(['message' => 'Supplier updated successfully.'],200);
            }
        return response()->json(['message' => 'Supplier already updated.'],400);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(SupplierProject::destroy($id)){
            return redirect()->back()->with('success', 'Supplier deleted successfully.');
        }
        return redirect()->back()->with('error', 'Supplier delete failed.');
    }
    public function downloadExcel(Request $request){
        $project = SupplierProject::with('project')->where('id',$request->pid)->first();
        $projectId = $project->project->project->project_id;
        return Excel::download(new SurveyExport($request), "$projectId.xlsx");
    }
}
