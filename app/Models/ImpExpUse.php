<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImpExpUse extends Model
{
    use HasFactory;

    protected $table ='imp_exp_user';
    protected $fillable = [
        'roll',
		'iec_code',
        'name',
        'address',
        'address2',
        'city',
		'states',
		'pincode',
        'email',
        'mobile_number',
        'designation',
        'department',
        'status',
        'ip_address',
        'password'
    ];
    public static function getIecCodeById($id){
        return ImpExpUse::where('id', $id)->pluck('iec_code')->first();
    }

    public function imp_exp_users()
{
    return $this->hasMany(ImpExpUse::class);
}
}
