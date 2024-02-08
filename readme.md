# Roadmap Projet

## Installation

- [X] Installation de **Symfony** :

Installation d'un symfony complet : `symfony new sftshop --version="6.4.*" --webapp`

Installer le certificat pour gérer le https : `symfony server:ca:install`

Lancer le server web de symfony en tache de fond : `symfony serve -d` ou `symfony server:start -d`

- [X] **Installation** des **librairies** nécéssaires au projet :  

`composer require --dev doctrine/doctrine-fixtures-bundle fakerphp/faker jawira/doctrine-diagram-bundle knplabs/knp-paginator-bundle`

- [X] Lancement du **serveur de base de donnée** :

- Créer un fichier **compose.yml** avec **une base de donnée** **mariadb** et un **client sql** **adminer**
- Lancer les **containers dockers** : `docker-compose up -d` ou `docker compose up -d`

- [X] Connexion de **symfony** au **serveur de base de donnée** :

- Copy de **.env** en **.env.local**
- Mise à jour du fichier **.env.local** : 

`DATABASE_URL="mysql://root:root@127.0.0.1:3306/tshop?serverVersion=xx.xx.xx-MariaDB&charset=utf8mb4"`

- [X] Création de la base donnée : `symfony console doctrine:database:create` ou `symfony console d:d:c`

## Gestion des utilisateurs

- [X] Création d'un entité **client** : `symfony console make:user`  

- [X] Ajout des informations d'un client : 

```
symfony console make:entity 
Choisir l'entité Client

- Nom (string 50)
- Prénom (string 50)
- Age (integer)
- Adresse (string 255)
- Téléphone (string 255)
```

- [X] On effectue une **migration** :

**Migration** : `symfony console doctrine:migrations:diff` ou `symfony console make:migration`

**Migrate** : `symfony console doctrine:migrations:migrate` ou `symfony console d:m:m`


- [X] Formulaire d'**inscription** : `symfony console make:registration-form`  


- [X] **Authentification** : `symfony console make:auth`  


## Création des entitées

- [X] Entité **Taille** : 

```
symfony console make:entity Taille
- valeur (string 10)
```

- [X] Entité **Couleur** : 

```
symfony console make:entity Couleur
- valeur (string 10)
```

- [X] Entité **MoyenPaiement** : 

```
symfony console make:entity MoyenPaiement
- valeur (string 10)
```

- [ ] Entité **Produit** : 

```
symfony console make:entity Produit

- Nom (string 255)
- Prix (decimal)
- Description (text)
- Online (boolean)
- Image (string 255)
- Couleur (relation ManyToMany avec l'entité Couleur)
- Taille (relation ManyToMany avec l'entité Taille)
- Moyen de paiement (relation ManyToMany avec l'entité MoyenPaiement)
```

- [ ] On effectue une **migration** :

**Migration** : `symfony console doctrine:migrations:diff` ou `symfony console make:migration`

**Migrate** : `symfony console doctrine:migrations:migrate` ou `symfony console d:m:m`

## Fixtures

- [ ] Création des **fixtures** : 

- Une fixture pour les utilisateurs (**2**) : un **client** et un **admin** `ClientFixtures.php`
- Une fixture pour les produits (**30**) : **produit,taille,couleur,moyen de paiement** `ProduitFixtures.php`

- [ ] Lancement des *fixtures* :

`symfony console doctrine:fixtures:load` ou `symfony console d:f:l`

Lancer les **fixtures** sans validation : `symfony console d:f:l -n`

Ajouter des **fixtures** sans vider les tables : `symfony console d:f:l --append`

## Controllers

- [ ] Création des **controllers** :

Homepage : `symfony console make:controller Homepage`

Catalogue : `symfony console make:controller Catalogue`

Compte : `symfony console make:controller Compte`
 
RGPD : `symfony console make:controller Rgpd`

CGV : `symfony console make:controller Cgv`

## Crud

- [ ] Faire un **crud** pour les produits :

```
symfony console make:crud
Choisir la classe Produit
```

## Firewall

- [ ] Mettre à jour le **firewall** pour interdire l'accées à certaine route en fonction du **rôle** dans le fichier : **config/packages/security.yaml**

## Templates

- [ ] **Templates,CSS** :

- Créer un header : `_header.html.twig`
- Créer une navbar : `_navbar.html.twig`
- Créer un footer : `_footer.html.twig`
- Créer une feuille de style

## Pagination

- [ ] **Pagination** :

Ajouter de la pagination sur les pages :

- Index du crud du catalogue
- Page Catalogue

## Diagramme

- [ ] **Diagramme** de la base de donnée

Génerer un diagram **database.svg** : `symfony console doctrine:diagram`

Déplacer **database.svg** dans un dossier `public/data`

## Relecture et test

- [ ] Relire code,pages,readme,roadmap
- [ ] Test liens pages,crud

---

# Symfony final

## Projet

Vous allez devoir réaliser une boutique de vente de t-shirts nommé **TShop**.

Vous devez créer un système de **connexion** et d'**authentification**.

Un **admin** pourra gérer le catalogue des produits via un **dashboard**.

Dans ce **dashboard** l'**admin** pourra **ajouter,modifier,supprimer** un produit.

Le **header** de votre site web sera constitué du nom de votre boutique **TShop** qui est clickable et qui renvoie vers la homepage , il sera situé à l'extrême gauche , au centre une **navbar** qui contiendra :

- un lien **catalogue** qui renvoie vers le chemin **/catalogue**

A l'extrême droite de votre **header** vous devez avoir :

- un **avatar** générique pour un client non connecté et un **avatar** spécifique lorsque un client est connecté
- un bouton **déconnexion** lorsque on est connecté
- un bouton **compte** qui renvoie vers une page qui donne les informations du client connecté
- un bouton **connexion** que si on est pas connecté
- un bouton **inscription** que lorsque on est déconnecté
- un bouton **gestion catalogue** que si on est connecté en tant que **admin**

Le **footer** de votre site web sera constitué du nom de votre boutique **TShop** , l'**année en cours** , un lien vers une page sur les **Conditions générales de vente** et un lien vers une page sur la réglementation **RGPD**.


# Produit 

Les caractéristiques d'un produit (t-shirt) :

- Nom
- Prix
- Couleur
- Taille 
- Description
- Moyen de paiement
- Online (booléen)
- Image

# Client

Un client devra avoir les caractéristiques suivantes :

- Nom
- Prénom
- Age
- Adresse
- Téléphone
- Email
- Mot de passe

# Base de donnée

Utiliser la base de donnée **mariadb** , libre à vous de choisir une solution tel que : **xampp,wampp,docker**

Vous devez créer les tables suivants :

- Client
- Produit
- Taille [2XS,S,M,L,XL,2XL,3XL]
- Couleur [Beige,Blanc,Bleu,Gris,Jaune,Kaki,Marron,Noir,Orange,Rose,Rouge,Vert,Violet]
- Moyen de paiement [Carte bancaire,Chèque,Virement,Prélèvement]

Utiliser les **fixtures** pour :

- les informations d'un produit et respecter **exactement** les données de **taille,couleur et paiement**
- créer **30** produits , faire en sorte qu'il y ai des produits **online et offline**
- créer **2** utilisateurs via des fixtures , un client et un admin

## Les pages de votre site web

- **Homepage** : avoir du contenue à base de **lorem** pour présenter votre boutique
- **Catalogue** : page qui liste **6 produits** par **ordre de prix croissants** et **en ligne** avec une **pagination** , chaque produit devra être clickable afin d'afficher sur une page les informations du produit **image,nom,prix,couleur,taille,description,moyen de paiement**
- **Compte** : page qui donne les informations sur le client connecté
- **CGV** : Conditions générales de vente , mettez du vrai texte
- **RGPD** : Règlement général sur la protection des données , mettez du vrai texte

## Livrables

- Vos pages symfony dans un dépôt **github** nommé **sftshop**
- Diagramme de votre base de donnée dans un dossier **data** qui sera dans le dossier **public**

## Git

- Votre travail **final** se fera dans une branche nommée **developp**
- Vous devrez faire des commits fréquents (**atomiques**) 
- Travailler dans des branches , une branche par fonctionnalité , ne pas supprimer vos branches sur github
- **Attention** à ne pas laisser se balader vos informations de connexions à votre base de donnée sur github !

## Design

Utiliser aucun framework css , faire un minimum de css pour que vos pages soient présentables.

## Documentation

Documenter dans un **readme** toute votre démarche.

## Notation

- Git : /2
- Symfony logique (installation, routes, pages) : /6
- Symfony base de donnée : /4
- Symfony templates : /6
- Readme : /2

Soyer rigoureux dans votre travail , une attention au respect des consignes sera exigé.
