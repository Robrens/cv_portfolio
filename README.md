# CV Portfolio — Jean-Baptiste Baudu

[![CI](https://github.com/Robrens/cv_portfolio/actions/workflows/ci.yml/badge.svg?branch=develop)](https://github.com/Robrens/cv_portfolio/actions/workflows/ci.yml)

Site CV personnel développé avec Laravel. Il présente mon profil, mes compétences techniques, mon parcours professionnel, ma méthode de travail et mes centres d’intérêt.

Le projet sert également de démonstration de mes compétences en développement applicatif, administration de contenu, intégration responsive, automatisation et déploiement.

## Fonctionnalités

- Présentation dynamique du profil et du parcours
- Compétences organisées par catégories
- Expériences professionnelles avec détails affichés dans une fenêtre modale
- Présentation de la méthode de travail
- Section consacrée aux passions avec intégration Spotify
- Téléchargement du CV
- Liens vers les profils sociaux
- Interface d’administration basée sur Filament
- Activation, désactivation et réorganisation des contenus
- Design responsive pour mobile, tablette et ordinateur
- Pages de mentions légales et de politique de confidentialité
- Métadonnées SEO administrables
- Données structurées Schema.org de type `Person`
- Génération dynamique de `robots.txt` et `sitemap.xml`
- Tests automatisés et contrôle de la qualité du code avec GitHub Actions

## Stack technique

### Backend

- PHP 8.3 ou supérieur
- Laravel 13
- Filament 4
- PostgreSQL
- Eloquent ORM
- PHPUnit

### Frontend

- Blade
- Alpine.js
- TypeScript
- Tailwind CSS 4
- SCSS
- Vite 8
- Heroicons
- Yarn 4

### Qualité et automatisation

- Laravel Pint
- ESLint
- Prettier
- GitHub Actions
- Audit des dépendances Composer et JavaScript

## Aperçu du projet

Le site est construit autour de plusieurs sections :

- une introduction présentant le profil et la recherche actuelle ;
- une synthèse de l’expérience et des compétences ;
- des catégories de compétences techniques ;
- une chronologie du parcours professionnel ;
- une présentation de la méthode de travail ;
- une section dédiée aux passions ;
- un appel à la prise de contact.

Les contenus ne sont pas codés directement dans les vues. Ils sont enregistrés en base de données et administrables depuis le tableau de bord Filament.

## Installation locale

### Prérequis

L’environnement local doit disposer de :

- PHP 8.3 ou supérieur ;
- Composer 2 ;
- PostgreSQL ;
- Node.js ;
- Corepack ;
- Yarn 4.3.1.

### Récupération du projet

```bash
git clone https://github.com/Robrens/cv_portfolio.git
cd cv_portfolio
git switch develop
```

### Installation des dépendances PHP

```bash
composer install
```

### Installation des dépendances JavaScript

Le projet utilise Yarn et non npm.

```bash
corepack enable
yarn install --immutable
```

### Configuration de Laravel

```bash
cp .env.example .env
php artisan key:generate
```

Configurer ensuite la connexion PostgreSQL dans le fichier `.env` :

```dotenv
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=cv_portfolio
DB_USERNAME=postgres
DB_PASSWORD=
```

Les identifiants présents ici sont uniquement des exemples. Les véritables identifiants ne doivent jamais être commités dans le dépôt.

### Création de la base de données

Créer la base PostgreSQL correspondant à la valeur de `DB_DATABASE`, puis exécuter les migrations :

```bash
php artisan migrate
```

Créer également le lien symbolique nécessaire aux fichiers publics :

```bash
php artisan storage:link
```

### Création du compte administrateur

```bash
php artisan make:filament-user
```

Le tableau de bord permet ensuite de créer le profil et les différents contenus nécessaires à l’affichage du site.

> La page d’accueil nécessite au moins un profil enregistré. En l’absence de profil, Laravel retourne volontairement une réponse 404.

## Lancement en développement

Dans un premier terminal :

```bash
php artisan serve
```

Dans un second terminal :

```bash
yarn dev
```

L’application est alors accessible, par défaut, à l’adresse :

```text
http://127.0.0.1:8000
```

Le tableau de bord d’administration est accessible depuis la route configurée pour le panneau Filament.

## Variables d’environnement

Les principales variables propres au projet sont documentées dans `.env.example`.

### Application

```dotenv
APP_NAME="CV Portfolio"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000
```

### Administrateur

```dotenv
ADMIN_EMAIL=
```

### Mentions légales

```dotenv
LEGAL_PUBLISHER_NAME=
LEGAL_CONTACT_EMAIL=
LEGAL_HOST_NAME=
LEGAL_HOST_ADDRESS=
LEGAL_HOST_PHONE=
LEGAL_HOST_WEBSITE=
LEGAL_SERVER_LOG_RETENTION_DAYS=30
LEGAL_CONTACT_RETENTION_MONTHS=6
```

Les valeurs sensibles ou personnelles doivent rester dans le fichier `.env`, qui ne doit pas être suivi par Git.

## Commandes utiles

### Tests Laravel

```bash
php artisan test
```

Ou avec le script Composer prévu par le projet :

```bash
composer test
```

### Vérification du formatage PHP

```bash
vendor/bin/pint --test
```

### Correction du formatage PHP

```bash
vendor/bin/pint
```

### Vérification du code TypeScript

```bash
yarn lint
```

### Correction automatique avec ESLint

```bash
yarn lint:fix
```

### Vérification du formatage frontend

```bash
yarn format:check
```

### Application du formatage frontend

```bash
yarn format
```

### Build de production

```bash
yarn build
```

## Intégration continue

Le workflow GitHub Actions est exécuté lors des pushes et des pull requests visant les branches `master` et `develop`.

Il comprend trois parties.

### Backend

- démarrage d’un service PostgreSQL 18 ;
- validation de la configuration de la CI ;
- installation de PHP 8.5 et des extensions nécessaires ;
- validation des fichiers Composer ;
- installation des dépendances PHP ;
- vérification du formatage avec Laravel Pint ;
- exécution des migrations ;
- vérification de la connexion PostgreSQL ;
- exécution des tests Laravel.

### Frontend

- installation de Node.js 24 ;
- activation de Corepack ;
- installation immuable des dépendances Yarn ;
- vérification du code TypeScript avec ESLint ;
- vérification du formatage avec Prettier ;
- compilation des fichiers de production avec Vite.

### Sécurité

Sur la branche `master`, le workflow effectue également :

- un audit des dépendances Composer ;
- un audit des dépendances JavaScript présentant une sévérité élevée.

La CI utilise des variables et secrets GitHub Actions pour la connexion PostgreSQL :

| Type | Nom |
| --- | --- |
| Variable | `DB_CONNECTION` |
| Variable | `DB_HOST` |
| Variable | `DB_PORT` |
| Secret | `DB_DATABASE` |
| Secret | `DB_USERNAME` |
| Secret | `DB_PASSWORD` |

## Structure principale

```text
app/
├── Filament/             Ressources du tableau de bord
├── Http/Controllers/     Contrôleurs HTTP et SEO
└── Models/               Modèles Eloquent

database/
├── factories/            Fabriques utilisées par les tests
├── migrations/           Structure de la base de données
└── seeders/              Données locales ou de démonstration

resources/
├── css/                  Styles Tailwind
├── js/                   Scripts TypeScript et composants Alpine.js
├── scss/                 Architecture SCSS
└── views/                Vues Blade et composants

routes/
└── web.php               Routes publiques de l’application

tests/
├── Feature/              Tests fonctionnels
└── Unit/                 Tests unitaires
```

## Principes du projet

Le projet cherche à rester simple, crédible et maintenable :

- Blade et Alpine.js sont privilégiés pour éviter une couche JavaScript inutile ;
- les contenus sont séparés de leur présentation ;
- les données sensibles sont fournies par les variables d’environnement ;
- les migrations Laravel décrivent la structure de la base ;
- les éléments administrables peuvent être activés et ordonnés ;
- les sorties Blade sont échappées par défaut ;
- les pages publiques ne proposent pas de fonctionnalité dynamique inutile ;
- l’interface est pensée en mobile first et reste utilisable au clavier.

## Déploiement envisagé

L’application est destinée à être hébergée sur un VPS avec :

- Nginx ;
- PHP-FPM ;
- PostgreSQL ;
- HTTPS avec Let’s Encrypt ;
- déploiement automatisé depuis GitHub Actions ;
- sauvegarde régulière de la base de données et des fichiers téléversés.

Les fichiers `.env`, les clés privées, les mots de passe et les autres secrets ne doivent jamais être stockés dans le dépôt.
