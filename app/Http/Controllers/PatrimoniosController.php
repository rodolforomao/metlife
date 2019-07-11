<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Patrimonio;

use DB;

class PatrimoniosController extends Controller
{
  //
  public function __construct()
  {
    //$this->middleware('auth');
  }


  public function index(Request $request)
  {
    return view('patrimonios.index', []);
  }

  public function create(Request $request)
  {
    return view('patrimonios.add', [
      []
    ]);
  }

  public function edit(Request $request, $id)
  {
    $patrimonio = Patrimonio::findOrFail($id);
    return view('patrimonios.add', [
      'model' => $patrimonio    ]);
  }

  public function show(Request $request, $id)
  {
    $patrimonio = Patrimonio::findOrFail($id);
    return view('patrimonios.show', [
      'model' => $patrimonio    ]);
  }

  public function grid(Request $request)
  {
    $len = $_GET['length'];
    $start = $_GET['start'];

    $select = "SELECT *,1,2 ";
    $presql = " FROM patrimonios a ";
    if($_GET['search']['value']) {
      $presql .= " WHERE created_at LIKE '%".$_GET['search']['value']."%' ";
    }

    $presql .= "  ";

    //------------------------------------
    // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
    //------------------------------------
    $orderby = "";
    $columns = array('id','created_at','updated_at','idCliente','fundos','reservas','inventario','emergencia','funeral','outros','imoveis',);
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
  $patrimonio = null;
  if($request->id > 0) { $patrimonio = Patrimonio::findOrFail($request->id); }
  else {
    $patrimonio = new Patrimonio;
  }


  
    $patrimonio->id = $request->id?:0;
    
  
      $patrimonio->created_at = $request->created_at;
  
  
      $patrimonio->updated_at = $request->updated_at;
  
  
      $patrimonio->idCliente = $request->idCliente;
  
  
      $patrimonio->fundos = $request->fundos;
  
  
      $patrimonio->reservas = $request->reservas;
  
  
      $patrimonio->inventario = $request->inventario;
  
  
      $patrimonio->emergencia = $request->emergencia;
  
  
      $patrimonio->funeral = $request->funeral;
  
  
      $patrimonio->outros = $request->outros;
  
  
      $patrimonio->imoveis = $request->imoveis;
  
    //$patrimonio->user_id = $request->user()->id;
  $patrimonio->save();

  return redirect('/patrimonios');

}

public function store(Request $request)
{
  return $this->update($request);
}

public function destroy(Request $request, $id) {

  $patrimonio = Patrimonio::findOrFail($id);

  $patrimonio->delete();
  return "OK";

}


}
