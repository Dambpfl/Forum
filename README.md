<h1>📋 Contexte du projet</h1>
Création d'un forum dans le but d'apprendre l'utilité d'un framework 

<h1>🎯 Objectifs pédagogiques</h1>

- Créer une interface utilisateur responsive et intuitive
- Implémenter un CRUD complet (Create, Read, Update, Delete)
- Gérer une base de données MySQL avec PHP
- Utiliser JavaScript pour des interactions dynamiques
- Pratiquer l'architecture MVC
- Apprendre à se servir d'un framework fait maison.

<h1>📝 Consignes</h1>

Si Admin :

- Possibilité de voir la liste des utilisateurs
- Possibilité de verrouiller un sujet
- Possibilité de supprimer n'importe quel sujet
- Possibilité de supprimer n'importe quel message
 
Si utilisateur :

- Possibilité de créer un sujet dans une catégorie
- Possibilité de poster un message
- Possibilité de supprimer le message qu'on a posté
 
Si visiteur :

- Possibilité de créer un compte
- Possibilité de se connecter
- Possibilité de voir les catégories
- Possibilité de voir les sujets
- Possibilité de voir les messages
 
Si le sujet est verrouillé -> impossible de poster un message et un cadenas apparaît pour les visiteurs et les utilisateurs
Si le visiteur n'est pas connecté -> impossible de poster un message

<h1>🔧 Technologies utilisées</h1>

<h2>Languages</h2>

- HTML5
- CSS3
- PHP 8
- Javascript
- SQL

<h2>Outils</h2>

- VSCode
- Laragon

<h1>💡 Concepts clés abordés</h1>

HTML/CSS
- Sémantique HTML5
- Flexbox et Grid
- Media queries
- Variables CSS

JavaScript
- Événements

PHP
- PDO et requêtes préparées
- Architecture MVC

SQL
- CRUD
- Clés primaires
- Clés étrangères

<h1>📦 Installation et configuration</h1>

<h2>Configuration de la base de données</h2>

- Cloner le repository
- Démarrer Laragon
- Accéder à HeidiSQL
- Charger le fichier SQL script_forum.sql

<h2>Configuration du projet</h2>

 Modifier les informations de connexion dans DAO.php
-  private static $host   = 'mysql:host=127.0.0.1;port=3306';  
-  private static $dbname = 'forum';  
-  private static $dbuser = 'root';  
-  private static $dbpass = '';  

<h1>🚀 Structure du projet</h1>


forum/  
│  
├── app/  
|   ├── AbstractController.php  
│   ├── Autoloader.php  
│   ├── ControllerInterface.php  
│   ├── DAO.php  
│   ├── Entity.php  
│   ├── Manager.php  
│   └── Session.php  
├── controller/  
|   ├── ForumController.php  
|   ├── HomeController.php  
│   └── SecurityController.php  
├── model/  
│   ├── entities/  
│   │   ├── Categorie.php  
│   │   ├── Message.php  
│   │   ├── Sujet.php  
│   |   └── Utilisateur.php  
│   └── managers/  
│       ├── CategorieManager.php  
│       ├── MessageManager.php  
│       ├── SujetManager.php  
│       └── UtilisateurManager.php  
├── public/  
│   ├── css/  
|   |   └── style.css  
│   └── js/  
|   |   └── main.js  
├── view/  
│   └── forum/  
│       ├── connexion.php  
│       ├── inscription.php  
│       ├── listCategories.php  
│       ├── listMessages.php  
│       ├── listSujets.php  
│       └── listUtilisateurs.php  
├──  home.php  
├──  layout.php  
├──  index.php  
│  
│  
├── MCD_forum.loo  
├── preview_MCDD_forum.png  
├── script_forum.sql   
│  
└── README.md  

<h1>✨ Démonstration</h1>
<h2>Captures d'écran</h2>

<h2>Admin</h2>

![image](https://github.com/user-attachments/assets/3a6a5973-d832-44f8-bde0-955b26639cd7)

![image](https://github.com/user-attachments/assets/5a262675-eb0f-44a6-9cc5-2a0cca95394d)

![image](https://github.com/user-attachments/assets/7e4662c5-3129-4b23-98e5-68ad2eb82214)


<h2>Utilisateur</h2>

![image](https://github.com/user-attachments/assets/2a222979-fd4f-4f36-90de-d1191ea307cc)

![image](https://github.com/user-attachments/assets/9326b186-3eff-424b-a5eb-580296e7f287)


<h2>Visiteur</h2>

![image](https://github.com/user-attachments/assets/73785c85-ab7f-4f1a-ab30-398c198eea41)

![image](https://github.com/user-attachments/assets/d13af1d7-d898-4ce1-b916-83b3fe4da371)

![image](https://github.com/user-attachments/assets/5616255c-5c1c-4cbd-b045-46087711b428)

![image](https://github.com/user-attachments/assets/46ab712b-08f7-47d3-86e8-e40a40561138)

![image](https://github.com/user-attachments/assets/ff11097b-a1d7-471d-ab4b-4a380dc038d1)

<h2>Responsive</h2>

![image](https://github.com/user-attachments/assets/e00bb900-2be7-4769-88a2-aae25693b17c)


![image](https://github.com/user-attachments/assets/ac51a53d-0aea-4b68-8cef-9dde7b3e6b69)

![image](https://github.com/user-attachments/assets/7e91e5f5-a241-4836-8317-d05e9ffa88ac)
