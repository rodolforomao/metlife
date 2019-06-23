<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Padrao_de_vida;

use DB;

class Padrao_de_vidasController extends Controller
{
  //
  public function __construct()
  {
    //$this->middleware('auth');
  }


  public function index(Request $request)
  {
    return view('padrao_de_vidas.index', []);
  }

  public function create(Request $request)
  {
    return view('padrao_de_vidas.add', [
      []
    ]);
  }

  public function edit(Request $request, $id)
  {
    $padrao_de_vida = Padrao_de_vida::findOrFail($id);
    return view('padrao_de_vidas.add', [
      'model' => $padrao_de_vida    ]);
  }

  public function show(Request $request, $id)
  {
    $padrao_de_vida = Padrao_de_vida::findOrFail($id);
    return view('padrao_de_vidas.show', [
      'model' => $padrao_de_vida    ]);
  }

  public function grid(Request $request)
  {
    $len = $_GET['length'];
    $start = $_GET['start'];

    $select = "SELECT *,1,2 ";
    $presql = " FROM padrao_de_vidas a ";
    if($_GET['search']['value']) {
      $presql .= " WHERE created_at LIKE '%".$_GET['search']['value']."%' ";
    }

    $presql .= "  ";

    //------------------------------------
    // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
    //------------------------------------
    $orderby = "";
    $columns = array('id','created_at','updated_at','moradia','servicos','transporte','saude','vestuario','seguroDeVidaPrevidencia','lazer','alimentacao','impostos','extrasoutros',);
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
  $padrao_de_vida = null;
  if($request->id > 0) { $padrao_de_vida = Padrao_de_vida::findOrFail($request->id); }
  else {
    $padrao_de_vida = new Padrao_de_vida;
  }


  
    $padrao_de_vida->id = $request->id?:0;
    
  
      $padrao_de_vida->created_at = $request->created_at;
  
  
      $padrao_de_vida->updated_at = $request->updated_at;
  
  
      $padrao_de_vida->moradia = $request->moradia;
  
  
      $padrao_de_vida->servicos = $request->servicos;
  
  
      $padrao_de_vida->transporte = $request->transporte;
  
  
      $padrao_de_vida->saude = $request->saude;
  
  
      $padrao_de_vida->vestuario = $request->vestuario;
  
  
      $padrao_de_vida->seguroDeVidaPrevidencia = $request->seguroDeVidaPrevidencia;
  
  
      $padrao_de_vida->lazer = $request->lazer;
  
  
      $padrao_de_vida->alimentacao = $request->alimentacao;
  
  
      $padrao_de_vida->impostos = $request->impostos;
  
  
      $padrao_de_vida->extrasoutros = $request->extrasoutros;
  
    //$padrao_de_vida->user_id = $request->user()->id;
  $padrao_de_vida->save();

  return redirect('/padrao_de_vidas');

}

public function store(Request $request)
{
  return $this->update($request);
}

public function destroy(Request $request, $id) {

  $padrao_de_vida = Padrao_de_vida::findOrFail($id);

  $padrao_de_vida->delete();
  return "OK";

}


}
