<?php

namespace Kenmush\UjumbeSMS\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujumbe extends Model
{
    use HasFactory;

    protected $table = 'ujumbesms';

    protected $guarded = [];

    protected $casts = [
            'meta',
    ];
}
