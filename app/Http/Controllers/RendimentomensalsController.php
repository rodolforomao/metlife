<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Rendimentomensal;
use DB;

class RendimentomensalsController extends Controller {

    //
    public function __construct() {
        //$this->middleware('auth');
    }

    public function index(Request $request) {
        return view('rendimentomensals.index', []);
    }

    public function create(Request $request) {
        return view('rendimentomensals.add', [
            []
        ]);
    }

    public function edit(Request $request, $id) {
        $rendimentomensal = Rendimentomensal::findOrFail($id);
        return view('rendimentomensals.add', [
            'model' => $rendimentomensal]);
    }

    public function show(Request $request, $id) {
        $rendimentomensal = Rendimentomensal::findOrFail($id);
        return view('rendimentomensals.show', [
            'model' => $rendimentomensal]);
    }

    public function grid(Request $request) {
        $len = $_GET['length'];
        $start = $_GET['start'];

        $select = "SELECT *,1,2 ";
        $presql = " FROM rendimentomensals a ";
        if ($_GET['search']['value']) {
            $presql .= " WHERE created_at LIKE '%" . $_GET['search']['value'] . "%' ";
        }

        $presql .= "  ";

        //------------------------------------
        // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
        //------------------------------------
        $orderby = "";
        $columns = array('id', 'created_at', 'updated_at', 'idUser', 'nomecompleto', 'outrasrendas', 'declaracaodeir',);
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

    public function update(Request $request) {
        $request->id_rendimento_principal = str_replace('"', "", $request->id_rendimento_principal);
        if ($request->id_rendimento_principal > 0) {
            $rendimentomensal = Rendimentomensal::findOrFail($request->id_rendimento_principal);
        } else {
            $rendimentomensal = new Rendimentomensal;
        }

        $rendimentomensal->id = $request->id_rendimento_principal ?: 0;
        $rendimentomensal->idCliente = $request->idCliente;
        $rendimentomensal->tipoFamiliar = "Principal";
        $rendimentomensal->remendimentosmensal = $request->ren_redimento_mensal_principal;
        $rendimentomensal->remendimentosmensal = str_replace(",", ".", str_replace(".", "", ($request->ren_redimento_mensal_principal)));
        $rendimentomensal->outrasrendas = str_replace(",", ".", str_replace(".", "", ($request->ren_outras_principal)));
        $rendimentomensal->declaracaodeir = $request->declaracaodeir_principal;
        $rendimentomensal->save();

        if ($request->id_rendimento_principal == 0) {
            $retorno = DB::getPdo()->lastInsertId();
        } else {
            $retorno = $request->id_rendimento_principal;
        }
        return ($retorno);
    }

    public function updateFamiliar(Request $request, $contador) {
        if ($request->id[$contador] > 0) {
            $rendimentomensal = Rendimentomensal::findOrFail($request->id[$contador]);
        } else {
            $rendimentomensal = new Rendimentomensal;
        }
        $rendimentomensal->id = $request->id[$contador];
        $rendimentomensal->idCliente = $request->idCliente;
        $rendimentomensal->tipoFamiliar = $request->tipoFamiliar[$contador];
        $rendimentomensal->remendimentosmensal = str_replace(",", ".", str_replace(".", "", ($request->ren_redimento_mensal[$contador])));
        $rendimentomensal->outrasrendas = str_replace(",", ".", str_replace(".", "", ($request->ren_outras[$contador])));
        $rendimentomensal->declaracaodeir = $request->declaracaodeir[$contador];
        $rendimentomensal->save();
        if ($request->iddeclaracaodeir == 0) {
            $retorno["id"] = DB::getPdo()->lastInsertId();
        } else {
            $retorno["id"] = $request->id;
        }
        $retorno["tipoFamiliar"] = $request->tipoFamiliar[$contador];
        $retorno["remendimentosmensal"] = $request->ren_redimento_mensal[$contador];
        $retorno["outrasrendas"] = $request->ren_outras[$contador];
        $retorno["declaracaodeir"] = $request->declaracaodeir[$contador];

        return ($retorno);
    }

    public function store(Request $request) {
        $retorno["principal"] = $this->update($request);
        if (isset($request->tipoFamiliar)) {
            $count = count($request->tipoFamiliar);
            for ($i = 0; $i < $count; $i++) {
                $retorno["familiares"][$i] = $this->updateFamiliar($request, $i);
            }
        }
        return $retorno;
    }

    public function destroy(Request $request) {
        $retorno = Rendimentomensal::where('id', $request->id)->delete();
        return $retorno;
    }

}
