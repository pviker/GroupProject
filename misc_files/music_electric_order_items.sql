CREATE TABLE `order_items` (
  `order_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_id`,`prod_id`),
  KEY `oders_id_idx` (`order_id`),
  KEY `prod_id_idx` (`prod_id`),
  CONSTRAINT `orders_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`orders_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `prod_id` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
