<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <title>Order Management</title>

    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
            margin-left: 10px; /* Sidebar width */
            padding: 30px;
            transition: all 0.3s ease;
        }

        .page-container {
            background: #fff;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        }

        .table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }

        .btn-primary {
            border-radius: 8px;
            padding: 10px 18px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            main {
                margin-left: 0;
                padding: 15px;
            }
        }
    </style>
</head>

<body>

    @include('partials.header')

    <div class="d-flex">
        @include('partials.sidebar')

        <main>
            <div class="page-container">
                @yield('content')
            </div>
        </main>
    </div>

    @include('partials.footer')

</body>

</html>
