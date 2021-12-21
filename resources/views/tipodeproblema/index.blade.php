@extends('layouts.default')

@section('titulo', 'Tipo de Problema | SAC Ocorrências')

@section('conteudo')

<div class="page-content-wrapper">

    <div class="page-head">       

        <form role="form" id="form_tipodeproblema" method="post" data-toggle="validator" action="">
            @csrf
            <input type="hidden" name="_method" id="_method" value="">

            @include('tipodeproblema._form')

        </form>    

        <div class="row">

            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-comments"></i><b>Tipos de Problema</b> 
                        </div>
                    </div> 
                    <div class="portlet-body">

                        <div class="btn-group">
                            <button id="sample_editable_1_new" class="btn blue" onclick="novo()"> Cadastrar
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>

                        <div class="table-scrollable">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>                                    
                                    <th scope="col"><b>#</b></th>
                                    <th scope="col"><b>Descrição</b></th>
                                    <th scope="col"><b>Categoria</b></th>
                                    <th scope="col"><b>Área</b></th>                                    
                                    <th scope="col"><b>Status</b></th>
                                    <th scope="col"><b>Ações</b></th>                                    
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tipodeproblema as $tiposdeproblema)                        
                                        <tr>
                                        <th scope="row" width="6%">{{$tiposdeproblema->id}}</th>
                                            <td width="50%">{{$tiposdeproblema->descricao}}</td>
                                            <td width="12%">{{$tiposdeproblema->nome_categoria}}</td>
                                            <td width="12%">{{$tiposdeproblema->nome_area}}</td>                                          
                                            @if ($tiposdeproblema->ativo == 'N')                                    
                                                <td width="10%"><span class="label label-sm label-danger"> {{"Inativa"}} </span></td>
                                            @else
                                                <td width="10%"><span class="label label-sm label-success"> {{"Ativa"}} </span></td>
                                            @endif
                                            <td width="15%">
                                                <a class="btn btn-sm green btn-outline tooltips" title="Editar" onclick="editar('{{ $tiposdeproblema->id }}', '{{ $tiposdeproblema->descricao }}', '{{ $tiposdeproblema->categoria_id }}', '{{ $tiposdeproblema->area_id }}', '{{ $tiposdeproblema->ativo }}');">
                                                    <i class="fa fa-edit fa-1x fa-fw"></i>
                                                </a>                                                
                                                <a class="btn btn-sm red btn-outline tooltips" title="Status" onclick="statusTipoDeProblema('{{ $tiposdeproblema->id }}');">
                                                    <i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>
                                                </a>                                           
                                            </td>
                                        </tr>
                                    @endforeach                     
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END SAMPLE TABLE PORTLET-->
            </div>
        </div> 

    </div>

</div>

<script type="text/javascript">
    //Carrega tabela com todas as secretariass
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('tipodeproblema.tabela') }}",
            type: 'GET',
            data: {},
            beforeSend: function() {
                $('#tabela').html("<div class='row'><div class='col-md-12 text-center'><div class='col-md-12'><img src='{{asset('imagens/loading_circular.gif')}}' style='width: 30px'></div>Carregando</div></div>");
                //$('#tabela').html("<div class='text-center'>Carregando...</div>");
            },
            success: function(data) {
                $('#tabela').html(data);
            }
        });
    });

    function novo() {

        $("#id_item").val("");
        $("#nome_item").val("");
        $("#categoria_id").val("");
        $("#area_id").val("");        
        $("#status").prop("checked", true);
        $("#myModal").modal();
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};

    }

    function editar(id_item, nome_item, categoria_id, area_id, status) {

        $("#id_item").val(id_item);
        $("#nome_item").val(nome_item);
        $("#categoria_id").val(categoria_id);
        $("#area_id").val(area_id);
        if (status == '1') {
            $("#status").prop("checked", true);
        } else {
            $("#status").prop("checked", false);
        }
        $("#myModal").modal();
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};

    }

    function excluir(o) {
        var codigo = o.data('id');
        if (codigo != '') {
            $("#form_tipodeproblema").attr("action", "{{ route('tipodeproblema.delete', '_codigo_') }}".replace('_codigo_', codigo));
            document.forms[0].submit();
        }
    }

    function statusTipoDeProblema(id) {
        var codigo = id;
        if (codigo != '') {
            $("#form_tipodeproblema").attr("action", "{{ route('tipodeproblema.status', '_codigo_') }}".replace('_codigo_', codigo));
        }

    }

    $('#salvar').click(function() {
        var codigo = $('#id_divisao').val();
        if (codigo == '') {
            $("#form_tipodeproblema").attr("action", "{{ route('tipodeproblema.insert') }}");
        } else {
            $('#_method').val('put');
            $("#form_tipodeproblema").attr("action", "{{ route('tipodeproblema.update', '_codigo_') }}".replace('_codigo_', codigo));
        }
    });
</script>

@endsection()