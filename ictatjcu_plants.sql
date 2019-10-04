-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 03, 2019 at 08:52 PM
-- Server version: 5.6.40-84.0-log
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ictatjcu_plants`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `adminname` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contactno` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminname`, `email`, `password`, `contactno`) VALUES
(1, 'test', 'test@gmail.com', 'test@123', '0424458029');

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `f_id` int(11) NOT NULL,
  `f_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`f_id`, `f_name`) VALUES
(1, 'Agavaceae '),
(2, 'Aizoaceae'),
(3, 'Aloaceae'),
(4, 'Amaranthaceae'),
(5, 'Amaryllidaceae'),
(6, 'Anacardiaceae'),
(7, 'Anthericaceae'),
(8, 'Apiaceae'),
(9, 'Apocynaceae'),
(10, 'Araceae'),
(11, 'Araliaceae'),
(12, 'Asclepiadaceae'),
(13, 'Asparagaceae'),
(14, 'Asphodelaceae '),
(15, 'Asteraceae'),
(16, 'Balsaminaceae'),
(17, 'Bombacaceae'),
(18, 'Bromeliaceae'),
(19, 'Burseraceae'),
(20, 'Caesalpiniaceae'),
(21, 'Capparaceae'),
(22, 'Caricaceae'),
(23, 'Caryophyllaceae'),
(24, 'Chenopodiaceae'),
(25, 'Commelinaceae'),
(26, 'Convolvulaceae'),
(27, 'Crassulaceae'),
(28, 'Cucurbitaceae'),
(29, 'Didiereaceae'),
(30, 'Dioscoreaceae'),
(31, 'Dracaenaceae'),
(32, 'Eriospermaceae'),
(33, 'Euphorbiaceae'),
(34, 'Fabaceae'),
(35, 'Fouquieriaceae'),
(36, 'Geraniaceae'),
(37, 'Gesneriaceae'),
(38, 'Halophytaceae'),
(39, 'Hyacinthaceae'),
(40, 'Hypoxidaceae'),
(41, 'Icacinaceae'),
(42, 'Lamiaceae'),
(43, 'Liliaceae'),
(44, 'Malvaceae'),
(45, 'Melianthaceae'),
(46, 'Menispermaceae'),
(47, 'Moraceae Link'),
(48, 'Moringaceae'),
(49, 'Orchidaceae'),
(50, 'Oxalidaceae'),
(51, 'Passifloraceae'),
(52, 'Pedaliaceae'),
(53, 'Phytolaccaceae'),
(54, 'Piperaceae'),
(55, 'Polemoniaceae'),
(56, 'Portulacaceae'),
(57, 'Rubiaceae'),
(58, 'Saxifragaceae'),
(59, 'Solanaceae'),
(60, 'Sterculiaceae'),
(61, 'Urticaceae'),
(62, 'Velloziaceae'),
(63, 'Violaceae'),
(64, 'Vitaceae'),
(65, 'Welwitschiaceae'),
(66, 'Xanthorrhoeaceae'),
(67, 'Zygophyllaceae');

-- --------------------------------------------------------

--
-- Table structure for table `genera`
--

CREATE TABLE `genera` (
  `gen_id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `gen_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genera`
--

INSERT INTO `genera` (`gen_id`, `f_id`, `gen_name`) VALUES
(1, 3, 'Aloe'),
(2, 3, 'Aloiampelos '),
(3, 3, 'Aloidendron '),
(4, 3, 'Aloinella '),
(5, 3, 'x Alworthia '),
(6, 3, 'Apicra '),
(7, 3, 'Aristaloe '),
(8, 3, 'Astroloba '),
(9, 3, 'x Astroworthia '),
(10, 3, 'Busipho '),
(11, 3, 'Catevala '),
(12, 3, 'x Gasteraloe '),
(13, 3, 'x Gasterhaworthia '),
(14, 3, 'Gasteria'),
(15, 3, 'x Gastrolea'),
(16, 3, 'Guillauminia '),
(17, 3, 'Haworthia '),
(18, 3, 'Haworthiopsis'),
(19, 3, 'Kumara'),
(20, 3, 'Kumaria '),
(21, 3, 'Lemeea '),
(22, 3, 'Leptaloe '),
(23, 3, 'Lomatophyllum '),
(24, 3, 'Pachidendron '),
(25, 3, 'Poellnitzia '),
(26, 3, 'Ptyas '),
(27, 3, 'Rhipidodendrum '),
(28, 3, 'Tulista '),
(29, 2, 'Abryanthemum'),
(30, 2, 'Acaulon '),
(31, 2, 'Acrodon '),
(32, 2, 'Aistocaulon '),
(33, 2, 'Aizoon '),
(34, 2, 'Aloinopsis '),
(35, 2, 'Amphibolia '),
(36, 2, 'Anisocalyx '),
(37, 2, 'Antegibbaeum'),
(38, 2, 'Antimima '),
(39, 2, 'Aptenia '),
(40, 2, 'Argeta '),
(41, 2, 'Argyroderma '),
(42, 2, 'Aridaria '),
(43, 2, 'Astridia'),
(44, 2, 'Bergeranthus '),
(45, 2, 'Bijlia '),
(46, 2, 'Bolusanthemum '),
(47, 2, 'Braunsia '),
(48, 2, 'Carpobrotus '),
(49, 2, 'Carruanthus '),
(50, 2, 'Cephalophyllum'),
(51, 2, 'Cerochlamys '),
(52, 2, 'Chasmatophyllum '),
(53, 2, 'Cheiridopsis'),
(54, 2, 'Conophyllum '),
(55, 2, 'Conophytum '),
(56, 2, 'Corpuscularia '),
(57, 2, 'Crocanthus '),
(58, 2, 'Cryophytum '),
(59, 2, 'Cylindrophyllum '),
(60, 2, 'Dactylopsis'),
(61, 2, 'Deilanthe '),
(62, 2, 'Delosperma '),
(63, 2, 'Depacarpus '),
(64, 2, 'Derenbergia '),
(65, 2, 'Dicrocaulon '),
(66, 2, 'Dinteranthus '),
(67, 2, 'Diplosoma '),
(68, 2, 'Dracophilus'),
(69, 2, 'Drosanthemopsis '),
(70, 2, 'Drosanthemum '),
(71, 2, 'Ebracteola'),
(72, 2, 'Echinus '),
(73, 2, 'Erepsia '),
(74, 2, 'Faucaria '),
(75, 2, 'Fenestraria '),
(76, 2, 'Frithia '),
(77, 2, 'Gasoul'),
(78, 2, 'Gibbaeum'),
(79, 2, 'Glottiphyllum'),
(80, 2, 'Halenbergia'),
(81, 2, 'Halimus '),
(82, 2, 'Hammeria '),
(83, 2, 'Hartmanthus '),
(84, 2, 'Henricia'),
(85, 2, 'Hereroa'),
(86, 2, 'Hymenocyclus'),
(87, 2, 'Ihlenfeldtia '),
(88, 2, 'Imitaria '),
(89, 2, 'Jacobsenia '),
(90, 2, 'Jensenobotrya '),
(91, 2, 'Juttadinteria '),
(92, 2, 'Lampranthus '),
(93, 2, 'Lapidaria'),
(94, 2, 'Lithops '),
(95, 2, 'Litocarpus '),
(96, 2, 'Ludolfia'),
(97, 2, 'Machairophyllum '),
(98, 2, 'Malephora '),
(99, 2, 'Marlothistella '),
(100, 2, 'Maughaniella'),
(101, 2, 'Mentocalyx '),
(102, 2, 'Mesembryanthemum'),
(103, 2, 'Mestoklema '),
(104, 2, 'Meyerophytum '),
(105, 2, 'Mimetophytum '),
(106, 2, 'Mitrophyllum '),
(107, 2, 'Monilaria '),
(108, 2, 'Mossia '),
(109, 2, 'Namibia '),
(110, 2, 'Nananthus '),
(111, 2, 'Neohenricia '),
(112, 2, 'Neorhine'),
(113, 2, 'Nycteranthus '),
(114, 2, 'Odontophorus '),
(115, 2, 'Ophthalmophyllum'),
(116, 2, 'Opophytum '),
(117, 2, 'Orthopterum '),
(118, 2, 'Oscularia '),
(119, 2, 'Peersia '),
(120, 2, 'Pentacoilanthus '),
(121, 2, 'Perapentacoilanthus '),
(122, 2, 'Phyllobolus '),
(123, 2, 'Platythyra'),
(124, 2, 'Pleiospilos '),
(125, 2, 'Prenia'),
(126, 2, 'Prepodesma '),
(127, 2, 'Psammanthe'),
(128, 2, 'Psammophora '),
(129, 2, 'Psilocaulon'),
(130, 2, 'Pteropentacoilanthus '),
(131, 2, 'Punctillaria '),
(132, 2, 'Pyxipoma '),
(133, 2, 'Rabiea '),
(134, 2, 'Rhinephyllum '),
(135, 2, 'Rhombophyllum '),
(136, 2, 'Rimaria '),
(137, 2, 'Roodia '),
(138, 2, 'Ruschia '),
(139, 2, 'Ruschianthus '),
(140, 2, 'Sceletium '),
(141, 2, 'Schonlandia '),
(142, 2, 'Schwantesia '),
(143, 2, 'Sesuvium'),
(144, 2, 'Smicrostigma '),
(145, 2, 'Sphalmanthus'),
(146, 2, 'Stigmatocarpum '),
(147, 2, 'Stomatium '),
(148, 2, 'Synaptophyllum '),
(149, 2, 'Tanquana '),
(150, 2, 'Tetracoilanthus '),
(151, 2, 'Tetragonia'),
(152, 2, 'Titanopsis '),
(153, 2, 'Trianthema'),
(154, 2, 'Trichodiadema '),
(155, 2, 'Vanheerdea'),
(156, 2, 'Verrucifera '),
(157, 2, 'Veslingia');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `plant_id` int(11) NOT NULL,
  `group_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `user_id`, `group_name`, `date_added`, `comment`, `location`, `plant_id`, `group_image`) VALUES
(1, 5, 'Window sill carnivorous', '0000-00-00 00:00:00', 'Window sill carnivorous', 'Window sill kitchen', 33, 'bck.png'),
(2, 5, 'Hanging Hoyas', '0000-00-00 00:00:00', 'Hanging Hoyas', 'West balcony', 34, 'Aca.jpg'),
(3, 5, 'group 03', '0000-00-00 00:00:00', 'jkldfasd;lkfjdasf', 'goldcoast', 34, 'caleb-george-5sF6NrB1MEg-unsplash.jpg'),
(4, 5, 'group 04', '0000-00-00 00:00:00', 'asdfdasfdsaf lka;djsgla', 'darwin', 0, 'krystina-rogers-5aXEo-hGwU0-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `ext` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `user_id`, `album_id`, `timestamp`, `ext`) VALUES
(12, 1, 1, 1393958224, 'jpg'),
(13, 1, 1, 1393960325, 'jpg'),
(14, 1, 1, 1393960363, 'jpg'),
(12, 1, 1, 1393958224, 'jpg'),
(13, 1, 1, 1393960325, 'jpg'),
(14, 1, 1, 1393960363, 'jpg'),
(12, 1, 1, 1393958224, 'jpg'),
(13, 1, 1, 1393960325, 'jpg'),
(14, 1, 1, 1393960363, 'jpg'),
(12, 1, 1, 1393958224, 'jpg'),
(13, 1, 1, 1393960325, 'jpg'),
(14, 1, 1, 1393960363, 'jpg'),
(12, 1, 1, 1393958224, 'jpg'),
(13, 1, 1, 1393960325, 'jpg'),
(14, 1, 1, 1393960363, 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `oldd_albums`
--

CREATE TABLE `oldd_albums` (
  `album_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oldd_albums`
--

INSERT INTO `oldd_albums` (`album_id`, `user_id`, `timestamp`, `name`, `description`) VALUES
(1, 1, 1393956611, 'Girls', 'The beautiful girls.        '),
(2, 4, 1565824908, 'My favourite', 'Add al my fav plants.'),
(1, 1, 1393956611, 'Girls', 'The beautiful girls.        '),
(2, 4, 1565824908, 'My favourite', 'Add al my fav plants.');

-- --------------------------------------------------------

--
-- Table structure for table `old_age`
--

CREATE TABLE `old_age` (
  `id` int(11) NOT NULL,
  `lifespan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `old_age`
--

INSERT INTO `old_age` (`id`, `lifespan`) VALUES
(1, 'adult'),
(2, 'seedling');

-- --------------------------------------------------------

--
-- Table structure for table `old_albums`
--

CREATE TABLE `old_albums` (
  `album_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `old_albums`
--

INSERT INTO `old_albums` (`album_id`, `user_id`, `timestamp`, `name`, `description`) VALUES
(1, 1, 1393956611, 'Girls', 'The beautiful girls.        ');

-- --------------------------------------------------------

--
-- Table structure for table `old_care`
--

CREATE TABLE `old_care` (
  `id` int(255) NOT NULL,
  `generaid` varchar(255) NOT NULL,
  `season` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `ageid` varchar(255) NOT NULL,
  `speciesid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `old_care`
--

INSERT INTO `old_care` (`id`, `generaid`, `season`, `image`, `description`, `ageid`, `speciesid`) VALUES
(1, '1', 'Fall', 'fall.gif', 'In the fall, usually in August or September, the plants will begin growing. The first sign of growth is noticed when the fissure between the leaves begins to separate. In the days to follow, a bud will force its way up through the fissure and shortly thereafter a white or yellow flower will unfold. The flowers of many of the Lithops species have a spicy-sweet scent. If a plant does not flower the first year, perhaps it is not quite old enough. Lithops usually must be three to five years old before they begin flowering: they have been grown as seedlings for two years or more in the nursery. As the fissure separates further, a new pair of leaves can be seen developing inside. As the plant becomes older, it increases in size by division. This will begin by one plant producing two pairs of new leaves. The plant will then have two \"bodies\" attached to one root system. Some plants in Lithops collections have as many as ten or more bodies per plant, but it takes many years to develop a plant of this size. \r\n\r\nIn the wild, Lithops begin to flower and grow just after the seasonal rains have begun **. In cultivation, watering should generally begins from early to mid August for most species. Often a good drenching of the soil will encourage the plants to begin their growth cycles. It is safe to water deeply during the fall, and in fact is better than a shallow watering because the plants have taproots. It is important to let the soil dry out quite a bit between waterings: it should not still be wet when you water again. The soil mix should be a type that drains quickly and dries out relatively fast. A soggy soil remaining around the plants for days must be avoided to prevent rot. Regular waterings should be steadily decreased after the flowering period. Discontinue watering altogether by about late September for most species to allow the soil to dry out completely in preparation for the cold winter months. ', '1', ''),
(2, '1', 'Winter', 'winter.gif', 'During the winter months, the plants will still be growing; the new bodies will be increasing in size as the old outer leaves begin to shrivel. No water at all should be given during the winter … the soil should remain bone dry no matter how shrivelled the plants become. The new body actually draws out the water stored in the old leaves to continue growth, so do not remove the shriveled leaves. Lithops should not be exposed to temperature lower than 40°F (5°C). If the plant are too near a window during freezing weather, they will be damaged by frost even though the room seems warm, so move them back a little during really cold winter weather. ', '1', ''),
(3, '1', 'Spring', 'Spring.gif', 'The new body continues to extract the water and nutrient stored in the old leaves until the old leaves are reduced to nothing more than thin papery shells. These shells can then be easily removed from around the plant. It is spring by the time the plants reach this stage, and it is safe to water again to let the plants increase their growth. Begin by watering lightly, increasing the amount of water gradually, working up to several good drenchings during mid spring. Be sure to let the soil dry between waterings. Reduce watering as the heat and long days of summer approach, allowing the plants to prepare for their dormant period. \r\n\r\nThis brings the discussion of the growth cycle of Lithops full circle. It should be noted that this serves only as general guide to the way that Lithops grow. Each species has its own timetable for completing each stage of its growth, and it is nearly impossible to alter. Some species bloom as early as July, others as late as November. Although the method of cultivation described above is suitable for all species, you may wish to vary the times of watering a little as you become experienced in recognizing the different habits of each. \r\n\r\nAn ideal setting for Lithops is a group planting in a dish garden, intermixed with rounded stones of varous sizes and colors. The plants then display their nature of mimicry to the fullest as they become almost indistinguishable from the pebbles at a glance. Pots that are about 3 – 5 inches deep are recommended to allow the roots adequate room to grow. Make sure that drain holes are provided for the pot. Use a quick draining soil mix (a packaged soil mix for cactus and succulents should have sand added at the rate of about 2 parts soil mix to one part sand by volume). Space the plants at random, poking a hole into the soil to accommodate the taproot and lower portion of the body. Position the plants in the soil so that about three-quarters of the height of the plant remains above the soil level to permit the plant to „breathe“. Collapse the hole around the taproot by carefully poking a pencil into the soil near the plant. Set a few pebbles among the plants and finally sprinkle a thin layer of coarse sand (or bird gravel) over the exposed soil. Some of the plants will actually seem to have disappeared from sight among pebbles. (Note – planting Lithops in terrariums is not recommended due to extreme humidity). \r\n\r\nSpider mites are troublesome pests that sometimes attack Lithops. Their small size often lets them go unnoticed, but the damage that they cause can be seen as small spots of white scar tissue on the surface of the plant. Any insecticide used for the control of mites that is safe for most houseplants can be used at the recommended rate per label directions. \r\n\r\nConcern has arisen in recent years about the hazard that toxic houseplants represent to small children. Lithops are non-toxic. In fact, literature makes reference to children of several African races sometimes eating these plants as a means to quench thirst ***. It should be stressed however that any non-poisonous plant becomes toxic for a certain time after insecticides have been applied. ', '2', ''),
(4, '1', 'Summer', 'Summer.gif', ' During the summer months, Lithops become dormant, resting as they do in the wild, although as a houseplant the conditions are not so severe. The plants require little or no water when they are dormant. Regular watering during this period would almost surely cause them to suddenly rot and turn into mush. But if a prominent shrivelling occurs during the summer, it is safe to give just enough water to restore the firm appearance of the plant. Water lightly so that about only the top one-half inch or so of the soil is moistened. Never water deeply when the plants are dormant. \r\n', '2', ''),
(5, '2', 'Fall', '2figfall.jpg', 'During The Fall Pleiospilos nelii is a very adaptable plant, it will grow whenever it has water and good sunlight, but it will become dormant in very hot weather to conserve water. It need full sun to light shade with a very open compost that drains quickly. The container should be at least 10 cm deep to accommodate the long tap root. Very little water is needed during the growing season, and we do not fertilize the plants. In late summer to early fall before nighttime temperatures fall, watering of the plants is stepped up to once a week. When the nighttime temperatures drop to 9°C, watering is restricted throughout the winter months. In the winter, it grows new leaves from the center of the split, and the new leaves then consume the old leaves. If the plant is over watered, the old leaves remain and the plant usually rots and dies. Not to water it when it is splitting, just leave it alone. Even with no watering the leaves don\'t shrink and prune up like some succulents do when they are not watered they stays plump even after several months with no water. For an idea of how succulent these plants are, a mature specimen can easily go a whole year without any water in a typical European or North American climate. If the plants are grown correctly, ideally there should only ever be 2 pairs of leaves. The lower ones are the previous years, and the top ones, the current years. One sign of good care is a firm, round, symmetrical plant with no old leaves still attached at the end of summer.', '1', ''),
(6, '2', 'Winter', '2figwinter.jpg', 'In The Winter The Pleiospilos nelii is The kwaggavygie does best in a greenhouse or on a sunny windowsill. In arid regions, especially summer rainfall areas, it can also be planted outside in a rockery. It should be planted in well-drained soil, and keep in mind that this plant has a relatively long taproot. Pleiospilos nelii should get little water in winter and in summer. Unlike other Pleiospilos species, P. nelii will not flower if it is kept dry in winter. When watering, rather drench the soil and allow the soil to dry out for 2-3 weeks before watering again. The new pair of leaves starts growing in winter. The plant uses the moisture from the old leaves to create the new ones. If the old leaves are still present in summer, this could indicate that the plant might be getting too much water.', '1', ''),
(7, '2', 'Summer', '2figsummer', 'In Summer Pleiospilos nelii can easily be grown from seeds. Sow seeds in the summer months. To improve the success of germination, place the seeds in a small container with lukewarm water and leave for 24 hours. This will soften the hard outer layer of the seed. Sow the seeds in a sandy medium. Cover the seeds with a 1 mm thick layer of fine sand but make sure that they are not covered too thickly. The layer of sand prevents the tiny seeds from washing away, and it is best to water with a very fine spray. Keep them damp until they start to germinate in about seven days. Once the seedlings start growing, slowly reduce the amount of water given. The seedlings grow very slowly and should be replanted once they have reached a height of about 10 mm.', '2', ''),
(8, '2', 'Spring', '2figspring.jpg', 'In Spring The Pleiospilos is The 60 mm-diameter, salmon or pinkish-yellow flowers are borne from July to August. Once the flowers start to wither, their colour changes to orange. The flowers are solitary or up to four growing between the leaves. The fragrant flowers have a short pedicel and open in the mid-afternoon. The nine- to fifteen-locular, mostly eleven-locular, capsules open when wet and release the tiny seeds.', '2', ''),
(9, '3', 'Winter', '3figwinter.jpg', 'In The Winter This plants are relatively easy to cultivate in a an open, gritty and well drained soil, but have the tendency to up and die if the conditions are not right and, sometimes it seems, even if they are! They need full bright sunlight throughout the year. They will grow strongly at any time when the weather is warm and sunny and water is available and are considered opportunistic growers.', '1', ''),
(10, '3', 'Summer', '3figsummer.jpg', 'During Summer They will become dormant in very hot weather, particularly when nights stay very warm in the hottest couple of months of summer, and should hardly be watered at this time. Probably best to shade them during the hottest weather, they will be dormant anyway.', '1', ''),
(11, '3', 'Spring', '3figspring.jpg', 'In The Spring They will grow strongly in autumn and also may grow in spring. They probably won\'t show much growth in winter but might if they are in a very sunny position perhaps indoors. Water during the growing season about once every one-two weeks (depending on the humidity of the air) like a cactus and then leave it to drain well and to dry out completely before watering again. If in doubt, don\'t water, you are very unlikely to kill it from underwatering.', '2', ''),
(12, '3', 'Fall', '3figfall.jpg', 'During Fall do not over-water as they are very greedy drinkers and split within a day or so if given too much water Although the split of course disfigures the plant, this is not a major disaster as the following season, when the old body has shrivelled, the new one appears clean and unblemished. Be cautious about watering in winter because you may produce etiolated growth from lack of sun. At growth resumption when the new buds appear (after the old basal pair of leaves is totally shrivelled) a little water is given but not too much. Frost Tolerance -4 deg C for short periods.', '2', ''),
(13, '4', 'Winter', '4figwinter.jpg', 'Light. Haworthia species like bright light, but not direct sunlight. Soil. Use a cactus mix or very fast-draining potting soil.Water. Water evenly and generously in the summer, letting the soil media dry out between waterings.Fertilizer.Propagating Haworthia.', '1', ''),
(14, '4', 'Fall', '4figfall.jpg', 'Light. Haworthia species like bright light, but not direct sunlight. Soil. Use a cactus mix or very fast-draining potting soil.Water. Water evenly and generously in the summer, letting the soil media dry out between waterings.Fertilizer.Propagating Haworthia.', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `old_genera`
--

CREATE TABLE `old_genera` (
  `id` int(11) NOT NULL,
  `generaname` varchar(150) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `old_genera`
--

INSERT INTO `old_genera` (`id`, `generaname`, `description`) VALUES
(1, 'Lithops', '\nLithops plants are often called \"living stones\" but they also look a bit like cloven hooves. These small, split succulents are native to the deserts of South Africa but they are commonly sold in garden centers and nurseries. Lithops thrive in compacted, sandy soil with little water and blistering hot temperatures. While relatively easy to grow, a little information on lithops will help you learn how to grow living stone plants so that they thrive in your home. \n/n Information on Lithops /n\n There are numerous colorful names for plants in the Lithops genus. Pebble plants, mimicry plants, flowering stones, and of course, living stones are all descriptive monikers for a plant that has a unique form and growth habit. Lithops are small plants, rarely getting more than an inch above the soil surface and usually with only two leaves. The thick padded leaves represent the cleft in an animal\'s foot or just a pair of green to grayish brown stones clustered together. The plants have no true stem and much of the plant is underground. The resulting appearance has the double attribute of confusing grazing animals and conserving moisture.\n/n Lithops Succulent Adaptations  /n\nLithops grow in inhospitable areas with limited water and nutrients. Because the majority of the plant\'s body is below ground, it has minimal foliar space to gather sun\'s energy. As a result, the plant has developed a unique way of enhancing solar collection by means of \"windowpanes\" on the surface of the leaf. These transparent areas are filled with calcium oxalate, which creates a reflective facet that increases light penetration. Another fascinating adaptation of lithops is the long life of the seed capsules. Moisture is infrequent in their native habitat, so the seeds can remain viable in the soil for months. \n\n/n How to Grow Living Stones Plants /n\n Growing living stones in pots is preferred for most but the hottest zones. Lithops need a cactus mix or potting soil with some sand incorporated. The potting media needs to dry before you add moisture and you must place the pot in as bright an area as possible. Place the plant in a southern facing window for optimum light entry. Propagation is through division or seed, although seed grown plants take many months to establish and years before they resemble the parent plant. You can find both seeds and starts on the Internet or at succulent nurseries. Adult plants are common at even big box nurseries.\n/n  Lithops Care /n\n Lithops care is easy as long as you remember what type of climate the plant originates from and mimic those growing conditions. Be very careful, when growing living stones, not to overwater. These little succulents do not need to be watered in their dormant season, which is fall to spring. If you wish to encourage flowering, add a diluted cactus fertilizer in spring when you commence watering again. Lithops plants do not have many pest problems, but they may get scale, moisture gnats and several fungal diseases. Watch for signs of discoloration and evaluate your plant often for immediate treatment.\n\n'),
(2, 'Pleiospilos', 'General Care for Pleiospilos nelii \"Split Rock\"\nPleiospilos nelii \"Split Rock\"is a perfect example of mimicry in botany. Mimicry occurs when a plant evolves to resemble something around it. In the case of \"Split Rock,\" Pleiospilos nelii mimics stones, creating camouflage to blend in.\n\n\"Split Rock\" also has small specks on its leaves. These are \"windows\" which allows sunlight to penetrate into the body of the plant, so it is able to photosynthesize.\n\nWatering\n\"Split Rock\" tends to need a bit less water than other succulents. It\'s best to use the \"soak and dry\" method, and allow the soil to dry out completely between waterings. Water sparingly during the winter. Over-watering can cause your \"Split Rock\" to burst or rot.\nWhere to Plant\n\nPleiospilos nelii \"Split Rock\" is not cold hardy, so if you live in a zone that gets colder than 30 Deg F (-1.1Deg C), it\'s best to plant this succulent in a container that can be brought indoors. It does well in full to partial sun.\n\nPlant in sandy, well-draining soil. \"Split Rock\" does well indoors on windowsills.\n\nHow to Propagate Pleiospilos nelii \"Split Rock\"\n\n\"Split Rock\" can be propagated by division or by seeds. If you are new to growing from seed, be aware that, like any succulent seed, it can take quite some time to grow a full-sized plant.\n\nDivision\n\nPleiospilos nelii \"Split Rock\" can be propagated by dividing the leaves. Clumps should be removed in the spring before it begins to grow new leaves.\n\nUsing a sharp, sterile knife, remove a leaf from the main plant. Allow it to callous over for a day or two, and then place in well-draining sandy soil.\n\nSeeds\n\n\"Split Rock\" can be easily grown from seeds harvested from the flower pod or purchased online. Begin to sow your seeds in the summer, in a warm place.\n\nFor best results, soak your Pleiospilos nelii seeds in water for 24 hours before planting in a small layer of sandy soil. Keep soil damp, but not too wet, until seeds germinate.\n\nSoil\n\nPleiospilos nelii likes soil without much organic material. Use a well-draining soil (preferably sandy) and do not fertilize unless it is during its growing time.\n\n'),
(3, 'Lapidaria', 'Cultivation: This plants are relatively easy to cultivate in a an open, gritty and well drained soil, but have the tendency to up and die if the conditions are not right and, sometimes it seems, even if they are! They need full bright sunlight throughout the year. They will grow strongly at any time when the weather is warm and sunny and water is available and are considered opportunistic growers. They will become dormant in very hot weather, particularly when nights stay very warm in the hottest couple of months of summer, and should hardly be watered at this time. Probably best to shade them during the hottest weather, they will be dormant anyway. They will grow strongly in autumn and also may grow in spring. They probably won\'t show much growth in winter but might if they are in a very sunny position perhaps indoors. Water during the growing season about once every one-two weeks (depending on the humidity of the air) like a cactus and then leave it to drain well and to dry out completely before watering again. If in doubt, don\'t water, you are very unlikely to kill it from underwatering. Anyway do not over-water as they are very greedy drinkers and split within a day or so if given too much water Although the split of course disfigures the plant, this is not a major disaster as the following season, when the old body has shrivelled, the new one appears clean and unblemished. Be cautious about watering in winter because you may produce etiolated growth from lack of sun. At growth resumption when the new buds appear (after the old basal pair of leaves is totally shrivelled) a little water is given but not too much. Frost Tolerance -4 Deg C for short periods.\n '),
(4, 'Haworthia', 'How to Grow Haworthia\nHaworthia is not considered difficult houseplants to grow—if you can keep a pot of aloe alive on a windowsill, chances are you can do the same with a dish of Haworthia. As with all succulents, the most dangerous situation is too much water, since they should never be allowed to sit in water under any circumstances.\n\nAt the same time, these little decorative plants can be grown in interesting containers such as teacups and even miniature baby shoes. If you\'re given a Haworthia in such a container, make sure the container had adequate drainage. If it doesn\'t, it might be a good idea to pop the plant out of its container and add a layer of gravel to the bottom to reduce the wicking action of the soil above. Finally, look out for sunburned spots on your plants.\n\n\nLight\nHaworthia species like bright light, but not direct sunlight. These grow in similar conditions to other succulents. In their native environment, they are often found in the shade of a rock or other object. They do best in a room with a window facing east or west to provide bright light for a few hours a day. White or yellow leaves usually signify too much sun. If the plant isn\'t getting enough light, its green color will fade. If you move your indoor Haworthia outdoors for the warmer months, ease the plant into more and more direct light per day or, like a human, it may get a sunburn.\n\n\nSoil\nUse a cactus mix or very fast-draining potting soil. Many growers warn that mixing potting soil with sand clogs up the pores so the soil doesn\'t drain as well, so sand should be avoided. Instead, mix with perlite, aquarium gravel, or pumice.\n\nWater\nWater evenly and generously in the summer, letting the soil media dry out between waterings. In the winter, reduce watering to every other month. Never allow water to collect in the rosette.\n\nTemperature and Humidity\nHaworthia species like warmer temperatures in the summer but cool in the winter (down to 50 degrees Fahrenheit). They can get a freezing injury at 40 degrees Fahrenheit. This plant doesn\'t need any humidity. What it does require is good ventilation, especially at night when they take in carbon dioxide for photosynthesis. You might use a fan to keep air circulating so your Haworthia can breathe.\nFertilizer\nFertilize during the summer growing season with a cactus fertilizer. Don\'t feed during the winter.\nPotting and Repotting\nHaworthia are small (usually remaining between 3 inches and 5 inches in height) and relatively slow-growing. They are often grown in small clusters in wide, shallow dishes. Over time, clusters will naturally enlarge as the mother plant sends off small plantlets.\n\nWhen the cluster has outgrown its dish, repot in the spring or early summer into a new wide and shallow dish with fresh potting soil. This is also the time to take offsets for propagation.\nPropagating Haworthia\nHaworthia can be propagated at repotting time using offsets from the mother plant. When taking offsets, use a sharp knife or snippers and cut as close to the mother stem as possible to include as many roots as possible, then allow the offset to dry briefly before repotting it (similar to cuttings from other succulents). Pot the offsets in a small pot, using the same soil as the mother plant. Put it in a warm, bright spot, and make sure to adequately water.\n\nVarieties of Haworthia\nThere are about 80 species of Haworthia, but their classification can be complex. The main difference between the common species is the size of the leaves and the orientation of the white markings on the leaves. In general, the best advice is to buy the most attractive variety based on leaf form and markings, as they all have similar cultural requirements.');

-- --------------------------------------------------------

--
-- Table structure for table `old_groupPhoto`
--

CREATE TABLE `old_groupPhoto` (
  `gp_id` int(20) NOT NULL,
  `g_id` int(11) NOT NULL,
  `gp_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ph_url` varchar(200) NOT NULL,
  `ph_comments` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `old_groupPlant`
--

CREATE TABLE `old_groupPlant` (
  `pg_id` int(20) NOT NULL,
  `g_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `old_grouppp`
--

CREATE TABLE `old_grouppp` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `group_image` varchar(255) NOT NULL,
  `plant_id` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `old_grouppp`
--

INSERT INTO `old_grouppp` (`group_id`, `group_name`, `group_image`, `plant_id`) VALUES
(1, 'Rose rose', '3.jpg', '2'),
(5, 'Ecapluptus', '6.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `old_image`
--

CREATE TABLE `old_image` (
  `id` int(11) NOT NULL,
  `generaid` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `season` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `old_image`
--

INSERT INTO `old_image` (`id`, `generaid`, `image`, `season`) VALUES
(1, '1', 'winter1.jpg', 'Winter'),
(2, '1', 'winter2.jpg', 'Winter'),
(3, '1', 'winter3.jpg', 'Winter'),
(4, '1', 'winter4.jpg', 'Winter'),
(5, '1', 'winter5.jpg', 'Winter'),
(6, '1', 'winter6.jpg', 'Winter'),
(7, '1', 'winter7.jpg', 'winter'),
(8, '1', 'fall1.jpg', 'Fall'),
(9, '1', 'fall2.jpg', 'Fall'),
(10, '1', 'fall3.jpg', 'Fall'),
(11, '1', 'fall4.jpg', 'Fall'),
(12, '1', 'fall5.jpg', 'Fall'),
(13, '1', 'spring1.jpg', 'Spring'),
(14, '1', 'spring2.jpg', 'Spring'),
(15, '1', 'spring3.jpg', 'Spring'),
(16, '1', 'spring4.jpg', 'Spring'),
(17, '1', 'spring5.jpg', 'Spring'),
(18, '1', 'spring6.jpg', 'Spring'),
(19, '1', 'summer1.jpg', 'Summer'),
(20, '1', 'summer2.jpg', 'Summer'),
(21, '1', 'summer3.jpg', 'Summer'),
(22, '1', 'summer4.jpg', 'Summer'),
(23, '1', 'summer5.jpg', 'Summer'),
(24, '1', 'summer6.jpg', 'Summer'),
(25, '2', '2winter1.jpg', 'Winter'),
(26, '2', '2winter2.jpg', 'Winter'),
(27, '2', '2winter3.jpg', 'Winter'),
(28, '2', '2summer1.jpg', 'Summer'),
(30, '2', '2summer3.jpg', 'Summer'),
(31, '2', '2fall1.jpg', 'Fall'),
(32, '2', '2fall2.jpg', 'Fall'),
(33, '2', '2fall3.jpg', 'Fall'),
(34, '2', '2spring1.jpg', 'Spring'),
(35, '2', '2spring1.jpg', 'Spring'),
(36, '2', '2spring2.jpg', 'Spring'),
(37, '2', '2spring3.jpg', 'Spring'),
(38, '3', '3winter1.jpg', 'Winter'),
(39, '3', '3winter2.jpg', 'Winter'),
(41, '3', '3summer1.jpg', 'Summer'),
(42, '3', '3summer2.jpg', 'Summer'),
(43, '3', '3summer3.jpg', 'Summer'),
(44, '3', '3fall1.jpg', 'Fall'),
(45, '3', '3fall2.jpg', 'Fall'),
(46, '3', '3fall3.jpg', 'Fall'),
(47, '3', '3spring1.jpg', 'Spring'),
(48, '3', '3spring2.jpg', 'Spring'),
(49, '3', '3spring3.jpg', 'Spring'),
(50, '4', '4winter1.jpg', 'Winter'),
(51, '4', '4winter2.jpg', 'Winter'),
(52, '4', '4winter3.jpg', 'Winter'),
(53, '4', '4summer1.jpg', 'Summer'),
(54, '4', '4summer2.jpg', 'Summer'),
(55, '4', '4summer3.jpg', 'Summer'),
(56, '4', '4fall1.jpg', 'Fall'),
(57, '4', '4fall2.png', 'Fall'),
(58, '4', '4fall3.jpg', 'Fall'),
(59, '4', '4spring1.jpg', 'Spring'),
(60, '4', '4spring2.jpg', 'Spring'),
(61, '4', '4spring3.jpg', 'Spring');

-- --------------------------------------------------------

--
-- Table structure for table `old_images`
--

CREATE TABLE `old_images` (
  `image_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `ext` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `old_images`
--

INSERT INTO `old_images` (`image_id`, `user_id`, `album_id`, `timestamp`, `ext`) VALUES
(12, 1, 1, 1393958224, 'jpg'),
(13, 1, 1, 1393960325, 'jpg'),
(14, 1, 1, 1393960363, 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `old_plant`
--

CREATE TABLE `old_plant` (
  `p_id` int(20) NOT NULL,
  `user_id` int(10) NOT NULL,
  `p_age` int(50) DEFAULT NULL COMMENT 'years',
  `p_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `p_comments` text,
  `f_id` int(20) NOT NULL,
  `g_id` int(20) NOT NULL,
  `s_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `old_plants`
--

CREATE TABLE `old_plants` (
  `id` int(11) NOT NULL,
  `generaid` varchar(255) NOT NULL,
  `plantname` varchar(255) NOT NULL,
  `ageid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `old_plants`
--

INSERT INTO `old_plants` (`id`, `generaid`, `plantname`, `ageid`) VALUES
(1, '1', 'Aurea', '1'),
(2, '1', 'Witblom', '2'),
(3, '1', 'Rose of Texas', '1'),
(4, '2', 'Royal Flush', '2'),
(5, '2', 'nelii', '1'),
(6, '2', 'Split Rock', '2'),
(7, '3', 'margaretae', '1'),
(8, '3', 'Karoo Rose', '2'),
(9, '3', 'Lapidaria ', '1'),
(10, '4', 'demo plants', '2'),
(11, '4', 'demo 2', '1'),
(12, '4', 'demo 3', '2'),
(13, '4', 'demo 2 ', '2'),
(14, '1', 'General', '1'),
(15, '2', 'General', '1'),
(16, '3', 'General', '1'),
(17, '4', 'General', '1');

-- --------------------------------------------------------

--
-- Table structure for table `old_photo`
--

CREATE TABLE `old_photo` (
  `ph_id` int(200) NOT NULL,
  `p_id` int(20) NOT NULL,
  `ph_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ph_comments` varchar(200) NOT NULL,
  `ph_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `plant_id` int(11) NOT NULL,
  `plant_name` varchar(255) NOT NULL,
  `plant_scientific_name` varchar(255) NOT NULL,
  `number_of_plant` int(10) NOT NULL,
  `plant_image` varchar(255) NOT NULL,
  `species` varchar(255) NOT NULL,
  `popular_name` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `genera` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `comment` mediumtext NOT NULL,
  `age` int(2) NOT NULL,
  `add_date` varchar(255) NOT NULL,
  `user_id` int(22) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plants`
--

INSERT INTO `plants` (`plant_id`, `plant_name`, `plant_scientific_name`, `number_of_plant`, `plant_image`, `species`, `popular_name`, `family`, `genera`, `description`, `comment`, `age`, `add_date`, `user_id`) VALUES
(2, 'Jasmine', 'Jasminum', 12, 'chameli.jpg', '', '', '', '', '', '', 0, '', 2),
(11, 'yyry', 'ertret', 54, 'chameli.jpg', 'rtyry', 'ytryr', 'rtyrty', 'rtyrt', 'rtytryyrtyryr yrty', 'ry ryrty rty', 30, '21-09-2019', 2),
(10, 'Lily', 'Lilium', 12, 'rose.jpg', 'dsfg', 'dsg', 'dsfg', 'dfgd', 'Tall, majestic and strikingly-shaped: lilies are a popular choice for bouquets due to their unusual shape and scent. Like roses, lilies are an important cultural and literary device and are known throughout the temperature Northern Hemisphere for their beauty and resilience.\r\n\r\nIf it\'s got Lilium in the name then you know the flower is a \"true lily\"; many flowers which you think share similar characteristics to lilies and even use the term in their common name aren\'t actually part of the same group. Lily of the Valley and the water lily are the most famous examples of this - but the list is long!', 'Superb!', 33, '18-09-2019', 2),
(12, 'tyrtyrt', 'ytryrty', 12, 'images (2).jpg', 'tyrty', 'fdytr', 'tutu', 'utyu', 'rutyuytu', 'tyutyu', 30, '06-09-2019', 2),
(13, 'rterwytrt', 'yeyuerue', 3, '69297779.jpg', 'yrtr', 'rtytre', 'reyre', 'ryryer', 'rtyreyre', 'gfdhdd', 2, '13-09-2019', 2),
(32, 'Yellow rozy acacia', 'Aca', 12, 'annie-spratt-01Wa3tPoQQ8-unsplash.jpg', 'Acaia australis', 'Yellow ball of fluff', 'Australis', 'Genera australis', 'Acacia native Australian', 'q to be removed please', 14, '02-10-2019', 5),
(33, 'plant 02', 'q', 12, 'ap-x-90-bmM_IdLd1SA-unsplash.jpg', 'q', 'q', 'q', 'q', 'q', 'q', 12, '03-10-2019', 5),
(34, 'plant 03', 'w', 12, 'er1.jpg', 'w', 'w', 'w', 'w', 'k;lfjaslkdjl;kdfja;;;', 'k;lfjadslkfj', 12, '03-10-2019', 5),
(35, 'plant 04', 'asd', 12, 'tuan-nguy-n-minh-pGr7g4l8EOI-unsplash.jpg', 'asd', 'asd', 'asd', 'asd', 'FDA', 'asdfdsa', 12, '03-10-2019', 5),
(36, 'plant 05', 'd;aljfs', 12, 'ap-x-90-bmM_IdLd1SA-unsplash.jpg', 'Haworthia attenuata', 'dfas', 'Amaryllidaceae', 'Gasteria', 'dasfdsf', 'adsfadsf', 12, '03-10-2019', 5);

-- --------------------------------------------------------

--
-- Table structure for table `plant_gallery`
--

CREATE TABLE `plant_gallery` (
  `plant_gallery_id` int(11) NOT NULL,
  `plant_gallery_image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `plant_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plant_gallery`
--

INSERT INTO `plant_gallery` (`plant_gallery_id`, `plant_gallery_image`, `description`, `plant_id`) VALUES
(4, '3.jpg', ' Ecaluptus', 1),
(5, 'ec1.jpg', ' suitable for cold weather', 2),
(6, 'ec2.jpg', 'suitable for summer ', 2),
(4, '3.jpg', ' Ecaluptus', 1),
(5, 'ec1.jpg', ' suitable for cold weather', 2),
(6, 'ec2.jpg', 'suitable for summer ', 2),
(4, '3.jpg', ' Ecaluptus', 1),
(5, 'ec1.jpg', ' suitable for cold weather', 2),
(6, 'ec2.jpg', 'suitable for summer ', 2),
(4, '3.jpg', ' Ecaluptus', 1),
(5, 'ec1.jpg', ' suitable for cold weather', 2),
(6, 'ec2.jpg', 'suitable for summer ', 2),
(4, '3.jpg', ' Ecaluptus', 1),
(5, 'ec1.jpg', ' suitable for cold weather', 2),
(6, 'ec2.jpg', 'suitable for summer ', 2),
(0, 'ac1.jpg', 'acacia spring', 32),
(0, 'Aca.jpg', 'acaccia', 32);

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE `species` (
  `s_id` int(11) NOT NULL,
  `gen_id` int(50) NOT NULL,
  `s_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`s_id`, `gen_id`, `s_name`) VALUES
(2, 17, 'Haworthia arachnoidea'),
(3, 17, 'Haworthia attenuata'),
(4, 17, 'Haworthia attenuata'),
(5, 17, 'Haworthia attenuata'),
(6, 17, 'Haworthia attenuata'),
(7, 17, 'Haworthia baccata'),
(8, 17, 'Haworthia bayeri'),
(9, 17, 'Haworthia bayeri'),
(10, 17, 'Haworthia bruynsii'),
(11, 17, 'Haworthia chloracantha'),
(12, 17, 'Haworthia coarctata'),
(13, 17, 'Haworthia cooperi'),
(14, 17, 'Haworthia cooperi'),
(15, 17, 'Haworthia cooperi'),
(16, 17, 'Haworthia cuspidata'),
(17, 17, 'Haworthia'),
(18, 17, 'Haworthia'),
(19, 17, 'Haworthia'),
(20, 17, 'Haworthia'),
(21, 17, 'Haworthia'),
(22, 17, 'Haworthia'),
(23, 17, 'Haworthia'),
(24, 17, 'Haworthia cymbiformis'),
(25, 17, 'Haworthia cymbiformis'),
(26, 17, 'Haworthia cymbiformis'),
(27, 17, 'Haworthia emelyae'),
(28, 17, 'Haworthia emelyae'),
(29, 17, 'Haworthia emelyae'),
(30, 17, 'Haworthia fasciata'),
(31, 17, 'Haworthia glauca'),
(32, 17, 'Haworthia guttata'),
(33, 17, 'Haworthia hybrid cooperi'),
(34, 17, 'Haworthia hybrid lateganiae x floribunda'),
(35, 17, 'Haworthia hybrid magnifica v. paradoxa x pygmaea (as asperula)'),
(36, 17, 'Haworthia koelmaniorum'),
(37, 17, 'Haworthia koelmaniorum'),
(38, 17, 'Haworthia latispina n.n.'),
(39, 17, 'Haworthia limifolia'),
(40, 17, 'Haworthia lockwoodii'),
(41, 17, 'Haworthia longiana'),
(42, 17, 'Haworthia magnifica'),
(43, 17, 'Haworthia magnifica'),
(44, 17, 'Haworthia magnifica'),
(45, 17, 'Haworthia maraisii'),
(46, 17, 'Haworthia marumiana'),
(47, 17, 'Haworthia marumiana'),
(48, 17, 'Haworthia mirabilis'),
(49, 17, 'Haworthia mirabilis'),
(50, 17, 'Haworthia mutica'),
(51, 17, 'Haworthia nigra'),
(52, 17, 'Haworthia opalina'),
(53, 17, 'Haworthia otzenii'),
(54, 17, 'Haworthia papillosa'),
(55, 17, 'Haworthia parksiana'),
(56, 17, 'Haworthia picta'),
(57, 17, 'Haworthia picta'),
(58, 17, 'Haworthia planifolia'),
(59, 17, 'Haworthia pumila'),
(60, 17, 'Haworthia pumila'),
(61, 17, 'Haworthia pygmaea'),
(62, 17, 'Haworthia pygmaea'),
(63, 17, 'Haworthia reinwardtii'),
(64, 17, 'Haworthia retusa'),
(65, 17, 'Haworthia retusa'),
(66, 17, 'Haworthia rugosa'),
(67, 17, 'Haworthia semiviva'),
(68, 17, 'Haworthia springbokvlakensis'),
(70, 17, 'Haworthia tessellata'),
(71, 17, 'Haworthia tortuosa'),
(72, 17, 'Haworthia tortuosa'),
(73, 17, 'Haworthia truncata'),
(74, 17, 'Haworthia truncata'),
(75, 17, 'Haworthia truncata'),
(76, 17, 'Haworthia truncata'),
(77, 17, 'Haworthia truncata'),
(78, 17, 'Haworthia truncata'),
(79, 17, 'Haworthia turgida'),
(80, 17, 'Haworthia venosa'),
(81, 17, 'Haworthia venosa subs. recurva.'),
(82, 17, 'Haworthia venosa subs. tessellata'),
(102, 94, 'Lithops hillii'),
(103, 94, 'Lithops hookeri'),
(104, 94, 'Lithops julii'),
(105, 94, 'Lithops karasmontana'),
(106, 94, 'Lithops lesliei'),
(107, 94, 'Lithops localis'),
(108, 94, 'Lithops marmorata'),
(109, 94, 'Lithops meyeri'),
(110, 94, 'Lithops naureeniae'),
(111, 94, 'Lithops olivacea'),
(112, 94, 'Lithops optica'),
(113, 94, 'Lithops otzeniana'),
(114, 94, 'Lithops pseudotruncatella'),
(115, 94, 'Lithops ruschiorum'),
(116, 94, 'Lithops salicola'),
(117, 94, 'Lithops schwantesii'),
(118, 94, 'Lithops steineckeana'),
(119, 94, 'Lithops vallis-mariae'),
(120, 94, 'Lithops verruculosa'),
(121, 94, 'Lithops villetii'),
(122, 94, 'Lithops viridis'),
(123, 94, 'Lithops werneri'),
(83, 93, 'Lapidaria margaretae'),
(84, 94, 'Lithops amicorum'),
(85, 94, 'Lithops aucampiae'),
(86, 94, 'Lithops bromfieldii'),
(87, 94, 'Lithops coleorum'),
(88, 94, 'Lithops comptonii'),
(89, 94, 'Lithops dinteri'),
(90, 94, 'Lithops divergens'),
(91, 94, 'Lithops dorotheae'),
(92, 94, 'Lithops framesii'),
(93, 94, 'Lithops francisci'),
(94, 94, 'Lithops fulviceps'),
(95, 94, 'Lithops gesinae'),
(96, 94, 'Lithops geyeri'),
(97, 94, 'Lithops gracilidelineata'),
(98, 94, 'Lithops hallii'),
(99, 94, 'Lithops helmutii'),
(100, 94, 'Lithops hermetica'),
(101, 94, 'Lithops herrei');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(35) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `name`, `password`) VALUES
(5, 'sunil@gmail.com', 'sunil', 'b0b86080c976aa7651bffe0801644d74'),
(6, 'laura@gmail.com', 'laura', '9a871a2a1b44ce36da856605dd3c446c'),
(7, 'nancyarora@gmail.com', 'nancy', 'ae5a9661cb88c901b43e502d29128490');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genera`
--
ALTER TABLE `genera`
  ADD PRIMARY KEY (`gen_id`),
  ADD KEY `f_id` (`f_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `u_id` (`user_id`);

--
-- Indexes for table `old_age`
--
ALTER TABLE `old_age`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `old_albums`
--
ALTER TABLE `old_albums`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `old_care`
--
ALTER TABLE `old_care`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `old_genera`
--
ALTER TABLE `old_genera`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `old_groupPhoto`
--
ALTER TABLE `old_groupPhoto`
  ADD PRIMARY KEY (`gp_id`),
  ADD KEY `g_id` (`g_id`);

--
-- Indexes for table `old_groupPlant`
--
ALTER TABLE `old_groupPlant`
  ADD PRIMARY KEY (`pg_id`),
  ADD KEY `g_id` (`g_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `old_grouppp`
--
ALTER TABLE `old_grouppp`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `old_image`
--
ALTER TABLE `old_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `old_images`
--
ALTER TABLE `old_images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `old_plant`
--
ALTER TABLE `old_plant`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `u_id` (`user_id`),
  ADD KEY `f_id` (`f_id`),
  ADD KEY `g_id` (`g_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `old_plants`
--
ALTER TABLE `old_plants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `old_photo`
--
ALTER TABLE `old_photo`
  ADD PRIMARY KEY (`ph_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`plant_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `old_age`
--
ALTER TABLE `old_age`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `old_albums`
--
ALTER TABLE `old_albums`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `old_care`
--
ALTER TABLE `old_care`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `old_genera`
--
ALTER TABLE `old_genera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `old_groupPhoto`
--
ALTER TABLE `old_groupPhoto`
  MODIFY `gp_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `old_groupPlant`
--
ALTER TABLE `old_groupPlant`
  MODIFY `pg_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `old_image`
--
ALTER TABLE `old_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `old_images`
--
ALTER TABLE `old_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `old_plant`
--
ALTER TABLE `old_plant`
  MODIFY `p_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `old_plants`
--
ALTER TABLE `old_plants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `old_photo`
--
ALTER TABLE `old_photo`
  MODIFY `ph_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
  MODIFY `plant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `old_groupPhoto`
--
ALTER TABLE `old_groupPhoto`
  ADD CONSTRAINT `groupphoto_ibfk_1` FOREIGN KEY (`g_id`) REFERENCES `groups` (`group_id`) ON UPDATE CASCADE;

--
-- Constraints for table `old_groupPlant`
--
ALTER TABLE `old_groupPlant`
  ADD CONSTRAINT `groupplant_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `old_plant` (`p_id`) ON UPDATE CASCADE;

--
-- Constraints for table `old_plant`
--
ALTER TABLE `old_plant`
  ADD CONSTRAINT `old_plant_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `old_plant_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `specie` (`s_id`) ON UPDATE CASCADE;

--
-- Constraints for table `old_photo`
--
ALTER TABLE `old_photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `old_plant` (`p_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
