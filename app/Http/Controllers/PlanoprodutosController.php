<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Planoproduto;
use DB;

class PlanoprodutosController extends Controller {

    //
    public function __construct() {
        //$this->middleware('auth');
    }

    public function index(Request $request) {
        return view('planoprodutos.index', []);
    }

    public function create(Request $request) {
        return view('planoprodutos.add', [
            []
        ]);
    }

    public function edit(Request $request, $id) {
        $planoproduto = Planoproduto::findOrFail($id);
        return view('planoprodutos.add', [
            'model' => $planoproduto]);
    }

    public function show(Request $request, $id) {
        $planoproduto = Planoproduto::findOrFail($id);
        return view('planoprodutos.show', [
            'model' => $planoproduto]);
    }

    public function grid(Request $request) {
        $len = $_GET['length'];
        $start = $_GET['start'];

        $select = "SELECT *,1,2 ";
        $presql = " FROM planoprodutos a ";
        if ($_GET['search']['value']) {
            $presql .= " WHERE created_at LIKE '%" . $_GET['search']['value'] . "%' ";
        }

        $presql .= "  ";

        //------------------------------------
        // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
        //------------------------------------
        $orderby = "";
        $columns = array('id', 'created_at', 'updated_at', 'idCliente', 'idproduto', 'vigencia', 'prazo', 'capital', 'segurado', 'valor',);
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
            $planoproduto = Planoproduto::findOrFail($request->id[$contador]);
        } else {
            $planoproduto = new Planoproduto;
        }

        $planoproduto->id = $request->id[$contador] ?: 0;
        $planoproduto->idCliente = $request->idCliente;
        $planoproduto->idproduto = $request->id_produto[$contador];
        $planoproduto->tipoFamiliar = $request->tipoFamiliar;
        $planoproduto->vigencia = date('Y-m-d', strtotime(str_replace("/", "-", ($request->vigencia[$contador]))));
        $planoproduto->prazo = $request->prazo[$contador];
        $planoproduto->capital = str_replace(",", ".", str_replace(".", "", ($request->capital_segurado[$contador])));
        $planoproduto->valor = str_replace(",", ".", str_replace(".", "", ($request->valor[$contador])));

        if (!empty($request->vigencia[$contador])) {
            $planoproduto->save();
            $retorno["id_produto"] = $request->id_produto[$contador] ?: "";

            if ($request->id[$contador] == 0) {
                $retorno["id"] = DB::getPdo()->lastInsertId();
            } else {
                $retorno["id"] = $request->id[$contador];
            }
        } else {
            $retorno["retorno"] = false;
        }

        return ($retorno);
    }

    public function store(Request $request) {
        $count = count($request->prazo);
        $retorno = false;
        for ($i = 0; $i < $count; $i++) {
            $retorno[$i] = $this->update($request, $i);
        }

        return ($retorno);
    }

    public function destroy(Request $request, $id) {

        $planoproduto = Planoproduto::findOrFail($id);

        $planoproduto->delete();
        return "OK";
    }

}
