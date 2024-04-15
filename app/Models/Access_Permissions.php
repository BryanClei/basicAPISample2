<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Access_Permissions extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "access_permissions";

    protected $fillable = [
        'name'
    ];
}
