Voici les informations pour mettre en place le site e-commerce Ma Quête de Rêve.

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
Dans environnement mysql, exécuter les opérations suivantes:
CREATE DATABASE maquettisme;
    (par défaut elle est en utf8mb4_general_ci ce qui reviendrai en explicitant à executer: 
    CREATE DATABASE maquettisme DEFAULT CHARACTER SET utf8mb4_general_ci;)
USE maquettisme;
source chemin_du_fichier/maquettisme.sql
4. Connexion à la base de données
Paramétrer le fichier db_config_access.php pour indiquer les paramètres de connexion à la base de
données:
    exemple:
    const MYSQL_HOST = 'localhost';
    const MYSQL_PORT = 3306;
    const MYSQL_NAME = 'maquettisme';
    const MYSQL_USER = 'root';
    const MYSQL_PASSWORD = '';

N.B. : Le fichier Connexion/config.php se réfère à ce fichier via la ligne : Require_once(“db_config_access.php”);

L’URL pour se connecter sur notre site est : http://localhost/Lotra3/pages/index.php



