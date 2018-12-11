@extends("layouts.user_logged")

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h5 style="text-transform:uppercase;text-align: center;font-weight: bolder; margin-top:0.5em;">Project SME Procurement Plan</h5>
            <h6 style="text-transform:uppercase;text-align: center;font-weight: bolder;margin-top:1em;">Project
                Dashboard:{{$project->name}}</h6>
            <button class="btn waves-effect waves-light project-dashboard" style="margin-left:2em;"  name="">Back
                <i class="material-icons left">arrow_back</i>
            </button>
        </div>

            <div class="row">
                <div class="col s12 m4">
                    <div class="card hoverable">
                        <div class="card-content white-text">
                            <table class="responsive-table striped">
                                <tbody>
                                <tr>
                                    <td>Client/Sponsor</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Project /Facility Name</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Main Contractor Name</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Present Contract Value</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Works Excl Contigencies & Socio</td>
                                    <td></td>
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
                            <table class="responsive-table striped">

                                <tbody>
                                <tr>
                                    <td>Total Contract Value</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Deductions</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Contigency</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Contract Value</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>SMME Targeted %</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Required Spend %</td>
                                    <td></td>
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
                            <table class="responsive-table striped">

                                <tbody>
                                <tr>
                                    <td>SMME Procurement Plan No</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>SME Procurement Plan Date</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>SME Target %</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>SME Targeted Value</td>
                                    <td></td>
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
        <div class="row">
            <div class="col s12">
                <table class="table table-bordered" style="width: 100%!important;" id="packages-table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Package Description</th>
                        <th>CIBD Grade</th>
                        <th>No of SME Targeted</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large teal tooltipped modal-trigger" data-position="left" data-tooltip="Add New Package" href="{{url('add-sme-procurement-plan/'.$project->id)}}">
                <i class="large material-icons">add</i>
            </a>
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

                function initialiseStepper(){
                    $(".step-container_p").stepMaker({
                        steps: ["Project Location","Contractor Information","Project Information","Socio Economic Allowables"],
                        currentStep: 1
                    });
                }
            </script>
    @endpush
@endsection