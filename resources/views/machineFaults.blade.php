@extends('mylayout.main')
@section('title')All Faults of {{$machine}} @endsection
@section('body')
<div class="container-fluid my-3">
    @if(session()->has('username'))
    <a href="/new-fault/{{$machine}}" class="btn btn-primary btn-sm float-end">New Fault</a>
    @endif
    <div class="my-3">
        <h4>All Faults of {{$machine}}</h4>
        <table id="table_id" class="table-light table table-striped table-bordered w-100">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Occured On</th>
                    {{-- <th>M&P Name</th> --}}
                    <th>Sub-Category</th>
                    <th style="min-width: 200px">Fault</th>
                    <th>Rectification Date</th>
                    <th style="min-width: 200px">Rectification</th>
                    <th>Spares Used</th>
                    <th>Remark</th>
                    @if(session()->has('username'))
                    <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($faults as $fault)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$fault->occurred_on}}</td>
                    {{-- <td>{{$fault->machine}}</td> --}}
                    <td>{{$fault->sub_category}}</td>
                    <td>{{$fault->fault}}</td>
                    <td>{{$fault->rectification_date}}</td>
                    <td>{{$fault->rectification}}</td>
                    <td>{{$fault->spares_used}}</td>
                    <td>{{$fault->remark}}</td>
                    @if(session()->has('username'))
                    <td>
                        <a href="/edit-fault/{{$machine}}/{{$fault->id}}" class="btn btn-primary btn-sm">Edit</a>
                        {{-- <a href="/delete-machine/{{$machine->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete {{$machine->name}} ?')">Delete</a> --}}
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- for data table -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"> </script>
        <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
        <script>
            $(document).ready(function() {
                $('#table_id').DataTable({
                    "scrollX": true
                });
            });
        </script>
    </div>
</div>
@endsection