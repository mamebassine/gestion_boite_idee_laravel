<?php

// Déclare le namespace de la classe, qui permet d'organiser le code et éviter les conflits de noms
namespace App\Models;

// Importation de la classe Authenticatable, qui est une extension du modèle Eloquent pour l'authentification des utilisateurs
use Illuminate\Foundation\Auth\User as Authenticatable;

// Importation du trait Notifiable, qui permet à l'utilisateur de recevoir des notifications
use Illuminate\Notifications\Notifiable;

// Importation de la façade Hash, utilisée pour hasher (chiffrer) les mots de passe
use Illuminate\Support\Facades\Hash;

// Déclaration de la classe Administrateur qui étend Authenticatable pour inclure les fonctionnalités d'authentification
class Administrateur extends Authenticatable
{
    // Utilise le trait Notifiable pour ajouter les fonctionnalités de notification à cette classe
    use Notifiable;

    // Déclare les attributs qui peuvent être assignés en masse. Ceci protège contre l'assignation de champs non désirés
    protected $fillable = [
        'nom', 'prenom', 'telephone', 'email', 'password',
    ];

    // Déclare les attributs qui doivent être cachés pour les tableaux et JSON. Empêche la fuite de données sensibles
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Définit un mutateur pour l'attribut 'mot_passe'. Ce mutateur est appelé automatiquement lorsque l'attribut 'mot_passe' est défini
    // Il hash le mot de passe avant de l'enregistrer dans la base de données
    public function setMotPasseAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    // Redéfinit la méthode getAuthPassword pour utiliser 'mot_passe' comme champ de mot de passe pour l'authentification Laravel
    public function getAuthPassword()
    {
        return $this->password;
    }

    // Déclare une relation one-to-many avec le modèle Bien. Cette méthode renvoie tous les biens associés à cet administrateur
    // La relation est basée sur la clé étrangère 'admin_id' dans la table des biens
    // public function biens()
    // {
    //     return $this->hasMany(Bien::class, 'admin_id');
    // }
}


    














// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class Administrateur extends Model
// {
//     protected $fillable = [
//         'nom', 
//         'prenom', 
//         'adresse', 
//         'email', 
//         'password', 
//         'nom', 
        
//     ];

    

//     // Rest of your model code
// }
