@if(session('success'))
    <div class="fixed bottom-6 right-6 bg-green-600 text-white px-4 py-2 rounded-full shadow-lg">{{ session('success') }}</div>
@endif
