@extends('mylayout.main')

@section('title') Login @endsection

@section('body')
<div class="container my-3">
<div class="text-center mt-5 w-25 container" style="min-width: 300px;">
    <h4>Login</h4>
    <div class="mt-3">
        <img src="images/user.png" alt="user" width="120">
    </div>
    <form action="/login" method="POST">
        @csrf
        <div class="mb-2 ">
            <label for="email" class="form-label float-start">Email</label>
            <input type="text" name="email" id="email" class="mt-3 form-control" placeholder="Enter email" required>
        </div>
        <div class="mb-3 ">
            <label for="password" class="form-label float-start">Password </label><span><a href="/forgot-password" class='float-end text-muted text-decoration-none fst-italic'>Forgot Password?</a></span>
            <input type="password" name="password" id="password" class="mt-3 form-control" placeholder="Enter password" required>
        </div>
        <button type="submit" class="btn btn-primary px-5 ">Login</button>
    </form>
</div>
</div>
@endsection


