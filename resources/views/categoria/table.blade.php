
<div class="row">
    <div class="col-md-9">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-comments"></i>Categorias 
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                    <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                    <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                </div>
            </div> 
            <div class="portlet-body">
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
                                    @if ($categorias->ativo == 'N')                                    
                                        <td width="10%"><span class="label label-sm label-danger"> {{"Inativa"}} </span></td>
                                    @else
                                        <td width="10%"><span class="label label-sm label-success"> {{"Ativa"}} </span></td>
                                    @endif
                                    <td width="18%">
                                        <a class="btn btn-sm green btn-outline tooltips" title="Editar" onclick="editar('{{ $categorias->id }}', '{{ $categorias->descricao }}', '{{ $categorias->divisao_id }}', '{{ $categorias->ativo }}');">
                                            <i class="fa fa-edit fa-1x fa-fw"></i>
                                        </a>
                                        
                                        <a class="btn btn-sm red btn-outline tooltips" title="Status" onclick="statusDivisao('{{ $categorias->id }}');">
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

<script src="{{asset('metronic/modelo/tabelaAjax.js')}}" type="text/javascript"></script>