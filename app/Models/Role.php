<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate(int $int)
 */
class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $fillable = ['role_name'];
}
