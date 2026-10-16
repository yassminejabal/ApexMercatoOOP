# ApexMercatoOOP

Application web de gestion d'equipes de football, developpee en PHP oriente objet.

## Fonctionnalites

- Gestion des equipes, joueurs et entraineurs
- Creation, modification, affichage et suppression des donnees
- Suivi des budgets des equipes
- Transferts de joueurs et d'entraineurs entre equipes
- Gestion des contrats
- Vues selon les roles administrateur, journaliste et visiteur

## Technologies

- PHP
- MySQL
- PDO
- HTML et CSS

## Prerequis

- PHP avec l'extension PDO MySQL
- MySQL

## Installation et lancement

1. Clonez le depot :

   ```bash
   git clone https://github.com/yassminejabal/ApexMercatoOOP.git
   cd ApexMercatoOOP
   ```

2. Creez une base de donnees MySQL nommee `apexmercato_oop_php`.

3. Configurez la connexion dans `databese.php` avec les parametres de votre environnement.

4. Depuis le dossier du projet, lancez le serveur PHP integre :

   ```bash
   php -S localhost:8000
   ```

5. Ouvrez [http://localhost:8000](http://localhost:8000) dans votre navigateur.

> Le depot ne contient pas de script SQL d'initialisation. Creez les tables necessaires dans la base avant d'utiliser l'application.

## Structure du projet

- `lesclass/` : classes metier des equipes, joueurs, entraineurs et transferts
- `crud_equipe/` : operations de gestion des equipes
- `crud_jeur/` : operations de gestion des joueurs
- `coatch/` : operations de gestion des entraineurs
- `transforme/` et `transformecoatch/` : ecrans et traitements des transferts
- `html/` : vues de l'application

## Depot

[github.com/yassminejabal/ApexMercatoOOP](https://github.com/yassminejabal/ApexMercatoOOP)
