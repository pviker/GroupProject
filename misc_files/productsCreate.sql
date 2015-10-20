
use music_electric;

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(75) DEFAULT NULL,
  `desc` mediumtext,
  `price` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `photo_loc` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`prod_id`),
  KEY `subcat_id_idx` (`cat_id`),
  CONSTRAINT `cat_id` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  CREATE TABLE `categories` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `category` varchar(75) DEFAULT NULL,
    `subcategory` varchar(75) DEFAULT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;



  insert into categories (category, subcategory) values
    ("Guitars", "Electric"),
    ("Guitars", "Acoustic"),
    ("Guitars", "Bass"),
    ("Amps", "Electric"),
  	("Amps", "Acoustic"),
  	("Amps", "Bass"),
  	("Drums", "Electric"),
  	("Drums", "Acoustic");
	

		insert into products (title, description, price, cat_id, photo_loc) values
			("Fender American Standard Stratocaster", "Body shape: Double cutaway, Body type: Solid body, Body wood: Alder, Neck shape: C modern, Neck wood: 			 Maple, Scale length: 25.5, Neck Pickup: Custom Shop Fat '50s, Middle Pickup: Custom Shop Fat '50s, Bridge Pickup: Custom Shop Fat '50s, Bridge type: 			 Tremolo/Vibrato, Bridge design: Synchronized tremolo, Finish: Olympic White", 1299, 1, "../images/guitars/strat.jpg");
