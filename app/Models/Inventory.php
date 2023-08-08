<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class Inventory extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(ProductProvider::class, 'product_id');
    }
       
    public function project()
    {
        return $this->belongsToMany(Project::class, 'inventory_projects', 'project_id', 'inventory_id')
                    ->withPivot('requested_quantity');
    }
}
