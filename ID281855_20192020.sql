-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql130.hosting.combell.com:3306
-- Gegenereerd op: 24 jan 2020 om 18:31
-- Serverversie: 5.7.28-31
-- PHP-versie: 7.1.25-1+0~20181207224605.11+jessie~1.gbpf65b84

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ID281855_20192020`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `int3_categories`
--

CREATE TABLE `int3_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `int3_categories`
--

INSERT INTO `int3_categories` (`id`, `name`) VALUES
(1, 'abonnementen'),
(2, 'gadgets'),
(3, 'boeken');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `int3_images`
--

CREATE TABLE `int3_images` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `int3_images`
--

INSERT INTO `int3_images` (`id`, `item_id`, `path`) VALUES
(1, 1, 'abonnementdigitaal_1'),
(2, 2, 'abonnementpapier_1'),
(3, 3, 'agenda_1'),
(4, 6, 'loepgroot_1'),
(5, 6, 'loepgroot_2'),
(6, 6, 'loepgroot_3'),
(7, 7, 'loepprofessioneel_1'),
(8, 7, 'loepprofessioneel_2'),
(9, 8, 'leeslamp_1'),
(10, 8, 'leeslamp_2'),
(11, 8, 'leeslamp_3'),
(12, 9, 'boekenlicht_1'),
(13, 9, 'boekenlicht_2'),
(14, 9, 'boekenlicht_3'),
(15, 9, 'boekenlicht_4'),
(16, 9, 'boekenlicht_5'),
(17, 9, 'boekenlicht_6'),
(18, 11, 'boek_neuromancer_1'),
(19, 11, 'boek_neuromancer_2'),
(20, 12, 'boek_readyplayerone_1'),
(21, 13, 'boek_snowcrash_1'),
(22, 14, 'boek_wool_1'),
(23, 14, 'boek_wool_2'),
(24, 15, 'boek_theroad_1'),
(25, 16, 'boek_irobot_1'),
(26, 17, 'boek_endersgame_1'),
(27, 18, 'boek_thehandsmaidstale_1'),
(28, 19, 'boek_fahrenheit451_1'),
(29, 20, 'boek_doandroidsdreamofelectricsheep_1'),
(30, 4, 'bladwijzer_1'),
(31, 5, 'boekensteun_1'),
(32, 10, 'boekenreeks_1');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `int3_items`
--

CREATE TABLE `int3_items` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `priceinfo` varchar(255) NOT NULL,
  `intro` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(255) NOT NULL,
  `option_id` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `int3_items`
--

INSERT INTO `int3_items` (`id`, `title`, `priceinfo`, `intro`, `description`, `category_id`, `option_id`, `thumbnail`) VALUES
(1, 'Digitaal abonnement', 'Vanaf &euro; 12,76 / maand', 'Krijg wekelijks toegang tot onze digitale Humo magazine, gedurende 1, 2 of 3 jaar.', '<p class=\"info__description\">\r\nKrijg wekelijks toegang tot onze digitale Humo magazine, bestaande uit spraakmakende coverstory\'s, onthullende interviews met een aparte kijk op onderwerpen die er echt toe doen en veel meer. De digitale Humo magazine kan via pc, mobile of tablet gelezen worden via de website of onze app.\r\n</p>', 1, '1', 'abonnementdigitaal'),
(2, 'Abonnement per post', 'Vanaf &euro; 12,76 / maand', 'Krijg wekelijks de Humo magazine in je brievenbus, gedurende 1, 2 of 3 jaar.', '<p class=\"info__description\">\r\nKrijg wekelijks de Humo magazine in je brievenbus, bestaande uit spraakmakende coverstory\'s, onthullende interviews met een aparte kijk op onderwerpen die er echt toe doen en veel meer. De Humo magazine ontvangt u op de dag van verschijning. \r\n</p>', 1, '1', 'abonnementpapier'),
(3, 'Humo agenda 2020', '&euro; 16,95', 'De nieuwe Humo agenda voor 2020.', '<p class=\"info__description\">\r\nDe nieuwe Humo agenda voor 2020, formaat 13,3 x 20,8 cm. 70 grams papier en 1 dag per pagina. Indeling beginnend op 07.00 tot en met 22.00 uur, één regel per halfuur. Voorzien van hoekperforatie en leeslint. \r\n</p>', 2, '2', 'agenda'),
(4, 'Bladwijzer', '&euro; 4,50', 'Geniet van het lezen met deze speciaal ontworpen bladwijzer.', '<p class=\"info__description\">\r\nDeze week in de kijker: Fahrenheit 451. Geniet van het lezen met deze speciaal ontworpen bladwijzer.\r\n</p>', 2, '3', 'bladwijzer'),
(5, 'Boekensteun Humo', '&euro; 18,50', 'Een tweedelig boekensteun ter ere van het jaar van de Rat.', '<p class=\"info__description\">\r\n2020 is het jaar van de Rat. Hiervoor hebben we speciaal een boekensteun ontworpen, een twee-delig standbeeld om je boeken stevig te houden in stijl.\r\n</p>', 2, '4', 'boekensteun'),
(6, 'Grote loep', '&euro; 12,50', 'Vergrootglas met een diameter van 90 mm, vergroot de tekst tweemaal ', '<p class=\"info__description\">\r\nMet dit vergrootglas met een diameter van 90 mm, kan je eindelijk die kleine lettertjes wel (weer) lezen.  Deze loep vergroot een tekst tweemaal en in de uitsparing wordt het beeld zelfs 4 keer groter weergegeven! Bovendien ligt deze lichtgewicht loep makkelijk in de hand, dankzij een rubberen frame en beschermlaag die ook bij dagelijks gebruik duurzaamheid garandeert.\r\n</p>', 2, '5', 'loepgroot'),
(7, 'Professionele loep', '&euro; 7,50', 'Met een vergroting van 6x worden de allerkleinste details zichtbaar. ', '<p class=\"info__description\">\r\nVan amateur-archeoloog tot professioneel postzegelverzamelaar, deze professionele loupe is dankzij zijn handige formaat perfect voor elke hobbyist. Met  deze loep met een vergroting van 6x worden de allerkleinste details van je verzamelobjecten zichtbaar. \r\n</p>', 2, '6', 'loepprofessioneel'),
(8, 'Retro leeslicht', '&euro; 18,50', 'Een boekenlichtje met een vormgeving van vroeger en een gebruiksgemak van nu.', '<p class=\"info__description\">\r\nEen boekenlichtje met een vormgeving van vroeger en een gebruiksgemak van nu.  Dit leeslampje kan perfect bevestigd worden op elk boek. De richtbare led lamp zorgt voor optimaal leescomfort.  Als je The Booklamp niet gebruikt, laat je\'m eenvoudigweg achter in de verzwaarde voet. Je leukt er ook nog eens je bureau, tafel of schoorsteenmantel mee op. Wordt geleverd inclusief batterijen.\r\n</p>', 2, '7', 'leeslamp'),
(9, 'Mini boekenlicht', '&euro; 9,90', 'Krachtige ledlampje dat je bevestigt op de cover van je boek.', '<p class=\"info__description\">\r\nStoppen met lezen als het licht uitgaat is helemaal niet meer nodig. Bevestig het lichtje op de cover van je boek, richt het uiterst, krachtige ledlampje op je boek en je kan doorlezen tot in de vroege uurtjes.\r\n</p>', 2, '8', 'boekenlicht'),
(10, 'Boekenreeks', '&euro; 48,95', 'Een volledige boekenreeks, bestaande uit 10 boeken.', '<p class=\"info__description\">\r\nGeniet van de volledige boekenreeks uit onze 10-week special. Deze bestaan uit 10 spannende dystopian boeken.\r\n</p>\r\n\r\n<p>\r\nNeuromancer<br>\r\nReady Player One<br>\r\nSnow Crash<br>\r\nWool<br>\r\nThe Road<br>\r\nI, Robot<br>\r\nEnder\'s Game<br>\r\nThe Handsmaid’s Tale<br>\r\nFahrenheit 451<br>\r\nNeuromancer<br>\r\nDo androids dream of electric sheep\r\n</p>', 3, '9', 'boekenreeks'),
(11, 'Neuromancer', 'Boek &euro; 12,99 / E-book &euro; 1,99', '<strong>William Gibson</strong> | Case was de scherpste datadief in de matrix - totdat hij de verkeerde (…) ', '<p class=\"info__description\">\r\nCase was de scherpste datadief in de matrix - totdat hij de verkeerde mensen kruiste en zij zijn zenuwstelsel verlamden en hem uit cyberspace verbannen. Nu heeft een mysterieuze nieuwe werkgever hem aangeworven voor een laatste kans op een ondenkbaar krachtige kunstmatige intelligentie. Met een dode man op jachtgeweer en Molly, een straat-samoerai met spiegeloog om op zijn hoede te zijn, is Case klaar voor het avontuur dat een heel fictief genre ten goede komt.\r\n</p>\r\n\r\n<p class=\"info__description info__description--book\">\r\n<strong>Auteur:</strong> William Gibson | 320 pagina\'s\r\n</p>', 3, '10', 'boek_neuromancer'),
(12, 'Ready Player One', 'Boek &euro; 12,99 / E-book &euro; 1,99', '<strong>Ernest Cline</strong>  | In het jaar 2045 is de realiteit een lelijke plek. De enige keer dat Wade (…) ', '<p class=\"info__description\">\r\nIn het jaar 2045 is de realiteit een lelijke plek. De enige keer dat Wade Watts zich echt levend voelt, is wanneer hij de OASIS is ingesloten, een enorme virtuele wereld waar de meeste mensen hun dagen doorbrengen.\r\n</p>\r\n\r\n<p class=\"info__description\">\r\nWanneer de excentrieke maker van de OASIS sterft, laat hij een reeks duivelse puzzels achter, gebaseerd op zijn obsessie met de popcultuur van tientallen jaren geleden. Degene die deze als eerste oplost, zal zijn enorme fortuin erven - en controle over de OASIS zelf.\r\n</p>\r\n\r\n<p class=\"info__description info__description--book\"><strong>Auteur:</strong> Ernest Cline | 384 pagina\'s</p>', 3, '10', 'boek_readyplayerone'),
(13, 'Snow Crash', 'Boek &euro; 12,99 / E-book &euro; 1,99', '<strong>Neal Stephenson</strong> | In werkelijkheid levert Hiro pizza voor CosoNostra Pizza (…)', '<p class=\"info__description\">\r\nIn werkelijkheid levert Hiro pizza voor CosoNostra Pizza Inc. van oom Enzo, maar in de Metaverse is hij een krijgerprins. Duik diep in het raadsel van een nieuw computervirus dat overal hackers treft en racet langs de neonverlichte straten op een zoek-en-vernietig missie voor de schaduwachtige virtuele schurk die dreigt infocalyps te veroorzaken.\r\n</p>\r\n\r\n<p class=\"info__description info__description--book\">\r\n<strong>Auteur:</strong> Neal Stephenson | 480 pagina\'s\r\n</p>', 3, '10', 'boek_snowcrash'),
(14, 'Wool', 'Boek &euro; 12,99 / E-book &euro; 1,99', '<strong>Hugh Howey</strong>  | In een geruïneerd en giftig landschap leeft een gemeenschap in (…) ', '<p class=\"info__description\">\r\nIn een geruïneerd en giftig landschap leeft een gemeenschap in een gigantische ondergrondse silo. Honderden meters onder de aardoppervlakte wonen de mensen er in een streng gereguleerde maatschappij. Sheriff Holston, jarenlang een trouwe aanhanger van de wetten van de silo, breekt onverwachts het allergrootste taboe: hij wil naar buiten.\r\n</p>\r\n\r\n<p class=\"info__description info__description--book\">\r\n<strong>Auteur:</strong> Hugh Howey | 58 pagina\'s\r\n</p>', 3, '10', 'boek_wool'),
(15, 'The Road', 'Boek &euro; 12,99 / E-book &euro; 1,99', '<strong>Cormac McCarthy</strong>  | Een vader en zijn zoon lopen alleen door het verbrande Amerika. (…) ', '<p class=\"info__description\">\r\nEen vader en zijn zoon lopen alleen door het verbrande Amerika. Niets beweegt in het verwoeste landschap behalve de as op de wind. Het is koud genoeg om stenen te kraken en wanneer de sneeuw valt is het grijs. De lucht is donker. Hun bestemming is de kust, hoewel ze niet weten wat hen daar te wachten staat. Ze hebben niets; gewoon een pistool om zichzelf te verdedigen tegen de wetteloze bands die de weg besluipen, de kleren die ze dragen, een kar met opruiming van voedsel - en elkaar.\r\n</p>\r\n\r\n<p class=\"info__description info__description--book\">\r\n<strong>Auteur:</strong> Cormac McCarthy | 204 pagina\'s\r\n</p>', 3, '10', 'boek_theroad'),
(16, 'I, Robot', 'Boek &euro; 12,99 / E-book &euro; 1,99', '<strong>Isaac Asimov</strong> | Door de DRIE WETTEN VAN ROBOTICA op te zetten en te testen, blijven (…) ', '<p class=\"info__description\">\r\nDoor de DRIE WETTEN VAN ROBOTICA op te zetten en te testen, blijven ze het begrip en ontwerp van kunstmatige intelligentie tot op de dag van vandaag vormgeven. Wat gebeurt er wanneer een robot zijn makers begint te ondervragen? Wat zijn de gevolgen van het creëren van een robot met gevoel voor humor? Of het vermogen om te liegen? Hoe vertellen we echt het verschil tussen mens en machine?\r\n</p>\r\n\r\n<p class=\"info__description info__description--book\">\r\n<span><strong>Auteur:</strong> Isaac Asimov | 256 pagina\'s</span>\r\n</p>', 3, '10', 'boek_irobot'),
(17, 'Ender\'s Game', 'Boek &euro; 12,99 / E-book &euro; 1,99', '<strong>Orson Scott Card</strong>  | De aarde maakt zich op voor de beslissende slag in de (…) ', '<p class=\"info__description\">\r\nDe aarde maakt zich op voor de beslissende slag in de oorlog tegen de kruiperds. Het voortbestaan van de mensheid hangt af van een militair genie dat deze buitenaardse wezens zal kunnen verslaan. Wie dat is? Ender Wiggin. Hij is briljant, meedogenloos, sluw. Een tactische en stratergische mastermind. Maar ook nog maar een kind. Aan zijn jeugd komt vrij abrupt een einde zodra hij op de Krijgsschool aankomt. \r\n</p>\r\n\r\n<p class=\"info__description\">\r\nAl snel bewijst Ender dat hij een geniaal oorlogsstrateeg is. Hij blinkt uit in wargames, maar zal hij bestand zijn tegen de druk en de eenzaamheid in het echte gevecht? De vraag is: hoe zal Ender presenteren als het er echt op aankomt? De krijgsschool is per slot van rekening maar een spel. Of niet?\r\n</p>\r\n\r\n<p class=\"info__description info__description--book\">\r\n<strong>Auteur:</strong> Orson Scott Card | 324 pagina\'s\r\n</p>', 3, '10', 'boek_endersgame'),
(18, 'The Handsmaid’s Tale', 'Boek &euro; 12,99 / E-book &euro; 1,99', '<strong>Margaret Atwood</strong> | Binnen de grenzen van de voormalige Verenigde Staten heeft (…) ', '<p class=\"info__description\">\r\nBinnen de grenzen van de voormalige Verenigde Staten heeft een christelijke beweging de macht gegrepen. In deze nieuwe Republiek Gilead dient eenieder naar de letter van het Oude Testament te leven. Vanfred, de vertelster, behoort tot de nieuwe klasse der ‘Dienstmaagden’, die slechts één doel heeft: zich voort te planten. Alleen ’s nachts in haar sobere kamer is ze vrij om zich over te geven aan haar illegale herinneringen: het lezen van boeken, haar eigen naam, het nu irrelevant geworden begrip ‘liefde’.\r\n</p>\r\n\r\n<p class=\"info__description info__description--book\">\r\n<strong>Auteur:</strong> Margaret Atwood | 344 pagina\'s\r\n</p>', 3, '10', 'boek_thehandsmaidstale'),
(19, 'Fahrenheit 451', 'Boek &euro; 12,99 / E-book &euro; 1,99', '<strong>Ray Bradbury</strong>  | Het verhaal speelt in de 24e eeuw in een land waar niemand meer (…) ', '<p class=\"info__description\">\r\nGuy Montag is brandweerman. In zijn wereld, waar de televisie heerst en literatuur nagenoeg is uitgestorven, blussen brandweermannen geen vuren: ze beginnen ze juist. Het is zijn baan om de meest illegale artikelen te verwoesten: boeken. Ook de huizen waarin die boeken zijn verborgen, gaan in vlammen op.\r\n</p>\r\n\r\n<p class=\"info__description\">\r\nMontag twijfelt nooit aan de vernietiging en verwoesting die zijn acties teweegbrengen. Maar dan ontmoet hij zijn excentrieke jonge buurvrouw, Clarisse, die hem introduceert tot een verleden waar mensen niet in angst leefden en tot een heden waar men de wereld ziet door de ideeën in boeken in plaats van het hersenloze gepraat op de televisie.\r\n</P>\r\n\r\n<p class=\"info__description info__description--book\">\r\n<strong>Auteur:</strong> Ray Bradbury | 157 pagina\'s\r\n</p>', 3, '10', 'boek_fahrenheit451'),
(20, 'Do androids dream of electric sheep', 'Boek &euro; 12,99 / E-book &euro; 1,99', '<span class=\"bold\">Philip K. Dick</span>  | Wereldoorlog Terminus veranderde de aarde in een puinhoop. Door zijn (…) ', '<p class=\"info__description\">\r\nWereldoorlog Terminus veranderde de aarde in een puinhoop. Premiejager Rick Deckard zoekt verder naar de afvallige replicanten die zijn prooi waren. Wanneer hij ze niet met zijn laserwapen vermoordde, droomde hij ervan een levend dier te bezitten - het ultieme statussymbool in een wereld die vrijwel geen dierenleven heeft.\r\n</p>\r\n\r\n<p class=\"info__description\">\r\nToen kreeg Rick zijn kans: de opdracht om zes Nexus-6-doelen te doden, voor een enorme beloning. Maar in de wereld van Deckard was het nog nooit zo eenvoudig, en zijn opdracht veranderde snel in een nachtmerrie van uitvlucht en bedrog - en de dreiging van de dood voor de jager in plaats van de gejaagde.\r\n</p>\r\n\r\n<p class=\"info__description info__description--book\">\r\n<strong>Auteur:</strong> Philip K. Dick | 208 pagina\'s\r\n</p>', 3, '10', 'boek_doandroidsdreamofelectricsheep');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `int3_item_options`
--

CREATE TABLE `int3_item_options` (
  `id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `promocode` varchar(255) NOT NULL,
  `promoprice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `int3_item_options`
--

INSERT INTO `int3_item_options` (`id`, `option_id`, `name`, `price`, `promocode`, `promoprice`) VALUES
(1, 1, '12 maanden', '15.95', '0', '15.95'),
(2, 1, '24 maanden', '14.36', '0', '14.36'),
(3, 1, '36 maanden', '12.76', '0', '12.76'),
(4, 2, 'no option', '16.95', '0', '16.95'),
(5, 3, 'no option', '4.50', '0', '4.50'),
(6, 4, 'no option', '18.50', '0', '18.50'),
(7, 5, 'no option', '12.50', '0', '12.50'),
(8, 6, 'no option', '7.50', '0', '7.50'),
(9, 7, 'Zwart', '18.50', '0', '18.50'),
(10, 7, 'Blauw', '18.50', '0', '18.50'),
(11, 7, 'Rood', '18.50', '0', '18.50'),
(12, 7, 'Wit', '18.50', '0', '18.50'),
(13, 8, 'Rood', '9.90', '0', '18.50'),
(14, 8, 'Groen', '9.90', '0', '18.50'),
(15, 8, 'Blauw', '9.90', '0', '18.50'),
(16, 9, 'no option', '48.95', '0', '48.95'),
(17, 10, 'Boek', '12.99', 'devine', '4.99'),
(18, 10, 'E-book', '1.99', '0', '1.99');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `int3_options`
--

CREATE TABLE `int3_options` (
  `id` int(11) NOT NULL,
  `optioninfo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `int3_options`
--

INSERT INTO `int3_options` (`id`, `optioninfo`) VALUES
(1, 'Kies je abonnement'),
(2, '0'),
(3, '0'),
(4, '0'),
(5, '0'),
(6, '0'),
(7, 'Kies je kleur'),
(8, 'Kies je kleur'),
(9, '0'),
(10, 'Kies je boek');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `int3_orders`
--

CREATE TABLE `int3_orders` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postalcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `int3_order_items`
--

CREATE TABLE `int3_order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `int3_categories`
--
ALTER TABLE `int3_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `int3_images`
--
ALTER TABLE `int3_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `int3_items`
--
ALTER TABLE `int3_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `int3_item_options`
--
ALTER TABLE `int3_item_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `int3_options`
--
ALTER TABLE `int3_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `int3_orders`
--
ALTER TABLE `int3_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `int3_order_items`
--
ALTER TABLE `int3_order_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `int3_categories`
--
ALTER TABLE `int3_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `int3_images`
--
ALTER TABLE `int3_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT voor een tabel `int3_items`
--
ALTER TABLE `int3_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT voor een tabel `int3_item_options`
--
ALTER TABLE `int3_item_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT voor een tabel `int3_options`
--
ALTER TABLE `int3_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `int3_orders`
--
ALTER TABLE `int3_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `int3_order_items`
--
ALTER TABLE `int3_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
