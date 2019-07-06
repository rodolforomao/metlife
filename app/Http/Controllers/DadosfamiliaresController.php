<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Dadosfamiliare;

use DB;

class DadosfamiliaresController extends Controller
{
  //
  public function __construct()
  {
    //$this->middleware('auth');
  }


  public function index(Request $request)
  {
    return view('dadosfamiliares.index', []);
  }

  public function create(Request $request)
  {
    return view('dadosfamiliares.add', [
      []
    ]);
  }

  public function edit(Request $request, $id)
  {
    $dadosfamiliare = Dadosfamiliare::findOrFail($id);
    return view('dadosfamiliares.add', [
      'model' => $dadosfamiliare    ]);
  }

  public function show(Request $request, $id)
  {
    $dadosfamiliare = Dadosfamiliare::findOrFail($id);
    return view('dadosfamiliares.show', [
      'model' => $dadosfamiliare    ]);
  }

  public function grid(Request $request)
  {
    $len = $_GET['length'];
    $start = $_GET['start'];

    $select = "SELECT *,1,2 ";
    $presql = " FROM dadosfamiliares a ";
    if($_GET['search']['value']) {
      $presql .= " WHERE created_at LIKE '%".$_GET['search']['value']."%' ";
    }

    $presql .= "  ";

    //------------------------------------
    // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
    //------------------------------------
    $orderby = "";
    $columns = array('id','created_at','updated_at','idCliente','tipoFamiliar','nome','datanascimento',);
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
  $dadosfamiliare = null;
  if($request->id > 0) { $dadosfamiliare = Dadosfamiliare::findOrFail($request->id); }
  else {
    $dadosfamiliare = new Dadosfamiliare;
  }


  
    $dadosfamiliare->id = $request->id?:0;
    
  
      $dadosfamiliare->created_at = $request->created_at;
  
  
      $dadosfamiliare->updated_at = $request->updated_at;
  
  
      $dadosfamiliare->idCliente = $request->idCliente;
  
  
      $dadosfamiliare->tipoFamiliar = $request->tipoFamiliar;
  
  
      $dadosfamiliare->nome = $request->nome;
  
  
      $dadosfamiliare->datanascimento = $request->datanascimento;
  
    //$dadosfamiliare->user_id = $request->user()->id;
  $dadosfamiliare->save();

  return redirect('/dadosfamiliares');

}

public function store(Request $request)
{
  return $this->update($request);
}

public function destroy(Request $request, $id) {

  $dadosfamiliare = Dadosfamiliare::findOrFail($id);

  $dadosfamiliare->delete();
  return "OK";

}


}
