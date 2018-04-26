@extends('partials.master')

@section('title', $file->getTitle())

@section('body')

<div class="center">
    <input class="hint url" type="text" id="url" value="{{ $file->getPreviewUrl() }}" readonly>

    <p class="noselect cliphint" id="cliphint" m1="click url to copy" m2="copied to clipboard">click url to copy</p>

    <p class="hint grey noselect defaultcursor">
        click the file to download<br>
        ({{ $file->getFormattedHint() }})
    </p>
    
    <a class="hint" href="{{ $file->getDownloadUrl() }}" target="_blank">
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

                <text class="noselect svgtext" id="downloads" x="50%" y="48%" fill="black" alignment-baseline="middle" text-anchor="middle">
                    {{ $file->getFormattedDownloadCount() }}
                </text>
                <text class="noselect svgtext" x="50%" y="58%" fill="black" alignment-baseline="middle" text-anchor="middle">
                    download{{ $file->downloads == 1 ? '' : 's' }}
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

<script type="text/javascript" src="/assets/js/preview.js"></script>
<script type="text/javascript"> 
    downloads = {{ $file->downloads }};
</script>

@endsection
