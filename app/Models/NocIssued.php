<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NocIssued extends Model
{
    use HasFactory;


    protected $fillable = [
                        'noc_number',
                        'iec_code',
                        'Application_number',
                        'imp_exp_id',
                        'dsc_e_sing',
                        'qr_code',
                        'ip_address',
                    ];
}
