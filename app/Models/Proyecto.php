<?php

namespace App\Models;

use App\User;
use App\TipoProyecto;
use App\Models\Estatus;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table='proyectos';
    protected $fillable=[
        
        'nombre', 
        'descripcion',
        'slug',
        'proyecto_id',
        'estatus_id'
    ];

    public function estatus(){
        return $this->belongsTo(Estatus::class, 'estatus_id');
    }

    public function usuario(){
        return $this->belongsTo(User::class, 'estatus_id');
    }
}
