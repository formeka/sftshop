# Symfony final

## Projet

Vous allez devoir réaliser une boutique de vente de t-shirts nommé **TShop**.

Vous devez créer un système de **connexion** et d'**authentification**.

Un **admin** pourra gérer le catalogue des produits via un **dashboard**.

Dans ce **dashboard** l'**admin** pourra **ajouter,modifier,supprimer** un produit.

Le **header** de votre site web sera constitué du nom de votre boutique **TShop** qui est clickable et qui renvoie vers la homepage , il sera situé à l'extrême gauche , au centre une **navbar** qui contiendra :

- un lien **catalogue** qui renvoie vers le chemin **/catalogue**
- un lien **compte** qui renvoie vers le chemin **/compte**

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
- Couleur [Beige,Blanc,Bleu,Gris,Jaune,Kaki,Marron,Noir,Orange,Rose,Rouge,Ver,Violet]
- Moyen de paiement [Carte bancaire,Chèque,Virement,Prélèvement]

Utiliser les **fixtures** pour :

- les informations d'un produit et respecter **exactement** les données de **taille,couleur et paiement**
- créer **30** produits , faire en sorte qu'il y ai des produits **online et offline**
- créer 2 utilisateurs via des fixtures , un client et un admin

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
