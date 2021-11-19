@extends('Templates.content-template')

@section('page-title')
    Change-Person
@endsection

@section('page-content')
    <div class="change-person-main-content">

        <form action="{{ route('update-person', $person['id']) }}" method="POST">
            <div class="message-change-user">
                <h2>User: {{ $person['name'] }}</h2>
            </div>

            @csrf
            @method('PUT')

            <div class="change-person-container-error-message">
                <div class="container-change-person-input">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $person['name'] }}">
                </div>
                <div class="error-message"></div>
            </div>

            <div class="change-person-container-error-message">
                <div class="container-change-person-input">
                    <label for="">Age</label>
                    <input type="number" name="age" value="{{ $person['age'] }}">
                </div>

                <div class="error-message"></div>
            </div>
            
            <div class="submit-button-change-person">
                <button type="submit">change</button>
            </div>
        </form>

    </div>
@endsection