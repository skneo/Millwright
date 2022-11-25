@extends('mylayout.main')

@section('title') {{$page_heading}} @endsection

@section('body')
<div class="container my-3">
    <h3>{{$page_heading}}</h3>
    <form method='POST' action='{{$submit_url}}'>
        @csrf
        <div class='mb-3'>
            <label for='category' class='form-label float-start'>Category</label>
            <select class="form-select" name='category' id='category' value='Pit Wheel Lathe'  required>
                <option disabled selected value> -- Select Category -- </option>
                <option>General</option>
                @foreach ($machines as $machine)
                <option>{{$machine->name}}</option>
                @endforeach
            </select>
            @if ($edit)
            <script>
                document.getElementById('category').value='{{$spare->category}}';
            </script>
            @endif
        </div> 
        <div class='mb-3'>
            <label for='name' class='form-label float-start'>Material Name</label>
            <input type='text' class='form-control' id='name' name='name' @if($edit) value="{{$spare->name}}" @else value="{{old('name')}}" @endif>
            <small class='form-text text-danger'>@error('name'){{$message}} @enderror </small>
        </div> 
        <div class='mb-3'>
            <label for='code' class='form-label float-start'>Material Code</label>
            <input type='text' class='form-control' id='code' name='code' @if($edit) value="{{$spare->code}}" @else value="{{old('code')}}" @endif>
            <small class='form-text text-danger'>@error('code'){{$message}} @enderror </small>
        </div> 
        <div class='mb-3'>
            <label for='balance' class='form-label float-start'>Balance</label>
            <input type='number' class='form-control' @if($edit) readonly @endif id='balance' name='balance' @if($edit) value="{{$spare->balance}}" @else value="{{old('balance')}}" @endif>
            <small class='form-text text-danger'>@error('balance'){{$message}} @enderror </small>
        </div> 
        <div class='mb-3'>
            <label for='unit' class='form-label float-start'>Unit</label>
            <input type='text' class='form-control' id='unit' name='unit' @if($edit) value="{{$spare->unit}}" @else value="{{old('unit')}}" @endif>
            <small class='form-text text-danger'>@error('unit'){{$message}} @enderror </small>
        </div> 
        <div class='mb-3'>
            <label for='location' class='form-label float-start'>Location</label>
            <input type='text' class='form-control' id='location' name='location' @if($edit) value="{{$spare->location}}" @else value="{{old('location')}}" @endif>
            <small class='form-text text-danger'>@error('location'){{$message}} @enderror </small>
        </div> 
        <div class='mb-3'>
            <label for='remark' class='form-label float-start'>Remark</label>
            <input type='text' class='form-control' id='remark' name='remark' @if($edit) value="{{$spare->remark}}" @else value="{{old('remark')}}" @endif>
            <small class='form-text text-danger'>@error('remark'){{$message}} @enderror </small>
        </div> 
        <button type='submit' class='btn btn-primary'>Submit</button>
    </form>
</div>
@endsection