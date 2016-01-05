<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel
{
    protected $primaryKey = 'id';
    protected $table = 'categories';
    protected $filltable = array('name', 'created_at_ip', 'updated_at_ip');
    // если бы я захотел, чтобы поля
    // created_at
    // updated_at
    // не использовались в моей базе данных

    // public $timestamps = false;
}
