<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Supply extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function category():BelongsTo{

        return $this->belongsTo(Category::class);
    }
    public function management_unit():BelongsTo{

        return $this->belongsTo(ManagementUnit::class);
    }
    
}
