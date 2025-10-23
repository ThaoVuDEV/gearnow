<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="GEARNOW - Cửa hàng chuyên cung cấp các thiết bị, phụ kiện và công nghệ mới nhất dành cho bạn.">
    <meta name="keywords" content="thiết bị, công nghệ, phụ kiện, đồ công nghệ, sản phẩm mới, gear, gadgets, accessories">
    <meta name="author" content="GEARNOW">
    <meta property="og:title" content="GEARNOW - Cửa hàng công nghệ và phụ kiện hiện đại">
    <meta property="og:description"
        content="Khám phá những sản phẩm công nghệ, phụ kiện và đồ chơi công nghệ mới nhất tại GEARNOW.">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/favicon.png') }}">
    <title>GEARNOW - Thiết bị & Phụ kiện công nghệ</title>
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>

<body class="font-sans antialiased">
    @routes
    @inertia
</body>

</html>
