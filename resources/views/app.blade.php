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
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;700;900&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
        
        <style>
            body {
                font-family: 'Inter', sans-serif;
                background-color: #0d1117;
                color: #c9d1d9;
            }
            h1, h2, h3, h4, h5, h6, .outfit-font {
                font-family: 'Outfit', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        @inertia
    </body>
</html>
