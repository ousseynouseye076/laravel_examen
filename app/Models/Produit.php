<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    /**
     * Get the category that owns the Produit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get all of the commande for the Produit
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commandes(): HasMany
    {
        return $this->hasMany(Commande::class);
    }
}
