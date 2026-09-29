<?php

namespace App\Policies;

use App\Models\Pergunta;
use App\Models\User;

class PerguntaPolicy
{
    /**
     * Ticket 2: só pode deletar a pergunta o próprio autor
     * OU o organizador (dono) do evento ao qual a pergunta pertence.
     */
    public function delete(User $user, Pergunta $pergunta): bool
    {
        return $user->id === $pergunta->user_id
            || $user->id === $pergunta->evento->user_id;
    }
}
