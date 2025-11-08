SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `cds` (
  `ID` int(11) NOT NULL,
  `Album` varchar(865) NOT NULL,
  `Interprete` varchar(64) NOT NULL,
  `Anno` smallint(4) NOT NULL,
  `Paese` varchar(56) NOT NULL,
  `Rating` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `cds` (`ID`, `Album`, `Interprete`, `Anno`, `Paese`, `Rating`) VALUES
(1, 'Atom Heart Mother', 'Pink Floyd', 1970, 'Regno Unito', 5),
(2, 'The Dark Side of the Moon', 'Pink Floyd', 1973, 'Regno Unito', 5),
(3, 'Wish You Were Here', 'Pink Floyd', 1975, 'Regno Unito', 5),
(4, 'The Wall', 'Pink Floyd', 1979, 'Regno Unito', 5),
(5, 'The Division Bell', 'Pink Floyd', 1992, 'Regno Unito', 4),
(7, 'Pink Floyd at Pompeii – MCMLXXII', 'Pink Floyd', 2025, 'Regno Unito', 3),
(8, 'The College Dropout', 'Kanye West', 2004, 'Stati Uniti', 5),
(9, 'Late Registration', 'Kanye West', 2005, 'Stati Uniti', 5),
(10, 'Graduation', 'Kanye West', 2007, 'Stati Uniti', 4),
(11, '808s and Heartbreak', 'Kanye West', 2008, 'Stati Uniti', 4),
(12, 'My Beautiful Dark Twisted Fantasy', 'Kanye West', 2010, 'Stati Uniti', 5),
(13, 'Watch The Throne', 'Jay-Z, Kanye West', 2011, 'Stati Uniti', 3),
(14, 'Yeezus', 'Kanye West', 2013, 'Stati Uniti', 5),
(15, 'ye', 'Kanye West', 2018, 'Stati Uniti', 5),
(16, 'KIDS SEE GHOSTS', 'Kanye West, Kid Cudi', 2018, 'Stati Uniti', 5),
(17, 'JESUS IS KING', 'Kanye West', 2019, 'Stati Uniti', 4),
(18, 'Donda (Deluxe)', 'Kanye West', 2021, 'Stati Uniti', 4),
(19, 'VULTURES 1', '¥$, Kanye West, Ty Dolla $ign', 2024, 'Stati Uniti', 4),
(21, 'Untitled Unmastered', 'Kendrick Lamar', 2014, 'Stati Uniti', 3),
(22, 'To Pimp a Butterfly', 'Kendrick Lamar', 2015, 'Stati Uniti', 4),
(23, 'Good Kid, m.A.A.d City', 'Kendrick Lamar', 2012, 'Stati Uniti', 5),
(25, 'DAMN.', 'Kendrick Lamar', 2017, 'Stati Uniti', 4),
(26, 'Mr. Morale & the Big Steppers', 'Kendrick Lamar', 2022, 'Stati Uniti', 3),
(27, 'GNX', 'Kendrick Lamar', 2024, 'Stati Uniti', 4),
(28, 'SEYCHELLES', 'Masayoshi Takanaka', 1976, 'Giappone', 5),
(29, 'BRASILIAN SKIES', 'Masayoshi Takanaka', 1978, 'Giappone', 4),
(30, 'Vera Baddie', 'ANNA', 2024, 'Italia', 3),
(31, 'Man on the Moon: The End of Day', 'Kid Cudi', 2009, 'Stati Uniti', 4),
(32, 'Man on the Moon II: The Legend of Mr. Rager', 'Kid Cudi', 2010, 'Stati Uniti', 4),
(33, 'The Stranger', 'Billy Joel', 1977, 'Stati Uniti', 3),
(34, 'Paranoid', 'Black Sabbath', 1970, 'Regno Unito', 4),
(35, 'Channel Orange', 'Frank Ocean', 2012, 'Stati Uniti', 4),
(39, '\"Awaken, My Love!\"', 'Childish Gambino', 2016, 'Stati Uniti', 4),
(40, 'Discovery', 'Daft Punk', 2001, 'Francia', 5),
(41, 'The Money Store', 'Death Grips', 2011, 'Stati Uniti', 5),
(42, 'Around The Fur', 'Deftones', 1997, 'Stati Uniti', 3),
(43, 'The Eminem Show', 'Eminem', 2002, 'Stati Uniti', 3),
(44, 'Brat and It\'s Completely Different but Also Still Brat', 'Charli xcx', 2024, 'Stati Uniti', 4),
(45, 'We Don\'t Trust You', 'Future, Metro Boomin', 2024, 'Stati Uniti', 2),
(46, 'Timeless', 'Goldie', 1995, 'Regno Unito', 5),
(47, 'Timeless (The Remixes)', 'Goldie', 2023, 'Regno Unito', 3),
(48, 'In the Court of the Crimson King', 'King Crimson', 1969, 'Regno Unito', 5),
(49, 'Mezzanine', 'Massive Attack', 1998, 'Regno Unito', 4),
(50, 'MM... FOOD', 'MF DOOM', 2004, 'Stati Uniti', 4),
(51, 'Life After Death', 'The Notorious Big', 1997, 'Stati Uniti', 4),
(52, 'Nevermind 30th Anniversary', 'Nirvana', 1997, 'Stati Uniti', 5),
(53, 'In A Model Room', 'P-MODEL', 1979, 'Giappone', 5),
(54, 'Perspective', 'P-MODEL', 1982, 'Giappone', 5),
(55, 'ONE PATTERN', 'P-MODEL', 1986, 'Giappone', 5),
(56, 'P-MODEL GOLDEN BEST (BIG BODY + P-MODEL)', 'P-MODEL', 2004, 'Giappone', 4),
(57, 'Third', 'Portishead', 2008, 'Regno Unito', 4),
(58, 'Pablo Honey', 'Radiohead', 1993, 'Regno Unito', 4),
(59, 'Ok Computer', 'Radiohead', 1997, 'Regno Unito', 5),
(60, 'In Rainbows', 'Radiohead', 2007, 'Regno Unito', 3),
(61, 'VULTURES 3', 'Random Access Melodies', 2024, 'Italia', 5),
(62, 'The Best of Sade', 'Sade', 1994, 'Regno Unito', 5),
(63, 'Aja', 'Steely Dan', 1977, 'Stati Uniti', 5),
(64, 'Innerspeaker', 'Tame Impala', 2010, 'Stati Uniti', 3),
(65, 'Currents', 'Tame Impala', 2015, 'Stati Uniti', 5),
(67, 'The Slow Rush', 'Tame Impala', 2020, 'Stati Uniti', 4),
(70, 'Lover', 'Taylor Swift', 2019, 'Stati Uniti', 3),
(71, 'Rodeo', 'Travis Scott', 2015, 'Stati Uniti', 3),
(72, 'Birds in the Trap Sing McKnight', 'Travis Scott', 2016, 'Stati Uniti', 3),
(73, 'ASTROWORLD', 'Travis Scott', 2018, 'Stati Uniti', 4),
(74, 'Utopia', 'Travis Scott', 2023, 'Stati Uniti', 4),
(75, 'Goblin', 'Tyler, The Creator', 2011, 'Stati Uniti', 3),
(76, 'Wolf', 'Tyler, The Creator', 2014, 'Stati Uniti', 4),
(77, 'Cherry Bomb', 'Tyler, The Creator', 2015, 'Stati Uniti', 2),
(78, 'Flower Boy', 'Tyler, The Creator', 2017, 'Stati Uniti', 4),
(79, 'IGOR', 'Tyler, The Creator', 2019, 'Stati Uniti', 5),
(80, 'Call Me If You Get Lost', 'Tyler, The Creator', 2021, 'Stati Uniti', 4),
(81, 'Historicity', 'Vijay Iyer Trio', 2009, 'Germania', 3),
(82, 'Evangelion Finally', 'AA. VV.', 2020, 'Giappone', 5),
(83, 'Nevermind (30th Anniversary Super Deluxe)', 'Nirvana', 1997, 'Stati Uniti', 5);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cds`
--
ALTER TABLE `cds`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `cds`
--
ALTER TABLE `cds`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
