@extends("layouts.user_logged")

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h5 style="text-transform:uppercase;text-align: center;font-weight: bolder; margin-top:0.5em;">Contract Award
                Calculation</h5>
            <h6 style="text-transform:uppercase;text-align: center;font-weight: bolder;margin-top:1em;">Project
                Dashboard:{{$project->name}}</h6>
        </div>
        {{--<div class="step-container_p" style="width: 650px; margin: 0 auto"></div>--}}
        <div class="row" style="margin-left: 2em;margin-right: 2em;">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3 active"><a href="#test1">Project Location</a></li>
                    <li class="tab col s3"><a href="#test2">Contractor Information</a></li>
                    <li class="tab col s3"><a href="#test3">Project Information</a></li>
                    <li class="tab col s3"><a href="#test4">Socio Economic Allowables</a></li>
                </ul>
            </div>
            <div id="test1"><h6 style="text-align: center;font-weight: bolder;">Project Location</h6>
                <div class="row">
                    <form class="col s12">
                        @csrf
                        <div class="row">
                            <div class="input-field col m6">
                                <input id="ec_district_area" type="text" class="validate">
                                <label for="ec_district_area">EC District Area</label>
                            </div>
                            <div class="input-field col m6">
                                <input id="municipality" type="text" class="validate">
                                <label for="municipality">Local Municipality</label>
                            </div>
                        </div>
                        <div class="row">

                            <div class="input-field col m6">
                                <input id="ward" type="text" class="validate">
                                <label for="ward">Ward</label>
                            </div>
                        </div>

                    </form>
                    <div class="row">
                        <div style="float:right">
                            <button class="btn waves-effect waves-light project-dashboard" style="margin-left:2em;"  name="">Dashboard
                                <i class="material-icons right">close</i>
                            </button>
                            <button class="btn waves-effect waves-light" style="margin-left:2em;" id="save-socios" name="action">Save
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="test2"><h6 style="text-align: center;font-weight: bolder;">Contractor Information</h6>
                <div class="row">
                    <form class="col s12">
                        @csrf
                        <div class="row">
                            <div class="input-field col m6">
                                <input id="contractor_name" type="text" class="validate">
                                <label for="contractor_name">Contractor Name</label>
                            </div>
                            <div class="input-field col m6">
                                <input id="contractor_contact_person" type="text" class="validate">
                                <label for="contractor_contact_person">Contractor Contact Person</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6">
                                <input id="contractor_manager_name" type="text" class="validate">
                                <label for="contractor_manager_name">Contractor SME Manager Name</label>
                            </div>

                        </div>
                        <div class="row">
                            <div class="input-field col m6">
                                <input id="landline" type="tel" class="validate">
                                <label for="landline">Landline</label>
                            </div>
                            <div class="input-field col m6">
                                <input id="mobile" type="tel" class="validate">
                                <label for="mobile">Mobile</label>
                            </div>
                        </div>

                    </form>
                    <div class="row">
                        <div style="float:right">
                            <button class="btn waves-effect waves-light project-dashboard" style="margin-left:2em;"  name="">Dashboard
                                <i class="material-icons right">close</i>
                            </button>
                            <button class="btn waves-effect waves-light" style="margin-left:2em;" id="save-socios" name="action">Save
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="test3" ><h6 style="text-align: center;font-weight: bolder;">Project Information</h6>
                <div class="row">
                    <form class="col m12">
                        @csrf
                        <div class="row">
                            <div class="input-field col m6">
                                <input id="name" type="text" value="{{$project->name}}" class="validate">
                                <label for="name">Project/Facility Name</label>
                            </div>
                            <div class="input-field col m6">
                                <textarea id="scope" type="text" class="materialize-textarea"></textarea>
                                <label for="scope">Scope of Works</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6">
                                <input id="contract_sum_excl" type="number" class="validate">
                                <label for="contract_sum_excl">Contract Sum Excl</label>
                            </div>
                            <div class="input-field col m6">
                                <textarea id="preliminary_general" class="materialize-textarea"></textarea>
                                <label for="preliminary_general">Preliminary & General (R:)</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6">
                                <input id="contigency_allowable" type="number" class="validate">
                                <label for="contigency_allowable">Contigency Allowable</label>
                            </div>
                            <div class="input-field col m6">
                                <textarea id="socio_economic_allowables" class="materialize-textarea"></textarea>
                                <label for="socio_economic_allowables">Socio Economic Allowables</label>
                            </div>
                        </div>


                    </form>
                    <div class="row">
                        <div style="float:right">
                            <button class="btn waves-effect waves-light project-dashboard" style="margin-left:2em;" >Dashboard
                                <i class="material-icons right">close</i>
                            </button>
                            <button class="btn waves-effect waves-light" style="margin-left:2em;" id="save-socios" name="action">Save
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="test4"><h6 style="text-align: center;font-weight: bolder;">Socio Economic Allowables</h6>
            <div class="row">
                <form class="col m12">
                    @csrf
                    <div class="row">
                        <div class="input-field col m6">
                            <input id="community_liason_officer_fee" type="number" class="validate">
                            <label for="community_liason_officer_fee">Community Liason Officer (R)</label>
                        </div>
                        <div class="input-field col m6">
                            <input id="interns_fee" type="number" class="validate" />
                            <label for="interns_fee">Interns (R)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m6">
                            <input id="graduates_fee" type="number" class="validate">
                            <label for="graduates_fee">Graduates (R)</label>
                        </div>
                        <div class="input-field col m6">
                            <input id="psc_community_members" class="validate" type="number">
                            <label for="psc_community_members">PSC Community Members (R)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m6">
                            <input id="employment_relations_coordinator" type="number" class="validate">
                            <label for="employment_relations_coordinator">Employment Relations Coordinator (R)</label>
                        </div>
                        <div class="input-field col m6">
                            <input id="hiv_awareness" class="validate" type="number">
                            <label for="hiv_awareness">HIV Awareness (R)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m6">
                            <input id="business_desk_support_fee" type="number" class="validate">
                            <label for="business_desk_support_fee">Business Desk Support (R)</label>
                        </div>
                        <div class="input-field col m6">
                            <input id="sme_tender_manager_fee" class="validate" type="number">
                            <label for="sme_tender_manager_fee">30% SME Tender Management (R)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m6">
                            <input id="local_procurement_management_fee" type="number" class="validate">
                            <label for="local_procurement_management_fee">50% Local Procurement Management (R)</label>
                        </div>
                        <div class="input-field col m6">
                            <input id="contractor_attendance_profit" class="validate" type="number">
                            <label for="contractor_attendance_profit">Contractor Attendance & Profit (R)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m6">
                            <input id="contractor_technical_mentor_fee" type="number" class="validate">
                            <label for="contractor_technical_mentor_fee">Contractor Technical Mentor (R)</label>
                        </div>
                        <div class="input-field col m6">
                            <input id="sme_prelim_general_allowance" type="number" class="validate">
                            <label for="sme_prelim_general_allowance">SME Preliminary & General Allocance (R)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m6">
                            <input id="work_budget" type="number" class="validate">
                            <label for="work_budget">Work Budget (R)</label>
                        </div>
                        <div class="input-field col m6">
                            <input id="targeted_sme_participation_fee" type="number" class="validate">
                            <label for="targeted_sme_participation_fee">Target SME Participation in %</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m6">
                            <input id="sme_package_value_target" type="number" class="validate">
                            <label for="sme_package_value_target">SME Package Value Target</label>
                        </div>
                        <div class="input-field col m6">
                            <input id="targeted_procument_value" type="number" class="validate">
                            <label for="targeted_procument_value">targeted Procument Value (R)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m6">
                            <input id="local_procument_targeted_value" type="number" class="validate">
                            <label for="local_procument_targeted_value">Local Procument Targeted Value</label>
                        </div>
                        
                    </div>

                </form>
                <div class="row">
                    <div style="float:right">
                        <button class="btn waves-effect waves-light project-dashboard" style="margin-left:2em;">Dashboard
                            <i class="material-icons right">close</i>
                        </button>
                        <button class="btn waves-effect waves-light" style="margin-left:2em;" id="save-socios" name="action">Save
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('custom-scripts-contract')
        <script>
            $(document).ready(function () {
                $('.project-dashboard').on('click',function(){

                    let project_id = {!! '"'. $project->id.'"' !!};
                   window.location.href = '/projects/'+project_id;
                });
            });
//            initialiseStepper();
           function initialiseStepper(){
               $(".step-container_p").stepMaker({
                   steps: ["Project Location","Contractor Information","Project Information","Socio Economic Allowables"],
                   currentStep: 1
               });
            }
        </script>
    @endpush
@endsection