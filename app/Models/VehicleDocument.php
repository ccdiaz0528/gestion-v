<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VehicleDocument
 *
 * @property $id
 * @property $document_type_id
 * @property $expedition_date
 * @property $expiration_date
 * @property $issuing_entity
 * @property $created_at
 * @property $updated_at
 *
 * @property DocumentType $documentType
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class VehicleDocument extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['document_type_id', 'expedition_date', 'expiration_date', 'issuing_entity'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function documentType()
    {
        return $this->belongsTo(\App\Models\DocumentType::class, 'document_type_id', 'id');
    }
    
}
