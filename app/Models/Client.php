<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * Get all of the commandes for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commandes(): HasMany
    {
        return $this->hasMany(Commande::class);
    }

    
}
