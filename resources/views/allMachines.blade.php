@extends('mylayout.main')
@section('title')All M&Ps @endsection
@section('body')
<div class="container-fluid my-3">
    <a href="/add-machine" class="btn btn-primary btn-sm float-end">Add</a>
    <div class="my-3">
        <h4>All M&Ps</h4>
        <table id="table_id" class="table-light table table-striped table-bordered w-100">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>M&P Name</th>
                    <th>Qty</th>
                    <th>Commisioned Date</th>
                    <th>Supplier Name and Address</th>
                    <th>Price</th>
                    <th>DMRC PO Number</th>
                    <th>Installed Location</th>
                    <th>Commisioning Employees</th>
                    <th>Remark</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($machines as $machine)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><a href="/machine-introduction/{{str_replace(' ','-',$machine->name)}}/{{$machine->id}}">{{$machine->name}}</a></td>
                    <td>{{$machine->quantity}}</td>
                    <td>{{$machine->commisionedDate}}</td>
                    <td>{{$machine->supplier}}</td>
                    <td>{{$machine->price}}</td>
                    <td>{{$machine->dmrcPO}}</td>
                    <td>{{$machine->installedLocation}}</td>
                    <td>{{$machine->commisioningEmployees}}</td>
                    <td>{{$machine->remark}}</td>
                    <td>
                        <a href="/edit-machine/{{$machine->id}}" class="btn btn-primary btn-sm">Edit</a>
                        {{-- <a href="/delete-machine/{{$machine->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete {{$machine->name}} ?')">Delete</a> --}}
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