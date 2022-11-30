@extends('mylayout.main')
@section('title'){{$title}} @endsection
@section('body')
<div class="container my-3">
    <h3>{{$title}}</h3>
    <form class="d-flex " metho='get' action='/articles/'>
        <input class="form-control me-2" name='search' type="search" placeholder="Search articles" aria-label="Search">
        <button class="btn btn-outline-primary me-2" type="submit">Search</button>
    </form>
    @if(session()->has('username'))
        @if($category)
        <a href="/new-article/{{$category}}" class="btn btn-outline-primary btn-sm mx-2 mt-2">New</a>
        @else 
        <a href="/new-article/General" class="btn btn-outline-primary btn-sm mx-2 mt-2">New</a>
        @endif
    @endif
    <ul>
    @foreach ($articles as $article)
        <li><a class="fs-4" href="article/{{str_replace(' ','-',$article->title)}}/{{$article->id}}">{{$article->title}}</a></li>
    @endforeach
    </ul>
</div>
@endsection