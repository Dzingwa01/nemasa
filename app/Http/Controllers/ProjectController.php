<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Project;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function getProjects()
    {
        $projects = Project::join('users','users.id','projects.user_id')
                ->select('projects.*','users.name as assigned_to')
                ->get()->load('contractors');
        return Datatables::of($projects)->addColumn('action', function ($project) {
            $re = 'project/' . $project->id;
            $sh = 'projects/' . $project->id;
            $del = 'project/delete/' . $project->id;
            return '<a href=' . $sh . '><i class="material-icons " title="View Project Dashboard" style="color:green">visibility</i></a><a href=' . $del . ' title="Delete" style="color:red"><i class="material-icons">delete_forever</i></a>';
        })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function getContractAwardCalc(Project $project){
        $project->load('contractors','socios');
//        dd($project);
        return view('projects.contract-award-calculation',compact('project'));
    }

    public function getSMEProcurementPlan(Project $project){
        return view('projects.sme-procurement-plan',compact('project'));
    }

    public function addLocalProcurementPlan(Project $project){
        return view('projects.add-local-procurement',compact('project'));
    }

    public function getSpecialistProcurementPlan(Project $project){
        return view('projects.specialist-procurement-plan',compact('project'));
    }

    public function getLocalProcurementPlan(Project $project){
        return view('projects.local-procurement-plan',compact('project'));
    }

    public function addSMEProcurementPlan(Project $project){

        return view('projects.add-sme-procurement',compact('project'));
    }

    public function addSpecialistProcurementPlan(Project $project){
        return view('projects.add-specialist-procurement-plan',compact('project'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectStoreRequest $request)
    {
        //
        $input = $request->validated();
        DB::beginTransaction();
        try{
            $project = Project::create(['name'=>$input['name'],'ward'=>$input['ward'],'district'=>$input['district'],'local_municipality'=>$input['municipality'],'start_date'=>$input['start_date'],'creator_id'=>Auth::user()->id,'user_id'=>$input['user_id']]);

            DB::commit();
            return response()->json(['project'=>$project,'message'=>'Project created successfully'],200);

        }catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Project could not be saved at the moment ' . $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        return view('projects.project-dashboard',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
        DB::beginTransaction();
        try{
            $project->update($request->all());
            DB::commit();
            return response()->json(['project'=>$project->load('contractors','socios'),'message'=>'Project information updated successfully'],200);

        }catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Project information could not be updated at the moment ' . $e->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
        $project->delete();
        return redirect('/home');
    }
}
