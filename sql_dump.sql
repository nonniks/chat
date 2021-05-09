
CREATE TABLE `messages` (
  `id` int(5) NOT NULL auto_increment,
  `login` varchar(200) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `name` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `pos` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;



CREATE TABLE `users` (
  `id` int(5) NOT NULL auto_increment,
  `login` varchar(200) NOT NULL,
  `password` varchar(400) NOT NULL,
  `name` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `pos` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

        