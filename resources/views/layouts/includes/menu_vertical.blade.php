@include('layouts.dashboard')

<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start ">
                <a href="{{ route('home.index') }}" class="nav-link ">
                    <i class="icon-home"></i>
                    <span class="title">Página Inicial</span>
                </a>
            </li>
            <li class="heading">
                <h3 class="title">Opções</h3>
            </li>
            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Ocorrências</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">    
                    <li class="nav-item ">
                        <a href="{{-- route('chklist.index') --}}" class="nav-link ">
                            <span class="title">Incluir</span>
                        </a>
                    </li>        

                    <li class="nav-item ">
                        <a href="{{-- route('chklist.index') --}}" class="nav-link ">
                            <span class="title">Consultar</span>
                        </a>
                    </li>        
                </ul>                
            </li>            
            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-briefcase"></i>
                    <span class="title">Cadastros Básicos</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">     
                    <li class="nav-item ">
                        <a href="{{ route('area.index') }}" class="nav-link ">
                            <span class="title"> Área </span>
                        </a>
                    </li>
                    
                    <li class="nav-item ">
                        <a href="{{ route('divisao.index') }}" class="nav-link ">
                            <span class="title"> Divisão </span>
                        </a>
                    </li>  
                    
                    <li class="nav-item ">
                        <a href="{{ route('categoria.index') }}" class="nav-link ">
                            <span class="title"> Categoria </span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('tipodeproblema.index') }}" class="nav-link ">
                            <span class="title"> Tipo de Problema </span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fas fa-print"></i>
                    <span class="title">Relatórios</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">                                                                                   
                    <li class="nav-item ">
                        <a href="{{-- route('relatorio_chklist.index') --}}" class="nav-link ">
                            <span class="title">Relação de Ocorrências no Período</span>
                        </a>
                    </li>                        
                </ul> 
            </li>

            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-bar-chart"></i>
                    <span class="title">Gráficos</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">    
                    <li class="nav-item ">
                        <a href="{{-- route('chklist.index') --}}" class="nav-link ">
                            <span class="title">Ocorrências por Área</span>
                        </a>
                    </li>        
                    <li class="nav-item ">
                        <a href="{{-- route('chklist.index') --}}" class="nav-link ">
                            <span class="title">Problema de Sistema em Parceiros</span>
                        </a>
                    </li>                    
                </ul>
            </li>   

            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-docs"></i>
                    <span class="title">Cadastro de Extintores</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">    
                    <li class="nav-item ">
                        <a href="{{-- route('chklist.index') --}}" class="nav-link ">
                            <span class="title">Manutenção</span>
                        </a>
                    </li>        
   
                    <li class="nav-item ">
                        <a href="{{-- route('chklist.index') --}}" class="nav-link ">
                            <span class="title">Relatórios</span>
                        </a>
                    </li>        
                </ul>
            </li>

            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-layers"></i>
                    <span class="title">Manual</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">    
                    <li class="nav-item ">
                        <a href="{{ asset('doc/Manual.pdf') }}" class="nav-link ">
                            <span class="title">SAC Ocorrências</span>
                        </a>
                    </li>        

                    <li class="nav-item ">
                        <a href="{{ asset('doc/ManualExtintores.pdf') }}" class="nav-link ">
                            <span class="title">Controle de Extintores</span>
                        </a>
                    </li>        
                </ul>
            </li>            

            @canany(['view_user','view_perfil_acesso'])                
            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-shield" style="font-size: 22px"></i>
                    <span class="title">Segurança</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu ">
                    
                    @can('view_user')
                    <li class="nav-item ">
                        <a href="{{-- route('usuario.index') --}}" class="nav-link ">
                            <span class="title">Usuários</span>
                        </a>
                    </li>                        
                    @endcan

                    @can('view_user')
                    <li class="nav-item ">
                        <a href="{{-- route('usuario.aprovar.solicitacao.conta') --}}" class="nav-link ">
                            <span class="title">Usuários a Aprovar</span>
                            <span class="badge" style="background-color: #578ebe" id="usuarios_aprovar"></span>
                        </a>
                    </li>                        
                    @endcan

                    @can('view_perfil_acesso')
                    <li class="nav-item">
                        <a href="{{-- route('perfil_acesso.index') --}}" class="nav-link ">
                            <span class="title">Perfil de Acesso</span>
                            <span class="selected"></span>
                        </a>
                    </li>                        
                    @endcan
                </ul>
            </li>
            @endcanany

            <li class="nav-item start">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                    <i class="fa fa-sign-out"></i>
                    <span class="title"> Sair do Sistema</span>
                </a>
            </li>

        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->   
</div>

<div class="page-content-wrapper">
    <div class="page-content">