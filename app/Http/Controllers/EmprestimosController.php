<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Emprestimo;

use DB;

class EmprestimosController extends Controller
{
  //
  public function __construct()
  {
    //$this->middleware('auth');
  }


  public function index(Request $request)
  {
    return view('emprestimos.index', []);
  }

  public function create(Request $request)
  {
    return view('emprestimos.add', [
      []
    ]);
  }

  public function edit(Request $request, $id)
  {
    $emprestimo = Emprestimo::findOrFail($id);
    return view('emprestimos.add', [
      'model' => $emprestimo    ]);
  }

  public function show(Request $request, $id)
  {
    $emprestimo = Emprestimo::findOrFail($id);
    return view('emprestimos.show', [
      'model' => $emprestimo    ]);
  }

  public function grid(Request $request)
  {
    $len = $_GET['length'];
    $start = $_GET['start'];

    $select = "SELECT *,1,2 ";
    $presql = " FROM emprestimos a ";
    if($_GET['search']['value']) {
      $presql .= " WHERE created_at LIKE '%".$_GET['search']['value']."%' ";
    }

    $presql .= "  ";

    //------------------------------------
    // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
    //------------------------------------
    $orderby = "";
    $columns = array('id','created_at','updated_at','idCliente','maiorperiodoparaemprestimofinananos','emprestimos','valor3','descobertoemprestimofinanciamento','valor1','n1','valor2','n2',);
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
  $emprestimo = null;
  if($request->id > 0) { $emprestimo = Emprestimo::findOrFail($request->id); }
  else {
    $emprestimo = new Emprestimo;
  }


  
    $emprestimo->id = $request->id?:0;
    
  
      $emprestimo->created_at = $request->created_at;
  
  
      $emprestimo->updated_at = $request->updated_at;
  
  
      $emprestimo->idCliente = $request->idCliente;
  
  
      $emprestimo->maiorperiodoparaemprestimofinananos = $request->maiorperiodoparaemprestimofinananos;
  
  
      $emprestimo->emprestimos = $request->emprestimos;
  
  
      $emprestimo->valor3 = $request->valor3;
  
  
      $emprestimo->descobertoemprestimofinanciamento = $request->descobertoemprestimofinanciamento;
  
  
      $emprestimo->valor1 = $request->valor1;
  
  
      $emprestimo->n1 = $request->n1;
  
  
      $emprestimo->valor2 = $request->valor2;
  
  
      $emprestimo->n2 = $request->n2;
  
    //$emprestimo->user_id = $request->user()->id;
  $emprestimo->save();

  return redirect('/emprestimos');

}

public function store(Request $request)
{
  return $this->update($request);
}

public function destroy(Request $request, $id) {

  $emprestimo = Emprestimo::findOrFail($id);

  $emprestimo->delete();
  return "OK";

}


}
