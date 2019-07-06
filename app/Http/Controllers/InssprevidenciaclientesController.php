<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Inssprevidenciacliente;

use DB;

class InssprevidenciaclientesController extends Controller
{
  //
  public function __construct()
  {
    //$this->middleware('auth');
  }


  public function index(Request $request)
  {
    return view('inssprevidenciaclientes.index', []);
  }

  public function create(Request $request)
  {
    return view('inssprevidenciaclientes.add', [
      []
    ]);
  }

  public function edit(Request $request, $id)
  {
    $inssprevidenciacliente = Inssprevidenciacliente::findOrFail($id);
    return view('inssprevidenciaclientes.add', [
      'model' => $inssprevidenciacliente    ]);
  }

  public function show(Request $request, $id)
  {
    $inssprevidenciacliente = Inssprevidenciacliente::findOrFail($id);
    return view('inssprevidenciaclientes.show', [
      'model' => $inssprevidenciacliente    ]);
  }

  public function grid(Request $request)
  {
    $len = $_GET['length'];
    $start = $_GET['start'];

    $select = "SELECT *,1,2 ";
    $presql = " FROM inssprevidenciaclientes a ";
    if($_GET['search']['value']) {
      $presql .= " WHERE created_at LIKE '%".$_GET['search']['value']."%' ";
    }

    $presql .= "  ";

    //------------------------------------
    // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
    //------------------------------------
    $orderby = "";
    $columns = array('id','created_at','updated_at','idCliente','previdencia','pgblvgbl','saldoacumulado','contribuicaoanual',);
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
  $inssprevidenciacliente = null;
  if($request->id > 0) { $inssprevidenciacliente = Inssprevidenciacliente::findOrFail($request->id); }
  else {
    $inssprevidenciacliente = new Inssprevidenciacliente;
  }


  
    $inssprevidenciacliente->id = $request->id?:0;
    
  
      $inssprevidenciacliente->created_at = $request->created_at;
  
  
      $inssprevidenciacliente->updated_at = $request->updated_at;
  
  
      $inssprevidenciacliente->idCliente = $request->idCliente;
  
  
      $inssprevidenciacliente->previdencia = $request->previdencia;
  
  
      $inssprevidenciacliente->pgblvgbl = $request->pgblvgbl;
  
  
      $inssprevidenciacliente->saldoacumulado = $request->saldoacumulado;
  
  
      $inssprevidenciacliente->contribuicaoanual = $request->contribuicaoanual;
  
    //$inssprevidenciacliente->user_id = $request->user()->id;
  $inssprevidenciacliente->save();

  return redirect('/inssprevidenciaclientes');

}

public function store(Request $request)
{
  return $this->update($request);
}

public function destroy(Request $request, $id) {

  $inssprevidenciacliente = Inssprevidenciacliente::findOrFail($id);

  $inssprevidenciacliente->delete();
  return "OK";

}


}
