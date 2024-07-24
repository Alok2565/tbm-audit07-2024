<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpNocIssued extends Model
{
    use HasFactory;


    protected $fillable = [
                    'exp_id',
                    'noc_number',
                    'sending_iec_number',
                    'application_number',
                    'sending_applicant_name',
                    'noc_number',
                    'sending_add_company_institute',
                    'dsc_e_sing',
                    'qr_code',
                    'ip_address',


    ];
}
