@php
    // $stops = [
    //     '<stop  offset="0" style="stop-color:#282254"/>',
    // 	'<stop  offset="0.1629" style="stop-color:#4F2B51"/>',
    // 	'<stop  offset="0.3921" style="stop-color:#843A47"/>',
    // 	'<stop  offset="0.5988" style="stop-color:#AF4A39"/>',
    // 	'<stop  offset="0.7754" style="stop-color:#D0582A"/>',
    // 	'<stop  offset="0.9149" style="stop-color:#E4611B"/>',
    // 	'<stop  offset="1" style="stop-color:#EB6413"/>',
    // ];

    $stops = [
        '<stop offset="0" style="stop-opacity: 0.1; stop-color:currentColor" />',
        '<stop offset="0.1629" style="stop-opacity: 0.3; stop-color:currentColor" />',
        '<stop offset="0.3921" style="stop-opacity: 0.5; stop-color: currentColor" />',
        '<stop offset="0.5988" style="stop-opacity: 0.65; stop-color:currentColor" />',
        '<stop offset="0.7754" style="stop-opacity: 0.8; stop-color:currentColor" />',
        '<stop offset="0.9149" style="stop-opacity: 0.95; stop-color: currentColor" />',
        '<stop offset="1" style="stop-color:currentColor" />',
    ];
@endphp
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
    y="0px" viewBox="0 0 119.87 80.78" style="enable-background:new 0 0 119.87 80.78;" xml:space="preserve">

    <linearGradient id="gradient" gradientUnits="userSpaceOnUse" x1="61.1264" y1="71.0183" x2="41.2432"
        y2="28.2014">
        @foreach ($stops as $stop)
            {!! $stop !!}
        @endforeach
    </linearGradient>

    {{-- <linearGradient id="SVGID_00000114042918967093812030000003229080647226151334_" gradientUnits="userSpaceOnUse"
        x1="94.2351" y1="63.0226" x2="65.1998" y2="0.4974">
        @foreach ($stops as $stop)
            {!! $stop !!}
        @endforeach
    </linearGradient> --}}

    <polygon
        points="
    105.29,8.04 105.1,7.95 74.38,69.82 66.48,43.87 55.34,43.02 58.39,31.92 36.27,15.76 105.31,8.26 105.29,8.04 105.1,7.95
    105.29,8.04 105.27,7.83 35.11,15.45 57.89,32.1 54.78,43.42 66.15,44.28 74.28,70.99 105.66,7.79 105.27,7.83 	" />

    <polygon
        points="
		68.43,33.56 68.3,33.49 47.57,75.26 42.24,57.74 34.71,57.17 36.77,49.67 21.84,38.76 68.45,33.7 68.43,33.56 68.3,33.49
		68.43,33.56 68.42,33.41 21.06,38.55 36.44,49.79 34.34,57.43 42.01,58.02 47.5,76.05 68.68,33.38 68.42,33.41 	" />
</svg>
