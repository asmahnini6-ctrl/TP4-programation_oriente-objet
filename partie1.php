<?php

class Personne {

    // Attributs publics
    public string $nom;
    public string $prenom;

    // Attributs privés
    private string $dateNaissance;
    private string $villeNaissance;
    private string $cin;

    // Constructeur
    public function __construct(
        string $nom,
        string $prenom,
        string $dateNaissance,
        string $villeNaissance,
        string $cin
    ) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
        $this->villeNaissance = $villeNaissance;
        $this->cin = $cin;
    }

    // Méthode publique
    public function getName(): string {
        return $this->prenom . " " . $this->nom;
    }

    // Méthode privée
    private function getAge(): int {
        $naissance = new DateTime($this->dateNaissance);
        $aujourdhui = new DateTime();

        return $naissance->diff($aujourdhui)->y;
    }
}

// Création d'un objet
$p = new Personne(
    "Hachimi",
    "Sara",
    "2000-05-14",
    "Marrakech",
    "EE123456"
);

echo $p->getName() . PHP_EOL;
echo $p->nom . PHP_EOL;

// 1.1 :
// L'accès à nom fonctionne car il est public.
// L'accès à cin provoque une erreur car il est private.
// L'accès à dateNaissance provoque une erreur car il est private.
// L'appel à getAge() provoque une erreur car la méthode est private.

// 1.2 :
// Il est dangereux de laisser cin en public car n'importe qui
// peut consulter ou modifier cette information personnelle.

// 1.3 :
// getAge() n'est pas inutile.
// Elle peut être appelée par une autre méthode de la même classe.

// 1.4 :
// Si cin devient protected, il reste inaccessible depuis l'extérieur.
// Il devient accessible dans la classe et ses classes filles.