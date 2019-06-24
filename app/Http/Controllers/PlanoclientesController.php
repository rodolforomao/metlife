<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Planocliente;

use DB;

class PlanoclientesController extends Controller
{
  //
  public function __construct()
  {
    //$this->middleware('auth');
  }


  public function index(Request $request)
  {
    return view('planoclientes.index', []);
  }

  public function create(Request $request)
  {
    return view('planoclientes.add', [
      'model' => null    ]);
  }

  public function edit(Request $request, $id)
  {
    $planocliente = Planocliente::findOrFail($id);
    return view('planoclientes.add', [
      'model' => $planocliente    ]);
  }

  public function show(Request $request, $id)
  {
    $planocliente = Planocliente::findOrFail($id);
    return view('planoclientes.show', [
      'model' => $planocliente    ]);
  }

  public function grid(Request $request)
  {
    $len = $_GET['length'];
    $start = $_GET['start'];

    $select = "SELECT *,1,2 ";
    $presql = " FROM planoclientes a ";
    if($_GET['search']['value']) {
      $presql .= " WHERE created_at LIKE '%".$_GET['search']['value']."%' ";
    }

    $presql .= "  ";

    //------------------------------------
    // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
    //------------------------------------
    $orderby = "";
    $columns = array('id','created_at','updated_at','idUser','nome','risco','cpf','sexo','nascimento',);
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');
    $orderby = "Order By " . $order . " " . $dir;

    $sql = $select.$presql.$orderby." LIMIT ".$start.",".$len;
    //------------------------------------

    $qcount = DB::select("SELECT COUNT(a.id) c".$presql);
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
    /*$this->validate($request, [
    'name' => 'required|max:255',
  ]);*/
  $planocliente = null;
  if($request->id > 0) { $planocliente = Planocliente::findOrFail($request->id); }
  else {
    $planocliente = new Planocliente;
  }


  
    $planocliente->id = $request->id?:0;
    
  
      $planocliente->created_at = $request->created_at;
  
  
      $planocliente->updated_at = $request->updated_at;
  
  
      $planocliente->idUser = $request->idUser;
  
  
      $planocliente->nome = $request->nome;
  
  
      $planocliente->risco = $request->risco;
  
  
      $planocliente->cpf = $request->cpf;
  
  
      $planocliente->sexo = $request->sexo;
  
  
      $planocliente->nascimento = $request->nascimento;
  
    //$planocliente->user_id = $request->user()->id;
  $planocliente->save();

  return redirect('/planoclientes');

}

public function store(Request $request)
{
  return $this->update($request);
}

public function destroy(Request $request, $id) {

  $planocliente = Planocliente::findOrFail($id);

  $planocliente->delete();
  return "OK";

}


}
