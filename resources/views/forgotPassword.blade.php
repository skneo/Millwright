@extends('mylayout.main')

@section('title') Forgot Password @endsection

@section('body')
<div class="container my-3">
    <h4>Forgot Password</h4>
    <form action="/request-otp" method="POST">
        @csrf
        <div class="my-3">
            <label for="email" class="form-label float-start">Email</label>
            <input type="text" name="email" id="email" class="mt-3 form-control" placeholder="Enter email" required>
        </div>
        <button type="submit" class="btn btn-primary ">Get OTP</button>
    </form>
</div>
@endsection


