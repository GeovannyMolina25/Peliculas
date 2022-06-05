<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActorPelicula extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'actor_pelicula';

    protected $fillable = ['act_id','pel_id','apl_papel'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function actor()
    {
        return $this->hasOne('App\Models\Actor', 'id', 'act_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pelicula()
    {
        return $this->hasOne('App\Models\Pelicula', 'id', 'pel_id');
    }
    
}
