<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Insssegurocliente;
use DB;

class InssseguroclientesController extends Controller {

    //
    public function __construct() {
        //$this->middleware('auth');
    }

    public function index(Request $request) {
        return view('inssseguroclientes.index', []);
    }

    public function create(Request $request) {
        return view('inssseguroclientes.add', [
            []
        ]);
    }

    public function edit(Request $request, $id) {
        $insssegurocliente = Insssegurocliente::findOrFail($id);
        return view('inssseguroclientes.add', [
            'model' => $insssegurocliente]);
    }

    public function show(Request $request, $id) {
        $insssegurocliente = Insssegurocliente::findOrFail($id);
        return view('inssseguroclientes.show', [
            'model' => $insssegurocliente]);
    }

    public function grid(Request $request) {
        $len = $_GET['length'];
        $start = $_GET['start'];

        $select = "SELECT *,1,2 ";
        $presql = " FROM inssseguroclientes a ";
        if ($_GET['search']['value']) {
            $presql .= " WHERE created_at LIKE '%" . $_GET['search']['value'] . "%' ";
        }

        $presql .= "  ";

        //------------------------------------
        // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
        //------------------------------------
        $orderby = "";
        $columns = array('id', 'created_at', 'updated_at', 'idCliente', 'tipoFamiliar', 'segurodevida', 'capitalsegurado', 'premiomensal',);
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
            $insssegurocliente = Insssegurocliente::findOrFail($request->id[$contador]);
        } else {
            $insssegurocliente = new Insssegurocliente;
        }

        $insssegurocliente->id = $request->id[$contador] ?: 0;
        $insssegurocliente->idDadosFamiliares = $request->idCliente;
//        $insssegurocliente->tipoFamiliar = $request->tipoFamiliar;
        $insssegurocliente->segurodevida = $request->seguro_vida[$contador];
        $insssegurocliente->capitalsegurado = $request->capital_segurado[$contador];
        $insssegurocliente->premiomensal = $request->premio_mensal[$contador];

        $insssegurocliente->save();

        if ($request->id[$contador] == 0) {
            $retorno["id"] = DB::getPdo()->lastInsertId();
        } else {
            $retorno["id"] = $request->id[$contador];
        }

        $retorno["seguro_vida"] = $request->seguro_vida[$contador] ?: "";
        $retorno["capital_segurado"] = $request->capital_segurado[$contador] ?: "";
        $retorno["premio_mensal"] = $request->premio_mensal[$contador] ?: "";
        return ($retorno);
    }

    public function store(Request $request) {
        $count = count($request->seguro_vida);
        for ($i = 0; $i < $count; $i++) {
            $retorno[$i] = $this->update($request, $i);
        }
        return ($retorno);
    }

    public function destroy(Request $request) {
        $retorno = Insssegurocliente::where('id', $request->id)->delete();
        return $retorno;
    }

}
