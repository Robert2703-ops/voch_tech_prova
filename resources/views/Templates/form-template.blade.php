@extends('Templates.content-template')

@section('page-title')
    @yield('page-title')
@endsection

@section('page-content')
    
    <div class="page-content">

        @yield('page-action')

        <div class="form-template-content">
    
            @if ( $errors->any() )
                <ul class="message-errors-form">
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            @endif
    
            @yield('form-content')
    
        </div>
    
        <div class="form-template-navigation">
            @yield('form-navigation')
        </div>

    </div>

@endsection

@section('script')
    <script src="/js/show-password.js"></script>
@endsection