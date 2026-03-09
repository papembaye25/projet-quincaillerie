@extends('admin.layouts.app')
@section('title', 'Messages clients')

@section('content')

    <h1 class="text-2xl font-bold text-gray-800 mb-8">📬 Messages clients</h1>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Expéditeur</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Message</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Date</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Statut</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($contacts as $contact)
                <tr class="hover:bg-gray-50 transition-colors {{ !$contact->is_read ? 'bg-orange-50' : '' }}">

                    {{-- Expéditeur --}}
                    <td class="px-6 py-4">
                        <p class="font-medium text-gray-800 text-sm">{{ $contact->name }}</p>
                        <p class="text-gray-400 text-xs">{{ $contact->email }}</p>
                        @if($contact->phone)
                        <p class="text-gray-400 text-xs">{{ $contact->phone }}</p>
                        @endif
                    </td>

                    {{-- Message --}}
                    <td class="px-6 py-4">
                        <p class="text-gray-600 text-sm">{{ Str::limit($contact->message, 60) }}</p>
                    </td>

                    {{-- Date --}}
                    <td class="px-6 py-4">
                        <p class="text-gray-500 text-sm">{{ $contact->created_at->format('d/m/Y') }}</p>
                        <p class="text-gray-400 text-xs">{{ $contact->created_at->format('H:i') }}</p>
                    </td>

                    {{-- Statut --}}
                    <td class="px-6 py-4">
                        <span class="text-xs px-3 py-1 rounded-full font-medium
                            {{ $contact->is_read ? 'bg-gray-100 text-gray-500' : 'bg-red-100 text-red-600' }}">
                            {{ $contact->is_read ? 'Lu' : '🔴 Nouveau' }}
                        </span>
                    </td>

                    {{-- Actions --}}
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.contacts.show', $contact) }}"
                               class="bg-blue-50 hover:bg-blue-100 text-blue-600 text-xs font-medium px-3 py-2 rounded-lg transition-colors">
                                👁️ Voir
                            </a>
                            <form method="POST"
                                  action="{{ route('admin.contacts.destroy', $contact) }}"
                                  onsubmit="return confirm('Supprimer ce message ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-50 hover:bg-red-100 text-red-600 text-xs font-medium px-3 py-2 rounded-lg transition-colors">
                                    🗑️ Supprimer
                                </button>
                            </form>
                        </div>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                        Aucun message reçu.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        @if($contacts->hasPages())
        <div class="px-6 py-4 border-t border-gray-100">
            {{ $contacts->links() }}
        </div>
        @endif

    </div>

@endsection