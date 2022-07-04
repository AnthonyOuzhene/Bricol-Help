# projet-bricol-help-back

# Cahier des charges du projet de Bricol' Help

## Contexte

### Présentation / Proposition initiale

un site sur le bricolage pour toute personne qui voudrait réaliser soi-même ses travaux ou demander de l’aide à des bricoleur’helpers en théorie mais également en pratique/physique.

### Objectif / Contextualisation

L’univers du bricolage s’étant hyper développé, chaque particulier peut se dire : “Je veux accrocher mon tableau au mur... mais comment faire ?” Un des premiers réflexes est d’aller se documenter sur le web et donc de se dire : "Ah tiens! Je vais aller voir sur Bricol’Help !”.

### Plan de développement

Equipe de 4 developpeurs WordPress: 2 développeurs Front (avec le Framework Vuejs) et 2 développeurs back pour une répartition comme suit :

- Gestion de projet (étude, cahier des charges, wireframes, suivi du dossier

Front :
- Intégration HTML/SASS
- Dynamisation avec framework Vuejs

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

- Page d'accueil avec navbar et les 5 derniers tutos
- Une liste de tutoriels de toutes les catégories
- Une liste de tutos par catégorie sélectionné
- Le détail d'un tuto
- Autres pages fixes

Les contenus seront crées via l'interface d'administration WordPress selon les rôles définis
(Role admin, Role bricoleur professionnel, Role bricoleur multi-tâches, Role bricoleur du dimanche)

### Interactions services

- système de géolocalisation pour trouver des aides physiques et poster des demandes (dans une prochaine version)

### Langue(s)

Site en français

### Arborescence

- Accueil
- Page accueil avec les 5 derniers articles affichés
- Page des liste de tous les tutos
- Page des liste des tutos par catégorie
- Page d'un tuto en particulier
- page A propos
- page contact (boîte à idée)
- (page connexion / inscription 
- page demande / offre  d'aide / (dans un futur version)

### Navigation sur le blog

- Un menu principal (_responsive_) avec navbar catégories de tutos et accueil.
  - petits écrans : un menu « burger » dans lequel se trouvent les liens
  - sinon : liste de liens visibles
- On peut cliquer sur une catégorie pour aller sur une page listant tous les tutos de cette catégorie.

### Templates / charte graphique

#### Layout global

- Une image d'en-tête avec logo + slogan
- "Navbar" qui regroupe :
  - Accueil
  - Liste des tutos
  - Liste des catégories
  - A propos
  - Contact
  - Connexion / inscription
  - Mes favoris (si connecté)
- Pied de page :
  - Bouton autoscoll vers haut

#### Détails d'un tuto

- Le détails d'un tuto regroupe une note, l'ajout en favori, le contenu du tuto et une pagination

### Contraintes techniques

- Site _responsive_ en _mobile-first_.
- Compatibilité uniquement avec les dernières versions des navigateurs (Chrome, Firefox, Microsoft Internet Explorer 11 et Edge).

## Spécifications techniques

### Architecture logicielle choisie

Le site sera conçu avec :

#### Côté front

- HTML5 : le code respectera une sémantique correcte.
- Sass : Préprocesseur compilé en CSS permettant d’apporter certaines fonctionnalités tel que l’imbrication des règles
- VueJs : pour animation et intégration dynamique.
- API localisation 

#### Côté back

- PHP : PHP7 sera utilisé.
- Wordpress (headless) : CMS pour gestion de contenu écrit en PHP avec une base de données de MySql. Dans le cadre de ce projet, WordPress sera utilisé pour gérer l’administration du site.
- MySQL : permettra de stocker & persister les données.

### Description des données

Tutorials :
- TITLE
- excerpt
- content
- image
- author
- date
- rating
- estimated_time

TOOLS :
- name
- slug
- image

CATEGORIE :
- name
- slug
- image

MATERIALS :
- name
- slug
- image

USER :
- email
- Adresse
- Firstname
- Lastname
- displayname
- avatar

ROLE :
- name

COMMENT :
- content