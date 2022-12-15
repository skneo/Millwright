@extends('mylayout.main')
@section('title'){{$title}} @endsection
@section('body')
<div class="container my-3">
    <form class="d-flex mb-2" metho='get' action='/articles/'>
        <input class="form-control me-2" name='search' type="search" placeholder="Search articles" aria-label="Search">
        <button class="btn btn-outline-primary me-2" type="submit">Search</button>
    </form>
    <h3>{{$title}}</h3>
    @if(session()->has('username'))
        @if($category)
        <a href="/new-article/{{$category}}" class="btn btn-outline-primary btn-sm mx-2 mt-2">New</a>
        @else   
        <a href="/new-article/General" class="btn btn-outline-primary btn-sm mx-2 mt-2">New</a>
        @endif
    @endif
    <ol>
    @foreach ($articles as $article)
        <li><a class="fs-5 text-decoration-none" href="/article/{{$article->id}}/{{str_replace(' ','-',$article->title)}}">{{$article->title}}</a></li>
    @endforeach
    </ol>
</div>
@endsection