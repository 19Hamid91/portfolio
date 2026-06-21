<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Primary Meta Tags -->
        <title inertia>{{ config('app.name', 'My Portfolio') }}</title>
        <meta name="title" content="My Portfolio">
        <meta name="description" content="Discover my latest projects and skills as a Full Stack Developer.">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@300;400;500;700&display=swap" rel="stylesheet">

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="/images/logo.png">

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
        
        <style>
            body {
                font-family: 'Inter', sans-serif;
                background-color: #000000;
                color: #FFFFFF;
            }
            h1, h2, h3, h4, h5, h6 {
                font-family: 'Playfair Display', serif;
            }
        </style>
    </head>
    <body class="antialiased">
        @inertia
    </body>
</html>
