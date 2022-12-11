@extends('mylayout.main')
@section('title')
    {{$article->title}}
@endsection
@section('body')
    <div class="container my-3">
        <h3 class="text-primary">{{$article->title}}</h3>
        <small class='text-muted'>Updated on {{date('d-m-Y',strtotime($article->updated_at))}}</small><br>
        <b>Category:</b> {{$article->category}}
        @if(session()->has('username'))
        <br><a href="/edit-article/{{str_replace(' ','-',$article->title)}}/{{$article->id}}" class="btn btn-outline-primary btn-sm">Edit</a><br>
        @endif
        {!!$article->body!!}
    </div>
@endsection