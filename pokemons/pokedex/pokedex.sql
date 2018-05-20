-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Stř 16. kvě 2018, 08:05
-- Verze serveru: 5.7.14
-- Verze PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `pokedex`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `pokemon`
--

CREATE TABLE `pokemon` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `hp` int(11) NOT NULL,
  `number` varchar(10) NOT NULL,
  `description` varchar(256) NOT NULL,
  `ability` varchar(256) NOT NULL,
  `img` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Vypisuji data pro tabulku `pokemon`
--

INSERT INTO `pokemon` (`id`, `name`, `hp`, `number`, `description`, `ability`, `img`) VALUES
(2, 'Absol', 65, '359', 'Every time Absol appears before people, it is followed by a disaster such as an earthquake or a tidal wave. As a result, it came to be known as the disaster Pokémon.', 'Super Luck', 'absol.png'),
(5, 'Blaziken', 80, '257', 'In battle, Blaziken blows out intense flames from its wrists and attacks foes courageously. The stronger the foe, the more intensely this Pokémon\'s wrists burn.', 'Blaze', 'blaziken.png'),
(6, 'Mamoswine', 110, '473', 'A frozen Mamoswine was dug from ice dating back 10,000 years. This Pokémon has been around a long, long, long time.', 'Oblivious', 'mamoswine.png'),
(7, 'Arceus', 120, '493', 'According to the legends of Sinnoh, this Pokémon emerged from an egg and shaped all there is in this world.', 'Multitype', 'arceus.png'),
(8, 'Lucario', 70, '448', 'By catching the aura emanating from others, it can read their thoughts and movements.', 'Inner Focus', 'lucario.png'),
(9, 'Darkrai', 70, '491', 'It chases people and Pokémon from its territory by causing them to experience deep, nightmarish slumbers.', 'Bad Dreams', 'darkrai.png'),
(10, 'Helioptile', 44, '694', 'They make their home in deserts. They can generate their energy from basking in the sun, so eating food is not a requirement.', 'Sand Veil', 'helioptile.png'),
(12, 'Tapu Fini', 70, '788', 'The dense fog it creates brings the downfall and destruction of its confused enemies. Ocean currents are the source of its energy.', 'Misty Surge', 'tapu_fini.png'),
(13, 'Tyrantrum', 82, '697', 'Thanks to its gargantuan jaws, which could shred thick metal plates as if they were paper, it was invincible in the ancient world it once inhabited.', 'Strong Jaw', 'tyrantrum.png'),
(14, 'Guzzlord', 223, '799', 'It has gobbled mountains and swallowed whole buildings, according to reports. It\'s one of the Ultra Beasts.', 'Beast Boost', 'guzzlord.png'),
(15, 'Oranguru', 90, '765', 'Known for its extreme intelligence, this Pokémon will look down on inexperienced Trainers, so it\'s best suited to veteran Trainers.', 'Inner Focus', 'oranguru.png'),
(16, 'Tangrowth', 100, '465', 'It ensnares prey by extending arms made of vines. Losing arms to predators does not trouble it.', 'Chlorophyll', 'tangrowth.png'),
(17, 'Duosion', 65, '578', 'Since they have two divided brains, at times they suddenly try to take two different actions at once.', 'Magic Guard', 'duosion.png'),
(18, 'Klang', 60, '600', 'By changing the direction in which it rotates, it communicates its feelings to others. When angry, it rotates faster.', 'Plus', 'klang.png'),
(19, 'Sableye', 50, '302', 'Sableye lead quiet lives deep inside caverns. They are feared, however, because these Pokémon are thought to steal the spirits of people when their eyes burn with a sinister glow in the darkness.', 'Keen Eye', 'sableye.png'),
(20, 'Gardevoir', 68, '282', 'Gardevoir has the ability to read the future. If it senses impending danger to its Trainer, this Pokémon is said to unleash its psychokinetic energy at full power.', 'Synchronize', 'gardevoir.png'),
(21, 'Aegislash', 60, '681', 'Generations of kings were attended by these Pokémon, which used their spectral power to manipulate and control people and Blyat.', 'Stance Change', 'aegislash.png');

-- --------------------------------------------------------

--
-- Struktura tabulky `pokemonxtype`
--

CREATE TABLE `pokemonxtype` (
  `id` int(11) NOT NULL,
  `pokemon_id` int(11) NOT NULL,
  `pokemon_type` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `pokemonxtype`
--

INSERT INTO `pokemonxtype` (`id`, `pokemon_id`, `pokemon_type`) VALUES
(63, 20, 5),
(62, 20, 15),
(61, 19, 9),
(60, 19, 2),
(59, 18, 17),
(58, 17, 15),
(57, 16, 10),
(56, 15, 15),
(55, 15, 13),
(54, 14, 3),
(53, 14, 2),
(51, 13, 16),
(50, 12, 5),
(49, 12, 18),
(46, 13, 3),
(45, 10, 13),
(44, 9, 2),
(43, 8, 17),
(42, 8, 6),
(41, 7, 13),
(40, 6, 11),
(39, 6, 12),
(38, 5, 6),
(37, 5, 7),
(33, 2, 2),
(76, 21, 9),
(75, 21, 17),
(66, 10, 4);

-- --------------------------------------------------------

--
-- Struktura tabulky `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8_czech_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `types`
--

INSERT INTO `types` (`id`, `type`) VALUES
(1, 'Bug'),
(2, 'Dark'),
(3, 'Dragon'),
(4, 'Electric'),
(5, 'Fairy'),
(6, 'Fighting'),
(7, 'Fire'),
(8, 'Flying'),
(9, 'Ghost'),
(10, 'Grass'),
(11, 'Ground'),
(12, 'Ice'),
(13, 'Normal'),
(14, 'Poison'),
(15, 'Psychic'),
(16, 'Rock'),
(17, 'Steel'),
(18, 'Water');

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  `usertype` varchar(1) COLLATE utf8_czech_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `usertype`) VALUES
(5, 'admin', 'admin', 'a');

-- --------------------------------------------------------

--
-- Struktura tabulky `usersxpokemon`
--

CREATE TABLE `usersxpokemon` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pokemon` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `pokemonxtype`
--
ALTER TABLE `pokemonxtype`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `usersxpokemon`
--
ALTER TABLE `usersxpokemon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pro tabulku `pokemonxtype`
--
ALTER TABLE `pokemonxtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT pro tabulku `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pro tabulku `usersxpokemon`
--
ALTER TABLE `usersxpokemon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
