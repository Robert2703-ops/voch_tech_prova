@extends('Templates.form-template')

@section('page-title')
    Register
@endsection

@section('page-action')
    <div class="page-action">
        <h1>Register</h1>
    </div>
@endsection

@section('form-content')
    <div class="form-content">

        <form action="{{ route('register') }}" method="post">
            @csrf

            <div class="input-container-error-message">
                <div class="input-container">
                    <label for="">Name: </label>
                    <input type="text" name="name">
                </div>

                <div class="error-message">

                </div>
            </div>

            <div class="input-container-error-message">
                <div class="input-container">
                    <label for="">Email: </label>
                    <input type="text" name="email">
                </div>

                <div class="error-message">

                </div>
            </div>

            <div class="input-container-error-message">
                <div class="input-container">
                    <label for="">Password: </label>
                    <div class="password-container">
                        <input type="password" name="password">
                        <button type="button"><i class="far fa-eye"></i></button>
                    </div>
                </div>

                <div class="error-message">
                    
                </div>
            </div>

            <div class="input-container-error-message">
                <div class="input-container">
                    <label for="">Confirm password: </label>
                    <div class="password-container">
                        <input type="password" name="password_confirmation">
                        <button type="button"><i class="far fa-eye"></i></button>
                    </div>
                </div>

                <div class="error-message">

                </div>
            </div>

            <div class="submit-button">
                <button type="submit" >Create</button>
            </div>

        </form>

    </div>
@endsection

@section('form-navigation')
    <p>Have an account already? <a href="{{ route('login') }}">Login</a></p>
@endsection