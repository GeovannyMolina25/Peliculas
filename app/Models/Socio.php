<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'socio';

    protected $fillable = ['soc_cedula','soc_nombre','soc_direccion','soc_telefono','soc_correo'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alquilers()
    {
        return $this->hasMany('App\Models\Alquiler', 'soc_id', 'id');
    }
    
}
