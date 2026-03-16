<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $fillable = [
        'label_name', 'wiki_id', 'conn_id', 'labelable_id', 
        'labelable_type', 'label_position', 'parent_id', 'label_active'
    ];
}
