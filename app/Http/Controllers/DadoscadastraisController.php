<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dadoscadastrai;
use DB;

class DadoscadastraisController extends Controller {

    //
    public function __construct() {
        //$this->middleware('auth');
    }

    public function index(Request $request) {
        return view('dadoscadastrais.index', []);
    }

    public function create(Request $request) {
        return view('dadoscadastrais.add', [
            []
        ]);
    }

    public function edit(Request $request, $id) {
        $dadoscadastrai = Dadoscadastrai::findOrFail($id);
        return view('dadoscadastrais.add', [
            'model' => $dadoscadastrai]);
    }

    public function show(Request $request, $id) {
        $dadoscadastrai = Dadoscadastrai::findOrFail($id);
        return view('dadoscadastrais.show', [
            'model' => $dadoscadastrai]);
    }

    public function grid(Request $request) {
        $len = $_GET['length'];
        $start = $_GET['start'];

        $select = "SELECT *,1,2 ";
        $presql = " FROM dadoscadastrais a ";
        if ($_GET['search']['value']) {
            $presql .= " WHERE created_at LIKE '%" . $_GET['search']['value'] . "%' ";
        }

        $presql .= "  ";

        //------------------------------------
        // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
        //------------------------------------
        $orderby = "";
        $columns = array('id', 'created_at', 'updated_at', 'idUser', 'nomecompleto', 'cpf', 'datanascimento', 'sexo', 'estadocivil', 'enderecoresidencial', 'email', 'celular',);
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
        $dadoscadastrai = null;
        if ($request->id > 0) {
            $dadoscadastrai = Dadoscadastrai::findOrFail($request->id);
        } else {
            $dadoscadastrai = new Dadoscadastrai;
        }
                 
        $dadoscadastrai->id = $request->id ?: 0;
        $dadoscadastrai->nomecompleto = $request->dc_nome_completo;
        $dadoscadastrai->idUser = 1;
        $dadoscadastrai->cpf = $request->cpf;
        $dadoscadastrai->datanascimento = date('Y-m-d', strtotime(str_replace("/", "-", ($request->data_nascimento))));
        $dadoscadastrai->sexo = $request->sexo;
        $dadoscadastrai->estadocivil = $request->estadocivil;
        $dadoscadastrai->enderecoresidencial = $request->dc_endereco_resd;
        $dadoscadastrai->email = $request->dc_email;
        $dadoscadastrai->celular = $request->dc_celular;
        $dadoscadastrai->save();

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

        $dadoscadastrai = Dadoscadastrai::findOrFail($id);

        $dadoscadastrai->delete();
        return "OK";
    }

}
