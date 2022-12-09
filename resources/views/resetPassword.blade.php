@extends('mylayout.main')

@section('title') Reset Password @endsection

@section('body')
<div class="container my-3">
    <h4>Reset Password</h4>
    <form action="/reset-password" method="POST">
        @csrf
        <div class="my-3">
            <label for="otp" class="form-label float-start">OTP</label>
            <input type="number" name="otp" id="otp" class="form-control" required>
        </div>
        <div class=" mb-3">
            <label for="pwd1" class="form-label float-start">Type New Password</label>
            <input onkeyup='check();' required type="password" class="form-control" id="pwd1" name="pwd1">
        </div>
        <div class="mb-3">
            <label for="pwd2" class="form-label float-start">Type New Password Again</label>
            <input onkeyup='check();' required type="password" class="form-control" id="pwd2" name="pwd2">
            <span id='message' class="float-start"></span><br>
        </div>
        <button type="submit" disabled id="changePwdBtn" class="btn btn-primary ">Submit</button>
    </form>
    <script>
        var check = function() {
            var pwd1 = document.getElementById('pwd1').value;
            var pwd2 = document.getElementById('pwd2').value;
            if ((pwd1 == pwd2) && pwd1.trim() != '') {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'Both passwords matched';
                document.getElementById('changePwdBtn').disabled = false;
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Both passwords not matched';
                document.getElementById('changePwdBtn').disabled = true;
            }
        }
    </script>
</div>
@endsection