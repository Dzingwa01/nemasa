@extends("layouts.user_logged")

@section('content')
    <div class="container-fluid">
        <div class="row" style="margin-left: 2em;margin-right: 2em;">
            <h5 style="text-transform:uppercase;text-align: center;font-weight: bolder; margin-top:0.5em;">Project Specialist Procurement Plan</h5>
            <h6 style="text-transform:uppercase;text-align: center;font-weight: bolder;margin-top:1em;">Project
                Name:{{$project->name}}</h6>
            <button class="btn waves-effect waves-light project-dashboard" style="margin-left:1.2em;"  name="">Back
                <i class="material-icons left">arrow_back</i>
            </button>
        </div>

        <div class="row" style="margin-left: 2em;margin-right: 2em;">
            <div class="col s12 m4">
                <div class="card hoverable">
                    <div class="card-content white-text">
                        <table class="striped">
                            <tbody>
                            <tr>
                                <td>Client/Sponsor</td>
                                <td>{{$project->client_name}}</td>
                            </tr>
                            <tr>
                                <td>Project /Facility Name</td>
                                <td>{{$project->name}}</td>
                            </tr>
                            <tr>
                                <td>Main Contractor Name</td>
                                <td>{{!empty($project->contractors[0])?$project->contractors[0]->contractor_name:''}}</td>
                            </tr>
                            <tr>
                                <td>Present Contract Value</td>
                                <td>{{'R '.$project->contract_sum_excl}}</td>
                            </tr>
                            <tr>
                                <td>Works Excl Contigencies & Socio</td>
                                <td>{{'R '.$project->work_budget}}</td>
                            </tr>
                            <tr><td></td><td></td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="col s12 m4">
                <div class="card hoverable">
                    <div class="card-content white-text">
                        <table class="striped">
                            <tbody>
                            <tr>
                                <td>Total Contract Value</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Deductions</td>
                                <td><input style="height: 1rem!important;" id="deductions" class="validate"></td>
                            </tr>
                            <tr>
                                <td>Contigency</td>
                                <td><input id="contigency" style="height: 1rem!important;" class="validate"></td>
                                {{--<td>{{'R '.$project->contigency_allowable}}</td>--}}
                            </tr>
                            <tr>
                                <td>Contract Value</td>
                                <td id="contract_value"></td>
                            </tr>
                            <tr>
                                <td>SMME Targeted %</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Required Spend %</td>
                                <td>30%</td>
                            </tr>
                            <tr></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="col s12 m4">
                <div class="card hoverable">
                    <div class="card-content white-text">
                        <table class="striped">

                            <tbody>
                            <tr>
                                <td>SMME Procurement Plan No</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>SME Procurement Plan Date</td>
                                <td>{{\Carbon\Carbon::today()->toDateString()}}</td>
                            </tr>
                            <tr>
                                <td>SME Target %</td>
                                <td>30%</td>
                            </tr>
                            <tr>
                                <td>SME Targeted Value</td>
                                <td>{{'R '.$project->sme_package_value_target}}</td>
                            </tr>
                            <tr>
                                <td>SME Award % Achieved</td>
                                <td></td>
                            </tr>
                            <tr><td></td><td></td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="row" style="margin-right: 2em;margin-left: 2em;">
            <div class="col s12">
                <table class="table table-bordered" style="width: 100%!important;" id="packages-table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Package Description</th>
                        <th>CIBD Grade</th>
                        <th>No of SME Targeted</th>
                        <th>Awarded SME</th>
                        <th>Black Ownership</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large teal tooltipped modal-trigger" data-position="left" data-tooltip="Add New Package" href="{{url('add-specialist-procurement-plan/'.$project->id)}}">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </div>

    @push('custom-scripts-contract')
        <script>
            $(document).ready(function () {
                let project_id = {!! '"'. $project->id.'"' !!};
                $('.project-dashboard').on('click',function(){

                    window.location.href = '/projects/'+project_id;
                });

                $('select[name="packages-table_length"]').css("display","inline");
                $(function () {
                    let url ='/get-specialist-proc-packages/'+project_id;
                    $('#packages-table').DataTable({
                        processing: true,
                        serverSide: true,
                        paging: true,
                        responsive: true,
                        scrollX: 640,
                        ajax: url,
                        columns: [
                            {data:'package_number',name:'package_number'},
                            {data: 'package_description', name: 'package_description'},
                            {data: 'cibd_grade', name: 'cibd_grade'},
                            {data: 'number_of_targetted_sms', name: 'number_of_targetted_sms'},
                            {data:'name_of_sme_awarded',name:'name_of_sme_awarded'},
                            {data:'sme_black_ownership',name:'sme_black_ownership'},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                    });
                    $('select[name="packages-table_length"]').css("display","inline");
                });
            });

            function initialiseStepper(){
                $(".step-container_p").stepMaker({
                    steps: ["Project Location","Contractor Information","Project Information","Socio Economic Allowables"],
                    currentStep: 1
                });
            }
        </script>
    @endpush
@endsection