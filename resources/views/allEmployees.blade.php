@extends('mylayout.main')
@section('title') All Employees @endsection
@section('body')
<div class="container-fluid my-3">
    <a href="/add-employee" class="btn btn-primary btn-sm float-end">Add</a>
    <div class="my-3">
        <h4>All Employees</h4>
        <table id="table_id" class="table-light table table-striped table-bordered w-100">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Employee Name</th>
                    <th>Employee Number</th>
                    <th>Designation</th>
                    <th>DMRC Join Date</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Rest</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $emp)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$emp->name}}</td>
                    <td>{{$emp->emp_no}}</td>
                    <td>{{$emp->design}}</td>
                    <td>{{$emp->joinDate}}</td>
                    <td>{{$emp->mobile}}</td>
                    <td>{{$emp->email}}</td>
                    <td>{{$emp->rest}}</td>
                    <td>
                        <a href="/edit-employee/{{$emp->id}}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="/delete-employee/{{$emp->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete {{$emp->name}} ?')">Delete</a>
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