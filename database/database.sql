CREATE TABLE tasklist;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL UNIQUE,
  `password` varchar(128),
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` (`name`, `email`, `password`) VALUES ('Arthur', 'teste1@feedz.com.br', '$2y$10$n0wJqNqmYytY.9d73tZgZOuwGQu/Hlk.057YTpBrh34ZOQiB9QLvm');
INSERT INTO `users` (`name`, `email`, `password`) VALUES ('Hyago', 'teste2@feedz.com.br', '$2y$10$n0wJqNqmYytY.9d73tZgZOuwGQu/Hlk.057YTpBrh34ZOQiB9QLvm');
INSERT INTO `users` (`name`, `email`, `password`) VALUES ('Bruno', 'teste3@feedz.com.br', '$2y$10$n0wJqNqmYytY.9d73tZgZOuwGQu/Hlk.057YTpBrh34ZOQiB9QLvm');

-- ----------------------------
-- Table structure for tasks
-- ----------------------------
DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text,
  `active` int(11) NOT NULL DEFAULT '0',
  `status_id` int(11) NOT NULL DEFAULT '1',
  `users_id` int(11) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tasks
-- ----------------------------
INSERT INTO `tasks` (`id`, `title`, `description`, `active`, `status_id`, `users_id`) VALUES (1, 'O que é o Lorem Ipsum?', 'O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão.', 0, 1, 2);
INSERT INTO `tasks` (`id`, `title`, `description`, `active`, `status_id`, `users_id`) VALUES (2, 'De onde é que ele vem?', 'Ao contrário da crença popular, o Lorem Ipsum não é simplesmente texto aleatório.', 0, 1, 2);
INSERT INTO `tasks` (`id`, `title`, `description`, `active`, `status_id`, `users_id`) VALUES (3, 'Porque é que o usamos?', 'É um facto estabelecido de que um leitor é distraído pelo conteúdo legível de uma página quando analisa a sua mancha gráfica.', 0, 1, 2);

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tasks
-- ----------------------------
INSERT INTO `status` (`id`, `name`) VALUES (1, 'Backlog');
INSERT INTO `status` (`id`, `name`) VALUES (2, 'A Fazer');
INSERT INTO `status` (`id`, `name`) VALUES (3, 'Fazendo');
INSERT INTO `status` (`id`, `name`) VALUES (4, 'Feito');
