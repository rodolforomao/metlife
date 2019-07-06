<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Planoprodutodesc;

use DB;

class PlanoprodutodescsController extends Controller
{
  //
  public function __construct()
  {
    //$this->middleware('auth');
  }


  public function index(Request $request)
  {
    return view('planoprodutodescs.index', []);
  }

  public function create(Request $request)
  {
    return view('planoprodutodescs.add', [
      []
    ]);
  }

  public function edit(Request $request, $id)
  {
    $planoprodutodesc = Planoprodutodesc::findOrFail($id);
    return view('planoprodutodescs.add', [
      'model' => $planoprodutodesc    ]);
  }

  public function show(Request $request, $id)
  {
    $planoprodutodesc = Planoprodutodesc::findOrFail($id);
    return view('planoprodutodescs.show', [
      'model' => $planoprodutodesc    ]);
  }

  public function grid(Request $request)
  {
    $len = $_GET['length'];
    $start = $_GET['start'];

    $select = "SELECT *,1,2 ";
    $presql = " FROM planoprodutodescs a ";
    if($_GET['search']['value']) {
      $presql .= " WHERE created_at LIKE '%".$_GET['search']['value']."%' ";
    }

    $presql .= "  ";

    //------------------------------------
    // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
    //------------------------------------
    $orderby = "";
    $columns = array('id','created_at','updated_at','descricao',);
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
  $planoprodutodesc = null;
  if($request->id > 0) { $planoprodutodesc = Planoprodutodesc::findOrFail($request->id); }
  else {
    $planoprodutodesc = new Planoprodutodesc;
  }


  
    $planoprodutodesc->id = $request->id?:0;
    
  
      $planoprodutodesc->created_at = $request->created_at;
  
  
      $planoprodutodesc->updated_at = $request->updated_at;
  
  
      $planoprodutodesc->descricao = $request->descricao;
  
    //$planoprodutodesc->user_id = $request->user()->id;
  $planoprodutodesc->save();

  return redirect('/planoprodutodescs');

}

public function store(Request $request)
{
  return $this->update($request);
}

public function destroy(Request $request, $id) {

  $planoprodutodesc = Planoprodutodesc::findOrFail($id);

  $planoprodutodesc->delete();
  return "OK";

}


}
