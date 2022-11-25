@extends('mylayout.main')

@section('title') {{$page_heading}} @endsection

@section('body')
<div class="container my-3">
    <h3>{{$page_heading}}</h3>
    <form method='POST' action='{{$submit_url}}'>
        @csrf
        <div class='mb-3'>
            <label for='occurred_on' class='form-label float-start'>Ocuurred On Date</label>
            <input type='date' class='form-control' id='occurred_on' name='occurred_on' @if($edit) value="{{$fault->occurred_on}}" @else value="{{old('occurred_on')}}" @endif>
            <small class='form-text text-danger'>@error('occurred_on'){{$message}} @enderror </small>
        </div> 
        <div class='mb-3'>
            <label for='sub_category' class='form-label float-start'>Sub-Cateogry</label>
            <input type='text' class='form-control' id='sub_category' name='sub_category' @if($edit) value="{{$fault->sub_category}}" @else value="{{old('sub_category')}}" @endif>
            <small class='form-text text-danger'>@error('sub_category'){{$message}}@enderror</small>
        </div>
        <div class='mb-3'>
            <label for='fault' class='form-label float-start'>Fault</label>
            <input type='text' class='form-control' id='fault' name='fault' @if($edit) value="{{$fault->fault}}" @else value="{{old('fault')}}" @endif>
            <small class='form-text text-danger'>@error('fault'){{$message}}@enderror</small>
        </div>
        <div class='mb-3'>
            <label for='rectification_date' class='form-label float-start'>Rectification Date</label>
            <input type='date' class='form-control' id='rectification_date' name='rectification_date' @if($edit) value="{{$fault->rectification_date}}" @else value="{{old('rectification_date')}}" @endif>
            <small class='form-text text-danger'>@error('rectification_date'){{$message}}@enderror</small>
        </div>
        <div class='mb-3'>
            <label for='rectification' class='form-label float-start'>Rectification</label>
            <textarea name="rectification" class='form-control' id="rectification" cols="30" rows="5">@if($edit){{$fault->rectification}}@else{{old('rectification')}}@endif</textarea>
            {{-- <input type='text' class='form-control' id='rectification' name='rectification' @if($edit) value="{{$fault->rectification}}" @else value="{{old('rectification')}}" @endif> --}}
            <small class='form-text text-danger'>@error('rectification') {{$message}} @enderror</small>
        </div>
        <div class='mb-3'>
            <label for='spares_used' class='form-label float-start'>Spares Used</label>
            <input type='text' class='form-control' id='spares_used' name='spares_used' @if($edit) value="{{$fault->spares_used}}" @else value="{{old('spares_used')}}" @endif>
            <small class='form-text text-danger'>@error('spares_used') {{$message}} @enderror</small>
        </div>
        <div class='mb-3'>
            <label for='remark' class='form-label float-start'>Remark</label>
            <input type='text' class='form-control' id='remark' name='remark' @if($edit) value="{{$fault->remark}}" @else value="{{old('remark')}}" @endif>
            <small class='form-text text-danger'>@error('remark') {{$message}} @enderror</small>
        </div>
        
        <button type='submit' class='btn btn-primary'>Submit</button>
    </form>
</div>
@endsection