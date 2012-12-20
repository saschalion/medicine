DROP TABLE IF EXISTS `complaint_titles`;
CREATE TABLE IF NOT EXISTS `complaint_titles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `order` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `complaint_subtitles`;
CREATE TABLE IF NOT EXISTS `complaint_subtitles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `order` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `complaint_texts`;
CREATE TABLE IF NOT EXISTS `complaint_texts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text DEFAULT NULL,
  `order` int(11) DEFAULT '0',
  `parent_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `complaints`;
-- CREATE TABLE IF NOT EXISTS `complaints` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `title_id` int(11) NOT NULL,
--   `subtitle_id` int(11) NOT NULL,
--   `text_id` int(11) NOT NULL,
--   `order` int(11) DEFAULT '0',
--   PRIMARY KEY (`id`),
--   KEY `title_id_FK_9` (`title_id`),
--   KEY `subtitle_id_FK_10` (`subtitle_id`),
--   KEY `text_id_FK_11` (`text_id`)
-- ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
--
-- ALTER TABLE `complaints`
--   ADD CONSTRAINT `title_id_FK_9` FOREIGN KEY (`title_id`) REFERENCES `complaint_titles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
--   ADD CONSTRAINT `subtitle_id_FK_10` FOREIGN KEY (`subtitle_id`) REFERENCES `complaint_subtitles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
--   ADD CONSTRAINT `text_id_FK_11` FOREIGN KEY (`text_id`) REFERENCES `complaint_texts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `complaint_subtitles`
  ADD `parent_id` int(11) DEFAULT '0';

INSERT INTO `complaint_titles` (`id`, `title`, `order`) VALUES
(1, 'Органы дыхания', 0),
(2, 'Сердечно-сосудистая система', 0),
(3, 'Система пищеварения', 0),
(4, 'Система мочеотделения', 0),
(5, 'Костно-мышечная система', 0),
(6, 'Нервная система, органы чувств, психическое состояние', 0),
(7, 'Эндокринная система', 0),
(8, 'Жалобы, связанные с развитием аллергических реакций', 0);

INSERT INTO `complaint_subtitles` (`id`, `title`, `order`, `parent_id`) VALUES
(1, 'Носовое дыхание', 0, 1),
(2, 'Кашель', 0, 1),
(3, 'При наличии кашля с мокротой необходимо уточнить', 0, 1),
(4, 'Кровохарканье и легочное кровотечение', 0, 1),
(5, 'Боль в грудной клетке', 0, 1),
(6, 'Одышка', 0, 1),
(7, 'Удушье', 0, 1),
(8, 'Боль в области сердца', 0, 2),
(9, 'Сердцебиение', 0, 2),
(10, 'Перебои в работе сердца', 0, 2),
(11, 'Отеки', 0, 2),
(12, 'Ощущение пульсации', 0, 2),
(13, 'Признаки обструкции периферических сосудов', 0, 2),
(14, 'Аппетит', 0, 3),
(15, 'Насыщаемость', 0, 3),
(16, 'Жажда', 0, 3),
(17, 'Вкус  во  рту', 0, 3),
(18, 'Запах  изо рта', 0, 3),
(19, 'Слюнотечение', 0, 3),
(20, 'Глотание   и   прохождение   пищи', 0, 3),
(21, 'Отрыжка', 0, 3),
(22, 'Изжога', 0, 3),
(23, 'Тошнота', 0, 3),
(24, 'Рвота', 0, 3),
(25, 'Боль в животе', 0, 3),
(26, 'Вздутие живота', 0, 3),
(27, 'Стул', 0, 3);

INSERT INTO `complaint_texts` (`id`, `text`, `order`, `parent_id`) VALUES
(1, 'свободное или затрудненное', 0, 1),
(2, 'носовое кровотечение (частота,  интенсивность)', 0, 1),
(3, 'сухой или с мокротой', 0, 2),
(4, 'время появления кашля (утром, вечером, ночью)', 0, 2),
(5, 'постоянный или периодический (приступами); частота приступов кашля', 0, 2),
(6, 'характер кашля (лающий, стенотический, громкий, тихий, беззвучный)', 0, 2),
(7, 'обстоятельства, провоцирующие появление, усиление и купирующие  кашель (положение на спине, левом или правом боку, сидя, физическая нагрузка  и т.д.)', 0, 2),
(8, 'количество мокроты за сутки, в какое время суток больше отделяется мокроты', 0, 3),
(9, 'откашливается легко или трудно, в каком положении (сидя, лежа на каком боку)', 0, 3),
(10, 'консистенция мокроты', 0, 3),
(11, 'характер мокроты (слизистая, слизисто-гнойная, гнойная, кровянистая, гнилост-ная)', 0, 3),
(12, 'цвет (бесцветная, желтая, зеленая, серая, красная, ржавая)', 0, 3),
(13, 'запах  (без запаха, неприятный запах, зловонный)', 0, 3),
(14, 'интенсивность  (прожилки, сгустки крови, объем в мл одного эпизода и за су-тки)', 0, 4),
(15, 'цвет крови (алая, темная кровь, «ржавая» мокрота)', 0, 4),
(16, 'акторы, провоцирующие кровохарканье и легочное кровотечение', 0, 4),
(17, 'частота кровохарканья за сутки (за неделю)', 0, 4),
(18, 'локализация  (под лопатками, под ключицами и т. д.)  ', 0, 5),
(19, 'характер боли  (тупая, острая, колющая, давящая)', 0, 5),
(20, 'связь с дыханием, кашлем, физическим напряжением и т.д.', 0, 5),
(21, 'интенсивность  (умеренная, сильная, нетерпимая)', 0, 5),
(22, 'постоянная, периодическая', 0, 5),
(23, 'чем купируется, уменьшается  (теплом, покоем, аналгетиками и др.)', 0, 5),
(24, 'чем сопровождается  (кашлем, одышкой, слабостью и т.д.)', 0, 5),
(25, 'характер (инспираторная, экспираторная, смешанная)', 0, 6),
(26, 'постоянная, периодическая', 0, 6),
(27, 'степень выраженности (в покое, при физическом напряжении - указать степень нагрузки)', 0, 6),
(28, 'связь с положением тела  (усиление в горизонтальном положении, на боку и др.)', 0, 6),
(29, 'характер (инспираторный, экспираторный, смешанный)', 0, 7),
(30, 'время суток (день, ночь), положение (горизонтальное) и обстоятельства появле-ния приступов (физическое или психоэмоциональное напряжение, контакт со специфическими аллергенами, холодный воздух, запахи и т.д.)', 0, 7),
(31, 'как начинается удушье (внезапно, постепенно)', 0, 7),
(32, 'чем сопровождается  (кашлем сухим, с отделением мокроты (какая мокрота, ее количество, консистенция)), хрипами в груди', 0, 7),
(33, 'положение и поведение больного во время приступа', 0, 7),
(34, 'чем приступы снимаются (купируются самостоятельно, в положении сидя, прием лекарственных препаратов (указать каких))', 0, 7),
(35, 'интенсивность, продолжительность, частота приступов удушья', 0, 7),
(36, 'локализация  (за грудиной (верхняя, средняя, или нижняя ее треть), слева у грудины, в области верхушки сердца и др.)', 0, 8),
(37, 'характер боли (сжимающая, давящая, жгучая, колющая, ноющая)', 0, 8),
(38, 'интенсивность   (умеренная, значительная, невыносимая)', 0, 8),
(39, 'иррадиация боли  (в левое плечо или руку, левую половину шеи, под левую ло-патку, эпигастральную область)', 0, 8),
(40, 'факторы и обстоятельства, провоцирующие боль (физическое, эмоциональное напряжение (указать степень физической нагрузки, провоцирующей боль)), появляется ли боль в покое', 0, 8),
(41, 'продолжительность боли  (несколько секунд, минут, часов и более (указать кон-кретно в мин, часах))', 0, 8),
(42, 'чем боль сопровождается  (головокружением, холодным потом, тревогой, ощущением страха смерти)', 0, 8),
(43, 'постоянная или периодическая, приступообразная', 0, 8),
(44, 'как часто боль повторяется  (указать частоту в день, неделю, год)', 0, 8),
(45, 'положение и поведение больного во время боли', 0, 8);

--  INSERT INTO `complaints` (`id`, `title_id`, `subtitle_id`, `text_id`) VALUES
-- (1, 1, 1, 1),
-- (2, 1, 1, 2),
-- (3, 1, 1, 3),
-- (4, 2, 3, 4),
-- (5, 2, 3, 5),
-- (6, 3, 4, 6),
-- (7, 5, 6, 7),
-- (8, 5, 6, 8);