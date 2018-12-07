@extends('layouts.user_logged')

@section('content')
    <div class="container">
        <div class="row">
            <h6 style="text-align: center;">SMAT Dashboard</h6>
            {{--<a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>--}}
        </div>
        <div class="row">

            <div class="col m12">
                <table class="table table-bordered" id="projects-table">
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
            {{--<ul>--}}
                {{--<li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>--}}
                {{--<li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>--}}
                {{--<li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>--}}
                {{--<li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>--}}
            {{--</ul>--}}
        </div>
    </div>
    @push('custom-scripts')
        {{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"--}}
                {{--integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"--}}
                {{--crossorigin="anonymous"></script>--}}

        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">

        <script type="text/javascript" charset="utf8"
                src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function () {
                $(function () {
                    $('#projects-table').dataTable({
                        processing: true,
                        serverSide: true,
                        paging: true,
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
