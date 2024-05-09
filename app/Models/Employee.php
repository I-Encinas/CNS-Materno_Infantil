<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['service_id','ci','paternal_surname','maternal_surname','name','address','phone'];

    public function service():BelongsTo{

        // $this->string('full_name')->virtualAs('concat(first_name, \' \', last_name)');

        return $this->belongsTo(Service::class);
    }
}
