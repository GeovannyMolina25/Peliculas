<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'alquiler';

    protected $fillable = ['soc_id','pel_id','alq_fecha_desde','alq_fecha_hasta','alq_valor','alq_fecha_entrega'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pelicula()
    {
        return $this->hasOne('App\Models\Pelicula', 'id', 'pel_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function socio()
    {
        return $this->hasOne('App\Models\Socio', 'id', 'soc_id');
    }
    
}
