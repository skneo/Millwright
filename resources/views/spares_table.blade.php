@extends('mylayout.main')
@section('title') Spares @endsection
@section('body')
<div class="container-fluid my-3">
    <a href="/add-spare" class="btn btn-primary btn-sm float-end">Add</a>
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
                    <th>Action</th>
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
                    <td>
                        <a href="/edit-spare/{{$spare->id}}" class="btn btn-primary btn-sm">Edit</a>
                        {{-- <a href="/delete-employee/{{$emp->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete {{$emp->name}} ?')">Delete</a> --}}
                    </td>
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