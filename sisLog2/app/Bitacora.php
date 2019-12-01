<?php

namespace sisLog2;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    //
    protected $table='bitacora';

    protected $primaryKey='IDBITACORA';

    public $timestamps=false;

    protected $fillable = [
    
    	
        'IDBITACORA',
        'IDUSUARIO',
        'DESCRIPCIONBITACORA',
        'FECHABITACORA',
        'HORABIRACORA',
        
    	
    
        
        
    ];

    protected $guarded =[

    ];
}
