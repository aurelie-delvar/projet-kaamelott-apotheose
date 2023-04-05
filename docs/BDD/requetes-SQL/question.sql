--
-- Contenu de la table `question`
-- id => int, Auto Increment
-- title => text
-- answer1 => text
-- answer2 => text
-- answer3 => text
-- answer4 => text
-- goodAnswer => text
-- quizz_id => Foreign Key, NULL
--

INSERT INTO `question` (`id`,`title`, `answer1`, `answer2`, `answer3`, `answer4`, `good_answer`, `quizz_id`) 
VALUES 
(1,"A quel siècle se déroule l'histoire ?", "Au V ème", "Au VI ème", "Au XV ème", " Au IV ème", "Au V ème", 1),
(2,"Est-ce qu'on peut s'en servir pour donner de l'élan à un pigeon ? Qui a osé dire ça à propos d'une catapulte ?", "Perceval", " Kadoc", "Yvain", "Karadoc
","Yvain", 1),
(3,"Le Sloubi ça peut se jouer avec des dés MAIS normalement ça se joue avec quoi ?", "Du suc'", "Des haricots", " Des bouts de fromage", "Des bouts de bois", "Des bouts de bois", 1),
(4,"Quelle chanson entête le roi Arthur pendant tout un épisode ?", "Une souris verte", "A la volette", "Pomme d’api", "Le roi Dagobert", "A la volette", 1),
(5,"Qui n’est pas la maîtresse du roi ?", "Demetra", "Aelis", "Guenièvre", "Azenor", "Guenièvre", 1),
(6,"Qu’est-ce qui est petit et marron?", "Un Marron", "Une Châtaigne", "Un Gland", "Je ne mange pas de graines!", "Un Marron", 1),
(7,"Elle est où la poulette?", "Ça suffit ! Elle est où la poulette ? Elle est bien cachée ?", "Vous rendez la poulette sinon c'est plus vous qui donnez à manger aux lapins !", "Vous rendez la poulette ou c'est tout nus dans les orties !", "Ça suffit, vous rendez la poulette, sinon papi va se mettre en colère.", "toutes les réponses sont bonnes", 1),
(8,"Qui descend plus “de la pucelle que du démon” ?", "Arthur", "Merlin", "Guenièvre", "La dame du lac", "Merlin", 1),
(9,"Qui dit 'Oh bah ça va je picole pas souvent !' ?", "Léodagan", "Karadoc", "Perceval", "Lancelot", "Lancelot", 1),
(10,"Qui dit : 'Eh bien puisque c'est ça, allez-y : détruisez tout ! Entretuez-vous ! Mettez la Bretagne à feu et à sang ! Et ne comptez plus sur moi pour vous amener mes gâteaux à la purée de pomme dont vous êtes si friand ! Dorénavant, vous devrez vous les cuisiner vous-même ! ENTRE DEUX MISES À SAC !'", "Bohort", "Yvain", "Le duc D’Aquitaine", "Gauvain", "Bohort", 1),
(11,"Elias de Kelliwic’h dit ", "le Perfide", "le Fourbe", "le Sournois", "le Rusé", "le Fourbe", 2),
(12," Qui dit : '- Voilà ! C’est tout ce qu’y a ! Unisson, quarte, quinte et c’est marre ! Tous les autres intervalles, c’est de la merde ! Le prochain que je chope en train de siffler un intervalle païen, je fais un rapport au pape !'", "Arthur", "Le Répurgateur", "Boniface évêque de Germanie", "Le Père Blaise", "Le Père Blaise", 2),
(13,"Qui dit : 'Invoquer une meute de loups ? Moi je veux bien, mais je vous préviens : s’ils se retournent contre nous pour nous bouffer les miches, vous viendrez pas pleurer !'", "Merlin", "Elias de Kelliwic’h", "Méléagan", "La Dame du Lac", "Merlin", 2),
(14,"Qui dit : 'Attention, attention… il va y arriver un moment où il y a des granges qui vont se mettre à flamber, faudra pas demander d’où ça vient !'", "Roparzh", "Le tavernier", "Kadoc", "Guethenoc", "Guethenoc", 2),
(15,"Qui dit: 'Faut arrêter ces conneries de nord et de sud ! Une fois pour toutes, le nord, suivant comment on est tourné, ça change tout !'", "Gauvain
", "Perceval", "Yvain", "Karadoc", "Perceval", 2),
(16,"Qui dit: '- Les chicots c'est sacré ! Parce que si on en prend pas soin, dans dix ans, c'est tout à la soupe. Et celui qui me fera bouffer de la soupe, il est pas né !'", "Karadoc", "Perceval", "Le tavernier", "Le maître d’armes", "Karadoc", 2),
(17,"Qui dit : 'J’y connais rien, mais à votre avis, le fait que vous me touchiez pratiquement jamais, ça a une influence sur la fécondité ?'", "Demetra", "Guenièvre", "Azenor", "Aelis", "Guenièvre", 2),
(18,"Qui dit: '- Un village assailli de brigands, une femme qui se fait tabasser, une poule qui boîte, c'est pas les opprimés qui manquent ! Et là au moins, j'aurais l'impression de servir à quelque chose.'", "Léodagan", "Calogrenant", "Lancelot", "Caius", "Lancelot", 2),
(19,"Qui dit : 'Donc là, pour le voyageur isolé y'a deux solutions : soit il dépose ses armes, ses objets, sa bouffe et ses fringues par terre, et il s'en va d'où il est venu à poil dans la neige, soit il décide de se battre... À un contre dix.'", "Le maître d’armes", "Venec", "Léodagan", "Arthur", "Venec", 2),
(20,"Qui dit : 'Si j’échoue, je garde la butte aux Cerfs et je fais tomber une pluie de calamités sur le royaume par vengeance ! C’est pas pour rien qu’on m’appelle « le Fourbe ». Si je réussis, je garde la butte aux Cerfs, plus… Le tertre des  mes…'", "Elias de Kelliwitc’h", "Merlin", "Meleagan", "Le roi Loth", "Elias de Kelliwitc’h", 2),
(21,"Qui dit : 'Tempora mori, tempora mundis recorda. Voilà. Et bien ça, par exemple, ça veut absolument rien dire, mais l’effet reste le même, et pourtant j’ai jamais foutu les pieds dans une salle de classe attention !'", "Ketchatar roi d’Irlande", "Hoël roi d’Armorique", "Loth roi d’Orcanie", "Léodagan roi de Carmélide", "Loth roi d’Orcanie", 3),
(22," Qui dit : 'Ah, le printemps ! La nature se réveille, les oiseaux reviennent, on crame des mecs'", "Le roi Loth", "Arthur", "Lancelot", "Léodagan", "Arthur", 3),
(23,"Selon Perceval, les vieux c’est classe car:", "On les respecte en tant que tel.", "La patience est un plat qui se prépare à l'avance. ", "Il dit rien, on ne sait pas ce qu’il pense, c’est mystérieux.", "La patience est un plat qui se mange sans sauce.", "Il dit rien, on ne sait pas ce qu’il pense, c’est mystérieux.", 3);
