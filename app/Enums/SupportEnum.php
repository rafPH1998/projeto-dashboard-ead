<?php

namespace App\Enums;

enum SupportEnum: string
{
    case pendente = 'Pendente';
    case aguardando = 'Aguardando Aluno';
    case concluido = 'Finalizado';
}