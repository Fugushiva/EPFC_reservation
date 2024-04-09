<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function shows(): HasMany
    {
        return $this->hasMany(Show::class);
    }

    /**
     * @param $query string la query de la db
     * @param $firstname string l'élément recherché
     * @return mixed
     */
    public function scopeWithFirstname($query, $firstname)
    {
        //Si il y a un firstname alors si un prénom existe avec cette chaîne
        if(!empty($firstname)){
            return $query->where('firstname', 'LIKE', "%{$firstname}%");
        }

        return $query;
    }

    public function scopeWithLastname($query,$lastname)
    {
        if(!empty($lastname)){
            return $query->where('lastname', 'LIKE', "%{$lastname}%");
        }
        return $query;
    }



}
