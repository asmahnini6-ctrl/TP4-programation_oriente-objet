<?php

class Personne {

    private string $nom = "";
    private string $prenom = "";
    private string $dateNaissance = "";

    // __set : modifier une propriété privée
    public function __set(string $name, mixed $value): void {

        // Vérifier si la propriété existe
        if (property_exists($this, $name)) {

            // 3.4 : Validation du nom
            if ($name === "nom") {
                if (strlen($value) < 2 || trim($value) === "") {
                    throw new InvalidArgumentException(
                        "Le nom doit contenir au moins 2 caractères."
                    );
                }
            }

            $this->$name = $value;

        } else {
            echo "Propriété $name inexistante." . PHP_EOL;
        }
    }

    // __get : lire une propriété privée
    public function __get(string $name): mixed {

        if (property_exists($this, $name)) {
            return $this->$name;
        }

        return null;
    }

    // __isset : vérifier si une propriété existe et n'est pas null
    public function __isset(string $name): bool {

        if (property_exists($this, $name)) {
            return isset($this->$name);
        }

        return false;
    }

    // __unset : remettre la propriété à une chaîne vide
    public function __unset(string $name): void {

        if (property_exists($this, $name)) {
            $this->$name = "";
        }
    }
}

$p = new Personne();

$p->nom = "Hachimi";
$p->prenom = "Sara";

echo $p->nom . PHP_EOL;

var_dump(isset($p->nom));

unset($p->nom);

var_dump(isset($p->nom));

$p->telephone = "0600000000";

// 3.1 :
// __set permet de modifier une propriété inaccessible.
// __get permet de lire une propriété inaccessible.
// __isset vérifie si la propriété est définie.
// __unset permet de supprimer ou réinitialiser une propriété.

// 3.2 :
// Sans __set, l'accès à une propriété private depuis l'extérieur
// provoque une erreur.
// Avec __set, on peut contrôler la modification de cette propriété.

// 3.3 :
// Oui, __set peut casser l'encapsulation si on accepte toutes les valeurs.
// Il faut vérifier les propriétés et valider les données.

// 3.4 :
// Le nom doit être non vide et contenir au moins 2 caractères.
// Sinon, on lance une InvalidArgumentException.
