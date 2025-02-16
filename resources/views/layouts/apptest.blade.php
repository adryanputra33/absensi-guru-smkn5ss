<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            background-color: #e3f2fd;
            min-height: 100vh;
        }
        .sidebar a {
            text-decoration: none;
            color: black;
            display: block;
            padding: 10px;
        }
        .sidebar a:hover {
            background-color: #d0e4fc;
            border-radius: 5px;
        }
        .dashboard-card {
            padding: 30px;
            border-radius: 10px;
            color: white;
            font-size: 1.2rem;
            text-align: center;
            text-decoration: none;
            display: block;
        }
        .dashboard-card i {
            font-size: 2rem;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        @include('partials.sidebar')
        <main class="col-md-9 col-lg-10 p-4">
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
