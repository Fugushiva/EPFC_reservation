<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['role'];

    protected $table = 'roles';

    public $timestamps = false;

    public function users(): belongsToMany
    {
        return $this->belongsToMany(User::class, 'role_user');
    }


}
