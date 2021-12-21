@extends('layouts.default')

@section('titulo', 'Categoria | SAC Ocorrências')

@section('conteudo')

<div class="page-content-wrapper">

    <div class="page-head">       

        <form role="form" id="form_categoria" method="post" data-toggle="validator" action="">
            @csrf
            <input type="hidden" name="_method" id="_method" value="">

            @include('categoria._form')

        </form>    

        <div class="row">

            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-comments"></i><b>Categorias</b> 
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
                                    <th scope="col"><b>Nome</b></th>
                                    <th scope="col"><b>Divisão</b></th>
                                    <th scope="col"><b>Status</b></th>
                                    <th scope="col"><b>Ações</b></th>                                    
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($categoria as $categorias)                        
                                    <tr>
                                        <th scope="row" width="6%">{{$categorias->id}}</th>
                                        <td width="50%">{{$categorias->descricao}}</td>
                                        <td width="20%">{{$categorias->nome_divisao}}</td>                                       
                                        @if ($categorias->status == 'N')                                    
                                            <td width="10%"><span class="label label-sm label-danger"> {{"Inativa"}} </span></td>
                                        @else
                                            <td width="10%"><span class="label label-sm label-success"> {{"Ativa"}} </span></td>
                                        @endif
                                        <td width="18%">
                                            <a class="btn btn-sm green btn-outline tooltips" title="Editar" onclick="editar('{{ $categorias->id }}', '{{ $categorias->descricao }}', '{{ $categorias->nome_divisao }}', '{{ $categorias->ativo }}');">
                                                <i class="fa fa-edit fa-1x fa-fw"></i>
					                        </a>
                                            
                                            <a class="btn btn-sm red btn-outline tooltips" title="Status" onclick="statusCategoria('{{ $categorias->id }}');">
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
    //Carrega tabela com todas as categorias
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('categoria.tabela') }}",
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

        $("#id_categoria").val("");
        $("#nome_categoria").val("");
        $("#divisao_id").val("");
        $("#status").prop("checked", true);
        $("#myModal").modal();
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};

    }

    function editar(id_categoria, nome_categoria, divisao_id, status) {

        $("#id_categoria").val(id_categoria);
        $("#nome_categoria").val(nome_categoria);
        $("#divisao_id").val(divisao_id);

        if (status == 'S') {
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
            $("#form_categoria").attr("action", "{{ route('categoria.delete', '_codigo_') }}".replace('_codigo_', codigo));
            document.forms[0].submit();
        }
    }

    function statusCategoria(id) {
        var codigo = id;
        alert(codigo);
        if (codigo != '') {
            $("#form_categoria").attr("action", "{{ route('categoria.status', '_codigo_') }}".replace('_codigo_', codigo));
        }
    }

    $('#salvar').click(function() {
        var codigo = $('#id_categoria').val();
        if (codigo == '') {
            $("#form_categoria").attr("action", "{{ route('categoria.insert') }}");
        } else {
            $('#_method').val('put');
            $("#form_categoria").attr("action", "{{ route('categoria.update', '_codigo_') }}".replace('_codigo_', codigo));
        }
    });
</script>

@endsection()