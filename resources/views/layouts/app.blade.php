<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Coding Test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    h1, h2, h3, h4, h5, h6 {
        font-weight: 600; /* lebih tegas untuk heading */
    }

    /* Opsional: modernisasi tombol & card */
    .card {
        border-radius: 12px;
    }
    .btn-primary, .btn-success, .btn-warning, .btn-danger {
        border-radius: 10px;
        font-weight: 600;
        font-style:12px;
    }

    

    .
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Raiyendra Vanza</a>
            <div>
                <a class="btn btn-primary" style="font-size:12px; background:black;" href="{{ route('products.index') }}">Products</a>
                <a class="btn btn-secondary" style="font-size:12px; background:black;" href="{{ route('categories.index') }}">Categories</a>
            </div>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>