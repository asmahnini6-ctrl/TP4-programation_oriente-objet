<?php

// 6.1 : Classe mère Animal
class Animal {

    public function manger(): void {
        echo "Je mange." . PHP_EOL;
    }
}

// Classe Chien qui hérite de Animal
class Chien extends Animal {

    public function aboyer(): void {
        echo "Wouf !" . PHP_EOL;
    }
}

// 6.1.a : Classe Chat qui hérite de Animal
class Chat extends Animal {

    public function miauler(): void {
        echo "Miaou !" . PHP_EOL;
    }
}

$c = new Chien();
$c->manger();
$c->aboyer();

$chat = new Chat();
$chat->manger();
$chat->miauler();

// 6.1.b :
// Non, on ne peut pas appeler $c->miauler().
// La méthode miauler() appartient à la classe Chat,
// et non à la classe Chien.


// 6.2 : Classe Personne
class Personne {

    public function __construct(protected string $nom) {}

    public function presentation(): string {
        return "Je suis " . $this->nom;
    }
}

// Classe Etudiant qui hérite de Personne
class Etudiant extends Personne {

    public function __construct(
        string $nom,
        private string $filiere
    ) {
        parent::__construct($nom);
    }

    public function presentation(): string {
        return parent::presentation() .
               ", étudiant en " . $this->filiere;
    }
}

$e = new Etudiant("Ahmed", "Informatique");

echo $e->presentation() . PHP_EOL;

// 6.2.a :
// Sans parent::__construct($nom), le constructeur de Personne
// n'est pas appelé et l'attribut nom n'est pas initialisé.

// 6.2.b :
// nom est protected pour être accessible dans Personne
// et dans ses classes filles.
// Avec private, la classe Etudiant ne pourrait pas y accéder.


// 6.3 : final et readonly
class Base {

    final public function afficher(): void {
        echo "Méthode finale" . PHP_EOL;
    }
}

final class Outil {
    public const VERSION = "1.0";
}

class Produit {

    public function __construct(
        public readonly string $reference
    ) {}
}

$p = new Produit("REF-001");

echo $p->reference . PHP_EOL;

// 6.3.a :
// 1. Redéfinir afficher() dans une classe Fille provoque une erreur
// car la méthode est déclarée final.

// 2. class SousOutil extends Outil provoque une erreur
// car la classe Outil est déclarée final.

// 3. $p->reference = "REF-002" provoque une erreur
// car reference est readonly et ne peut plus être modifiée.

// 6.3.b :
// readonly : utile pour un identifiant qui ne doit pas changer.
// final : utile pour empêcher la modification d'une méthode importante.


// 6.4 : Classe Personne pour l'exercice Etudiant
class PersonneComplete {

    public string $nom;
    public string $prenom;

    private string $dateNaissance;
    private string $villeNaissance;
    private string $cin;

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

    // protected pour permettre aux classes filles de l'utiliser
    protected function getAge(): int {

        $naissance = new DateTime($this->dateNaissance);
        $aujourdhui = new DateTime();

        return $naissance->diff($aujourdhui)->y;
    }

    public function __toString(): string {

        return $this->prenom . " " .
               $this->nom . " (" .
               $this->getAge() . " ans)";
    }
}


// Classe Etudiant qui hérite de PersonneComplete
class EtudiantComplet extends PersonneComplete {

    private string $cne;

    public function __construct(
        string $nom,
        string $prenom,
        string $dateNaissance,
        string $villeNaissance,
        string $cin,
        string $cne
    ) {
        parent::__construct(
            $nom,
            $prenom,
            $dateNaissance,
            $villeNaissance,
            $cin
        );

        $this->cne = $cne;
    }

    // Assesseur pour récupérer le CNE
    public function getCne(): string {
        return $this->cne;
