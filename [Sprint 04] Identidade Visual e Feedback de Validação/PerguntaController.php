<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePerguntaRequest;
use App\Models\Evento;
use App\Models\Pergunta;

class PerguntaController extends Controller
{
    public function store(StorePerguntaRequest $request, Evento $evento)
    {
        Pergunta::create([
            'texto' => $request->validated('texto'),
            'evento_id' => $evento->id,
            'user_id' => auth()->id(),
            'is_public' => false,
        ]);

        return redirect()
            ->route('eventos.show', $evento)
            ->with('success', 'Pergunta enviada! Ela aparecerá após aprovação do organizador.');
    }

    /**
     * Ticket 3: só executa a exclusão se a Policy autorizar.
     * Sem autorização -> Laravel lança 403 automaticamente.
     */
    // Nota: EventoController@show deve usar
    // Pergunta::with(['user', 'evento'])->... para o @can da view
    // não gerar N+1 (Ticket #004/#006 já resolvido, apenas acrescente 'evento').

    public function destroy(Pergunta $pergunta)
    {
        $this->authorize('delete', $pergunta);

        $evento = $pergunta->evento;
        $pergunta->delete();

        return redirect()
            ->route('eventos.show', $evento)
            ->with('success', 'Pergunta removida com sucesso!');
    }
}
