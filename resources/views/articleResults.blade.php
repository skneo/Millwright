@extends('mylayout.main')
@section('title')All Articles @endsection
@section('body')
<div class="container my-3">
    <div class="row">
        <div class="col-md-9 mb-3 mb-md-0">
            <div class="border p-3" style="border-radius: 10px; background-color:#eee">
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
                    <li><a class="fs-5 text-decoration-none" href="/article/{{$article->id}}/{{str_replace(' ','-',$article->title)}}">{{$article->title}}</a></li>
                @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-3" >
            <div class="border p-3" style="border-radius: 10px; background-color:#eee">
                <h5>Latest articles</h5>
                <ul>
                    @foreach ($latestArticles as $article)
                        <li><a class="text-decoration-none" href="/article/{{$article->id}}/{{str_replace(' ', '-', $article->title)}}">{{$article->title}}</a> </li> 
                    @endforeach
                </ul>
            </div>
            <div class="border p-3 my-3" style="border-radius: 10px; background-color:#eee">
                <h5>Categories</h5>
                <ul>
                    <li><a href="/all-articles/General" class="text-decoration-none fs-5">General</a></li>
                    @foreach ($machines as $machine)
                        <li><a href="/all-articles/{{$machine->name}}" class="text-decoration-none fs-5">{{$machine->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>    
</div>
@endsection