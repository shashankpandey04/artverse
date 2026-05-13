@extends('layout')

@section('content')
<div class="max-w-md mx-auto py-12">
    <div class="bg-white/5 border border-white/10 rounded-3xl p-8 backdrop-blur-xl">
        <h1 class="text-3xl font-bold mb-6 text-center">Login</h1>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
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

            <!-- Password -->
            <div>
                <label class="block text-white mb-2">Password</label>
                <input type="password" name="password" 
                    class="w-full bg-white/5 border border-white/10 rounded-xl p-3 text-white focus:outline-none focus:border-indigo-500"
                    required />
                @error('password')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" class="rounded">
                <label for="remember" class="ml-2 text-white/80">Remember me</label>
            </div>

            <!-- Submit -->
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white py-3 rounded-xl font-semibold transition mt-6">
                Login
            </button>
        </form>

        <!-- Links -->
        <div class="mt-6 text-center text-white/60 text-sm">
            <p>Don't have an account? 
                <a href="{{ route('register') }}" class="text-indigo-400 hover:text-indigo-300">Register</a>
            </p>
            @if (Route::has('password.request'))
                <p class="mt-2">
                    <a href="{{ route('password.request') }}" class="text-indigo-400 hover:text-indigo-300">Forgot password?</a>
                </p>
            @endif
        </div>
    </div>
</div>
@endsection
