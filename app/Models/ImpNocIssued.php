<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImpNocIssued extends Model
{
    use HasFactory;


    protected $table = 'imp_noc_issueds';
    protected $fillable = [
        'noc_number',
        'iec_code',
        'application_number',
        'name_of_applicant',
        'address_company',
        'dsc_e_sing',
        'qr_code',
        'ip_address',
    ];
}

