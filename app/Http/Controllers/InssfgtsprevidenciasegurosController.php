<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Inssfgtsprevidenciaseguro;

use DB;

class InssfgtsprevidenciasegurosController extends Controller
{
  //
  public function __construct()
  {
    //$this->middleware('auth');
  }


  public function index(Request $request)
  {
    return view('inssfgtsprevidenciaseguros.index', []);
  }

  public function create(Request $request)
  {
   return view('inssfgtsprevidenciaseguros.add', [
      'model' => null   ]);
  }

  public function edit(Request $request, $id)
  {
    $inssfgtsprevidenciaseguro = Inssfgtsprevidenciaseguro::findOrFail($id);
    return view('inssfgtsprevidenciaseguros.add', [
      'model' => $inssfgtsprevidenciaseguro    ]);
  }

  public function show(Request $request, $id)
  {
    $inssfgtsprevidenciaseguro = Inssfgtsprevidenciaseguro::findOrFail($id);
    return view('inssfgtsprevidenciaseguros.show', [
      'model' => $inssfgtsprevidenciaseguro    ]);
  }

  public function grid(Request $request)
  {
    $len = $_GET['length'];
    $start = $_GET['start'];

    $select = "SELECT *,1,2 ";
    $presql = " FROM inssfgtsprevidenciaseguros a ";
    if($_GET['search']['value']) {
      $presql .= " WHERE created_at LIKE '%".$_GET['search']['value']."%' ";
    }

    $presql .= "  ";

    //------------------------------------
    // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
    //------------------------------------
    $orderby = "";
    $columns = array('id','created_at','updated_at','idUser','tipoprincipalconjuge','fgts','inss',);
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
  $inssfgtsprevidenciaseguro = null;
  if($request->id > 0) { $inssfgtsprevidenciaseguro = Inssfgtsprevidenciaseguro::findOrFail($request->id); }
  else {
    $inssfgtsprevidenciaseguro = new Inssfgtsprevidenciaseguro;
  }


  
    $inssfgtsprevidenciaseguro->id = $request->id?:0;
    
  
      $inssfgtsprevidenciaseguro->created_at = $request->created_at;
  
  
      $inssfgtsprevidenciaseguro->updated_at = $request->updated_at;
  
  
      $inssfgtsprevidenciaseguro->idUser = $request->idUser;
  
  
      $inssfgtsprevidenciaseguro->tipoprincipalconjuge = $request->tipoprincipalconjuge;
  
  
      $inssfgtsprevidenciaseguro->fgts = $request->fgts;
  
  
      $inssfgtsprevidenciaseguro->inss = $request->inss;
  
    //$inssfgtsprevidenciaseguro->user_id = $request->user()->id;
  $inssfgtsprevidenciaseguro->save();

  return redirect('/inssfgtsprevidenciaseguros');

}

public function store(Request $request)
{
  return $this->update($request);
}

public function destroy(Request $request, $id) {

  $inssfgtsprevidenciaseguro = Inssfgtsprevidenciaseguro::findOrFail($id);

  $inssfgtsprevidenciaseguro->delete();
  return "OK";

}


}
