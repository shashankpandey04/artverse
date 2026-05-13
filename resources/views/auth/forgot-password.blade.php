@extends('layout')

@section('content')
<div class="max-w-md mx-auto py-12">
    <div class="bg-white/5 border border-white/10 rounded-3xl p-8 backdrop-blur-xl">
        <h1 class="text-3xl font-bold mb-2 text-center">Forgot Password?</h1>
        <p class="text-white/60 text-center mb-6">Enter your email to receive a password reset link.</p>

        @if (session('status'))
            <div class="mb-4 p-4 bg-green-600/20 border border-green-500/50 rounded-xl text-green-400 text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <label class="block text-white mb-2">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" 
                    class="w-full bg-white/5 border border-white/10 rounded-xl p-3 text-white focus:outline-none focus:border-indigo-500"
                    required autofocus />
                @error('email')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit -->
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white py-3 rounded-xl font-semibold transition mt-6">
                Send Reset Link
            </button>
        </form>

        <!-- Back to Login -->
        <div class="mt-6 text-center">
            <a href="{{ route('login') }}" class="text-indigo-400 hover:text-indigo-300 text-sm">
                Back to Login
            </a>
        </div>
    </div>
</div>
@endsection
