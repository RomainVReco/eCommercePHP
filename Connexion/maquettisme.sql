-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 24 jan. 2024 à 12:03
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `maquettisme`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `login_employe` varchar(50) NOT NULL,
  `id_role` int(11) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `login_employe`, `id_role`, `mot_de_passe`) VALUES
(1, 'philippe', 1, 'amer'),
(2, 'romain', 2, 'épicé'),
(3, 'mickey', 3, 'mousse');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(30) NOT NULL,
  `image_categorie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `nom_categorie`, `image_categorie`) VALUES
(1, 'Maquette militaire', 'Ressources/assets_categories/maquette-char.jpg'),
(2, 'Maquette moto', 'Ressources/assets_categories/maquette-moto.jpg'),
(3, 'Maquette voiture', 'Ressources/assets_categories/maquette-voiture.jpg'),
(4, 'Peinture XF', 'Ressources/assets_categories/peinture-acr.jpg'),
(5, 'Peinture Bombe', 'Ressources/assets_categories/peinture-bombe.jpg'),
(6, 'Pinceaux', 'Ressources/assets_categories/pinceaux.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `nom_client` varchar(50) NOT NULL,
  `prenom_client` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `code_postal` varchar(10) NOT NULL,
  `id_pays` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `ville` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id_commande` int(11) NOT NULL,
  `date_commande` date NOT NULL,
  `total_commande` decimal(8,2) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `hash_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id_commande`, `date_commande`, `total_commande`, `id_client`, `hash_code`) VALUES
(24, '2024-01-24', 67.97, 0, '37fd41afb73990b29a2c8cd07a7bd82c711b0c382b837507bc3488ea68dfa6ad'),
(25, '2024-01-24', 0.00, 0, '2a7bf1bbf9b8055ef1de56afc11276e25204b16c49e1ede89f7b19b16d5130c8'),
(26, '2024-01-24', 0.00, 0, '2a7bf1bbf9b8055ef1de56afc11276e25204b16c49e1ede89f7b19b16d5130c8'),
(27, '2024-01-24', 0.00, 0, '2a7bf1bbf9b8055ef1de56afc11276e25204b16c49e1ede89f7b19b16d5130c8'),
(28, '2024-01-24', 0.00, 0, '2a7bf1bbf9b8055ef1de56afc11276e25204b16c49e1ede89f7b19b16d5130c8'),
(29, '2024-01-24', 0.00, 0, '2a7bf1bbf9b8055ef1de56afc11276e25204b16c49e1ede89f7b19b16d5130c8'),
(30, '2024-01-24', 0.00, 0, '2a7bf1bbf9b8055ef1de56afc11276e25204b16c49e1ede89f7b19b16d5130c8'),
(31, '2024-01-24', 0.00, 0, '2a7bf1bbf9b8055ef1de56afc11276e25204b16c49e1ede89f7b19b16d5130c8'),
(32, '2024-01-24', 0.00, 0, '2a7bf1bbf9b8055ef1de56afc11276e25204b16c49e1ede89f7b19b16d5130c8'),
(33, '2024-01-24', 0.00, 0, '2a7bf1bbf9b8055ef1de56afc11276e25204b16c49e1ede89f7b19b16d5130c8'),
(34, '2024-01-24', 0.00, 0, '2a7bf1bbf9b8055ef1de56afc11276e25204b16c49e1ede89f7b19b16d5130c8'),
(35, '2024-01-24', 0.00, 0, '2a7bf1bbf9b8055ef1de56afc11276e25204b16c49e1ede89f7b19b16d5130c8'),
(36, '2024-01-24', 0.00, 0, '2a7bf1bbf9b8055ef1de56afc11276e25204b16c49e1ede89f7b19b16d5130c8'),
(37, '2024-01-24', 0.00, 0, '2a7bf1bbf9b8055ef1de56afc11276e25204b16c49e1ede89f7b19b16d5130c8'),
(38, '2024-01-24', 0.00, 0, '2a7bf1bbf9b8055ef1de56afc11276e25204b16c49e1ede89f7b19b16d5130c8'),
(39, '2024-01-24', 0.00, 0, '2a7bf1bbf9b8055ef1de56afc11276e25204b16c49e1ede89f7b19b16d5130c8'),
(40, '2024-01-24', 0.00, 0, '2a7bf1bbf9b8055ef1de56afc11276e25204b16c49e1ede89f7b19b16d5130c8'),
(41, '2024-01-24', 70.99, 0, '7da128d2af6ffa30bb03db98b7a2b78018feebc3f299b8986c610b4181854482');

-- --------------------------------------------------------

--
-- Structure de la table `commande_produit`
--

CREATE TABLE `commande_produit` (
  `id_commande` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` decimal(8,2) NOT NULL,
  `total_ligne` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande_produit`
--

INSERT INTO `commande_produit` (`id_commande`, `id_produit`, `quantite`, `prix`, `total_ligne`) VALUES
(24, 15, 1, 21.99, 21.99),
(24, 16, 2, 22.99, 45.98),
(41, 17, 1, 70.99, 70.99);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id_commentaire` int(11) NOT NULL,
  `description` text NOT NULL,
  `notation` int(11) NOT NULL,
  `date_publication` date NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `liste_cat_admin`
--

CREATE TABLE `liste_cat_admin` (
  `id_cat_admin` int(11) NOT NULL,
  `nom_cat_admin` varchar(50) NOT NULL,
  `page_php` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `liste_cat_admin`
--

INSERT INTO `liste_cat_admin` (`id_cat_admin`, `nom_cat_admin`, `page_php`) VALUES
(1, 'Produits', 'produits_admin.php'),
(2, 'Clients', 'clients_admin.php'),
(3, 'Commandes', 'commandes_admin.php'),
(4, 'Catégories', 'categories_admin.php'),
(5, 'Marques', 'marques_admin.php'),
(6, 'Pays', 'pays_admin.php'),
(7, 'Rôles', 'roles_admin.php'),
(8, 'Commentaires', 'commentaires_admin.php');

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `id_marque` int(11) NOT NULL,
  `nom_marque` varchar(50) NOT NULL,
  `id_pays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `marques`
--

INSERT INTO `marques` (`id_marque`, `nom_marque`, `id_pays`) VALUES
(1, 'Tamiya', 1),
(2, 'Revell', 2),
(3, 'Trumpeter', 3),
(4, 'Hobby Boss', 4),
(5, 'Heller', 5),
(6, 'Italeri', 6),
(7, 'Zvezda', 7),
(8, 'Corel', 8),
(9, 'Ace', 9),
(10, 'Esprit Maquette', 10);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id_pays` int(11) NOT NULL,
  `nom_pays` varchar(50) NOT NULL,
  `parcelable` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id_pays`, `nom_pays`, `parcelable`) VALUES
(1, 'Austria', 1),
(2, 'Belgium', 1),
(3, 'Bulgaria', 1),
(4, 'Canada', 0),
(5, 'Croatia', 1),
(6, 'Cyprus', 1),
(7, 'Czech Republic', 1),
(8, 'Denmark', 1),
(9, 'Estonia', 1),
(10, 'Finland', 1),
(11, 'France', 1),
(12, 'Germany', 1),
(13, 'Greece', 1),
(14, 'Hungary', 1),
(15, 'Ireland', 1),
(16, 'Italy', 1),
(17, 'Latvia', 1),
(18, 'Lithuania', 1),
(19, 'Luxembourg', 1),
(20, 'Malta', 1),
(21, 'Netherlands', 1),
(22, 'Poland', 1),
(23, 'Portugal', 1),
(24, 'Romania', 1),
(25, 'Slovakia', 1),
(26, 'Slovenia', 1),
(27, 'Spain', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int(11) NOT NULL,
  `nom_produit` varchar(255) NOT NULL,
  `echelle` varchar(10) DEFAULT NULL,
  `id_categorie` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` decimal(8,2) NOT NULL,
  `id_marque` int(11) NOT NULL,
  `description` text NOT NULL,
  `age_recommande` varchar(4) NOT NULL,
  `reference_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `nom_produit`, `echelle`, `id_categorie`, `quantite`, `prix`, `id_marque`, `description`, `age_recommande`, `reference_image`) VALUES
(10, 'Product 2', 'Small', 2, 50, 29.99, 1, 'A description for Product 2.', '3-8', '1-12-ducati-superleggera.jpeg'),
(11, 'Pinceaux Lot 3', '', 6, 76, 19.99, 3, 'Un lot de 3 magnifiques pinceaux', '10+', 'weather-master-applicatorpinsel.jpeg'),
(12, 'Une belle voiture', '', 3, 4, 79.99, 9, 'A description for Product 4.', '16+', '711aWYuUXpL.jpeg'),
(13, 'Jambon', '1/35', 5, 15, 9.99, 3, 'Description Jambon', '9+', 'x-11-chrome-silver-gloss-10ml.jpeg'),
(14, '1:35 Bundeswehr Flak-Panzer Gepard', '1/35', 1, 10, 26.49, 1, 'This is a 1/35 scale plastic model assembly kit depicting the Gepard, a post-WWII anti-aircraft tank operated by West Germany.★From the 4km-range 35mm cannons to the radar equipment front and rear, the form of the tank is captured in style. ★Features moving barrel and radar depictions, plus opening turret rear hatches. ★Metal net is included in the kit to recreate engine deck grille details. ★Comes with a commander figure in beret.', '14+', '1_35 Bundeswehr Flak-Panzer-Gepard.jpeg'),
(15, '1:35 WWII Ger.SdKfz.171 Panther A', '1/35', 1, 35, 21.99, 1, 'In the beginning of 1942, in order to fight against the T-34, the German military ordered a new tank from Dymler-Benz and M.A.N. companies with the following specifications:Weight- 35 tons; speed- 60 km/h; armament 75mm long gun and armour, 60mm thick in front hull, 35mm thick in the rear and 100 mm at the front of the gun turret.Lastly, it was specified that the tank be equipped with a Maiback HL210, water-cooled, V-type 12 cylinder engine. In May of the same year, M.A.N.\'s model was chosen without waiting for completion of a prototype tank. However, there were 2 important modifications. First, in order to meet the military\'s demand, considerably more than the original 35 ton weight was needed. Second, the military ordered a change in the thickness of the frontal armour from 60mm to 80mm.Because of these changes, the engine type had to be chanded from HL210 to HL230. Then, in order to accommodate this engine, a much better gear was needed, but mass production began without this last change, which resulted in frequent gear malfunctions and related trouble. This became the Panther\'s greatest defect. In the same year, Dymler-Benz and Henschel were ordered to produce the Panther. Therefore, production was greatly increased and a total of 6283 Panther Tanks were produced, second only to P2KW-4 in number.The first mass produced Panther type D was not equipped with a machine gun but after the experience of close battle. A 7.92mm MG 34 was added to the Panther\'s right front hull armament beginning with its type A. The special feature of the Panther was the left and right driving mechanism. This created an interchangeability of movements, using the torsion bar system. By 1944, the Panther was further improved from Type A to Type G with a change in its side shape.The Panther continued its activities against the Allied Forces throughout the latter half of the war. One of the famed battles it waged during this latter period probably is the one against the new Soviet JS II heavy tank on the eastern front.The Panther at that time, was the main strength tank of the Gross Deutschland, the strongest German Mechanized Division, under the command of General Hasso Von Manteuffel. The Panther reportedly destroyed 350 JS II tanks and 20 other armoured vehicles in the battle. It was a complete one-sided victory for the Panther and one for the book of military history. The Panther, therefore, was an extremely balanced tactical tank and should be called a masterpiece destined to bear the last glory of German war technology. It\'s glorious name will forever remain in the records of the 2nd World War.Since 1943, during World War II, thee appeared an unusually fast tank on the European Front that silhoueted among its German Mechanized Division. This was the ', '14+', '1-35-wwii-gersdkfz171-panther.jpeg'),
(16, '1:35 WWII Sdkfz.251/1 Halft. Hanomag', '1/35', 1, 3, 22.99, 1, 'In 1938, the German Army decided to develop an armoured personnel carrier on the basis of the 3-ton half track (HL-KL-9p). Hanomag Hannoversch Machinenbau (AG) in Hannover was ordered to develop the running gear and Bussing-NAG in Berlin was to develop the superstructure to be armoured. Design work was hastened on the model of existing armoured cars and a prototype was completed at the end of 1938. The Germans tested the prototype in the Kumahsdorf Proving Ground and accepted it for mass production. Thus was born the Armoured Personnel Carrier Hanomag Sdkfz 251/1 which, we may safely say, was a synonym for the German mechanized corps that showed activity in all battlefields throughout the war.', '14+', '1-35-wwii-sdkfz2511-halft-hanomag.jpeg'),
(17, '1:35 WWII Dt. Panzerjäger Nashorn', '1/35', 1, 5, 70.99, 1, 'This is a highly detailed model of the WWII German tank destroyer Nashorn. The full size vehicle featured an 8.8cm gun also known as a PAK 43 and it was fitted to the upper surface of a light turret less chassis. Even though the vehicle was lightly armored, the PAK43 weapon was capable of penetrating 190mm of armor at 1,000 meters. The Nashorn saw action with German heavy antitank battalions fighting Soviet and Allied forces during much of the conflict. Due to its relatively low cost and superior mobility compared to heavier tanks it remained in production until the end of the WWII war.Decals included.Features:• The model accurately recreates the powerful form of the Nashorn, thanks to detailed research performed using an actual example of the vehicle in a museum in Russia.• Features faithful reproductions of the 71-caliber 8.8cm gun and complex fighting compartment.• Metal parts are used to ensure that the gun has authentic movement and weight.• Comes with 3 marking options, including winter and Eastern front versions.• 4 included figures depict driver and 3 crew members in a variety of realistic poses.', '14+', '1-35-wwii-dt-panzerjaeger-nashorn.jpeg'),
(18, '1/16 M551 Sheridan', '1/16', 1, 2, 500.00, 1, 'This large-scale 1/16 static display tank recreates the unique M551 Sheridan. The actual Sheridan began development in 1959 and would go on to serve in major conflicts such as the Vietnam and Gulf Wars. It was a lightweight, air liftable vehicle that contributed to the more mobile U.S. forces that were necessary as America took on a more major global security role in the post-WW2 years. This model uses components from the R/C model, for a highly detailed finish.• 1/16 scale plastic model assembly kit. Length: 408mm, width: 177mm, height: 186mm (including gun shield).• The powerful form of the Sheridan with 152mm gun/launcher is recreated in excellent detail.• Features a precision aluminum gun barrel, plus other metal components including lower hull, drive sprockets, coil-sprung suspension arms and more.• Pre-assembled plastic tracks offer wonderful detail, and have soft resin depictions of rubber pads.• Soft photo-etched metal parts are included to recreate the anti-RPG net often seen as an impromptu addition to Sheridan’s deployed in Vietnam.', '14+', '116-m551-sheridan-display.jpeg'),
(19, '1/48 JGSDF Type 16 MCV', '1/48', 1, 23, 31.99, 1, 'his scale model assembly kit recreates the Japan Ground Self Defense Force (JGSDF) Type 16, which reached units beginning in 2017. An 8-wheel vehicle, the JGSDF classify it as a Maneuver Combat Vehicle (MCV), a highly mobile and well-armed vehicle intended to provide supporting fire and take on enemy armor as a part of rapid response units. Its domestically designed L/52 105mm rifled gun is a low-recoil piece with perforated muzzle brake and a fire control system to enable accurate firing on the move. Rolled steel turret and hull employ modular and spaced armor estimated to be able to survive frontal hits from 20-30mm class guns and portable anti-tank weapons. Thanks to its 570hp engine, the 26-ton Type 16 has a top speed of around 100km/h and significant range; it looks set to provide a major boost to JGSDF units as its rollout continues.• 1/48 scale plastic model assembly kit. Length: 176mm, width: 63mm.Model has a dedicated parts breakdown for a hassle-free build without sacrificing accuracy.• An accurate rendering is based upon extensive research of the actual Type 16, authentically capturing the modern silhouette with a moving depiction of the 105mm gun.• Features crisp molding on details such as non-slip surfaces, plus multi-piece machine gun and mount.• The 8-wheel suspension is depicted in style, with fixed wheels. Elastomer tires have a realistic tread pattern.• Decals are included to recreate periscope openings and muzzle brake perforations.• Comes with one commander figure and two marking options.', '14+', '148-jgsdf-type-16.jpeg'),
(20, 'Leopard 2 A6M+ 1/35', '1/35', 1, 12, 35.95, 2, 'Kit de modélisme complet d\'un char d\'assaut moderne à réaliserContenu de la boîte de modélisme Revell :1 Maquette Leopard 2 A6M+ 1/35Notice de montageAutocollantInformations sur la maquette de véhicule blidé de ce coffret cadeau Revell :La maquette Revell 03342 représente le char blindé innovant Leopard 2A6M+, un véhicule militaire de pointe utilisé par les forces armées du monde entier. Ce kit de modélisme à l\'échelle 1/35 permet aux passionnés de découvrir en détail cette évolution remarquable du Leopard 2A6M.Le Leopard 2A6M+ se distingue par sa puissance de feu améliorée, son blindage exceptionnel et ses systèmes avancés. Il incarne l\'élite des forces armées et est reconnu pour sa mobilité et sa précision optimisées. Cette maquette offre une représentation fidèle de ces caractéristiques, avec des structures de surface finement détaillées, une tourelle rotative et une chaîne facile à monter.Le Leopard 2A6M+ est un exemple hors-pair de l\'évolution des chars blindés, illustrant les avancées technologiques et les performances améliorées au fil du temps. Les modélistes et les passionnés d\'histoire militaire apprécieront ce kit de modélisme pour son réalisme et son attention aux détails. C\'est une occasion unique de construire et de mettre en valeur ce véhicule emblématique dans sa version améliorée.', '14+', 'Leopard-2-A6M.jpeg'),
(21, 'Model set Land Rover Series III', '1/24', 3, 23, 34.50, 2, 'La Land Rover Series III sont des véhicules tout-terrain fabriqués à partir de 1948 par le constructeur anglais Land Rover. Ce modèle est inspiré de la Jeep américaine Willys.', '8+', 'landrover-revelle-1-24.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `nom_role` varchar(15) NOT NULL,
  `description_droits` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id_role`, `nom_role`, `description_droits`) VALUES
(1, 'Manager', 'CRUD'),
(2, 'Employe', 'CRU'),
(3, 'Stagiaire', 'R');

-- --------------------------------------------------------

--
-- Structure de la table `role_cat_admin`
--

CREATE TABLE `role_cat_admin` (
  `id_role` int(11) NOT NULL,
  `id_cat_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role_cat_admin`
--

INSERT INTO `role_cat_admin` (`id_role`, `id_cat_admin`) VALUES
(3, 1),
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(2, 1),
(2, 3),
(2, 8),
(2, 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id_commande`);

--
-- Index pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `commande_produit_ibfk_1` (`id_commande`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `id_auteur` (`id_auteur`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `liste_cat_admin`
--
ALTER TABLE `liste_cat_admin`
  ADD PRIMARY KEY (`id_cat_admin`);

--
-- Index pour la table `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`id_marque`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id_pays`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `id_marque` (`id_marque`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `role_cat_admin`
--
ALTER TABLE `role_cat_admin`
  ADD KEY `id_cat_admin` (`id_cat_admin`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `liste_cat_admin`
--
ALTER TABLE `liste_cat_admin`
  MODIFY `id_cat_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `marques`
--
ALTER TABLE `marques`
  MODIFY `id_marque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id_pays` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD CONSTRAINT `commande_produit_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commandes` (`id_commande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commande_produit_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`id_auteur`) REFERENCES `clients` (`id_client`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `commentaires_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `produits_ibfk_2` FOREIGN KEY (`id_marque`) REFERENCES `marques` (`id_marque`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `role_cat_admin`
--
ALTER TABLE `role_cat_admin`
  ADD CONSTRAINT `role_cat_admin_ibfk_1` FOREIGN KEY (`id_cat_admin`) REFERENCES `liste_cat_admin` (`id_cat_admin`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `role_cat_admin_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
