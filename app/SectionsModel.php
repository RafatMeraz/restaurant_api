<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectionsModel extends Model
{
    protected $table = "sections";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $incrementing = true;
    public $timestamps = false;
}
