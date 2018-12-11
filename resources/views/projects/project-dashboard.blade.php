@extends('layouts.user_logged')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h6 style="text-transform:uppercase;text-align: center;font-weight: bolder;margin-top:2em;">Project Dashboard:{{$project->name}}</h6>
        </div>
        <div class="row" style="margin-right: 2em;margin-left: 2em;">
            <div class="col s12 m4">
                <div class="card blue-grey darken-1 hoverable">
                    <div class="card-content white-text">
                        <span class="card-title" style="font-weight: bolder;text-align: center;">Contract Award Calculation</span>

                    </div>
                    <div class="card-action">
                        <a style="margin-left: 40%" href="{{url('contract-award-calculator/'.$project->id)}}">Details</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card blue-grey darken-1 hoverable">
                    <div class="card-content white-text">
                        <span class="card-title" style="font-weight: bolder;text-align: center;">SME Procurement Plan</span>
                    </div>
                    <div class="card-action">
                        <a style="margin-left: 40%" href="{{url('sme-procurement-plan/'.$project->id)}}">Details</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card blue-grey darken-1 hoverable">
                    <div class="card-content white-text">
                        <span class="card-title" style="font-weight: bolder;text-align: center;">Local Procurement Plan</span>
                    </div>
                    <div class="card-action">
                        <a style="margin-left: 40%" href="{{url('local-procurement-plan/'.$project->id)}}">Details</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="row" style="margin-right: 2em;margin-left: 2em;">

            <div class="col s12 m4">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title" style="font-weight: bolder;text-align: center;">Specialist Procurement Plan</span>
                    </div>
                    <div class="card-action">
                        <a style="margin-left: 40%" href="{{url('specialist-procurement-plan/'.$project->id)}}">Details</a>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card blue-grey darken-1 hoverable">
                    <div class="card-content white-text">
                        <span class="card-title" style="font-weight: bolder;text-align: center;">SME Progress Report</span>

                    </div>
                    <div class="card-action">
                        <a style="margin-left: 40%" href="#">Details</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
<style>
    .card-content{
        height: 120px!important;
    }
</style>
@endsection