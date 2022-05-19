<!-- App css -->
@if(Locales::getDir() === 'rtl')
    <link href="{{ asset('css/backend.rtl.css')}}" id="app-light" rel="stylesheet" type="text/css" />
@else
    <link href="{{ asset('css/backend.css')}}" id="app-light" rel="stylesheet" type="text/css" />
@endif

@stack('css')
