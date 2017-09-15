
DROP TABLE book_author;
DROP TABLE book_genre;
DROP TABLE book;
DROP TABLE publisher ;
DROP TABLE Genre;
DROP TABLE author;

CREATE TABLE Genre (
    id INT(8) AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

CREATE TABLE Publisher (
    id INT(8) AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(256) NOT NULL,
    city  VARCHAR(256)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

CREATE TABLE Author (
    id INT(8) AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

CREATE TABLE Book (
    id INT(8) AUTO_INCREMENT PRIMARY KEY, 
    title VARCHAR(256) NOT NULL,
    isbn VARCHAR(256),
    year INT(4),
    pages INT(5),
    description VARCHAR(4000),
    publisher_id INT(8),
    looks INt(8) DEFAULT 0,
    foreign key (publisher_id) references publisher(id) ON DELETE SET NULL,
    FULLTEXT(title,isbn,description)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

CREATE TABLE Book_Author (
    id INT(8) AUTO_INCREMENT PRIMARY KEY, 
    book_id INT(8),
    author_id INT(8),
    foreign key (author_id) references author(id) ON DELETE CASCADE,
    foreign key (book_id) references book(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

CREATE TABLE Book_Genre (
    id INT(8) AUTO_INCREMENT PRIMARY KEY, 
    book_id INT(8), 
    genre_id INT(8), 
    foreign key (genre_id) references genre(id) ON DELETE CASCADE,
    foreign key (book_id) references book(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;
 

insert into Genre (id, name) values (1,'Разработка');
insert into Genre (id, name) values (2,'Базы данных');   
insert into Genre (id, name) values (3,'Web-приложеня');
insert into Genre (id, name) values (4,'UML');
insert into Genre (id, name) values (5,'JavaScript');
insert into Genre (id, name) values (6,'С++');
insert into Genre (id, name) values (7,'C#');
insert into Genre (id, name) values (8,'JAVA');
insert into Genre (id, name) values (9,'Алгоритмы и методы');
insert into Genre (id, name) values (10,'CASE-технологии');
insert into Genre (id, name) values (11,'Ruby');
insert into Genre (id, name) values (12,'ООП');


insert into Publisher (id, name) values (1,'Вильямс');
insert into Publisher (id, name) values (2,'Эксмо');
insert into Publisher (id, name) values (3,'Питер');
insert into Publisher (id, name) values (4,'Символ-Плюс');


insert into Author (id, name) values (1,'Мартин Фаулер');
insert into Author (id, name) values (2,'Прамодкумар Дж. Садаладж');
insert into Author (id, name) values (3,'Бен Штрауб');
insert into Author (id, name) values (4,'Берт Бейтс');
insert into Author (id, name) values (5,'Бретт Маклафлин');
insert into Author (id, name) values (6,'Дейвид Райс');
insert into Author (id, name) values (7,'Джейсон Григсби');
insert into Author (id, name) values (8,'Дженнифер Грин');
insert into Author (id, name) values (9,'Джон Брант');
insert into Author (id, name) values (10,'Джон Влиссидес');
insert into Author (id, name) values (11,'Диомидис Спинеллис');
insert into Author (id, name) values (12,'Дон Гриффитс');
insert into Author (id, name) values (13,'Дон Робертс');
insert into Author (id, name) values (14,'Дэви Силен');
insert into Author (id, name) values (15,'Дэвид Гриффитс');
insert into Author (id, name) values (16,'Кевлин Хенни');
insert into Author (id, name) values (17,'Кент Бек');
insert into Author (id, name) values (18,'Кэти Сиерра');
insert into Author (id, name) values (19,'Лиза Гарднер');
insert into Author (id, name) values (20,'Мохамед Али');
insert into Author (id, name) values (21,'Мэттью Фоммел');
insert into Author (id, name) values (22,'Питер Гудлиф');
insert into Author (id, name) values (23,'Ральф Джонсон');
insert into Author (id, name) values (24,'Ричард Хелм');
insert into Author (id, name) values (25,'Роберт К. Мартин');
insert into Author (id, name) values (26,'Роберт Ми');
insert into Author (id, name) values (27,'Рэнди Стаффорд');
insert into Author (id, name) values (28,'Скотт Амблер');
insert into Author (id, name) values (29,'Скотт Чакон');
insert into Author (id, name) values (30,'Сэнди Метц');
insert into Author (id, name) values (31,'Уильям Апдайк');
insert into Author (id, name) values (32,'Эдвард Хайет');
insert into Author (id, name) values (33,'Элизабет Робсон');
insert into Author (id, name) values (34,'Элизабет Фримен');
insert into Author (id, name) values (35,'Эндрю Стиллмен');
insert into Author (id, name) values (36,'Эрик Фримен');
insert into Author (id, name) values (37,'Эрих Гамма');
insert into Author (id, name) values (38,'Арно Мейсман');


insert into Book (id,title,pages,year,isbn,publisher_id) values (1,'NoSQL. Новая методология разработки нереляционных баз данных',192,2013,'978-5-8459-1829-1',1);
insert into Book (id,title,pages,year,isbn,publisher_id) values (2,'Рефакторинг баз данных. Эволюционное проектирование',368,2016,'978-5-8459-1157-5, 0-321-29353-3',1);
insert into Book (id,title,pages,year,isbn,publisher_id) values (3,'Архитектура корпоративных программных приложений',544,2007,'5-8459-0579-6, 0-321-12742-0',1);
insert into Book (id,title,pages,year,isbn,publisher_id) values (4,'Шаблоны корпоративных приложений',544,2016,'978-5-8459-1611-2, 0-321-12742-0h',1);
insert into Book (id,title,pages,year,isbn,publisher_id) values (5,'Предметно-ориентированные языки программирования',576,2011,'978-5-8459-1738-6, 978-0-321-71294-3',1);
insert into Book (id,title,pages,year,isbn,publisher_id) values (6,'UML. Основы. Краткое руководство по стандартному языку объектного моделирования',192,2011,'5-93286-060-X, 0-321-19368-7',4);
insert into Book (id,title,pages,year,isbn,publisher_id) values (7,'Рефакторинг. Улучшение существующего кода',432,2013,'5-93286-045-6, 978-5-93286-045-8, 0-201-48567-2',4);
insert into Book (id,title,pages,year,isbn,publisher_id) values (8,'Шаблоны реализации корпоративных приложений',176,2008,'978-5-8459-1406-4, 0-321-41309-1',1);
insert into Book (id,title,pages,year,isbn,publisher_id) values (9,'Приемы объектно-ориентированного проектирования. Паттерны проектирования',366,2016,'978-5-459-01720-5, 978-5-496-00389-6',3);
insert into Book (id,title,pages,year,isbn,publisher_id) values (10,'Чистый код: создание, анализ и рефакторинг. Библиотека программиста',464,2016,'978-5-496-00487-9, 978-0332350884',3);
insert into Book (id,title,pages,year,isbn,publisher_id) values (11,'97 этюдов для программистов. Опыт ведущих экспертов',256,2012,'978-5-93286-198-1, 978-0-596-80948-5',4);
insert into Book (id,title,pages,year,isbn,publisher_id) values (12,'Идеальный программист. Как стать профессионалом разработки ПО',224,2012,'978-5-459-01044-2, 978-0137081073',3);
insert into Book (id,title,pages,year,isbn,publisher_id) values (13,'Git для профессионального программиста',496,2016,'978-5-496-01763-3',3);
insert into Book (id,title,pages,year,isbn,publisher_id) values (14,'Основы Data Science и Big Data. Python и наука о данных',336,2017,'978-5-496-02517-1',3);
insert into Book (id,title,pages,year,isbn,publisher_id) values (15,'Ruby. Объектно-ориентированное проектирование',304,2017,'978-5-496-02437-2',3);
insert into Book (id,title,pages,year,isbn,publisher_id) values (16,'Изучаем Java',720,2016,'978-5-699-54574-2',2);
insert into Book (id,title,pages,year,isbn,publisher_id) values (17,'Объектно-ориентированный анализ и проектирование',608,2013,'978-5-496-00144-1',3);
insert into Book (id,title,pages,year,isbn,publisher_id) values (18,'Изучаем HTML, XHTML и CSS',720,2016,'978-5-496-00653-8',3);
insert into Book (id,title,pages,year,isbn,publisher_id) values (19,'Изучаем программирование на JavaScript',640,2017,'978-5-496-01257-7, 978-1449340131',3);
insert into Book (id,title,pages,year,isbn,publisher_id) values (20,'Изучаем программирование на C',624,2013,'978-5-699-60233-9',2);
insert into Book (id,title,pages,year,isbn,publisher_id) values (21,'Изучаем C#',816,2016,'978-5-496-00867-9',3);
insert into Book (id,title,pages,year,isbn,publisher_id) values (22,'Разработка веб-сайтов для мобильных устройств',448,2013,'978-5-496-00610-1',3);
insert into Book (id,title,pages,year,isbn,publisher_id) values (23,'Паттерны проектирования',656,2011,'978-5-4461-0106-1, 978-0596007126',3);


insert into Book_Genre (book_id,genre_id) values (1,1);
insert into Book_Genre (book_id,genre_id) values (1,9);
insert into Book_Genre (book_id,genre_id) values (2,2);
insert into Book_Genre (book_id,genre_id) values (2,1); 
insert into Book_Genre (book_id,genre_id) values (3,1);
insert into Book_Genre (book_id,genre_id) values (4,2);
insert into Book_Genre (book_id,genre_id) values (4,1); 
insert into Book_Genre (book_id,genre_id) values (5,1); 
insert into Book_Genre (book_id,genre_id) values (5,9);
insert into Book_Genre (book_id,genre_id) values (6,1);
insert into Book_Genre (book_id,genre_id) values (7,1); 
insert into Book_Genre (book_id,genre_id) values (7,10);
insert into Book_Genre (book_id,genre_id) values (8,2);
insert into Book_Genre (book_id,genre_id) values (8,1);
insert into Book_Genre (book_id,genre_id) values (9,1);
insert into Book_Genre (book_id,genre_id) values (9,4);
insert into Book_Genre (book_id,genre_id) values (10,1);
insert into Book_Genre (book_id,genre_id) values (10,9);
insert into Book_Genre (book_id,genre_id) values (11,1);
insert into Book_Genre (book_id,genre_id) values (11,9);
insert into Book_Genre (book_id,genre_id) values (12,1);
insert into Book_Genre (book_id,genre_id) values (12,1);
insert into Book_Genre (book_id,genre_id) values (13,3);
insert into Book_Genre (book_id,genre_id) values (13,1);
insert into Book_Genre (book_id,genre_id) values (14,2);
insert into Book_Genre (book_id,genre_id) values (15,1);
insert into Book_Genre (book_id,genre_id) values (15,11);
insert into Book_Genre (book_id,genre_id) values (15,12);
insert into Book_Genre (book_id,genre_id) values (16,8);
insert into Book_Genre (book_id,genre_id) values (17,1);
insert into Book_Genre (book_id,genre_id) values (17,9);
insert into Book_Genre (book_id,genre_id) values (18,3);
insert into Book_Genre (book_id,genre_id) values (19,3);
insert into Book_Genre (book_id,genre_id) values (19,5);
insert into Book_Genre (book_id,genre_id) values (20,6);
insert into Book_Genre (book_id,genre_id) values (21,7);
insert into Book_Genre (book_id,genre_id) values (22,1);
insert into Book_Genre (book_id,genre_id) values (22,3);
insert into Book_Genre (book_id,genre_id) values (23,1);


insert into Book_Author (book_id,author_id) values (1,1);
insert into Book_Author (book_id,author_id) values (1,2);
insert into Book_Author (book_id,author_id) values (2,2);
insert into Book_Author (book_id,author_id) values (2,28);
insert into Book_Author (book_id,author_id) values (3,1);
insert into Book_Author (book_id,author_id) values (3,6);
insert into Book_Author (book_id,author_id) values (3,21); 
insert into Book_Author (book_id,author_id) values (3,32);
insert into Book_Author (book_id,author_id) values (3,26);
insert into Book_Author (book_id,author_id) values (3,27);
insert into Book_Author (book_id,author_id) values (4,1);
insert into Book_Author (book_id,author_id) values (4,6);
insert into Book_Author (book_id,author_id) values (4,21);
insert into Book_Author (book_id,author_id) values (4,32);
insert into Book_Author (book_id,author_id) values (4,26);
insert into Book_Author (book_id,author_id) values (4,27);
insert into Book_Author (book_id,author_id) values (5,1);
insert into Book_Author (book_id,author_id) values (6,1);
insert into Book_Author (book_id,author_id) values (7,1);
insert into Book_Author (book_id,author_id) values (7,17); 
insert into Book_Author (book_id,author_id) values (7,9);
insert into Book_Author (book_id,author_id) values (7,31); 
insert into Book_Author (book_id,author_id) values (7,13);
insert into Book_Author (book_id,author_id) values (8,17);
insert into Book_Author (book_id,author_id) values (9,37);
insert into Book_Author (book_id,author_id) values (9,24);
insert into Book_Author (book_id,author_id) values (9,23);
insert into Book_Author (book_id,author_id) values (9,10);
insert into Book_Author (book_id,author_id) values (10,25);
insert into Book_Author (book_id,author_id) values (11,22);
insert into Book_Author (book_id,author_id) values (11,11);
insert into Book_Author (book_id,author_id) values (11,25);
insert into Book_Author (book_id,author_id) values (11,16);
insert into Book_Author (book_id,author_id) values (12,25);
insert into Book_Author (book_id,author_id) values (13,29);
insert into Book_Author (book_id,author_id) values (13,3);
insert into Book_Author (book_id,author_id) values (14,14);
insert into Book_Author (book_id,author_id) values (14,38);
insert into Book_Author (book_id,author_id) values (14,20);
insert into Book_Author (book_id,author_id) values (15,30);
insert into Book_Author (book_id,author_id) values (16,18);
insert into Book_Author (book_id,author_id) values (16,4);
insert into Book_Author (book_id,author_id) values (17,5);
insert into Book_Author (book_id,author_id) values (18,34);
insert into Book_Author (book_id,author_id) values (18,36);
insert into Book_Author (book_id,author_id) values (19,36);
insert into Book_Author (book_id,author_id) values (19,33);
insert into Book_Author (book_id,author_id) values (20,15);
insert into Book_Author (book_id,author_id) values (20,12);
insert into Book_Author (book_id,author_id) values (21,35);
insert into Book_Author (book_id,author_id) values (21,8);
insert into Book_Author (book_id,author_id) values (22,19);
insert into Book_Author (book_id,author_id) values (22,7);
insert into Book_Author (book_id,author_id) values (23,34);
insert into Book_Author (book_id,author_id) values (23,36);
insert into Book_Author (book_id,author_id) values (23,18);
insert into Book_Author (book_id,author_id) values (23,4);


