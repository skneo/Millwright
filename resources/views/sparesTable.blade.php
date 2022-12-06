@extends('mylayout.main')
@section('title') Spares @endsection
@section('body')
<div class="container-fluid my-3">
    @if(session()->has('username'))
    <a href="/add-spare" class="btn btn-primary btn-sm float-end">Add</a>
    @endif
    <div class="my-3">
        @if ($category=='all')
            <h4>All Spares</h4>
        @else
            <h4>{{$category}} Spares</h4>
        @endif
        <table id="table_id" class="table-light table table-striped table-bordered w-100">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Category</th>
                    <th>Material Name</th>
                    <th>Material Code</th>
                    <th>Balance</th>
                    <th>Location</th>
                    <th>Remark</th>
                    @if(session()->has('username'))
                    <th style="min-width: 90px">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($spares as $spare)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$spare->category}}</td>
                    <td>{{$spare->name}}</td>
                    <td>{{$spare->code}}</td>
                    <td>{{$spare->balance}} {{$spare->unit}}</td>
                    <td>{{$spare->location}}</td>
                    <td>{{$spare->remark}}</td>
                    @if(session()->has('username'))
                    <td>
                        <a href="/edit-spare/{{$spare->id}}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="/delete-spare/{{$spare->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete {{$spare->name}} ?')">Delete</a>
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