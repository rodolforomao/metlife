<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Emprestimounitario;

use DB;

class EmprestimounitariosController extends Controller
{
  //
  public function __construct()
  {
    //$this->middleware('auth');
  }


  public function index(Request $request)
  {
    return view('emprestimounitarios.index', []);
  }

  public function create(Request $request)
  {
    return view('emprestimounitarios.add', [
      []
    ]);
  }

  public function edit(Request $request, $id)
  {
    $emprestimounitario = Emprestimounitario::findOrFail($id);
    return view('emprestimounitarios.add', [
      'model' => $emprestimounitario    ]);
  }

  public function show(Request $request, $id)
  {
    $emprestimounitario = Emprestimounitario::findOrFail($id);
    return view('emprestimounitarios.show', [
      'model' => $emprestimounitario    ]);
  }

  public function grid(Request $request)
  {
    $len = $_GET['length'];
    $start = $_GET['start'];

    $select = "SELECT *,1,2 ";
    $presql = " FROM emprestimounitarios a ";
    if($_GET['search']['value']) {
      $presql .= " WHERE created_at LIKE '%".$_GET['search']['value']."%' ";
    }

    $presql .= "  ";

    //------------------------------------
    // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
    //------------------------------------
    $orderby = "";
    $columns = array('id','created_at','updated_at','idcliente','saldodevedor','possuiseguro','parcelamensal','prazoresidual','saldodevedordescoberto',);
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
  $emprestimounitario = null;
  if($request->id > 0) { $emprestimounitario = Emprestimounitario::findOrFail($request->id); }
  else {
    $emprestimounitario = new Emprestimounitario;
  }


  
    $emprestimounitario->id = $request->id?:0;
    
  
      $emprestimounitario->created_at = $request->created_at;
  
  
      $emprestimounitario->updated_at = $request->updated_at;
  
  
      $emprestimounitario->idcliente = $request->idcliente;
  
  
      $emprestimounitario->saldodevedor = $request->saldodevedor;
  
  
      $emprestimounitario->possuiseguro = $request->possuiseguro;
  
  
      $emprestimounitario->parcelamensal = $request->parcelamensal;
  
  
      $emprestimounitario->prazoresidual = $request->prazoresidual;
  
  
      $emprestimounitario->saldodevedordescoberto = $request->saldodevedordescoberto;
  
    //$emprestimounitario->user_id = $request->user()->id;
  $emprestimounitario->save();

  return redirect('/emprestimounitarios');

}

public function store(Request $request)
{
  return $this->update($request);
}

public function destroy(Request $request, $id) {

  $emprestimounitario = Emprestimounitario::findOrFail($id);

  $emprestimounitario->delete();
  return "OK";

}


}
