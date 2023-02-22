-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 19 fév. 2023 à 17:28
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestimmo`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `id_annonce` int(11) NOT NULL,
  `Title` varchar(100) DEFAULT NULL,
  `Surface` int(11) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Price` decimal(10,0) DEFAULT NULL,
  `offerDate` date DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `L_M_Date` date DEFAULT NULL,
  `Category` varchar(20) DEFAULT NULL,
  `offerType` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id_annonce`, `Title`, `Surface`, `City`, `Address`, `Price`, `offerDate`, `id_client`, `L_M_Date`, `Category`, `offerType`) VALUES
(1, 'Modern 2-Bedroom Apa', 70, 'New York', '123 Main St', '220000', '2023-02-10', 1, '2023-02-10', 'Apartment', 'Sale'),
(2, 'Spacious 3-Bedroom H', 150, 'Chicago', '456 Park Ave', '450000', '2023-02-11', 1, '2023-02-11', 'House', 'Sale'),
(3, 'Luxurious 4-Bedroom ', 300, 'San Francisco', '789 Ocean Dr', '1000000', '2023-02-12', 1, '2023-02-12', 'Villa', 'Sale'),
(4, 'Stylish 1-Bedroom Ap', 50, 'Los Angeles', '111 Elm St', '150000', '2023-02-13', 1, '2023-02-13', 'Apartment', 'Sale'),
(5, 'Cozy 2-Bedroom House', 100, 'Boston', '222 Maple Ave', '300000', '2023-02-14', 1, '2023-02-14', 'House', 'Rental'),
(6, 'Charming 3-Bedroom V', 200, 'San Antonio', '333 Beach Rd', '800000', '2023-02-15', 4, '2023-02-15', 'Villa', 'Sale'),
(7, 'Renovated 2-Bedroom ', 60, 'New York', '444 Cherry Ln', '180000', '2023-02-16', 3, '2023-02-16', 'Apartment', 'Rental'),
(8, 'Quaint 1-Bedroom Hou', 80, 'Houston', '555 Pine St', '200000', '2023-02-17', 5, '2023-02-17', 'House', 'Sale'),
(9, 'Spacious 4-Bedroom V', 250, 'Las Vegas', '666 Sunset Blvd', '700000', '2023-02-18', 5, '2023-02-18', 'Villa', 'Rental'),
(10, 'Modern 3-Bedroom Apa', 90, 'Seattle', '777 Forest Ave', '250000', '2023-02-19', 1, '2023-02-19', 'Apartment', 'Sale');


UPDATE annonce 
SET Title = CASE Title 
                     WHEN 'Modern 2-Bedroom Apa' THEN 'new_phone_number_1'
                     WHEN 'Spacious 3-Bedroom H' THEN 'new_phone_number_2'
                     WHEN 'Luxurious 4-Bedroom ' THEN 'new_phone_number_3'
                     WHEN 'Stylish 1-Bedroom Ap' THEN 'new_phone_number_3'
                     WHEN 'Cozy 2-Bedroom House' THEN 'new_phone_number_3'
                     WHEN 'Charming 3-Bedroom V' THEN 'new_phone_number_3'
                     WHEN 'Renovated 2-Bedroom ' THEN 'new_phone_number_3'
                     WHEN 'Renovated 2-Bedroom ' THEN 'new_phone_number_3'
                     WHEN 'Spacious 4-Bedroom V' THEN 'new_phone_number_3'
                     WHEN 'Modern 3-Bedroom Apa' THEN 'new_phone_number_3'
                     ELSE Title 
                   END;


--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id_annonce`),
  ADD KEY `id_client` (`id_client`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id_annonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
