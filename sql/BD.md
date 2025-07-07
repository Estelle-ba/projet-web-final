# Installation de la BDD

## Etape 1 :
### Configurez la BDD
- Ouvrez le fichier .env.example dans le dossier www/projet_election
- Changez le en fonction des informations de votre base de données
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_USERNAME=root
DB_PASSWORD=root
```
- Enlever le .example à la fin du nom du fichier

## Etape Bonus :
### Lancez les données de bases du site
- Ouvrez le dossier www/projet_election dans le terminal
- Lancez les commandes suivantes
``` bash
    php artisan db:seed
```

## Etape 2 :
### Lancez le serveur
- Ouvrez le dossier www/projet_election dans le terminal
- Lancez les commandes suivantes
``` bash
    php artisan
```
