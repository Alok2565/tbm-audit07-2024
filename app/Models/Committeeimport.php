<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Committeeimport extends Model
{
    use HasFactory;

    protected $table="committee_import";
	
	 protected $primaryKey = 'c_id';

}
