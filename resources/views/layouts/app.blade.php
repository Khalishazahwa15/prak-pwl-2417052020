<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'PWL App' }}</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f8f9fb;
            color: #273142;
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
        }

        .page-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        /* =========================
        NAVBAR
        ========================= */

        .custom-navbar {
            background: #ffffff;
            border-bottom: 1px solid #e8e8e8;
            padding: 15px 0;
        }

        .navbar-brand {
            text-decoration: none;
        }

        .brand-name {
            font-size: 23px;
            font-weight: 700;
            color: #263247;
            letter-spacing: -0.5px;
        }

        .nav-link {
            color: #687386 !important;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            padding: 9px 15px !important;
            border-radius: 9px;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #8a642d !important;
            background: #faf4e9;
        }

        .btn-add {
            background: #dfb56f;
            color: #ffffff !important;
            border: none;
            padding: 10px 17px;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
        }

        .btn-add:hover {
            background: #d2a45c;
            color: #ffffff !important;
        }

        /* =========================
        CONTENT
        ========================= */

        .page-content {
            padding: 55px 0 65px;
        }

        .page-heading {
            margin-bottom: 30px;
        }

        .page-heading .eyebrow {
            color: #69758a;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 7px;
        }

        .page-heading h1 {
            color: #202c3f;
            font-size: 36px;
            font-weight: 700;
            letter-spacing: -1px;
            margin-bottom: 8px;
        }

        .page-heading p {
            color: #758095;
            font-size: 15px;
            margin-bottom: 0;
        }

        /* =========================
        STAT
        ========================= */

        .stat-card {
            height: 100%;
            background: #ffffff;
            border: 1px solid #e9e8e5;
            border-radius: 13px;
            padding: 20px;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 17px;
        }

        .stat-icon.people {
            background: #fff3dc;
            color: #a87525;
        }

        .stat-icon.active {
            background: #e7f5ed;
            color: #39966a;
        }

        .stat-icon.online {
            background: #edf2ff;
            color: #5e78c8;
        }

        .stat-label {
            color: #718096;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .stat-value {
            color: #263247;
            font-size: 23px;
            font-weight: 700;
        }

        /* =========================
        DATA SECTION
        ========================= */

        .data-section {
            margin-top: 42px;
        }

        .data-heading {
            margin-bottom: 18px;
        }

        .data-heading h4 {
            color: #263247;
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .data-heading p {
            color: #7a8597;
            font-size: 14px;
            margin: 0;
        }

        .data-count {
            background: #faf3e5;
            color: #91672c;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        /* =========================
        TABLE
        ========================= */

        .table-card {
            background: #ffffff;
            border: 1px solid #e7e8eb;
            border-radius: 13px;
            overflow: hidden;
        }

        .custom-table {
            margin: 0;
        }

        .custom-table thead th {
            background: #f7f8fa;
            color: #667085;
            border-bottom: 1px solid #e8eaee;
            padding: 15px 18px;
            font-size: 13px;
            font-weight: 600;
        }

        .custom-table tbody td {
            padding: 17px 18px;
            color: #3e4859;
            border-bottom: 1px solid #edf0f3;
            vertical-align: middle;
            font-size: 14px;
        }

        .custom-table tbody tr:last-child td {
            border-bottom: none;
        }

        .custom-table tbody tr:hover {
            background: #fcfcfd;
        }

        .user-number {
            color: #4e596b;
            font-weight: 500;
        }

        .user-name {
            color: #293447;
            font-weight: 600;
        }

        .npm-text {
            color: #667085;
            font-family: monospace;
            font-size: 13px;
        }

        .class-badge {
            display: inline-block;
            padding: 5px 11px;
            border-radius: 20px;
            background: #fff4df;
            color: #946b30;
            font-size: 12px;
            font-weight: 600;
        }

        /* =========================
        FORM
        ========================= */

        .form-card {
            max-width: 700px;
            margin: 0 auto;
            background: #ffffff;
            border: 1px solid #e7e8eb;
            border-radius: 13px;
            padding: 30px;
        }

        .form-label {
            color: #374151;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 7px;
        }

        .form-control,
        .form-select {
            border: 1px solid #dfe3e8;
            border-radius: 8px;
            padding: 10px 12px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #dfb56f;
            box-shadow: 0 0 0 3px rgba(223, 181, 111, 0.12);
        }

        /* =========================
        FOOTER
        ========================= */

        .custom-footer {
            background: #ffffff;
            border-top: 1px solid #e8e8e8;
            padding: 20px 0;
            margin-top: auto;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #8992a2;
            font-size: 13px;
        }

        /* =========================
        RESPONSIVE
        ========================= */

        @media (max-width: 768px) {

            .page-content {
                padding: 35px 0 45px;
            }

            .page-heading h1 {
                font-size: 29px;
            }

            .footer-content {
                flex-direction: column;
                gap: 7px;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="page-wrapper">

    <x-navbar />

    <main>
        @yield('content')
    </main>

    <x-footer />

</div>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>