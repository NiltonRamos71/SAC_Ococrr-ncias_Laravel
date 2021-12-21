<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Divisao;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class DivisaoController extends Controller
{

    private $objDivisao;

    public function __construct(Divisao $divisao)
    {
        // $this->objDivisao=new Divisao();
        $this->model = $divisao;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisao=$this->model->all()->sortBy('descricao');
        return view('divisao.index', compact('divisao'));
    }

    public function tabelaAjax()
    {       
        $divisao=$this->model::select('divisoes.*','divisoes.descricao as nome_divisao')
        ->get();
        return view('divisao.table', compact('divisao'));
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

    public function insertDivisao(Request $divisao)
    {
        /* if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

       if ($this->checkPermission($this->create_permission))
            return redirect()->back()->with('msg', $this->mensagem(2, 'Você não tem permissão para completar esta ação!'));
        */

        try {

            $dados = $divisao->all();

            if ($data = $this->model->create($dados)) {

                // INSERÇÃO NO BANCO
                DB::table('divisoes')->insert(
                    [
                        'nome_divisao' => $data->nome_divisao,
                        'status' => isset($data->status) ? '1' : '0',
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
    public function updateDivisao(Request $divisao, $id_divisao)
    {
        /* if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        if ($this->checkPermission($this->edit_permission))
            return redirect()->back()->with('msg', $this->mensagem(2, 'Você não tem permissão para completar esta ação!'));
        */

        try {

            $dados = $divisao->all();

            if ($this->model->find($id_divisao)->update($dados)) {

                // ATUALIZAÇÃO NO BANCO SAEB
                $data = $this->model->find($id_divisao);
                DB::table('divisoes')->where('id_divisao',$id_divisao)->update(
                    [
                        'nome_divisao' => $data->nome_divisao,
                        'status' => isset($data->status) ? '1' : '0',
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

    public function statusDivisao(Request $divisao, $id_divisao)
    {
        /* if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        if ($this->checkPermission($this->edit_permission))
            return redirect()->back()->with('msg', $this->mensagem(2, 'Você não tem permissão para completar esta ação!'));
        */

        try {

            $dados = $divisao->all();

            if ($this->model->find($id_divisao)->update($dados)) {
                // ATUALIZAÇÃO NO BANCO SAEB
                $data = $this->model->find($id_divisao);
                if ($data->status == '0') {
                    $st = '1';
                } else {
                    $st = '0'; 
                }
                DB::table('divisoes')->where('id_divisao',$id_divisao)->update(
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
