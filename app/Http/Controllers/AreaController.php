<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Area;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{

    private $objArea;

    public function __construct(Area $area)
    {
        // $this->objArea=new Area();
        $this->model = $area;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $area=$this->model->all()->sortBy('sigla_area');
        return view('area.index', compact('area'));
    }

    public function tabelaAjax()
    {       
        //
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

    public function insertArea(Request $area)
    {
        /* if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

       if ($this->checkPermission($this->create_permission))
            return redirect()->back()->with('msg', $this->mensagem(2, 'Você não tem permissão para completar esta ação!'));
        */

        try {

            $dados = $area->all();

            if ($data = $this->model->create($dados)) {

                // INSERÇÃO NO BANCO
                DB::table('areas')->insert(
                    [
                        'nome_area' => $data->nome_area,
                        'sigla_area' => $data->sigla_area,
                        'email' => $data->email,
                        'status' => isset($data->status) ? 'S' : 'N',
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
    public function updateArea(Request $area, $id_area)
    {
        /* if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        if ($this->checkPermission($this->edit_permission))
            return redirect()->back()->with('msg', $this->mensagem(2, 'Você não tem permissão para completar esta ação!'));
        */

        try {

            $dados = $area->all();

            if ($this->model->find($id_area)->update($dados)) {

                // ATUALIZAÇÃO NO BANCO SAEB
                $data = $this->model->find($id_area);
                DB::table('areas')->where('id_area',$id_area)->update(
                    [
                        'nome_area' => $data->nome_area,
                        'sigla_area' => $data->sigla_area,
                        'email' => $data->email,
                        'status' => isset($data->status) ? 'S' : 'N',
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

    public function statusArea(Request $area, $id_area)
    {
        /* if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        if ($this->checkPermission($this->edit_permission))
            return redirect()->back()->with('msg', $this->mensagem(2, 'Você não tem permissão para completar esta ação!'));
        */

        try {

            $dados = $area->all();

            if ($this->model->find($id_area)->update($dados)) {
                $data = $this->model->find($id_area);
                if ($data->status == 'S') {
                    $st = 'N';
                } else {
                    $st = 'S'; 
                }
                DB::table('areas')->where('id_area', $id_area)->update(
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
