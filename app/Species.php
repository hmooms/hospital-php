<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    protected $primaryKey = 'species_id';
    public $timestamps = false;
}
