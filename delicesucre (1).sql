-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 29 mars 2023 à 12:11
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `delicesucre`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id_art` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contenu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` mediumblob,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_ut` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id_art`),
  KEY `id_ut` (`id_ut`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_art`, `title`, `description`, `contenu`, `image`, `date_creation`, `id_ut`) VALUES
(12, 'Charlotte aux fraises', 'Temps de préparation : 1h\r\n\r\nNiveaux de difficulté : Difficile\r\n\r\nBudget : Bon marché', 'ÉTAPE 1\r\nsucre en poudre\r\nfraises\r\nPréparer un sirop en portant à ébullition 15 cl d\'eau et 80 g de sucre. Oter du feu et laisser refroidir, ensuite y mettre l\'alcool de fraise.\r\n\r\nÉTAPE 2\r\ngélatine\r\nFaire tremper la gélatine dans un bol d\'eau froide.\r\n\r\nÉTAPE 3\r\nfraises\r\ncitron\r\nLaver et équeuter les fraises et en mettre 8 entières de côté. Mettre les autres fraises dans un mixeur avec le jus de citron et mixer jusqu\'à obtenir une puréee lisse. Tranvaser cette purée dans une passoire afin de récolter le coulis et retenir les grains.\r\n\r\nÉTAPE 4\r\ngélatine\r\nsucre en poudre\r\nPrélever un quart de ce coulis et le faire chauffer doucement dans une casserole en y incorporant la gélatine essorée et le restant de sucre.\r\n\r\nÉTAPE 5\r\nEnsuite, mélanger le coulis obtenu (chaud) avec le coulis froid. Laisser tiédir à température ambiante.\r\n\r\nÉTAPE 6\r\ncrème liquide\r\nsucre en poudre\r\nMettre la crème liquide dans un saladier et mettre au congelateur 20 mn. Puis la fouetter de façon à obtenir une crème &amp;amp;amp;quot;chantilly&amp;amp;amp;quot;. Mettre le sucre vanillé, remuer doucement et mettre en attente au frais.\r\n\r\nÉTAPE 7\r\nglaçons\r\nPlacer le récipient où se trouve le coulis dans un récipient + grand rempli de glaçons. Remuer le coulis jusqu\'à constater son épaississement. A ce moment, l\'ôter des glaçons et y ajouter la chantilly en tournant délicatement. Laisser à température ambiante.\r\n\r\nÉTAPE 8\r\nfraises\r\nbiscuits à la cuillère\r\nCouper les 8 fraises mises de côté dans leur hauteur. Tapisser le fond et les parois du moule avec des biscuits trempés (vite fait) dans le sirop (les tailler si besoin). Pour les parois : côté bombé contre le moule.\r\n\r\nÉTAPE 9\r\ncrème liquide\r\nfraises\r\nVerser un tiers de la crème puis parsemer de fraises coupées (la moitié).\r\n\r\nÉTAPE 10\r\ncrème liquide\r\nfraises\r\nbiscuits à la cuillère\r\nCouvrir du second tiers de crème, disposer le restant de fraises coupées. Terminer par le dernier tiers de crème. Finir par une couche de biscuits (toujours trempés dans le sirop).\r\n\r\nÉTAPE 11\r\nMettre du film plastique sur le plat et laisser au frais 6h (une nuit est l\'idéal) avant de démouler.', 0x6173736574732f696d672f636861726c6f7474652d6175782d667261697365732e6a7067, '0000-00-00 00:00:00', 10),
(13, 'Macaron', 'Temps de préparation : 50 min\r\n\r\nNiveaux de difficulté : Moyenne\r\n\r\nBudget : Moyen', 'ÉTAPE 1\r\nsucre glace\r\namandes\r\nCommencer par mixer le sucre glace avec la poudre d\'amande dans un mixeur. Passer au tamis (il faut que la poudre soit la plus fine possible, enlever les impuretés).\r\n\r\nÉTAPE 2\r\nblanc d\'oeuf\r\nsucre en poudre\r\nBattre le blanc en neige et ajouter les 10 g de sucre, et le colorant, peu à peu en mixant jusqu\'à ce que les blancs soient bien figés.\r\n\r\nÉTAPE 3\r\nsucre glace\r\namandes\r\nAjouter le sucre glace + les amandes en poudre au blanc en neige et mélanger délicatement avec une spatule afin de &amp;amp;quot;casser&amp;amp;quot; un peu les blancs.\r\n\r\nÉTAPE 4\r\nMettre la pâte à macaron dans une poche à douille et faire des petits tas sur une plaque recouverte de papier sulfurisé puis laisser reposer les macarons pendant 15 min.\r\n\r\nÉTAPE 5\r\nPréchauffer le four à 140°C (thermostat 4-5) avec une plaque à l\'intérieur pour qu\'elle chauffe. Enfourner la plaque de macarons sur la plaque déjà chaude pour 10 min de cuisson chaleur tournante et porte entrouverte.\r\n\r\nÉTAPE 6\r\nUne fois cuits, sortir la plaque du four, et verser un peu d\'eau sous la feuille de papier sulfurisé. Cela va dégager de la vapeur qui permet de bien décoller les macarons.\r\n\r\nÉTAPE 7\r\nIl ne reste plus qu\'à les fourrer avec la ganache de votre choix ! Par exemple, chocolat blanc ou crème au beurre.\r\n\r\nÉTAPE 8\r\nBon appétit !', 0x6173736574732f696d672f3130393131385f77313032346837363863316378313730366379323536302e6a7067, '2023-03-27 12:29:15', 10),
(14, 'Tarte au citron', 'Temps de préparation : 45 min\r\n\r\nNiveaux de difficulté : Très facile\r\n\r\nBudget : Bon marché', 'ÉTAPE 1\r\nPréchauffer le four à 200°C.\r\n\r\nÉTAPE 2\r\npâte brisée\r\nEtaler la pâte brisée et en garnir le moule.\r\n\r\nÉTAPE 3\r\noeuf\r\nsucre\r\ncitron\r\nbeurre\r\nBattre les oeufs avec le sucre en poudre jusqu\'à l\'obtention d\'un mélange mousseux. Ajouter le jus de citron, ainsi que le beurre fondu. Verser sur le fond de tarte.\r\n\r\nÉTAPE 4\r\nEnfourner et laisser cuire environ 30 min. La préparation doit dorer.', 0x6173736574732f696d672f39623333343339382d386237612d343963302d616537392d6230616231663265613232625f4a536f516d72612e6a7067, '2023-03-27 12:33:54', 10),
(15, 'Forêt noire', 'Temps de préparation : 1h15\r\n\r\nNiveaux de difficulté : Moyenne\r\n\r\nBudget : Moyen', 'ÉTAPE 1\r\noeuf\r\nsucre\r\nMélanger oeufs, sucre au fouet sur un bain-marie (pas trop chaud).\r\n\r\nÉTAPE 2\r\nfarine\r\nlevure\r\nbeurre\r\nAjouter farine tamisée, levure et le beurre\r\n\r\nÉTAPE 3\r\nchocolat\r\nAjouter le chocolat fondu (sur un bain-marie à 30, 35°C).\r\n\r\nÉTAPE 4\r\nFaire cuire dans deux moules (diamètre 20 ou 24) à 175°C pendant 30 minutes (chaleur conventionnelle).\r\n\r\nÉTAPE 5\r\ncopeaux de chocolat\r\nchocolat\r\nLes copeaux sont réalisés par étalement en fine couche du chocolat fondu sur une plaque de marbre. Choisir le moment, ni trop froid, ni trop chaud pour les former.\r\n\r\nÉTAPE 6\r\ncerises\r\nLes gâteaux refroidis, les couper en deux, les imbiber du jus de cerise additionné de kirsch\r\n\r\nÉTAPE 7\r\ncrème fraîche\r\nsucre\r\nMonter la crème en chantilly avec 100g de sucre glace.\r\n\r\nÉTAPE 8\r\ncerises\r\nsucre\r\nFormer le gâteau première couche chantilly avec des morceaux de cerises deuxième couche une réduction du jus de cerise avec un apport de sucre pour faire un caramel pas trop dur et dernière couche de chantilly avec des morceaux de cerises.\r\n\r\nÉTAPE 9\r\ncopeaux de chocolat\r\nchocolat\r\nEnduire le gâteau de chantilly et disposer les copeaux de chocolat.\r\n\r\nÉTAPE 10\r\nPour un gâteau de 28 cm de diamètre multiplier les proportions par 1,5.', 0x6173736574732f696d672f3132303236395f77313032346831303234633163783130363063793730372e6a7067, '2023-03-28 16:16:23', 10),
(16, 'Tropézienne', 'Temps de préparation : 1h\r\n\r\nNiveaux de difficulté : Moyenne\r\n\r\nBudget : Bon marché', 'ÉTAPE 1\r\nLa veille, préparer la pâte à brioche. Mettre dans le bol du robot la farine, le sel, le sucre en poudre, la levure et les œufs.\r\n\r\nÉTAPE 2\r\nMixer pendant environ 5 min.\r\n\r\nÉTAPE 3\r\nAjouter le beurre mou et le zeste de citron.\r\n\r\nÉTAPE 4\r\nMixer à nouveau pendant 5 min.\r\n\r\nÉTAPE 5\r\nMettre au réfrigérateur couvert d\'un linge toute la nuit.\r\n\r\nÉTAPE 6\r\nLe lendemain, étaler la pâte sur environ 1,5 cm d\'épaisseur et 20 cm de diamètre. Mettre dans un moule à manquer.\r\n\r\nÉTAPE 7\r\nLaisser lever la pâte couverte d\'un linge à température ambiante pendant 2 heures.\r\n\r\nÉTAPE 8\r\nPréparer la crème pâtissière.\r\n\r\nÉTAPE 9\r\nMettre le lait à bouillir avec la gousse de vanille fendue en 2.\r\n\r\nÉTAPE 10\r\nPréchauffer le four à 180°C (thermostat 6).\r\n\r\nÉTAPE 11\r\nDans un saladier, blanchir les jaunes d’œufs et le sucre en poudre en fouettant énergiquement.\r\n\r\nÉTAPE 12\r\nAjouter la farine, puis verser le lait bouillant dessus en remuant au fouet et bien mélanger.\r\n\r\nÉTAPE 13\r\nAjouter 2 cuillères à soupe de fleur d\'oranger et mélanger.\r\n\r\nÉTAPE 14\r\nRemettre le tout à cuire dans la casserole pendant 3 min, dès la reprise de l\'ébullition tout en mélangeant.\r\n\r\nÉTAPE 15\r\nUne fois la crème cuite et épaissie, la verser sur une plaque, la recouvrir d\'un film alimentaire (pour conserver l\'humidité) et la faire refroidir rapidement.\r\n\r\nÉTAPE 16\r\nQuand la brioche a bien levé au bout de 2 heures, badigeonner d\'un jaune d’œuf délayé dans un peu d\'eau et saupoudrer de sucre grain. Enfourner à four préchauffé à 180°C pendant 30 min environ.\r\n\r\nÉTAPE 17\r\nUne fois la brioche cuite, la sortir du four et laisser refroidir puis la couper en 2 dans l\'épaisseur.\r\n\r\nÉTAPE 18\r\nPréparer la chantilly. Mettre au congélateur le bol du robot, le fouet et la crème fraîche pendant 5 min.\r\n\r\nÉTAPE 19\r\nMonter la crème à vitesse moyenne et constante, à moitié prise ajouter le sucre glace, augmenter la vitesse jusqu\'à ce que la crème soit ferme. Réserver au frais.\r\n\r\nÉTAPE 20\r\nQuand la crème pâtissière a refroidi, la mélanger avec la chantilly.\r\n\r\nÉTAPE 21\r\nA l\'aide d\'une poche à douille, dresser la crème sur le disque de brioche, refermer avec l\'autre disque, saupoudrer de sucre glace et réserver au frais jusqu\'au moment de servir.', 0x6173736574732f696d672f54617274652d54726f70657a69656e6e652d556e2d636c617373697175652d64652d6c612d706174697373657269652d6672616e63616973652d393930783636302e6a7067, '2023-03-28 16:20:12', 10),
(17, 'Croissant', 'Temps de préparation : 1h15\r\n\r\nNiveaux de difficulté : Difficile\r\n\r\nBudget : Bon marché', 'ÉTAPE 1\r\nPremière étape : la pâte feuilletée levée.\r\n\r\nÉTAPE 2\r\nlevure de boulanger\r\neau\r\nfarine\r\nsel\r\nsucre\r\nlait\r\nDélayer la levure dans l\'eau tiède. Dans un grand saladier, déposer la farine, le sel, le sucre, creuser un puits et incorporer petit à petit le lait.\r\n\r\nÉTAPE 3\r\nlait\r\neau\r\nlevure de boulanger\r\nQuand le lait est entièrement incorporé, ajouter le mélange eau levure et pétrir la pâte pendant 15 minutes sur le plan de travail.\r\n\r\nÉTAPE 4\r\nFormer une boule, la placer dans le saladier, couvrir d\'un linge et laisser reposer deux heures.\r\n\r\nÉTAPE 5\r\nAu bout de deux heures, étaler la pâte sur le plan de travail en forme d\'étoile à quatre branches en gardant le centre plus épais.\r\n\r\nÉTAPE 6\r\nbeurre tendre\r\nÉtaler le beurre au centre et replier les branches.\r\n\r\nÉTAPE 7\r\neau\r\nÉtaler alors ce pâton en un rectangle. Replier ce rectangle en trois et faire pivoter le rectangle d\'un quart de tour sur la droite. Allonger à nouveau la pâte en rectangle, la replier en trois et tourner d\'un quart de tour à droite.\r\n\r\nÉTAPE 8\r\nRecommencer une fois cette opération. La pâte feuilletée levée est prête.\r\n\r\nÉTAPE 9\r\nDeuxième étape : les croissants.\r\n\r\nÉTAPE 10\r\nÉtaler la pâte feuilletée levée finement et découper des triangles. Rouler les triangles en partant de la base pour finir par la pointe, leur donner une forme de croissant.\r\n\r\nÉTAPE 11\r\nLaisser reposer les croissants deux heures. allumer le four thermostat 8 (240°C).\r\n\r\nÉTAPE 12\r\neau\r\noeuf\r\nAprès le repos, badigeonner au pinceau les croissant d\'oeuf battu en prenant soin de ne pas les faire retomber.\r\n\r\nÉTAPE 13\r\nFaire cuire 5 min à four chaud puis 10 à 15 min à thermostat 5/6 (160-170°C).', 0x6173736574732f696d672f63726f737361696e74732d322e6a7067, '2023-03-28 16:24:00', 10),
(18, 'Paint au chocolat', 'Temps de préparation : 1h20\r\n\r\nNiveaux de difficulté : Difficile\r\n\r\nBudget : Moyen', 'ÉTAPE 1\r\nbeurre\r\nSuivre la recette des croissants. [NDchef: par exemple celle-ci, celle-ci, ou celle-ci]\r\n\r\nÉTAPE 2\r\nchocolat\r\nUne fois que le feuilletage est fait et que vous avez étalé la pâte, il ne faut pas détailler des triangles, mais des petits rectangles de la largeur d\'une barrette de chocolat. Mettre la barrette de chocolat sur le rectangle de pâte et enroulez le.\r\n\r\nÉTAPE 3\r\nchocolat\r\nComme pour les croissants, vous pouvez congeler les pains au chocolat à ce stade. Mettre les pains au chocolat sur une plaque en prenant soin d\'appuyer un peu avec la main pour ne pas qu\'ils se déroulent en gonflant. Laisser gonfler 1h30 à 2h30 à température ambiante jusqu\'à ce qu\'ils doublent presque de volume.\r\n\r\nÉTAPE 4\r\nchocolat\r\nDorer les pains au chocolat et les mettre dans le four chaud à 230°C pendant 15 à 20 minutes.', 0x6173736574732f696d672f38333636385f77313032346837363863316378323838306379313932302e6a7067, '2023-03-28 16:26:19', 10),
(20, 'Eclairs au chocolat', 'Temps de préparation : 1h30\r\n\r\nNiveaux de difficulté : Moyenne\r\n\r\nBudget : Moyen', 'ÉTAPE 1\r\nPour la pâte à choux:\r\n\r\nÉTAPE 2\r\nPréchauffer le four à 210°C (Thermostat 7).\r\n\r\nÉTAPE 3\r\nMélanger sel, sucre, beurre et eau dans une casserole, et faire bouillir.\r\n\r\nÉTAPE 4\r\nIntégrer la farine, et remuer jusqu\'à l\'obtention d\'une pâte compacte. La travailler jusqu\'à ce qu\'elle soit suffisamment ferme\r\n\r\nÉTAPE 5\r\nIntégrer 4 oeufs, un à un en veillant à bien mélanger entre chaque oeuf.\r\n\r\nÉTAPE 6\r\nTravailler la pâte afin de la rendre ferme.\r\n\r\nÉTAPE 7\r\nSur un plaque allant au four préalablement huilée, répartir à l\'aide de la poche à douille une dizaine de boudins de pâte de 15 cm de long environ.\r\n\r\nÉTAPE 8\r\nBadigeonner avec le jaune d\'œuf pour que la pâte soit dorée à la cuisson .\r\n\r\nÉTAPE 9\r\nFaire cuire 25 min à four chaud et laisser reposer 10 min, four éteint, pour éviter que les choux ou les éclairs ne dégonflent.\r\n\r\nÉTAPE 10\r\nPour la crème:\r\n\r\nÉTAPE 11\r\nFaire fondre 60 g de chocolat cassé en morceaux dans le lait, à feu doux .\r\n\r\nÉTAPE 12\r\nDans un bol, fouetter oeuf, jaune et sucre jusqu\'à ce que le mélange soit mousseux.\r\n\r\nÉTAPE 13\r\nAjouter la farine et verser dans le lait chocolaté.\r\n\r\nÉTAPE 14\r\nFaire épaissir sans cesser de remuer.\r\n\r\nÉTAPE 15\r\nHors du feu, intégrer 20 g de beurre. Laisser refroidir.\r\n\r\nÉTAPE 16\r\nGarnir de cette crème les éclairs coupés en 2 dans le sens de la longueur et faire fondre au bain-marie le reste du chocolat et du beurre.\r\n\r\nÉTAPE 17\r\nNapper le dessus des éclairs. Laisser durcir le glaçage avant de déguster.', 0x6173736574732f696d672f65636c6169722d63686f636f6c61742e6a7067, '2023-03-28 16:36:32', 10),
(22, 'Mille feuille', 'Temps de préparation : 55min\r\n\r\nNiveaux de difficulté : Facile\r\n\r\nBudget : Bon marché', 'ÉTAPE 1\r\npâte feuilletée\r\nAbaisser la pâte feuilletée sur environ 3 mm. Tailler des rectangles de taille égale. La piquer à la fourchette pour qu\'elle ne gonfle pas puis la mettre au four sur 6, soit 180°C.\r\n\r\nÉTAPE 2\r\nlait\r\nPendant ce temps, préparer la crème pâtissière : Mettre le lait à bouillir.\r\n\r\nÉTAPE 3\r\noeuf\r\nsucre\r\nfarine\r\nPendant ce temps, mélanger dans un saladier l\'oeuf, le sucre, le sucre vanillé et la farine.\r\n\r\nÉTAPE 4\r\nlait\r\nLorsque le lait est à ébullition, le verser immédiatement dans le saladier.\r\n\r\nÉTAPE 5\r\nRemettre à cuire dans la casserole pendant quelques minutes afin que le liquide prenne la consistance d\'une crème.\r\n\r\nÉTAPE 6\r\npâte feuilletée\r\nEtaler la crème pâtissière sur une première couche de pâte, puis faire de même avec une seconde. Les assembler.\r\n\r\nÉTAPE 7\r\nsucre\r\nchocolat\r\nAttendre que le gâteau soit froid pour étaler au pinceau le glacage, fait avec beaucoup de sucre glace mélangé à un peu d\'eau. Réaliser un dessin avec le reste du glacage, mélangé à un carreau de chocolat fondu.\r\n\r\nÉTAPE 8\r\nC\'est prêt !', 0x6173736574732f696d672f3131303838345f773130323468313032346331637839363063793534302e6a7067, '2023-03-29 12:11:51', 10),
(23, 'Fondant au chocolat', 'Temps de préparation : 35min\r\n\r\nNiveaux de difficulté : Très facile\r\n\r\nBudget : Bon marché', 'ÉTAPE 1\r\nchocolat pâtissier\r\nbeurre doux\r\nPréchauffer le four à 180°C (thermostat 6). Faire fondre le chocolat et le beurre au bain-marie à feu doux, ou au micro-ondes sur le programme &quot;décongélation&quot;.\r\n\r\nÉTAPE 2\r\noeuf\r\nPendant ce temps, séparer les jaunes des blancs d\'oeuf.\r\n\r\nÉTAPE 3\r\nMonter les blancs en neige ferme. Réserver.\r\n\r\nÉTAPE 4\r\nchocolat pâtissier\r\nbeurre doux\r\noeuf\r\nQuand le mélange chocolat-beurre est bien fondu, ajouter les jaunes d’oeufs et fouetter.\r\n\r\nÉTAPE 5\r\nsucre semoule\r\nfarine\r\noeuf\r\nIncorporer le sucre et la farine, puis ajouter les blancs d’oeufs sans les casser.\r\n\r\nÉTAPE 6\r\nbeurre doux\r\nfarine\r\nBeurrer et fariner un moule à manqué et y verser la pâte à gâteau.\r\n\r\nÉTAPE 7\r\nEnfourner pendant 20 minutes.\r\n\r\nÉTAPE 8\r\nQuand le gâteau est cuit, le laisser refroidir avant de le démouler.', 0x6173736574732f696d672f44534330303431332d7363616c65642e6a7067, '2023-03-29 12:15:06', 10);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_com` int NOT NULL AUTO_INCREMENT,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_ut` int UNSIGNED NOT NULL,
  `id_art` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id_com`),
  KEY `id_ut` (`id_ut`),
  KEY `id_art` (`id_art`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_com`, `message`, `date_creation`, `id_ut`, `id_art`) VALUES
(4, 'bof bof :/', '2023-03-27 11:43:57', 10, 12),
(5, 'miam miam', '2023-03-27 16:45:27', 10, 14),
(6, 'En vrai tue ça mère !!\r\nJe reco !', '2023-03-29 14:08:24', 11, 23);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_ut` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hash_mdp` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','editeur','utilisateur') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pseudo` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ville` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pays` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `activation` enum('on','off') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'on',
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ut`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_ut`, `email`, `hash_mdp`, `role`, `pseudo`, `ville`, `pays`, `activation`, `date_creation`) VALUES
(10, 'az.az@az', '$2y$12$fwl/y8X0PZFQHVbMdVBhJ.wUDixxvSQrGhVwkGxeM1pwMDDKw1uxy', 'editeur', 'az', 'az', 'az', 'on', '2023-03-25 09:53:43'),
(11, 'ff@ff.ff', '$2y$12$IyoqW9dqXwsTN8XQfDF2geCNCEic72ygfV1OXGmx2XNskrZh3l0uq', 'utilisateur', 'ff', 'ff', 'ff', 'on', '2023-03-28 10:10:22'),
(12, 'labbejohan26@gmail.com', '$2y$12$4LBdV1j.lakg2AKmV0xsNew1o2TpNJNLc8W9/P3.symZsG6UhRoXW', 'admin', 'Shatsu', 'Jonquières', 'France', 'on', '2023-03-28 14:55:43');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_ut`) REFERENCES `utilisateur` (`id_ut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_ut`) REFERENCES `utilisateur` (`id_ut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`id_art`) REFERENCES `article` (`id_art`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
