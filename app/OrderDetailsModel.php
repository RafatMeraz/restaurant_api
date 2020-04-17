<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetailsModel extends Model
{
    protected $table = "order_details";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $incrementing = true;
    public $timestamps = false;
}
