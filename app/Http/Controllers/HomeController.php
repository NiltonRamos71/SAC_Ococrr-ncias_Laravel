<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Area;
use App\Ocorrencia;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    private $objUser;
    private $objArea;
    private $objQtde_TotOcor;
    private $objQtde_TotOcorMAnt;
    private $objQtde_TotOcorMAntFin;
    private $objQtde_TotOcorMAtu;
    
    public function __construct()
    {
        $this->objUser=new User();
        $this->objArea=new Area();
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=$this->objUser->all();
        $area=$this->objArea->all();

        //$count = DB::table('tablename')->count(DB::raw('DISTINCT name'));

        //verificando a qtde ocorrências no banco
        $objQtde_TotOcor = 0; //DB::table('ocorrencias')->count(DB::raw('DISTINCT id_ocorrencia'));

        //verificando a qtde ocorrências no banco do mês anterior
        $objQtde_TotOcorMAnt = 1; //DB::table('ocorrencias')->where('EXTRACT(month FROM DATA_OCORRENCIA) = (EXTRACT(month FROM sysdate) - 1 and EXTRACT(year FROM DATA_OCORRENCIA) = EXTRACT(year FROM sysdate)')->count(DB::raw('DISTINCT id_ocorrencia'));

        //verificando a qtde ocorrências no banco do mês anterior que foram finalizadas
        $objQtde_TotOcorMAntFin = 2; //DB::table('ocorrencias')->where("EXTRACT(month FROM DATA_OCORRENCIA) = (EXTRACT(month FROM sysdate) - 1) and EXTRACT(year FROM DATA_OCORRENCIA) = EXTRACT(year FROM sysdate) and COD_STATUS = '4'")->count(DB::raw('DISTINCT id_ocorrencia'));

        //verificando a qtde ocorrências no banco do mês atual
        $objQtde_TotOcorMAtu = 3; //DB::table('ocorrencias')->where('EXTRACT(month FROM DATA_OCORRENCIA) = EXTRACT(month FROM sysdate) AND EXTRACT(year FROM DATA_OCORRENCIA) = EXTRACT(year FROM sysdate)')->count(DB::raw('DISTINCT id_ocorrencia'));

        
        // //verificando a qtde ocorrências no banco
        // $sql = "SELECT count(distinct cod_ocorrencia) as QTDE from ocorrencias";
        // $qtde_totocor = $ocorrencias['QTDE'];

        // //verificando a qtde ocorrências no banco do mês anterior
        // $sql = "SELECT count(distinct cod_ocorrencia) as QTDE from ocorrencias o WHERE EXTRACT(month FROM o.DATA_OCORRENCIA) = (EXTRACT(month FROM sysdate) - 1) AND EXTRACT(year FROM o.DATA_OCORRENCIA) = EXTRACT(year FROM sysdate)";
        // $qtde_totocorMAnt = $ocorrencias['QTDE'];

        // //verificando a qtde ocorrências no banco do mês anterior que foram finalizadas
        // $sql = "SELECT count(distinct cod_ocorrencia) as QTDE from ocorrencias o WHERE EXTRACT(month FROM o.DATA_OCORRENCIA) = (EXTRACT(month FROM sysdate) - 1) AND EXTRACT(year FROM o.DATA_OCORRENCIA) = EXTRACT(year FROM sysdate) AND o.COD_STATUS = '4'";
        // $qtde_totocorMAntFin = $ocorrencias['QTDE'];
    
        // //verificando a qtde ocorrências no banco do mês atual
        // $sql = "SELECT count(distinct cod_ocorrencia) as QTDE from ocorrencias o WHERE EXTRACT(month FROM o.DATA_OCORRENCIA) = EXTRACT(month FROM sysdate) AND EXTRACT(year FROM o.DATA_OCORRENCIA) = EXTRACT(year FROM sysdate)";
        // $qtde_totocorMAtu = $ocorrencias['QTDE'];

        //return view('home', compact('user', 'Qtde_TotOcor', 'Qtde_TotOcorMAnt', 'Qtde_TotOcorMAntFin', 'Qtde_TotOcorMAtu'));
        return view('default', compact('objQtde_TotOcor','objQtde_TotOcorMAnt', 'objQtde_TotOcorMAntFin', 'objQtde_TotOcorMAtu')); 
    }
}
