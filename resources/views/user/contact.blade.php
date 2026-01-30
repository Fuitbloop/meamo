@extends('user.layouts.app')
@section('title', 'Contact')

@section('content')
{{-- ================== Dependencies (AOS) ================== --}}
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

{{-- ================== Contact Page Styles ================== --}}
<style>
    :root {
        --meamo-yellow: #FACC15;
        --meamo-blue: #2563EB;
        --meamo-dark-blue: #1E40AF;
        --meamo-light-blue: #DBEAFE;
        --meamo-green: #10B981;
        --meamo-bg: #ffffff;
        --meamo-muted: #6B7280;
    }

    * {
        font-family: 'Poppins', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    /* Page Header */
    .contact-header {
        background: linear-gradient(135deg, #EFF6FF 0%, #DBEAFE 50%, #FEF3C7 100%);
        position: relative;
        overflow: hidden;
    }

    .header-blob {
        position: absolute;
        border-radius: 50%;
        filter: blur(100px);
        opacity: 0.3;
        pointer-events: none;
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-30px) rotate(5deg); }
    }

    /* Gradient Text */
    .gradient-text {
        background: linear-gradient(135deg, var(--meamo-yellow) 0%, #F59E0B 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Contact Card */
    .contact-card {
        background: white;
        border-radius: 1.5rem;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .contact-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: linear-gradient(90deg, var(--meamo-blue), var(--meamo-yellow));
    }

    .contact-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.12);
    }

    /* Form Styles */
    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    .form-input {
        width: 100%;
        padding: 1rem 1.25rem;
        border: 2px solid #E5E7EB;
        border-radius: 0.75rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: white;
    }

    .form-input:focus {
        outline: none;
        border-color: var(--meamo-blue);
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
    }

    select.form-input {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236B7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 1.5em 1.5em;
        padding-right: 3rem;
    }

    textarea.form-input {
        resize: vertical;
        min-height: 120px;
    }

    /* WhatsApp Button */
    .btn-whatsapp {
        background: linear-gradient(135deg, #10B981 0%, #059669 100%);
        color: white;
        font-weight: 700;
        padding: 1rem 2rem;
        border-radius: 9999px;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
        border: none;
        cursor: pointer;
        font-size: 1rem;
        width: 100%;
        justify-content: center;
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
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        transition: left 0.5s;
    }

    .btn-whatsapp:hover::before {
        left: 100%;
    }

    .btn-whatsapp:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(16, 185, 129, 0.4);
    }

    .btn-whatsapp:active {
        transform: translateY(-1px);
    }

    /* Info Cards */
    .info-card {
        background: linear-gradient(135deg, #F3F4F6 0%, #FFFFFF 100%);
        padding: 2rem;
        border-radius: 1.5rem;
        text-align: center;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        border-color: var(--meamo-blue);
    }

    .info-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 1.5rem;
        border-radius: 1.25rem;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        transition: all 0.4s ease;
    }

    .info-card:hover .info-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .info-icon::after {
        content: '';
        position: absolute;
        inset: -10px;
        border-radius: 1.5rem;
        background: inherit;
        opacity: 0.2;
        filter: blur(20px);
        z-index: -1;
    }

    /* Schedule Card */
    .schedule-card {
        background: linear-gradient(135deg, #FEF3C7 0%, #FEF9C3 100%);
        border-radius: 1rem;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        border: 2px solid #FDE68A;
    }

    .schedule-date {
        font-size: 1.25rem;
        font-weight: 700;
        color: #92400E;
        margin-bottom: 0.5rem;
    }

    .schedule-time {
        font-size: 1rem;
        color: #B45309;
        font-weight: 600;
    }

    /* Success Message */
    .success-message {
        background: linear-gradient(135deg, #10B981, #059669);
        color: white;
        padding: 1rem;
        border-radius: 0.75rem;
        display: none;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
        animation: slideDown 0.3s ease;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Error State */
    .form-input.error {
        border-color: #EF4444;
    }

    .error-message {
        color: #EF4444;
        font-size: 0.875rem;
        margin-top: 0.25rem;
        display: none;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .info-card {
            padding: 1.5rem;
        }
    }

    /* AOS */
    [data-aos] {
        will-change: transform, opacity;
    }
</style>

{{-- ================== HEADER SECTION ================== --}}
<section class="contact-header py-20 relative">
    {{-- Background Blobs --}}
    <div class="header-blob" style="width: 500px; height: 500px; background: radial-gradient(circle, rgba(37,99,235,0.2), transparent); top: -200px; right: -100px;"></div>
    <div class="header-blob" style="width: 400px; height: 400px; background: radial-gradient(circle, rgba(250,204,21,0.2), transparent); bottom: -150px; left: -100px; animation-delay: 2s;"></div>

    <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
        <div data-aos="fade-up">
            <div class="inline-block bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                Contact Us
            </div>
            <h1 class="text-4xl md:text-5xl font-black mb-6">
                Get in <span class="gradient-text">Touch</span>
            </h1>
            <p class="text-gray-600 text-lg md:text-xl max-w-2xl mx-auto">
                Have questions about our services? Contact us directly via WhatsApp for quick responses and bookings.
            </p>
        </div>
    </div>
</section>

{{-- ================== CONTACT INFO CARDS ================== --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-3 gap-8 mb-16">
            {{-- Email Card --}}
            <div class="info-card" data-aos="fade-up" data-aos-delay="100">
                <div class="info-icon bg-gradient-to-br from-blue-500 to-blue-600">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-xl text-gray-800 mb-2">Email Us</h3>
                <p class="text-gray-600 mb-3">Send us an email</p>
                <a href="mailto:info@meamo.com" class="text-blue-600 font-semibold hover:underline">
                    info@meamo.com
                </a>
            </div>

            {{-- WhatsApp Card --}}
            <div class="info-card" data-aos="fade-up" data-aos-delay="200">
                <div class="info-icon bg-gradient-to-br from-green-500 to-green-600">
                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-xl text-gray-800 mb-2">WhatsApp</h3>
                <p class="text-gray-600 mb-3">Instant messaging</p>
                <a href="https://wa.me/6281234567890" target="_blank" class="text-green-600 font-semibold hover:underline">
                    +62 812-3456-7890
                </a>
            </div>

            {{-- Location Card --}}
            <div class="info-card" data-aos="fade-up" data-aos-delay="300">
                <div class="info-icon bg-gradient-to-br from-yellow-400 to-yellow-500">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-xl text-gray-800 mb-2">Location</h3>
                <p class="text-gray-600 mb-3">Our office address</p>
                <p class="text-blue-600 font-semibold">
                    Jakarta, Indonesia
                </p>
            </div>
        </div>
    </div>
</section>

{{-- ================== CONTACT FORM SECTION ================== --}}
<section class="py-16 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="max-w-4xl mx-auto px-6">
        <div class="contact-card p-8 md:p-12" data-aos="fade-up">
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-black mb-4">
                    Quick <span class="gradient-text">Booking</span> via WhatsApp
                </h2>
                <p class="text-gray-600">
                    Fill in your details and select your preferred schedule. We'll contact you via WhatsApp to confirm your booking.
                </p>
            </div>

            {{-- Success Message --}}
            <div id="successMessage" class="success-message">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span>Message ready to send to WhatsApp!</span>
            </div>

            <form id="contactForm">
                {{-- Name Field --}}
                <div class="form-group">
                    <label for="name" class="form-label">
                        Full Name
                        <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                           id="name"
                           name="name"
                           class="form-input"
                           placeholder="Enter your full name"
                           required>
                    <div class="error-message" id="nameError">Name is required</div>
                </div>

                {{-- Email Field --}}
                <div class="form-group">
                    <label for="email" class="form-label">
                        Email
                        <span class="text-red-500">*</span>
                    </label>
                    <input type="email"
                           id="email"
                           name="email"
                           class="form-input"
                           placeholder="example@email.com"
                           required>
                    <div class="error-message" id="emailError">Invalid email address</div>
                </div>

                {{-- Phone Field --}}
                <div class="form-group">
                    <label for="phone" class="form-label">
                        Phone / WhatsApp Number
                        <span class="text-red-500">*</span>
                    </label>
                    <input type="tel"
                           id="phone"
                           name="phone"
                           class="form-input"
                           placeholder="08123456789"
                           required>
                    <div class="error-message" id="phoneError">Phone number is required</div>
                </div>

                {{-- Service Selection --}}
                <div class="form-group">
                    <label for="service" class="form-label">
                        Service Interested In
                        <span class="text-red-500">*</span>
                    </label>
                    <select id="service" name="service" class="form-input" required>
                        <option value="">Select a Service</option>
                        @foreach($services as $service)
                            <option value="{{ $service->name }}">
                                {{ $service->name }} - Rp {{ number_format($service->price, 0, ',', '.') }}
                            </option>
                        @endforeach
                        <option value="Other">Other (Please specify in message)</option>
                    </select>
                    <div class="error-message" id="serviceError">Please select a service</div>
                </div>

                {{-- Schedule Selection --}}
                <div class="form-group">
                    <label for="schedule" class="form-label">
                        Preferred Schedule
                        <span class="text-red-500">*</span>
                    </label>
                    <select id="schedule" name="schedule" class="form-input" required>
                        <option value="">Select a Schedule</option>
                        @foreach($schedules as $schedule)
                            <option value="{{ $schedule->event_date->format('d F Y') }} ({{ $schedule->start_time }} - {{ $schedule->end_time }})">
                                {{ $schedule->event_date->format('d F Y') }} - {{ $schedule->start_time }} to {{ $schedule->end_time }}
                            </option>
                        @endforeach
                        <option value="Flexible">Flexible (Let's discuss)</option>
                    </select>
                    <div class="error-message" id="scheduleError">Please select a schedule</div>

                    {{-- Display Available Schedules --}}
                    <div class="mt-4">
                        <p class="text-sm font-semibold text-gray-700 mb-2">Available Schedules:</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            @foreach($schedules as $schedule)
                                <div class="schedule-card">
                                    <div class="schedule-date">{{ $schedule->event_date->format('d F Y') }}</div>
                                    <div class="schedule-time">{{ $schedule->start_time }} - {{ $schedule->end_time }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Message Field --}}
                <div class="form-group">
                    <label for="message" class="form-label">
                        Message / Additional Requirements
                        <span class="text-red-500">*</span>
                    </label>
                    <textarea id="message"
                              name="message"
                              class="form-input"
                              placeholder="Please provide details about your event, number of guests, special requirements, etc."
                              rows="5"
                              required></textarea>
                    <div class="error-message" id="messageError">Message is required</div>
                </div>

                {{-- Submit Button --}}
                <button type="submit" class="btn-whatsapp">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    Send via WhatsApp
                </button>
            </form>
        </div>
    </div>
</section>

{{-- ================== JavaScript for Form Handling ================== --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 800,
        easing: 'ease-out-cubic',
        once: true,
        offset: 100,
    });

    const form = document.getElementById('contactForm');
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const phoneInput = document.getElementById('phone');
    const serviceInput = document.getElementById('service');
    const scheduleInput = document.getElementById('schedule');
    const messageInput = document.getElementById('message');
    const successMessage = document.getElementById('successMessage');

    // WhatsApp number (replace with real number)
    const whatsappNumber = '6281234567890';

    // Form validation
    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    function validatePhone(phone) {
        const re = /^[0-9]{10,15}$/;
        return re.test(phone.replace(/[\s-]/g, ''));
    }

    function showError(input, errorId, message) {
        input.classList.add('error');
        document.getElementById(errorId).textContent = message;
        document.getElementById(errorId).style.display = 'block';
    }

    function hideError(input, errorId) {
        input.classList.remove('error');
        document.getElementById(errorId).style.display = 'none';
    }

    // Real-time validation
    nameInput.addEventListener('input', function() {
        if (this.value.trim()) {
            hideError(this, 'nameError');
        }
    });

    emailInput.addEventListener('input', function() {
        if (validateEmail(this.value)) {
            hideError(this, 'emailError');
        }
    });

    phoneInput.addEventListener('input', function() {
        if (validatePhone(this.value)) {
            hideError(this, 'phoneError');
        }
    });

    serviceInput.addEventListener('change', function() {
        if (this.value) {
            hideError(this, 'serviceError');
        }
    });

    scheduleInput.addEventListener('change', function() {
        if (this.value) {
            hideError(this, 'scheduleError');
        }
    });

    messageInput.addEventListener('input', function() {
        if (this.value.trim()) {
            hideError(this, 'messageError');
        }
    });

    // Form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        // Reset errors
        hideError(nameInput, 'nameError');
        hideError(emailInput, 'emailError');
        hideError(phoneInput, 'phoneError');
        hideError(serviceInput, 'serviceError');
        hideError(scheduleInput, 'scheduleError');
        hideError(messageInput, 'messageError');

        let isValid = true;

        // Validate name
        if (!nameInput.value.trim()) {
            showError(nameInput, 'nameError', 'Name is required');
            isValid = false;
        }

        // Validate email
        if (!validateEmail(emailInput.value)) {
            showError(emailInput, 'emailError', 'Invalid email address');
            isValid = false;
        }

        // Validate phone
        if (!phoneInput.value.trim()) {
            showError(phoneInput, 'phoneError', 'Phone number is required');
            isValid = false;
        } else if (!validatePhone(phoneInput.value)) {
            showError(phoneInput, 'phoneError', 'Invalid phone number format');
            isValid = false;
        }

        // Validate service
        if (!serviceInput.value) {
            showError(serviceInput, 'serviceError', 'Please select a service');
            isValid = false;
        }

        // Validate schedule
        if (!scheduleInput.value) {
            showError(scheduleInput, 'scheduleError', 'Please select a schedule');
            isValid = false;
        }

        // Validate message
        if (!messageInput.value.trim()) {
            showError(messageInput, 'messageError', 'Message is required');
            isValid = false;
        }

        if (isValid) {
            // Show success message
            successMessage.style.display = 'flex';

            // Prepare WhatsApp message
            const name = nameInput.value.trim();
            const email = emailInput.value.trim();
            const phone = phoneInput.value.trim();
            const service = serviceInput.value;
            const schedule = scheduleInput.value;
            const message = messageInput.value.trim();

            const whatsappMessage = `*MEAMO PHOTOBOOTH BOOKING INQUIRY*%0A%0A` +
                `*Customer Information:*%0A` +
                `👤 Name: ${encodeURIComponent(name)}%0A` +
                `📧 Email: ${encodeURIComponent(email)}%0A` +
                `📱 Phone: ${encodeURIComponent(phone)}%0A%0A` +
                `*Booking Details:*%0A` +
                `🎯 Service: ${encodeURIComponent(service)}%0A` +
                `📅 Preferred Schedule: ${encodeURIComponent(schedule)}%0A%0A` +
                `*Message/Requirements:*%0A${encodeURIComponent(message)}%0A%0A` +
                `_This message was sent from MEAMO Photobooth Website_`;

            // Redirect to WhatsApp after short delay
            setTimeout(function() {
                window.open(`https://wa.me/${whatsappNumber}?text=${whatsappMessage}`, '_blank');

                // Reset form
                form.reset();

                // Hide success message after redirect
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 2000);
            }, 1000);
        } else {
            // Scroll to first error
            const firstError = form.querySelector('.error');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }
    });
});
</script>

@endsection
