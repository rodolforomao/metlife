<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Planoproduto;

use DB;

class PlanoprodutosController extends Controller
{
  //
  public function __construct()
  {
    //$this->middleware('auth');
  }


  public function index(Request $request)
  {
    return view('planoprodutos.index', []);
  }

  public function create(Request $request)
  {
    return view('planoprodutos.add', [
      'model' => null    ]);
  }

  public function edit(Request $request, $id)
  {
    $planoproduto = Planoproduto::findOrFail($id);
    return view('planoprodutos.add', [
      'model' => $planoproduto    ]);
  }

  public function show(Request $request, $id)
  {
    $planoproduto = Planoproduto::findOrFail($id);
    return view('planoprodutos.show', [
      'model' => $planoproduto    ]);
  }

  public function grid(Request $request)
  {
    $len = $_GET['length'];
    $start = $_GET['start'];

    $select = "SELECT *,1,2 ";
    $presql = " FROM planoprodutos a ";
    if($_GET['search']['value']) {
      $presql .= " WHERE created_at LIKE '%".$_GET['search']['value']."%' ";
    }

    $presql .= "  ";

    //------------------------------------
    // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
    //------------------------------------
    $orderby = "";
    $columns = array('id','created_at','updated_at','idUser','idproduto','vigencia','prazo','capital','segurado','valor',);
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
  $planoproduto = null;
  if($request->id > 0) { $planoproduto = Planoproduto::findOrFail($request->id); }
  else {
    $planoproduto = new Planoproduto;
  }


  
    $planoproduto->id = $request->id?:0;
    
  
      $planoproduto->created_at = $request->created_at;
  
  
      $planoproduto->updated_at = $request->updated_at;
  
  
      $planoproduto->idUser = $request->idUser;
  
  
      $planoproduto->idproduto = $request->idproduto;
  
  
      $planoproduto->vigencia = $request->vigencia;
  
  
      $planoproduto->prazo = $request->prazo;
  
  
      $planoproduto->capital = $request->capital;
  
  
      $planoproduto->segurado = $request->segurado;
  
  
      $planoproduto->valor = $request->valor;
  
    //$planoproduto->user_id = $request->user()->id;
  $planoproduto->save();

  return redirect('/planoprodutos');

}

public function store(Request $request)
{
  return $this->update($request);
}

public function destroy(Request $request, $id) {

  $planoproduto = Planoproduto::findOrFail($id);

  $planoproduto->delete();
  return "OK";

}


}
