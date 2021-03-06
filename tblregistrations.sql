CREATE TABLE tblregistrations (
  id int(11) NOT NULL AUTO_INCREMENT,
  category varchar(255) NOT NULL,
  fname varchar(255) NOT NULL,
  street varchar(255) DEFAULT 'NA',
  postcode varchar(255) DEFAULT '0000',
  locality varchar(255) NOT NULL,
  country varchar(255) NOT NULL,
  tel varchar(255) DEFAULT '',
  email varchar(255) DEFAULT '',
  dob varchar(255) NOT NULL,
  sex varchar(255) NOT NULL,
  license varchar(255) DEFAULT 'NA',
  club varchar(255) DEFAULT 'NA',
  comment varchar(255) DEFAULT 'NA',
  active tinyint(1) DEFAULT 1,
  ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);