@extends('layouts.app')
@section('title', 'Nos Services - Quincaillerie Ibrahima Gaye')
@section('content')

<div class="max-w-7xl mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Nos Services</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse($services as $service)
        <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-lg transition-shadow">
            <div class="text-4xl mb-4">🔧</div>
            <h3 class="font-bold text-gray-800 text-lg">{{ $service->title }}</h3>
            <p class="text-gray-500 text-sm mt-2">{{ $service->description }}</p>
        </div>
        @empty
        <p class="text-gray-500">Aucun service disponible.</p>
        @endforelse
    </div>
</div>

@endsection