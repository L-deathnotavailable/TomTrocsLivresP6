# TomTroc

TomTroc est une association à but non lucratif dont le but est d’encourager le partage des livres et de créer des rencontres entre lecteurs. Notre plateforme met en relation des particuliers qui souhaitent échanger des livres afin de donner une seconde vie aux livres qui ne sont plus utilisés.

## Description

TomTroc vise à créer une plateforme conviviale où les membres peuvent facilement se connecter, communiquer et organiser des échanges de livres en toute simplicité. Ce projet a été développé en utilisant le modèle MVC en PHP, en respectant les principes de la programmation orientée objet (POO).

## Technologies Utilisées

- PHP
- HTML
- CSS
- Git et GitHub pour le versionnage du code

## Installation

Pour installer et configurer le projet localement, suivez ces étapes :

1. **Clonez le projet :**

   ```bash
   git clone https://github.com/votre-utilisateur/tomtroc.git
   ```

2. **Importation de la base de données :**

   Importez le fichier `TomTroc.sql` dans votre base de données MySQL. Vous pouvez le faire via phpMyAdmin ou en utilisant la commande suivante :

   ```bash
   mysql -u votre_utilisateur -p votre_base_de_donnees < TomTroc.sql
   ```

3. **Configuration :**

   Modifiez le fichier `config/config.php` pour adapter les paramètres de connexion à votre base de données :

   ```php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'tomtroc');
   define('DB_USER', 'root');
   define('DB_PASS', 'root');
   ```

## Déploiement

Pour déployer le projet, assurez-vous que votre serveur web est configuré pour exécuter des applications PHP. Placez le projet dans le répertoire approprié de votre serveur web et assurez-vous que les permissions sont correctement configurées.

## Comptes de Test

Pour tester la plateforme, vous pouvez utiliser les comptes suivants :

- **Email :** Elizabeth@free.fr
  **Mot de passe :** Labillenefaitepaslemoine

- **Email :** LucJedi@gmail.com
  **Mot de passe :** Jesuislucetjevaisbien

## Auteurs

- Laurie

## Remerciements

Merci à tous ceux qui ont contribué à ce projet et à l'association TomTroc pour leur confiance et leur soutien.
