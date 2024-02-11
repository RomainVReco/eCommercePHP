Voici les informations pour mettre en place le site "Ma Quête de Rêve".

Remarque importante: les images présentes sur ce site sont à un usage de démonstration uniquement. 
 Il est strictement interdit de les utiliser à des fins commerciales ou personnelles  
 sans l'autorisation préalable du détenteur des droits d'auteur.

0. Le contexte

Ce site a été réalisé dans le cadre d'un projet d'étude avec un de mes camarades.

Le but du projet : nous mettre en condition réelle pour mettre en oeuvre nos connaissances.

Nous sommes en filière de reconversion professionnelle pour devenir développeur web Full Stack.
La formation a débuté en octobre 2023.

Nous avons été initié à PHP le lundi 15/1/24 et notre projet s'est déroulé
du 17 au 23/1 (soit un total de 5 jours ouvrés) avec présentation devant nos pairs le 24/1/24.

Nous avons travaillé sur le projet dans le cadre d'un sprint:
    - définition des users stories
    - échanges réguliers avec le Product Owner (P.O.) pour définir les priorités
    et s'assurer que nous répondions bien aux exigences du cahier des charges
    - répartition des tâches entre nous (utilisation de Trello)
    - réalisation d'un point quotidien (daily) + échanges constants entre nous
    - développement en collaboration - avec l'outil Git (dépôt sur la plateforme GitHub)

Notre installation a été faite avec XAMPP (Apache Php Mysql).


1. Démarrer Apache – mysql

Dans la fenêtre XAMPP Control Panel, vous verrez une liste de services tels qu'Apache, MySQL,
FileZilla, etc.
Pour démarrer Apache, cliquez sur le bouton "Start" à côté de "Apache".
Pour démarrer MySQL, cliquez sur le bouton "Start" à côté de "MySQL".


2. Arborescence serveur web

Depuis une fenêtre terminal:
Se positionner dans le répertoire racine du serveur web:
(htdocs pour XAMPP)
Cloner l'arborescence depuis GitHub:
git clone git@github.com:Lotratemi/Lotra3.git


3. Base de données

Sur le dépôt GitHub, le fichier d'export de la base se trouve dans Connexion/maquettisme.sql

Dans un environnement mysql, exécuter les opérations suivantes:
CREATE DATABASE maquettisme;
    (par défaut elle est en utf8mb4_general_ci ce qui reviendrai en explicitant à executer: 
    CREATE DATABASE maquettisme DEFAULT CHARACTER SET utf8mb4_general_ci;)
USE maquettisme;
source chemin_du_fichier/maquettisme.sql


4. Connexion à la base de données

Dans le répertoire Connexion,
paramétrer le fichier db_config_access.php pour indiquer les paramètres de connexion à la base de
données:
    exemple de contenu:
    const MYSQL_HOST = 'localhost';
    const MYSQL_PORT = 3306;
    const MYSQL_NAME = 'maquettisme';
    const MYSQL_USER = 'root';
    const MYSQL_PASSWORD = '';

    N.B. : Le fichier Connexion/config.php se réfère à ce fichier via la ligne : Require_once(“db_config_access.php”);


5. Connexion au site

L’URL pour se connecter sur notre site est : http://localhost/Lotra3/pages/index.php


6. Evolutions à venir

Ce site de e-commerce nous a permis de voir des notions très intéressantes dans le cadre de PHP, notamment :
    - les formulaires (GET, POST)
    - les sessions (transmission d'informations d'une page web à une autre)
Nous avons pu interagir avec la base de données dans les différents aspects fondamentaux possibles :
    CRUD: Create, Read, Update, Delete

La réalisation d'un site web dynamique avec stockage des informations dans une base de données nous ouvre beaucoup
de perspectives. Nous avons hâte de les explorer à présent.

Notre site n'est pas parfait bien évidemment, mais nous avons à coeur de travailler pour l'améliorer.

Merci pour vos retours concernant les axes de progrès.

Notre formation est intense, et nous aurons peu de temps disponible dans l'immédiat, mais nous aimerions pouvoir
poursuivre ce projet pour le pousser plus loin.






