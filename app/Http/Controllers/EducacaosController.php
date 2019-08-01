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

    public function update($request) {
        if ($request["id"] > 0) {
            $educacao = Educacao::findOrFail($request["id"]);
        } else {
            $educacao = new Educacao;
        }

        $educacao->id = $request["id"] ?: 0;
        $educacao->idCliente = $request["idCliente"];
        $educacao->apelidofilho = $request["apelido"];
        $educacao->idadeserie = $request["idadeserie"];
        $educacao->custo = str_replace(",", ".", str_replace(".", "", ($request["custo"] ?: 0)));
        $educacao->anos = $request["anos"];
        $educacao->total = str_replace(",", ".", str_replace(".", "", ($request["total"] ?: 0)));
        $educacao->tipoFamiliar = $request["tipoFamiliar"];
        $educacao->tipoEducacao = $request["tipoEnsino"];

        $educacao->save();
        if ($request["id"] == "") {
            $retorno["id"] = DB::getPdo()->lastInsertId();
        } else {
            $retorno["id"] = $request["id"];
        }

        $retorno["apelido"] = $request["apelido"] ?: "";
        $retorno["idadeserie"] = $request["idadeserie"] ?: "";
        $retorno["custo"] = $request["custo"] ?: "";
        $retorno["anos"] = $request["anos"] ?: "";
        $retorno["total"] = $request["total"] ?: "";
        $retorno["tipoFamiliar"] = $request["tipoFamiliar"] ?: "";
        $retorno["tipoEnsino"] = $request["tipoEnsino"] ?: "";
        switch ($retorno["tipoEnsino"]) {
            case 1:
                $retorno["ensino"] = "Básico";
                break;
            case 2:
                $retorno["ensino"] = "Intanfil";
                break;
            case 3:
                $retorno["ensino"] = "Fundamental";
                break;
            case 4:
                $retorno["ensino"] = "Médio";
                break;
            case 5:
                $retorno["ensino"] = "Superior";
                break;
        }
        return ($retorno);
    }

    public function store(Request $request) {
        $count = count($request->tipoFamiliar);
        if ($count > 0) {
            $dados["idCliente"] = $request->idCliente;
            for ($i = 0; $i < $count; $i++) {
                $dados["tipoFamiliar"] = $request->tipoFamiliar[$i];
                $dados["apelido"] = $request->apelido[$i];
                $dados["idadeserie"] = $request->idadeserie[$i];
                for ($j = 1; $j <= 5; $j++) {
                    $dados["tipoEnsino"] = $j;
                    $dados["id"] = $request["id$j"][$i];
                    $dados["custo"] = $request["custo$j"][$i];
                    $dados["anos"] = $request["anos$j"][$i];
                    $dados["total"] = $request["total$j"][$i];
                    $retorno[$i][$j] = $this->update($dados);
                }
            }
        } else {
            $retorno = null;
        }

        return ($retorno);
    }

    public function destroy(Request $request) {
        $retorno = Educacao::where('id', $request->id)->delete();
        return $retorno;
    }

}
