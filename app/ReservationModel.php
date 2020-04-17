<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationModel extends Model
{
    protected $table = "reservation";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $incrementing = true;
    public $timestamps = false;
}
