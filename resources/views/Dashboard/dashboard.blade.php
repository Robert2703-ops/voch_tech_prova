@extends('Templates.content-template')

@section('page-title')
    Dashboard
@endsection

@section('page-content')
    <div class="content-table-create-person-header">
        <div class="header">
            <h1>Welcome, {{ $userName }}</h1>

            <form action="{{ route('logout') }}" method="post" class="logout-form">
                @csrf

                <div>
                    <button type="submit"><i class="fas fa-sign-out-alt"></i></button>
                </div>
            </form>
        </div>

        
        <div class="content-table">
            <table>
                <thead>
                    <tr>
                        <th>User Id</th>
                        <th> User name </th>
                        <th> User age </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($people as $person)
                        <tr>
                            <th> {{ $person['id'] }} </th>
                            <th> {{ $person['name'] }} </th>
                            <th> {{ $person['age'] }} </th>
                            <th>

                                <div class="person-options-management">
                                    <div class="edit-person option">
                                        <button type="button" onclick="location.href = '{{ route('edit-person', $person['id']) }}' "><i class="fas fa-pencil-alt"></i></button>
                                    </div>  

                                    <div class="delete-person option">
                                        <form action="{{ route('delete-person', $person['id']) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>

                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="create-person">
                <button type="button" onclick="ShowModal()"> <i class="fas fa-plus"></i> </button>
            </div>
        </div>
    </div>

    <div class="modal-create-person" id="create-person-modal">

        <div class="form-content-container">

            <div class="form-content-modal">

                <form action="{{ route('create-person') }}" method="post">
                    @csrf

                    <div class="close-modal"><i class="fas fa-times"></i></div>

                    <div class="message-create-person-modal">
                        <h1>Create Person</h1>
                    </div>

                    <div class="create-person-input-container-error-message">
                        <div class="container-input">
                            <label for="">Person name</label>
                            <input type="text" name="name">
                        </div>
                        <div class="error-message"></div>
                    </div>
                    
                    <div class="create-person-input-container-error-message">
                        <div class="container-input">
                            <label for="">Person age</label>
                            <input type="number" name="age" id="">
                        </div>
    
                        <div class="error-message"></div>
                    </div>

                    <div class="submit-button-create-person">
                        <button type="submit"> <i class="fas fa-plus"></i> </button>
                    </div>
                </form>
            </div>

        </div>

    </div>

    @section('script')
        <script src="/js/modal.js"></script>
    @endsection

@endsection

@section('script')
    <script src="/js/checkfields.js"></script>
@endsection