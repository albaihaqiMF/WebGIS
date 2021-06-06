<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
    <style>
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
        }

        .header-sidebar {
            margin: 0;
            padding: 0;
            background: url('../image/mount.jpg');
            background-size: cover;
            height: 120px;
            display: flex;
            justify-content: center;
            align-items: center;
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
            background: cyan;
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
            margin-bottom: 20px
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