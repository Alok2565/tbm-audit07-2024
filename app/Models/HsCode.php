<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HsCode extends Model
{
    use HasFactory;

    protected $table="hs_code_items";
    protected $fillable =['hs_code','desc','import_policy'];
}
