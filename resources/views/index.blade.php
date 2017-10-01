@extends('partials.master')

@section('title', 'Filespot')

@section('body')

<div class="center">
    <form method="POST" action="{{ route('upload') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="file">
        <input type="submit">
    </form>

    <p class="noselect defaultcursor">
        click anywhere or<br>
        drag file onto page<br>
        to upload
    </p>
</div>

@endsection
