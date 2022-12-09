@extends('mylayout.main')
@section('title')
    Change Password
@endsection
@section('body')
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
    <center>
        <h4 class="mt-3">Change Password</h4>
        <form method="POST" class="mt-3" style="width: 300px" action="/update-password">
            @csrf
            <div class=" mb-3">
                <label for="pwd1" class="form-label float-start">Type new password</label>
                <input onkeyup='check();' required type="password" class="form-control" id="pwd1" name="pwd1">
            </div>
            <div class="mb-3">
                <label for="pwd2" class="form-label float-start">Type new password again</label>
                <input onkeyup='check();' required type="password" class="form-control" id="pwd2" name="pwd2">
                <span id='message' class="float-start"></span><br>
            </div>
            <button type="submit" disabled id="changePwdBtn" class="btn btn-success">Submit</button>
        </form>
    </center>
@endsection