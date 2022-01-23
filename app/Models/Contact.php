<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $fillable = [
        'fname',
        'lname',
        'company',
        'email',
        'phone',
        'linkedIn'
        
        
    ];
    public function campany()
    {
        return $this->belongsTo(Category::class,"id");
    }
}
