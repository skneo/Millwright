@extends('mylayout.main')
@section('title')
    {{$article->title}}
@endsection
@section('body')
    <div class="container my-3">
        <h3>{{$article->title}}</h3>
        <small class='text-muted'>Updated on {{$article->updated_at}}</small>
        <br><a href="/edit-article/{{str_replace(' ','-',$article->title)}}/{{$article->id}}" class="btn btn-outline-primary btn-sm">Edit</a><br>
        <b>Category:</b> {{$article->category}}
        {!!$article->body!!}
    </div>
@endsection