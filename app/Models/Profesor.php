<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Profesor extends Model
{
    use HasFactory;
    protected $table = 'profesores';
    public $timestamps = false;

    //lista de propuestas con el profesor
    public function propuestas():BelongsToMany{
        return $this -> belongstoMany(Propuesta::class);
    }
    
    //lista de propuestas con el profesor
    // y datos de la tabla intermedia

    public function propuestasConPivot():BelongsToMany{
        return $this-> belongstoMany(Propuesta::class)->withPivot(['fecha','hora','comentario']);
    }

}
