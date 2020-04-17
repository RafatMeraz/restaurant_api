<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    protected $table = "customer";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $incrementing = true;
    public $timestamps = false;
}
