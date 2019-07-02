<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Usuariopermitido;

use DB;

class UsuariopermitidosController extends Controller
{
  //
  public function __construct()
  {
    //$this->middleware('auth');
  }


  public function index(Request $request)
  {
    return view('usuariopermitidos.index', []);
  }

  public function create(Request $request)
  {
    return view('usuariopermitidos.add', [
      'model' => null    ]);
  }

  public function edit(Request $request, $id)
  {
    $usuariopermitido = Usuariopermitido::findOrFail($id);
    return view('usuariopermitidos.add', [
      'model' => $usuariopermitido    ]);
  }

  public function show(Request $request, $id)
  {
    $usuariopermitido = Usuariopermitido::findOrFail($id);
    return view('usuariopermitidos.show', [
      'model' => $usuariopermitido    ]);
  }

  public function grid(Request $request)
  {
    $len = $_GET['length'];
    $start = $_GET['start'];

    $select = "SELECT *,1,2 ";
    $presql = " FROM usuariopermitidos a ";
    if($_GET['search']['value']) {
      $presql .= " WHERE created_at LIKE '%".$_GET['search']['value']."%' ";
    }

    $presql .= "  ";

    //------------------------------------
    // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
    //------------------------------------
    $orderby = "";
    $columns = array('id','created_at','updated_at','idUser','permissao',);
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
  $usuariopermitido = null;
  if($request->id > 0) { $usuariopermitido = Usuariopermitido::findOrFail($request->id); }
  else {
    $usuariopermitido = new Usuariopermitido;
  }


  
    $usuariopermitido->id = $request->id?:0;
    
  
      $usuariopermitido->created_at = $request->created_at;
  
  
      $usuariopermitido->updated_at = $request->updated_at;
  
  
      $usuariopermitido->idUser = $request->idUser;
  
  
      $usuariopermitido->permissao = $request->permissao;
  
    //$usuariopermitido->user_id = $request->user()->id;
  $usuariopermitido->save();

  return redirect('/usuariopermitidos');

}

public function store(Request $request)
{
  return $this->update($request);
}

public function destroy(Request $request, $id) {

  $usuariopermitido = Usuariopermitido::findOrFail($id);

  $usuariopermitido->delete();
  return "OK";

}


}
