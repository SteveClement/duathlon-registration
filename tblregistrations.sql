CREATE TABLE IF NOT EXISTS 'tblregistrations' (
  'id' int(11) NOT NULL AUTO_INCREMENT,
  'category' varchar(255) NOT NULL,
  'name' varchar(255) NOT NULL,
  'fname' varchar(255) NOT NULL,
  'street' varchar(255) NOT NULL,
  'postcode' varchar(255) NOT NULL,
  'locality' varchar(255) NOT NULL,
  'country' varchar(255) NOT NULL,
  'tel' varchar(255) NOT NULL,
  'email' varchar(255) NOT NULL,
  'dob' varchar(255) NOT NULL,
  'sex' varchar(255) NOT NULL,
  'license' varchar(255) NOT NULL,
  'club' varchar(255) NOT NULL,
  'comment' varchar(255) NOT NULL,
  'active' tinyint(1) NOT NULL,
  PRIMARY KEY ('id')
)