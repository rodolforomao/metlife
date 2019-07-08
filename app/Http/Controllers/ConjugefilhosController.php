<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Conjugefilho;
use DB;

class ConjugefilhosController extends Controller {

    //
    public function __construct() {
        //$this->middleware('auth');
    }

    public function index(Request $request) {
        return view('conjugefilhos.index', []);
    }

    public function create(Request $request) {
        return view('conjugefilhos.add', [
            'model' => null]);
    }

    public function edit(Request $request, $id) {
        $conjugefilho = Conjugefilho::findOrFail($id);
        return view('conjugefilhos.add', [
            'model' => $conjugefilho]);
    }

    public function show(Request $request, $id) {
        $conjugefilho = Conjugefilho::findOrFail($id);
        return view('conjugefilhos.show', [
            'model' => $conjugefilho]);
    }

    public function grid(Request $request) {
        $len = $_GET['length'];
        $start = $_GET['start'];

        $select = "SELECT *,1,2 ";
        $presql = " FROM conjugefilhos a ";
        if ($_GET['search']['value']) {
            $presql .= " WHERE created_at LIKE '%" . $_GET['search']['value'] . "%' ";
        }

        $presql .= "  ";

        //------------------------------------
        // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
        //------------------------------------
        $orderby = "";
        $columns = array('id', 'created_at', 'updated_at', 'idUser', 'idconjuge', 'filho', 'datanascimento',);
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
        $conjugefilho = null;
        if ($request->id > 0) {
            $conjugefilho = Conjugefilho::findOrFail($request->id);
        } else {
            $conjugefilho = new Conjugefilho;
        }



        $conjugefilho->id = $request->id ?: 0;
        $conjugefilho->idUser = $request->idUser;
        $conjugefilho->filho = $request->filho;
        $conjugefilho->datanascimento = date('Y-m-d', strtotime(str_replace("/", "-", ($request->datanascimento))));
        //$conjugefilho->user_id = $request->user()->id;
        
        $retorno = $conjugefilho->save();
        return json_encode($retorno);
    }

    public function store(Request $request) {
        return $this->update($request);
    }

    public function destroy(Request $request, $id) {

        $conjugefilho = Conjugefilho::findOrFail($id);

        $conjugefilho->delete();
        return "OK";
    }

}
