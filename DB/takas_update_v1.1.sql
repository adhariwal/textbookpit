ALTER TABLE `classified_ads` ADD email_status INT(2);

DROP TABLE IF EXISTS `review`;

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `reviewer_name` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review_des` text,
  `review_status` int(11) DEFAULT '0',
  `ads_id` int(11) DEFAULT NULL,
  `review_date` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;