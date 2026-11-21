<?php

class Compte {

    private float $montant;
    private float $interet;

    // Constructeur : montant initial puis intérêt
    public function __construct(
        float $montantInitial,
        float $interet
    ) {
        $this->montant = $montantInitial;
        $this->interet = $interet;
    }

    // Calculer le montant après un an
    public function un_an(): void {

        $this->montant = $this->montant *
                         (1 + $this->interet / 100);
    }

    // Retourner le montant
    public function get_montant(): float {
        return $this->montant;
    }
}

// Création des deux comptes
$c1 = new Compte(400, 10);
$c2 = new Compte(2500, 5);

// Calcul après 10 ans
for ($i = 1; $i <= 10; $i++) {
    $c1->un_an();
    $c2->un_an();
}

// Affichage des résultats
echo "Valeur du compte 1 = " .
     number_format($c1->get_montant(), 2, ',', ' ') .
     " dirhams" . PHP_EOL;

echo "Valeur du compte 2 = " .
     number_format($c2->get_montant(), 2, ',', ' ') .
     " dirhams" . PHP_EOL;


// 7.1 :
// L'erreur de syntaxe se trouve dans :
// $this->montant * ($this->montant 1 * $this->interet / 100)
// Il manque un opérateur entre montant et 1.

// 7.2 :
// La bonne formule est :
// Montant = Montant * (1 + taux / 100)

// 7.3 :
// L'ordre du constructeur initial était interet puis montantInitial.
// Ce n'est pas cohérent avec l'énoncé.
// Il faut utiliser montantInitial puis interet pour éviter la confusion.

// 7.4 :
// Les propriétés et paramètres utilisent le type float.
// get_montant() retourne un float.
// number_format() affiche deux chiffres après la virgule.