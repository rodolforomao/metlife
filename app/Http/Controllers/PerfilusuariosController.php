<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Perfilusuario;

use DB;

class PerfilusuariosController extends Controller
{
  //
  public function __construct()
  {
    //$this->middleware('auth');
  }


  public function index(Request $request)
  {
    return view('perfilusuarios.index', []);
  }

  public function create(Request $request)
  {
    return view('perfilusuarios.add', [
      []
    ]);
  }

  public function edit(Request $request, $id)
  {
    $perfilusuario = Perfilusuario::findOrFail($id);
    return view('perfilusuarios.add', [
      'model' => $perfilusuario    ]);
  }

  public function show(Request $request, $id)
  {
    $perfilusuario = Perfilusuario::findOrFail($id);
    return view('perfilusuarios.show', [
      'model' => $perfilusuario    ]);
  }

  public function grid(Request $request)
  {
    $len = $_GET['length'];
    $start = $_GET['start'];

    $select = "SELECT *,1,2 ";
    $presql = " FROM perfilusuarios a ";
    if($_GET['search']['value']) {
      $presql .= " WHERE created_at LIKE '%".$_GET['search']['value']."%' ";
    }

    $presql .= "  ";

    //------------------------------------
    // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
    //------------------------------------
    $orderby = "";
    $columns = array('id','created_at','updated_at','idcliente','permissao','idPerfil',);
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
  $perfilusuario = null;
  if($request->id > 0) { $perfilusuario = Perfilusuario::findOrFail($request->id); }
  else {
    $perfilusuario = new Perfilusuario;
  }


  
    $perfilusuario->id = $request->id?:0;
    
  
      $perfilusuario->created_at = $request->created_at;
  
  
      $perfilusuario->updated_at = $request->updated_at;
  
  
      $perfilusuario->idcliente = $request->idcliente;
  
  
      $perfilusuario->permissao = $request->permissao;
  
  
      $perfilusuario->idPerfil = $request->idPerfil;
  
    //$perfilusuario->user_id = $request->user()->id;
  $perfilusuario->save();

  return redirect('/perfilusuarios');

}

public function store(Request $request)
{
  return $this->update($request);
}

public function destroy(Request $request, $id) {

  $perfilusuario = Perfilusuario::findOrFail($id);

  $perfilusuario->delete();
  return "OK";

}


}
