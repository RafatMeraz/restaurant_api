<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    protected $table = "restaurant_menu";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $incrementing = true;
    public $timestamps = false;
}
