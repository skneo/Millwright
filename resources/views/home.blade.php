@extends('mylayout.main')
@section('title')
Home
@endsection
@section('body')
<div class="container my-3">
    <h4>Notice Board</h4>
    @if(session()->has('username'))
    <a href="/edit-board" class="btn btn-outline-primary btn-sm">Edit</a>
    @endif
    <div class="px-3 py-3 rounded" style="background-color: white;">
        {!!$board!!}
    </div>
    <div class="row">
        <div class="col-md-3 mb-3 mt-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title ">M&Ps</h5>
                    <img src="images/machines.jpg" class="card-img-top" alt="machines">
                    <p class="card-text text-start mt-3">All M&Ps maintained by Millwright</p>
                    <a href="/machines" class="btn btn-outline-primary mb-2 w-100">M&Ps</a><br>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3 mt-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Faults</h5>
                    <img src="images/faults.jpg" class="card-img-top" alt="faults">
                    <p class="card-text text-start mt-3">Record of faults occurred in various M&Ps</p>
                    <a href="/all-faults" class="btn btn-outline-primary mb-2 w-100">Faults </a><br>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3 mt-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title ">Spares</h5>
                    <img src="images/spares.png" class="card-img-top" alt="spares">
                    <p class="card-text text-start mt-3">Record of spare parts of M&Ps and their location</p>
                    <a href="/spares/all" class="btn btn-outline-primary mb-2 w-100">Spares</a><br>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3 mt-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title ">Articles</h5>
                    <img src="images/articles.jpg" class="card-img-top" alt="articles">
                    <p class="card-text text-start mt-3">Articles on M&Ps, their parts and fault troubleshooting</p>
                    <a href="/all-articles" class="btn btn-outline-primary mb-2 w-100">Articles</a><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection