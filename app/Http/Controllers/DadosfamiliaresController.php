<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dadosfamiliare;
use DB;

class DadosfamiliaresController extends Controller {

    //
    public function __construct() {
        //$this->middleware('auth');
    }

    public function index(Request $request) {
        return view('dadosfamiliares.index', []);
    }

    public function create(Request $request) {
        return view('dadosfamiliares.add', [
            'model' => null]);
    }

    public function edit(Request $request, $id) {
        $dadosfamiliare = Dadosfamiliare::findOrFail($id);
        return view('dadosfamiliares.add', [
            'model' => $dadosfamiliare]);
    }

    public function show(Request $request, $id) {
        $dadosfamiliare = Dadosfamiliare::findOrFail($id);
        return view('dadosfamiliares.show', [
            'model' => $dadosfamiliare]);
    }

    public function grid(Request $request) {
        $len = $_GET['length'];
        $start = $_GET['start'];

        $select = "SELECT *,1,2 ";
        $presql = " FROM dadosfamiliares a ";
        if ($_GET['search']['value']) {
            $presql .= " WHERE created_at LIKE '%" . $_GET['search']['value'] . "%' ";
        }

        $presql .= "  ";

        //------------------------------------
        // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
        //------------------------------------
        $orderby = "";
        $columns = array('id', 'created_at', 'updated_at', 'idUser', 'nomeconjuge', 'datanascimento',);
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
        $dadosfamiliare = null;
        if ($request->id > 0) {
            $dadosfamiliare = Dadosfamiliare::findOrFail($request->id);
        } else {
            $dadosfamiliare = new Dadosfamiliare;
        }

        $dadosfamiliare->id = $request->id ?: 0;
        $dadosfamiliare->idCliente = $request->idCliente;
        $dadosfamiliare->tipoFamiliar = $request->tipoFamiliar;
        $dadosfamiliare->nome = $request->df_conjuje;
        $dadosfamiliare->datanascimento = date('Y-m-d', strtotime(str_replace("/", "-", ($request->data_nascimento_conjugue))));
        $retorno = $dadosfamiliare->save();

        if ($request->id == 0) {
            $retorno = DB::getPdo()->lastInsertId();
        } else {
            $retorno = $request->id;
        }
        return json_encode($retorno);
    }

    public function updateFilhos(Request $request, $contador) {
        $dadosfamiliare = null;
        if ($request->id[$contador] > 0) {
            $dadosfamiliare = Dadosfamiliare::findOrFail($request->id[$contador]);
        } else {
            $dadosfamiliare = new Dadosfamiliare;
        }

        $dadosfamiliare->id = $request->id[$contador] ?: 0;
        $dadosfamiliare->idCliente = $request->idCliente;
        $dadosfamiliare->tipoFamiliar = $request->tipoFamiliar;
        $dadosfamiliare->nome = $request->df_filho[$contador];
        $dadosfamiliare->datanascimento = date('Y-m-d', strtotime(str_replace("/", "-", ($request->data_nascimento_filho[$contador]))));
        $dadosfamiliare->save();

        if ($request->id[$contador] == 0) {
            $retorno["id"] = DB::getPdo()->lastInsertId();
        } else {
            $retorno["id"] = $request->id[$contador];
        }

        $retorno["data_nascimento_filho"] = $request->data_nascimento_filho[$contador];
        $retorno["df_filho"] = $request->df_filho[$contador];

        return ($retorno);
    }

    public function store(Request $request) {
        if ($request->tipoFamiliar == "Conjugue") {
            $retorno = ($this->update($request));
        } else if ($request->tipoFamiliar == "Filho") {
            $count = count($request->df_filho);
            if ($count > 0) {
                for ($i = 0; $i < $count; $i++) {
                    $retorno[$i] = $this->updateFilhos($request, $i);
                }
            }
        } else {
            $retorno = false;
        }
        return $retorno;
    }

    public function destroy(Request $request) {
        $retorno = Dadosfamiliare::where('id', $request->id)->delete();
        return $retorno;
    }

}
