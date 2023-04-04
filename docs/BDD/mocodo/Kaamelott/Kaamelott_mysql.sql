CREATE DATABASE IF NOT EXISTS `KAAMELOTT` DEFAULT CHARACTER SET UTF8MB4 COLLATE utf8_general_ci;
USE `KAAMELOTT`;

CREATE TABLE `ACTOR` (
  `code_actor` VARCHAR(42),
  `name_actor` VARCHAR(42),
  `picture_actor` VARCHAR(42),
  `description_actor` VARCHAR(42),
  `descriptionpicture_actor` VARCHAR(42),
  `code_personage` VARCHAR(42),
  PRIMARY KEY (`code_actor`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `AUTHOR` (
  `code_author` VARCHAR(42),
  `name_author` VARCHAR(42),
  PRIMARY KEY (`code_author`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `AVATAR` (
  `code_avatar` VARCHAR(42),
  `name_avatar` VARCHAR(42),
  `icon_avatar` VARCHAR(42),
  `code_user` VARCHAR(42),
  PRIMARY KEY (`code_avatar`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `EPISODE` (
  `code_episode` VARCHAR(42),
  `title_episode` VARCHAR(42),
  `number_episode` VARCHAR(42),
  `code_author` VARCHAR(42),
  `code_season` VARCHAR(42),
  PRIMARY KEY (`code_episode`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `PERSONAGE` (
  `code_personage` VARCHAR(42),
  `name_personage` VARCHAR(42),
  `picture_personage` VARCHAR(42),
  `description_personage` VARCHAR(42),
  `descriptionpicture_personage` VARCHAR(42),
  `creditorder_personage` VARCHAR(42),
  PRIMARY KEY (`code_personage`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `PLAY` (
  `code_quizz` VARCHAR(42),
  `code_user` VARCHAR(42),
  `score` VARCHAR(42),
  PRIMARY KEY (`code_quizz`, `code_user`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `QUESTION` (
  `code_question` VARCHAR(42),
  `title_question` VARCHAR(42),
  `answer1_question` VARCHAR(42),
  `answer2_question` VARCHAR(42),
  `answer3_question` VARCHAR(42),
  `answer4_question` VARCHAR(42),
  `goodanswer_question` VARCHAR(42),
  `code_quizz` VARCHAR(42),
  PRIMARY KEY (`code_question`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `QUIZZ` (
  `code_quizz` VARCHAR(42),
  `title_quizz` VARCHAR(42),
  PRIMARY KEY (`code_quizz`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `QUOTE` (
  `code_quote` VARCHAR(42),
  `text_quote` VARCHAR(42),
  `rating_quote` VARCHAR(42),
  `validated_quote` VARCHAR(42),
  `code_episode` VARCHAR(42),
  `code_user` VARCHAR(42),
  `code_personage` VARCHAR(42),
  PRIMARY KEY (`code_quote`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `SEASON` (
  `code_season` VARCHAR(42),
  `title_season` VARCHAR(42),
  PRIMARY KEY (`code_season`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `USER` (
  `code_user` VARCHAR(42),
  `email_user` VARCHAR(42),
  `password_user` VARCHAR(42),
  `role_user` VARCHAR(42),
  PRIMARY KEY (`code_user`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `FAVORITE` (
  `code_user` VARCHAR(42),
  `code_quote` VARCHAR(42),
  PRIMARY KEY (`code_user`, `code_quote`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `RATE` (
  `code_user` VARCHAR(42),
  `code_quote` VARCHAR(42),
  `rating` VARCHAR(42),
  PRIMARY KEY (`code_user`, `code_quote`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

ALTER TABLE `ACTOR` ADD FOREIGN KEY (`code_personage`) REFERENCES `PERSONAGE` (`code_personage`);
ALTER TABLE `AVATAR` ADD FOREIGN KEY (`code_user`) REFERENCES `USER` (`code_user`);
ALTER TABLE `EPISODE` ADD FOREIGN KEY (`code_season`) REFERENCES `SEASON` (`code_season`);
ALTER TABLE `EPISODE` ADD FOREIGN KEY (`code_author`) REFERENCES `AUTHOR` (`code_author`);
ALTER TABLE `PLAY` ADD FOREIGN KEY (`code_user`) REFERENCES `USER` (`code_user`);
ALTER TABLE `PLAY` ADD FOREIGN KEY (`code_quizz`) REFERENCES `QUIZZ` (`code_quizz`);
ALTER TABLE `QUESTION` ADD FOREIGN KEY (`code_quizz`) REFERENCES `QUIZZ` (`code_quizz`);
ALTER TABLE `QUOTE` ADD FOREIGN KEY (`code_personage`) REFERENCES `PERSONAGE` (`code_personage`);
ALTER TABLE `QUOTE` ADD FOREIGN KEY (`code_user`) REFERENCES `USER` (`code_user`);
ALTER TABLE `QUOTE` ADD FOREIGN KEY (`code_episode`) REFERENCES `EPISODE` (`code_episode`);
ALTER TABLE `FAVORITE` ADD FOREIGN KEY (`code_quote`) REFERENCES `QUOTE` (`code_quote`);
ALTER TABLE `FAVORITE` ADD FOREIGN KEY (`code_user`) REFERENCES `USER` (`code_user`);
ALTER TABLE `RATE` ADD FOREIGN KEY (`code_quote`) REFERENCES `QUOTE` (`code_quote`);
ALTER TABLE `RATE` ADD FOREIGN KEY (`code_user`) REFERENCES `USER` (`code_user`);