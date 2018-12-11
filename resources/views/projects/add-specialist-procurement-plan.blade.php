@extends("layouts.user_logged")

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h5 style="text-transform:uppercase;text-align: center;font-weight: bolder; margin-top:0.5em;">Specialist Procurement Plan</h5>
            <h6 style="text-transform:uppercase;text-align: center;font-weight: bolder;margin-top:1em;">Project
                Dashboard:{{$project->name}}</h6>
        </div>
        {{--<div class="step-container_p" style="width: 650px; margin: 0 auto"></div>--}}
        <div class="row" style="margin-left: 2em;margin-right: 2em;">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3 active"><a href="#test1">SME Package Information</a></li>
                    <li class="tab col s3"><a href="#test2">SME Procurement Plan</a></li>
                    <li class="tab col s3"><a href="#test3">SME Award Information</a></li>
                    {{--<li class="tab col s3"><a href="#test4">Socio Economic Allowables</a></li>--}}
                </ul>
            </div>
            <div id="test1"><h6 style="text-align: center;font-weight: bolder;">SME Package Information</h6>
                <div class="row">
                    <form class="col s12">
                        @csrf
                        <div class="row">
                            <div class="input-field col m6">
                                <input id="package_number" type="text" class="validate">
                                <label for="package_number">Package Number</label>
                            </div>
                            <div class="input-field col m6">
                                <textarea id="package_description"  class="materialize-textarea"></textarea>
                                <label for="package_description">Description</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6">
                                <input id="cibd_grade" type="text" class="validate">
                                <label for="cibd_grade">CIBD Grade</label>
                            </div>
                            <div class="input-field col m6">
                                <input id="number_of_targetted_sms" type="number" class="validate">
                                <label for="number_of_targetted_sms">Number of SME(s) Targeted</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6">
                                <input id="total_sme_package_est_budget" type="number" step="0.01" class="validate">
                                <label for="number_of_targetted_sms">Total SME Package Estimated Budget R</label>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div style="float:right">
                            <button class="btn waves-effect waves-light project-back" style="margin-left:2em;"  name="">Quit
                                <i class="material-icons right">close</i>
                            </button>
                            <button class="btn waves-effect waves-light" style="margin-left:2em;" id="save-socios" name="action">Save
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="test2"><h6 style="text-align: center;font-weight: bolder;">SME Procurement Plan</h6>
                <div class="row">
                    <form class="col s12">
                        @csrf
                        <div class="row">
                            <div class="input-field col m6">
                                <input id="tender_date" type="text" class="datepicker" >
                                <label for="tender_date">Tender Date </label>
                            </div>
                            <div class="input-field col m6">
                                <input id="tender_briefing_date" type="text" class="datepicker">
                                <label for="tender_briefing_date">Tender Briefing Date</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6">
                                <input id="tender_closing_date" type="text" class="datepicker">
                                <label for="tender_closing_date">Tender Closing Date</label>
                            </div>
                            <div class="input-field col m6">
                                <input id="tender_adjudication_report_date" type="text" class="validate">
                                <label for="tender_adjudication_report_date">Tender Adjudication Report Date</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6">
                                <input id="tender_review_report_date" type="text" class="datepicker">
                                <label for="tender_review_report_date">Tender Review Report Date</label>
                            </div>
                            <div class="input-field col m6">
                                <input id="tender_award_date" type="text" class="validate">
                                <label for="tender_award_date">Tender Award Date</label>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div style="float:right">
                            <button class="btn waves-effect waves-light project-back" style="margin-left:2em;"  name="">Quit
                                <i class="material-icons right">close</i>
                            </button>
                            <button class="btn waves-effect waves-light" style="margin-left:2em;" id="save-socios" name="action">Save
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="test3" ><h6 style="text-align: center;font-weight: bolder;">SME Award Information</h6>
                <div class="row">
                    <form class="col m12">
                        @csrf
                        <div class="row">
                            <div class="input-field col m6">
                                <input id="name_of_sme_awarded" type="text" value="" class="validate">
                                <label for="name_of_sme_awarded"> Name Of SME Awarded Work Package</label>
                            </div>
                            <div class="input-field col m6">
                                <input id="sme_black_ownership" type="text" class="materialize-textarea" />
                                <label for="sme_black_ownership">SME Black Ownership %</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6">
                                <input id="sme_award_value" type="number"  step="0.02" class="validate">
                                <label for="sme_award_value">SME Award Value</label>
                            </div>
                            <div class="input-field col m6">
                                <input id="sme_work_start_date" type="text" class="datepicker">
                                <label for="sme_work_start_date">SME Work Start Date</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6">
                                <input id="sme_work_completion_date" type="text" class="datepicker">
                                <label for="sme_work_completion_date">SME Work Completion Date</label>
                            </div>
                            <div class="input-field col m6">
                                <input id="sme_further_sub_contracting" type="text" class="validate">
                                <label for="sme_further_sub_contracting">SME Further Sub-Contracting</label>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div style="float:right">
                            <button class="btn waves-effect waves-light project-back" style="margin-left:2em;" >Quit
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
    </div>

        @push('custom-scripts-contract')
            <script>
                $(document).ready(function () {
                    $('.project-back').on('click',function(){

                        let project_id = {!! '"'. $project->id.'"' !!};
                        window.location.href = '/specialist-procurement-plan/'+project_id;
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