@extends('mylayout.main')

@section('title') {{$page_heading}} @endsection

@section('body')
<div class="container my-3">
    <h3>{{$page_heading}}</h3>
    <form method='POST' action='{{$submit_url}}'>
        @csrf
        <div class='mb-3'>
            <label for='machine_name' class='form-label float-start'>M&P Name</label>
            <input type='text' class='form-control' id='machine_name' name='machine_name' @if($edit) value="{{$machine->name}}" @else value="{{old('machine_name')}}" @endif>
            <small class='form-text text-danger'>@error('machine_name'){{$message}} @enderror </small>
        </div>
        <div class='mb-3'>
            <label for='quantity' class='form-label float-start'>M&P Quantity</label>
            <input type='number' class='form-control' id='quantity' name='quantity' @if($edit) value="{{$machine->quantity}}" @else value="{{old('quantity')}}" @endif>
            <small class='form-text text-danger'>@error('quantity'){{$message}}@enderror</small>
        </div>
        <div class='mb-3'>
            <label for='commisionedDate' class='form-label float-start'>Commisioned Date</label>
            <input type='date' class='form-control' id='commisionedDate' name='commisionedDate' @if($edit) value="{{$machine->commisionedDate}}" @else value="{{old('commisionedDate')}}" @endif>
            <small class='form-text text-danger'>@error('commisionedDate'){{$message}}@enderror</small>
        </div>
        <div class='mb-3'>
            <label for='supplier' class='form-label float-start'>OEM/Supplier</label>
            <input type='text' class='form-control' id='supplier' name='supplier' @if($edit) value="{{$machine->supplier}}" @else value="{{old('supplier')}}" @endif>
            <small class='form-text text-danger'>@error('supplier'){{$message}}@enderror</small>
        </div>
        <div class='mb-3'>
            <label for='price' class='form-label float-start'>Price</label>
            <input type='text' class='form-control' id='price' name='price' @if($edit) value="{{$machine->price}}" @else value="{{old('price')}}" @endif>
            <small class='form-text text-danger'>@error('price') {{$message}} @enderror</small>
        </div>
        <div class='mb-3'>
            <label for='dmrcPO' class='form-label float-start'>DMRC PO</label>
            <input type='text' class='form-control' id='dmrcPO' name='dmrcPO' @if($edit) value="{{$machine->dmrcPO}}" @else value="{{old('dmrcPO')}}" @endif>
            <small class='form-text text-danger'>@error('dmrcPO') {{$message}} @enderror</small>
        </div>
        <div class='mb-3'>
            <label for='installedLocation' class='form-label float-start'>Installed Location</label>
            <input type='text' class='form-control' id='installedLocation' name='installedLocation' @if($edit) value="{{$machine->installedLocation}}" @else value="{{old('installedLocation')}}" @endif>
            <small class='form-text text-danger'>@error('installedLocation') {{$message}} @enderror</small>
        </div>
        <div class='mb-3'>
            <label for='commisioningEmployees' class='form-label float-start'>Commisioning Employees</label>
            <input type='text' class='form-control' id='commisioningEmployees' name='commisioningEmployees' @if($edit) value="{{$machine->commisioningEmployees}}" @else value="{{old('commisioningEmployees')}}" @endif>
            <small class='form-text text-danger'>@error('commisioningEmployees') {{$message}} @enderror</small>
        </div>
        <div class='mb-3'>
            <label for='remark' class='form-label float-start'>Remark</label>
            <input type='text' class='form-control' id='remark' name='remark' @if($edit) value="{{$machine->remark}}" @else value="{{old('remark')}}" @endif>
            <small class='form-text text-danger'>@error('remark') {{$message}} @enderror</small>
        </div>
        <button type='submit' class='btn btn-primary'>Submit</button>
    </form>
</div>
@endsection