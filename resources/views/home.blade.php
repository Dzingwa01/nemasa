@extends('layouts.user_logged')

@section('content')
    <div class="container">
        <div class="row">
            <h6 style="text-transform:uppercase;text-align: center;font-weight: bolder;margin-top:2em;">Projects</h6>
            {{--<a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>--}}
        </div>
        <div class="row">
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
            <a class="btn-floating btn-large teal tooltipped" data-position="left" data-tooltip="Add New Project">
                <i class="large material-icons" onclick="add_project()">add</i>
            </a>

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
            });
        function add_project(){
            alert('ndeip');
        }
        </script>
    @endpush
@endsection
