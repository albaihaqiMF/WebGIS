<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
    <style>
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: #132c33;
        }

        .header-sidebar {
            margin: 0;
            padding: 10px;
            background-size: cover;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card-sidebar h3{
            color: #d8e3e7;
        }
        .body-sidebar{
            margin-top: 20px
        }
        .body-sidebar a {
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            font-size: 18px;
            width: 100%;
        }
        .body-sidebar a:hover{
            background: #126e82;
            color: #d8e3e7;
        }
        i.fas{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container-fluid {
            margin-left: 250px;
        }
        .footer-sidebar{
            position: fixed;
            bottom: 0
        }
        .myDropdown{
            width: 100%;
        }
        .myBtn{
            background: none;
            outline: none;
            border: none;
            padding: 20px;
            margin-bottom: 20px;
            color: #d8e3e7;
        }
    </style>
    <title>Admin</title>
    @yield('style')
</head>

<body>
    <div class="d-flex">
        @include('admin.sidebar')
        @yield('content')
    </div>
</body>

</html>