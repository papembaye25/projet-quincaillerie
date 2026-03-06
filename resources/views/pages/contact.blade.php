@extends('layouts.app')
@section('title', 'Contact - Quincaillerie Ibrahima Gaye')
@section('content')

<div class="max-w-3xl mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Contactez-nous</h1>

    @if(session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
        ✅ {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST" class="bg-white rounded-xl shadow-md p-8">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Nom *</label>
            <input type="text" name="name" value="{{ old('name') }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500"
                   placeholder="Votre nom">
            @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Email *</label>
            <input type="email" name="email" value="{{ old('email') }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500"
                   placeholder="votre@email.com">
            @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Téléphone</label>
            <input type="text" name="phone" value="{{ old('phone') }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500"
                   placeholder="+221 77 000 00 00">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-2">Message *</label>
            <textarea name="message" rows="5"
                      class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500"
                      placeholder="Votre message...">{{ old('message') }}</textarea>
            @error('message')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
                class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded-lg transition-colors">
            Envoyer le message
        </button>
    </form>
</div>

@endsection