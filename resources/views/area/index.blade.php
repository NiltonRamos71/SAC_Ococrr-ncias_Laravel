@extends('layouts.default')

@section('titulo', 'Área | SAC Ocorrências')

@section('conteudo')

<div class="page-content-wrapper">

    <div class="page-head">       

        <form role="form" id="form_area" method="post" data-toggle="validator" action="">
            @csrf
            <input type="hidden" name="_method" id="_method" value="">

            @include('area._form')

        </form>    

        <div class="row">

            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-comments"></i><b>Áreas</b> 
                        </div>
                    </div> 
                    {{-- <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div> --}}
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
                                    <th scope="col" width="6%"><b>#</b></th>
                                    <th scope="col"><b>Nome</b></th>
                                    <th scope="col"><b>Sigla</b></th>                                    
                                    <th scope="col"><b>Status</b></th>
                                    <th scope="col"><b>Ações</b></th>                                    
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($area as $areas)                        
                                    <tr>
                                    <th scope="row" width="6%">{{$areas->id}}</th>
                                        <td width="50%">{{$areas->descricao}}</td>
                                        <td><b>{{$areas->sigla}}</b></td>                                        
                                        @if ($areas->ativo == 'N')                                    
                                            <td><span class="label label-sm label-danger"> {{"Inativa"}} </span></td>
                                        @else
                                            <td><span class="label label-sm label-success"> {{"Ativa"}} </span></td>
                                        @endif
                                        <td>
                                            <a class="btn btn-sm green btn-outline tooltips" title="Editar" onclick="editar('{{ $areas->id }}', '{{ $areas->descricao }}', '{{ $areas->sigla }}', '{{ $areas->email }}', '{{ $areas->ativo }}');">
                                                <i class="fa fa-edit fa-1x fa-fw"></i>
					                        </a>
                                            
                                            <a class="btn btn-sm red btn-outline tooltips" title="Status" onclick="statusArea('{{ $areas->id }}');">
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
            url: "{{ route('area.tabela') }}",
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

        $("#id_area").val("");
        $("#nome_area").val("");
        $("#sigla_area").val("");
        $("#email").val("");
        $("#status").prop("checked", true);
        $("#myModal").modal();
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};

    }

    function editar(id_area, nome_area, sigla_area, email, status) {

        $("#id_area").val(id_area);
        $("#nome_area").val(nome_area);
        $("#sigla_area").val(sigla_area);
        $("#email").val(email);

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
            $("#form_orgao").attr("action", "{{ route('area.delete', '_codigo_') }}".replace('_codigo_', codigo));
            document.forms[0].submit();
        }
    }

    function statusArea(id) {
        var codigo = id;
        if (codigo != '') {
            $("#form_area").attr("action", "{{ route('area.status', '_codigo_') }}".replace('_codigo_', codigo));
        }

    }

    $('#salvar').click(function() {
        var codigo = $('#id_area').val();
        if (codigo == '') {
            $("#form_area").attr("action", "{{ route('area.insert') }}");
        } else {
            $('#_method').val('put');
            $("#form_area").attr("action", "{{ route('area.update', '_codigo_') }}".replace('_codigo_', codigo));
        }
    });
</script>

@endsection()