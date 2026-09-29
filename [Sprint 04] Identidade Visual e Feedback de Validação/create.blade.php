@extends('layouts.app')

@section('title', 'Criar evento')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md mt-8">

    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Criar novo evento</h1>

    <form action="{{ route('eventos.store') }}" method="POST" class="space-y-5">
        @csrf

        {{-- Título --}}
        <div>
            <label for="titulo" class="block text-sm font-medium text-gray-700 mb-1">
                Título
            </label>
            <input
                type="text"
                name="titulo"
                id="titulo"
                value="{{ old('titulo') }}"
                class="w-full border rounded-md px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500
                    @error('titulo') border-red-500 @else border-gray-300 @enderror"
                placeholder="Ex: Palestra sobre Laravel"
            >
            @error('titulo')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Descrição --}}
        <div>
            <label for="descricao" class="block text-sm font-medium text-gray-700 mb-1">
                Descrição
            </label>
            <textarea
                name="descricao"
                id="descricao"
                rows="4"
                class="w-full border rounded-md px-3 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500
                    @error('descricao') border-red-500 @else border-gray-300 @enderror"
                placeholder="Do que se trata o evento?"
            >{{ old('descricao') }}</textarea>
            @error('descricao')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Botão --}}
        <div class="pt-2">
            <button
                type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition"
            >
                Criar evento
            </button>
        </div>

    </form>
</div>
@endsection
