CREATE DATABASE `funchat`;

USE `funchat`;

CREATE TABLE `users` (
	`id` int auto_increment,
	`fname` varchar(64),
	`lname` varchar(64),
	`username` varchar(15),
	`email` varchar(256),
	`password` varchar(255),
	`signupdate` timestamp,
	`active` tinyint(1),
	primary key(id)
);

CREATE TABLE `messages` (
	`message_id` int unsigned not null ,
	`creator_id` int,
	`message` text,
	`date` timestamp,
	primary key (message_id)
);

CREATE TABLE `message_recipient` (
	`id` int unsigned not null auto_increment,
	`recipient_id` int unsigned,
	`message_id` int unsigned,
	primary key (id)
);



/* Does Robert have any messages */
SELECT COUNT(*) `message_count`
FROM `message_recipient`
WHERE `recipient_id` = 1;

/* Get all of Robert's conversations/messages */
SELECT m.message, m.creator_id, mr.recipient, m.date
FROM `messages` m INNER JOIN `message_recipient` mr
	ON m.message_id = mr.message_id
WHERE mr.recipient = 1 OR m.creator_id = 1;

/* Get conversation between Robert and Maurice */
SELECT m.message, m.creator_id, mr.recipient, m.date
FROM `messages` m  INNER JOIN `message_recipient` mr
	ON m.message_id = mr.message_id
WHERE (m.creator_id = 1 AND mr.recipient = 2)
OR (m.creator_id = 2 AND mr.recipient = 1);


/* Get most recent conversation to create snippet*/
SELECT m.message, m.creator_id, mr.recipient, m.date
FROM `messages` m  INNER JOIN `message_recipient` mr
	ON m.message_id = mr.message_id
WHERE (m.creator_id = 1 AND mr.recipient = 2)
OR (m.creator_id = 2 AND mr.recipient = 1)
ORDER BY m.date DESC
LIMIT 1;