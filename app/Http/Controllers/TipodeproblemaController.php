<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Area;
use App\Categoria;
use App\Tipodeproblema;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class TipodeproblemaController extends Controller
{

    private $objTipoDeProblema;

    public function __construct(TipoDeProblema $tipodeproblema)
    {
        // $this->objTipoDeProblema=new TipoDeProblema();
        $this->model = $tipodeproblema;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tipodeproblema=$this->model::select('tiposdeproblema.*','areas.descricao as nome_area','categorias.descricao as nome_categoria')
        ->join('areas','areas.id','=','tiposdeproblema.area_id')
        ->join('categorias','categorias.id','=','tiposdeproblema.categoria_id')
        ->get();        

        // $tipodeproblema=$this->objTipoDeProblema->all()->sortBy('nome_item');
        return view('tipodeproblema.index', compact('tipodeproblema'));
    }

    public function tabelaAjax()
    {       
        $tipodeproblema=$this->model::select('tiposdeproblema.*','areas.descricao as nome_area','categorias.descricao as nome_categoria')
        ->join('areas','areas.id','=','tiposdeproblema.area_id')
        ->join('categorias','categorias.id','=','tiposdeproblema.categoria_id')
        ->get();        

        return view('tipodeproblema.table', compact('tipodeproblema'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function insertTipoDeProblema(Request $tipodeproblema)
    {
        /* if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

       if ($this->checkPermission($this->create_permission))
            return redirect()->back()->with('msg', $this->mensagem(2, 'Você não tem permissão para completar esta ação!'));
        */

        try {

            $dados = $tipodeproblema->all();

            if ($data = $this->model->create($dados)) {

                // INSERÇÃO NO BANCO
                DB::table('tipodeproblema')->insert(
                    [
                        'nome_item' => $data->nome_item,
                        'categoria_id' => $data->categoria_id,
                        'area_id' => $data->area_id,
                        'status' => isset($data->status) ? '1' : '0',
                        'nivel_tecnico' => 1,
                        'ordem' => 1,
                        'created_at' => $data->created_at,
                        'updated_at' => $data->updated_at,
                    ]
                );  
                return redirect()->back();
            }          

        } catch (QueryException $e) {
            return redirect()->back();//->with('msg', $this->mensagem(3));
            //return $e->getMessage();
        }        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateTipoDeProblema(Request $tipodeproblema, $id_item)
    {
        /* if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        if ($this->checkPermission($this->edit_permission))
            return redirect()->back()->with('msg', $this->mensagem(2, 'Você não tem permissão para completar esta ação!'));
        */

        try {

            $dados = $tipodeproblema->all();

            if ($this->model->find($id_item)->update($dados)) {
                
                $data = $this->model->find($id_item);
                DB::table('tipodeproblema')->where('id_item', $id_item)->update(
                    [
                        'nome_item' => $data->nome_item,
                        'categoria_id' => $data->categoria_id,
                        'area_id' => $data->area_id,
                        'status' => isset($data->status) ? '1' : '0',
                        'nivel_tecnico' => 1,
                        'ordem' => 1,
                        'created_at' => $data->created_at,
                        'updated_at' => $data->updated_at,
                    ]
                );
                return redirect()->back();// ->with('msg', $this->mensagem(1, 'O registro foi alterado!'));
            //} else {
            //    return redirect()->back()->with('msg', $this->mensagem(2));
            }
        } catch (QueryException $e) {
            //return redirect()->back();//->with('msg', $this->mensagem(3));
            return $e->getMessage();
        }
    }    

    public function statusTipoDeProblema(Request $area, $id_area)
    {
        /* if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        if ($this->checkPermission($this->edit_permission))
            return redirect()->back()->with('msg', $this->mensagem(2, 'Você não tem permissão para completar esta ação!'));
        */

        try {

            $dados = $tipodeproblema->all();

            if ($this->model->find($id_item)->update($dados)) {
                $data = $this->model->find($id_item);
                if ($data->status == '1') {
                    $st = '0';
                } else {
                    $st = '1'; 
                }
                DB::table('tipodeproblema')->where('id_item', $id_item)->update(
                    [
                        'status' =>  $st,
                        'created_at' => $data->created_at,
                        'updated_at' => $data->updated_at,
                    ]
                );
                return redirect()->back();// ->with('msg', $this->mensagem(1, 'O registro foi alterado!'));
            //} else {
            //    return redirect()->back()->with('msg', $this->mensagem(2));
            }
        } catch (QueryException $e) {
            //return redirect()->back();//->with('msg', $this->mensagem(3));
            return $e->getMessage();
        }
    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
