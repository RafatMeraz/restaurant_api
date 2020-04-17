<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersModel extends Model
{
    protected $table = "orders";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $incrementing = true;
    public $timestamps = false;
}
