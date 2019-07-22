<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Educacao;
use DB;

class EducacaosController extends Controller {

    //
    public function __construct() {
        //$this->middleware('auth');
    }

    public function index(Request $request) {
        return view('educacaos.index', []);
    }

    public function create(Request $request) {
        return view('educacaos.add', [
            'model' => null]);
    }

    public function edit(Request $request, $id) {
        $educacao = Educacao::findOrFail($id);
        return view('educacaos.add', [
            'model' => $educacao]);
    }

    public function show(Request $request, $id) {
        $educacao = Educacao::findOrFail($id);
        return view('educacaos.show', [
            'model' => $educacao]);
    }

    public function grid(Request $request) {
        $len = $_GET['length'];
        $start = $_GET['start'];

        $select = "SELECT *,1,2 ";
        $presql = " FROM educacaos a ";
        if ($_GET['search']['value']) {
            $presql .= " WHERE created_at LIKE '%" . $_GET['search']['value'] . "%' ";
        }

        $presql .= "  ";

        //------------------------------------
        // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
        //------------------------------------
        $orderby = "";
        $columns = array('id', 'created_at', 'updated_at', 'idUser', 'idadeserie', 'totaldeanosparaformacao', 'basico', 'custo2', 'anos2', 'total2', 'fundamental3anos', 'filho', 'custo3', 'anos3', 'total3', 'superior4a5anos', 'custo4', 'anos4', 'total4', 'infantil', 'custo1', 'anos1', 'total1',);
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $orderby = "Order By " . $order . " " . $dir;

        $sql = $select . $presql . $orderby . " LIMIT " . $start . "," . $len;
        //------------------------------------

        $qcount = DB::select("SELECT COUNT(a.id) c" . $presql);
        //print_r($qcount);
        $count = $qcount[0]->c;

        $results = DB::select($sql);
        $ret = [];
        foreach ($results as $row) {
            $r = [];
            foreach ($row as $value) {
                $r[] = $value;
            }
            $ret[] = $r;
        }

        $ret['data'] = $ret;
        $ret['recordsTotal'] = $count;
        $ret['iTotalDisplayRecords'] = $count;

        $ret['recordsFiltered'] = count($ret);
        $ret['draw'] = $_GET['draw'];

        echo json_encode($ret);
    }

    public function update(Request $request, $contador) {
        if ($request->id[$contador] > 0) {
            $educacao = Educacao::findOrFail($request->id[$contador]);
        } else {
            $educacao = new Educacao;
        }

        $educacao->id = $request->id[$contador] ?: 0;
        $educacao->idCliente = $request->idCliente;
        $educacao->apelidofilho = $request->apelido[$contador];
        $educacao->idadeserie = $request->idadeserie[$contador];
        $educacao->totaldeanosparaformacao = $request->total_anos[$contador];
        $educacao->basicocusto = $request->basico_mensal[$contador];
        $educacao->basicoanos = $request->basico_anos[$contador];
        $educacao->basicototal = $request->basico_total[$contador];
        $educacao->fundamentalcusto = $request->fundamental_mensal[$contador];
        $educacao->fundamentalanos = $request->fundamental_anos[$contador];
        $educacao->fundamentaltotal = $request->fundamental_total[$contador];
        $educacao->superiorcusto = $request->superior_mensal[$contador];
        $educacao->superioranos = $request->superior_anos[$contador];
        $educacao->superiortotal = $request->superior_total[$contador];
        $educacao->save();
        if ($request->id[$contador] == 0) {
            $retorno["id"] = DB::getPdo()->lastInsertId();
        } else {
            $retorno["id"] = $request->id[$contador];
        }

        $retorno["apelido"] = $request->apelido[$contador] ?: "";
        $retorno["idadeserie"] = $request->idadeserie[$contador] ?: "";
        $retorno["total_anos"] = $request->total_anos[$contador] ?: "";
        $retorno["basico_mensal"] = $request->basico_mensal[$contador] ?: "";
        $retorno["basico_anos"] = $request->basico_anos[$contador] ?: "";
        $retorno["basico_total"] = $request->basico_total[$contador] ?: "";
        $retorno["fundamental_mensal"] = $request->fundamental_mensal[$contador] ?: "";
        $retorno["fundamental_anos"] = $request->fundamental_anos[$contador] ?: "";
        $retorno["fundamental_total"] = $request->fundamental_total[$contador] ?: "";
        $retorno["superior_mensal"] = $request->superior_mensal[$contador] ?: "";
        $retorno["superior_anos"] = $request->superior_anos[$contador] ?: "";
        $retorno["superior_total"] = $request->superior_total[$contador] ?: "";

        return ($retorno);
    }

    public function store(Request $request) {
        $count = count($request->idadeserie);
        for ($i = 0; $i < $count; $i++) {
            $retorno[$i] = $this->update($request, $i);
        }
        return ($retorno);
    }

    public function destroy(Request $request) {
        $retorno = Educacao::where('id', $request->id)->delete();
        return $retorno;
    }

}
