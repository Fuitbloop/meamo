@extends('user.layouts.app')
@section('title', 'Home')
@section('content')

{{-- ================== Dependencies (AOS) ================== --}}
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

{{-- ================== Enhanced Design System ================== --}}
<style>
    :root {
        --meamo-yellow: #FACC15;
        --meamo-blue: #2563EB;
        --meamo-dark-blue: #1E40AF;
        --meamo-light-blue: #DBEAFE;
        --meamo-bg: #ffffff;
        --meamo-muted: #6B7280;
        --card-shadow: 0 10px 30px rgba(37,99,235,0.08);
    }

    * {
        font-family: 'Poppins', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        overflow-x: hidden;
    }

    /* Enhanced Hero Section */
    .hero-section {
        background: linear-gradient(135deg, #EFF6FF 0%, #DBEAFE 30%, #FEF3C7 70%, #FFFFFF 100%);
        position: relative;
        overflow: hidden;
    }

    .hero-spot {
        position: absolute;
        border-radius: 50%;
        filter: blur(100px);
        opacity: 0.4;
        z-index: 0;
        pointer-events: none;
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-30px); }
    }

    .hero-blob-1 {
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(37,99,235,0.3), transparent);
        top: -200px;
        right: -100px;
    }

    .hero-blob-2 {
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(250,204,21,0.3), transparent);
        bottom: -150px;
        left: -100px;
        animation-delay: 2s;
    }

    /* Gradient Text */
    .gradient-text {
        background: linear-gradient(135deg, var(--meamo-yellow) 0%, #F59E0B 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Enhanced Button Styles */
    .btn-primary {
        background: linear-gradient(135deg, var(--meamo-yellow) 0%, #F59E0B 100%);
        color: #1F2937;
        font-weight: 700;
        padding: 1rem 2rem;
        border-radius: 9999px;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 10px 25px rgba(250, 204, 21, 0.3);
        position: relative;
        overflow: hidden;
    }

    .btn-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
        transition: left 0.5s;
    }

    .btn-primary:hover::before {
        left: 100%;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(250, 204, 21, 0.4);
    }

    .btn-secondary {
        color: var(--meamo-blue);
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        color: var(--meamo-dark-blue);
        text-decoration: underline;
    }

    /* Enhanced Card Styles */
    .service-card {
        background: white;
        border-radius: 1.5rem;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .service-card::after {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: inherit;
        padding: 2px;
        background: linear-gradient(135deg, var(--meamo-yellow), var(--meamo-blue));
        -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        opacity: 0;
        transition: opacity 0.4s;
    }

    .service-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
    }

    .service-card:hover::after {
        opacity: 1;
    }

    .service-icon {
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
        background: linear-gradient(135deg, var(--meamo-blue) 0%, #1E40AF 100%);
        margin-bottom: 1.5rem;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .service-icon::before {
        content: '';
        position: absolute;
        inset: -50%;
        background: linear-gradient(45deg, transparent, rgba(255,255,255,0.3), transparent);
        transform: translateX(-100%);
        transition: transform 0.6s;
    }

    .service-card:hover .service-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .service-card:hover .service-icon::before {
        transform: translateX(100%);
    }

    /* Image Placeholder Enhanced */
    .img-placeholder {
        background: linear-gradient(135deg, #F3F4F6, #FFFFFF);
        border-radius: 1.5rem;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    .img-placeholder img {
        transition: transform 0.6s ease;
    }

    .img-placeholder:hover img {
        transform: scale(1.05);
    }

    /* About Section Background */
    .about-section {
        background: linear-gradient(180deg, #FFFFFF 0%, #F9FAFB 50%, #EFF6FF 100%);
    }

    /* Enhanced Timeline */
    .timeline {
        position: relative;
        padding-left: 2.5rem;
    }

    .timeline::before {
        content: "";
        position: absolute;
        left: 15px;
        top: 0;
        bottom: 0;
        width: 3px;
        background: linear-gradient(180deg,
            var(--meamo-light-blue) 0%,
            var(--meamo-blue) 30%,
            var(--meamo-yellow) 70%,
            #F59E0B 100%
        );
        border-radius: 4px;
    }

    .timeline-item {
        position: relative;
        padding: 1.5rem 0;
        transition: all 0.3s ease;
    }

    .timeline-dot {
        position: absolute;
        left: -2.2rem;
        top: 1.8rem;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        border: 4px solid white;
        box-shadow: 0 0 0 6px rgba(37, 99, 235, 0.1);
        transition: all 0.4s ease;
        z-index: 2;
    }

    .timeline-item:hover .timeline-dot {
        transform: scale(1.3);
        box-shadow: 0 0 0 12px rgba(37, 99, 235, 0.2);
    }

    .timeline-content {
        background: white;
        padding: 1.5rem;
        border-radius: 1rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        transition: all 0.3s ease;
    }

    .timeline-item:hover .timeline-content {
        transform: translateX(8px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    /* Feature Grid */
    .feature-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }

    .feature-item {
        background: linear-gradient(135deg, #F3F4F6 0%, #FFFFFF 100%);
        padding: 1.25rem;
        border-radius: 1rem;
        transition: all 0.3s ease;
    }

    .feature-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    /* Stats Counter */
    .stat-box {
        background: white;
        border-radius: 1.5rem;
        padding: 2rem;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        text-align: center;
        animation: float 4s ease-in-out infinite;
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 900;
        background: linear-gradient(135deg, var(--meamo-yellow), #F59E0B);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* CTA Section */
    .cta-section {
        background: linear-gradient(135deg, var(--meamo-yellow) 0%, #F59E0B 100%);
        position: relative;
        overflow: hidden;
    }

    .cta-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        opacity: 0.3;
    }

    /* Contact Section */
    .contact-section {
        background: linear-gradient(135deg, var(--meamo-blue) 0%, var(--meamo-dark-blue) 100%);
    }

    /* Photo Grid for CTA */
    .photo-stack {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
        max-width: 400px;
    }

    .photo-card {
        background: white;
        border-radius: 1.5rem;
        padding: 0.75rem;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        transition: all 0.4s ease;
    }

    .photo-card:nth-child(1) {
        transform: rotate(-6deg);
    }

    .photo-card:nth-child(2) {
        transform: rotate(6deg) translateY(2rem);
    }

    .photo-card:hover {
        transform: rotate(0deg) translateY(-10px) scale(1.05);
        z-index: 10;
    }

    .photo-card img {
        border-radius: 1rem;
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    /* Service Category Cards */
    .category-card {
        position: relative;
        border-radius: 1.5rem;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        transition: all 0.4s ease;
        height: 320px;
    }

    .category-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.18);
    }

    .category-card img {
        transition: transform 0.6s ease;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .category-card:hover img {
        transform: scale(1.1);
    }

    .category-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, transparent 0%, rgba(0,0,0,0.8) 100%);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 2rem;
        color: white;
    }

    /* Highlight enhanced */
    .highlight {
        background: linear-gradient(90deg, rgba(250,204,21,0.2) 0%, rgba(250,204,21,0.05) 100%);
        padding: 0.25rem 0.75rem;
        border-radius: 0.5rem;
        display: inline-block;
    }

    /* Section Spacing */
    .section-spacing {
        padding: 2rem 0;
    }

    /* Creative Section */
    .creative-section {
        background: linear-gradient(135deg, #F9FAFB 0%, #EFF6FF 100%);
    }

    /* Decorative Elements */
    .deco-circle {
        position: absolute;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--meamo-yellow), #F59E0B);
        opacity: 0.08;
        pointer-events: none;
    }

    .deco-square {
        position: absolute;
        background: linear-gradient(135deg, var(--meamo-blue), var(--meamo-dark-blue));
        opacity: 0.08;
        border-radius: 1rem;
        pointer-events: none;
    }

    /* Service Description */
    .service-description {
        flex-grow: 1;
        margin-bottom: 1.5rem;
    }

    /* Responsive adjustments */
    @media (max-width: 1024px) {
        .section-spacing {
            padding: 4rem 0;
        }

        .stat-box {
            padding: 1.5rem;
        }
    }

    @media (max-width: 768px) {
        .section-spacing {
            padding: 3rem 0;
        }

        .hero-section {
            padding-top: 2rem !important;
            padding-bottom: 2rem !important;
        }

        h1 {
            font-size: 2rem !important;
            line-height: 1.2 !important;
        }

        h2 {
            font-size: 1.875rem !important;
            line-height: 1.3 !important;
        }

        .timeline {
            padding-left: 2rem;
        }

        .timeline::before {
            left: 10px;
        }

        .timeline-dot {
            left: -1.8rem;
            width: 20px;
            height: 20px;
            top: 1.5rem;
        }

        .photo-stack {
            grid-template-columns: 1fr;
            max-width: 280px;
            margin: 0 auto;
            gap: 1rem;
        }

        .photo-card {
            padding: 0.5rem;
        }

        .photo-card:nth-child(1) {
            transform: rotate(-3deg);
        }

        .photo-card:nth-child(2) {
            transform: rotate(3deg) translateY(0);
        }

        .photo-card img {
            height: 160px;
        }

        .category-card {
            height: 220px;
        }

        .service-card {
            padding: 1.5rem;
        }

        .service-icon {
            width: 60px;
            height: 60px;
            margin-bottom: 1rem;
        }

        .service-icon svg {
            width: 32px;
            height: 32px;
        }

        /* Hide decorative elements on mobile */
        .deco-circle,
        .deco-square,
        .hero-blob-1,
        .hero-blob-2 {
            display: none;
        }

        /* Adjust stat box */
        .stat-box {
            width: 100px;
            height: 100px;
            padding: 1rem;
            bottom: -40px;
            left: 50%;
            transform: translateX(-50%);
        }

        .stat-box .stat-number {
            font-size: 2rem;
        }

        .stat-box .text-sm {
            font-size: 0.625rem;
        }

        /* Timeline content adjustments */
        .timeline-content {
            padding: 1rem;
        }

        .timeline-content .flex {
            flex-direction: column;
            gap: 1rem;
        }

        .timeline-content .w-16 {
            width: 48px;
            height: 48px;
        }

        .timeline-content svg {
            width: 24px;
            height: 24px;
        }

        .timeline-content h4 {
            font-size: 1.125rem;
        }

        /* Feature grid mobile */
        .feature-item {
            padding: 1rem;
        }

        .feature-item .text-3xl {
            font-size: 2rem;
        }
    }

    @media (max-width: 640px) {
        .section-spacing {
            padding: 2.5rem 0;
        }

        h1 {
            font-size: 1.75rem !important;
        }

        h2 {
            font-size: 1.625rem !important;
        }

        .feature-grid {
            grid-template-columns: 1fr;
            gap: 0.75rem;
        }

        .stat-box {
            padding: 1rem;
            width: 90px;
            height: 90px;
        }

        .stat-number {
            font-size: 2rem !important;
        }

        .btn-primary {
            padding: 0.875rem 1.5rem;
            font-size: 0.9375rem;
        }

        .service-card h3 {
            font-size: 1.125rem;
        }

        .service-card .text-xl {
            font-size: 1.125rem;
        }

        .category-card {
            height: 200px;
        }

        .category-overlay {
            padding: 1.5rem;
        }

        .category-overlay h3 {
            font-size: 1.5rem;
        }

        .category-overlay p {
            font-size: 0.875rem;
        }

        /* Photo stack adjustments */
        .photo-stack {
            max-width: 240px;
        }

        .photo-card img {
            height: 140px;
        }

        /* Creative section */
        .creative-controls {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }
    }

    @media (max-width: 480px) {
        .max-w-7xl {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        h1 {
            font-size: 1.5rem !important;
        }

        h2 {
            font-size: 1.5rem !important;
        }

        .hero-section .grid {
            gap: 2rem;
        }

        .feature-item .text-3xl {
            font-size: 1.75rem;
        }

        .feature-item .text-sm {
            font-size: 0.75rem;
        }

        .service-card {
            padding: 1.25rem;
        }

        .btn-primary {
            padding: 0.75rem 1.25rem;
            font-size: 0.875rem;
        }

        .btn-primary svg {
            width: 1rem;
            height: 1rem;
        }

        .stat-box {
            width: 80px;
            height: 80px;
            padding: 0.75rem;
        }

        .stat-number {
            font-size: 1.75rem !important;
        }
    }

    /* AOS custom tweaks */
    [data-aos] {
        will-change: transform, opacity;
    }

    [data-aos="fade-up"] {
        transform: translateY(30px);
        opacity: 0;
    }

    [data-aos="fade-up"].aos-animate {
        transform: translateY(0);
        opacity: 1;
    }
</style>

{{-- ================== Initialize AOS ================== --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 100,
            delay: 100,
        });
    });
</script>

{{-- ================== HERO SECTION ================== --}}
<section class=" section-spacing relative">
    {{-- Animated Background Blobs --}}
    <div class="hero-spot hero-blob-1"></div>
    <div class="hero-spot hero-blob-2"></div>

    {{-- Decorative Elements --}}
    <div class="deco-circle" style="width: 120px; height: 120px; top: 10%; left: 5%;"></div>
    <div class="deco-square" style="width: 80px; height: 80px; bottom: 15%; right: 8%;"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 grid md:grid-cols-2 gap-8 md:gap-12 items-center relative z-10">
        {{-- Left Content --}}
        <div data-aos="fade-right" data-aos-delay="100">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-black leading-tight mb-4 md:mb-6">
                Create <span class="gradient-text">Beautiful</span> AI Memories
                <br class="hidden sm:block">With Our MEAMO!
            </h1>
            <p class="text-gray-600 text-base md:text-lg lg:text-xl mb-6 md:mb-8 leading-relaxed">
                Capture your best moments with your family or best friends. Professional photobooth with live view and custom frames.
            </p>
            <div class="flex items-center gap-3 md:gap-4 flex-wrap">
                <a href="{{ route('booking.create') }}" class="btn-primary">
                    Get Started
                    <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
                <a href="#services" class="btn-secondary text-sm md:text-base">
                    Our Services →
                </a>
            </div>

            {{-- Stats --}}
            <div class="grid grid-cols-2 gap-3 md:gap-4 mt-8 md:mt-12" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-item">
                    <div class="text-2xl md:text-3xl font-black gradient-text mb-1">500+</div>
                    <div class="text-xs md:text-sm text-gray-600 font-medium">Happy Events</div>
                </div>
                <div class="feature-item">
                    <div class="text-2xl md:text-3xl font-black gradient-text mb-1">50K+</div>
                    <div class="text-xs md:text-sm text-gray-600 font-medium">Photos Captured</div>
                </div>
            </div>
        </div>

        {{-- Right Illustration --}}
        <div data-aos="fade-left" data-aos-delay="200" class="relative mt-8 md:mt-0">
            <div class="img-placeholder">
                <img src="{{ asset('images/hero-illustration.png') }}"
                     alt="MEAMO Photobooth Illustration"
                     class="w-full h-auto object-contain"
                     onerror="this.src='https://images.unsplash.com/photo-1511578314322-379afb476865?w=600&h=600&fit=crop'">
            </div>

            {{-- Floating Stat Badge --}}
            <div class="absolute -bottom-6 md:-bottom-8 -left-4 md:-left-8 stat-box hidden sm:block" data-aos="zoom-in" data-aos-delay="500">
                <div class="stat-number">4.9</div>
                <div class="text-xs md:text-sm text-gray-600 font-semibold">Rating</div>
            </div>
        </div>
    </div>
</section>

{{-- ================== ABOUT PHOTOBOOTH SECTION ================== --}}
<section class="about-section section-spacing">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="grid md:grid-cols-2 gap-8 md:gap-12 lg:gap-16 items-center">
            {{-- Image Side --}}
            <div data-aos="zoom-in" data-aos-delay="100" class="order-2 md:order-1">
                <div class="relative">
                    {{-- Decorative Background --}}
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-100 to-purple-100 rounded-2xl lg:rounded-3xl transform rotate-6 -z-10"></div>

                    <div class="img-placeholder overflow-hidden rounded-2xl">
                        <img src="{{ asset('images/about-photobooth.png') }}"
                             alt="About MEAMO Photobooth"
                             class="w-full h-auto object-cover"
                             onerror="this.src='https://images.unsplash.com/photo-1511578314322-379afb476865?w=800&h=600&fit=crop'">
                    </div>
                </div>
            </div>

            {{-- Content Side --}}
            <div data-aos="fade-left" data-aos-delay="200" class="order-1 md:order-2">
                <div class="inline-block bg-blue-100 text-blue-700 px-3 md:px-4 py-1.5 md:py-2 rounded-full text-xs md:text-sm font-semibold mb-3 md:mb-4">
                    About Photobooth
                </div>

                <h2 class="text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-black mb-4 md:mb-6 leading-tight">
                    The <span class="gradient-text">New Photobooth</span>
                    <br>Concept From MEAMO
                </h2>

                <p class="text-gray-600 text-base md:text-lg leading-relaxed mb-6 md:mb-8">
                    Our photobooth provides live view display, custom frames, fun properties, and professional lighting. Perfect for events, weddings, parties and corporate needs.
                </p>

                {{-- Features Grid --}}
                <div class="feature-grid mb-6 md:mb-8">
                    <div class="feature-item">
                        <div class="text-blue-600 text-2xl md:text-3xl mb-2">✨</div>
                        <div class="font-bold text-gray-800 mb-1 text-sm md:text-base">AI Technology</div>
                        <div class="text-gray-600 text-xs md:text-sm">Smart filters & effects</div>
                    </div>
                    <div class="feature-item">
                        <div class="text-yellow-600 text-2xl md:text-3xl mb-2">⚡</div>
                        <div class="font-bold text-gray-800 mb-1 text-sm md:text-base">Instant Prints</div>
                        <div class="text-gray-600 text-xs md:text-sm">High-quality output</div>
                    </div>
                    <div class="feature-item">
                        <div class="text-purple-600 text-2xl md:text-3xl mb-2">🎨</div>
                        <div class="font-bold text-gray-800 mb-1 text-sm md:text-base">Customizable</div>
                        <div class="text-gray-600 text-xs md:text-sm">Branded overlays</div>
                    </div>
                    <div class="feature-item">
                        <div class="text-pink-600 text-2xl md:text-3xl mb-2">👥</div>
                        <div class="font-bold text-gray-800 mb-1 text-sm md:text-base">Professional</div>
                        <div class="text-gray-600 text-xs md:text-sm">Expert crew</div>
                    </div>
                </div>

                <a href="#contact" class="btn-secondary inline-flex items-center gap-2 text-sm md:text-base">
                    Contact Us
                    <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ================== SERVICES SECTION ================== --}}
<section id="services" class="section-spacing bg-white relative">
    {{-- Decorative Elements --}}
    <div class="deco-circle" style="width: 150px; height: 150px; top: 10%; right: 5%;"></div>
    <div class="deco-square" style="width: 100px; height: 100px; bottom: 10%; left: 5%;"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
        {{-- Section Header --}}
        <div class="text-center mb-8 md:mb-12 lg:mb-16" data-aos="fade-up">
            <div class="inline-block bg-yellow-100 text-yellow-700 px-3 md:px-4 py-1.5 md:py-2 rounded-full text-xs md:text-sm font-semibold mb-3 md:mb-4">
                Our Services
            </div>
            <h2 class="text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-black mb-3 md:mb-4">
                <span class="gradient-text">Services</span> We Provide
            </h2>
            <p class="text-gray-600 text-sm md:text-base lg:text-lg max-w-2xl mx-auto px-4">
                Pilihan layanan photobooth kami untuk membuat momenmu tak terlupakan
            </p>
        </div>

        {{-- Services Grid --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 lg:gap-8 mb-8 md:mb-12 lg:mb-16">
            @foreach($services as $index => $service)
            <div class="service-card" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="service-icon">
                    <svg class="w-8 h-8 md:w-10 md:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>

                <h3 class="text-lg md:text-xl font-bold mb-2 md:mb-3 text-gray-800">{{ $service->name }}</h3>

                <p class="text-gray-600 text-sm md:text-base leading-relaxed mb-3 md:mb-4 service-description">
                    {{ Str::limit($service->description, 100) }}
                </p>

                <div class="flex items-center justify-between pt-3 md:pt-4 border-t-2 border-gray-100 mt-auto">
                    <div>
                        <div class="text-xs text-gray-500 mb-1">Starting from</div>
                        <div class="text-lg md:text-xl font-black gradient-text">
                            Rp {{ number_format($service->price, 0, ',', '.') }}
                        </div>
                    </div>
                    <a href="{{ route('booking.create') }}"
                       class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white hover:scale-110 transition-transform shadow-lg">
                        <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Service Categories --}}
        <div class="grid md:grid-cols-2 gap-4 md:gap-6 lg:gap-8" data-aos="fade-up">
            {{-- Event Services --}}
            <div class="category-card">
                <img src="{{ asset('images/event-category.png') }}"
                     alt="Event Services"
                     class="w-full h-full object-cover"
                     onerror="this.src='https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=800&h=400&fit=crop'">
                <div class="category-overlay">
                    <div class="inline-block bg-white/20 backdrop-blur-sm px-2 md:px-3 py-1 rounded-full text-xs md:text-sm font-semibold mb-2 md:mb-3 w-fit">
                        Popular Choice
                    </div>
                    <h3 class="text-xl md:text-2xl lg:text-3xl font-black mb-1 md:mb-2">Event</h3>
                    <p class="text-gray-200 text-xs md:text-sm mb-3 md:mb-4">Perfect for weddings, birthdays, and celebrations</p>
                    <a href="{{ route('booking.create') }}"
                       class="inline-flex items-center gap-2 text-yellow-400 hover:text-yellow-300 font-bold transition-all text-sm md:text-base">
                        Book Now
                        <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Corporate Services --}}
            <div class="category-card">
                <img src="{{ asset('images/corporate-category.png') }}"
                     alt="Corporate Services"
                     class="w-full h-full object-cover"
                     onerror="this.src='https://images.unsplash.com/photo-1511578314322-379afb476865?w=800&h=400&fit=crop'">
                <div class="category-overlay">
                    <div class="inline-block bg-white/20 backdrop-blur-sm px-2 md:px-3 py-1 rounded-full text-xs md:text-sm font-semibold mb-2 md:mb-3 w-fit">
                        Professional
                    </div>
                    <h3 class="text-xl md:text-2xl lg:text-3xl font-black mb-1 md:mb-2">Other</h3>
                    <p class="text-gray-200 text-xs md:text-sm mb-3 md:mb-4">Corporate events, product launches, and more</p>
                    <a href="{{ route('booking.create') }}"
                       class="inline-flex items-center gap-2 text-yellow-400 hover:text-yellow-300 font-bold transition-all text-sm md:text-base">
                        Book Now
                        <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================== CREATIVE SECTION ================== --}}
<section class="creative-section section-spacing">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="grid md:grid-cols-2 gap-8 md:gap-12 items-center">
            {{-- Image Side --}}
            <div data-aos="fade-right" class="order-2 md:order-1">
                <div class="relative">
                    <div class="absolute -top-4 -left-4 w-20 md:w-24 h-20 md:h-24 bg-blue-600 rounded-lg -z-10"></div>
                    <div class="absolute -top-2 -left-2 w-20 md:w-24 h-20 md:h-24 bg-gray-400 rounded-lg -z-10"></div>
                    <div class="absolute top-0 left-0 w-20 md:w-24 h-20 md:h-24 bg-yellow-400 rounded-lg flex items-center justify-center text-white font-bold text-xs md:text-sm -z-10">
                        Text
                    </div>
                    <div class="img-placeholder ml-6 md:ml-8 mt-6 md:mt-8">
                        <img src="{{ asset('images/creative-preview.png') }}"
                             alt="Creative Tools Preview"
                             class="w-full h-auto object-cover"
                             onerror="this.src='https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=600&h=400&fit=crop'">
                    </div>
                </div>
            </div>

            {{-- Content Side --}}
            <div data-aos="fade-left" class="order-1 md:order-2">
                <h2 class="text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-black mb-4 md:mb-6">
                    Feeling <span class="gradient-text">Creative?</span>
                </h2>
                <p class="text-gray-600 text-sm md:text-base lg:text-lg leading-relaxed mb-4 md:mb-6">
                    Text, sticker, frame — customize instantly with our live preview. Make your photos pop with unique frames and creative elements.
                </p>

                <div class="space-y-2 md:space-y-3">
                    <div class="flex items-center gap-2 md:gap-3">
                        <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 md:w-5 md:h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <p class="text-gray-700 font-medium text-sm md:text-base">Custom frames and filters</p>
                    </div>
                    <div class="flex items-center gap-2 md:gap-3">
                        <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 md:w-5 md:h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <p class="text-gray-700 font-medium text-sm md:text-base">Live preview before printing</p>
                    </div>
                    <div class="flex items-center gap-2 md:gap-3">
                        <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 md:w-5 md:h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <p class="text-gray-700 font-medium text-sm md:text-base">Unlimited creativity options</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================== WHY MEAMO SECTION ================== --}}
<section class="section-spacing bg-gradient-to-br from-blue-50 to-purple-50 relative">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        {{-- Section Header --}}
        <div class="text-center mb-8 md:mb-12 lg:mb-16" data-aos="fade-up">
            <div class="inline-block bg-blue-100 text-blue-700 px-3 md:px-4 py-1.5 md:py-2 rounded-full text-xs md:text-sm font-semibold mb-3 md:mb-4">
                Our Advantages
            </div>
            <h2 class="text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-black mb-3 md:mb-4">
                Why <span class="gradient-text">MEAMO</span>?
            </h2>
            <p class="text-gray-600 text-sm md:text-base lg:text-lg px-4">
                Alasan memilih layanan photobooth kami untuk event anda
            </p>
        </div>

        {{-- Timeline --}}
        <div class="timeline">
            {{-- Item 1 --}}
            <div class="timeline-item" data-aos="fade-right" data-aos-delay="100">
                <div class="timeline-dot bg-blue-600"></div>
                <div class="timeline-content">
                    <div class="flex items-start gap-3 md:gap-4">
                        <div class="w-12 h-12 md:w-16 md:h-16 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 md:w-8 md:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-base md:text-lg lg:text-xl text-gray-800 mb-1 md:mb-2">Live View Display</h4>
                            <p class="text-gray-600 text-sm md:text-base">Lihat hasil foto secara langsung sebelum dicetak dengan sistem display real-time</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Item 2 --}}
            <div class="timeline-item" data-aos="fade-right" data-aos-delay="200">
                <div class="timeline-dot bg-blue-500"></div>
                <div class="timeline-content">
                    <div class="flex items-start gap-3 md:gap-4">
                        <div class="w-12 h-12 md:w-16 md:h-16 rounded-xl bg-gradient-to-br from-blue-400 to-blue-500 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 md:w-8 md:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-base md:text-lg lg:text-xl text-gray-800 mb-1 md:mb-2">Customize Frame</h4>
                            <p class="text-gray-600 text-sm md:text-base">Buat frame khusus sesuai tema acara dengan design yang personal</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Item 3 --}}
            <div class="timeline-item" data-aos="fade-right" data-aos-delay="300">
                <div class="timeline-dot bg-yellow-400"></div>
                <div class="timeline-content">
                    <div class="flex items-start gap-3 md:gap-4">
                        <div class="w-12 h-12 md:w-16 md:h-16 rounded-xl bg-gradient-to-br from-yellow-400 to-yellow-500 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 md:w-8 md:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-base md:text-lg lg:text-xl text-gray-800 mb-1 md:mb-2">Fun Properties</h4>
                            <p class="text-gray-600 text-sm md:text-base">Aksesoris seru dan props beragam untuk hasil foto lebih hidup dan menarik</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Item 4 --}}
            <div class="timeline-item" data-aos="fade-right" data-aos-delay="400">
                <div class="timeline-dot bg-yellow-500"></div>
                <div class="timeline-content">
                    <div class="flex items-start gap-3 md:gap-4">
                        <div class="w-12 h-12 md:w-16 md:h-16 rounded-xl bg-gradient-to-br from-yellow-500 to-orange-500 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 md:w-8 md:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-base md:text-lg lg:text-xl text-gray-800 mb-1 md:mb-2">Crew & Professional Lighting</h4>
                            <p class="text-gray-600 text-sm md:text-base">Tim profesional dengan lighting equipment terbaik untuk kualitas foto sempurna</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================== CTA YELLOW SECTION ================== --}}
<section class="cta-section section-spacing relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 grid md:grid-cols-2 gap-8 md:gap-12 items-center relative z-10">
        {{-- Content --}}
        <div data-aos="fade-right">
            <h2 class="text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-black text-gray-800 mb-4 md:mb-6 leading-tight">
                Ready to make your life memorable?
            </h2>
            <p class="text-gray-700 text-sm md:text-base lg:text-lg mb-6 md:mb-8 leading-relaxed">
                Book our photobooth now. Paket fleksibel untuk acara apa saja dengan harga terjangkau.
            </p>
            <a href="{{ route('booking.create') }}"
               class="inline-flex items-center gap-2 md:gap-3 bg-blue-600 hover:bg-blue-700 text-white px-6 md:px-8 py-3 md:py-4 rounded-full font-bold text-base md:text-lg transition-all transform hover:scale-105 shadow-2xl">
                Booking Now
                <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
        </div>

        {{-- Photo Stack --}}
        <div data-aos="fade-left" class="flex justify-center mt-8 md:mt-0">
            <div class="photo-stack relative">
                <div class="photo-card">
                    <img src="{{ asset('images/cta-photo-1.png') }}"
                         alt="Event Memory 1"
                         onerror="this.src='https://images.unsplash.com/photo-1511578314322-379afb476865?w=300&h=200&fit=crop'">
                </div>
                <div class="photo-card">
                    <img src="{{ asset('images/cta-photo-2.png') }}"
                         alt="Event Memory 2"
                         onerror="this.src='https://images.unsplash.com/photo-1519741497674-611481863552?w=300&h=200&fit=crop'">
                </div>

                {{-- Floating Badge --}}
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 hidden sm:block">
                    <div class="bg-blue-600 text-white w-20 h-20 md:w-28 md:h-28 rounded-full flex flex-col items-center justify-center shadow-2xl">
                        <div class="text-2xl md:text-3xl font-black">500+</div>
                        <div class="text-xs font-semibold">Events</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
