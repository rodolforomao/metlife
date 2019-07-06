<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Dadoscadastrai;

use DB;

class DadoscadastraisController extends Controller
{
  //
  public function __construct()
  {
    //$this->middleware('auth');
  }


  public function index(Request $request)
  {
    return view('dadoscadastrais.index', []);
  }

  public function create(Request $request)
  {
    return view('dadoscadastrais.add', [
      []
    ]);
  }

  public function edit(Request $request, $id)
  {
    $dadoscadastrai = Dadoscadastrai::findOrFail($id);
    return view('dadoscadastrais.add', [
      'model' => $dadoscadastrai    ]);
  }

  public function show(Request $request, $id)
  {
    $dadoscadastrai = Dadoscadastrai::findOrFail($id);
    return view('dadoscadastrais.show', [
      'model' => $dadoscadastrai    ]);
  }

  public function grid(Request $request)
  {
    $len = $_GET['length'];
    $start = $_GET['start'];

    $select = "SELECT *,1,2 ";
    $presql = " FROM dadoscadastrais a ";
    if($_GET['search']['value']) {
      $presql .= " WHERE created_at LIKE '%".$_GET['search']['value']."%' ";
    }

    $presql .= "  ";

    //------------------------------------
    // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
    //------------------------------------
    $orderby = "";
    $columns = array('id','created_at','updated_at','idUser','nomecompleto','cpf','datanascimento','sexo','estadocivil','enderecoresidencial','email','celular',);
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
  $dadoscadastrai = null;
  if($request->id > 0) { $dadoscadastrai = Dadoscadastrai::findOrFail($request->id); }
  else {
    $dadoscadastrai = new Dadoscadastrai;
  }


  
    $dadoscadastrai->id = $request->id?:0;
    
  
      $dadoscadastrai->created_at = $request->created_at;
  
  
      $dadoscadastrai->updated_at = $request->updated_at;
  
  
      $dadoscadastrai->idUser = $request->idUser;
  
  
      $dadoscadastrai->nomecompleto = $request->nomecompleto;
  
  
      $dadoscadastrai->cpf = $request->cpf;
  
  
      $dadoscadastrai->datanascimento = $request->datanascimento;
  
  
      $dadoscadastrai->sexo = $request->sexo;
  
  
      $dadoscadastrai->estadocivil = $request->estadocivil;
  
  
      $dadoscadastrai->enderecoresidencial = $request->enderecoresidencial;
  
  
      $dadoscadastrai->email = $request->email;
  
  
      $dadoscadastrai->celular = $request->celular;
  
    //$dadoscadastrai->user_id = $request->user()->id;
  $dadoscadastrai->save();

  return redirect('/dadoscadastrais');

}

public function store(Request $request)
{
  return $this->update($request);
}

public function destroy(Request $request, $id) {

  $dadoscadastrai = Dadoscadastrai::findOrFail($id);

  $dadoscadastrai->delete();
  return "OK";

}


}
