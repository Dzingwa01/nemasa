<?php

namespace App\Http\Controllers;

use App\LocalProcumentPlan;
use App\Project;
use App\SpecialistProcurement;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class LocalProcurementController extends Controller
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

    public function getPackages(Project $project){
        $local_procs = $project->local_procs()->get();

        return Datatables::of($local_procs)->addColumn('action', function ($local_proc) {
            $re = '/local-proc/' . $local_proc->id;
            $sh = '/local-proc/' . $local_proc->id;
            $del = '/local-proc/delete/' . $local_proc->id;
            return '<a href=' . $sh . '><i class="material-icons " title="View Local Procurement Package" style="color:green">visibility</i></a><a href=' . $del . ' title="Delete Local Procurement Package" style="color:red"><i class="material-icons">delete_forever</i></a>';
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
    public function store(Request $request)
    {
        //
        $input = $request->all();
        DB::beginTransaction();
        try{
            $local_proc = LocalProcumentPlan::create($input);
            DB::commit();
            return response()->json(['local_proc'=>$local_proc,'message'=>'Local Procument package information created successfully'],200);

        }catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Local Procument package information could not be saved at the moment ' . $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(LocalProcumentPlan $local_proc)
    {
        //
        $project = $local_proc->project;

        return view('projects.add-local-procurement',compact('project','local_proc'));
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
    public function update(Request $request, LocalProcumentPlan $local_proc)
    {
        //
        $input = $request->all();
        DB::beginTransaction();
        try{
            $local_proc->update($input);
            DB::commit();
            return response()->json(['local_proc'=>$local_proc,'message'=>'Local Procument package information updated successfully'],200);

        }catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Local Procument package information could not be updated at the moment ' . $e->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LocalProcumentPlan $local_proc)
    {
        //
        DB::beginTransaction();
        try {
            $local_proc->delete();
            DB::commit();
            return redirect()->back();
        }
        catch (\Exception $e) {
                DB::rollback();
            DB::commit();
            return redirect()->back();
        }
    }
}
