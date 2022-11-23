@extends('mylayout.main')
@section('title')
Home
@endsection
@section('body')
<div class="container my-3">
    <h4>Notice Board</h4> 
    <a href="/edit-board" class="btn btn-outline-primary btn-sm">Edit</a>
    <div class="border border-dark px-3 py-3">
        {!!$board!!}
    </div>
    <div class="row">
        <div class="col-md-3 mb-3 mt-3">
            <div class="card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title ">Assets/M&Ps</h5>
                    <img src="https://thumbs.dreamstime.com/z/set-building-machines-20329556.jpg" class="card-img-top" alt="https://img.etimg.com/thumb/msid-77198656,width-640,height-480,imgsize-678126,resizemode-4/first-what-is-the-big-fuss-really.jpg">
                    <p class="card-text text-start mt-3">All assets/M&Ps maintained by Millwright</p>
                    <a href="/machines" class="btn btn-outline-primary mb-2 w-100">Assets/M&Ps</a><br>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3 mt-3">
            <div class="card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Faults</h5>
                    <img src="https://sites.google.com/site/electricalatpha/_/rsrc/1365315755960/home/electrical-installation/diagnosing-faults-in-electrical-machines/diagnosing%20faults.jpg" class="card-img-top" alt="https://img.etimg.com/thumb/msid-77198656,width-640,height-480,imgsize-678126,resizemode-4/first-what-is-the-big-fuss-really.jpg">
                    <p class="card-text text-start mt-3">Record of faults occurred in various M&Ps</p>
                    <a href="contacts.php" class="btn btn-outline-primary mb-2 w-100">Faults </a><br>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3 mt-3">
            <div class="card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title ">Spares</h5>
                    <img src="https://5.imimg.com/data5/ZQ/GG/LR/SELLER-7650690/machinery-spares-500x500.jpeg" class="card-img-top" alt="https://img.etimg.com/thumb/msid-77198656,width-640,height-480,imgsize-678126,resizemode-4/first-what-is-the-big-fuss-really.jpg">
                    <p class="card-text text-start mt-3">Record of spare parts of M&Ps and their location</p>
                    <a href="contacts.php" class="btn btn-outline-primary mb-2 w-100">Contacts</a><br>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3 mt-3">
            <div class="card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title ">Articles</h5>
                    <img src="https://knowmax-ai-website.s3.amazonaws.com/wp-content/uploads/2021/02/21172042/KB-Management-for-Enterprise.jpg" class="card-img-top" alt="">
                    <p class="card-text text-start mt-3">Knowledgeful articles on functioning of M&Ps, their parts and fault troubleshooting</p>
                    <a href="/employees" class="btn btn-outline-primary mb-2 w-100">Employees</a><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection