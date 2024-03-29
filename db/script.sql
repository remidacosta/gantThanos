use gantthanos_gantthanos;

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

ALTER TABLE `personne`
  ADD PRIMARY KEY (`Identifiant`);

ALTER TABLE `personne`
  MODIFY `Identifiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

INSERT INTO `personne` (`Nom`, `Prenom`, `DateNaissance`, `Sexe`, `Nationalite`, `Etat`, `Identifiant`) VALUES
('Poux-Berthe', 'Maxime', '1998-11-08', 'M', 'Terre', 'Vivant', 1),
('Da Costa', 'Rémi', '1998-09-21', 'M', 'Terre', 'Mort', 2),
('Herve', 'Jean', '1947-11-08', 'F', 'Terre', 'Vivant', 3),
('Pierre', 'Michel', '1967-11-08', 'A', 'Terre', 'Vivant', 4),
('Gaston', 'Ferjeux', '1932-11-08', 'M', 'Vormir', 'Mort', 5),
('Eru', 'René', '1914-11-08', 'F', 'Terre', 'Mort', 6),
('Iluvatar', 'Eric', '1923-11-08', 'F', 'Vormir', 'Mort', 7),
('Ilu', 'Antoine', '1987-11-08', 'A', 'Terre', 'Mort', 8),
('Vanba', 'Patrick', '1923-11-08', 'A', 'Ego', 'Vivant', 9),
('Vanba', 'Aurélie', '199-11-08', 'F', 'Ego', 'Mort', 10),
('Tétard', 'Léa', '1916-11-08', 'F', 'Ego', 'Vivant', 11),
('Polisson', 'Thierry', '1997-11-08', 'M', 'Ego', 'Mort', 12),
('Jupiter', 'Clém', '1920-11-08', 'M', 'Terre', 'Vivant', 13),
('Karl', 'Alex', '2018-11-08', 'M', 'Terre', 'Mort', 14),
('Jamel', 'Sophie', '1913-11-08', 'A', 'Ego', 'Vivant', 15),
('Dupont', 'Morgan', '1946-11-08', 'A', 'Terre', 'Mort', 16),
('Pirrera', 'Juliette', '1954-11-08', 'A', 'Vormir', 'Mort', 17),
('CC', 'Claire', '1976-11-08', 'F', 'Ego', 'Mort', 18),
('Odinson', 'Thor', '1987-11-08', 'M', 'Vormir', 'Vivant', 19),
('Rogers', 'Steve', '1999-11-08', 'M', 'Ego', 'Mort', 20);
COMMIT;
