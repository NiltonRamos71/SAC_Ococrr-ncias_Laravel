<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    protected $table = 'sacocorrencia.ocorrencias';

    protected $fillable = [
        'responsavel_id',
        'item_id',
        'unidade_id',
        'orgao_id',
        'data_ocorrencia',
        'data_previsao_conclusao',
        'data_conclusao',
        'descricao_problema',
        'status_id',
        'responsavel_tecnico_id',
        'tombamento',
        'fechamento_automatico',
        'item_id2',
        'solucao',
        'motivo_cancelamento',
        'data_cancelamento',
        'data_confirmacao',
        'avaliacao_id',
        'observacoes',
        'motivo_pendencia',
        'data_pendencia',
        'responsavel_encerramento_id',
        'area_atual_id',
        'responsavel_cancelar_id',
        'tipo_id',
        'cod_oco_cfq_id',
        'data_hora_inicio_ocorrencia',
        'data_hora_final_ocorrencia',
        'cod_criticidade_id',
        'data_atendimento',
        'prioridade_tecnico',
        'atendimento_interrompido',
        'solucao_tecnica',
        'ip_solicitante',
        'unidade_servico_id'];
}
