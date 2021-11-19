<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('page-title') </title>

    <link rel="stylesheet" href="/css/default-style.css">

    <!-- form-template styles -->
    <link rel="stylesheet" href="/css/form-template-style.css">

    <!-- dashboard style -->
    <link rel="stylesheet" href="/css/dahsboard-style.css">

    <!-- change person -->
    <link rel="stylesheet" href="/css/change-person-style.css">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
</head>
<body>
    <div class="body">
        <div class="main-content">
            <div class="flex-main-content">

                @yield('page-content')
            
            </div>
        </div>
    </div>

    <div class="script">
        @yield('script')
    </div>
</body>
</html>