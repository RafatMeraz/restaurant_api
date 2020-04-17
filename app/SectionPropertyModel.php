<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectionPropertyModel extends Model
{
    protected $table = "section_property";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $incrementing = true;
    public $timestamps = false;
}
