@extends("layouts.user_logged")

@section('content')
    <div class="container-fluid">
        <div class="row" style="margin-left: 2em;margin-right: 2em;">
            <h5 style="text-transform:uppercase;text-align: center;font-weight: bolder; margin-top:0.5em;">Contract Award
                Calculation</h5>
            <h6 style="text-transform:uppercase;text-align: center;font-weight: bolder;margin-top:1em;">Project
                Name:{{$project->name}}</h6>
        </div>
        {{--<div class="step-container_p" style="width: 650px; margin: 0 auto"></div>--}}
        <div class="row card hoverable" style="margin-left: 2em;margin-right: 2em;">
            <div class="col s12" style="margin-top:1em;">
                <ul class="tabs">
                    <li class="tab col s2 active"><a href="#test1">Project Location</a></li>
                    <li class="tab col s2"><a href="#test3">Project Information</a></li>
                    <li class="tab col s3"><a href="#test2">Contractor Information</a></li>
                    <li class="tab col s3"><a href="#test4">Socio Economic Allowables</a></li>
                    <li class="tab col s2"><a href="#test5">Budget</a></li>
                </ul>
            </div>
            {{--{{dd($project)}}--}}
            <div id="test1">
                <div class="row">
                    <form class="col s12">
                        <h6 style="text-align: center;font-weight: bolder;margin-top:0.5em!important;">Project Location</h6>
                        @csrf
                        <div class="row">
                            <div class="input-field col m6 s12">
                                <input id="ec_district_area" type="text" value="{{$project->district}}" class="validate">
                                <label for="ec_district_area">EC District Area</label>
                            </div>
                            <div class="input-field col m6 s12">
                                <input id="municipality" type="text" value="{{$project->local_municipality}}" class="validate">
                                <label for="municipality">Local Municipality</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6 s12">
                                <input id="ward" type="text" value="{{$project->ward}}" class="validate">
                                <label for="ward">Ward</label>
                            </div>
                        </div>

                    </form>
                    <div class="row">
                        <div style="float:right">
                            <button class="btn waves-effect waves-light project-dashboard" style="margin-left:2em;"  name="">Back
                                <i class="material-icons right">arrow_back</i>
                            </button>
                            <button class="btn waves-effect waves-light" style="margin-left:2em;margin-right: 2em;" id="save-location" name="action">Update
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="test2">
                <div class="row">
                    <form class="col s12">
                        <h6 style="text-align: center;font-weight: bolder;">Contractor Information</h6>
                        @csrf
                        <div class="row">
                            {{--{{dd($project)}}--}}
                            <div class="input-field col m6 s12">
                                <input id="contractor_name" type="text" value="{{!empty($project->contractors[0])?$project->contractors[0]->contractor_name:''}}" class="validate">
                                <label for="contractor_name">Contractor Name</label>
                            </div>
                            <div class="input-field col m6 s12">
                                <input id="contact_person" value="{{!empty($project->contractors[0])?$project->contractors[0]->contact_person:''}}" type="text" class="validate">
                                <label for="contact_person">Contractor Contact Person</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6 s12">
                                <input id="sme_manager_name" type="text" value="{{!empty($project->contractors[0])?$project->contractors[0]->sme_manager_name:''}}"  class="validate">
                                <label for="sme_manager_name">Contractor SME Manager Name</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col m6 s12">
                                <input id="landline" type="tel" value="{{!empty($project->contractors[0])?$project->contractors[0]->landline:''}}" class="validate">
                                <label for="landline">Landline</label>
                            </div>
                            <div class="input-field col m6 s12">
                                <input id="mobile" type="tel" value="{{!empty($project->contractors[0])?$project->contractors[0]->mobile:''}}" class="validate">
                                <label for="mobile">Mobile</label>
                            </div>
                        </div>

                    </form>
                    <div class="row">
                        <div style="float:right">
                            <button class="btn waves-effect waves-light project-dashboard" style="margin-left:2em;"  name="">Back
                                <i class="material-icons left">arrow_back</i>
                            </button>
                            <button class="btn waves-effect waves-light" style="margin-left:2em;margin-right: 2em;" id="save-contractor" name="action">Save
                                <i class="material-icons right">send</i>
                            </button>
                            <button class="btn waves-effect waves-light" style="margin-left:2em;margin-right: 2em;" hidden id="update-contractor" name="action">Update
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="test3" >
                <div class="row">
                    <form class="col m12">
                        <h6 style="text-align: center;font-weight: bolder;">Project Information</h6>
                        @csrf
                        <div class="row">
                            <div class="input-field col m6 s12">
                                <input id="project_name" type="text" value="{{$project->name}}" class="validate">
                                <label for="project_name">Project/Facility Name</label>
                            </div>
                            <div class="input-field col m6 s12">
                                <textarea id="scope_of_work" type="text" class="materialize-textarea">{{$project->scope_of_work}}</textarea>
                                <label for="scope_of_work">Scope of Works</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6 s12">
                                <input id="contract_sum_excl" type="number" step="0.01" value="{{$project->contract_sum_excl}}" class="validate">
                                <label for="contract_sum_excl">Contract Sum Excl</label>
                            </div>
                            <div class="input-field col m6 s12">
                                <input id="preliminary_general" type="number" value="{{$project->preliminary_general}}" class="validate" step="0.01">
                                <label for="preliminary_general">Preliminary & General (R)</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6 s12">
                                <input id="contigency_allowable" type="number" step="0.01" value="{{$project->contigency_allowable}}" class="validate">
                                <label for="contigency_allowable">Contigency Allowable</label>
                            </div>
                            <div class="input-field col m6 s12">
                                <input id="socio_economic_allowables" type="number" value="{{$project->socio_economic_allowables}}" step="0.01" class="validate">
                                <label for="socio_economic_allowables">Socio Economic Allowables</label>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div style="float:right">
                            <button class="btn waves-effect waves-light project-dashboard" style="margin-left:2em;" >Back
                                <i class="material-icons left">arrow_back</i>
                            </button>
                            <button class="btn waves-effect waves-light" style="margin-left:2em;margin-right: 2em;" id="save-project-information" name="action">Update
                                <i class="material-icons right">send</i>
                            </button>

                        </div>
                    </div>
                </div>
            </div>
            <div id="test4">
            <div class="row">
                <form class="col m12">
                    <h6 style="text-align: center;font-weight: bolder;">Socio Economic Allowables</h6>
                    @csrf
                    <div class="row">
                        <div class="input-field col m6 s12">
                            <input id="community_liason_officer_fee" value="{{!empty($project->socios[0])?$project->socios[0]->community_liason_officer_fee:''}}" type="number" class="validate">
                            <label for="community_liason_officer_fee">Community Liason Officer (R)</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="interns_fee" type="number" value="{{!empty($project->socios[0])?$project->socios[0]->interns_fee:''}}"  class="validate" />
                            <label for="interns_fee">Interns (R)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m6 s12">
                            <input id="graduates_fee" type="number" value="{{!empty($project->socios[0])?$project->socios[0]->graduates_fee:''}}"  class="validate">
                            <label for="graduates_fee">Graduates (R)</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="psc_community_members" value="{{!empty($project->socios[0])?$project->socios[0]->psc_community_members:''}}"  class="validate" type="number">
                            <label for="psc_community_members">PSC Community Members (R)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m6 s12">
                            <input id="employment_relations_coordinator" value="{{!empty($project->socios[0])?$project->socios[0]->employment_relations_coordinator:''}}"  type="number" class="validate">
                            <label for="employment_relations_coordinator">Employment Relations Coordinator (R)</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="hiv_awareness" class="validate" value="{{!empty($project->socios[0])?$project->socios[0]->hiv_awareness:''}}"  type="number">
                            <label for="hiv_awareness">HIV Awareness (R)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m6 s12">
                            <input id="business_desk_support_fee" value="{{!empty($project->socios[0])?$project->socios[0]->business_desk_support_fee:''}}"  type="number" class="validate">
                            <label for="business_desk_support_fee">Business Desk Support (R)</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="sme_tender_manager_fee" value="{{!empty($project->socios[0])?$project->socios[0]->sme_tender_manager_fee:''}}"  class="validate" type="number">
                            <label for="sme_tender_manager_fee">30% SME Tender Management (R)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m6 s12">
                            <input id="local_procurement_management_fee" value="{{!empty($project->socios[0])?$project->socios[0]->local_procurement_management_fee:''}}"  type="number" class="validate">
                            <label for="local_procurement_management_fee">50% Local Procurement Management (R)</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="contractor_attendance_profit" value="{{!empty($project->socios[0])?$project->socios[0]->contractor_attendance_profit:''}}"  class="validate" type="number">
                            <label for="contractor_attendance_profit">Contractor Attendance & Profit (R)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m6 s12">
                            <input id="contractor_technical_mentor_fee" value="{{!empty($project->socios[0])?$project->socios[0]->contractor_technical_mentor_fee:''}}"  type="number" class="validate">
                            <label for="contractor_technical_mentor_fee">Contractor Technical Mentor (R)</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="sme_prelim_general_allowance" value="{{!empty($project->socios[0])?$project->socios[0]->sme_prelim_general_allowance:''}}"  type="number" class="validate">
                            <label for="sme_prelim_general_allowance">SME Preliminary & General Allocance (R)</label>
                        </div>
                    </div>

                </form>
                <div class="row">
                    <div style="float:right">
                        <button class="btn waves-effect waves-light project-dashboard" style="margin-left:2em;">Back
                            <i class="material-icons left">arrow_back</i>
                        </button>
                        <button class="btn waves-effect waves-light" style="margin-left:2em;margin-right: 2em;" id="save-socios" name="action">Save
                            <i class="material-icons right">send</i>
                        </button>
                        <button class="btn waves-effect waves-light" style="margin-left:2em;margin-right: 2em;" id="update-socios" hidden name="action">Update
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
            <div id="test5">
                    <form class="col s12">
                        <h6 style="text-align: center;font-weight: bolder;">Budget</h6>
                        @csrf
                        <div class="row">
                            <div class="input-field col m6 s12">
                                <input id="work_budget" type="number" class="validate">
                                <label for="work_budget">Work Budget (R)</label>
                            </div>
                            <div class="input-field col m6 s12">
                                <input id="targeted_sme_participation_fee" type="number" class="validate">
                                <label for="targeted_sme_participation_fee">Target SME Participation in %</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6 s12">
                                <input id="sme_package_value_target" type="number" class="validate">
                                <label for="sme_package_value_target">SME Package Value Target</label>
                            </div>
                            <div class="input-field col m6 s12">
                                <input id="targeted_procument_value" type="number" class="validate">
                                <label for="targeted_procument_value">Targeted Procument Value (R)</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6 s12">
                                <input id="local_procument_targeted_value" type="number" class="validate">
                                <label for="local_procument_targeted_value">Local Procument Targeted Value</label>
                            </div>

                        </div>
                    </form>
                    <div class="row">
                        <div style="float:right">
                            <button class="btn waves-effect waves-light project-dashboard" style="margin-left:2em;"  name="">Back
                                <i class="material-icons left">arrow_back</i>
                            </button>
                            <button class="btn waves-effect waves-light" style="margin-left:2em;margin-right: 2em;" id="save-budget" >Save
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
                let project = {!!$project!!};
                if(project.contractors[0]){
                    $('#update-contractor').show();
                    $('#save-contractor').hide();
                }else{
                    $('#update-contractor').hide();
                    $('#save-contractor').show();
                }
                if(project.socios[0]){
                    $('#update-socios').show();
                    $('#save-socios').hide();
                }else{
                    $('#update-socios').hide();
                    $('#save-socios').show();
                }
                console.log("Check project here",project);

                $('.project-dashboard').on('click',function(){

                    let project_id = {!! '"'. $project->id.'"' !!};
                   window.location.href = '/projects/'+project_id;
                });
                $('#save-contractor').on('click',function(){
                    let project_id = {!! '"'. $project->id.'"' !!};
                    let formData = new FormData();
                    formData.append('contractor_name', $('#contractor_name').val());
                    formData.append('contact_person', $('#contact_person').val());
                    formData.append('sme_manager_name', $('#sme_manager_name').val());
                    formData.append('landline', $('#landline').val());
                    formData.append('mobile', $('#mobile').val());
                    formData.append('project_id', project_id);
                    console.log("project ", formData);
                    $.ajax({
                        url: "{{ route('contractors.store') }}",
                        processData: false,
                        contentType: false,
                        data: formData,
                        type: 'post',

                        success: function (response, a, b) {
                            console.log("success",response);
                            alert(response.message);
                            $('#contractor_name').val(response.contractor.contractor_name);
                            $('#contact_person').val(response.contractor.contact_person);
                            $('#sme_manager_name').val(response.contractor.sme_manager_name);
                            $('#landline').val(response.contractor.landline);
                            $('#mobile').val(response.contractor.mobile);
                            $('#save-contractor').hide();
                            $('#update-contractor').show();
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
                            $("#modal1").close();
                        }
                    });
                });
                $('#update-contractor').on('click',function(){
                    let project_id = {!! '"'. $project->id.'"' !!};
                    let formData = new FormData();
                    formData.append('contractor_name', $('#contractor_name').val());
                    formData.append('contact_person', $('#contact_person').val());
                    formData.append('sme_manager_name', $('#sme_manager_name').val());
                    formData.append('landline', $('#landline').val());
                    formData.append('mobile', $('#mobile').val());
                    formData.append('project_id', project_id);
                    console.log("project ", formData);
                    let url = '/contractors/update-details/'+project.contractors[0].id;
                        $.ajax({
                            url: url,
                            processData: false,
                            contentType: false,
                            data: formData,
                            type: 'post',

                            success: function (response, a, b) {
                                console.log("success",response);
                                alert(response.message);
                                $('#contractor_name').val(contractor.contractor_name);
                                $('#contact_person').val(contractor.contact_person);
                                $('#sme_manager_name').val(contractor.sme_manager_name);
                                $('#landline').val(contractor.landline);
                                $('#mobile').val(contractor.mobile);
//                                $('#save-contractor').show();
//                                $('#update-contractor').hide();
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
                                $("#modal1").close();
                            }
                        });

                });
                $('#save-project-information').on('click',function(){
                    let project_id = {!! '"'. $project->id.'"' !!};
                    let formData = new FormData();
                    formData.append('name', $('#project_name').val());
                    formData.append('scope_of_work', $('#scope_of_work').val());
                    formData.append('contract_sum_excl', $('#contract_sum_excl').val());
                    formData.append('preliminary_general', $('#preliminary_general').val());
                    formData.append('contigency_allowable', $('#contigency_allowable').val());
                    formData.append('socio_economic_allowables',$('#socio_economic_allowables').val());
                    formData.append('project_id', project_id);
                    console.log("project ", formData);
                    $.ajax({
                        url: "{{ url('projects/update/'.$project->id) }}",
                        processData: false,
                        contentType: false,
                        data: formData,
                        type: 'post',

                        success: function (response, a, b) {
                            console.log("success",response);
                            alert(response.message);
                            $('#project_name').val(response.project.name);
                            $('#scope_of_work').val(response.project.scope_of_work);
                            $('#contract_sum_excl').val(response.project.contract_sum_excl);
                            $('#preliminary_general').val(response.project.preliminary_general);
                            $('#contigency_allowable').val(response.project.contigency_allowable);
                            $('#socio_economic_allowables').val(response.project.socio_economic_allowables);
//                            $('#save-project-information').hide();
//                            $('#update-project-information').show();
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
                            $("#modal1").close();
                        }
                    });
                });

                $('#save-socios').on('click',function(){
                    let project_id = {!! '"'. $project->id.'"' !!};
                    console.log("Check here",project);
                    let formData = new FormData();
                    formData.append('community_liason_officer_fee', $('#community_liason_officer_fee').val());
                    formData.append('interns_fee', $('#interns_fee').val());
                    formData.append('graduates_fee', $('#graduates_fee').val());
                    formData.append('psc_community_members', $('#psc_community_members').val());
                    formData.append('employment_relations_coordinator', $('#employment_relations_coordinator').val());

                    formData.append('hiv_awareness', $('#hiv_awareness').val());
                    formData.append('business_desk_support_fee', $('#business_desk_support_fee').val());
                    formData.append('sme_tender_manager_fee', $('#sme_tender_manager_fee').val());
                    formData.append('local_procurement_management_fee', $('#local_procurement_management_fee').val());
                    formData.append('contractor_attendance_profit', $('#contractor_attendance_profit').val());
                    formData.append('contractor_technical_mentor_fee', $('#contractor_technical_mentor_fee').val());
                    formData.append('sme_prelim_general_allowance', $('#sme_prelim_general_allowance').val());
                    formData.append('project_id', project_id);

                    console.log("socios ", formData);
                    $.ajax({
                        url: "{{ route('socios.store') }}",
                        processData: false,
                        contentType: false,
                        data: formData,
                        type: 'post',

                        success: function (response, a, b) {
                            console.log("success",response);
                            alert(response.message);
                            $('#community_liason_officer_fee').val(response.socio.community_liason_officer_fee);
                            $('#interns_fee').val(response.socio.interns_fee);
                            $('#graduates_fee').val(response.socio.graduates_fee);
                            $('#psc_community_members').val(response.socio.psc_community_members);
                            $('#employment_relations_coordinator').val(response.socio.employment_relations_coordinator);

                            $('#hiv_awareness').val(response.socio.community_liason_officer_fee);
                            $('#business_desk_support_fee').val(response.socio.business_desk_support_fee);
                            $('#sme_tender_manager_fee').val(response.socio.sme_tender_manager_fee);
                            $('#local_procurement_management_fee').val(response.socio.local_procurement_management_fee);
                            $('#contractor_attendance_profit').val(response.socio.contractor_attendance_profit);
                            $('#sme_prelim_general_allowance').val(response.socio.sme_prelim_general_allowance);
                            $('#save-socios').hide();
                            $('#update-socios').show();
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
                            $("#modal1").close();
                        }
                    });
                });
                $('#update-socios').on('click',function(){
                    let project_id = {!! '"'. $project->id.'"' !!};
                    let formData = new FormData();
                    formData.append('community_liason_officer_fee', $('#community_liason_officer_fee').val());
                    formData.append('interns_fee', $('#interns_fee').val());
                    formData.append('graduates_fee', $('#graduates_fee').val());
                    formData.append('psc_community_members', $('#psc_community_members').val());
                    formData.append('employment_relations_coordinator', $('#employment_relations_coordinator').val());

                    formData.append('hiv_awareness', $('#hiv_awareness').val());
                    formData.append('business_desk_support_fee', $('#business_desk_support_fee').val());
                    formData.append('sme_tender_manager_fee', $('#sme_tender_manager_fee').val());
                    formData.append('local_procurement_management_fee', $('#local_procurement_management_fee').val());
                    formData.append('contractor_attendance_profit', $('#contractor_attendance_profit').val());
                    formData.append('contractor_technical_mentor_fee', $('#contractor_technical_mentor_fee').val());
                    formData.append('sme_prelim_general_allowance', $('#sme_prelim_general_allowance').val());
                    let url = '/socios/update-details/'+project.socios[0].id;
                    console.log("socios ", formData);
                    $.ajax({
                        url: url,
                        processData: false,
                        contentType: false,
                        data: formData,
                        type: 'post',

                        success: function (response, a, b) {
                            console.log("success",response);
                            alert(response.message);
                            $('#community_liason_officer_fee').val(response.socio.community_liason_officer_fee);
                            $('#interns_fee').val(response.socio.interns_fee);
                            $('#graduates_fee').val(response.socio.graduates_fee);
                            $('#psc_community_members').val(response.socio.psc_community_members);
                            $('#employment_relations_coordinator').val(response.socio.employment_relations_coordinator);

                            $('#hiv_awareness').val(response.socio.community_liason_officer_fee);
                            $('#business_desk_support_fee').val(response.socio.business_desk_support_fee);
                            $('#sme_tender_manager_fee').val(response.socio.sme_tender_manager_fee);
                            $('#local_procurement_management_fee').val(response.socio.local_procurement_management_fee);
                            $('#contractor_attendance_profit').val(response.socio.contractor_attendance_profit);
                            $('#sme_prelim_general_allowance').val(response.socio.sme_prelim_general_allowance);
//                            $('#save-socios').show();
//                            $('#update-socios').hide();
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
                            $("#modal1").close();
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