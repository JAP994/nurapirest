<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'latitude',
        'longitude',
        'collected',
        'image',
        'description',
        'delivery_id',
        'maintenance_id',
        'collected_id',
        'donor_id'
    ];
    public function deliveries()
    {
        return $this->belongsTo(Delivery::class);
    }
    public function maintenances()
    {
        return $this->belongsTo(Maintenance::class);
    }
    public function collecteds()
    {
        return $this->belongsTo(collected::class);
    }
    public function donors()
    {
        return $this->belongsTo(Donor::class);
    }
}
