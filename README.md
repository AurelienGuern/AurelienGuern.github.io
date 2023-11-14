# Presentation

Ce projet est un template pour vos projets MVC en php.
Il utilise les librairies suivantes :
- AltoRouter
- Symfony/VarDumper

Il n'utilise pas de namespaces

# Installation

Au niveau de l'installation, rien de plus simple.
- Cloner le projet
- Copier tous les fichiers et dossier dans votre dossier de projet à vous
- Se rendre dans le dossier du projet
- `composer install` pour installer les dépendances
- Créer une base de donnée et la remplir avec les données que vous voulez
- Configurer le fichier `config.ini` en dupliquant le fichier `config.ini.sample` et en le renommant `config.ini`
- Rendez-vous sur l'URL du projet et tout est indiqué ! 

Si tout s'est bien passé, vous devriez avoir cette page qui s'affiche sur l'accueil de votre projet, pour vous indiquer les étapes pour faire votre première route.
 
>---
> Projet installé
> - Rendez-vous dans "index.php" pour ajouter une route
> - Ajouter un controller et une méthode liée à la route dans Controllers
> - Servez vous des Models pour faire des requêtes à la BDD
> - Pour finir, utilisez $this->show() et créer une vue dans Views pour afficher votre page !
> ---

# Utilisation

## Routing

On crée une route pour la fonctionnalité qu'on a à faire dans l'`index.php` présent dant le dossier `public` sous le commentaire `ROUTING HERE`.

Exemple de route : 
```php
$router->map('GET', '/', [
    'controller' => 'MainController',
    'method' => 'contact'
], 'contact');

// En POST
$router->map('POST', '/', [
    'controller' => 'MainController',
    'method' => 'contactSubmit'
], 'contact-submit');
```

Se référer à [la doc d'AltoRouter](https://dannyvankooten.github.io/AltoRouter//usage/install.html) pour plus de détail.

Ensuite il faut créer Le controller et la méthode liée (on oublie pas le require dans l'index)

On peut générer un lien depuis les vues avec la fonction `$router->generate()`. La variable `$router` est une variable globale qui est créée dans le fichier `index.php` et qui est accessible dans les sans require.

```php
// dans une view :
<a href="<?= $router->generate('contact') ?>">Contact</a>
```

## Controllers

On crée des controllers dans le dossier `app/Controllers`. Ils doivent hériter de la classe `CoreController` qui se trouve dans le même dossier pour avoir accès à la méthode `show()` qui permet d'afficher une vue.

```php
<?php
class MainController extends CoreController
{
  public function contact()
  {
    // Ici on code la logique qu'on veut
    // [...]

    // On affiche la vue
    $this->show('contact');
  }

  public function contactSubmit()
  {
    $this->show('contact-submit');
  }
}
```

On peut envoyer des paramètres à la vue en les passant en second paramètre de la méthode show().

```php
$this->show('contact', [
  'name' => 'John Doe',
  'age' => 42
]);

// --- Ou avec une variable
public function products() {
  $productModel = new Product();
  $products = $productModel->findAll();

  $this->show('products', [
    'products' => $products
  ]);
} 
```

On aura accès à cette variable dans la vue grâce à la variable `$viewData`. C'est un tableau associatif qui contient les valeurs qu'on lui envoi.

Ne pas oublier d'importer le controller avec un `require` dans l'`index.php`.

```php
<?php
// index.php
require_once __DIR__ . '/../app/Controllers/MainController.php';
```

## Views

Les vues sont dans le dossier `views` à la racine du projet. 

Les views seront affichées grâce la méthode show() du core controller.

Elles ont accès aux données transmises via la variable `$viewData`.

```php
// contact.tpl.php
<h1>Contact</h1>

<p>Mon nom est <?= $viewData['name'] ?> et j'ai <?= $viewData['age'] ?> ans.</p>
```

## Models

Les modèles sont des classes qui permettent de faire des requêtes vers la base de données, et qui représentent les données d'une table.

Un modèle doit contenir autant de propriété que de colonnes dans la table, avec les mêmes noms. Chacune doit avoir un `getter` et `setter` de lié.

Pour faire des requêtes on utilise la classe `Database`, qui nous permet de récupérer une instance de `PDO`. Il faut donc suivre la doc de `PDO` pour faire des requêtes ensuite.

```php 
class Product extends CoreModel {
  private $name;
  private $price;
  private $picture;

  // Exemple de requête pour tout récupérer depuis une table
  public function findAll() {
    $sql = 'SELECT * FROM product';
    $pdo = Database::getPDO();
    $pdoStatement = $pdo->query($sql);
    $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Product');
    return $results;
  }

  // Pareil pour récupérer un élément par son id
  public function find($id) {
    $sql = 'SELECT * FROM product WHERE id = ' . $id;
    $pdo = Database::getPDO();
    $pdoStatement = $pdo->query($sql);
    $result = $pdoStatement->fetchObject('Product');
    return $result;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }

  // ... Tous les autres getters et setters pour $price et $picture
}
```

On utilise le modèle ensuite ou on veut dans nos controllers : 

```php
// dans un controller
public function shop() {
  $productModel = new Product();
  $products = $productModel->findAll();

  $this->show('shop', [
    'products' => $products
  ]);
}
```

On n'oublie pas de l'importer avec un `require` dans l'`index.php` pour qu'il soit accessible partout.

```php
<?php
// index.php
require_once __DIR__ . '/../app/Models/Product.php';
```

## Debugging 

Pour le débug, on peut utiliser la fonction `dump()` ou `dd()` (dump and die) de symfony.

```php
dump($myVar);
dd($myVar);
```

## TODO

- [ ] Ajouter les namespaces
- [ ] Ajouter des méthodes de bases dans le CoreModel
- [ ] Simplifier l'accès aux données dans la vue. Ici on doit passer par `$viewName`. Ça serait top d'avoir accès directement aux variables ! Faut trouver un moyen ...
- [ ] Ajouter un système de connexion utilisateur
- [ ] Ajouter un système de backoffice
- [ ] Créer des lignes de commandes pour créer des controllers, models, etc. :O

## Des questions ? 

Contacter Alexis :D 
