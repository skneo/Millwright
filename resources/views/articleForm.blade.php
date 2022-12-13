@extends('mylayout.main')

@section('title') {{$page_heading}} @endsection

@section('body')
<div class="container my-3">
    <h3>{{$page_heading}}</h3>
    <form method='POST' action='{{$submit_url}}'>
        @csrf
        <div class='mb-3'>
            <label for='category' class='form-label float-start'>Category</label>
            <input type='text' readonly required class='form-control' id='category' name='category' @if($edit) value="{{$article->category}}" @elseif($category) value="{{$category}}" @else value="{{old('category')}}" @endif>
            <small class='form-text text-danger'>@error('category'){{$message}} @enderror </small>
        </div>
        <div class='mb-3'>
            <label for='title' class='form-label float-start'>Title</label>
            <input type='text' required class='form-control' id='title' name='title' @if($edit) value="{{$article->title}}" @else value="{{old('title')}}" @endif>
            <small class='form-text text-danger'>@error('title'){{$message}}@enderror</small>
        </div>
        <div class='mb-3'>
            <label for='body' class='form-label '>Body</label>
            <textarea class="form-control" name="body" id="body" cols="30" rows="5">@if($edit){{$article->body}}@else{{old('body')}}@endif</textarea>
            <small class='form-text text-danger'>@error('body'){{$message}}@enderror</small>
        </div>

        <button type='submit' class='btn btn-primary'>Submit</button>
    </form>
    <script src="https://cdn.tiny.cloud/1/e6aiwxkshssibfqngwx0wxkxnemniy9m7h9x7143hhate0zf/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        tinymce.init({
            selector: 'textarea#body',
            @include('tinyMCEsettings')
        });
    </script>
</div>
@endsection