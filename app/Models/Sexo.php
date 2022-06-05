<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'sexo';

    protected $fillable = ['sex_nombre'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function actors()
    {
        return $this->hasMany('App\Models\Actor', 'sex_id', 'id');
    }
    
}
