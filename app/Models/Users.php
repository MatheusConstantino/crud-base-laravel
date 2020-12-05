<?php

namespace RW940cms\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Users extends Model implements Transformable
{
    use TransformableTrait;
  
    protected $table = 'users';
    protected $fillable = ['id','name','cpf','email','phone'];


}
