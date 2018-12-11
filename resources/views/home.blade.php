@extends('layouts.user_logged')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h6 style="text-transform:uppercase;text-align: center;font-weight: bolder;margin-top:2em;">Projects</h6>
            {{--<a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>--}}
        </div>
        <div class="row" style="margin-left: 2em;margin-right: 2em;">
            <div class="col s12">
            <table class="table table-bordered" style="width: 100%!important;" id="projects-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Information</th>
                    <th>Date</th>
                    <th>Assigned To</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
            </div>
        </div>
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large teal tooltipped modal-trigger" data-position="left" data-tooltip="Add New Project" href="#modal1">
                <i class="large material-icons">add</i>
            </a>

        </div>

        <div id="modal1" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4>Add New Project</h4>
                <div class="row">

                    <form class="col s12">
                        @csrf
                        <div class="row">
                            <div class="input-field col m6">
                                <input id="name" type="text" class="validate">
                                <label for="name">Name</label>
                            </div>
                            <div class="input-field col m6">
                                <input id="location" type="text" class="validate">
                                <label for="location">Location</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6">
                                <textarea id="information" type="text" class="materialize-textarea"></textarea>
                                <label for="information">Information</label>
                            </div>
                            <div class="input-field col m6">
                                <input id="start_date" type="date" class="validate">
                                <label for="start_date">Start Date</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6">
                                <select id="user_id">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name .' '.$user->surname}}</option>
                                    @endforeach
                                </select>
                                <label>Assign to</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn">Cancel<i class="material-icons right">close</i> </a>
                <button class="btn waves-effect waves-light" style="margin-left:2em;" id="save-project" name="action">Save
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>

    </div>
    @push('custom-scripts')

        <script>
            $(document).ready(function () {
                $(function () {
                    $('#projects-table').DataTable({
                        processing: true,
                        serverSide: true,
                        paging: true,
                        responsive: true,
                        scrollX: 640,
                        ajax: '{{route('get-projects')}}',
                        columns: [
                            {data: 'name', name: 'name'},
                            {data: 'location', name: 'location'},
                            {data: 'information', name: 'information'},
                            {data: 'start_date', name: 'start_date'},
                            {data: 'assigned_to', name: 'assigned_to'},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                    });
                $('select[name="projects-table_length"]').css("display","inline");
                });
                $('#save-project').on('click',function(){
                    let formData = new FormData();
                    formData.append('name', $('#name').val());
                    formData.append('location', $('#location').val());
                    formData.append('information', $('#information').val());
                    formData.append('start_date', $('#start_date').val());
                    formData.append('user_id', $('#user_id').val());
                    console.log("project ", formData);

                    $.ajax({
                        url: "{{ route('projects.store') }}",
                        processData: false,
                        contentType: false,
                        data: formData,
                        type: 'post',

                        success: function (response, a, b) {
                            console.log("success",response);
                            alert(response.message);
                            window.location.reload();
                        },
                        error: function (response) {
                            console.log("error",response);
                            let message = error.response.message;
                            let errors = error.response.errors;
//                            var instance = M.Modal.getInstance(elem);
//                            instance.close();
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

        </script>
    @endpush
@endsection
