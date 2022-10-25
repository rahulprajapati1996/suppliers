<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use App\Models\ProjectLink;
use App\Models\Country;
use App\Models\Supplier;
use App\Models\SupplierProject;
use App\Models\User;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Validator;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $projects = ProjectLink::orderBy('created_at', 'desc');
        if ($request->q) {
            $projects->where('project_name', 'like', "%{$request->q}%");
        }
        if ($request->q) {
            $projects->orWhereHas('project', function ($q) use ($request) {
                $q->where('project_id', 'like', "%{$request->q}%");
            });
        }
        $projects = $projects->paginate(20)->appends(request()->query());
        return view('project.index', compact('projects'));
    }
    public function create()
    {
        $clients = Client::all();
        $countries = Country::all();
        $suppliers = Supplier::get();
        return view('project.create', compact('countries', 'clients', 'suppliers'));
    }
    public function store(Request $request)
    {
        $id = IdGenerator::generate(['table' => 'projects', 'field' => 'project_id', 'length' => 10, 'prefix' => 'NXT' . date('ym')]);
        $request->validate([
            'name' => 'required|string',
            'client' => 'required',
            'project_cpi' => 'required',
            'project_loi' => 'required|numeric',
            'project_ir' => 'required|numeric',
            'completes' => 'required',
            'manager' => 'required',
            'project_status' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'country' => 'required',
            'client_live_url' => 'required',
        ]);
        if ($pid = Project::create([
            'project_id' => $id,
            'client_id' => $request->client,
            'user_id' => $request->manager,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ])) {
            ProjectLink::create([
                'project_id' => $pid->id,
                'project_name' => $request->name,
                'cpi' => $request->project_cpi,
                'loi' => $request->project_loi,
                'ir' => $request->project_ir,
                'completes' => $request->completes,
                'status' => $request->project_status,
                'country_id' => $request->country,
                'client_live_url' => $request->client_live_url,
                'notes' => $request->description,
            ]);
            return redirect('project')->with('success', 'Project created successfully.');
        }
    }
    public function show(Request $request,$id)
    {
        $project = ProjectLink::where('id', $id)->first();
        $vendors = SupplierProject::with('project','supplier','completes','terminate','quotafull','incomplete')->where(['project_id' => $id])->get();
        $countries = Country::all();
        $suppliers = Supplier::all();
        if($request->ajax()){
            return response()->json(['data'=>$vendors]);
        }
        return view('project.view', compact('project', 'vendors', 'suppliers', 'countries'));
    }
    public function edit($id)
    {
        $clients = Client::all();
        $users = User::all();
        $countries = Country::all();
        $project = ProjectLink::find($id);
        return view('project.edit', compact('countries', 'clients', 'users', 'project'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'client' => 'required',
            'project_cpi' => 'required',
            'project_loi' => 'required|numeric',
            'project_ir' => 'required|numeric',
            'completes' => 'required',
            'project_status' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'country' => 'required',
            'client_live_url' => 'required',
        ]);
        if (Project::where('id', $request->id)->update([
            'client_id' => $request->client,
            'user_id' => Auth::user()->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ])) {
            ProjectLink::where(['id' => $id, 'project_id' => $request->id])->update([
                'project_name' => $request->name,
                'cpi' => $request->project_cpi,
                'loi' => $request->project_loi,
                'ir' => $request->project_ir,
                'completes' => $request->completes,
                'status' => $request->project_status,
                'country_id' => $request->country,
                'client_live_url' => $request->client_live_url,
                'notes' => $request->description,
            ]);
            return redirect('project')->with('success', 'Project updated successfully.');
        }
    }
    public function addLink(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_cpi' => 'required',
            'project_loi' => 'required|numeric',
            'project_ir' => 'required|numeric',
            'completes' => 'required',
            'project_status' => 'required',
            'country' => 'required',
            'client_live_url' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }
        $project = ProjectLink::find($request->pid);
        if (ProjectLink::create([
            'project_id' => $project->project_id,
            'project_name' => $project->project_name,
            'cpi' => $request->project_cpi,
            'loi' => $request->project_loi,
            'ir' => $request->project_ir,
            'completes' => $request->completes,
            'status' => $request->project_status,
            'country_id' => $request->country,
            'client_live_url' => $request->client_live_url,
            'notes' => $request->description,
        ])) {
            return response()->json(['message' => 'Project link added successfully.', 'success' => true]);
        }
    }
    public function destroy($id)
    {
        if (ProjectLink::destroy($id)) {
            return response()->json(['message' => 'Project deleted successfully.', 'success' => true]);
        }
    }
}
