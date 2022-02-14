CREATE TABLE student(
    id INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    student_rfid VARCHAR (20)NOT NULL,
    firstname VARCHAR (200) NOT NULL,
    lastname VARCHAR(200) NOT NULL,
    parent_rfid VARCHAR (20)NOT NULL,
    picture VARCHAR (200) NOT NULL,
    sound VARCHAR (250) NOT NULL
    
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


