@extends('mylayout.main')
@section('title')
    {{$article->title}}
@endsection
@section('body')
    <div class="container my-3 ">
        <div class="row">
            <div class="col-md-9 mb-3 mb-md-0">
                <div class="border p-3" style="border-radius: 10px; background-color:#eee">
                    <h3 class="text-primary">{{$article->title}}</h3>
                    <small class='text-muted'>Updated on {{date('d-m-Y',strtotime($article->updated_at))}}</small><br>
                    @if(session()->has('username'))
                    <a href="/edit-article/{{$article->id}}/{{str_replace(' ','-',$article->title)}}" class="btn btn-outline-primary btn-sm">Edit</a><br>
                    @endif
                    <b>Category:</b> {{$article->category}}
                    {!!$article->body!!}
                </div>
            </div>
            <div class="col-md-3" >
                <div class="border p-3" style="border-radius: 10px; background-color:#eee">
                    <h5>Latest articles on {{$article->category}}</h5>
                    <ul>
                        @foreach ($articles as $article)
                            <li><a class="text-decoration-none" href="/article/{{$article->id}}/{{str_replace(' ', '-', $article->title)}}">{{$article->title}}</a> </li> 
                        @endforeach
                    </ul>
                </div>
            </div>
    </div>
@endsection