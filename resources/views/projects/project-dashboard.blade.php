@extends('layouts.user_logged')

@section('content')
    <div class="container">
        <div class="row">
            <h6 style="text-transform:uppercase;text-align: center;font-weight: bolder;margin-top:2em;">Project Dashboard:{{$project->name}}</h6>
        </div>

        <div class="row">
            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title" style="font-weight: bolder;text-align: center;">Contract Award Calculation</span>

                    </div>
                    <div class="card-action">
                        <a style="margin-left: 40%" href="#">Details</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title" style="font-weight: bolder;text-align: center;">SME Procurement Plan</span>

                    </div>
                    <div class="card-action">
                        <a style="margin-left: 40%" href="#">Details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title" style="font-weight: bolder;text-align: center;">Local Procurement Plan</span>

                    </div>
                    <div class="card-action">
                        <a style="margin-left: 40%" href="#">Details</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title" style="font-weight: bolder;text-align: center;">Specialist Procurement Plan</span>
                    </div>
                    <div class="card-action">
                        <a style="margin-left: 40%" href="#">Details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
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

@endsection