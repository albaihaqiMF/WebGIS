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
            background: url('image/mount.jpg');
            background-size: cover;
            height: 120px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .body-sidebar {
            padding: 20px
        }

        ul li a {
            display: flex;
            justify-content: space-between;
            font-size: 18px;
        }

        .container-fluid {
            margin-left: 250px
        }
    </style>
    <title>Admin</title>
</head>

<body>
    <div class="d-flex">
        @include('admin.sidebar')
        <div class="container-fluid">
            This is admin page
        </div>
    </div>
</body>

</html>