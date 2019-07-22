<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Saldoemprestimo;
use DB;

class SaldoemprestimosController extends Controller {

    //
    public function __construct() {
        //$this->middleware('auth');
    }

    public function index(Request $request) {
        return view('saldoemprestimos.index', []);
    }

    public function create(Request $request) {
        return view('saldoemprestimos.add', [
            []
        ]);
    }

    public function edit(Request $request, $id) {
        $saldoemprestimo = Saldoemprestimo::findOrFail($id);
        return view('saldoemprestimos.add', [
            'model' => $saldoemprestimo]);
    }

    public function show(Request $request, $id) {
        $saldoemprestimo = Saldoemprestimo::findOrFail($id);
        return view('saldoemprestimos.show', [
            'model' => $saldoemprestimo]);
    }

    public function grid(Request $request) {
        $len = $_GET['length'];
        $start = $_GET['start'];

        $select = "SELECT *,1,2 ";
        $presql = " FROM saldoemprestimos a ";
        if ($_GET['search']['value']) {
            $presql .= " WHERE created_at LIKE '%" . $_GET['search']['value'] . "%' ";
        }

        $presql .= "  ";

        //------------------------------------
        // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
        //------------------------------------
        $orderby = "";
        $columns = array('id', 'created_at', 'updated_at', 'idcliente', 'descoberto', 'maiorperiodo',);
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
        if ($request->id > 0) {
            $saldoemprestimo = Saldoemprestimo::findOrFail($request->id);
        } else {
            $saldoemprestimo = new Saldoemprestimo;
        }

        $saldoemprestimo->id = $request->id ?: 0;
        $saldoemprestimo->idCliente = $request->idCliente;
        $saldoemprestimo->maiorperiodo = $request->emp_perido;
        $saldoemprestimo->descoberto = str_replace(",", ".", str_replace(".", "", ($request->emp_descoberto)));

        //$saldoemprestimo->user_id = $request->user()->id;
        $saldoemprestimo->save();
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

        $saldoemprestimo = Saldoemprestimo::findOrFail($id);

        $saldoemprestimo->delete();
        return "OK";
    }

}
