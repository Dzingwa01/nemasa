<?php

namespace App\Http\Controllers;

use App\Project;
use App\SpecialistProcurement;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class SpecialistProcurementController extends Controller
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

    public function getSpecialistProcurementPackages(Project $project){
        $specialist_procs = $project->specialist_procs()->get();

        return Datatables::of($specialist_procs)->addColumn('action', function ($specialist_proc) {
            $re = '/specialist-proc/' . $specialist_proc->id;
            $sh = '/specialist-proc/' . $specialist_proc->id;
            $del = '/specialist-proc/delete/' . $specialist_proc->id;
            return '<a href=' . $sh . '><i class="material-icons " title="View Specialist Procurement Package" style="color:green">visibility</i></a><a href=' . $del . ' title="Delete Specialist Procurement Package" style="color:red"><i class="material-icons">delete_forever</i></a>';
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
            $specialist_proc = SpecialistProcurement::create($input);
            DB::commit();
            return response()->json(['specialist_proc'=>$specialist_proc,'message'=>'Specialist Procument package information created successfully'],200);

        }catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Specialist Procument package information could not be saved at the moment ' . $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SpecialistProcurement $specialist_proc)
    {
        //
        $project = $specialist_proc->project;

        return view('projects.add-specialist-procurement-plan',compact('project','specialist_proc'));
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
    public function update(Request $request, SpecialistProcurement $specialist_proc)
    {
        //
        $input = $request->all();
        DB::beginTransaction();
        try{
            $specialist_proc->update($input);
            DB::commit();
            return response()->json(['specialist_proc'=>$specialist_proc,'message'=>'Specialist Procument package information updated successfully'],200);

        }catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Specialist Procument package information could not be updated at the moment ' . $e->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpecialistProcurement $specialist_proc)
    {
        //
        DB::beginTransaction();
        try {
            $specialist_proc->delete();
            DB::commit();
            return redirect()->back();
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back();
        }
    }
}
