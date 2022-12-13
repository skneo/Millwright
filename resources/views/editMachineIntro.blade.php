@extends('mylayout.main')
@section('title') Edit {{$machineName}} Introduction @endsection
@section('body')
<div class="container my-3">
    <script src="https://cdn.tiny.cloud/1/e6aiwxkshssibfqngwx0wxkxnemniy9m7h9x7143hhate0zf/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <h4>Edit introduction of {{$machineName}}</h4>
    <form method='POST' action='/update-introduction/{{$id}}'>
        @csrf
        <div class='mb-3'>
            {{-- <label for='refData' class='form-label '>Referance data</label><br> --}}
            <textarea class="form-control" name="machineIntro" id="machineIntro" cols="30" rows="5">{{$intro}}</textarea>
        </div>
        <button type='submit' class='btn btn-primary'>Submit</button>
    </form>
    <script>
        var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        tinymce.init({
            selector: 'textarea#machineIntro',
            @include('tinyMCEsettings')
        });
    </script>
</div>
@endsection