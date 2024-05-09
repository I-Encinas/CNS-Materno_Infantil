<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function ordertypes(): BelongsTo {
        return $this->belongsTo(OrderType::class);
    }
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
        
    }
}