<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Transfers extends Model implements Transformable
{
    use TransformableTrait;
  
    protected $table = 'transfer';
    protected $fillable = ['id','user_id','acc_id','operation','ac_value', 'value', 'new_value', 'date', 'desc'];


}
