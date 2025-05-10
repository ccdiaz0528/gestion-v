<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Class License
 *
 * @property $id
 * @property $license_number
 * @property $issued_date
 * @property $expiry_date
 * @property $type_of_license
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class License extends Model
{
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'license_number',
        'issued_date',
        'expiry_date',
        'license_type_id', // Asegúrate de incluir este campo
    ];

    /**
     * Mutator: convert issued_date from d/m/Y to Y-m-d for storage if necessary.
     *
     * @param  string|null  $value
     */
    public function setIssuedDateAttribute($value)
    {
        if ($value) {
            // Only adjust if format contains slash, otherwise assume it's correct
            if (str_contains($value, '/')) {
                $date = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
            } else {
                $date = Carbon::parse($value)->format('Y-m-d');
            }
            $this->attributes['issued_date'] = $date;
        } else {
            $this->attributes['issued_date'] = null;
        }
    }

    /**
     * Mutator: convert expiry_date from d/m/Y to Y-m-d for storage if necessary.
     *
     * @param  string|null  $value
     */
    public function setExpiryDateAttribute($value)
    {
        if ($value) {
            if (str_contains($value, '/')) {
                $date = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
            } else {
                $date = Carbon::parse($value)->format('Y-m-d');
            }
            $this->attributes['expiry_date'] = $date;
        } else {
            $this->attributes['expiry_date'] = null;
        }
    }

    /**
     * Accessor: format issued_date as d/m/Y when retrieved.
     *
     * @param  string|null  $value
     * @return string|null
     */
    public function getIssuedDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('d/m/Y') : null;
    }

    /**
     * Accessor: format expiry_date as d/m/Y when retrieved.
     *
     * @param  string|null  $value
     * @return string|null
     */
    public function getExpiryDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('d/m/Y') : null;
    }

      public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function licenseType()
{
    return $this->belongsTo(LicenseType::class);
}
}
