{{-- Dentro do @forelse ($perguntas as $pergunta) ... @endforelse, no card de cada pergunta --}}

<div class="card mb-3">
    <div class="card-body d-flex justify-content-between align-items-start">
        <div>
            <p class="card-text">{{ $pergunta->texto }}</p>
            <small class="text-muted">
                Enviado por: <strong>{{ $pergunta->user->name ?? 'Anônimo' }}</strong>
                &middot; {{ $pergunta->created_at->diffForHumans() }}
            </small>
        </div>

        {{-- Ticket 4: botão só aparece se a Policy autorizar --}}
        @can('delete', $pergunta)
            <form action="{{ route('perguntas.destroy', $pergunta) }}" method="POST" onsubmit="return confirm('Excluir esta pergunta?')">
                @csrf
                @method('DELETE')
                <x-danger-button>Excluir</x-danger-button>
            </form>
        @endcan
    </div>
</div>
