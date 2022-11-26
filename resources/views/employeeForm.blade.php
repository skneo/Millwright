@extends('mylayout.main')

@section('title') {{$page_heading}} @endsection

@section('body')
<div class="container my-3">
    <h3>{{$page_heading}}</h3>
    <form method='POST' action='{{$submit_url}}'>
        @csrf
        <div class='mb-3'>
            <label for='emp_name' class='form-label float-start'>Employee Name</label>
            <input type='text' class='form-control' id='emp_name' name='emp_name' @if($edit) value="{{$emp->name}}" @else value="{{old('emp_name')}}" @endif>
            <small class='form-text text-danger'>@error('emp_name')Enter Employee Name @enderror </small>
        </div>
        <div class='mb-3'>
            <label for='emp_num' class='form-label float-start'>Employee Number</label>
            <input type='number' class='form-control' id='emp_num' name='emp_num' @if($edit) value="{{$emp->emp_no}}" @else value="{{old('emp_num')}}" @endif>
            <small class='form-text text-danger'>@error('emp_num'){{$message}}@enderror</small>
        </div>
        <div class='mb-3'>
            <label for='design' class='form-label float-start'>Designation</label>
            <input type='text' class='form-control' id='design' name='design' @if($edit) value="{{$emp->design}}" @else value="{{old('design')}}" @endif>
            <small class='form-text text-danger'>@error('design'){{$message}}@enderror</small>
        </div>
        <div class='mb-3'>
            <label for='joinDate' class='form-label float-start'>DMRC Joining Date</label>
            <input type='date' class='form-control' id='joinDate' name='joinDate' @if($edit) value="{{$emp->joinDate}}" @else value="{{old('joinDate')}}" @endif>
            <small class='form-text text-danger'>@error('joinDate'){{$message}}@enderror</small>
        </div>
        <div class='mb-3'>
            <label for='mobile' class='form-label float-start'>Mobile Number</label>
            <input type='number' class='form-control' id='mobile' name='mobile' @if($edit) value="{{$emp->mobile}}" @else value="{{old('mobile')}}" @endif>
            <small class='form-text text-danger'>@error('mobile') {{$message}} @enderror</small>
        </div>
        <div class='mb-3'>
            <label for='email' class='form-label float-start'>Email</label>
            <input type='text' class='form-control' id='email' name='email' @if($edit) value="{{$emp->email}}" @else value="{{old('email')}}" @endif>
            <small class='form-text text-danger'>@error('email') {{$message}} @enderror</small>
        </div>
        <div class='mb-3'>
            <label for='rest' class='form-label float-start'>Rest</label>
            <input type='text' class='form-control' id='rest' name='rest' @if($edit) value="{{$emp->rest}}" @else value="{{old('rest')}}" @endif>
            <small class='form-text text-danger'>@error('rest') {{$message}} @enderror</small>
        </div>
        <button type='submit' class='btn btn-primary'>Submit</button>
    </form>
</div>
@endsection