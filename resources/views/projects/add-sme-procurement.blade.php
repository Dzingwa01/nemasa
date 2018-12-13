@extends("layouts.user_logged")

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h5 style="text-transform:uppercase;text-align: center;font-weight: bolder; margin-top:0.5em;">Project SME Procurement Plan</h5>
            <h6 style="text-transform:uppercase;text-align: center;font-weight: bolder;margin-top:1em;">{{$project->name .' - New Package'}}</h6>
        </div>
        {{--<div class="step-container_p" style="width: 650px; margin: 0 auto"></div>--}}
        <div class="row">

            <div class="col s12" style="margin-left: 2em;margin-right: 2em;">
                <ul class="tabs" >
                    <li class="tab col s3 active"><a href="#test1">SME Package Information</a></li>
                    <li class="tab col s3"><a href="#test2">SME Procurement Plan</a></li>
                    <li class="tab col s3"><a href="#test3">SME Award Information</a></li>
                    {{--<li class="tab col s3"><a href="#test4">Socio Economic Allowables</a></li>--}}
                </ul>
            </div>
            <div id="test1">
                <div  style="margin-left: 2em;margin-right: 2em;">
                    <form class="col s12" >
                        <h6 style="text-align: center;font-weight: bolder;">SME Package Information</h6>
                        @csrf
                        <div class="row">
                            <div class="input-field col m6 s12 s12">
                                <input id="package_number" type="text" value="{{!empty($project->sme_procs[0])?$project->sme_procs[0]->package_number:''}}" class="validate">
                                <label for="package_number">Package Number</label>
                            </div>
                            <div class="input-field col m6 s12 s12">
                                <textarea id="package_description"  class="materialize-textarea">{{!empty($project->sme_procs[0])?$project->sme_procs[0]->package_description:''}}</textarea>
                                <label for="package_description">Description</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6 s12 s12">
                                <input id="cibd_grade" type="text" value="{{!empty($project->sme_procs[0])?$project->sme_procs[0]->cibd_grade:''}}" class="validate">
                                <label for="cibd_grade">CIBD Grade</label>
                            </div>
                            <div class="input-field col m6 s12">
                                <input id="number_of_targetted_sms" value="{{!empty($project->sme_procs[0])?$project->sme_procs[0]->number_of_targetted_sms:''}}" type="number" class="validate">
                                <label for="number_of_targetted_sms">Number of SME(s) Targeted</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6 s12">
                                <input id="total_sme_package_est_budget" value="{{!empty($project->sme_procs[0])?$project->sme_procs[0]->total_sme_package_est_budget:''}}" type="number" step="0.01" class="validate">
                                <label for="total_sme_package_est_budget">Total SME Package Estimated Budget R</label>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div style="float:right">
                            <button class="btn waves-effect waves-light project-back" style="margin-left:2em;"  name="">Quit
                                <i class="material-icons right">close</i>
                            </button>
                            <button class="btn waves-effect waves-light" style="margin-left:2em;margin-right: 2em;" id="save-proc-1" name="action">Save
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="test2">
                <div  style="margin-left: 2em;margin-right: 2em;">
                    <form class="col s12">
                        <h6 style="text-align: center;font-weight: bolder;">SME Procurement Plan</h6>
                        @csrf
                        <div class="row">
                            <div class="input-field col m6 s12">
                                <input id="tender_date" value="{{!empty($project->sme_procs[0])?$project->sme_procs[0]->tender_date:''}}" type="text" class="datepicker" >
                                <label for="tender_date">Tender Date </label>
                            </div>
                            <div class="input-field col m6 s12">
                                <input id="tender_briefing_date" value="{{!empty($project->sme_procs[0])?$project->sme_procs[0]->tender_briefing_date:''}}" type="text" class="datepicker">
                                <label for="tender_briefing_date">Tender Briefing Date</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6 s12">
                                <input id="tender_closing_date" value="{{!empty($project->sme_procs[0])?$project->sme_procs[0]->tender_closing_date:''}}" type="text" class="datepicker">
                                <label for="tender_closing_date">Tender Closing Date</label>
                            </div>
                            <div class="input-field col m6 s12">
                                <input id="tender_adjudication_report_date" value="{{!empty($project->sme_procs[0])?$project->sme_procs[0]->tender_adjudication_report_date:''}}" type="text" class="datepicker">
                                <label for="tender_adjudication_report_date">Tender Adjudication Report Date</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6 s12">
                                <input id="tender_review_report_date" type="text" value="{{!empty($project->sme_procs[0])?$project->sme_procs[0]->tender_review_report_date:''}}" class="datepicker">
                                <label for="tender_review_report_date">Tender Review Report Date</label>
                            </div>
                            <div class="input-field col m6 s12">
                                <input id="tender_award_date" type="text" class="datepicker" value="{{!empty($project->sme_procs[0])?$project->sme_procs[0]->tender_award_date:''}}" class="validate">
                                <label for="tender_award_date">Tender Award Date</label>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div style="float:right">
                            <button class="btn waves-effect waves-light project-back" style="margin-left:2em;"  name="">Quit
                                <i class="material-icons right">close</i>
                            </button>
                            <button class="btn waves-effect waves-light" style="margin-left:2em;margin-right: 2em;" id="save-proc-2" name="action">Save
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="test3" >
                <div style="margin-left: 2em;margin-right: 2em;">
                    <form class="col m12">
                        <h6 style="text-align: center;font-weight: bolder;">SME Award Information</h6>
                        @csrf
                        <div class="row">
                            <div class="input-field col m6 s12">
                                <input id="name_of_sme_awarded" type="text" value="" class="validate">
                                <label for="name_of_sme_awarded"> Name Of SME Awarded Work Package</label>
                            </div>
                            <div class="input-field col m6 s12">
                                <input id="sme_black_ownership" type="text" class="materialize-textarea" />
                                <label for="sme_black_ownership">SME Black Ownership %</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6 s12">
                                <input id="sme_award_value" type="number"  step="0.02" class="validate">
                                <label for="sme_award_value">SME Award Value</label>
                            </div>
                            <div class="input-field col m6 s12">
                                <input id="sme_work_start_date" type="text" class="datepicker">
                                <label for="sme_work_start_date">SME Work Start Date</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6 s12">
                                <input id="sme_work_completion_date" type="text" class="datepicker">
                                <label for="sme_work_completion_date">SME Work Completion Date</label>
                            </div>
                            <div class="input-field col m6 s12">
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
                            <button class="btn waves-effect waves-light" style="margin-left:2em;margin-right: 2em;" id="save-proc-3" name="action">Save
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
                let project_id = {!! '"'. $project->id.'"' !!};
                let project ={!! $project !!};
                console.log("Project",project);
                let sme_proc = project.sme_procs[0]?project.sme_procs[0]:{};
                $('.project-back').on('click',function(){


                    window.location.href = '/sme-procurement-plan/'+project_id;
                });
                $('#save-proc-1').on('click',function(){
                    let project_id = {!! '"'. $project->id.'"' !!};
                    let formData = new FormData();
                    formData.append('package_number', $('#package_number').val());
                    formData.append('package_description', $('#package_description').val());
                    formData.append('cibd_grade', $('#cibd_grade').val());
                    formData.append('number_of_targetted_sms', $('#number_of_targetted_sms').val());
                    formData.append('total_sme_package_est_budget', $('#total_sme_package_est_budget').val());
                    formData.append('project_id', project_id);

                    console.log("project ", formData);
                    $.ajax({
                        url: "{{ route('sme-proc.store') }}",
                        processData: false,
                        contentType: false,
                        data: formData,
                        type: 'post',

                        success: function (response, a, b) {
                            console.log("success",response);
                            alert(response.message);
                            sme_proc = response.sme_proc;
                            $('#package_number').val(response.sme_proc.package_number);
                            $('#package_description').val(response.sme_proc.package_description);
                            $('#cibd_grade').val(response.project.cibd_grade);
                            $('#number_of_targetted_sms').val(response.sme_proc.number_of_targetted_sms);
                            $('#total_sme_package_est_budget').val(response.sme_proc.total_sme_package_est_budget);

                        },
                        error: function (response) {
                            console.log("error",response);
                            let message = response.message;
                            let errors = response.errors;
                            for (var error in   errors) {
                                console.log("error",error)
                                if( errors.hasOwnProperty(error) ) {
                                    message += errors[error] + "\n";
                                }
                            }
                            alert(message);
//                            $("#modal1").close();
                        }
                    });
                });
                $('#save-proc-2').on('click',function(){
                    let project_id = {!! '"'. $project->id.'"' !!};
                    let formData = new FormData();
                    formData.append('tender_date', $('#tender_date').val());
                    formData.append('tender_briefing_date', $('#tender_briefing_date').val());
                    formData.append('tender_closing_date', $('#tender_closing_date').val());
                    formData.append('tender_adjudication_report_date', $('#tender_adjudication_report_date').val());
                    formData.append('tender_review_report_date', $('#tender_review_report_date').val());
                    formData.append('tender_award_date', $('#tender_award_date').val());
                    let url = '/sme-proc/update-details/'+sme_proc.id;
                    console.log("project ", formData);
                    $.ajax({
                        url: url,
                        processData: false,
                        contentType: false,
                        data: formData,
                        type: 'post',

                        success: function (response, a, b) {
                            console.log("success",response);
                            alert(response.message);

                            $('#tender_date').val(response.sme_proc.tender_date);
                            $('#tender_briefing_date').val(response.sme_proc.tender_briefing_date);
                            $('#tender_closing_date').val(response.sme_proc.tender_closing_date);
                            $('#tender_adjudication_report_date').val(response.sme_proc.tender_adjudication_report_date);
                            $('#tender_review_report_date').val(response.sme_proc.tender_review_report_date);
                            $('#tender_award_date').val(response.sme_proc.tender_award_date);
                        },
                        error: function (response) {
                            console.log("error",response);
                            let message = response.message;
                            let errors = response.errors;
                            for (var error in   errors) {
                                console.log("error",error)
                                if( errors.hasOwnProperty(error) ) {
                                    message += errors[error] + "\n";
                                }
                            }
                            alert(message);
//                            $("#modal1").close();
                        }
                    });
                });
                $('#save-proc-3').on('click',function(){
                    let project_id = {!! '"'. $project->id.'"' !!};
                    let formData = new FormData();
                    formData.append('name_of_sme_awarded', $('#name_of_sme_awarded').val());
                    formData.append('sme_black_ownership', $('#sme_black_ownership').val());
                    formData.append('sme_award_value', $('#sme_award_value').val());
                    formData.append('sme_work_start_date', $('#sme_work_start_date').val());
                    formData.append('sme_work_completion_date', $('#sme_work_completion_date').val());
                    formData.append('sme_further_sub_contracting', $('#sme_further_sub_contracting').val());

                    console.log("project ", formData);
                    let url = '/sme-proc/update-details/'+sme_proc.id;
                    $.ajax({
                        url: url,
                        processData: false,
                        contentType: false,
                        data: formData,
                        type: 'post',

                        success: function (response, a, b) {
                            console.log("success",response);
                            alert(response.message);
                            $('#name_of_sme_awarded').val(response.sme_proc.name_of_sme_awarded);
                            $('#sme_black_ownership').val(response.sme_proc.sme_black_ownership);
                            $('#sme_award_value').val(response.sme_proc.sme_award_value);
                            $('#sme_work_start_date').val(response.sme_proc.sme_work_start_date);
                            $('#sme_work_completion_date').val(response.sme_proc.sme_work_completion_date);
                            $('#sme_further_sub_contracting').val(response.sme_proc.sme_further_sub_contracting);
                        },
                        error: function (response) {
                            console.log("error",response);
                            let message = response.message;
                            let errors = response.errors;
                            for (var error in   errors) {
                                console.log("error",error)
                                if( errors.hasOwnProperty(error) ) {
                                    message += errors[error] + "\n";
                                }
                            }
                            alert(message);
//                            $("#modal1").close();
                        }
                    });
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