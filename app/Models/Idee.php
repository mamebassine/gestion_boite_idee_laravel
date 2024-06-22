<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idee extends Model
{
    use HasFactory;

    protected $fillable = ['libelle', 'description', 'categorie_id', 'auteur_nom_complet', 'auteur_email', 'status', 'date_creation'];

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
