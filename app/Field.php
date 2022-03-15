<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = [
        'field_type', 'label', 'field_name', 'attr_values', 'comments'
    ];
}
