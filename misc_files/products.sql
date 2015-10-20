use music_electric;

create table products
(   id int(4) not null primary key,
	category char(45),
	subcategory char(45),
    short_desc char(72),
    long_desc TEXT,
	photo_loc char(50),
    price float(4,2),
);

insert into products values category, subcategory, short_desc, long_desc, photo_loc, price
  ("0-672-31697-8", "Michael Morgan", "Java 2 for Professional Developers", 34.99),
  ("0-672-31745-1", "Thomas Down", "Installing Debian GNU/Linux", 24.99),
  ("0-672-31509-2", "Pruitt, et al.", "Teach Yourself GIMP in 24 Hours", 24.99),
  ("0-672-31769-9", "Thomas Schenk", "Caldera OpenLinux System Administration Unleashed", 49.99);
