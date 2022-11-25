@extends('mylayout.main')
@section('title')All Faults @endsection
@section('body')
<div class="container my-3">
    <form method='GET' action='/faults'>
        <div class='mb-3'>
            <label for='' class='form-label float-start'>Select M&P</label>
            <select class="form-select" name='machine'  required>
                <option disabled selected value> -- Select M&P -- </option>
                @foreach ($machines as $machine)
                <option>{{$machine->name}}</option>
                @endforeach
            </select>
        </div>
        <button type='submit' class='btn btn-primary'>Submit</button>
    </form>
</div>
@endsection