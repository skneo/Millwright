@extends('mylayout.main')
@section('title') {{$machineName}} Introduction @endsection
@section('body')
<div class="container my-3">
    {{-- <button class="btn btn-primary btn-sm mb-2" onclick="history.back()">&larr;Back</button> --}}
    <div class="row">
        <div class="col-md-9 mb-3 mb-md-0">
            <div class="border p-3" style="border-radius: 10px; background-color:#eee">
                <a href="/faults?machine={{$machineName}}" class="btn btn-outline-primary btn-sm ">Faults</a>
                <a href="/spares/{{$machineName}}" class="btn btn-outline-primary btn-sm mx-2">Spares</a>
                <a href="/all-articles/{{$machineName}}" class="btn btn-outline-primary btn-sm ">Articles</a>
                <h4 class="mt-3">Introduction of {{$machineName}}</h4>
                @if(session()->has('username'))
                <a href="/edit-introduction/{{$machineName}}/{{$id}}" class="btn btn-outline-primary btn-sm">Edit Intro</a>
                @endif
                {!!$intro!!}
            </div>
        </div>
        <div class="col-md-3" >
            <div class="border p-3" style="border-radius: 10px; background-color:#eee">
                <h5>Latest articles on {{$machineName}}</h5>
                @if(session()->has('username'))
                <a href="/new-article/{{$machineName}}" class="btn btn-outline-primary btn-sm">New</a><br>
                @endif
                <ul>
                @foreach ($articles as $article)
                <li><a class="text-decoration-none" href="/article/{{$article->id}}/{{str_replace(' ', '-', $article->title)}}">{{$article->title}}</a> </li> 
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection