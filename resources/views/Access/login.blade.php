@extends('Templates.form-template')

@section('page-title')
    Login
@endsection

@section('page-action')
    <div class="page-action">
        <h1>Login</h1>
    </div>
@endsection

@section('form-content')
    <div class="form-content">

        <form action="{{ route('login') }}" method="post">
            @csrf

            <div class="input-container-error-message">
                <div class="input-container">
                    <label for="">Email: </label>
                    <input type="text" name="email">
                </div>

                <div class="error-message"></div>
            </div>

            <div class="input-container-error-message">
                <div class="input-container">
                    <label for="">Password: </label>
                    <div class="password-container">
                        <input type="password" name="password">
                        <button type="button"><i class="far fa-eye"></i></button>
                    </div>
                </div>

                <div class="error-message"></div>
            </div>

            <div class="submit-button">
                <button type="submit" disabled="true">login</button>
            </div>

        </form>

    </div>
@endsection

@section('form-navigation')
    <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
@endsection