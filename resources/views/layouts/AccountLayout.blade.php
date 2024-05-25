<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Dashboard - HRMS admin template</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="{{ asset('assets/user/css/account-order.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/page.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/product-review.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/product-detail.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/index.css') }}">
</head>

<body class="set_body_top">
    @include('layouts.component.header')

    @yield('content')

    @include('layouts.component.footer')
</body>

</html>