@extends('mylayout.main')
@section('title')
Edit Notice Board
@endsection
@section('body')
<div class="container my-3">
    <form method='POST' action='/update-board'>
        @csrf
        <div class='mb-3'>
            <label for='board' class='form-label '>Edit Board</label>
            <textarea class="form-control" name="board" id="board" cols="30" rows="10">{{$board}}</textarea>
            {{-- <small class='form-text text-muted'>Add comment for input</small> --}}
        </div>
        <button type='submit' class='btn btn-primary'>Submit</button>
    </form>
    <script src="https://cdn.tiny.cloud/1/e6aiwxkshssibfqngwx0wxkxnemniy9m7h9x7143hhate0zf/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        tinymce.init({
            selector: 'textarea#board',
            @include('tinyMCEsettings')
        });
    </script>
</div>
@endsection