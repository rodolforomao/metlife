<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Insssegurocliente;

use DB;

class InssseguroclientesController extends Controller
{
  //
  public function __construct()
  {
    //$this->middleware('auth');
  }


  public function index(Request $request)
  {
    return view('inssseguroclientes.index', []);
  }

  public function create(Request $request)
  {
    return view('inssseguroclientes.add', [
      []
    ]);
  }

  public function edit(Request $request, $id)
  {
    $insssegurocliente = Insssegurocliente::findOrFail($id);
    return view('inssseguroclientes.add', [
      'model' => $insssegurocliente    ]);
  }

  public function show(Request $request, $id)
  {
    $insssegurocliente = Insssegurocliente::findOrFail($id);
    return view('inssseguroclientes.show', [
      'model' => $insssegurocliente    ]);
  }

  public function grid(Request $request)
  {
    $len = $_GET['length'];
    $start = $_GET['start'];

    $select = "SELECT *,1,2 ";
    $presql = " FROM inssseguroclientes a ";
    if($_GET['search']['value']) {
      $presql .= " WHERE created_at LIKE '%".$_GET['search']['value']."%' ";
    }

    $presql .= "  ";

    //------------------------------------
    // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
    //------------------------------------
    $orderby = "";
    $columns = array('id','created_at','updated_at','idUser','idadeparaaposentadoria','segurodevida','capitalsegurado','premiomensal',);
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
  $insssegurocliente = null;
  if($request->id > 0) { $insssegurocliente = Insssegurocliente::findOrFail($request->id); }
  else {
    $insssegurocliente = new Insssegurocliente;
  }


  
    $insssegurocliente->id = $request->id?:0;
    
  
      $insssegurocliente->created_at = $request->created_at;
  
  
      $insssegurocliente->updated_at = $request->updated_at;
  
  
      $insssegurocliente->idUser = $request->idUser;
  
  
      $insssegurocliente->idadeparaaposentadoria = $request->idadeparaaposentadoria;
  
  
      $insssegurocliente->segurodevida = $request->segurodevida;
  
  
      $insssegurocliente->capitalsegurado = $request->capitalsegurado;
  
  
      $insssegurocliente->premiomensal = $request->premiomensal;
  
    //$insssegurocliente->user_id = $request->user()->id;
  $insssegurocliente->save();

  return redirect('/inssseguroclientes');

}

public function store(Request $request)
{
  return $this->update($request);
}

public function destroy(Request $request, $id) {

  $insssegurocliente = Insssegurocliente::findOrFail($id);

  $insssegurocliente->delete();
  return "OK";

}


}
