@extends('layouts.app')

@section('title', 'Login - CalculatorTools')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
        <!-- Header -->
        <div class="text-center">
            <div class="flex justify-center mb-4">
                <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-calculator text-white text-2xl"></i>
                </div>
            </div>
            <h2 class="text-3xl font-bold text-gray-900">CalculatorTools</h2>
            <p class="mt-2 text-sm text-gray-600">Sign in to your account</p>
        </div>

        <!-- Login Form -->
        <div class="bg-white py-12 px-6 rounded-2xl shadow-xl">
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-envelope mr-2 text-blue-600"></i>Email Address
                    </label>
                    <input 
                        id="email" 
                        type="email" 
                        class="w-full px-4 py-3 border-2 @error('email') border-red-500 @else border-gray-300 @enderror rounded-lg focus:outline-none focus:border-blue-500 transition-colors"
                        name="email" 
                        value="{{ old('email') }}" 
                        required 
                        autocomplete="email" 
                        autofocus
                        placeholder="you@example.com"
                    >
                    @error('email')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-lock mr-2 text-blue-600"></i>Password
                    </label>
                    <input 
                        id="password" 
                        type="password" 
                        class="w-full px-4 py-3 border-2 @error('password') border-red-500 @else border-gray-300 @enderror rounded-lg focus:outline-none focus:border-blue-500 transition-colors"
                        name="password" 
                        required 
                        autocomplete="current-password"
                        placeholder="••••••••"
                    >
                    @error('password')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input 
                        class="w-4 h-4 text-blue-600 rounded focus:ring-2 focus:ring-blue-500 cursor-pointer" 
                        type="checkbox" 
                        name="remember" 
                        id="remember" 
                        {{ old('remember') ? 'checked' : '' }}
                    >
                    <label class="ml-2 block text-sm text-gray-700 cursor-pointer" for="remember">
                        Remember me for 30 days
                    </label>
                </div>

                <!-- Login Button -->
                <button 
                    type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition-colors duration-200 flex items-center justify-center"
                >
                    <i class="fas fa-sign-in-alt mr-2"></i>Sign In
                </button>

                <!-- Forgot Password Link -->
                @if (Route::has('password.request'))
                    <div class="text-center">
                        <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-700 font-medium transition-colors">
                            <i class="fas fa-question-circle mr-1"></i>Forgot your password?
                        </a>
                    </div>
                @endif
            </form>
        </div>

        <!-- Sign Up Link -->
        <div class="text-center">
            <p class="text-sm text-gray-600">
                Don't have an account? 
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-700 font-semibold transition-colors">
                        Create one now
                    </a>
                @endif
            </p>
        </div>

        <!-- Footer Info -->
        <div class="text-center text-xs text-gray-500 mt-8">
            <p>By signing in, you agree to our Terms of Service and Privacy Policy</p>
        </div>
    </div>
</div>
@endsection
