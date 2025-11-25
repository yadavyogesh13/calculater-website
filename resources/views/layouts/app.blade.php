<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="All-in-one calculator tools for finance, health, tech, and daily use. Fast, accurate, and easy to use. Try now!">
    <meta name="robots" content="index, follow">
    <meta name="author" content="CalculatorTools">

    <meta property="og:type" content="website">
    <meta property="og:locale" content="en_US">
    <meta property="og:site_name" content="CalculatorTools">
    <meta property="og:url" content="https://calculatertools.com">
    <meta property="og:title" content="All-in-One Calculator Tools | Finance, Health, Tech & Daily Calculators">
    <meta property="og:description" content="Free online calculator tools for everyone.">
    <meta property="og:image" content="https://calculatertools.com/og-image.png">
    <meta property="og:image:alt" content="All-in-One Calculator Tools">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="All-in-One Calculator Tools | Finance, Health, Tech & Daily Calculators">
    <meta name="twitter:description" content="Free online calculator tools for everyone.">
    <meta name="twitter:image" content="https://calculatertools.com/og-image.png">

    <link rel="icon" type="image/png" href="/favicon.png">
    <link rel="canonical" href="https://calculatertools.com/">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="dns-prefetch" href="https://cdn.tailwindcss.com">

    <title>@yield('title', 'CalculatorTools - All-in-One Calculator Tools | Finance, Health, Tech & Daily Calculators')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    @verbatim
    <script type="application/ld+json">
    {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "CalculatorTools",
    "url": "https://calculatertools.com",
    "logo": "https://calculatertools.com/logo.png",
    "sameAs": [
        "https://facebook.com/calculatertools",
        "https://x.com/calculatertools",
        "https://linkedin.com/company/calculatertools"
    ]
    }
    </script>
    @endverbatim


    <style>
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .calculator-card { transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .calculator-card:hover { transform: translateY(-5px); box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04); }
        .nav-link { position: relative; }
        .nav-link::after { content: ''; position: absolute; width: 0; height: 2px; bottom: -5px; left: 0; background-color: #3b82f6; transition: width 0.3s ease; }
        .nav-link:hover::after { width: 100%; }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Header -->
    @include('components.header')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <script>
        // Mobile menu toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        // Prevent right-click context menu
        // document.addEventListener('contextmenu', function(e) {
        //     e.preventDefault();
        //     return false;
        // });
        
        // Prevent keyboard shortcuts for view source
        // document.addEventListener('keydown', function(e) {
        //     if (e.key === 'F12' || 
        //         (e.ctrlKey && e.shiftKey && e.key === 'I') || 
        //         (e.ctrlKey && e.shiftKey && e.key === 'C') ||
        //         (e.ctrlKey && e.key === 'u')) {
        //         e.preventDefault();
        //         return false;
        //     }
        // });

        // Disable text selection on calculator elements
        const calculators = document.querySelectorAll('.calculator-card, .calculator-display');
        calculators.forEach(calc => {
            calc.style.userSelect = 'none';
            calc.style.webkitUserSelect = 'none';
        });
        
    </script>
    @yield('scripts')
</body>
</html>