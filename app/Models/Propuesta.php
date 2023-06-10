<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Propuesta extends Model
{
    use HasFactory;
    protected $table = 'propuestas';
    protected $fillable = ['documento'];
    public $timestamps = false;


    public function Estudiante(){
        return $this->belongsTo('App\Models\Estudiante');
    }

    //lista de profesores que han revisado la propuesta
    public function profesores():BelongsToMany{
        return $this -> belongstoMany(Profesor::class);
    }
    
    //lista de profesores que han revisado la propuesta
    // y datos de la tabla intermedia

    public function profesoresConPivot():BelongsToMany{
        return $this-> belongstoMany(Profesor::class)->withPivot(['fecha','hora','comentario']);
    }
}
