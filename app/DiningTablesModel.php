<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiningTablesModel extends Model
{
    protected $table = "dining_tables";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $incrementing = true;
    public $timestamps = false;
}
