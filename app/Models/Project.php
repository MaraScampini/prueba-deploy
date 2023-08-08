<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // Agrega el campo "name" a la propiedad $fillable
        'place',
        'start_date',
        'end_date',
        'team',
        'description',
    ];
    
    public function inventory()
    {
        return $this->belongsToMany(Inventory::class, 'inventory_projects', 'project_id', 'inventory_id')
                    ->withPivot('requested_quantity');
    }

    public function team()
    {
        return $this->belongsTo(TeamsUser::class, 'team');
    }

}
