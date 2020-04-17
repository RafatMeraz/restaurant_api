<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItemsModel extends Model
{
    protected $table = "menu_items";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $incrementing = true;
    public $timestamps = false;
}
