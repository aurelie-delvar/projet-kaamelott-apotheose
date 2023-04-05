--
-- Contenu de la table `user`
-- id => int, Auto Increment
-- email => string (180) 
-- password => string (255)
-- roles => string (255)
-- ! conseil d'Alexandre utilisation de make:user revoir cette partie ... (EB)
--

INSERT INTO `user` (`id`,`email`, `password`, `roles`, `avatar_id`) 
VALUES 
(1,"clara@oclock.fr", "clara", "USER", NULL),
(2,"edith@oclock.fr", "edith", "ADMIN", 2),
(3,"alexandre@oclock.fr", "alexandre", "MANAGER",3),
(4,"aurelie@oclock.fr", "aurelie", "ADMIN",1),
(5,"celine@oclock.fr", "celine", "ADMIN", NULL),
(6,"angele@oclock.fr", "angele", "ADMIN",NULL);
