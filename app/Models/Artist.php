<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Artist extends Model
{
    use HasFactory;

// Attributs assignables en masse pour le modèle Artist.
    protected $fillable = [
        'firstname', // Permet l'assignation en masse du prénom de l'artiste.
        'lastname'   // Permet l'assignation en masse du nom de l'artiste.
    ];

// Spécifie la table de base de données utilisée par le modèle Artist.
    protected $table = 'artists';

// Désactive la gestion automatique des colonnes timestamps (created_at et updated_at).
    public $timestamps = false;

    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class);
    }

    public function shows(): BelongsToMany
    {
        return $this->belongsToMany(Show::class);
    }



}
