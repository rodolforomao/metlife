<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Inssprevidenciacliente;
use DB;

class InssprevidenciaclientesController extends Controller {

    //
    public function __construct() {
        //$this->middleware('auth');
    }

    public function index(Request $request) {
        return view('inssprevidenciaclientes.index', []);
    }

    public function create(Request $request) {
        return view('inssprevidenciaclientes.add', [
            []
        ]);
    }

    public function edit(Request $request, $id) {
        $inssprevidenciacliente = Inssprevidenciacliente::findOrFail($id);
        return view('inssprevidenciaclientes.add', [
            'model' => $inssprevidenciacliente]);
    }

    public function show(Request $request, $id) {
        $inssprevidenciacliente = Inssprevidenciacliente::findOrFail($id);
        return view('inssprevidenciaclientes.show', [
            'model' => $inssprevidenciacliente]);
    }

    public function grid(Request $request) {
        $len = $_GET['length'];
        $start = $_GET['start'];

        $select = "SELECT *,1,2 ";
        $presql = " FROM inssprevidenciaclientes a ";
        if ($_GET['search']['value']) {
            $presql .= " WHERE created_at LIKE '%" . $_GET['search']['value'] . "%' ";
        }

        $presql .= "  ";

        //------------------------------------
        // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
        //------------------------------------
        $orderby = "";
        $columns = array('id', 'created_at', 'updated_at', 'idCliente', 'tipoFamiliar', 'previdencia', 'pgblvgbl', 'saldoacumulado', 'contribuicaoanual',);
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
        $inssprevidenciacliente = null;
        if ($request->id[$contador] > 0) {
            $inssprevidenciacliente = Inssprevidenciacliente::findOrFail($request->id[$contador]);
        } else {
            $inssprevidenciacliente = new Inssprevidenciacliente;
        }

        $inssprevidenciacliente->id = $request->id[$contador] ?: 0;
        $inssprevidenciacliente->idCliente = $request->idCliente;
        $inssprevidenciacliente->idTipoFamiliar = $request->tipoFamiliar;
        $inssprevidenciacliente->previdencia = $request->previdencia[$contador];
        $inssprevidenciacliente->pgblvgbl = $request->pglb_vgbl[$contador];
        $inssprevidenciacliente->saldoacumulado = str_replace(",", ".", str_replace(".", "", ($request->saldo_acumulado[$contador])));
        $inssprevidenciacliente->rendaestimada = str_replace(",", ".", str_replace(".", "", ($request->renda_estimada[$contador])));
        $inssprevidenciacliente->contribuicaoanual = $request->contribuicao_anual[$contador];
        $inssprevidenciacliente->save();

        if ($request->id[$contador] == 0) {
            $retorno["id"] = DB::getPdo()->lastInsertId();
        } else {
            $retorno["id"] = $request->id[$contador];
        }

        $retorno["previdencia"] = $request->previdencia[$contador] ?: "";
        $retorno["renda_estimada"] = $request->renda_estimada[$contador] ?: "";
        $retorno["pglb_vgbl"] = $request->pglb_vgbl[$contador] ?: "";
        $retorno["saldo_acumulado"] = $request->saldo_acumulado[$contador] ?: "";
        $retorno["contribuicao_anual"] = $request->contribuicao_anual[$contador] ?: "";
        return ($retorno);
    }

    public function store(Request $request) {
        $count = count($request->previdencia);
        for ($i = 0; $i < $count; $i++) {
            $retorno[$i] = $this->update($request, $i);
        }
        return ($retorno);
    }

    public function destroy(Request $request) {
        $retorno = Inssprevidenciacliente::where('id', $request->id)->delete();

        return $retorno;
    }

}
