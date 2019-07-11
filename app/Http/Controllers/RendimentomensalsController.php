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
        //
        /* $this->validate($request, [
          'name' => 'required|max:255',
          ]); */
        $rendimentomensal = null;
        if ($request->id > 0) {
            $rendimentomensal = Rendimentomensal::findOrFail($request->id);
        } else {
            $rendimentomensal = new Rendimentomensal;
        }

        $rendimentomensal->idCliente = 4;
        $rendimentomensal->tipoFamiliar = "Principal";
        $rendimentomensal->remendimentosmensal = $request->ren_redimento_mensal_principal;
        $rendimentomensal->outrasrendas = $request->ren_outras_principal;
        $rendimentomensal->declaracaodeir = $request->declaracaodeir;
        $retorno = $rendimentomensal->save();
        return json_encode($retorno);
    }

    public function updateConjugue(Request $request) {
        //
        /* $this->validate($request, [
          'name' => 'required|max:255',
          ]); */
        $rendimentomensal = null;
        if ($request->id > 0) {
            $rendimentomensal = Rendimentomensal::findOrFail($request->id);
        } else {
            $rendimentomensal = new Rendimentomensal;
        }

        $rendimentomensal->idCliente = 4;
        $rendimentomensal->tipoFamiliar = "Conjugue";
        $rendimentomensal->remendimentosmensal = $request->ren_redimento_mensal_conjugue;
        $rendimentomensal->outrasrendas = $request->ren_outras_conjugue;
        $rendimentomensal->declaracaodeir = $request->declaracaodeir_conjugue;

        $retorno = $rendimentomensal->save();
        return json_encode($retorno);
    }

    public function store(Request $request) {
        $retorno = $this->update($request);
        if (!empty($request->ren_redimento_mensal_conjugue)) {
            $retorno = $this->updateConjugue($request);
        }
        return $retorno;
    }

    public function destroy(Request $request, $id) {

        $rendimentomensal = Rendimentomensal::findOrFail($id);

        $rendimentomensal->delete();
        return "OK";
    }

}
