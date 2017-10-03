@extends('partials.master')

@section('title', 'Filespot')

@section('body')

<div class="center">
    <p class="hint noselect defaultcursor">
        click anywhere or<br>
        drag file onto page<br>
        to upload
    </p>
</div>

<form method="POST" action="{{ route('upload') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input class="handcursor" type="file" name="file" id="file" required>
</form>

@endsection

@section('scripts')

<script type="text/javascript" src="/assets/js/main.js"></script>

@endsection
