CREATE TABLE IF NOT EXISTS `complaint_parameters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `order` int(11) DEFAULT '0',
  `text_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

ALTER TABLE `complaint_parameters`
ADD CONSTRAINT `complaint_parameters_id_FK_9` FOREIGN KEY (`text_id`) REFERENCES `complaint_texts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

alter table complaint_parameters add parameter varchar(250);