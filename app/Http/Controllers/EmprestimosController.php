<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Emprestimo;
use DB;

class EmprestimosController extends Controller {

    //
    public function __construct() {
        //$this->middleware('auth');
    }

    public function index(Request $request) {
        return view('emprestimos.index', []);
    }

    public function create(Request $request) {
        return view('emprestimos.add', [
            'model' => null]);
    }

    public function edit(Request $request, $id) {
        $emprestimo = Emprestimo::findOrFail($id);
        return view('emprestimos.add', [
            'model' => $emprestimo]);
    }

    public function show(Request $request, $id) {
        $emprestimo = Emprestimo::findOrFail($id);
        return view('emprestimos.show', [
            'model' => $emprestimo]);
    }

    public function grid(Request $request) {
        $len = $_GET['length'];
        $start = $_GET['start'];

        $select = "SELECT *,1,2 ";
        $presql = " FROM emprestimos a ";
        if ($_GET['search']['value']) {
            $presql .= " WHERE created_at LIKE '%" . $_GET['search']['value'] . "%' ";
        }

        $presql .= "  ";

        //------------------------------------
        // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
        //------------------------------------
        $orderby = "";
        $columns = array('id', 'created_at', 'updated_at', 'idUser', 'maiorperiodoparaemprestimofinananos', 'emprestimos', 'valor3', 'descobertoemprestimofinanciamento', 'valor1', 'n1', 'valor2', 'n2',);
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
        //
        /* $this->validate($request, [
          'name' => 'required|max:255',
          ]); */
        $emprestimo = null;
        if ($request->id[$contador] > 0) {
            $emprestimo = Emprestimo::findOrFail($request->id[$contador]);
        } else {
            $emprestimo = new Emprestimo;
        }

        $emprestimo->id = $request->id[$contador] ?: 0;
        $emprestimo->idCliente = $request->idCliente;
        $emprestimo->saldodevedor = str_replace(",", ".", str_replace(".", "", ($request->saldo_devedor[$contador])));
        $emprestimo->possuiseguro = $request->possui_seguro[$contador];
        $emprestimo->parcelamensal = str_replace(",", ".", str_replace(".", "", ($request->parcela_mensal[$contador])));
        $emprestimo->prazoresidual = $request->prazo_residual[$contador];
        $emprestimo->saldodevedordescoberto = str_replace(",", ".", str_replace(".", "", ($request->saldo_devedor_emprestimo[$contador])));
        $emprestimo->save();

        if ($request->id[$contador] == 0) {
            $retorno["id"] = DB::getPdo()->lastInsertId();
        } else {
            $retorno["id"] = $request->id[$contador];
        }

        $retorno["saldo_devedor"] = $request->saldo_devedor[$contador] ?: "";
        $retorno["possui_seguro"] = $request->possui_seguro[$contador] ?: "";
        $retorno["parcela_mensal"] = $request->parcela_mensal[$contador] ?: "";
        $retorno["prazo_residual"] = $request->prazo_residual[$contador] ?: "";
        $retorno["saldo_devedor_emprestimo"] = $request->saldo_devedor_emprestimo[$contador] ?: "";

        return $retorno;
    }

    public function store(Request $request) {
        $count = count($request->saldo_devedor_emprestimo);
        for ($i = 0; $i < $count; $i++) {
            $retorno[$i] = $this->update($request, $i);
        }
        return ($retorno);
    }

    public function destroy(Request $request) {
        $retorno = Emprestimo::where('id', $request->id)->delete();
        return $retorno;
    }

}
