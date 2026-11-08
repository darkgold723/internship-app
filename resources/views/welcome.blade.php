<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Internship Application System</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50 text-gray-900">
        <div class="relative min-h-screen flex flex-col justify-center items-center">
            
            <!-- Top Navigation -->
            <div class="absolute top-0 right-0 p-6 sm:block">
                @if (Route::has('login'))
                    <nav class="flex gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">Register</a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>

            <!-- Main Content -->
            <div class="max-w-3xl mx-auto text-center px-6">
                <div class="mb-8">
                    <svg class="w-24 h-24 mx-auto text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                
                <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 tracking-tight mb-6">
                    STUDENT INTERNSHIP <br>
                    <span class="text-blue-600">APPLICATION SYSTEM</span>
                </h1>
                
                <p class="text-lg text-gray-600 mb-10 max-w-2xl mx-auto">
                    A centralized platform for university students to submit internship application records, and for faculty administrators to review, approve, and manage them efficiently.
                </p>

                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-8 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition shadow-lg">
                            Go to Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="px-8 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition shadow-lg">
                            Log In to System
                        </a>
                        <a href="{{ route('register') }}" class="px-8 py-3 bg-white text-blue-600 border-2 border-blue-600 font-bold rounded-lg hover:bg-gray-50 transition shadow-lg">
                            Register New Account
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Footer -->
            <div class="absolute bottom-0 w-full text-center p-6 text-sm text-gray-500">
                &copy; {{ date('Y') }} University Faculty. All rights reserved.
            </div>
        </div>
    </body>
</html>