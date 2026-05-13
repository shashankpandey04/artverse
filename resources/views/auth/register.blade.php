@extends('layout')

@section('content')
<div class="max-w-md mx-auto py-12">
    <div class="bg-white/5 border border-white/10 rounded-3xl p-8 backdrop-blur-xl">
        <h1 class="text-3xl font-bold mb-6 text-center">Create Account</h1>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <label class="block text-white mb-2">Full Name</label>
                <input type="text" name="name" value="{{ old('name') }}" 
                    class="w-full bg-white/5 border border-white/10 rounded-xl p-3 text-white focus:outline-none focus:border-indigo-500"
                    required autofocus />
                @error('name')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-white mb-2">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" 
                    class="w-full bg-white/5 border border-white/10 rounded-xl p-3 text-white focus:outline-none focus:border-indigo-500"
                    required />
                @error('email')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Role Selection -->
            <div>
                <label class="block text-white mb-2">I am a...</label>
                <select name="role" class="w-full bg-white/5 border border-white/10 rounded-xl p-3 text-white focus:outline-none focus:border-indigo-500">
                    <option value="visitor">Visitor (Browse & Comment)</option>
                    <option value="artist">Artist (Upload & Share)</option>
                </select>
                @error('role')
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

            <!-- Confirm Password -->
            <div>
                <label class="block text-white mb-2">Confirm Password</label>
                <input type="password" name="password_confirmation" 
                    class="w-full bg-white/5 border border-white/10 rounded-xl p-3 text-white focus:outline-none focus:border-indigo-500"
                    required />
                @error('password_confirmation')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit -->
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white py-3 rounded-xl font-semibold transition mt-6">
                Create Account
            </button>
        </form>

        <!-- Links -->
        <div class="mt-6 text-center text-white/60 text-sm">
            <p>Already have an account? 
                <a href="{{ route('login') }}" class="text-indigo-400 hover:text-indigo-300">Login</a>
            </p>
        </div>
    </div>
</div>
@endsection
