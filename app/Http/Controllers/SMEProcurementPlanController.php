<?php

namespace App\Http\Controllers;

use App\Project;
use App\SMEProcurementPlan;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class SMEProcurementPlanController extends Controller
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
        $sme_procs = $project->sme_procs()->get();

        return Datatables::of($sme_procs)->addColumn('action', function ($sme_proc) {
            $re = '/sme-proc/' . $sme_proc->id;
            $sh = '/sme-proc/' . $sme_proc->id;
            $del = '/sme-proc/delete/' . $sme_proc->id;
            return '<a href=' . $sh . '><i class="material-icons " title="View SME Package" style="color:green">visibility</i></a><a href=' . $del . ' title="Delete SME Package" style="color:red"><i class="material-icons">delete_forever</i></a>';
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
            $sme_proc = SMEProcurementPlan::create($input);
            DB::commit();
            return response()->json(['sme_proc'=>$sme_proc,'message'=>'SME Procument package information created successfully'],200);

        }catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'SME Procument package information could not be saved at the moment ' . $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SMEProcurementPlan $sme_proc)
    {
        //
        $project = $sme_proc->project;
        return view('projects.add-sme-procurement',compact('project','sme_proc'));
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
    public function update(Request $request, SMEProcurementPlan $sme_proc)
    {
        //
        $input = $request->all();
        DB::beginTransaction();
        try{
            $sme_proc->update($input);
            DB::commit();
            return response()->json(['sme_proc'=>$sme_proc,'message'=>'SME Procument package information updated successfully'],200);

        }catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'SME Procument package information could not be updated at the moment ' . $e->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SMEProcurementPlan $sme_proc)
    {
        //
        DB::beginTransaction();
        try{
            $sme_proc->delete();
            DB::commit();
            return redirect()->back();
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->back();
        }

    }
}
