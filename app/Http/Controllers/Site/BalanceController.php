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

class BalanceController extends Controller
{
   
    
    public function enviaEntrada(Request $request){
       $data = $request->all();

       //Apenas para assegurar que os valores buscados serão os ultimos, para serem usados da melhor forma possivel em caso de alteração por parte do usuário através de console
       $oldValue = Transfers::where('acc_id', $data['acc_id'])->orderBy('created_at', 'DESC')->first();
       $opValue = $data['value'];
       $newValue = $oldValue->new_value + $opValue;

       Transfers::create([
          'user_id' => $data['user_id'],
          'acc_id' => $data['acc_id'],
          'operation' => $data['operation'],
          'ac_value' => $oldValue,
          'value' => $opValue,
          'new_value' => $newValue,
          'date' => $data['date'],
          'desc' => $data['desc']
       ]);

        return response()->json([
            'error' => 0,
            'url' => route('extrato', ['id' => $data['acc_id']])
          ]);
     
    }  

  public function enviaSaida(Request $request){
       $data = $request->all();


       //Apenas para assegurar que os valores buscados serão os ultimos, para serem usados da melhor forma possivel em caso de alteração por parte do usuário através de console
       $oldValue = Transfers::where('acc_id', $data['acc_id'])->orderBy('created_at', 'DESC')->first();
       $opValue = $data['value'];
       $newValue = $oldValue->new_value - $opValue;

       Transfers::create([
          'user_id' => $data['user_id'],
          'acc_id' => $data['acc_id'],
          'operation' => $data['operation'],
          'ac_value' => $oldValue,
          'value' => $opValue,
          'new_value' => $newValue,
          'date' => $data['date'],
          'desc' => $data['desc']
       ]);

        return response()->json([
            'error' => 0,
            'url' => route('extrato', ['id' => $data['acc_id']])
          ]);
     
    }  

  public function extrato(Request $request, $id){
    $acc = Accounts::where('id', $id)->first();
    $transfers = Transfers::where('acc_id', $id)->orderBy('date', 'DESC')->get();
    //Apenas para assegurar que os valores buscados serão os ultimos, para serem usados da melhor forma possivel em caso de alteração por parte do usuário através de console
    $lastValue = Transfers::where('acc_id', $id)->orderBy('created_at', 'DESC')->first();

    return view('site.extrato', compact('acc', 'transfers', 'lastValue'));
  }

}
 ?>