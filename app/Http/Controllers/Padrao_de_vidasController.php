<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Padrao_de_vida;
use DB;

class Padrao_de_vidasController extends Controller {

    //
    public function __construct() {
        //$this->middleware('auth');
    }

    public function index(Request $request) {
        return view('padrao_de_vidas.index', []);
    }

    public function create(Request $request) {
        return view('padrao_de_vidas.add', [
            'model' => null]);
    }

    public function edit(Request $request, $id) {
        $padrao_de_vida = Padrao_de_vida::findOrFail($id);
        return view('padrao_de_vidas.add', [
            'model' => $padrao_de_vida]);
    }

    public function show(Request $request, $id) {
        $padrao_de_vida = Padrao_de_vida::findOrFail($id);
        return view('padrao_de_vidas.show', [
            'model' => $padrao_de_vida]);
    }

    public function grid(Request $request) {
        $len = $_GET['length'];
        $start = $_GET['start'];

        $select = "SELECT *,1,2 ";
        $presql = " FROM padrao_de_vidas a ";
        if ($_GET['search']['value']) {
            $presql .= " WHERE created_at LIKE '%" . $_GET['search']['value'] . "%' ";
        }

        $presql .= "  ";

        //------------------------------------
        // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
        //------------------------------------
        $orderby = "";
        $columns = array('id', 'created_at', 'updated_at', 'moradia', 'servicos', 'transporte', 'saude', 'vestuario', 'seguroDeVidaPrevidencia', 'lazer', 'alimentacao', 'impostos', 'extrasoutros',);
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
        $padrao_de_vida = null;
        if ($request->id > 0) {
            $padrao_de_vida = Padrao_de_vida::findOrFail($request->id);
        } else {
            $padrao_de_vida = new Padrao_de_vida;
        }

        $padrao_de_vida->id = $request->id ?: 0;
        if (isset($request->pv_gerais) == true) {
            $padrao_de_vida->despezasgerais = str_replace(",", ".", str_replace(".", "", ($request->pv_gerais)));
            $padrao_de_vida->moradia = 0;
            $padrao_de_vida->servicos = 0;
            $padrao_de_vida->transporte = 0;
            $padrao_de_vida->saude = 0;
            $padrao_de_vida->vestuario = 0;
            $padrao_de_vida->seguroDeVidaPrevidencia = 0;
            $padrao_de_vida->lazer = 0;
            $padrao_de_vida->impostos = 0;
            $padrao_de_vida->extrasoutros = 0;
        } else {
            $padrao_de_vida->despezasgerais = 0;
            $padrao_de_vida->moradia = str_replace(",", ".", str_replace(".", "", ($request->pv_moradia)));
            $padrao_de_vida->servicos = str_replace(",", ".", str_replace(".", "", ($request->pv_servicos)));
            $padrao_de_vida->transporte = str_replace(",", ".", str_replace(".", "", ($request->pv_transporte)));
            $padrao_de_vida->saude = str_replace(",", ".", str_replace(".", "", ($request->pv_saude)));
            $padrao_de_vida->vestuario = str_replace(",", ".", str_replace(".", "", ($request->pv_vestuario)));
            $padrao_de_vida->seguroDeVidaPrevidencia = str_replace(",", ".", str_replace(".", "", ($request->pv_seguro_vida)));
            $padrao_de_vida->lazer = str_replace(",", ".", str_replace(".", "", ($request->pv_lazer)));
            $padrao_de_vida->impostos = str_replace(",", ".", str_replace(".", "", ($request->pv_impostos)));
            $padrao_de_vida->extrasoutros = str_replace(",", ".", str_replace(".", "", ($request->pv_extras)));
        }
        $padrao_de_vida->idCliente = $request->idCliente;
        $retorno = $padrao_de_vida->save();
        if ($request->id == 0) {
            $retorno = DB::getPdo()->lastInsertId();
        } else {
            $retorno = $request->id;
        }
        return json_encode($retorno);
    }

    public function store(Request $request) {
        return $this->update($request);
    }

    public function destroy(Request $request, $id) {

        $padrao_de_vida = Padrao_de_vida::findOrFail($id);

        $padrao_de_vida->delete();
        return "OK";
    }

}
