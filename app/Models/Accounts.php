<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Accounts extends Model implements Transformable
{
    use TransformableTrait;
  
    protected $table = 'account';
    protected $fillable = ['id','user_id','acc_number','acc_agency','balance', 'date', 'bank'];

    //Relacionamento para verificar dados do conta com o usuário
    public function user(){
        return $this->hasOne(Users::class, 'id', 'user_id');
    }

}
