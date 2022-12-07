@extends('mylayout.main')
@section('title')All Articles @endsection
@section('body')
<div class="container my-3">
    <form class="d-flex " metho='get' action='/articles/'>
        <input class="form-control me-2" name='search' value="{{$search}}" type="search" placeholder="Search articles" aria-label="Search">
        <button class="btn btn-outline-primary me-2" type="submit">Search</button>
    </form>
    @if(count($articles))
        <h3>Search results for '{{$search}}'</h3>    
    @else
        <h3>No search results for '{{$search}}'</h3>
    @endif
    <ul>
    @foreach ($articles as $article)
        <li><a class="fs-5 text-decoration-none" href="/article/{{str_replace(' ','-',$article->title)}}/{{$article->id}}">{{$article->title}}</a></li>
    @endforeach
    </ul>
</div>
@endsection