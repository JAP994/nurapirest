<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mantenancedate',
        'observation',
        'description',
        'image',
        'user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
