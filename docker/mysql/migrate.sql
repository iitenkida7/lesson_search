CREATE TABLE
IF NOT EXISTS aggregations
(id int AUTO_INCREMENT NOT NULL PRIMARY KEY);

CREATE TABLE
IF NOT EXISTS words
(id INT AUTO_INCREMENT PRIMARY KEY,
     aggregations_id int NOT NULL,
     word varchar(10) NOT NULL,
     FOREIGN KEY aggregations_id (aggregations_id) REFERENCES aggregations (id),
     INDEX(word));

/*
データが増えてきたらこれが使えるかも。
https://qiita.com/yaiwase/items/4eef105c95c7c1388078
*/