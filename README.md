# projet-bricol-help-back

# Cahier des charges du projet de Bricol' Help

## Contexte

### Présentation / Proposition initiale

un site sur le bricolage pour toute personne qui voudrait réaliser soi-même ses travaux ou demander de l’aide à des bricoleur’helpers en théorie mais également en pratique/physique.

### Objectif / Contextualisation

L’univers du bricolage s’étant hyper développé, chaque particulier peut se dire : “Je veux accrocher mon tableau au mur... mais comment faire ?” Un des premiers réflexes est d’aller se documenter sur le web et donc de se dire : "Ah tiens! Je vais aller voir sur Bricol’Help !”.

### Plan de développement

Equipe de 4 developpeurs WordPress: 2 développeurs Front (avec le Framework Vuejs) et 2 développeurs back pour une répartition comme suit :

- Gestion de projet (étude, cahier des charges, wireframes, suivi du dossier)
- Création de maquettes graphiques originales

Front :
- Intégration HTML/SASS/Vuejs

Back :
- Création & connexion BDD
- Création CPT
- Création taxonomy
- Création Roles
- Sécurité (Cors)
- Routes Api json

- Tests et mise en production (MEP)

### Délai

Quatre semaines à compter de la validation du projet réparti comme ci-dessous :
Sprint 0 : Gestion de projet
Sprint 1 & 2 : Code de fonctionnalités
Sprint 3 : Revue de code

## Spécifications fonctionnelles

### Apparence

- Ambiance "fun"
- Site responsive, _mobile-first_.

### Contenus

- Page d'accueil avec barre de recherche par ville
- Une liste de boulangerie proposées selon la ville renseignée
- Des des produits à ajouter au panier selon la boulangerie sélectionnée
- Un panier pour passer commande

Les contenus seront crées via une interface d'administration selon les rôles définis. (Role admin, Role partenaire, Role user)

### Interactions services

- Paiement en ligne (via stripes dans une prochaine version)

### Langue(s)

Site en français

### Arborescence

- Accueil
- Page accueil avec filtre de recherche par ville + miniatures par catégorie
- Page des liste de boulangerie à proximité
- Page des liste des produits par bouangerie
- Page panier
- (A propos)
- (Mentions légales)
- (Blog)

### Navigation sur le blog

- Un menu principal (_responsive_) avec navbar catégories de produitset accueil.
  - petits écrans : un menu « burger » dans lequel se trouvent les liens
  - sinon : liste de liens visibles
- On peut cliquer sur une catégorie pour aller sur une page listant tous les produits de cette catégorie.

### Templates / charte graphique

#### Layout global

- Une image d'en-tête avec titre + slogan (baseline)
- "Navbar" qui regroupe :
  - Accueil
  - Liste des catégories
  - A propos
  - blog
- Pied de page :
  - Liens vers backoffice, a propos, mentions légales

#### Liste des boulangeries

- Apres avoir renseigné sa ville dans la page d'accueil, s'affiche la liste les boulangeries à proximité (distance à déterminer).
- La liste des boulangeries regroupe une note, ses informations de contact et ajout en favori

### Contraintes techniques

- Site _responsive_ en _mobile-first_.
- Compatibilité uniquement avec les dernières versions des navigateurs (Chrome, Firefox, Microsoft Internet Explorer 11 et Edge).

## Spécifications techniques

### Architecture logicielle choisie

Le site sera conçu avec :

#### Côté front

- HTML5 : le code respectera une sémantique correcte.
- CSS : dans sa version 2 ou 3, pour rester compatible avec Internet Explorer 11. L'utilisation d'un framework pour le _responsive_/_mobile-first_ est envisagé.
- React / Redux : pour animation et intégration dynamique.
- API localisation 

#### Côté back

- PHP : PHP7 sera utilisé.
- Symfony : framework PHP avec route API json pour connexion avec Front +  Vue en twig pour le backoffice
- MySQL : permettra de stocker & persister les données.

### Description des données

BOULANGERIE :
- Nom
- Adresse
- Code postale
- Image de la boutique
- Numéro de téléphone
- Note
- Frais de livraison
- Délai de livraison

PRODUIT :
- Nom
- Prix
- Description
- Photo

CATEGORIE :
- Nom

COMMANDE :
- Prix total
- Date de commande

UTILISATEURS :
- Nom
- Adresse
- Email
- Mot de passe
- Role