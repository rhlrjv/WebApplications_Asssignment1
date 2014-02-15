-- Dropping and creating task table
DROP TABLE task;
CREATE TABLE task (
	id integer PRIMARY KEY NOT NULL,
	taskname VARCHAR(20) NOT NULL,
	totalhrs integer,
	completedhrs integer,
	important boolean,
	username VARCHAR(20) NOT NULL;
);

-- Adding rows to task table
INSERT INTO task (id, taskname, totalhrs, completedhrs, important, username) VALUES(1,'Buy groceries',1, 0, 1,'sham');
INSERT INTO task (id, taskname, totalhrs, completedhrs, important, username) VALUES(2,'Read Case in Point',10, 1, 1,'sham');
INSERT INTO task (id, taskname, totalhrs, completedhrs, important, username) VALUES(3,'Go for a jog',1, 0, 0,'sham');
INSERT INTO task (id, taskname, totalhrs, completedhrs, important, username) VALUES(4,'Train for marathon',20, 2, 1,'rahul');


-- Dropping and creating users table
DROP TABLE users;
CREATE TABLE users (
	username VARCHAR(20) PRIMARY KEY NOT NULL,
	password VARCHAR(20) NOT NULL;
	
);

-- Adding rows to users table
INSERT INTO users (username, password) VALUES('sham','spass');
INSERT INTO users (username, password) VALUES('rahul','rpass');