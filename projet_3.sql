-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 12 fév. 2018 à 20:44
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_3`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `report` int(11) NOT NULL DEFAULT '0',
  `pseudo` varchar(15) NOT NULL,
  `content` text NOT NULL,
  `date_comment` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `id_post`, `report`, `pseudo`, `content`, `date_comment`) VALUES
(19, 3, 0, 'max3630', 'bonjour j’adore les mousses au chocolat !', '2018-01-27 02:37:31'),
(12, 2, 1, 'zouninanou', 'Moi aussi j\'aime les chats !', '2018-01-26 17:30:47'),
(11, 2, 0, 'zodlefou', 'J\'aime bien ce chat ! il est peureux, comme moi ! :D', '2018-01-26 17:21:31'),
(22, 1, 1, 'pereag', 'coucou !', '2018-01-27 04:13:29'),
(23, 1, 0, 'kktomik', 'super article ! ', '2018-01-27 04:13:54');

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`Id`, `Pseudo`, `Password`, `Email`) VALUES
(1, 'jeanforteroche', '$2y$10$DyfHT6SkRReTnMS2v4oAo.4bsNlLtHxeIflUYju94kgIzHxbXwofK', 'jean.forterochepro@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `datePost` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `datePost`) VALUES
(2, 'Le jour du départ', 'À sa vue son chat avait filé se réfugier sous le lit, refusant de se montrer alors même qu’elle l’appelait à genoux, le suppliait de sortir de sa cachette. C’est à ce moment-là que Maria avait décidé de mourir, n’ayant plus rien à manger ni à aimer. Elle attendit la tombée de la nuit pour ouvrir la porte d’entrée. Dans l’obscurité, son chat aurait plus de chances d’atteindre les bois sans être vu. Si un habitant du village l’apercevait, il lui sauterait dessus. Même si près de mourir, elle ne supportait pas l’idée qu’on tue son chat. Elle se consolait en se disant qu’il profiterait de l’effet de surprise. Au sein d’une communauté où les hommes adultes mâchaient de la terre en espérant tomber sur des fourmis ou des œufs d’insectes, où les enfants cherchaient dans le crottin de cheval les grains d’avoine non digérés et où les femmes se battaient pour quelques os, personne, à coup sûr, n’imaginait qu’un chat ait pu avoir la vie sauve. Pavel n’en crut pas ses yeux. Cet animal hésitant, efflanqué, au regard vert et au pelage moucheté de noir… C’était un chat, aucun doute là-dessus. Pavel ramassait du bois mort lorsqu’il le vit s’enfuir de la maison de Maria Antonovna, traverser la route enneigée et se diriger vers la forêt. Retenant son souffle, il jeta un coup d’œil autour de lui. Personne d’autre ne l’avait vu. Il n’y avait pas âme qui vive, pas une seule fenêtre éclairée. À peine une cheminée sur deux laissait-elle échapper un mince panache de fumée, unique signe de vie.Il fallait que je parte. ', '2017-12-11 10:35:00'),
(1, 'Pourquoi fait-il si froid ?', '<p>L&rsquo;&eacute;tang &eacute;tait gel&eacute;. Oksana chercha une pierre sous la neige. De peur d&rsquo;attirer l&rsquo;attention, elle enveloppa la pierre dans son ch&acirc;le pour assourdir le bruit pendant qu&rsquo;elle creusait un trou dans la glace. Elle reposa la pierre. Frissonnant &agrave; la vue de l&rsquo;eau noire et glaciale, elle y plongea la main, le souffle coup&eacute; par le froid. Encore quelques secondes et son bras s&rsquo;engourdirait. Pas de temps &agrave; perdre. Au fond elle ne trouva que de la vase. Mais o&ugrave; &eacute;tait-ce donc&thorn;? Prise de panique elle se pencha, immergea son bras en totalit&eacute;, promena &agrave; l&rsquo;aveuglette sa main paralys&eacute;e par le froid. Elle sentit du verre sous ses doigts. Rassur&eacute;e, elle referma la main sur le flacon et le sortit de l&rsquo;eau. Elle avait la peau marbr&eacute;e de bleu, comme si elle avait re&ccedil;u des coups. Peu importait, elle venait de trouver ce qu&rsquo;elle cherchait&thorn;: un flacon herm&eacute;tiquement ferm&eacute; par du goudron. Elle enleva la couche de vase pour inspecter le contenu. &Agrave; l&rsquo;int&eacute;rieur se trouvait un assortiment de petits os. De retour chez elle, elle vit que Pavel avait remis du bois dans le feu. Elle fit fondre &agrave; la chaleur des flammes le goudron qui tomba sur les braises en grosses gouttes collantes. Pavel remarqua sa peau bleu&acirc;tre et, toujours attentionn&eacute;, lui frictionna le bras pour r&eacute;tablir la circulation. Une fois le goudron fondu, elle renversa le flacon et le secoua. Plusieurs os se coinc&egrave;rent dans le goulot. Elle les extirpa et les tendit &agrave; son fils.</p>', '2018-01-01 16:30:00'),
(3, 'Ma grande aventure', 'Aussitôt après il frottait ses paumes l’une contre l’autre en soufflant sur ses doigts. Il avait la goutte au nez, la lèvre supérieure couverte de morve. Mais ce soir-là, après leur triomphe, il s’en moquait, et il replongea les doigts dans la neige en fre- donnant une mélodie que son père chantait naguère. Confronté à la même pénurie que son frère, Pavel s’était éloigné. Ils allaient devoir se séparer. À quelque distance de là, il aperçut un arbre mort au tronc hérissé de branches. Il se rua dans cette direction, déposa le chat dans la neige pour pouvoir arracher les branches. Il y en avait largement assez pour Andreï et pour lui, et il chercha son frère des yeux. Il allait l’appeler, mais se ravisa. Il entendait du bruit. Il pivota sur lui-même, inspecta les environs. Les bois étaient touffus, noyés dans la pénombre. Il ferma les yeux, se concentra sur ce son qui se répétait à intervalles réguliersþ: un crisse- ment dans la neige. De plus en plus rapproché. La peur le fit frissonner. Il rouvrit les yeux. Là, dans l’obscu- rité, quelque chose bougeaitþ: un homme en train de courir. Une lourde branche à la main, il avançait à grandes enjambées. Droit sur Pavel. Il les avait entendus tuer le chat et il voulait leur voler leur proie. Mais Pavel l’en empêcheraitþ: il ne laisserait pas sa mère mourir de faim. Contrairement à son père, il ne capitulerait pas. Du pied, il tenta d’enfouir le chat dans la neige.', '2017-12-11 10:35:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
