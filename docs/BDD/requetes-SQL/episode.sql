--
-- Contenu de la table `episode`
-- id => int, Auto Increment
-- title => string (128)
-- number => INT, NULL
-- author_id => Foreign Key
-- season_id => Foreign Key
--

INSERT INTO `episode` (`id`,`title`, `number`,`author_id`, `season_id`) 
VALUES
(1, "La Romance de Lancelot", 37, 1, 1),
(2, "La Joute Ancillaire", 37, 1, 2),
(3, "La chambre de la Reine", 26, 1, 3),
(4, "Les Bonnes", 30, 1, 3),
(5, "La Supplique", 30, 1, 4),
(6, "Nuptiae", 6, 1, 5),
(7, "Arturus Rex", 7, 1, 5),
(8, "Lacrimosa", 8, 1, 5),
(9, "Le Fléau de Dieu", 89, 1, 1),
(10, "Le Fléau de Dieu II", 12, 1, 6),
(11, "Spiritueux", 68, 1, 2),
(12, "La table de Breccan", 3, 1, 1),
(13, "La jupe de Calogrenant", 59, 1, 1),
(14, "Le Cadeau", 46, 1, 2),
(15, "L'Alliance", 60, 1, 2),
(16, "Miles Ignotus", 1, 1, 5),
(17, "Centurio", 2, 1, 5),
(18, "Dux bellorum", 5, 1, 5),
(19, "Arturi Inquisitio", 4, 1, 5),
(20, "Nuptiæ", 6, 1, 5),
(21, "De retour de Judée", 27, 1, 1),
(22, "Le Retour de Judée", 27, 1, 1),
(23, "Le Désordre et la Nuit", 100, 1, 3),
(24, "La promesse", 22, 1, 4),
(25, "Hollow Man", 98, 1, 6),
(26, "Tous Les Matins du Monde", 2, 1, 3),
(27, "La Révoquée", 28, 1, 3),
(28, "La roche et le fer ", 12, 1, 4),
(29, "La Nourrice", 36, 1, 4),
(30, "Les Fruits d'Hiver", 16, 1, 4),
(31, "Les Nocturnales", 19, 1, 4),
(32, "Le Forfait", 23, 1, 4),
(33, "Le Chevalier femme", 6, 1, 7),
(34, "Le Chevalier Femme", 6, 1, 7),
(35, "Enluminures", 51, 1, 1),
(36, "Les Vœux", 45, 1, 2),
(37, "Spagenhelm", 84, 1, 2),
(38, "Dagonnet et le cadastre", 14, 1, 3),
(39, "Loth et le Graal", 67, 1, 3),
(40, "Aux yeux de tous III", 21, 1, 4),
(41, "Goustan Le Cruel", 63, 1, 1),
(42, "Goustan le Cruel", 63, 1, 1),
(43, "Arturus rex", 7, 1, 5),
(44, "La queue du scorpion", 22, 1, 1),
(45, "L'Assassin de Kaamelott", 29, 1, 1),
(46, "Le Rêve d'Ygerne", 64, 1, 3),
(47, "L'Espion", 91, 1, 6),
(48, "Les Pionniers", 40, 1, 4),
(49, "Le Destitué", 42, 1, 4),
(50, "L'interprète", 45, 1, 1),
(51, "L'Interprète", 45, 1, 1),
(52, "La Parade", 21, 1, 3),
(53, "Le Jurisconsulte", 27, 1, 4),
(54, "La Conspiratrice", 41, 1, 4),
(55, "Immaculé Karadoc", 20, 1, 2),
(56, "La Chambre de la reine", 26, 1, 3),
(57, "Miles Ingnotus", 1, 1, 5),
(58, "Arturi inquisitio", 4, 1, 5),
(59, "Dux Bellorum", 5, 1, 5),
(60, "Séfriane d'Aquitaine ", 16, 1, 6),
(61, "Lacrimosa ", 8, 1, 5),
(62, "La Visite d'Ygerne", 59, 2, 1),
(63, "Le secret d'Arthur", 62, 1, 2),
(64, "Mater Dixit", 69, 2, 2),
(65, "Le dernier jour", 24, 2, 4),
(66, "Anton", 69, 2, 4),
(67, "La tarte aux myrtilles", NULL, 1, 1),
(68, "Patience dans la plaine", NULL, 1, 1),
(69, "Haunted", NULL, 1, 1),
(70, "Les Défis de Merlin", NULL, 1, 1),
(71, "La Dent de requin", NULL, 1, 1),
(72, "Codes et Stratégies", NULL, 1, 1),
(73, "La Retraite", NULL, 1, 1),
(74, "Feu l'âne de Guethenoc", NULL, 1, 1),
(75, "Basidiomycètes", NULL, 1, 1),
(76, "L'Imposteur", NULL, 1, 1),
(77, "Le Coup d'épée", NULL, 1, 1),
(78, "Le coup d'épée", NULL, 1, 1),
(79, "Tel un chevalier", NULL, 1, 1),
(80, "À la volette", NULL, 1, 1),
(81, "Unagi", NULL, 1, 1),
(82, "Le tourment", NULL, 1, 1),
(83, "Agnus Dei", NULL, 1, 1),
(84, "Polymorphe", NULL, 1, 1),
(85, "Polymorphie", NULL, 1, 1),
(86, "La Fête de l'Hiver", NULL, 1, 1),
(87, "La vraie nature du Graal", NULL, 1, 1),
(88, "Les Alchimistes", NULL, 1, 2),
(89, "Le Dialogue de Paix", NULL, 1, 2),
(90, "Le Portrait", NULL, 3, 2),
(91, "Silbury Hill", NULL, 1, 2),
(92, "Le Monde d'Arthur", NULL, 1, 2),
(93, "Le monde d'Arthur", NULL, 1, 2),
(94, "Arthur in love", NULL, 1, 2),
(95, "Les Classes de Bohort", NULL, 1, 2),
(96, "La Fête du Printemps", NULL, 1, 2),
(97, "Le Tourment II", NULL, 1, 2),
(98, "Le passage secret", NULL, 1, 2),
(99, "L'ivresse", NULL, 1, 2),
(100, "Always ", NULL, 1, 2),
(101, "Always", NULL, 1, 2),
(102, "Unagi II", NULL, 1, 2),
(103, "Le Poème", NULL, 1, 2),
(104, "Stargate", NULL, 1, 2),
(105, "La chambre", NULL, 1, 2),
(106, "Neiges Éternelles ", NULL, 1, 2),
(107, "Legenda", NULL, 1, 6),
(108, "La mission", NULL, 1, 6),
(109, "La poétique - IIème partie ", NULL, 1, 6),
(110, "Les clous de la sainte croix", NULL, 1, 6),
(111, "Le Culte Secret", NULL, 1, 6),
(112, "Les clous de la Sainte Croix", NULL, 1, 6),
(113, "Le fléau de Dieu II", NULL, 1, 6),
(114, "Ablutions", NULL, 1, 6),
(115, "Seriane d'aquitaine", NULL, 1, 6),
(116, "Le Traitre ", NULL, 1, 3),
(117, "La Foi bretonne", NULL, 1, 3),
(118, "Au service secret de Sa Majesté", NULL, 1, 3),
(119, "La clandestine", NULL, 1, 3),
(120, "La Réponse", NULL, 1, 3),
(121, "La Poétique II", NULL, 1, 3),
(122, "Le Choix de Gauvain", NULL, 1, 3),
(123, "La Tarte aux Fraises", NULL, 1, 3),
(124, "Unagi IV ", NULL, 1, 3),
(125, "Tous les matins du monde (Première Partie)", NULL, 1, 3),
(126, "L'Épée des rois ", NULL, 1, 4),
(127, "L'Élu", NULL, 1, 4),
(128, "La Roche et le Fer", NULL, 1, 4),
(129, "Les Transhumants", NULL, 1, 4),
(130, "Plusieurs épisodes de la saison V ", NULL, 1, 4),
(131, "Le garçon qui criait au loup", NULL, 1, 4),
(132, "Le retour du Roi", NULL, 1, 4),
(133, "Dies Irae", NULL, 1, 5),
(134, "La Quinte juste", 48, 1, 2),
(135, "L'Ambition", 11, 1, 2),
(136, "Le Médiateur", 96, 1, 6),
(137, "Le Vice De Forme", 91, 1, 3),
(138, "En forme de Graal", 18, 1, 1),
(139, "Arthur et la Question", 13, 1, 1),
(140, "Un bruit dans la nuit", 61, 1, 1),
(141, "Le Dragon des tunnels", 86, 1, 1),
(142, "Le Donneur", 49, 1, 2),
(143, "Les Neiges Éternelles", 59, 1, 2),
(144, "L'Aveu de Bohort", 3, 1, 6),
(145, "Arthur sensei", 40, 1, 6),
(146, "La Dispute I", 98, 1, 6),
(147, "La Dispute II", 99, 1, 6),
(148, "Les Tuteurs II", 36, 1, 3),
(149, "Le Renoncement : 1ère partie", 36, 1, 3),
(150, "Les Embusqués", 35, 1, 4),
(151, "Le Dialogue de paix", 44, 1, 2),
(152, "Le dialogue de paix II", 23, 1, 6),
(153, "Les Envahisseurs", 44, 1, 3),
(154, "Le Jeu de la guerre", 66, 1, 3),
(155, "Le Dernier Empereur", 56, 1, 1),
(156, "Seigneur Caius", 22, 1, 3),
(157, "Le Reclassement", 14, 1, 2),
(158, "Le Déserteur", 18, 1, 6),
(159, "Fluctuat nec mergitur", 80, 1, 3),
(160, "Le Tourment", 98, 1, 1),
(161, "Les Cheveux Noirs", 46, 1, 6),
(162, "Les Liaisons Dangereuses", 15, 1, 3),
(163, "La Potion de Fécondité II", 67, 1, 6),
(164, "Le Privilégié", NULL, 1, 3),
(165, "Anges Et Démons", 50, 1, 3),
(166, "Le rassemblent du corbeau II", 50, 1, 3),
(167, "Les plaques de dissimulation", 90, 1, 3),
(168, "La Sorcière", 5, 1, 4),
(169, "Vae soli!", 14, 1, 4),
(170, "Le Duel", 1, 1, 7),
(171, "Le prodige du fakir", 86, 1, 1),
(172, "Les Nouveaux Frères", NULL, 1, 1),
(173, "La Chevalerie", 86, 1, 6),
(174, "Le Grand Départ", 39, 1, 3),
(175, "Les Tuteurs", 24, 1, 2),
(176, "La Potion de fécondité", 23, 1, 1),
(177, "Le Secret de Lancelot", 83, 1, 1),
(178, "L'Ancien Temps", 33, 1, 2),
(179, "L'Ivresse", 31, 1, 2),
(180, "L'Escorte II", 37, 1, 2),
(181, "Excalibur et le Destin ", 98, 1, 2),
(182, "La veillée", NULL, 1, 6),
(183, "Les Novices", 34, 1, 3),
(184, "Corvus corone", 7, 1, 4),
(185, "Les Exilés", 17, 1, 4),
(186, "La révolte", 23, 1, 2),
(187, "Feue La Vache De Roparzh", 69, 1, 2),
(188, "Saponides et Détergents", 74, 1, 6),
(189, "Feue La Poule de Guethenoc", 36, 1, 6),
(190, "La taxe militaire", 21, 1, 1),
(191, "O'Brother", 41, 1, 2),
(192, "Les chiens de guerre", 48, 1, 2),
(193, "Le Jeu du caillou", 60, 1, 2),
(194, "Les Suppléants", 24, 1, 6),
(195, "Witness", 73, 1, 6),
(196, "Le Paladin", 75, 1, 3),
(197, "Domi Nostræ", 33, 1, 4),
(198, "Unagi V", 39, 1, 4),
(199, "Le Retour du Roi", 49, 1, 4),
(200, "Heat", NULL, 1, 1),
(201, "Le pain", NULL, 1, 1),
(202, "La quête des deux renards", NULL, 1, 1),
(203, "L'absent", NULL, 1, 2),
(204, "Sept cent quarante-quatre", NULL, 1, 2),
(205, "La Cassette", NULL, 1, 2),
(206, "Corpore sano", NULL, 1, 2),
(207, "La Restriction", NULL, 1, 2),
(208, "Les Exploités", NULL, 1, 2),
(209, "Le Tourment III", NULL, 1, 6),
(210, "La Grande Bataille", NULL, 1, 6),
(211, "La menace fantôme", NULL, 1, 6),
(212, "La Corne d'abondance", NULL, 1, 6),
(213, "Cuisine et Dépendances", NULL, 1, 6),
(214, "Le Législateur", NULL, 1, 6),
(215, "Le Porte Bonheur", NULL, 1, 6),
(216, "Unagi IV", NULL, 1, 3),
(217, "Duel 2eme partie", NULL, 1, 3),
(218, "L'Échange 1ère partie", NULL, 1, 3),
(219, "Le Vice de forme", NULL, 1, 3),
(220, "L'Échelle de Perceval", NULL, 1, 3),
(221, "Le dernier recours", NULL, 1, 4),
(222, "Domi Nostrae", NULL, 1, 4),
(223, "La Roche Et Le Fer", NULL, 1, 4),
(224, "Le Sacrifice", 25, 1, 1),
(225, "Le Problème du chou", 70, 1, 1),
(226, "Spangenhelm", 1, 1, 2),
(227, "Le Rebelle", 85, 1, 2),
(228, "Le chevalier errant", 1, 1, 6),
(229, "Mission", 43, 1, 6),
(230, "La Dispute", 99, 1, 6),
(231, "Raisons et sentiments", 3, 1, 3),
(232, "La réponse", 49, 1, 3),
(233, "La Rémanence", 51, 1, 3),
(234, "La Table de Breccan", NULL, 1, 1),
(235, "L'Escorte", NULL, 1, 1),
(236, "Les Tartes aux myrtilles", NULL, 1, 1),
(237, "Le fléau de Dieu", NULL, 1, 1),
(238, "La kleptomane", NULL, 1, 1),
(239, "Dîner dansant", NULL, 1, 1),
(240, "Arthur et les Ténèbres", NULL, 1, 1),
(241, "La potion de fécondité", NULL, 1, 1),
(242, "Le Labyrinthe", NULL, 1, 1),
(243, "L'Enlèvement de Guenièvre", NULL, 2, 2),
(244, "La Révolte", NULL, 1, 2),
(245, "Le Sort Perdu", NULL, 1, 2),
(246, "Le Passage Secret", NULL, 1, 2),
(247, "L'Oubli", NULL, 1, 2),
(248, "Le Secret d'Arthur", NULL, 1, 2),
(249, "Amen", NULL, 1, 2),
(250, "Le complot", NULL, 1, 2),
(251, "L'ivresse ", NULL, 1, 2),
(252, "Le Magnanime", NULL, 1, 6),
(253, "L'Assemblée des rois 2eme partie", NULL, 1, 6),
(254, "Aux Yeux de Tous II", NULL, 1, 6),
(255, "La tarte aux fraises", NULL, 1, 3),
(256, "Tous les matins du monde II", NULL, 1, 3),
(257, "L'Art de la table", NULL, 1, 3),
(258, "La Réaffectation", NULL, 1, 3),
(259, "La Blessure D'Yvain", NULL, 1, 3),
(260, "Le Oud II", NULL, 1, 3),
(261, "Les Rivales", NULL, 1, 4),
(262, "La roche et le fer", NULL, 1, 4),
(263, "Perceval de Sinope", NULL, 1, 4),
(264, "L'avènement du Sanguinaire", NULL, 1, 4),
(265, "Le royaume sans tête", NULL, 1, 4),
(266, "Le Périple", 8, 1, 4),
(267, "Praeceptores", NULL, 1, 5),
(268, "Dagonet et le Cadastre", NULL, 1, 3),
(269, "Le désordre et la nuit", NULL, 1, 3),
(270, "Les Repentants", NULL, 1, 4),
(271, "Hurlements", NULL, 1, 4),
(272, "La Promesse", NULL, 1, 4),
(273, "Vae Soli !", NULL, 1, 4),
(274, "Les Dauphins", NULL, 1, 4),
(275, "Jizo", NULL, 1, 4),
(276, "Le maître d'armes", 9, 1, 1),
(277, "Les classes de Bohort", 35, 1, 2),
(278, "Excalibur et le Destin", 92, 1, 2),
(279, "L'assemblée des Rois 2e partie", 90, 1, 6),
(280, "Corpore sano II", 82, 1, 3),
(281, "Le Dernier Recours", 3, 1, 4),
(282, "Aux yeux de tous III ", 3, 1, 4),
(283, "Jizô", 38, 1, 4),
(284, "Le Garçon Qui Criait Au Loup", NULL, 1, 4),
(285, "Le Théâtre Fantôme", NULL, 1, 4),
(286, "La Blessure Mortelle", 85, 1, 1),
(287, "Le Rassemblement du Corbeau", 4, 1, 2),
(288, "Les Misanthropes", 21, 1, 2),
(289, "Merlin l'archaïque", 56, 1, 2),
(290, "Le Renfort Magique", 4, 1, 6),
(291, "Les Défis De Merlin II", 96, 1, 6),
(292, "Le privilégié", 12, 1, 3),
(293, "Præceptores", 3, 1, 5),
(294, "L'arche de transport", NULL, 1, 6),
(295, "L'invincible", NULL, 1, 2),
(296, "La Botte secrète", NULL, 1, 1),
(297, "Ambidextrie", NULL, 1, 1),
(298, "Le Code de Chevalerie", NULL, 1, 1),
(299, "Le Chaudron Rutilant", NULL, 1, 1),
(300, "La fureur du dragon", NULL, 1, 1),
(301, "Les Fesses de Guenièvre", NULL, 1, 1),
(302, "La Coccinelle de Madenn", NULL, 1, 1),
(303, "Séli et les Rongeurs", NULL, 1, 2),
(304, "Un Roi à la Taverne II", NULL, 1, 2),
(305, "Perceval et le Contre-sirop", NULL, 1, 2),
(306, "The Game", NULL, 1, 2),
(307, "L'Absent", NULL, 1, 2),
(308, "Le tourment II", NULL, 1, 2),
(309, "La Botte secrète II", NULL, 1, 2),
(310, "Les Volontaires II", NULL, 1, 2),
(311, "La Garde Royale", 30, 1, 2),
(312, "Les Félicitations", 86, 1, 2),
(313, "Le Jour D'Alexandre", NULL, 1, 6),
(314, "Morituri", NULL, 1, 6),
(315, "Poltergeist", NULL, 1, 6),
(316, "L'Etudiant", NULL, 1, 6),
(317, "Aux Yeux De Tous II", NULL, 1, 6),
(318, "La poétique, 1ere partie",NULL,  1, 6),
(319, "Chante Sloubi", NULL, 1, 6),
(320, "L'Empressée", NULL, 1, 6),
(321, "Le Sanglier De Cornouailles", NULL, 1, 6),
(322, "Tous les matins du monde, 2eme partie", NULL, 1, 3),
(323, "Les Pisteurs", NULL, 1, 3),
(324, "Les Exploités II", NULL, 1, 3),
(325, "Les Chaperons", NULL, 1, 3),
(326, "Les chaperons", NULL, 1, 3),
(327, "L'Habitué", NULL, 1, 3),
(328, "L'Inspiration", NULL, 1, 3),
(329, "Perceval Fait Raitournelle", NULL, 1,  3),
(330, "L'épée Des Rois", NULL, 1, 4),
(331, "L'épée des rois", NULL, 1, 4),
(332, "Les recruteurs", NULL, 1, 4),
(333, "Le Royaume Sans Tête", NULL, 1, 4),
(334, "Dies Iræ", 9, 1, 5),
(335, "Feue la Vache de Roparzh", 69, 1, 2),
(336, "Saponides et detergents", 74, 1, 6),
(337, "La Révolte III", 31, 1, 3),
(338, "Vox populi III", 53, 1, 3),
(339, "Feue La Poule De Guethenoc", 36, 1, 6),
(340, "L'Entente Cordiale", 82, 1, 3),
(341, "La nourrice", 36, 1, 4),
(342, "Potion de fécondité", NULL, 1, 1),
(343, "La Chambre", 3, 1, 2),
(344, "L'Art de la Table", 33, 1, 3),
(345, "La Cassette II", 2, 1, 6),
(346, "La restriction II", 70, 1, 6),
(347, "Tous les matins du monde", 1, 1, 3),
(348, "Les Fruits d'hiver", 36, 1, 4),
(349, "Le Dernier Jour", 24, 1, 4),
(350, "Au bonheur des Dames", 55, 1, 6),
(351, "Un roi à la taverne II", 26, 1, 2),
(352, "Les dauphins", 13, 1, 4),
(353, "La dent de requin", 20, 1, 1),
(354, "Un roi à la taverne", 21, 1, 1),
(355, "Le Professionnel", 23, 1, 6),
(356, "Les Tuteurs ", 24, 1, 2),
(357, "Plus près de Toi", 18, 5, 2),
(358, "Les esclaves", 88, 1, 2),
(359, "Le banquet des chefs", 16, 1, 1),
(360, "Le cas Yvain", 39, 1, 1),
(361, "Sous les verrous", 18, 1, 2),
(362, "Les tuteurs", 24, 1, 2),
(363, "Les Mauvaises Graines", 29, 1, 2),
(364, "Le Guet", 52, 1, 2),
(365, "Les félicitations", 86, 1, 2),
(366, "Le Pédagogue", 95, 1, 2),
(367, "Trois Cent Soixante Degrés", 97, 1, 2),
(368, "L'étudiant", 88, 1, 6),
(369, "Seigneur Caïus", 22, 1, 3),
(370, "Le Rapport", 32, 1, 3),
(371, "La Blessure d'Yvain", 81, 1, 3),
(372, "Les Nouveaux Clans", 4, 1, 4),
(373, "Les pionniers", 40, 1, 4),
(374, "Aux Yeux De Tous III", 21, 1, 4);