<?php

// 2.1 : Constructeur avec valeurs par défaut
class Voiture {

    public string $couleur;
    public int $vitesse;

    public function __construct(
        string $couleur = "Blanche",
        int $vitesse = 0
    ) {
        $this->couleur = $couleur;
        $this->vitesse = $vitesse;
    }

    public function afficher(): void {
        echo "Couleur : {$this->couleur}" . PHP_EOL;
        echo "Vitesse : {$this->vitesse} km/h" . PHP_EOL;
    }
}

$v1 = new Voiture();
$v2 = new Voiture("Rouge", 50);
$v3 = new Voiture("Noire");

$v1->afficher();
$v2->afficher();
$v3->afficher();

// 2.1.a :
// new Voiture("Noire") fonctionne : la vitesse prend la valeur 0.
// new Voiture(120) provoque une TypeError car le premier paramètre
// doit être une chaîne de caractères.

// 2.1.b : Promotion de propriétés :
// L'avantage est de déclarer et initialiser les propriétés
// directement dans le constructeur.

// Exemple :
// public function __construct(
//     public string $couleur = "Blanche",
//     public int $vitesse = 0
// ) {}


// 2.2 : Un seul constructeur pour Personne
class Personne {

    public string $nom;
    public string $prenom;

    public function __construct(
        string $nom = "",
        string $prenom = ""
    ) {
        $this->nom = $nom;
        $this->prenom = $prenom;

        echo "Création " . __CLASS__ . PHP_EOL;
    }

    // 2.3.d : Destructeur
    public function __destruct() {
        echo "Détruire " . __CLASS__ . PHP_EOL;
    }
}

$p = new Personne("Sara", "Hachimi");

// 2.2.a :
// PHP ne permet pas de déclarer deux constructeurs dans une même classe.
// La deuxième déclaration provoque une erreur.

// 2.2.b :
// On utilise un seul constructeur avec des valeurs par défaut.
// Ainsi, on peut créer un objet vide ou avec des informations.

// Exemple :
// new Personne();
// new Personne("Sara", "Hachimi");

// 2.2.c :
// Une méthode statique de fabrique permet de créer un objet
// avec une méthode spéciale, par exemple depuisTableau().


// 2.3 : Exemple du destructeur
class Vehicule {

    public function __construct(public string $couleur) {
        echo "Voiture {$this->couleur} créée." . PHP_EOL;
    }

    public function __destruct() {
        echo "Voiture {$this->couleur} détruite." . PHP_EOL;
    }
}

$maVoiture = new Vehicule("Blanche");

// 2.3.a :
// L'ordre est : Voiture Blanche créée.
// puis Voiture Blanche détruite.
// puis Fin du script.
unset($maVoiture);
echo "Fin du script." . PHP_EOL;

// 2.3.b :
// Sans unset(), le destructeur est appelé à la fin du script.
// Le message "Fin du script" s'affiche donc avant la destruction.

// 2.3.c :
// Sans unset(), les objets sont généralement détruits
// dans l'ordre inverse de leur création : b puis a.

// Exemple :
// $a = new Vehicule("Rouge");
// $b = new Vehicule("Noire");
