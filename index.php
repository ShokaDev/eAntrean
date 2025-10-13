<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eAntrean - Sistem Antrian Online Universal</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            overflow-x: hidden;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #ffffff 0%, #eff6ff 50%, #dbeafe 100%);
        }

        .gradient-accent {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        }

        .gradient-purple {
            background: linear-gradient(135deg, #8b5cf6 0%, #6366f1 100%);
        }

        .hero-image {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(2deg); }
        }

        .fade-in {
            animation: fadeIn 1s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .slide-in-left {
            animation: slideInLeft 0.8s ease-out;
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .slide-in-right {
            animation: slideInRight 0.8s ease-out;
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 25px 50px rgba(37, 99, 235, 0.2);
        }

        .btn-primary {
            transition: all 0.3s ease;
            box-shadow: 0 4px 14px 0 rgba(37, 99, 235, 0.4);
            position: relative;
            overflow: hidden;
        }

        .btn-primary:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover:before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.5);
        }

        .btn-outline {
            transition: all 0.3s ease;
            position: relative;
        }

        .btn-outline:hover {
            transform: translateY(-3px);
            background: rgba(37, 99, 235, 0.1);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.15);
        }

        .navbar {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.95);
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(37, 99, 235, 0.1);
        }

        .icon-wrapper {
            width: 64px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
        }

        .step-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            font-weight: bold;
            font-size: 1.25rem;
            margin-bottom: 1rem;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .mockup-container {
            transition: all 0.4s ease;
        }

        .mockup-container:hover {
            transform: scale(1.05) rotate(1deg);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15);
        }

        .pulse-dot {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .testimonial-card {
            background: white;
            border-radius: 1.5rem;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 900;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .glow-effect {
            box-shadow: 0 0 30px rgba(59, 130, 246, 0.3);
        }

        @keyframes shimmer {
            0% { background-position: -1000px 0; }
            100% { background-position: 1000px 0; }
        }

        .shimmer {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 1000px 100%;
            animation: shimmer 2s infinite;
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            border-radius: 1rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .pricing-badge {
            position: absolute;
            top: -12px;
            right: 20px;
            background: linear-gradient(135deg, #f59e0b 0%, #ef4444 100%);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: bold;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
        }
    </style>
</head>

<body class="gradient-bg text-gray-800">
    <!-- Navbar -->
    <nav class="navbar fixed w-full z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 gradient-accent rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <h1 class="text-2xl font-extrabold text-blue-600">eAntrean</h1>
            </div>
            <div class="hidden md:flex items-center space-x-8">
                <a href="#fitur" class="text-gray-700 hover:text-blue-600 font-medium transition">Fitur</a>
                <a href="#cara-kerja" class="text-gray-700 hover:text-blue-600 font-medium transition">Cara Kerja</a>
                <a href="#testimoni" class="text-gray-700 hover:text-blue-600 font-medium transition">Testimoni</a>
                <a href="#pricing" class="text-gray-700 hover:text-blue-600 font-medium transition">Harga</a>
            </div>
            <div class="flex items-center space-x-4">
                <a href="login.php" class="text-gray-700 hover:text-blue-600 font-semibold transition">Login</a>
                <a href="register.php" class="gradient-accent text-white px-6 py-2.5 rounded-xl font-semibold hover:opacity-90 transition shadow-md">Daftar Gratis</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="min-h-screen flex items-center pt-24 pb-12">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center justify-between gap-16">
                <!-- Left Column -->
                <div class="md:w-1/2 slide-in-left">
                    <div class="inline-flex items-center bg-blue-50 text-blue-600 px-5 py-2.5 rounded-full text-sm font-bold mb-8 border border-blue-100">
                        <span class="w-2 h-2 bg-blue-600 rounded-full mr-2 pulse-dot"></span>
                        🚀 Solusi Antrian Masa Depan
                    </div>
                    <h2 class="text-5xl md:text-7xl font-black mb-6 leading-tight">
                        Kelola Antrian dengan<br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-blue-500 to-purple-600">Lebih Smart</span>
                    </h2>
                    <p class="text-2xl text-gray-700 mb-4 leading-relaxed font-medium">
                        Sistem antrian online terpercaya untuk berbagai kebutuhan bisnis Anda.
                    </p>
                    <p class="text-lg text-gray-600 mb-10 leading-relaxed">
                        Panggil antrian secara otomatis dengan teknologi Text-to-Speech AI. Tingkatkan efisiensi layanan hingga <span class="font-bold text-blue-600">300%</span> dan kurangi waktu tunggu pelanggan.
                    </p>
                    <div class="flex flex-wrap gap-4 mb-8">
                        <a href="register.php" class="btn-primary gradient-accent text-white px-10 py-5 rounded-xl font-bold inline-flex items-center text-lg">
                            Coba Gratis 30 Hari
                            <svg class="w-6 h-6 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                        <a href="#demo" class="btn-outline border-2 border-blue-600 text-blue-600 px-10 py-5 rounded-xl font-bold inline-flex items-center text-lg">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Lihat Demo
                        </a>
                    </div>
                    <div class="flex items-center space-x-8 text-sm text-gray-600">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                            </svg>
                            <span class="font-semibold">Gratis 30 hari</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                            </svg>
                            <span class="font-semibold">Tanpa kartu kredit</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                            </svg>
                            <span class="font-semibold">Setup 5 menit</span>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="md:w-1/2 flex justify-center slide-in-right">
                    <div class="relative">
                        <div class="absolute -top-4 -left-4 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse"></div>
                        <div class="absolute -bottom-8 -right-4 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse" style="animation-delay: 2s"></div>
                        <img src="https://illustrations.popsy.co/blue/remote-work.svg" alt="Ilustrasi eAntrean" class="relative w-full max-w-xl hero-image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="fade-in">
                    <div class="stat-number">500+</div>
                    <p class="text-gray-600 font-semibold">Organisasi Terdaftar</p>
                </div>
                <div class="fade-in" style="animation-delay: 0.1s">
                    <div class="stat-number">50K+</div>
                    <p class="text-gray-600 font-semibold">Antrian Terkelola</p>
                </div>
                <div class="fade-in" style="animation-delay: 0.2s">
                    <div class="stat-number">98%</div>
                    <p class="text-gray-600 font-semibold">Kepuasan Pengguna</p>
                </div>
                <div class="fade-in" style="animation-delay: 0.3s">
                    <div class="stat-number">24/7</div>
                    <p class="text-gray-600 font-semibold">Dukungan Pelanggan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="fitur" class="py-24 bg-gradient-to-b from-white to-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20">
                <div class="inline-block bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-sm font-bold mb-4">
                    ✨ FITUR UNGGULAN
                </div>
                <h3 class="text-5xl md:text-6xl font-black mb-6">Mengapa Memilih eAntrean?</h3>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">Solusi lengkap dengan teknologi terdepan untuk mengelola antrian Anda secara profesional dan efisien</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Card 1 -->
                <div class="card bg-white p-8 rounded-3xl shadow-xl border border-gray-100">
                    <div class="icon-wrapper glow-effect">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                        </svg>
                    </div>
                    <h4 class="text-2xl font-bold mb-4 text-gray-800">Universal & Fleksibel</h4>
                    <p class="text-gray-600 leading-relaxed mb-4">Cocok untuk rumah sakit, klinik, restoran, bank, kantor pemerintahan, dan berbagai bisnis lainnya.</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="text-xs bg-blue-50 text-blue-600 px-3 py-1 rounded-full font-semibold">Healthcare</span>
                        <span class="text-xs bg-blue-50 text-blue-600 px-3 py-1 rounded-full font-semibold">F&B</span>
                        <span class="text-xs bg-blue-50 text-blue-600 px-3 py-1 rounded-full font-semibold">Government</span>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="card bg-white p-8 rounded-3xl shadow-xl border border-gray-100">
                    <div class="icon-wrapper glow-effect">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15.536a5 5 0 001.414 1.414m2.828-9.9a9 9 0 012.828 0"></path>
                        </svg>
                    </div>
                    <h4 class="text-2xl font-bold mb-4 text-gray-800">Voice AI Premium</h4>
                    <p class="text-gray-600 leading-relaxed mb-4">Sistem pemanggilan otomatis dengan suara AI yang natural dan jelas dalam Bahasa Indonesia.</p>
                    <div class="flex items-center text-blue-600 font-semibold text-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Powered by Google TTS
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="card bg-white p-8 rounded-3xl shadow-xl border border-gray-100">
                    <div class="icon-wrapper glow-effect">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h4 class="text-2xl font-bold mb-4 text-gray-800">Multi-Platform</h4>
                    <p class="text-gray-600 leading-relaxed mb-4">Akses dari komputer, tablet, atau smartphone. Kelola antrian dari mana saja, kapan saja.</p>
                    <div class="flex items-center space-x-3 text-gray-400">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M20 12h-4V4H8v8H4l8 8 8-8z"/></svg>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17 1H7c-1.1 0-2 .9-2 2v18c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V3c0-1.1-.9-2-2-2zm0 18H7V5h10v14z"/></svg>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M21 2H3c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h7v2H8v2h8v-2h-2v-2h7c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H3V4h18v12z"/></svg>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="card bg-white p-8 rounded-3xl shadow-xl border border-gray-100">
                    <div class="icon-wrapper glow-effect">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-2xl font-bold mb-4 text-gray-800">Team Management</h4>
                    <p class="text-gray-600 leading-relaxed mb-4">Kelola tim dengan role dan permission. Undang anggota untuk kolaborasi yang lebih baik.</p>
                    <div class="flex items-center text-green-600 font-semibold text-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        Role-based Access
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="cara-kerja" class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20">
                <div class="inline-block bg-purple-100 text-purple-600 px-4 py-2 rounded-full text-sm font-bold mb-4">
                    📖 PANDUAN LENGKAP
                </div>
                <h3 class="text-5xl md:text-6xl font-black mb-6">Bagaimana Cara Kerjanya?</h3>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Hanya 4 langkah mudah untuk memulai sistem antrian modern Anda
                </p>
            </div>

            <!-- Step 1 -->
            <div class="flex flex-col md:flex-row items-center justify-between gap-16 mb-32">
                <div class="md:w-5/12">
                    <div class="step-number">1</div>
                    <h4 class="text-4xl font-black text-gray-800 mb-6">Daftar Akun Gratis</h4>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        Buat akun organisasi Anda dalam hitungan menit. Tidak perlu kartu kredit, cukup email dan password. Mulai dengan free trial 30 hari tanpa batasan fitur.
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 gradient-accent rounded-full flex items-center justify-center mr-3 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium">Verifikasi email otomatis</span>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 gradient-accent rounded-full flex items-center justify-center mr-3 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium">Langsung akses semua fitur premium</span>
                        </li>
                    </ul>
                </div>
                <div class="md:w-6/12">
                    <div class="mockup-container w-full max-w-2xl mx-auto bg-gradient-to-br from-blue-500 to-purple-600 rounded-3xl shadow-2xl overflow-hidden p-8">
                        <div class="bg-white rounded-2xl p-8">
                            <div class="flex items-center justify-center mb-6">
                                <div class="w-20 h-20 gradient-accent rounded-2xl flex items-center justify-center shadow-xl">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                            </div>
                            <h5 class="text-center text-gray-800 font-bold text-2xl mb-6">Buat Akun Baru</h5>
                            <div class="space-y-4">
                                <div class="h-12 bg-gray-100 rounded-xl shimmer"></div>
                                <div class="h-12 bg-gray-100 rounded-xl shimmer"></div>
                                <div class="h-12 bg-gray-100 rounded-xl shimmer"></div>
                                <div class="h-14 gradient-accent rounded-xl flex items-center justify-center text-white font-bold text-lg">
                                    Daftar Gratis →
                                </div>
                            </div>
                            <p class="text-center text-gray-500 text-sm mt-4">Gratis 30 hari • Tanpa kartu kredit</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="flex flex-col md:flex-row-reverse items-center justify-between gap-16 mb-32">
                <div class="md:w-5/12">
                    <div class="step-number">2</div>
                    <h4 class="text-4xl font-black text-gray-800 mb-6">Atur Layanan Antrian</h4>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        Buat berbagai jenis layanan dengan format nomor antrian kustom. Atur loket, ruangan, atau counter sesuai kebutuhan bisnis Anda dengan mudah.
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 gradient-accent rounded-full flex items-center justify-center mr-3 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium">Format nomor kustom (A001, B001, dll)</span>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 gradient-accent rounded-full flex items-center justify-center mr-3 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium">Multiple layanan dalam satu organisasi</span>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 gradient-accent rounded-full flex items-center justify-center mr-3 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium">Dashboard real-time monitoring</span>
                        </li>
                    </ul>
                </div>
                <div class="md:w-6/12">
                    <div class="mockup-container w-full max-w-2xl mx-auto bg-white rounded-3xl shadow-2xl overflow-hidden border-4 border-gray-100">
                        <div class="bg-gradient-to-r from-blue-600 to-purple-600 p-6">
                            <h6 class="text-white font-bold text-xl mb-4">Dashboard Antrian</h6>
                            <div class="grid grid-cols-3 gap-4">
                                <div class="bg-white bg-opacity-20 backdrop-blur-lg rounded-xl p-4 text-white">
                                    <div class="text-3xl font-black mb-1">A012</div>
                                    <div class="text-xs opacity-90">Loket 1</div>
                                </div>
                                <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-xl p-4 text-white">
                                    <div class="text-3xl font-black mb-1">B008</div>
                                    <div class="text-xs opacity-90">Loket 2</div>
                                </div>
                                <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-xl p-4 text-white">
                                    <div class="text-3xl font-black mb-1">C005</div>
                                    <div class="text-xs opacity-90">Poli Umum</div>
                                </div>
                            </div>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="bg-blue-50 p-5 rounded-xl border-l-4 border-blue-600">
                                <div class="flex justify-between items-center">
                                    <span class="font-bold text-gray-800">Antrian Aktif</span>
                                    <span class="text-blue-600 font-black text-2xl">25</span>
                                </div>
                            </div>
                            <div class="bg-green-50 p-5 rounded-xl border-l-4 border-green-600">
                                <div class="flex justify-between items-center">
                                    <span class="font-bold text-gray-800">Selesai Hari Ini</span>
                                    <span class="text-green-600 font-black text-2xl">142</span>
                                </div>
                            </div>
                            <div class="bg-orange-50 p-5 rounded-xl border-l-4 border-orange-600">
                                <div class="flex justify-between items-center">
                                    <span class="font-bold text-gray-800">Rata-rata Waktu</span>
                                    <span class="text-orange-600 font-black text-2xl">8m</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="flex flex-col md:flex-row items-center justify-between gap-16 mb-32">
                <div class="md:w-5/12">
                    <div class="step-number">3</div>
                    <h4 class="text-4xl font-black text-gray-800 mb-6">Panggil dengan AI Voice</h4>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        Operator hanya perlu klik tombol "Panggil". Sistem akan otomatis memutar suara dengan teknologi Text-to-Speech berkualitas tinggi dalam Bahasa Indonesia.
                    </p>
                    <div class="bg-blue-50 border-2 border-blue-200 rounded-2xl p-6 mb-6">
                        <div class="flex items-center mb-3">
                            <svg class="w-8 h-8 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path>
                            </svg>
                            <span class="text-blue-800 font-bold text-lg">Contoh Suara:</span>
                        </div>
                        <p class="text-blue-900 italic text-lg">
                            "Nomor antrian A013, silakan menuju loket 2"
                        </p>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 gradient-accent rounded-full flex items-center justify-center mr-3 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium">Suara natural dan jelas</span>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 gradient-accent rounded-full flex items-center justify-center mr-3 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium">Tanpa mikrofon manual</span>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 gradient-accent rounded-full flex items-center justify-center mr-3 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium">Dapat diputar ulang kapan saja</span>
                        </li>
                    </ul>
                </div>
                <div class="md:w-6/12">
                    <div class="mockup-container w-full max-w-2xl mx-auto bg-gradient-to-br from-purple-500 to-blue-600 rounded-3xl shadow-2xl overflow-hidden p-8">
                        <div class="bg-white rounded-2xl p-10">
                            <div class="text-center mb-8">
                                <div class="inline-flex items-center justify-center w-28 h-28 gradient-accent rounded-full mb-6 glow-effect">
                                    <svg class="w-14 h-14 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 14c1.66 0 3-1.34 3-3V5c0-1.66-1.34-3-3-3S9 3.34 9 5v6c0 1.66 1.34 3 3 3z"></path>
                                        <path d="M17 11c0 2.76-2.24 5-5 5s-5-2.24-5-5H5c0 3.53 2.61 6.43 6 6.92V21h2v-3.08c3.39-.49 6-3.39 6-6.92h-2z"></path>
                                    </svg>
                                </div>
                                <div class="text-6xl font-black text-gray-800 mb-3">A013</div>
                                <div class="text-gray-600 text-xl mb-6 font-semibold">Menuju Loket 2</div>
                                <div class="flex items-center justify-center space-x-3 mb-8">
                                    <div class="w-3 h-3 bg-blue-600 rounded-full pulse-dot"></div>
                                    <div class="w-3 h-3 bg-blue-600 rounded-full pulse-dot" style="animation-delay: 0.2s"></div>
                                    <div class="w-3 h-3 bg-blue-600 rounded-full pulse-dot" style="animation-delay: 0.4s"></div>
                                    <span class="text-blue-600 font-bold ml-2">Memutar suara...</span>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <button class="gradient-accent text-white py-4 rounded-xl font-bold text-lg hover:opacity-90 transition">
                                    🔊 Panggil
                                </button>
                                <button class="border-2 border-gray-300 text-gray-700 py-4 rounded-xl font-bold text-lg hover:bg-gray-50 transition">
                                    ⏭ Skip
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="flex flex-col md:flex-row-reverse items-center justify-between gap-16">
                <div class="md:w-5/12">
                    <div class="step-number">4</div>
                    <h4 class="text-4xl font-black text-gray-800 mb-6">Analisis & Laporan</h4>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        Semua data tersimpan otomatis. Akses laporan lengkap, statistik real-time, dan insights untuk meningkatkan efisiensi layanan Anda.
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 gradient-accent rounded-full flex items-center justify-center mr-3 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium">Laporan harian, mingguan & bulanan</span>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 gradient-accent rounded-full flex items-center justify-center mr-3 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium">Export data ke Excel/PDF</span>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 gradient-accent rounded-full flex items-center justify-center mr-3 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium">Grafik performa layanan</span>
                        </li>
                    </ul>
                </div>
                <div class="md:w-6/12">
                    <div class="mockup-container w-full max-w-2xl mx-auto bg-white rounded-3xl shadow-2xl overflow-hidden border-4 border-gray-100">
                        <div class="bg-gradient-to-r from-blue-600 to-purple-600 p-6">
                            <h6 class="text-white font-bold text-2xl mb-2">📊 Statistik Hari Ini</h6>
                            <p class="text-blue-100 text-sm">Senin, 13 Oktober 2025</p>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-2xl text-center border-2 border-blue-200">
                                    <div class="text-5xl font-black text-blue-600 mb-2">328</div>
                                    <div class="text-sm text-gray-700 font-semibold">Total Antrian</div>
                                </div>
                                <div class="bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-2xl text-center border-2 border-green-200">
                                    <div class="text-5xl font-black text-green-600 mb-2">298</div>
                                    <div class="text-sm text-gray-700 font-semibold">Selesai</div>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl border border-gray-200">
                                    <span class="text-gray-800 font-bold">Loket 1</span>
                                    <span class="font-black text-blue-600 text-xl">98</span>
                                </div>
                                <div class="flex items-center justify-between p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl border border-gray-200">
                                    <span class="text-gray-800 font-bold">Loket 2</span>
                                    <span class="font-black text-blue-600 text-xl">85</span>
                                </div>
                                <div class="flex items-center justify-between p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl border border-gray-200">
                                    <span class="text-gray-800 font-bold">Poli Umum</span>
                                    <span class="font-black text-blue-600 text-xl">115</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section id="testimoni" class="py-24 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20">
                <div class="inline-block bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm font-bold mb-4">
                    ⭐ TESTIMONI PENGGUNA
                </div>
                <h3 class="text-5xl md:text-6xl font-black mb-6">Apa Kata Mereka?</h3>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Ribuan organisasi telah mempercayai eAntrean untuk meningkatkan kualitas layanan mereka</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="testimonial-card">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 gradient-accent rounded-full flex items-center justify-center text-white font-bold text-2xl mr-4">
                            RS
                        </div>
                        <div>
                            <h5 class="font-bold text-gray-800 text-lg">Dr. Sarah Maharani</h5>
                            <p class="text-gray-600 text-sm">Direktur RS Harapan Sehat</p>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    </div>
                    <p class="text-gray-700 leading-relaxed italic">"Sistem ini luar biasa! Pelanggan tidak perlu menunggu lama, dan staff kami bisa fokus melayani. ROI tercapai dalam 2 bulan!"</p>
                </div>

                <!-- Testimonial 3 -->
                <div class="testimonial-card">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center text-white font-bold text-2xl mr-4">
                            DK
                        </div>
                        <div>
                            <h5 class="font-bold text-gray-800 text-lg">Dian Kartika</h5>
                            <p class="text-gray-600 text-sm">Kepala Dinas Kependudukan</p>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    </div>
                    <p class="text-gray-700 leading-relaxed italic">"Pelayanan publik jadi lebih tertib dan transparan. Masyarakat puas karena tidak ada lagi antrian yang tidak jelas. Recommended!"</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-24 bg-gradient-to-b from-white to-blue-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20">
                <div class="inline-block bg-yellow-100 text-yellow-600 px-4 py-2 rounded-full text-sm font-bold mb-4">
                    💰 PAKET HARGA
                </div>
                <h3 class="text-5xl md:text-6xl font-black mb-6">Pilih Paket yang Tepat</h3>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Harga transparan tanpa biaya tersembunyi. Upgrade atau downgrade kapan saja</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Free Plan -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border-2 border-gray-200 hover:border-blue-300 transition">
                    <div class="text-center mb-8">
                        <h4 class="text-2xl font-bold text-gray-800 mb-2">Starter</h4>
                        <p class="text-gray-600 mb-6">Untuk usaha kecil</p>
                        <div class="mb-4">
                            <span class="text-5xl font-black text-gray-800">Gratis</span>
                        </div>
                        <p class="text-sm text-gray-500">30 hari trial</p>
                    </div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">1 Organisasi</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">3 Layanan Aktif</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">50 Antrian/hari</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Voice AI Basic</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Laporan Mingguan</span>
                        </li>
                    </ul>
                    <a href="register.php" class="block text-center border-2 border-blue-600 text-blue-600 px-6 py-4 rounded-xl font-bold hover:bg-blue-50 transition">
                        Mulai Gratis
                    </a>
                </div>

                <!-- Pro Plan -->
                <div class="bg-white rounded-3xl shadow-2xl p-8 border-4 border-blue-600 relative transform scale-105">
                    <div class="pricing-badge">PALING POPULER</div>
                    <div class="text-center mb-8">
                        <h4 class="text-2xl font-bold text-gray-800 mb-2">Professional</h4>
                        <p class="text-gray-600 mb-6">Untuk bisnis berkembang</p>
                        <div class="mb-4">
                            <span class="text-5xl font-black gradient-accent bg-clip-text text-transparent">Rp 299K</span>
                            <span class="text-gray-600">/bulan</span>
                        </div>
                        <p class="text-sm text-gray-500">Hemat 20% dengan paket tahunan</p>
                    </div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700 font-medium">5 Organisasi</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700 font-medium">Unlimited Layanan</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700 font-medium">500 Antrian/hari</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700 font-medium">Voice AI Premium</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700 font-medium">Laporan Real-time</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700 font-medium">Export Excel/PDF</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700 font-medium">Priority Support</span>
                        </li>
                    </ul>
                    <a href="register.php" class="block text-center gradient-accent text-white px-6 py-4 rounded-xl font-bold hover:opacity-90 transition shadow-lg">
                        Pilih Professional
                    </a>
                </div>

                <!-- Enterprise Plan -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border-2 border-gray-200 hover:border-purple-300 transition">
                    <div class="text-center mb-8">
                        <h4 class="text-2xl font-bold text-gray-800 mb-2">Enterprise</h4>
                        <p class="text-gray-600 mb-6">Untuk perusahaan besar</p>
                        <div class="mb-4">
                            <span class="text-5xl font-black gradient-purple bg-clip-text text-transparent">Custom</span>
                        </div>
                        <p class="text-sm text-gray-500">Hubungi tim sales</p>
                    </div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Unlimited Organisasi</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Unlimited Layanan</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Unlimited Antrian</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Custom Voice AI</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Advanced Analytics</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">API Access</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Dedicated Support</span>
                        </li>
                    </ul>
                    <a href="#" class="block text-center gradient-purple text-white px-6 py-4 rounded-xl font-bold hover:opacity-90 transition">
                        Hubungi Sales
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 bg-gradient-to-r from-blue-600 via-blue-700 to-purple-700 relative overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="container mx-auto px-6 text-center relative z-10">
            <h3 class="text-5xl md:text-6xl font-black mb-6 text-white">Siap Mengubah Sistem Antrian Anda?</h3>
            <p class="text-2xl text-blue-100 max-w-3xl mx-auto mb-10 leading-relaxed">
                Bergabunglah dengan 500+ organisasi yang telah merasakan manfaat eAntrean. Mulai gratis hari ini, tidak perlu kartu kredit!
            </p>
            <div class="flex flex-wrap justify-center gap-6">
                <a href="register.php" class="bg-white text-blue-600 px-12 py-5 rounded-xl font-black text-xl hover:bg-gray-100 transition shadow-2xl inline-flex items-center">
                    Daftar Gratis Sekarang
                    <svg class="w-6 h-6 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
                <a href="#demo" class="border-3 border-white text-white px-12 py-5 rounded-xl font-black text-xl hover:bg-white hover:text-blue-600 transition inline-flex items-center">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Tonton Demo
                </a>
            </div>
            <p class="text-blue-200 mt-8 text-lg">✓ Gratis 30 hari &nbsp; | &nbsp; ✓ Tanpa kartu kredit &nbsp; | &nbsp; ✓ Cancel kapan saja</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="gradient-accent text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <!-- Brand -->
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <span class="text-2xl font-black">eAntrean</span>
                    </div>
                    <p class="text-blue-100 leading-relaxed mb-4">
                        Sistem antrian online terpercaya untuk berbagai kebutuhan bisnis Anda.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-white bg-opacity-20 rounded-lg flex items-center justify-center hover:bg-opacity-30 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white bg-opacity-20 rounded-lg flex items-center justify-center hover:bg-opacity-30 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white bg-opacity-20 rounded-lg flex items-center justify-center hover:bg-opacity-30 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Product -->
                <div>
                    <h5 class="text-lg font-bold mb-4">Produk</h5>
                    <ul class="space-y-3">
                        <li><a href="#fitur" class="text-blue-100 hover:text-white transition">Fitur</a></li>
                        <li><a href="#cara-kerja" class="text-blue-100 hover:text-white transition">Cara Kerja</a></li>
                        <li><a href="#pricing" class="text-blue-100 hover:text-white transition">Harga</a></li>
                        <li><a href="#" class="text-blue-100 hover:text-white transition">Dokumentasi</a></li>
                        <li><a href="#" class="text-blue-100 hover:text-white transition">API</a></li>
                    </ul>
                </div>

                <!-- Company -->
                <div>
                    <h5 class="text-lg font-bold mb-4">Perusahaan</h5>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-blue-100 hover:text-white transition">Tentang Kami</a></li>
                        <li><a href="#" class="text-blue-100 hover:text-white transition">Blog</a></li>
                        <li><a href="#" class="text-blue-100 hover:text-white transition">Karir</a></li>
                        <li><a href="#" class="text-blue-100 hover:text-white transition">Press Kit</a></li>
                        <li><a href="#" class="text-blue-100 hover:text-white transition">Partner</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h5 class="text-lg font-bold mb-4">Dukungan</h5>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-blue-100 hover:text-white transition">Help Center</a></li>
                        <li><a href="#" class="text-blue-100 hover:text-white transition">Hubungi Kami</a></li>
                        <li><a href="#" class="text-blue-100 hover:text-white transition">Status</a></li>
                        <li><a href="#" class="text-blue-100 hover:text-white transition">Kebijakan Privasi</a></li>
                        <li><a href="#" class="text-blue-100 hover:text-white transition">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-blue-400 border-opacity-30 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-blue-100 mb-4 md:mb-0">© 2025 eAntrean. Semua hak dilindungi. | Sistem Antrian Online Universal</p>
                    <div class="flex space-x-6">
                        <a href="#" class="text-blue-100 hover:text-white transition text-sm">Bahasa: Indonesia</a>
                        <a href="#" class="text-blue-100 hover:text-white transition text-sm">🇮🇩</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
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

        // Navbar shadow on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
                navbar.style.background = 'rgba(255, 255, 255, 0.98)';
            } else {
                navbar.style.boxShadow = 'none';
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
            }
        });

        // Intersection Observer for fade-in animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in, .card, .testimonial-card').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    </script>
</body>

</html>