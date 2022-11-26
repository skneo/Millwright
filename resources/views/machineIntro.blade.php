@extends('mylayout.main')
@section('title') {{$machineName}} Introduction @endsection
@section('body')
<div class="container my-3">
    <button class="btn btn-primary btn-sm" onclick="history.back()">&larr;Back</button>
    <div class="row  mt-2">
        <div class="col-md-9 border py-3 ">
            <a href="/faults?machine={{$machineName}}" class="btn btn-outline-primary btn-sm ">Faults</a>
            <a href="/spares/{{$machineName}}" class="btn btn-outline-primary btn-sm mx-2">Spares</a>
            <a href="/all-articles/{{$machineName}}" class="btn btn-outline-primary btn-sm ">Articles</a>
            <form class="d-flex mt-2" metho='get' action='/articles/'>
                <input class="form-control me-2" name='search' type="search" placeholder="Search articles" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
            <h4>Introduction of {{$machineName}}</h4>
            <a href="/edit-introduction/{{$machineName}}/{{$id}}" class="btn btn-outline-primary btn-sm">Edit Intro</a>
            {!!$intro!!}
        </div>
        <div class="col-md-3 border py-3">
            <h5>Latest articles on {{$machineName}}</h5>
            <a href="/new-article/{{$machineName}}" class="btn btn-outline-primary btn-sm">New</a><br>
            <ul>
            @foreach ($articles as $article)
               <li><a href="/article/{{str_replace(' ', '-', $article->title)}}/{{$article->id}}">{{$article->title}}</a> </li> 
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection