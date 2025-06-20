# 💘 App-Loove – README Technique

**App-Loove** est une application de rencontre locale construite en PHP, HTML, CSS et JavaScript, avec un système de matching basé sur les préférences cinématographiques.

## 🛠 Technologies utilisées

- **Langage principal** : PHP (back-end)
- **Front-end** : HTML, CSS, JavaScript Vanilla
- **Base de données** : MySQL
- **API** : The Movie Database
- **Hébergement local** : Serveur Apache via `localhost`

## 📁 Arborescence principale

app-loove/
│
├── index.php # Point d'entrée de l'application
├── Other/ # Page ne rentrant nul part
├── Back-end/
│ ├── Controller/ # Logique de gestion
│ ├── Model/ # Accès à la base de données
├── Front-end/
│ └── assets/ # CSS / JS
├── View/ # Affichage HTML
├── uploads/ # Images
└── README.txt

## 🚀 Installation

### Pré-requis
- PHP ≥ 7.4
- Serveur Apache (ou équivalent)
- MySQL
- Navigateur Web moderne

### Étapes

1. Clonez le dépôt dans le dossier de votre serveur local :
   git clone <repo_url> /var/www/html/app-loove
Importez la base de données :

Ouvrez phpMyAdmin ou utilisez la ligne de commande MySQL.

Importez le fichier : database/app-loove.sql

Lancez le serveur :

php -S localhost:8000
Ou ouvrez directement via :
http://localhost/app-loove/index.php?component=login

🔐 Authentification
Création de compte et login classiques (via formulaire)

💘 Fonctionnement du matching
Chaque utilisateur sélectionne 3 films

L’algorithme affiche un profil basé sur un score qui augementent en fonction du nombre de genre de film qui match

Si deux utilisateurs se likent → match enregistré

Match déclenche l’apparition de la messagerie

⚙️ Paramètres utilisateur
Gestion des préférences de confidentialité :

Compte privé

Anonymisation de la photo

Masquage du vrai nom

(En cours) : Système de premium & géolocalisation

📌 Limitations connues
Pas de validation JS côté client

Système Premium & Localisation non implémentés

Sécurité basique (pas d’anti-CSRF pour l’instant)

🙋‍♂️ Auteur
Julien Groult
