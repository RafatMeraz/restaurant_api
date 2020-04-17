<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiningTableStatusModel extends Model
{
    protected $table = "dining_table_status";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $incrementing = true;
    public $timestamps = false;
}
