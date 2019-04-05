CREATE DATABASE IF NOT EXISTS `ToDoList` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ToDoList`;

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
	`item_id` int(11) NOT NULL AUTO_INCREMENT,
	`item_description` varchar(50) DEFAULT NULL,
	PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `items` (`item_id`, `item_description`) VALUES
(1, 'jas'),
(2, 'nutella');

DROP TABLE IF EXISTS `lists`;
CREATE TABLE IF NOT EXISTS `lists`(
	`list_id` int(11) NOT NULL AUTO_INCREMENT,
	`list_name` varchar(50) DEFAULT NULL,
	`item_id` int(11) NOT NULL,
	PRIMARY KEY (`list_id`),
	FOREIGN KEY (`item_id`) REFERENCES `items`(`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

INSERT INTO `lists`(`list_id`, `list_name`, `item_id`) VALUES
(1, 'kleding',1),
(2, 'boodschappen',2); 