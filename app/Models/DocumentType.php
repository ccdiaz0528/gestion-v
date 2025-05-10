<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class DocumentType extends Model
{
    use HasFactory;

    // Asegúrate de que el modelo esté configurado correctamente
    protected $table = 'document_types'; // si el nombre de la tabla es 'document_types'

    protected $fillable = [
        'name',
    ];
}
