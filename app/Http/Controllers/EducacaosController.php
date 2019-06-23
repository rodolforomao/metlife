<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Educacao;

use DB;

class EducacaosController extends Controller
{
  //
  public function __construct()
  {
    //$this->middleware('auth');
  }


  public function index(Request $request)
  {
    return view('educacaos.index', []);
  }

  public function create(Request $request)
  {
    return view('educacaos.add', [
      'model' => null    ]);
  }

  public function edit(Request $request, $id)
  {
    $educacao = Educacao::findOrFail($id);
    return view('educacaos.add', [
      'model' => $educacao    ]);
  }

  public function show(Request $request, $id)
  {
    $educacao = Educacao::findOrFail($id);
    return view('educacaos.show', [
      'model' => $educacao    ]);
  }

  public function grid(Request $request)
  {
    $len = $_GET['length'];
    $start = $_GET['start'];

    $select = "SELECT *,1,2 ";
    $presql = " FROM educacaos a ";
    if($_GET['search']['value']) {
      $presql .= " WHERE created_at LIKE '%".$_GET['search']['value']."%' ";
    }

    $presql .= "  ";

    //------------------------------------
    // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
    //------------------------------------
    $orderby = "";
    $columns = array('id','created_at','updated_at','iduser','idadeserie','totaldeanosparaformacao','basico','custo2','anos2','total2','fundamental3anos','filho','custo3','anos3','total3','superior4a5anos','custo4','anos4','total4','infantil','custo1','anos1','total1',);
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
  $educacao = null;
  if($request->id > 0) { $educacao = Educacao::findOrFail($request->id); }
  else {
    $educacao = new Educacao;
  }


  
    $educacao->id = $request->id?:0;
    
  
      $educacao->created_at = $request->created_at;
  
  
      $educacao->updated_at = $request->updated_at;
  
  
      $educacao->iduser = $request->iduser;
  
  
      $educacao->idadeserie = $request->idadeserie;
  
  
      $educacao->totaldeanosparaformacao = $request->totaldeanosparaformacao;
  
  
      $educacao->basico = $request->basico;
  
  
      $educacao->custo2 = $request->custo2;
  
  
      $educacao->anos2 = $request->anos2;
  
  
      $educacao->total2 = $request->total2;
  
  
      $educacao->fundamental3anos = $request->fundamental3anos;
  
  
      $educacao->filho = $request->filho;
  
  
      $educacao->custo3 = $request->custo3;
  
  
      $educacao->anos3 = $request->anos3;
  
  
      $educacao->total3 = $request->total3;
  
  
      $educacao->superior4a5anos = $request->superior4a5anos;
  
  
      $educacao->custo4 = $request->custo4;
  
  
      $educacao->anos4 = $request->anos4;
  
  
      $educacao->total4 = $request->total4;
  
  
      $educacao->infantil = $request->infantil;
  
  
      $educacao->custo1 = $request->custo1;
  
  
      $educacao->anos1 = $request->anos1;
  
  
      $educacao->total1 = $request->total1;
  
    //$educacao->user_id = $request->user()->id;
  $educacao->save();

  return redirect('/educacaos');

}

public function store(Request $request)
{
  return $this->update($request);
}

public function destroy(Request $request, $id) {

  $educacao = Educacao::findOrFail($id);

  $educacao->delete();
  return "OK";

}


}
