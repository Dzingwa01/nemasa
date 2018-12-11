@extends('layouts.user_logged')

@section('content')
    <div class="container-fluid">
        <div class="row" style="margin-right: 2em;margin-left: 2em;margin-top:1em;">
            <h6 style="text-align: center;font-weight: bolder;">Your Profile Information</h6>
            <form class="col s12 card hoverable">
                @csrf
                <div class="row">
                    <div class="input-field col m6">
                        <input id="name" type="text" class="validate">
                        <label for="name">Name</label>
                    </div>
                    <div class="input-field col m6">
                        <input id="surname" type="text" class="validate">
                        <label for="surname">Surname</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m6">
                        <input id="email" type="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field col m6">
                        <input id="contact_number" type="tel" class="validate">
                        <label for="contact_number">Contact Number</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m6">
                        <input id="job_title" type="text" class="validate">
                        <label for="job_title">Job Title</label>
                    </div>
                    <div class="input-field col m6">

                        <label>System Role</label>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection