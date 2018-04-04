-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 04, 2018 at 03:38 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_videoapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_age_rating`
--

CREATE TABLE `tbl_age_rating` (
  `arating_id` smallint(5) UNSIGNED NOT NULL,
  `arating_name` varchar(125) NOT NULL,
  `arating_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_age_rating`
--

INSERT INTO `tbl_age_rating` (`arating_id`, `arating_name`, `arating_desc`) VALUES
(1, 'G', 'G – General Audiences\r\nAll ages admitted. Nothing that would offend parents for viewing by children. '),
(2, 'PG', 'PG – Parental Guidance Suggested\r\nSome material may not be suitable for children. Parents urged to give  	&ldquo;parental guidance&rdquo;. '),
(3, 'PG-13', 'PG-13 – Parents Strongly Cautioned\r\nSome material may be inappropriate for children under 13. Parents are urged to be cautious. Some material may be inappropriate for pre-teenagers.'),
(4, 'R', 'R – Restricted\r\nUnder 17 requires accompanying parent or adult guardian. Contains some adult material. Parents are urged to learn more about the film before taking their young children with them. '),
(5, 'NC-17', 'NC-17 – Adults Only\r\nNo One 17 and Under Admitted. Clearly adult. Children are not admitted. ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_genre`
--

CREATE TABLE `tbl_genre` (
  `genre_id` tinyint(3) UNSIGNED NOT NULL,
  `genre_name` varchar(125) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_genre`
--

INSERT INTO `tbl_genre` (`genre_id`, `genre_name`, `active`) VALUES
(1, 'Action', 1),
(2, 'Adventure', 1),
(3, 'Comedy', 1),
(4, 'Crime', 1),
(5, 'Drama', 1),
(6, 'Historical', 1),
(7, 'Horror', 1),
(9, 'Science Fiction', 1),
(12, 'Animation', 1),
(13, 'Family', 1),
(14, 'Fantasy', 1),
(15, 'Musical', 0),
(20, 'Romance', 1),
(21, 'Musical', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_movies`
--

CREATE TABLE `tbl_movies` (
  `movies_id` mediumint(8) UNSIGNED NOT NULL,
  `movies_title` varchar(125) NOT NULL,
  `movies_cover` varchar(75) NOT NULL DEFAULT 'cover_default.jpg',
  `movies_year` varchar(5) NOT NULL,
  `movies_storyline` text NOT NULL,
  `movies_trailer` varchar(75) NOT NULL DEFAULT 'trailer_default.jpg',
  `movies_rating` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_movies`
--

INSERT INTO `tbl_movies` (`movies_id`, `movies_title`, `movies_cover`, `movies_year`, `movies_storyline`, `movies_trailer`, `movies_rating`, `active`) VALUES
(1, 'Unsane', 'unsane_poster.jpg', '2018', 'A young woman is involuntarily committed to a mental institution, where she is confronted by her greatest fear--but is it real or a product of her delusion?', 'unsane_2018.mp4', '6.8', 1),
(2, 'Deadpool', 'deadpool_poster.jpg', '2016', 'A fast-talking mercenary with a morbid sense of humor is subjected to a rogue experiment that leaves him with accelerated healing powers and a quest for revenge.', 'deadpool_2016.mp4', '8.0', 1),
(3, 'Red Sparrow', 'red_sparrow_poster.jpg', '2018', 'Ballerina Dominika Egorova is recruited to \'Sparrow School,\' a Russian intelligence service where she is forced to use her body as a weapon. Her first mission, targeting a C.I.A. agent, threatens to unravel the security of both nations.', 'red_sparrow_2018.mp4', '6.8', 1),
(4, 'The Boss Baby', 'the_boss_baby_poster.jpg', '2017', 'A suit-wearing, briefcase-carrying baby pairs up with his 7-year old brother to stop the dastardly plot of the CEO of Puppy Co.\r\n', 'the_boss_baby_2017.mp4', '6.3', 1),
(5, 'Kingsman', 'kingsman_poster.jpg', '2017', 'When their headquarters are destroyed and the world is held hostage, the Kingsman&#039;s journey leads them to the discovery of an allied spy organization in the US. These two elite secret organizations must band together to defeat a common enemy.', 'kingsman_2017.mp4', '6.8', 1),
(6, 'Hidden Figures', 'hidden_figures_poster.jpg', '2016', 'The story of a team of female African-American mathematicians who served a vital role in NASA during the early years of the U.S. space program.', 'hidden_figures_2016.mp4', '7.8', 1),
(7, 'Logan', 'logan_poster.jpg', '2017', 'In the near future, a weary Logan cares for an ailing Professor X, somewhere on the Mexican border. However, Logan\'s attempts to hide from the world, and his legacy, are upended when a young mutant arrives, pursued by dark forces.', 'logan_2017.mp4', '8.1', 1),
(9, 'Skyfall', 'skyfall_poster.jpg', '2012', 'Bond\'s loyalty to M is tested when her past comes back to haunt her. When MI6 comes under attack, 007 must track down and destroy the threat, no matter how personal the cost.', 'skyfall_2012.mp4', '7.8', 1),
(10, 'Thor', 'thor_poster.jpg', '2011', 'The powerful, but arrogant god Thor, is cast out of Asgard to live amongst humans in Midgard (Earth), where he soon becomes one of their finest defenders.', 'thor_2011.mp4', '7.0', 1),
(11, 'I, Tonya', 'tonya_poster.jpg', '2017', 'Competitive ice skater Tonya Harding rises amongst the ranks at the U.S. Figure Skating Championships, but her future in the activity is thrown into doubt when her ex-husband intervenes.', 'tonya_2017.mp4', '7.6', 1),
(12, 'The Room', 'theroom_poster.jpg', '2003', 'Johnny is a successful banker who lives happily in a San Francisco townhouse with his fiancée, Lisa. One day, inexplicably, she gets bored with him and decides to seduce his best friend, Mark. From there, nothing will be the same again.', 'theroom_2003.mp4', '3.6', 1),
(13, 'Blue Jasmine', 'bluejasmine_poster.jpg', '2013', 'A New York socialite, deeply troubled and in denial, arrives in San Francisco to impose upon her sister. She looks a million, but isn&#039;t bringing money, peace, or love...\r\n', 'bluejasmine_2013.mp4', '7.3', 1),
(14, 'Blue is the Warmest Color', 'bluewarmestcolor_poster.jpg', '2013', 'Adèle&#039;s life is changed when she meets Emma, a young woman with blue hair, who will allow her to discover desire and to assert herself as a woman and as an adult. In front of others, Adèle grows, seeks herself, loses herself, and ultimately finds herself through love and loss.', 'bluewarmestcolor_2013.mp4', '7.8', 1),
(15, 'The Edukators', 'theedukators_poster.jpg', '2004', 'Three activists cobble together a kidnapping plot after they encounter a businessman in his home.', 'theedukators_2004.mp4', '7.5', 1),
(16, 'Reservoir Dogs', 'reservoirdogs_poster.jpg', '1992', 'After a simple jewelry heist goes terribly wrong, the surviving criminals begin to suspect that one of them is a police informant.', 'reservoirdogs_1992.mp4', '8.3', 1),
(17, 'The Grand Budapest Hotel', 'budapesthotel_poster.jpg', '2014', 'The adventures of Gustave H, a legendary concierge at a famous hotel from the fictional Republic of Zubrowka between the first and second World Wars, and Zero Moustafa, the lobby boy who becomes his most trusted friend.', 'budapesthotel_2014.mp4', '8.1', 1),
(18, 'The Girl With The Dragon Tattoo', 'girlwithdragontattoo_poster.jpg', '2011', 'Journalist Mikael Blomkvist is aided in his search for a woman who has been missing for forty years by Lisbeth Salander, a young computer hacker.', 'girlwithdragontattoo_2011.mp4', '7.8', 1),
(19, 'The Theory Of Everything', 'theoryofeverything_poster.jpg', '2014', 'A look at the relationship between the famous physicist Stephen Hawking and his wife.', 'theoryofeverything_2014.mp4', '7.7', 1),
(20, 'The Imitation Game', 'imitationgame_poster.jpg', '2014', 'During World War II, the English mathematical genius Alan Turing tries to crack the German Enigma code with help from fellow mathematicians.', 'imitationgame_2014.mp4', '8.0', 1),
(21, 'The Martian', 'martian_poster.jpg', '2015', 'An astronaut becomes stranded on Mars after his team assume him dead, and must rely on his ingenuity to find a way to signal to Earth that he is alive.', 'martian_2015.mp4', '8.0', 1),
(22, 'Mad Max: Fury Road', 'madmax_poster.jpg', '2015', 'A woman rebels against a tyrannical ruler in postapocalyptic Australia in search for her home-land with the help of a group of female prisoners, a psychotic worshipper, and a drifter named Max.', 'madmax_2015.mp4', '8.1', 1),
(23, 'The Revenant', 'revenant_poster.jpg', '2015', 'A frontiersman on a fur trading expedition in the 1820s fights for survival after being mauled by a bear and left for dead by members of his own hunting team.', 'revenant_2015.mp4', '8.0', 1),
(24, 'Avatar', 'avatar_poster.jpg', '2009', 'A paraplegic marine dispatched to the moon Pandora on a unique mission becomes torn between following his orders and protecting the world he feels is his home.', 'avatar_2009.mp4', '7.8', 1),
(25, 'Biutiful', 'biutiful_poster.jpg', '2010', 'This is the story of Uxbal, a man living in this world, but able to see his death, which guides his every move.', 'biutiful_2010.mp4', '7.5', 1),
(26, 'Full Metal Jacket', 'fullmetaljacket_poster.jpg', '1987', 'A pragmatic U.S. Marine observes the dehumanizing effects the Vietnam War has on his fellow recruits from their brutal boot camp training to the bloody street fighting in Hue.', 'fullmetaljacket_1987.mp4', '8.3', 1),
(27, 'Melancholia', 'melancholia_poster.jpg', '2011', 'Two sisters find their already strained relationship challenged as a mysterious new planet threatens to collide with Earth.', 'melancholia_2011.mp4', '7.1', 1),
(28, 'Antichrist', 'antichrist_poster.jpg', '2009', 'A grieving couple retreat to their cabin in the woods, hoping to repair their broken hearts and troubled marriage. But nature takes its course and things go from bad to worse.', 'antichrist_2009.mp4', '6.6', 1),
(29, 'The Pianist', 'pianist_poster.jpg', '2002', 'A Polish Jewish musician struggles to survive the destruction of the Warsaw ghetto of World War II.', 'pianist_2002.mp4', '8.5', 1),
(30, 'The Intouchables', 'intouchables_poster.jpg', '2011', 'After he becomes a quadriplegic from a paragliding accident, an aristocrat hires a young man from the projects to be his caregiver.', 'intouchable_2011.mp4', '8.5', 1),
(31, 'The Summit', 'summit_poster.jpg', '2012', 'The story of the deadliest day on the world&#039;s most dangerous mountain, when 11 climbers mysteriously perished on K2.', 'summit_2012.mp4', '6.9', 1),
(34, 'Gifted', 'gifted_poster.jpg', '2017', 'Frank, a single man raising his child prodigy niece Mary, is drawn into a custody battle with his mother.', 'gifted_2017.mp4', '7.6', 1),
(35, 'The Mountain Between Us', 'mountainbetweenus_poster.jpg', '2017', 'Stranded after a tragic plane crash, two strangers must forge a connection to survive the extreme elements of a remote snow-covered mountain. When they realize help is not coming, they embark on a perilous journey across the wilderness.', 'mountainbetween_2017.mp4', '6.4', 1),
(36, 'Babel', 'babel_poster.jpg', '2006', 'Tragedy strikes a married couple on vacation in the Moroccan desert, touching off an interlocking story involving four different families.', 'gifted_2017.mp4', '6.8', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mov_ara`
--

CREATE TABLE `tbl_mov_ara` (
  `mov_ara_id` mediumint(8) UNSIGNED NOT NULL,
  `movies_id` mediumint(8) UNSIGNED NOT NULL,
  `arating_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_mov_ara`
--

INSERT INTO `tbl_mov_ara` (`mov_ara_id`, `movies_id`, `arating_id`) VALUES
(1, 1, 3),
(2, 2, 3),
(3, 3, 5),
(4, 4, 1),
(5, 5, 3),
(6, 6, 1),
(7, 7, 4),
(8, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mov_gen`
--

CREATE TABLE `tbl_mov_gen` (
  `mov_genre_id` mediumint(8) UNSIGNED NOT NULL,
  `movies_id` mediumint(9) NOT NULL,
  `genre_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_mov_gen`
--

INSERT INTO `tbl_mov_gen` (`mov_genre_id`, `movies_id`, `genre_id`) VALUES
(1, 7, 1),
(2, 7, 5),
(3, 7, 9),
(4, 2, 1),
(5, 2, 2),
(6, 2, 3),
(7, 1, 7),
(8, 3, 5),
(9, 3, 4),
(13, 5, 1),
(14, 5, 3),
(15, 5, 2),
(16, 6, 5),
(17, 6, 6),
(32, 16, 1),
(33, 16, 2),
(34, 16, 4),
(35, 16, 5),
(37, 11, 5),
(38, 11, 6),
(39, 20, 5),
(40, 20, 6),
(41, 21, 2),
(42, 21, 5),
(43, 21, 9),
(44, 17, 2),
(45, 17, 3),
(46, 17, 5),
(47, 22, 1),
(48, 22, 2),
(49, 22, 9),
(50, 23, 2),
(51, 23, 5),
(52, 23, 6),
(53, 27, 5),
(54, 27, 9),
(55, 27, 14),
(56, 31, 2),
(57, 31, 6),
(58, 28, 5),
(59, 28, 7),
(60, 24, 12),
(61, 24, 13),
(62, 24, 14),
(63, 29, 5),
(64, 29, 6),
(65, 30, 3),
(66, 30, 5),
(67, 30, 13),
(68, 34, 5),
(69, 34, 13),
(70, 35, 1),
(71, 35, 2),
(72, 35, 5),
(73, 4, 2),
(74, 4, 12),
(75, 4, 13),
(76, 19, 5),
(77, 19, 6),
(78, 19, 20),
(79, 18, 1),
(80, 18, 4),
(81, 18, 5),
(82, 25, 5),
(83, 13, 5),
(84, 13, 20),
(85, 14, 5),
(86, 14, 20),
(87, 26, 1),
(88, 26, 5),
(89, 26, 6),
(90, 15, 1),
(91, 15, 2),
(92, 15, 4),
(93, 15, 5),
(94, 36, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `user_fname` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_pass` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_ip` varchar(50) NOT NULL DEFAULT 'no',
  `last_login` timestamp NULL DEFAULT NULL,
  `user_attempts` tinyint(4) NOT NULL DEFAULT '0',
  `user_level` varchar(15) NOT NULL,
  `last_pass_change` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fname`, `user_name`, `user_pass`, `user_email`, `user_date`, `user_ip`, `last_login`, `user_attempts`, `user_level`, `last_pass_change`) VALUES
(1, 'Barbara', 'Bombachini', 'holycow', 'b_bombachini@fanshaweonline.ca', '2018-02-09 21:20:26', '::1', '2018-02-19 01:32:13', 0, '1', NULL),
(15, 'Dave', 'davemill', '$2y$10$Y/nHDpLiCW1hj2C2GaHLheS2MTHqgOY2MbWRiqAxi2wMuifOtTfRO', 'dave@email.com', '2018-02-18 21:41:02', 'no', NULL, 0, '1', NULL),
(16, 'john', 'john', '$2y$10$GC0.Nj5rQPas.ZA9fFyUE.3AgYbFlsxvqPae3XMPdQtQ03.NfALRS', 'john@email.com', '2018-02-19 00:47:53', 'no', NULL, 3, '1', NULL),
(17, 'Barbara', 'barbs', '$2y$10$jFNsPwbFUQ1/FHa/S6Nh3e4dZbQQj1bN/vOp5RzAUGuLHUEfGLncq', 'email@email.com', '2018-02-19 01:32:42', '::1', '2018-04-04 02:42:53', 0, '2', '2018-03-01 06:29:50'),
(18, 'karla', 'karla', '$2y$10$eKzBMRS/nFkdK9nE3AxmoO7tyBE/92nzYBMOeRWRNmaN0ILuosR1.', 'karla@email.com', '2018-02-19 02:02:41', 'no', NULL, 1, '1', NULL),
(20, 'William', 'bill', '$2y$10$dEGNpXWYmvcwqJwM7uX6Gujd2p4pUCbOrC4b8TqHPePj9VH5M4bf.', 'bill@email.com', '2018-02-19 03:43:41', 'no', NULL, 0, '2', NULL),
(21, 'admin', 'admin', '$2y$10$Ue.DJKp7bOEJyTq01J.dn.rcjAYInRLUrBu/E7MBCTQxOEBAXj4JC', 'admin@email.com', '2018-03-01 04:33:36', 'no', NULL, 0, '2', NULL),
(22, 'admin', 'admin', '$2y$10$Yv7wXezPZadStrWul7k6Lex7SBQbkw/arhnzP9.6v0wAZQj/iwcRa', 'admin@email.com', '2018-03-01 04:57:41', 'no', NULL, 0, '2', NULL),
(23, 'super', 'super', '$2y$10$qgLyew37ROZVNTAiZps/auxORjXFg8uqq5Wnym5wMn0xFWZ8rT4n2', 'super@email.com', '2018-03-01 05:21:19', '::1', NULL, 2, '1', '2018-03-01 05:22:05'),
(24, 'dave', 'dave', '$2y$10$cnQCtwWslcMwy06.hN22AuUDTsafJX9fVpW8nmnvMSnytKS3kG94q', 'dave@email.com', '2018-03-01 05:23:15', '::1', '2018-03-01 05:23:52', 0, '1', '2018-03-01 05:23:46'),
(25, 'carol', 'carol', '$2y$10$aHXKr3duaSCn7N9PafcqrugUhUT4OdmhM1ZONYVEiK0cVyvZ.9GYy', 'carol@email.com', '2018-03-01 06:30:53', '::1', '2018-03-01 06:54:13', 0, '1', '2018-03-01 06:54:06'),
(26, 'john', 'john', '$2y$10$LsmSABWNEHGLe3V.3HlsDu0TTmswepvZBR2vPdLGLiasBFgCIiPNy', 'john@email.com', '2018-03-01 06:31:46', 'no', NULL, 0, '2', NULL),
(27, 'joe', 'joe', '$2y$10$o/9eS77kvg6hd2s1KEm45enGq2bmEPr8Ok3LTT52at8rzDrj2jcKS', 'joe@email.com', '2018-03-01 06:55:15', 'no', NULL, 0, '1', NULL),
(28, 'will', 'will', '$2y$10$4Ikf5N8u60tudnWbA.rEp.hG40TlDfaI9O8P.4/4XA4ZFOBughFRO', 'will@email.com', '2018-03-01 06:59:59', '::1', '2018-03-01 07:00:38', 0, '1', '2018-03-01 07:00:30'),
(29, 'leo', 'leo', '$2y$10$Lnyt1fkuAk93r4hUDssylu96CMizdZ8O/KeBQqw7/RToGwVADzKku', 'leo@email.com', '2018-03-02 04:38:02', '::1', '2018-03-02 04:40:51', 0, '2', '2018-03-02 04:40:41'),
(30, 'julio', 'julio', '$2y$10$mHDSaeqJkV5JxNWNmhQ4sutsIjL3iIfpnL3FC.CO8yIzZjg.m0cHO', 'julio@email.com', '2018-03-02 04:41:24', 'no', NULL, 0, '1', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_age_rating`
--
ALTER TABLE `tbl_age_rating`
  ADD PRIMARY KEY (`arating_id`);

--
-- Indexes for table `tbl_genre`
--
ALTER TABLE `tbl_genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `tbl_movies`
--
ALTER TABLE `tbl_movies`
  ADD PRIMARY KEY (`movies_id`);

--
-- Indexes for table `tbl_mov_ara`
--
ALTER TABLE `tbl_mov_ara`
  ADD PRIMARY KEY (`mov_ara_id`);

--
-- Indexes for table `tbl_mov_gen`
--
ALTER TABLE `tbl_mov_gen`
  ADD PRIMARY KEY (`mov_genre_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_age_rating`
--
ALTER TABLE `tbl_age_rating`
  MODIFY `arating_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_genre`
--
ALTER TABLE `tbl_genre`
  MODIFY `genre_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_movies`
--
ALTER TABLE `tbl_movies`
  MODIFY `movies_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_mov_ara`
--
ALTER TABLE `tbl_mov_ara`
  MODIFY `mov_ara_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_mov_gen`
--
ALTER TABLE `tbl_mov_gen`
  MODIFY `mov_genre_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
