<?php

$migrate_sql=array();

$migrate_sql['CREATE']['book']=>
"CREATE TABLE book (
    id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    title VARCHAR(256) NOT NULL,
    ISBN VARCHAR(128),
    year INT(4),
	description VARCHAR(2000),
    publisher INT(8)  
    ) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;";

$migrate_sql['CREATE']['genre']=>
"CREATE TABLE genre (
    id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(256) NOT NULL
    )";

$migrate_sql['CREATE']['publisher']=>
"CREATE TABLE publisher (
    id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(256) NOT NULL,
    city  VARCHAR(256)
    )";

$migrate_sql['CREATE']['author']=>
"CREATE TABLE author (
    id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(256) NOT NULL
    )";
 
$migrate_sql['CREATE']['book_author']=>
"CREATE TABLE book_author (
    id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    book INT(8) FOREIGN KEY book(id),
    author INT(8) FOREIGN KEY author(id),
    )";
 

$migrate_sql['CREATE']['book_genre']=>
"CREATE TABLE book_genre (
    id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    book INT(8) FOREIGN KEY book(id),
    genre INT(8) FOREIGN KEY genre(id),
    )";
 



DROP TABLE book_author;
DROP TABLE book_genre;
DROP TABLE book;
DROP TABLE publisher ;
DROP TABLE genre;
DROP TABLE author;

CREATE TABLE genre (
    id INT(8) AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

CREATE TABLE publisher (
    id INT(8) AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(256) NOT NULL,
    city  VARCHAR(256)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

CREATE TABLE author (
    id INT(8) AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

CREATE TABLE book (
    id INT(8) AUTO_INCREMENT PRIMARY KEY, 
    title VARCHAR(256) NOT NULL,
    isbn VARCHAR(128),
    year INT(4),
    pages INT(5),
    description VARCHAR(2000),
    publisher_id INT(8),
    foreign key (publisher_id) references publisher(id) ON DELETE SET NULL,
    FULLTEXT(title,isbn,description)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

CREATE TABLE book_author (
    id INT(8) AUTO_INCREMENT PRIMARY KEY, 
    book_id INT(8),
    author_id INT(8),
    foreign key (author_id) references author(id) ON DELETE CASCADE,
    foreign key (book_id) references book(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

CREATE TABLE book_genre (
    id INT(8) AUTO_INCREMENT PRIMARY KEY, 
    book_id INT(8), 
    genre_id INT(8), 
    foreign key (genre_id) references genre(id) ON DELETE CASCADE,
    foreign key (book_id) references book(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;
 


















return $migrate_sql;