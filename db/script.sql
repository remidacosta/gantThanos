create database if not exists GantThanos character set utf8 collate utf8_unicode_ci;
use GantThanos;
grant all privileges on GantThanos.* to 'GantThanos_user'@'localhost' identified by '123123123';

use GantThanos

drop table if exists users;

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;


drop table if exists personne;

CREATE TABLE `personne` (
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `DateNaissance` date NOT NULL,
  `Sexe` varchar(1) NOT NULL,
  `Nationalite` varchar(20) NOT NULL,
  `Etat` varchar(20) NOT NULL,
  `Identifiant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `personne` (`Nom`, `Prenom`, `DateNaissance`, `Sexe`, `Nationalite`, `Etat`, `Identifiant`) VALUES
('Poux-Berthe', 'Maxime', '1998-11-08', 'M', 'France', 'Vivant', 1),
('Da Costa', 'Rémi', '1998-09-21', 'M', 'France', 'Mort', 2);

ALTER TABLE `personne`
  ADD PRIMARY KEY (`Identifiant`);

ALTER TABLE `personne`
  MODIFY `Identifiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
