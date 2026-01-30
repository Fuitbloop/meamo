<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Home') - MEAMO Photobooth</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Tailwind CSS via CDN untuk animasi yang lebih lengkap -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#2563eb',
                            600: '#1d4ed8',
                            700: '#1e40af',
                        },
                        secondary: {
                            500: '#facc15',
                            600: '#eab308',
                            700: '#ca8a04',
                        }
                    },
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', '-apple-system', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-down': 'slideDown 0.3s ease-out',
                        'slide-up': 'slideUp 0.3s ease-out',
                        'slide-in': 'slideIn 0.3s ease-out',
                        'slide-out': 'slideOut 0.3s ease-out',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'hamburger-top': 'hamburgerTop 0.3s ease-out forwards',
                        'hamburger-middle': 'hamburgerMiddle 0.3s ease-out forwards',
                        'hamburger-bottom': 'hamburgerBottom 0.3s ease-out forwards',
                        'hamburger-top-reverse': 'hamburgerTopReverse 0.3s ease-out forwards',
                        'hamburger-middle-reverse': 'hamburgerMiddleReverse 0.3s ease-out forwards',
                        'hamburger-bottom-reverse': 'hamburgerBottomReverse 0.3s ease-out forwards',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideDown: {
                            '0%': { transform: 'translateY(-10px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(10px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        slideIn: {
                            '0%': { transform: 'translateY(-100%)' },
                            '100%': { transform: 'translateY(0)' },
                        },
                        slideOut: {
                            '0%': { transform: 'translateY(0)' },
                            '100%': { transform: 'translateY(-100%)' },
                        },
                        hamburgerTop: {
                            '0%': { transform: 'rotate(0) translateY(0)' },
                            '50%': { transform: 'translateY(6px)' },
                            '100%': { transform: 'translateY(6px) rotate(45deg)' }
                        },
                        hamburgerMiddle: {
                            '0%': { opacity: '1' },
                            '100%': { opacity: '0' }
                        },
                        hamburgerBottom: {
                            '0%': { transform: 'rotate(0) translateY(0)' },
                            '50%': { transform: 'translateY(-6px)' },
                            '100%': { transform: 'translateY(-6px) rotate(-45deg)' }
                        },
                        hamburgerTopReverse: {
                            '0%': { transform: 'translateY(6px) rotate(45deg)' },
                            '50%': { transform: 'translateY(6px) rotate(0)' },
                            '100%': { transform: 'translateY(0) rotate(0)' }
                        },
                        hamburgerMiddleReverse: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        },
                        hamburgerBottomReverse: {
                            '0%': { transform: 'translateY(-6px) rotate(-45deg)' },
                            '50%': { transform: 'translateY(-6px) rotate(0)' },
                            '100%': { transform: 'translateY(0) rotate(0)' }
                        }
                    }
                }
            }
        }
    </script>

    <!-- Font Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <style>
        :root {
            --meamo-yellow: #FACC15;
            --meamo-blue: #2563EB;
            --meamo-dark-blue: #1E40AF;
            --meamo-light-blue: #DBEAFE;
        }

        .navbar-shadow {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .dropdown-shadow {
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .gradient-text {
            background: linear-gradient(135deg, var(--meamo-blue) 0%, var(--meamo-dark-blue) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .gradient-text-yellow {
            background: linear-gradient(135deg, var(--meamo-yellow) 0%, #F59E0B 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hover-lift {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .hover-lift:hover {
            transform: translateY(-2px);
        }

        /* Custom styles for scroll behavior */
        .navbar-scroll-hidden {
            transform: translateY(-100%);
            transition: transform 0.3s ease;
        }

        .navbar-scroll-visible {
            transform: translateY(0);
            transition: transform 0.3s ease;
        }

        .navbar-blur {
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            background: rgba(255, 255, 255, 0.95);
        }

        .navbar-elevated {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        /* Custom Hamburger Styles */
        .hamburger-line {
            display: block;
            width: 24px;
            height: 2px;
            background-color: #4B5563;
            transition: all 0.3s ease;
            transform-origin: center;
        }

        .hamburger-line:nth-child(2) {
            margin: 5px 0;
        }

        /* Hamburger Animation */
        .hamburger-open .hamburger-line:nth-child(1) {
            animation: hamburgerTop 0.3s ease-out forwards;
        }

        .hamburger-open .hamburger-line:nth-child(2) {
            animation: hamburgerMiddle 0.3s ease-out forwards;
        }

        .hamburger-open .hamburger-line:nth-child(3) {
            animation: hamburgerBottom 0.3s ease-out forwards;
        }

        .hamburger-close .hamburger-line:nth-child(1) {
            animation: hamburgerTopReverse 0.3s ease-out forwards;
        }

        .hamburger-close .hamburger-line:nth-child(2) {
            animation: hamburgerMiddleReverse 0.3s ease-out forwards;
        }

        .hamburger-close .hamburger-line:nth-child(3) {
            animation: hamburgerBottomReverse 0.3s ease-out forwards;
        }

        /* Mobile Menu Animation */
        .mobile-menu-enter {
            transform: translateY(-10px);
            opacity: 0;
        }

        .mobile-menu-enter-active {
            transform: translateY(0);
            opacity: 1;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .mobile-menu-exit {
            transform: translateY(0);
            opacity: 1;
        }

        .mobile-menu-exit-active {
            transform: translateY(-10px);
            opacity: 0;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        /* Mobile menu link hover effect */
        .mobile-link {
            position: relative;
            overflow: hidden;
        }

        .mobile-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(to right, var(--meamo-blue), var(--meamo-dark-blue));
            transition: width 0.3s ease;
        }

        .mobile-link:hover::after {
            width: 100%;
        }

        /* Custom button styles */
        .btn-whatsapp {
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
            color: white;
            font-weight: 700;
            padding: 0.75rem 2rem;
            border-radius: 9999px;
            box-shadow: 0 8px 25px rgba(37, 211, 102, 0.3);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .btn-whatsapp::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: left 0.5s;
        }

        .btn-whatsapp:hover::before {
            left: 100%;
        }

        .btn-whatsapp:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(37, 211, 102, 0.4);
        }

        /* Nav link hover animation */
        .nav-link-custom {
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-link-custom::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(to right, var(--meamo-yellow), #F59E0B);
            transition: width 0.3s ease;
        }

        .nav-link-custom:hover::after {
            width: 100%;
        }

        .nav-link-custom.active {
            color: var(--meamo-blue);
            font-weight: 600;
        }

        .nav-link-custom.active::after {
            width: 100%;
        }

        /* Footer styles */
        .footer-bg {
            background: linear-gradient(135deg, #1F2937 0%, #111827 100%);
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #9CA3AF;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .social-icon:hover {
            background: linear-gradient(135deg, var(--meamo-blue), var(--meamo-dark-blue));
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.3);
            border-color: transparent;
        }

        /* Responsive text sizes */
        @media (max-width: 640px) {
            .text-xl {
                font-size: 1.25rem;
            }
            .text-lg {
                font-size: 1.125rem;
            }
            .text-sm {
                font-size: 0.875rem;
            }
            .text-xs {
                font-size: 0.75rem;
            }
        }
    </style>
</head>
<body class="font-sans bg-gradient-to-br from-gray-50 to-gray-100 text-gray-800 min-h-screen">

    <!-- Modern Navbar dengan Scroll Behavior -->
    <nav id="mainNavbar"
         class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-md navbar-shadow border-b border-gray-100
                navbar-scroll-visible transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">

                <!-- Logo dengan animasi -->
                <a href="{{ route('home') }}"
                   class="flex items-center space-x-2 group hover-lift z-50">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-blue-500 to-blue-600
                                flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-300">
                        <i class='bx bx-camera text-white text-sm'></i>
                    </div>
                    <span class="text-xl font-bold gradient-text tracking-tight">
                        MEAMO<span class="text-yellow-500">Photo</span>
                    </span>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-1">
                    <!-- Navigation Links -->
                    <div class="flex items-center space-x-1 mr-4">
                        <a href="{{ route('home') }}"
                           class="nav-link-custom px-4 py-2 rounded-lg text-gray-600 hover:text-blue-600
                                  transition-all duration-300 group {{ request()->routeIs('home') ? 'active' : '' }}">
                            <i class='bx bx-home-alt-2 mr-2'></i>
                            Home
                        </a>

                        <a href="{{ route('gallery') }}"
                           class="nav-link-custom px-4 py-2 rounded-lg text-gray-600 hover:text-blue-600
                                  transition-all duration-300 group {{ request()->routeIs('gallery') ? 'active' : '' }}">
                            <i class='bx bx-images mr-2'></i>
                            Gallery
                        </a>

                        <a href="{{ route('services') }}"
                           class="nav-link-custom px-4 py-2 rounded-lg text-gray-600 hover:text-blue-600
                                  transition-all duration-300 group {{ request()->routeIs('services') ? 'active' : '' }}">
                            <i class='bx bx-camera-movie mr-2'></i>
                            Services
                        </a>

                        <a href="{{ route('schedules') }}"
                           class="nav-link-custom px-4 py-2 rounded-lg text-gray-600 hover:text-blue-600
                                  transition-all duration-300 group {{ request()->routeIs('schedules') ? 'active' : '' }}">
                            <i class='bx bx-calendar mr-2'></i>
                            Schedules
                        </a>

                        <a href="{{ route('contact') }}"
                           class="nav-link-custom px-4 py-2 rounded-lg text-gray-600 hover:text-blue-600
                                  transition-all duration-300 group {{ request()->routeIs('contact') ? 'active' : '' }}">
                            <i class='bx bx-phone mr-2'></i>
                            Contact
                        </a>
                    </div>

                    <!-- WhatsApp CTA Button -->
                    <a href="{{ route('contact') }}"
                       class="btn-whatsapp ml-4 hover-lift transform hover:-translate-y-0.5">
                        <i class='bx bxl-whatsapp mr-2'></i>
                        Book via WhatsApp
                    </a>
                </div>

                <!-- Mobile menu button -->
                <button id="mobileMenuBtn"
                        class="md:hidden p-2.5 rounded-lg hover:bg-gray-100
                               transition-colors duration-300 relative z-50
                               flex flex-col items-center justify-center w-12 h-12
                               hamburger-close">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </button>
            </div>

            <!-- Mobile Navigation Menu -->
            <div id="mobileMenu"
                 class="hidden md:hidden border-t border-gray-100 py-4
                        mobile-menu-exit">
                <div class="flex flex-col space-y-1">
                    <a href="{{ route('home') }}"
                       class="mobile-link flex items-center px-4 py-3.5 rounded-lg hover:bg-gray-50
                              transition-all duration-300 text-gray-700 font-medium
                              group {{ request()->routeIs('home') ? 'bg-blue-50 text-blue-600' : '' }}">
                        <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center mr-3
                                    group-hover:bg-blue-100 transition-colors">
                            <i class='bx bx-home-alt-2 text-blue-600 text-lg'></i>
                        </div>
                        <span class="flex-1">Home</span>
                        <i class='bx bx-chevron-right text-gray-400
                               group-hover:text-blue-600 transition-colors'></i>
                    </a>

                    <a href="{{ route('gallery') }}"
                       class="mobile-link flex items-center px-4 py-3.5 rounded-lg hover:bg-gray-50
                              transition-all duration-300 text-gray-700 font-medium
                              group {{ request()->routeIs('gallery') ? 'bg-blue-50 text-blue-600' : '' }}">
                        <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center mr-3
                                    group-hover:bg-blue-100 transition-colors">
                            <i class='bx bx-images text-blue-600 text-lg'></i>
                        </div>
                        <span class="flex-1">Gallery</span>
                        <i class='bx bx-chevron-right text-gray-400
                               group-hover:text-blue-600 transition-colors'></i>
                    </a>

                    <a href="{{ route('services') }}"
                       class="mobile-link flex items-center px-4 py-3.5 rounded-lg hover:bg-gray-50
                              transition-all duration-300 text-gray-700 font-medium
                              group {{ request()->routeIs('services') ? 'bg-blue-50 text-blue-600' : '' }}">
                        <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center mr-3
                                    group-hover:bg-blue-100 transition-colors">
                            <i class='bx bx-camera-movie text-blue-600 text-lg'></i>
                        </div>
                        <span class="flex-1">Services</span>
                        <i class='bx bx-chevron-right text-gray-400
                               group-hover:text-blue-600 transition-colors'></i>
                    </a>

                    <a href="{{ route('schedules') }}"
                       class="mobile-link flex items-center px-4 py-3.5 rounded-lg hover:bg-gray-50
                              transition-all duration-300 text-gray-700 font-medium
                              group {{ request()->routeIs('schedules') ? 'bg-blue-50 text-blue-600' : '' }}">
                        <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center mr-3
                                    group-hover:bg-blue-100 transition-colors">
                            <i class='bx bx-calendar text-blue-600 text-lg'></i>
                        </div>
                        <span class="flex-1">Schedules</span>
                        <i class='bx bx-chevron-right text-gray-400
                               group-hover:text-blue-600 transition-colors'></i>
                    </a>

                    <a href="{{ route('contact') }}"
                       class="mobile-link flex items-center px-4 py-3.5 rounded-lg hover:bg-gray-50
                              transition-all duration-300 text-gray-700 font-medium
                              group {{ request()->routeIs('contact') ? 'bg-blue-50 text-blue-600' : '' }}">
                        <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center mr-3
                                    group-hover:bg-blue-100 transition-colors">
                            <i class='bx bx-phone text-blue-600 text-lg'></i>
                        </div>
                        <span class="flex-1">Contact</span>
                        <i class='bx bx-chevron-right text-gray-400
                               group-hover:text-blue-600 transition-colors'></i>
                    </a>

                    <!-- WhatsApp CTA Mobile -->
                    <a href="{{ route('contact') }}"
                       class="mobile-link flex items-center px-4 py-3.5 rounded-lg bg-gradient-to-r
                              from-green-500 to-green-600 text-white hover:shadow-lg
                              transition-all duration-300 font-medium group mt-2
                              justify-center">
                        <i class='bx bxl-whatsapp mr-2 text-lg'></i>
                        <span>Book via WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Spacer untuk fixed navbar -->
    <div class="h-16"></div>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 animate-fade-in">
        @if(session('success'))
            <div class="mb-6 animate-slide-down">
                <div class="bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-4 rounded-xl shadow-lg">
                    <div class="flex items-center gap-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="font-semibold">{{ session('success') }}</span>
                    </div>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 animate-slide-down">
                <div class="bg-gradient-to-r from-red-500 to-red-600 text-white px-6 py-4 rounded-xl shadow-lg">
                    <div class="flex items-center gap-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        <span class="font-semibold">{{ session('error') }}</span>
                    </div>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer-bg text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-4 gap-12 mb-12">
                <!-- Brand Column -->
                <div>
                    <div class="gradient-text-yellow text-2xl font-black mb-4">MEAMO</div>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        Capture your precious moments with our professional photobooth service. Making memories beautiful since 2023.
                    </p>
                    <div class="flex space-x-4">
                        <a href="https://facebook.com" target="_blank" class="social-icon">
                            <i class='bx bxl-facebook'></i>
                        </a>
                        <a href="https://instagram.com" target="_blank" class="social-icon">
                            <i class='bx bxl-instagram'></i>
                        </a>
                        <a href="https://twitter.com" target="_blank" class="social-icon">
                            <i class='bx bxl-twitter'></i>
                        </a>
                        <a href="https://wa.me/6281234567890" target="_blank" class="social-icon">
                            <i class='bx bxl-whatsapp'></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-white font-bold text-lg mb-6">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-yellow-400 transition-colors duration-300">Home</a></li>
                        <li><a href="{{ route('gallery') }}" class="text-gray-300 hover:text-yellow-400 transition-colors duration-300">Gallery</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-yellow-400 transition-colors duration-300">Services</a></li>
                        <li><a href="{{ route('schedules') }}" class="text-gray-300 hover:text-yellow-400 transition-colors duration-300">Schedules</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-yellow-400 transition-colors duration-300">Contact</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div>
                    <h4 class="text-white font-bold text-lg mb-6">Our Services</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-yellow-400 transition-colors duration-300">Wedding Photobooth</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-yellow-400 transition-colors duration-300">Corporate Events</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-yellow-400 transition-colors duration-300">Birthday Parties</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-yellow-400 transition-colors duration-300">Custom Frames</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-yellow-400 transition-colors duration-300">Live View Display</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-white font-bold text-lg mb-6">Contact Info</h4>
                    <ul class="space-y-4 text-gray-300">
                        <li class="flex items-start gap-3">
                            <i class='bx bx-envelope text-yellow-400 mt-1'></i>
                            <a href="mailto:info@meamo.com" class="hover:text-yellow-400 transition-colors">info@meamo.com</a>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class='bx bx-phone text-yellow-400 mt-1'></i>
                            <a href="tel:+6281234567890" class="hover:text-yellow-400 transition-colors">+62 812-3456-7890</a>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class='bx bx-current-location text-yellow-400 mt-1'></i>
                            <span>Jakarta, Indonesia</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-gray-700 pt-8 text-center">
                <p class="text-gray-400">
                    &copy; 2026 MEAMO Photobooth. All rights reserved.
                </p>
                <p class="text-gray-500 text-sm mt-2">
                    Crafting beautiful memories, one photo at a time.
                </p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        if (mobileMenuBtn && mobileMenu) {
            let isMenuOpen = false;

            mobileMenuBtn.addEventListener('click', function(e) {
                e.stopPropagation();

                if (!isMenuOpen) {
                    // Buka menu
                    mobileMenu.classList.remove('hidden');
                    mobileMenu.classList.remove('mobile-menu-exit');
                    mobileMenu.classList.add('mobile-menu-enter-active');

                    // Animasi hamburger ke X
                    mobileMenuBtn.classList.remove('hamburger-close');
                    mobileMenuBtn.classList.add('hamburger-open');

                    isMenuOpen = true;
                } else {
                    // Tutup menu dengan animasi
                    mobileMenu.classList.remove('mobile-menu-enter-active');
                    mobileMenu.classList.add('mobile-menu-exit-active');

                    // Animasi X ke hamburger
                    mobileMenuBtn.classList.remove('hamburger-open');
                    mobileMenuBtn.classList.add('hamburger-close');

                    // Tunggu animasi selesai baru sembunyikan
                    setTimeout(() => {
                        mobileMenu.classList.add('hidden');
                        mobileMenu.classList.remove('mobile-menu-exit-active');
                        isMenuOpen = false;
                    }, 300);
                }
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', function(e) {
                if (isMenuOpen && !mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                    // Tutup menu dengan animasi
                    mobileMenu.classList.remove('mobile-menu-enter-active');
                    mobileMenu.classList.add('mobile-menu-exit-active');

                    // Animasi X ke hamburger
                    mobileMenuBtn.classList.remove('hamburger-open');
                    mobileMenuBtn.classList.add('hamburger-close');

                    // Tunggu animasi selesai baru sembunyikan
                    setTimeout(() => {
                        mobileMenu.classList.add('hidden');
                        mobileMenu.classList.remove('mobile-menu-exit-active');
                        isMenuOpen = false;
                    }, 300);
                }
            });

            // Close menu on link click
            mobileMenu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', function() {
                    if (isMenuOpen) {
                        // Tutup menu dengan animasi
                        mobileMenu.classList.remove('mobile-menu-enter-active');
                        mobileMenu.classList.add('mobile-menu-exit-active');

                        // Animasi X ke hamburger
                        mobileMenuBtn.classList.remove('hamburger-open');
                        mobileMenuBtn.classList.add('hamburger-close');

                        // Tunggu animasi selesai baru sembunyikan
                        setTimeout(() => {
                            mobileMenu.classList.add('hidden');
                            mobileMenu.classList.remove('mobile-menu-exit-active');
                            isMenuOpen = false;
                        }, 300);
                    }
                });
            });
        }

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add hover effect to cards
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.hover-lift');
            cards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.transition = 'transform 0.2s ease, box-shadow 0.2s ease';
                });
            });
        });

        // ==================== SCROLL BEHAVIOR LOGIC ====================
        let lastScrollTop = 0;
        const navbar = document.getElementById('mainNavbar');
        const navbarHeight = navbar.offsetHeight;
        let ticking = false;

        // Function untuk handle scroll
        function handleScroll() {
            if (!ticking) {
                window.requestAnimationFrame(function() {
                    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

                    // Jika scroll ke bawah lebih dari 100px dan bukan di atas halaman
                    if (scrollTop > lastScrollTop && scrollTop > 100) {
                        // Scroll ke bawah - sembunyikan navbar
                        navbar.classList.remove('navbar-scroll-visible');
                        navbar.classList.add('navbar-scroll-hidden');
                        navbar.classList.add('navbar-blur');
                        navbar.classList.add('navbar-elevated');
                    } else {
                        // Scroll ke atas atau di atas halaman - tampilkan navbar
                        navbar.classList.remove('navbar-scroll-hidden');
                        navbar.classList.add('navbar-scroll-visible');

                        // Tambah efek blur jika sudah discroll
                        if (scrollTop > 10) {
                            navbar.classList.add('navbar-blur');
                            navbar.classList.add('navbar-elevated');
                        } else {
                            navbar.classList.remove('navbar-blur');
                            navbar.classList.remove('navbar-elevated');
                        }
                    }

                    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
                    ticking = false;
                });

                ticking = true;
            }
        }

        // Event listener untuk scroll
        window.addEventListener('scroll', handleScroll, { passive: true });

        // Close mobile menu ketika scroll
        window.addEventListener('scroll', function() {
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mobileMenu = document.getElementById('mobileMenu');

            if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                // Tutup menu dengan animasi
                mobileMenu.classList.remove('mobile-menu-enter-active');
                mobileMenu.classList.add('mobile-menu-exit-active');

                // Animasi X ke hamburger
                mobileMenuBtn.classList.remove('hamburger-open');
                mobileMenuBtn.classList.add('hamburger-close');

                // Tunggu animasi selesai baru sembunyikan
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                    mobileMenu.classList.remove('mobile-menu-exit-active');
                }, 300);
            }
        });

        // Inisialisasi scroll state
        window.addEventListener('load', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollTop > 10) {
                navbar.classList.add('navbar-blur');
                navbar.classList.add('navbar-elevated');
            }
        });

        // ==================== TOUCH SUPPORT UNTUK MOBILE ====================
        let touchStartY = 0;
        let touchEndY = 0;

        document.addEventListener('touchstart', function(e) {
            touchStartY = e.changedTouches[0].screenY;
        }, { passive: true });

        document.addEventListener('touchend', function(e) {
            touchEndY = e.changedTouches[0].screenY;
            handleTouchScroll();
        }, { passive: true });

        function handleTouchScroll() {
            // Jika swipe ke bawah (touchStart > touchEnd) - tampilkan navbar
            // Jika swipe ke atas (touchStart < touchEnd) - sembunyikan navbar
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (touchStartY > touchEndY && scrollTop > 100) {
                // Swipe ke atas (scroll down) - hide
                navbar.classList.remove('navbar-scroll-visible');
                navbar.classList.add('navbar-scroll-hidden');
            } else if (touchStartY < touchEndY) {
                // Swipe ke bawah (scroll up) - show
                navbar.classList.remove('navbar-scroll-hidden');
                navbar.classList.add('navbar-scroll-visible');
            }
        }
    </script>

    @stack('scripts')
</body>
</html>
