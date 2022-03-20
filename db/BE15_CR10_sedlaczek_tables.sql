DROP TABLE media;

CREATE TABLE media (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  type ENUM ('Paperback', 'Hardcover', 'Audiobook', 'eBook', 'eAudio', 'CD', 'DVD', 'CD-ROM', 'Magazine'),
  ISBN VARCHAR(13),
  title VARCHAR(50),
  subtitle VARCHAR(50),
  series VARCHAR(50),
  part INT(3),
  author_first_name VARCHAR(35),
  author_last_name VARCHAR(35),
  publisher_name VARCHAR(50),
  publisher_city VARCHAR(45),
  edition_date DATE,
  edition_year YEAR,
  publish_year YEAR,
  pages INT(6),
  length TIME,
  version ENUM('Unabridged', 'Abridged', 'Adapted'),
  narrator VARCHAR(50),
  genre SET('Fiction', 'Children', 'Middle Grade', 'Young Adult', 'Fantasy', 'Adventure', 'Magic', 'Coming of Age', 'Asian', 'Folklore', 'Nonfiction', 'Psychology', 'Memoir', 'Animals', 'Self Help', 'Programming'),
  language ENUM('English','French','German','Spanish','Irish'),
  description VARCHAR(50),
  image VARCHAR(17),
  status ENUM ('Available', 'Borrowed', 'In Transit', 'Reserved', 'Missing') DEFAULT 'Available',
  due_date DATE
);