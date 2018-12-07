@extends('layouts.user_logged')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col m3">
                <a id="add_menu" style="margin-top: 1em;" class="btn" data-toggle="modal" data-target="#"><i
                            class="fa fa-plus"></i>Add Project</a><br/>
            </div>
            <br>
        </div>
        <div class="row">

            <div class="col m12">
                <table class="table table-bordered" id="projects-table">
                    <thead>
                    <tr>
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
    </div>
    @push('custom-scripts')
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">

        <script type="text/javascript" charset="utf8"
                src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
<script>
    $(function () {
        $('#projects-table').DataTable({
            processing: true,
            serverSide: true,
            paging: false,
            scrollY:720,
            ajax: '{{route('get-projects')}}',
            columns: [
                {data: 'location', name: 'location'},
                {data: 'information', name: 'information'},
                {data: 'start_date', name: 'start_date'},
                {data: 'assigned_to', name: 'assigned_to'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
//                $('select[name="menu-table_length"]').css("display","inline");
    });
</script>
    @endpush
@endsection
