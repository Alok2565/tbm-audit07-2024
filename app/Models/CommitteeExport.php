<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommitteeExport extends Model
{
    use HasFactory;
    protected $table = 'committee_exports';
	
	protected $primaryKey = 'c_id'; 
	
    protected $fillable = [
            'exp_id',
            'comm_id',
            'remark',
    ];
    
    public function Export(){
        return $this->belongsTo(Exporter::class);
    }
}
