@extends('layout')

@section('content')
<div class="max-w-md mx-auto py-12">
    <div class="bg-white/5 border border-white/10 rounded-3xl p-8 backdrop-blur-xl">
        <h1 class="text-3xl font-bold mb-2 text-center">Confirm Password</h1>
        <p class="text-white/60 text-center mb-6">Please confirm your password before continuing.</p>

        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-white mb-2">Password</label>
                <input type="password" name="password"
                    class="w-full bg-white/5 border border-white/10 rounded-xl p-3 text-white focus:outline-none focus:border-indigo-500"
                    required autofocus />
                @error('password')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white py-3 rounded-xl font-semibold transition mt-6">
                Confirm Password
            </button>
        </form>
    </div>
</div>
@endsection
