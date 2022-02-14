CREATE TABLE parent(
    id INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    RFID_KEY VARCHAR (20)NOT NULL,
    firstname VARCHAR (200) NOT NULL,
    lastname VARCHAR(200) NOT NULL,
    house_number VARCHAR (20)NOT NULL,
    district VARCHAR(100) NOT NULL,
    prefecture VARCHAR(100) NOT NULL,
    province VARCHAR(100) NOT NULL,
    zip_code INT(20)NOT NULL,
    telephone VARCHAR (20)NOT NULL,
    picture VARCHAR (100) NOT NULL
    
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


