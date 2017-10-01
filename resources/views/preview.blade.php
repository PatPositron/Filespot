@extends('partials.master')

@section('title', $file->name)

@section('body')

<div class="center">
    <p class="hint noselect defaultcursor">
        click the file to download<br>
        @if($file->downloads)
        (last click 
        @else
        (uploaded 
        @endif
        {{ $file->updated_at->diffForHumans() }})
    </p>

    <a href="{{ $file->getDownloadUrl() }}">
    <div class="filecontainer handcursor" id="file">
        <svg width="100%" height="100%" viewBox="0 0 380 500" shape-rendering="crispEdges">
            <defs>
                <filter id="shadow" x="0" y="0" width="100%" height="100%">
                    <feGaussianBlur in="SourceAlpha" stdDeviation="3" result="blur"></feGaussianBlur>
                    <feOffset in="blur" result="offsetBlur"></feOffset>
                    <feFlood id="flood" flood-color="rgb(30, 100, 130)" flood-opacity="1" result="offsetColor"></feFlood>
                    <feComposite in="offsetColor" in2="offsetBlur" operator="in" result="offsetBlur"></feComposite>
                </filter>
            </defs>

            <rect id="bigShadow" x="10" y="10" width="370" height="490" fill="rgb(30, 100, 130)"></rect>
            <rect id="body" x="0" y="0" width="370" height="490" fill="rgb(1, 145, 200)"></rect>

            <polygon points="0,0 0,130 130,0" fill="white"></polygon>

            <polygon points="135,135 5,135 135,5" fill="rgb(1, 145, 200)" filter="url(#shadow)"></polygon>
            <polygon id="triangle" points="130,130 0,130 130,0" fill="rgb(1, 145, 200)"></polygon>

            <text id="downloads" x="50%" y="45%" fill="black" alignment-baseline="middle" text-anchor="middle" class="noselect svgtext">
                {{ $file->downloads }}
            </text>
            <text x="50%" y="55%" fill="black" alignment-baseline="middle" text-anchor="middle" class="noselect svgtext">
                downloads
            </text>
        </svg>
    </div>
    </a>

    <p class="filename">
        {{ $file->name }}
    </p>

</div>

@endsection

@section('scripts')

<script type="text/javascript"> 
    downloads = {{ $file->downloads }};
</script>

@endsection
