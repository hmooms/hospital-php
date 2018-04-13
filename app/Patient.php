<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Patient extends Model
{
    protected $primaryKey = 'patient_id';
    public $timestamps = false;
}
