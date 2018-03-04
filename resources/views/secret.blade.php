@extends('partials.master')

@section('title', 'Filespot')

@section('body')

<div class="center">
    <form method="POST" action="{{ route('upload') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="text" name="secret" id="secret" placeholder="secret"><br>
        <input class="handcursor" type="file" name="file" required>
    </form>
</div>

@endsection

@section('scripts')

<script type="text/javascript" src="/assets/js/main.js"></script>

@endsection
