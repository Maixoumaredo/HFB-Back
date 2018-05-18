-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  ven. 13 avr. 2018 à 10:34
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hfb`
--

-- --------------------------------------------------------

--
-- Structure de la table `gameroom1`
--

CREATE TABLE `gameroom1` (
  `id` tinyint(4) NOT NULL,
  `pseudo` varchar(15) NOT NULL,
  `bet_side` varchar(5) NOT NULL,
  `bet_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gameroom1`
--

INSERT INTO `gameroom1` (`id`, `pseudo`, `bet_side`, `bet_amount`) VALUES
(107, 'Mordoc', 'left', 50),
(108, 'Mordoc', 'left', 50),
(109, 'Mordoc', 'left', 50),
(110, 'Mordoc', 'left', 50),
(111, 'Mordoc', 'left', 50),
(112, 'Mordoc', 'left', 50),
(113, 'Mordoc', 'right', 50),
(114, 'Mordoc', 'right', 50),
(115, 'Mordoc', 'right', 50),
(116, 'Mordoc', 'right', -50),
(117, 'Mordoc', 'right', -50),
(118, 'Mordoc', 'right', 520),
(119, 'Mordoc', 'left', 50),
(120, 'Mordoc', 'left', 50),
(121, 'Mordoc', 'left', -52),
(122, 'Mordoc', 'left', -50),
(123, 'Mordoc', 'left', 50),
(124, 'Mordoc', 'left', 40),
(125, 'Mordoc', 'left', 50),
(127, 'Mordoc', 'left', 50);

-- --------------------------------------------------------

--
-- Structure de la table `heroes`
--

CREATE TABLE `heroes` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `heroes`
--

INSERT INTO `heroes` (`id`, `name`) VALUES
(30, 'Ant-Man'),
(70, 'Batman'),
(106, 'Black Panther'),
(127, 'Boba Fett'),
(149, 'Captain America'),
(201, 'Daredevil'),
(208, 'Darth Vader'),
(213, 'Deadpool'),
(216, 'Deathstroke'),
(226, 'Doctor Strange'),
(228, 'Donatello'),
(230, 'Doomsday'),
(233, 'Dr Manhattan'),
(234, 'Drax the Destroyer'),
(235, 'Ego'),
(237, 'Electro'),
(263, 'Flash'),
(275, 'Gamora'),
(289, 'Goku'),
(298, 'Green Arrow'),
(303, 'Groot'),
(307, 'Han Solo'),
(309, 'Harley Quinn'),
(310, 'Harry Potter'),
(332, 'Hulk'),
(346, 'Iron Man'),
(354, 'Jar Jar Binks'),
(361, 'Jessica Jones'),
(370, 'Joker'),
(383, 'Kick-Ass'),
(389, 'King Kong'),
(398, 'Kylo Ren'),
(404, 'Leonardo'),
(405, 'Lex Luthor'),
(416, 'Luke Cage'),
(418, 'Luke Skywalker'),
(423, 'Magneto'),
(430, 'Mandarin'),
(432, 'Martian Manhunter'),
(444, 'Mera'),
(445, 'Metallo'),
(450, 'Michelangelo'),
(455, 'Miss Martian'),
(456, 'Mister Fantastic'),
(476, 'Mr Incredible'),
(480, 'Mystique'),
(485, 'Naruto Uzumaki'),
(487, 'Nebula'),
(489, 'Nick Fury'),
(496, 'Nova'),
(498, 'Odin'),
(502, 'One Punch Man'),
(517, 'Phoenix'),
(522, 'Poison Ivy'),
(527, 'Professor X'),
(541, 'Raphael'),
(542, 'Raven'),
(551, 'Red Tornado'),
(555, 'Rey'),
(566, 'Rocket Raccoon'),
(574, 'Sauron'),
(598, 'Silver Surfer'),
(601, 'Sinestro'),
(620, 'Spider-Man'),
(630, 'Star-Lord'),
(639, 'Stormtrooper'),
(644, 'Superman'),
(659, 'Thor'),
(686, 'Vegeta'),
(687, 'Venom'),
(717, 'Wolverine'),
(720, 'Wonder Woman'),
(729, 'Yoda'),
(731, 'Zoom');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `list_id` int(11) DEFAULT NULL,
  `list_image_link` varchar(175) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`list_id`, `list_image_link`) VALUES
(731, 'https://vignette.wikia.nocookie.net/marvel_dc/images/5/50/Zoom_Arrow_Earth-2_003.jpg/revision/latest?cb=20160216230925'),
(729, 'http://aws-cf.ados.fr/prod/photos/6/6/2/5275662/840952/img-840952180.jpg?v=6'),
(720, 'https://d1e4pidl3fu268.cloudfront.net/5bac0547-b617-4fe6-a6fe-7387518370a0/wonder_woman_main.crop_571x428_143%2C0.preview.jpg'),
(717, 'https://vignette.wikia.nocookie.net/marvelmovies/images/7/79/Wolverine-past.png/revision/latest?cb=20160613165559'),
(687, 'https://www.screengeek.net/wp-content/uploads/2017/03/venom-sony-movie.png'),
(686, 'http://www.origamigne.com/shop/wp-content/uploads/2018/02/Vegeta_origamigne_Migne_Huynh.jpg'),
(659, 'http://wiki.marvel-world.com/images/thumb/f/f5/Thor_Odinson_199999_Portrait.jpg/300px-Thor_Odinson_199999_Portrait.jpg'),
(644, 'https://vignette.wikia.nocookie.net/dccu/images/d/d1/Superman-look-batman-v-superman-dawn-of-justice-galaxy-note-hd-wallpaperjpg_%281%29.jpeg/revision/latest?cb=20170707141744'),
(639, 'https://www.superherodb.com/pictures//portraits//stormtrooper.jpg'),
(630, 'http://www.marvel-cineverse.fr/medias/images/avengers-infinity-war-star-lord-poster.jpg'),
(620, 'https://i.pinimg.com/originals/68/f6/06/68f60660a01ab69c26a9f85eabe1f04a.jpg'),
(601, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4C_KchTLcrUHzOCCmcxgSTa4LrW3DT8WOEEvTDdm_WbnWPYgG'),
(598, 'https://thepowerzone.files.wordpress.com/2014/06/les-4-fantastiques-et-le-surfer-d-argent.jpg'),
(574, 'https://vignette.wikia.nocookie.net/lotr/images/9/90/Sauron-2.jpg/revision/latest?cb=20110508182634'),
(566, 'https://s2.r29static.com//bin/entry/141/340x408/1789500/image.png'),
(555, 'https://vignette.wikia.nocookie.net/fr.starwars/images/d/d0/Rey_TLJ_EntertainmentWeeklyNovember.png/revision/latest?cb=20171231091025'),
(551, 'https://vignette.wikia.nocookie.net/arrow-france/images/d/d0/Red_tornado.jpg/revision/latest?cb=20160205113431&path-prefix=fr'),
(542, 'https://img00.deviantart.net/12b5/i/2016/072/7/c/raven_by_forty_fathoms-d9uwx4e.jpg'),
(541, 'https://www.superherodb.com/pictures//portraits//raphael.jpg'),
(527, 'https://vignette.wikia.nocookie.net/xmenmovies/images/3/3f/ProfessorXFP.jpg/revision/latest?cb=20160422202432'),
(522, ' https://i.pinimg.com/564x/2a/b1/55/2ab155d3ffe098cf083744b9dfc08680.jpg'),
(517, 'https://www.ecranlarge.com/uploads/image/001/008/x-men-dark-phoenix-photo-dark-phoenix-1008296.jpg'),
(502, 'https://www.superherodb.com/pictures//portraits//one-punch-man.jpg'),
(498, 'https://heroichollywood.b-cdn.net/wp-content/uploads/2016/08/Thor-Ragnarok-Anthony-Hopkins-Odin-banner.jpg?x42694'),
(496, 'http://1.bp.blogspot.com/-uVW9RdmSHec/TcDVEt75acI/AAAAAAAABjg/VVn-ljwkZ6I/w1200-h630-p-k-no-nu/Nova.jpg'),
(489, 'https://p5.ssl.qhimg.com/t01d3a8ac4561a3aa75.jpg?size=1280x1280'),
(487, 'http://pipocamoderna.com.br/wp-content/uploads/2017/03/guardians-of-the-galaxy-vol-2-character-nebula.jpg'),
(485, 'https://vignette.wikia.nocookie.net/animevice/images/b/b8/Naruto_Main_Image.png/revision/latest?cb=20150326203432'),
(480, 'https://vignette.wikia.nocookie.net/xmenmovies/images/c/c7/MystiqueFP.jpg/revision/latest?cb=20160422202431'),
(476, 'https://img1.cgtrader.com/items/55964/6b0cc89a40/mr-incredible-3d-model-max-obj-3ds-fbx-c4d.jpg'),
(456, 'https://vignette.wikia.nocookie.net/marvelpeliculas/images/6/6b/280px-Mr_Fantastic.jpg/revision/latest?cb=20121202163013&path-prefix=es'),
(455, 'https://vignette.wikia.nocookie.net/wwcbm/images/8/85/Miss_Martian_small.jpg/revision/latest?cb=20161108005755'),
(450, ' https://www.superherodb.com/pictures//portraits//michelangelo.jpg'),
(445, 'https://orig00.deviantart.net/8f0e/f/2014/274/1/9/mulvey_as_metallo_by_zordan_el-d817ghw.jpg'),
(444, 'https://vignette.wikia.nocookie.net/newdcmovieuniverse/images/7/79/MeraHD-JL.JPG/revision/latest?cb=20180311163354'),
(432, 'https://vignette.wikia.nocookie.net/vsbattles/images/d/d1/Martian_Manhunter_%28CW%29.jpg/revision/latest?cb=20170226005753'),
(430, 'http://www.cinehorizons.net/sites/default/files/imgactu/mandarin-iron-man-3-marvel.jpg'),
(423, 'https://vignette.wikia.nocookie.net/marvelmovies/images/5/5b/MagnetoFP.jpg/revision/latest?cb=20160527090334'),
(30, 'https://img00.deviantart.net/9024/i/2015/103/e/a/ant_man___paul_rudd_by_danchorman-d8pjenw.jpg'),
(106, 'https://pre00.deviantart.net/688a/th/pre/i/2018/052/4/b/black_panther___white_glow_portrait_by_imizuri-dc3ukvs.png'),
(127, 'https://www.superherodb.com/pictures//portraits//boba-fett.jpg'),
(149, 'http://www.hdfondos.eu/pictures/2012/1112/1/orig_520200.jpg'),
(201, 'http://marveltoynews.com/wp-content/uploads/2016/09/Neutral-Face-Daredevil-Charlie-Cox-Hot-Toys-Figure-Portrait-e1474899347844.jpg'),
(208, 'https://raprnb.b-cdn.net/wp-content/uploads/2017/11/star-wars-darth-vader.jpg'),
(213, 'https://www.journaldugeek.com/wp-content/blogs.dir/1/files/2016/03/deadpool-r-rated-rentable-histoire-640x457.jpg'),
(226, 'http://lestoilesheroiques.fr/wp-content/uploads/2016/04/benedict-cumberbatch-dr-strange.jpg'),
(228, 'https://www.superherodb.com/pictures//portraits//donatello.jpg'),
(233, 'https://www.superherodb.com/pictures//portraits//dr-manhattan.jpg'),
(230, 'https://vignette.wikia.nocookie.net/vsbattles/images/7/7e/Gallery-1449139503-doomsday-warners-dc-batman-superman-trailer.jpg/revision/latest?cb=20160325153747'),
(216, 'http://www.buro247.sg/local/instagram/photos/23967670_591722854552464_1753291725666779136_n.jpg'),
(234, 'https://i.pinimg.com/564x/1e/8d/35/1e8d35d8a9c0dd3a8db9a9ac267b8e2f--marvel-vs-marvel-heroes.jpg'),
(235, 'https://vignette.wikia.nocookie.net/marvelcinematicuniverse/images/0/06/Ego_Profile%281%29.png/revision/latest?cb=20170323185700'),
(237, 'https://static.comicvine.com/uploads/original/11/113883/4021933-3107411942-elect.jpg'),
(263, 'https://scontent-cdt1-1.xx.fbcdn.net/v/t31.0-8/13559197_10153492785501923_3591193467675106218_o.jpg?_nc_cat=0&oh=564eaa5eb168edaba2642aae2e48de07&oe=5B5CD22D'),
(275, 'http://media.comicbook.com/2017/05/gamora-996474-1280x0.jpg'),
(289, 'https://wallpapers.wallhaven.cc/wallpapers/full/wallhaven-562991.jpg'),
(298, 'https://pm1.narvii.com/6126/7403515ab6a0987db439202e81755d27f87dc4a0_hq.jpg'),
(303, 'https://pop-wrapped.s3-us-west-1.amazonaws.com/articles/85437/vin-diesel-groot-guardians-2-1-med.jpg'),
(307, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQf2G6gdSMtZ-bOL8DLms6kPGBkWS6bYfMQ1iNxLhqNERJNB5QZ'),
(309, 'https://creativepool.com/files/candidate/portfolio/full/815376.jpg'),
(310, 'https://www.superherodb.com/pictures//portraits//harry-potter.jpg'),
(332, 'http://wiki.marvel-world.com/images/thumb/2/28/Hulk_Terre-199999-Portrait.jpg/300px-Hulk_Terre-199999-Portrait.jpg'),
(346, 'https://pre00.deviantart.net/427d/th/pre/i/2012/309/e/c/iron_man_painting_by_martin_saelens-d5k1fti.jpg'),
(354, 'https://www.superherodb.com/pictures//portraits//jar-jar-binks.jpg'),
(361, 'https://www.ynet.co.il/PicServer4/2015/12/28/6720441/6720434099299490706no.jpg'),
(370, 'https://i.pinimg.com/originals/09/ee/44/09ee44ae4f31acb28614393838d6ecd8.jpg'),
(383, 'http://img2.rtve.es/v/754299/'),
(389, 'https://www.superherodb.com/pictures//portraits//king-kong.jpg'),
(404, 'https://www.superherodb.com/pictures//portraits//leonardo.jpg'),
(405, 'https://static0.srcdn.com/wp-content/uploads/2017/11/Jesse-Eisenberg-as-Lex-Luthor-in-Batman-v-Superman.jpg'),
(416, 'http://www.olibe.fr/upload/Actualite/2816/luke-cage-s2-netflix-date.jpg'),
(418, 'https://vignette.wikia.nocookie.net/fr.starwars/images/f/fa/Luke_TLJ.jpg/revision/latest?cb=20180110093251');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(15) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `wallet` int(11) NOT NULL,
  `numberbets` int(11) NOT NULL,
  `numberbetswon` int(11) NOT NULL,
  `winner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `hashed_password`, `email`, `wallet`, `numberbets`, `numberbetswon`, `winner`) VALUES
(2, 'quentindu91', '$2y$10$h1zgGL8t6khsGmFsNziWDOsqS2Ye9Pyz6qsht/Pv.agQan6BpbbFW', 'quentindu91@hotmail.fr', 1020, 65, 0, 0),
(200, 'Mordoc', '$2y$10$36ow2OddZ/r3qNRRubmThupJ59FLa1HskQwzGPuvvApyu7lElO1GK', 'maximexp2@hotmail.fr', 171, 30, 20, 0),
(201, 'lala', '$2y$10$oqqOE2ko3NWeBU.99O4md.9O/8k4eBUW7TShk2vNjUU37k2NjMLVG', 'ryzlane@gmail.com', 657, 34, 20, 0),
(202, 'Test', '$2y$10$ZwPMvF2TOCDGZ5IwiIXHA.I6mJnsDd7BdZiD9LSGa/NRYmVn/t9sW', 'ryzlane@free.fr', 0, 0, 0, 0),
(203, 'laa', '$2y$10$EJffe8f0N03QNVkEm0CopuqqIfwkUfhmHf4a6ojwGcfFdXpWouvqy', 'ryzlane.arsac@hetic.net', 0, 0, 0, 0),
(204, 'Enalzyr', '$2y$10$heyWVsoLQU29bPAIR9Ta7eDjXj1SWC07ZRvzvlRlJzEZUzABDEHiS', 'myriiku@gmail.com', 0, 0, 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `gameroom1`
--
ALTER TABLE `gameroom1`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `gameroom1`
--
ALTER TABLE `gameroom1`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
