<?php

class Utilisateur {

    public string $nom;
    public int $age;
    private string $motDePasse;

    public function __construct(
        string $nom,
        int $age,
        string $motDePasse
    ) {
        $this->nom = $nom;
        $this->age = $age;
        $this->motDePasse = $motDePasse;
    }

    // Choisir les données à sérialiser
    public function __serialize(): array {

        return [
            'nom' => $this->nom,
            'age' => $this->age

            // Le mot de passe est volontairement exclu
            // pour des raisons de sécurité.
        ];
    }

    // Reconstruire l'objet
    public function __unserialize(array $data): void {

        $this->nom = $data['nom'];
        $this->age = $data['age'];

        // Le mot de passe est réinitialisé
        $this->motDePasse = "";
    }
}

$u = new Utilisateur("Alice", 25, "secret123");

$serialise = serialize($u);

echo "Sérialisé : " . $serialise . PHP_EOL;

// Restaurer l'objet
$restaure = unserialize($serialise);

var_dump($restaure);

// 5.1 :
// Le mot de passe ne figure pas dans la chaîne sérialisée
// car il est exclu dans la méthode __serialize().

// 5.2 :
// Sans __serialize(), PHP sérialise les propriétés de l'objet,
// y compris le mot de passe privé.
// Cela peut exposer des informations sensibles.

// 5.3 :
// Après unserialize(), le mot de passe vaut une chaîne vide "".
// Dans une vraie application, il faut prévoir une méthode sécurisée
// pour réinitialiser le mot de passe.

// 5.4 :
// Il ne faut jamais utiliser unserialize() sur des données non fiables
// provenant d'un utilisateur.
// Cela peut provoquer une attaque appelée PHP Object Injection.
// Une alternative est d'utiliser json_encode() et json_decode().
