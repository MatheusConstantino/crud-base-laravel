<?php 

namespace RW940cms\Http\Controllers\Site;

use Illuminate\Http\Request;
use RW940cms\Http\Requests;
use RW940cms\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use RW940cms\Models\Accounts;
use RW940cms\Models\Transfers;
use RW940cms\Models\Users;
use Mail;

class FormContatoController extends Controller
{
   
    
    public function enviaContato(Request $request){
        $data = $request->all();
        
        //Verificando se usuário existe no sistema
        $checkuser = Users::where('cpf', $data['cpf'])->first();

        //Se não existe, cria e redireciona para o cadastro de conta
        if($checkuser == null){

          $user = Users::create($data);
          return response()->json([
            'error' => 0,
            'url' => route('conta', ['id' => $user->id])
          ]);
        }
        //Caso encontre, ele redireciona para o cadastro de contas
        else{
          return response()->json([
            'error' => 1,
            'url' => route('conta', ['id' => $checkuser->id])
          ]);
        }
    }  

  public function cadastro(){
    return view('site.contato');
  }


  public function enviaConta(Request $request){
       $data = $request->all();

       //Verifica se aquela conta já não existe no sistema
       $checkacc = Accounts::where('acc_number', $data['acc_number'])->first();

       //Caso não encontre, cria a conta e direciona para o extrato da conta
       if($checkacc == null){
        $acc = Accounts::create([
          'user_id' => $data['user_id'],
          'bank' => $data['bank'],
          'acc_number' => $data['acc_number'],
          'acc_agency' => $data['acc_agency'],
          'balance' => $data['balance'],
          'date' => $data['date']
        ]);
        return response()->json([
            'error' => 0,
            'url' => route('extrato', ['id' => $acc->id])
          ]);
       }
       //Caso ja exista ele direciona para o extrato da mesma
       else{
        return response()->json([
            'error' => 1,
            'url' => route('extrato', ['id' => $checkacc->id])
          ]);
       }
     
    }  

  public function conta(Request $request, $id){
    $user_id = $id;
    return view('site.conta', compact('user_id'));
  }


}
 ?>