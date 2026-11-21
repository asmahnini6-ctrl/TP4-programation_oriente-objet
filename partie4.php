<?php

class Personne {

    public string $nom;
    public string $prenom;

    private string $dateNaissance;

    public function __construct(
        string $nom,
        string $prenom,
        string $dateNaissance
    ) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
    }

    // Calculer l'âge
    private function getAge(): int {

        $naissance = new DateTime($this->dateNaissance);
        $aujourdhui = new DateTime();

        return $naissance->diff($aujourdhui)->y;
    }

    // Méthode magique __toString
    public function __toString(): string {

        return $this->prenom . " " .
               $this->nom . " (" .
               $this->getAge() . " ans)";
    }
}

$p = new Personne("Hachimi", "Sara", "2000-05-14");

echo $p . PHP_EOL;

// 4.1 :
// getAge() est private mais elle fonctionne ici
// car __toString() appartient à la même classe.

// 4.2 :
// __toString() doit retourner une chaîne de caractères.
// Retourner un entier provoque une erreur de type.

// 4.3 :
// __toString() permet d'afficher directement un objet avec echo.
// Elle est pratique pour afficher une personne ou un produit
// sans appeler une méthode supplémentaire.
