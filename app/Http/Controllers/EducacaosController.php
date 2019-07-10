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

    public function update(Request $request, int $id) {
        //
        /* $this->validate($request, [
          'name' => 'required|max:255',
          ]); */
        $educacao = null;
        if ($request->id > 0) {
            $educacao = Educacao::findOrFail($request->id);
        } else {
            $educacao = new Educacao;
        }

        $educacao->id = $request->id ?: 0;
        $educacao->idCliente = 4;
        $educacao->idadeserie = $request->idadeserie[$id];
        $educacao->totaldeanosparaformacao = $request->total_anos[$id];
        //$educacao->basico = $request->basico_mensal;
        $educacao->custo2 = $request->basico_mensal[$id];
        $educacao->anos2 = $request->basico_anos[$id];
        $educacao->total2 = $request->basico_total[$id];
        //$educacao->fundamental3anos = $request->fundamental3anos;
        //$educacao->filho = $request->filho;
        $educacao->custo3 = $request->fundamental_mensal[$id];
        $educacao->anos3 = $request->fundamental_anos[$id];
        $educacao->total3 = $request->fundamental_total[$id];
        //$educacao->superior4a5anos = $request->superior4a5anos;
        $educacao->custo4 = $request->superior_mensal[$id];
        $educacao->anos4 = $request->superior_anos[$id];
        $educacao->total4 = $request->superior_total[$id];
//        $educacao->infantil = $request->infantil;
//        $educacao->custo1 = $request->custo1;
//        $educacao->anos1 = $request->anos1;
//        $educacao->total1 = $request->total1;

        //$educacao->user_id = $request->user()->id;
//        $educacao->save();
        return $educacao->save();
    }

    public function store(Request $request) {
        $count = count($request->idadeserie);
        for ($i = 0; $i < $count; $i++) {
            $this->update($request, $i);
        }
        return ($request);
//        return $this->update($request);
    }

    public function destroy(Request $request, $id) {

        $educacao = Educacao::findOrFail($id);

        $educacao->delete();
        return "OK";
    }

}
