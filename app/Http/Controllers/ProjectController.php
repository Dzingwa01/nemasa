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
    public function index()
    {
        //
    }

    public function getProjects()
    {
        $projects = Project::join('users','users.id','projects.user_id')
                ->select('projects.*','users.name as assigned_to')
                ->get();
        return Datatables::of($projects)->addColumn('action', function ($project) {
            $re = 'project/' . $project->id;
            $sh = 'projects/' . $project->id;
            $del = 'project/delete/' . $project->id;
            return '<a href=' . $sh . '><i class="material-icons tiny" title="View Project Dashboard" style="color:green">visibility</i></a><a href=' . $del . ' title="Delete" style="color:red"><i class="material-icons tiny">delete_forever</i></a>';
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
//        dd("ola");
        try{
            $project = Project::create(['name'=>$input['name'],'location'=>$input['location'],'information'=>$input['information'],'start_date'=>$input['start_date'],'creator_id'=>Auth::user()->id,'user_id'=>$input['user_id']]);

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
    public function update(Request $request, $id)
    {
        //
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
