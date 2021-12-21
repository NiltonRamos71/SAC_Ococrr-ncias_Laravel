<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Divisao;
use App\Categoria;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{

    private $objCategoria;

    public function __construct(Categoria $categoria)
    {
        // $this->objCategoria=new Categoria();
        $this->model = $categoria;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categoria=$this->model::select('categorias.*','divisoes.descricao as nome_divisao')
        ->join('divisoes','divisoes.id','=','categorias.divisao_id')
        ->get();
        
        // $categoria=$this->model->all()->sortBy('descricao');

        return view('categoria.index', compact('categoria'));
    }

    public function tabelaAjax()
    {       
        $categoria=$this->model::select('categorias.*','divisoes.descricao as nome_divisao')
        ->join('divisoes','divisoes.id','=','categorias.divisao_id')
        ->get();

        return view('categoria.table', compact('categoria'));
        
        // return view("view.$this->pag.table", compact('registros'));
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

    public function insertCategoria(Request $categoria)
    {
        /* if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

       if ($this->checkPermission($this->create_permission))
            return redirect()->back()->with('msg', $this->mensagem(2, 'Você não tem permissão para completar esta ação!'));
        */

        try {

            $dados = $categoria->all();

            if ($data = $this->model->create($dados)) {

                // INSERÇÃO NO BANCO
                DB::table('categorias')->insert(
                    [
                        'nome_categoria' => $data->nome_categoria,
                        'divisao_id' => $data->divisao_id,
                        'status' => isset($data->status) ? '1' : '0',
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
    public function updateCategoria(Request $categoria, $id_categoria)
    {
        /* if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        if ($this->checkPermission($this->edit_permission))
            return redirect()->back()->with('msg', $this->mensagem(2, 'Você não tem permissão para completar esta ação!'));
        */

        try {

            $dados = $categoria->all();

            if ($this->model->find($id_categoria)->update($dados)) {

                // ATUALIZAÇÃO NO BANCO SAEB
                $data = $this->model->find($id_categoria);
                DB::table('categorias')->where('id_categoria',$id_categoria)->update(
                    [
                        'nome_categoria' => $data->nome_categoria,
                        'divisao_id' => $data->divisao_id,
                        'status' => isset($data->status) ? '1' : '0',
                        'ordem' => 1,
                        'created_at' => $data->created_at,
                        'updated_at' => $data->updated_at,
                    ]
                );
                return redirect()->back(); //->with('msg', $this->mensagem(1, 'O registro foi alterado!'));
            //} else {
                //return redirect()->back()->with('msg', $this->mensagem(2, 'Não foi possível completar esta ação!'));
            }
        } catch (QueryException $e) {
            //return redirect()->back()->with('msg', $this->mensagem(3));
            return $e->getMessage();
        }
    }    

    public function statusCategoria(Request $categoria, $id_categoria)
    {
        /* if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        if ($this->checkPermission($this->edit_permission))
            return redirect()->back()->with('msg', $this->mensagem(2, 'Você não tem permissão para completar esta ação!'));
        */

        try {

            $dados = $categoria->all();

            if ($this->model->find($id_categoria)->update($dados)) {
                $data = $this->model->find($id_categoria);
                if ($data->status == '1') {
                    $st = '0';
                } else {
                    $st = '1'; 
                }
                DB::table('categorias')->where('id_categoria', $id_categoria)->update(
                    [
                        'status' =>  $st,
                        'created_at' => $data->created_at,
                        'updated_at' => $data->updated_at,
                    ]
                );
                return redirect()->back(); //->with('msg', $this->mensagem(1, 'O registro foi alterado!'));
            // } else {
            //    return redirect()->back()->with('msg', $this->mensagem(2, 'Não foi possível completar esta ação!'));
            }
        } catch (QueryException $e) {
            // return redirect()->back()->with('msg', $this->mensagem(3));
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
