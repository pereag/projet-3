-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 09 mars 2018 à 19:56
-- Version du serveur :  5.7.19
-- Version de PHP :  7.0.23

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
  `idPost` int(11) NOT NULL,
  `report` int(11) NOT NULL DEFAULT '0',
  `pseudo` varchar(15) NOT NULL,
  `content` text NOT NULL,
  `date_comment` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `idPost`, `report`, `pseudo`, `content`, `date_comment`) VALUES
(1, 3, 0, 'Banane699', 'Hello word', '2018-03-09 17:57:11'),
(2, 3, 0, 'Henrycoco', 'Rouge rouge rouge !', '2018-03-09 19:53:37'),
(3, 1, 1, 'renardFox', 'fait froid ? ', '2018-03-09 19:54:33'),
(4, 2, 1, 'cherryMaster', 'Quand le prochain chapitre ? ', '2018-03-09 20:32:57');

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
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `datePost`) VALUES
(2, 'Le jour du depart', '<p>&Agrave; sa vue son chat avait fil&eacute; se r&eacute;fugier sous le lit, refusant de se montrer alors m&ecirc;me qu&rsquo;elle l&rsquo;appelait &agrave; genoux, le suppliait de sortir de sa cachette. C&rsquo;est &agrave; ce moment-l&agrave; que Maria avait d&eacute;cid&eacute; de mourir, n&rsquo;ayant plus rien &agrave; manger ni &agrave; aimer. Elle attendit la tomb&eacute;e de la nuit pour ouvrir la porte d&rsquo;entr&eacute;e. Dans l&rsquo;obscurit&eacute;, son chat aurait plus de chances d&rsquo;atteindre les bois sans &ecirc;tre vu. Si un habitant du village l&rsquo;apercevait, il lui sauterait dessus. M&ecirc;me si pr&egrave;s de mourir, elle ne supportait pas l&rsquo;id&eacute;e qu&rsquo;on tue son chat. Elle se consolait en se disant qu&rsquo;il profiterait de l&rsquo;effet de surprise. Au sein d&rsquo;une communaut&eacute; o&ugrave; les hommes adultes m&acirc;chaient de la terre en esp&eacute;rant tomber sur des fourmis ou des &oelig;ufs d&rsquo;insectes, o&ugrave; les enfants cherchaient dans le crottin de cheval les grains d&rsquo;avoine non dig&eacute;r&eacute;s et o&ugrave; les femmes se battaient pour quelques os, personne, &agrave; coup s&ucirc;r, n&rsquo;imaginait qu&rsquo;un chat ait pu avoir la vie sauve. Pavel n&rsquo;en crut pas ses yeux. Cet animal h&eacute;sitant, efflanqu&eacute;, au regard vert et au pelage mouchet&eacute; de noir&hellip; C&rsquo;&eacute;tait un chat, aucun doute l&agrave;-dessus. Pavel ramassait du bois mort lorsqu&rsquo;il le vit s&rsquo;enfuir de la maison de Maria Antonovna, traverser la route enneig&eacute;e et se diriger vers la for&ecirc;t. Retenant son souffle, il jeta un coup d&rsquo;&oelig;il autour de lui. Personne d&rsquo;autre ne l&rsquo;avait vu. Il n&rsquo;y avait pas &acirc;me qui vive, pas une seule fen&ecirc;tre &eacute;clair&eacute;e. &Agrave; peine une chemin&eacute;e sur deux laissait-elle &eacute;chapper un mince panache de fum&eacute;e, unique signe de vie.Il fallait que je parte.</p>', '2017-12-11 10:35:00'),
(1, 'Pourquoi fait il si froid ?', '<p>L&rsquo;&eacute;tang &eacute;tait gel&eacute;. Oksana chercha une pierre sous la neige. De peur d&rsquo;attirer l&rsquo;attention, elle enveloppa la pierre dans son ch&acirc;le pour assourdir le bruit pendant qu&rsquo;elle creusait un trou dans la glace. Elle reposa la pierre. Frissonnant &agrave; la vue de l&rsquo;eau noire et glaciale, elle y plongea la main, le souffle coup&eacute; par le froid. Encore quelques secondes et son bras s&rsquo;engourdirait. Pas de temps &agrave; perdre. Au fond elle ne trouva que de la vase. Mais o&ugrave; &eacute;tait-ce donc? Prise de panique elle se pencha, immergea son bras en totalit&eacute;, promena &agrave; l&rsquo;aveuglette sa main paralys&eacute;e par le froid. Elle sentit du verre sous ses doigts. Rassur&eacute;e, elle referma la main sur le flacon et le sortit de l&rsquo;eau. Elle avait la peau marbr&eacute;e de bleu, comme si elle avait re&ccedil;u des coups. Peu importait, elle venait de trouver ce qu&rsquo;elle cherchait: un flacon herm&eacute;tiquement ferm&eacute; par du goudron. Elle enleva la couche de vase pour inspecter le contenu. &Agrave; l&rsquo;int&eacute;rieur se trouvait un assortiment de petits os. De retour chez elle, elle vit que Pavel avait remis du bois dans le feu. Elle fit fondre &agrave; la chaleur des flammes le goudron qui tomba sur les braises en grosses gouttes collantes. Pavel remarqua sa peau bleu&acirc;tre et, toujours attentionn&eacute;, lui frictionna le bras pour r&eacute;tablir la circulation. Une fois le goudron fondu, elle renversa le flacon et le secoua. Plusieurs os se coinc&egrave;rent dans le goulot. Elle les extirpa et les tendit &agrave; son fils.</p>', '2017-11-01 16:30:00'),
(3, 'Ma grande aventure', '<p>Aussit&ocirc;t apr&egrave;s il frottait ses paumes l&rsquo;une contre l&rsquo;autre en soufflant sur ses doigts. Il avait la goutte au nez, la l&egrave;vre sup&eacute;rieure couverte de morve. Mais ce soir-l&agrave;, apr&egrave;s leur triomphe, il s&rsquo;en moquait, et il replongea les doigts dans la neige en fre- donnant une m&eacute;lodie que son p&egrave;re chantait nagu&egrave;re. Confront&eacute; &agrave; la m&ecirc;me p&eacute;nurie que son fr&egrave;re, Pavel s&rsquo;&eacute;tait &eacute;loign&eacute;. Ils allaient devoir se s&eacute;parer. &Agrave; quelque distance de l&agrave;, il aper&ccedil;ut un arbre mort au tronc h&eacute;riss&eacute; de branches. Il se rua dans cette direction, d&eacute;posa le chat dans la neige pour pouvoir arracher les branches. Il y en avait largement assez pour Andre&iuml; et pour lui, et il chercha son fr&egrave;re des yeux. Il allait l&rsquo;appeler, mais se ravisa. Il entendait du bruit. Il pivota sur lui-m&ecirc;me, inspecta les environs. Les bois &eacute;taient touffus, noy&eacute;s dans la p&eacute;nombre. Il ferma les yeux, se concentra sur ce son qui se r&eacute;p&eacute;tait &agrave; intervalles r&eacute;guliers: un crisse- ment dans la neige. De plus en plus rapproch&eacute;. La peur le fit frissonner. Il rouvrit les yeux. L&agrave;, dans l&rsquo;obscu- rit&eacute;, quelque chose bougeait: un homme en train de courir. Une lourde branche &agrave; la main, il avan&ccedil;ait &agrave; grandes enjamb&eacute;es. Droit sur Pavel. Il les avait entendus tuer le chat et il voulait leur voler leur proie. Mais Pavel l&rsquo;en emp&ecirc;cherait: il ne laisserait pas sa m&egrave;re mourir de faim. Contrairement &agrave; son p&egrave;re, il ne capitulerait pas. Du pied, il tenta d&rsquo;enfouir le chat dans la neige.</p>', '2017-12-15 10:40:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
