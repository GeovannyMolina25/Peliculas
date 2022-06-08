<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
	use HasFactory; 
	
    public $timestamps = true;

    protected $table = 'actor';

    protected $fillable = ['sex_id','act_nombre'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function actorPeliculas()
    {
        return $this->hasMany('App\Models\ActorPelicula', 'act_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sexo()
    {
        return $this->hasOne('App\Models\Sexo', 'id', 'sex_id');
    }
    
}
