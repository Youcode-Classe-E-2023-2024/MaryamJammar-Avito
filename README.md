# Projet de Refactorisation Avito

## Objectif

Ce projet vise à redéfinir les modèles du site d'annonces Avito. Les tâches incluent la création d'un diagramme de cas d'utilisation, d'un diagramme de classes, et l'implémentation de code PHP/MySQL pour initialiser la base de données, insérer des données via un formulaire, et lire les données à partir de la base.

## Structure du Projet

Le projet est organisé en plusieurs étapes :

1. [Diagramme de Cas d'Utilisation](#1-diagramme-de-cas-dutilisation)
2. [Diagramme de Classes](#2-diagramme-de-classes)
3. [Initialisation de la Base de Données](#3-initialisation-de-la-base-de-données)
4. [Insertion de Données](#4-insertion-de-données)
5. [Lecture de Données](#5-lecture-de-données)

## 1. Diagramme de Cas d'Utilisation

![Diagramme de Cas d'Utilisation](path/to/your/use_case_diagram.png)

. Diagramme de Cas d'Utilisation
Le diagramme de cas d'utilisation représente les interactions entre les acteurs et les différentes fonctionnalités du système Avito.

Acteurs :
Utilisateur

Cas d'utilisation :
Consulter les annonces : Les utilisateurs peuvent consulter les annonces disponibles.
Ajouter une annonce : Les utilisateurs peuvent ajouter de nouvelles annonces.
Modifier une annonce : Les utilisateurs peuvent modifier les annonces.
Supprimer une annonce : Les utilisateurs peuvent supprimer les annonces.


## 2. Diagramme de Classes

![Diagramme de Classes](path/to/your/class_diagram.png)

Le diagramme de classes modélise les différentes entités et leurs relations dans le système Avito.

Classes :
Annonce
Utilisateur

Relations :

Un utilisateur peut ajouter plusieurs annonces.
Une annonce est creer par un seul utilisateur.

## 3. Initialisation de la Base de Données

### Schéma de la Base de Données

Description de la Base de Données Avito :

La base de données Avito est conçue pour stocker les informations relatives aux utilisateurs et aux annonces. Elle comporte trois tables principales : Utilisateurs, Annonces, et Categories.

Table Utilisateurs :
id_utilisateur (INT, Clé primaire) : Identifiant unique de l'utilisateur.
nom (VARCHAR(255)) : Nom de l'utilisateur.
email (VARCHAR(255)) : Adresse e-mail de l'utilisateur.

Table Annonces :
id_annonce (INT, Clé primaire) : Identifiant unique de l'annonce.
titre (VARCHAR(255)) : Titre de l'annonce.
description (TEXT) : Description détaillée de l'annonce.
id_utilisateur (INT, Clé étrangère vers Utilisateurs) : Référence à l'utilisateur qui a créé l'annonce.
id_categorie (INT, Clé étrangère vers Categories) : Référence à la catégorie à laquelle appartient l'annonce.
t de stocker de manière efficace les informations nécessaires pour gérer les utilisateurs, les annonces, et les catégories sur le site Avito. N'oubliez pas d'ajuster cette structure en fonction des besoins spécifiques de votre application.


