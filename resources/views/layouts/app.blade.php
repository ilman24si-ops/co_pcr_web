<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Politeknik Caltex Riau')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom Style -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        /* Pagination kecil & modern */
        .pagination {
            font-size: 0.8rem;
        }

        .page-link {
            padding: 4px 8px;
            border-radius: 6px !important;
        }

        .pagination svg {
            width: 14px;
            height: 14px;
        }

    </style>

</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="/">
            PCR
        </a>

       
    </div>
</nav>

<!-- Content -->
<div class="container py-5">
    @yield('content')
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3 mt-5">
    <small>© {{ date('Y') }} Politeknik Caltex Riau</small>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
