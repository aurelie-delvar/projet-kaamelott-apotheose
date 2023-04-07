--
-- Contenu de la table `personage`
-- id => int, Auto Increment
-- name => string (64)
-- picture => string (128), NULL
-- description_picture => text, NULL
-- description => text, NULL
-- actor_id => Foreign Key, NULL
-- ! credit_order => boolean (true (1) personage secondary not important et false (0) personage primary important)
--

INSERT INTO `personage` (`id`,`name`, `picture`,`description_picture`, `description`, `actor_id`, `credit_order`) 
VALUES
(1,"Angharad", NULL, NULL, NULL, 1, 1),
(2,"Anna", NULL, NULL, "Anna de Tintagel est la femme du Roi Loth d'Orcanie et la mère du chevalier de la Table Ronde, Gauvain.
Elle a pour parents la fille d'Ygerne de Tintagel et le Duc de Gorlais, ce qui fait donc d'elle la demi-sœur d'Arthur Pendragon.
C'est une femme irascible qui hait son mari le Roi Loth et encore plus Arthur, son demi-frère qu'elle considère comme un usurpateur et un bâtard.",2, 0),
(3,"Appius Manilius", NULL, NULL, NULL, 3, 1),
(4,"Attila", NULL, NULL, NULL, 4, 1),
(5,"Belt", NULL, NULL, NULL, 5, 1),
(6,"Breccan", NULL, NULL, NULL, 6, 1),
(7,"Calogrenant", NULL, NULL, NULL, 7, 1),
(8,"Capito", NULL, NULL, "Publius Servius Capito est un sénateur romain et bras droit de Lucius Sillius Sallustius. Il apparaît pour la première fois dans le Livre IV lors de la jeune d’Arthur à Rome. Impulsif et menaçant, il est souvent utilisé par Sallustius pour mettre la pression sur d’autres sénateurs ou effectuer des tâches secondaires.", 8, 0),
(9,"César", NULL, NULL, NULL, 9, 1),
(10,"Cryda de Tintagel", NULL, NULL, "Cryda de Tintagel est la tante du Roi Arthur et soeur d'Ygerne de Tintagel.
C'est une femme aigrie et froide qui déteste Arthur et n'hésite pas à lui dire à chaque fois qu'elle a l'occasion de le voir.", 10, 0),
(11,"Dagonet", "Dagonet.jpg", "Publié sur Facebook compte officiel de Kaamelott — https://www.facebook.com/KaamelottOff/photos/4138220832906373", NULL, 11, 0),
(12,"La Dame du Lac", NULL, NULL, "La Dame du Lac est envoyée sur Terre par les dieux afin de guider Arthur et ses chevaliers dans la quête du Graal.
Elle apparait pour la première fois à Arthur lorsqu'il est à Rome dans la milice urbaine afin de lui remémorer son passé et le faire revenir en Bretagne afin qu'il devienne roi.
Arthur est le seul à être capable de la voir et de l'entendre bien qu'elle soit apparue à quelques occasions à d'autres personnes (généralement par erreur).
Lors du Livre IV, Arthur commet la faute avec Mevanwi et abandonne de la quête du Graal.
Les dieux considèrent alors qu'elle a échouée dans sa mission et la sentence est terrible : la dame du lac est bannie, devient mortelle et se retrouve sur le plan terrestre.
Pendant le Livre V, elle finit par errer dans le royaume, rencontrant même Lancelot.
Il apprend qui elle est, qu'elle fut sa nourrice quand il était plus jeune et que les dieux ont préféré choisir Arthur à sa place.
Par la suite, alors grièvement blessé, elle lui rappellera la routine de guérison, ce qui lui permettra de se soigner, et aussi de soigner Arthur lors de sa tentative de suicide.
Elle réapparait dans Kaamelott : Premier Volet et semble s'être acclimatée à sa vie terrestre et insiste pour qu'Arthur retire à nouveau l'épée du rocher.", 12, 0),
(13,"Drusilla", NULL, NULL, NULL, 13, 1),
(14,"Le Duc d'Aquitaine", "DucDAquitaine.jpg", "Publié sur Facebook compte officiel de Kaamelott — https://www.facebook.com/KaamelottOff/photos/4138220852906371", NULL, 14, 0),
(15,"Edern", NULL, NULL, "Edern apparait dans l'épisode pilote n°6 de Kaamelott, intitulé 'Le Chevalier Femme' : il s'agit de la fille d'un ami de Léodagan et la seule femme chevalier de la Table Ronde.", 15, 0),
(16,"Galessin", NULL, NULL, NULL, 16, 1),
(17,"Goustan", NULL, NULL, NULL, 17, 1),
(18,"Grüdü", NULL, NULL, NULL, 18, 1),
(19,"Hervé de Rinel", NULL, NULL, NULL, 19, 1),
(20,"L'interprète burgonde", NULL, NULL, NULL, 20, 1),
(21,"Aziliz (Les Jumelles du pêcheur)", NULL, NULL, "Aziliz et Tumet sont des jumelles, filles d'un pêcheur (ce qui leur vaut le surnom des Jumelles du pêcheur) et qui sont les maitresses du Roi Arthur Pendragon. Arthur les a rencontré à son arrivée en Bretagne après avoir passé son adolescence à Rome. Elles ont chacune un caractère différent : Azilis est vive et impulsive et s'énerve facilement, tandis que Tumet est plus douce et calme.", 56, 0),
(22,"Le Jurisconsulte", "Juriconsulte.jpg", "Publié sur Facebook compte officiel de Kaamelott — https://www.facebook.com/KaamelottOff/photos/4138221152906341", "Le Jurisconsulte apparait à partir du livre V, alors qu'Arthur n'a pas retiré l'épée et refuse de gouverner. Lionel et Bohort proposent d'engager un spécialiste des lois afin de trouver un moyen de désigner un roi qui ne retire pas l'épée. Le Jurisconsulte est alors engagé pour fouiller les archives afin de trouver une loi permettant de nommer un régent.", 22, 0),
(23,"Manius Macrinus Firmus", NULL, NULL, NULL, 23, 1),
(24,"Mevanwi", "Mevanwi.jpg", "Publié sur Facebook compte officiel de Kaamelott — https://www.facebook.com/KaamelottOff/photos/4138221436239646", NULL, 24, 0),
(25,"Lucius Sillius Sallustius", NULL, NULL, "Lucius Sillius Sallustius est un sénateur romain très intelligent et influent qui suggère les décisions à prendre à Cæsar.
Il apparait pour la première fois dans l'épisode Miles Ignotus du livre VI.", 25, 0),
(26,"Séfriane d'Aquitaine", NULL, NULL, "Séfriane d'Aquitaine est la nièce du Duc d'Aquitaine.
Elle n'apparait que lors d'un seul épisode (Séfriane d'Aquitaine, Livre III), lors duquel elle assiste une la réunion de la Table Ronde avec Bohort, Léodagan et Arthur au sujet de l'achat de béliers pour le royaume.", 26, 0),
(27,"Spurius Cordius Frontinius", NULL, NULL, NULL, 27, 1),
(28,"Vérinus", NULL, NULL, NULL, 28, 1),
(29,"Ygerne", NULL, NULL, "Ygerne de Tintagel est la mère du roi Arthur Pendragon et d'Anna de Tintagel.
Elle fut la femme du Duc de Gorlais et la maîtresse d'Uther Pendragon.", 29, 0),
(30,"Arthur", "Arthur.jpg", "Publié sur Facebook compte officiel de Kaamelott — https://www.facebook.com/KaamelottOff/photos/4138220599573063", "Arthur Pendragon est le souverain du royaume de Logres et gouverne depuis le château de Kaamelott qu'il a fait construire. Il est le fils d'Uther Pendragon et d'Ygerne de Tintagel, a une demi-soeur Anna et est marié à Guenièvre. Jusqu'à ses 6 ans, il a grandi avec Anton, son père adoptif avant d'être envoyé à Rome pour le protéger d'Uther Pendragon. Lors de son ascension en tant que chef de guerre à Rome, il rencontrera Cæsar qui lui indiquera que les grand chefs ne 'se battent que pour la dignité des faibles'. Il gardera en mémoire ce conseil et sera réputé comme un roi moderne au vu de ses positions sur la torture ou l'esclavage mais également à l'écoute grâce aux doléances à Kaamelott ou encore l'argent versé pour les récoltes perdues par les paysans. Cela lui vaudra le surnom d'Arthur 'Le Juste' par le peuple. Guidé par la Dame du Lac (qu'il est le seul à voir et entendre), il a créé les chevaliers de la Table Ronde pour partir à la recherche du Graal. Malgré des colères régulières face à l'incompétence de ses chevaliers, il fait cependant tout pour les guider vers la 'lumière sacrée'", 30, 0),
(31,"Père Blaise", NULL, NULL, NULL, 31, 1),
(32,"Bohort", "Bohort.jpg", "Publié sur Facebook compte officiel de Kaamelott — https://www.facebook.com/KaamelottOff/photos/4138220816239708", NULL, 32, 0),
(33,"Le Roi Burgonde", "RoiBurgonde.jpg", "Publié sur Facebook compte officiel de Kaamelott — https://www.facebook.com/KaamelottOff/photos/4138221589572964", "Le Roi Burgonde est un chef ennemi dans Kaamelott.
Souvent présent pour la signature d'un traité de paix avec Arthur, c'est un personnage stupide et grossier.
Il ne parle pas la langue d'Arthur et balbutie parfois quelques mots sans en comprendre leur signification ce qui génère de nombreux quiproquos.", 33, 0),
(34,"Caius Camillus", NULL, NULL, NULL, 34, 1),
(35,"Demetra", NULL, NULL, NULL, 35, 1),
(36,"Elias de Kelliwic'h", NULL, NULL, NULL, 36, 1),
(37,"Gauvain", NULL, NULL, NULL, 37, 1),
(38,"Guenièvre", "Guenievre.jpg", "Publié sur Facebook compte officiel de Kaamelott — https://www.facebook.com/KaamelottOff/photos/4138221032906353", "Guenièvre est la femme d'Arthur Pendragon et la reine de Bretagne.
Elle est la fille de Léodagan de Carmélide et de Dame Séli, et donc également la princesse de Carmélide.
Elle est surnommée Guenièvre à la blanche fesse.
Candide, elle a toujours rêvée au grand amour et semble amoureuse d'Arthur malgré leur mariage arrangé.
Cependant, avec son caractère naif et crédule, elle irrite souvent Arthur avec qui elle s'entend difficilement.
Malgré son statut de Reine de Bretagne, elle ne prend pas part aux décisions concernant le royaume ou aux séances de doléances.", 38, 0),
(39,"Guethenoc", NULL, NULL, NULL, 39, 1),
(40,"Le Seigneur Jacca", NULL, NULL, "Le Seigneur Jacca n'apparait que dans un seul épisode : 'La Taxe Militaire'. Venu se plaindre des taxes auquel il est soumis en tant que seigneur ne participant pas aux batailles, on apprend qu'il est également chevalier de la Table Ronde et présumé mort par Arthur et Léodagan. Il est interprété par Georges Beller.", 40, 0),
(41,"Kadoc", NULL, NULL, "Kadoc est le frère du chevalier Karadoc. Il a un retard mental et un vocabulaire très limité, justifié par les druides par le fait qu'il ne dorme jamais.
Peu présent au début sauf quand la tante de Karadoc le lui 'colle dans les pattes', il rejoint le clan des Semi-Croustillants de son frère au cours du Livre V.
Dans Kaamelott : Premier Volet, il est toujours membre du clan des Semi-Croustillants, et est nommé colonel à titre aromatique par Karadoc pour le féliciter.", 41, 0),
(42,"Karadoc", "Karadoc.jpg", "Publié sur Facebook compte officiel de Kaamelott — https://www.facebook.com/KaamelottOff/photos/4138221182906338", "Karadoc de Vannes est un chevalier de la Table Ronde, meilleur ami du Chevalier Perceval de Galles.
Il est marié à dame Mevanwi avec qui il a eu plusieurs enfants, et a un frère, Kadoc.
Sa grande passion est la nourriture : pour lui, 'le gras c'est la vie' et il a onze repas par jour qui doivent absolument être pris à heure fixe.
Il n'hésite d'ailleurs pas à garder de la nourriture dans sa chambre et même jusque dans son lit : d'après les dires de dame Mevanwi, il aurait même dormi avec un porc vivant par crainte de disette.
Durant le livre V, il monte un clan autonome avec son ami Perceval, les 'semi-croustillants' et ils établissent leur quartier général à la taverne.
Il deviendra un temps régent de Bretagne suite à une manipulation de Mevanwi qui détruisit l’acte d’annulation de l’échange d’épouses.", 42, 0),
(43,"Lancelot", "Lancelot.jpg", "Publié sur Facebook compte officiel de Kaamelott — https://www.facebook.com/KaamelottOff/photos/4138220602906396", NULL, 43, 0),
(44,"Léodagan", "Leodagan.jpg", "Publié sur Facebook compte officiel de Kaamelott — https://www.facebook.com/KaamelottOff/photos/4138221279572995", NULL, 44, 0),
(45,"Loth", "Loth.jpg", "Publié sur Facebook compte officiel de Kaamelott — https://www.facebook.com/KaamelottOff/photos/4138221292906327", NULL, 45, 0),
(46,"Le Maître d'Armes", NULL, NULL, NULL, 46, 1),
(47,"Méléagant", NULL, NULL, "Méléagant apparait pour la première fois lors du livre IV lorsque Lancelot est esseulé, son camp démantelé et Guenièvre récupérée par Arthur Pendragon.
Il s'approche alors de lui et lui dit alors :
Juste à notre aplomb une corneille est posée sur une branche. Dans quelques secondes, elle va s'envoler. [...] Voilà. Nous avons franchi le solstice d'été. Et pendant que d'autres célèbrent le jour le plus interminable de l'année, nous allons secrètement nous réjouir du retour des longues nuits. [...] Levez-vous.
Méléagant est « le dieu des morts solitaire des frayeurs du ciel » et lorsque Lancelot demande son nom, il répond qu'on le nomme parfois 'La Réponse'.
Durant le livre V, il influence Lancelot pour qu'il ne retire pas l'épée du Rocher car il n'est pas l'élu des dieux ayant désigné Arthur, Roi.
Il fait également tout pour qu'il renie définitivement Arthur et l'assassine.
Il manipule également Arthur lors de sa recherche de descendance, accentuant sa dépression en lui faisant revoir son père adoptif, Anton et en lui faisant croise qu'il n'aura jamais de descendance car il est infertile.
Cela pousse le roi à faire une tentative de suicide une fois revenu au château.
Il apparait également dans la scène post-générique de Kaamelott : Premier Volet, où on le voit ramper sur le sol, ramasser de la neige et la boire et se retourner, allongé face au ciel.", 47, 0),
(48,"Merlin", "Merlin.jpg", "Publié sur Facebook compte officiel de Kaamelott — https://www.facebook.com/KaamelottOff/photos/4138221349572988", NULL, 48, 0),
(49,"Perceval", "Perceval.jpg", "Publié sur Facebook compte officiel de Kaamelott — https://www.facebook.com/KaamelottOff/photos/4138221442906312", "Perceval de Galles est un chevalier de la Table Ronde originaire de Caerdydd au Pays de Galles.
Considéré comme un idiot (il ne sait lire, ni écrire et a un vocabulaire très limité), il est plutôt comme un enfant, naif et qui n'a pas reçu d'éducation.
Il a une grande fidélité envers Arthur et cherche par tous les moyens à obtenir sa fierté : il indiquera d'ailleurs que, pour lui, « c'est Arthur qui compte ».
Il refusera obstinément de tenter sa chance pour retirer Excalibur du rocher par respect envers le roi et dissuadera Karadoc de le faire également.
Arthur de son côté et malgré son agacement à essayer de comprendre Perceval à chaque fois qu'il parle ou lorsqu'il fait des erreurs, a une profonde affection envers lui : il mange régulièrement seul avec lui (et c'est le seul chevalier de la Table Ronde à avoir ce privilège) et sera attristé quand il croira qu'il est mort.
Il aime beaucoup jouer à des jeux de son pays même si personne ne comprend les règles : Contre-sirop, Chante Sloubi, le jeu du Pélican...
Au cours du livre V, il monte le clan autonome des 'Semi-croustillants' avec son ami Karadoc et ils établissent leur quartier général à la taverne dans laquelle ils passaient le plus clair de leur temps.
Dans Kaamelott Premier volet, il est le leader de la résistance en Bretagne avec Karadoc.
Ils creusent des tunnels avec leur clan pour contrer Lancelot, devenu roi, et cela leur permet de libérer Arthur lorsqu'il est fait prisonnier et également de faire s'écrouler une partie du chateau.", 49, 0),
(50,"Roparzh", NULL, NULL, NULL, 50, 1),
(51,"Séli", "Selie.jpg", "Publié sur Facebook compte officiel de Kaamelott — https://www.facebook.com/KaamelottOff/photos/4138221632906293", NULL, 51, 0),
(52,"Le Tavernier", NULL, NULL, "Le tavernier est le propriétaire d'une taverne aux alentours de Kaamelott dans laquelle se retrouve plusieurs fois par jour Karadoc et Perceval. Au fil du temps, il se lie d'amitié avec les deux chevaliers, jouant même à l'occasion à des jeux de société avec eux à la fin de son service : Le cul de chouette, Le Contre-sirop, Chante sloubi... Au cours du livre V, il accepte que sa taverne devienne le quartier général du nouveau clan autonome monté par Perceval et Karadoc.", 52, 1),
(53,"Urgan", NULL, NULL, NULL, 53, 1),
(54,"Venec", NULL, NULL, NULL, 54, 1),
(55,"Yvain", NULL, NULL, NULL, 55, 1),
(56,"Tumet (Les Jumelles du pêcheur)", NULL, NULL, "Aziliz et Tumet sont des jumelles, filles d'un pêcheur (ce qui leur vaut le surnom des Jumelles du pêcheur) et qui sont les maitresses du Roi Arthur Pendragon. Arthur les a rencontré à son arrivée en Bretagne après avoir passé son adolescence à Rome. Elles ont chacune un caractère différent : Azilis est vive et impulsive et s'énerve facilement, tandis que Tumet est plus douce et calme.", 21, 0); 