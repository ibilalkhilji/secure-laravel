<?php

namespace Ibilalkhilji\SecureLaravel\Models;

use Illuminate\Database\Eloquent\Model;

class Passport extends Model
{
    protected $fillable = ['key', 'client_name', 'domain', 'mac', 'guid', 'expires_at'];

    protected function casts(): array
    {
        return [
            'expires_at' => 'datetime',
        ];
    }
}
