<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectionTypeModel extends Model
{
    protected $table = "section_type";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $incrementing = true;
    public $timestamps = false;
}
