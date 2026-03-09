@extends('admin.layouts.app')
@section('title', 'Message de ' . $contact->name)

@section('content')

    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('admin.contacts.index') }}"
           class="text-gray-500 hover:text-gray-700 transition-colors">
            ← Retour
        </a>
        <h1 class="text-2xl font-bold text-gray-800">📬 Message de {{ $contact->name }}</h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- Message --}}
        <div class="md:col-span-2 bg-white rounded-xl shadow-sm p-8">
            <h2 class="font-bold text-gray-800 mb-4">Message</h2>
            <div class="bg-gray-50 rounded-xl p-6">
                <p class="text-gray-700 leading-relaxed">{{ $contact->message }}</p>
            </div>

            {{-- Répondre par WhatsApp --}}
            @if($contact->phone)
            <div class="mt-6">
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}?text=Bonjour%20{{ urlencode($contact->name) }}%2C%20nous%20avons%20bien%20reçu%20votre%20message."
                   target="_blank"
                   class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white font-bold px-6 py-3 rounded-xl transition-all">
                    💬 Répondre via WhatsApp
                </a>
            </div>
            @endif

            {{-- Répondre par email --}}
            <div class="mt-3">
                <a href="mailto:{{ $contact->email }}?subject=Re: Votre message - Quincaillerie Ibrahima Gaye"
                   class="inline-flex items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white font-bold px-6 py-3 rounded-xl transition-all">
                    📧 Répondre par email
                </a>
            </div>
        </div>

        {{-- Infos expéditeur --}}
        <div class="bg-white rounded-xl shadow-sm p-8">
            <h2 class="font-bold text-gray-800 mb-4">Expéditeur</h2>
            <div class="space-y-4">

                <div>
                    <p class="text-gray-400 text-xs uppercase font-medium">Nom</p>
                    <p class="text-gray-800 font-medium mt-1">{{ $contact->name }}</p>
                </div>

                <div>
                    <p class="text-gray-400 text-xs uppercase font-medium">Email</p>
                    <p class="text-gray-800 mt-1">{{ $contact->email }}</p>
                </div>

                @if($contact->phone)
                <div>
                    <p class="text-gray-400 text-xs uppercase font-medium">Téléphone</p>
                    <p class="text-gray-800 mt-1">{{ $contact->phone }}</p>
                </div>
                @endif

                <div>
                    <p class="text-gray-400 text-xs uppercase font-medium">Date</p>
                    <p class="text-gray-800 mt-1">{{ $contact->created_at->format('d/m/Y à H:i') }}</p>
                </div>

                <div>
                    <p class="text-gray-400 text-xs uppercase font-medium">Statut</p>
                    <span class="inline-block mt-1 text-xs px-3 py-1 rounded-full font-medium bg-green-100 text-green-600">
                        ✅ Lu
                    </span>
                </div>

            </div>

            {{-- Supprimer --}}
            <div class="mt-8 pt-6 border-t border-gray-100">
                <form method="POST"
                      action="{{ route('admin.contacts.destroy', $contact) }}"
                      onsubmit="return confirm('Supprimer ce message ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="w-full bg-red-50 hover:bg-red-100 text-red-600 font-medium px-4 py-3 rounded-xl transition-colors">
                        🗑️ Supprimer le message
                    </button>
                </form>
            </div>
        </div>

    </div>

@endsection