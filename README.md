# Veterinaire api

## Description

Ce projet est une API construite avec Symfony et API Platform. Il utilise plusieurs bundles et configurations pour fournir une API robuste et extensible.


## Installation

1. Clonez le dépôt :
    ```sh
    git clone <url-du-dépôt>
    ```

2. Installez les dépendances :
    ```sh
    composer install
    ```

3. Configurez les variables d'environnement en copiant le fichier `.env` :
    ```sh
    cp .env .env.local
    ```

4. Modifiez le fichier `.env.local` avec vos propres configurations.

## Utilisation

### Démarrer le serveur

Pour démarrer le serveur de développement, utilisez la commande suivante :
```sh
php bin/console server:run
```

### Exécuter les migrations

Pour exécuter les migrations de base de données, utilisez la commande suivante :
```sh
php bin/console doctrine:migrations:migrate
```

## Configuration

### API Platform

Le fichier de configuration principal pour API Platform se trouve dans `config/packages/api_platform.yaml`. Voici un extrait de ce fichier :

```yaml
api_platform:
    title: Hello API Platform
    version: 1.0.0
    formats:
        json: ['application/json']
        jsonld: ["application/ld+json"]
        multipart: ['multipart/form-data']
    error_formats:
        json: ['application/json']
        multipart: ['multipart/form-data']
    defaults:
        stateless: true
        cache_headers:
            vary: ['Content-Type', 'Authorization', 'Origin']
```

## Tests

Pour exécuter les tests, utilisez la commande suivante :
```sh
php bin/phpunit
```

## Contribution

- Maxence VANDEGHEN
- Jeff KNAFO
