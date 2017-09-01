USE cs47944;

--Login table

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `id`	VARCHAR(20)	 NOT NULL,
  `password`	VARCHAR(64)	NOT NULL DEFAULT '',
  `team`  INT NOT NULL,
  `last_login`	TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `created`	TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `modified`	TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `modified_by` VARCHAR(20)	NOT NULL DEFAULT 'admin',
  `is_active`   CHAR  		NOT NULL DEFAULT 'Y',
  `status`   	VARCHAR(20) 	NOT NULL DEFAULT 'offline',
   PRIMARY KEY (`id`)
) ;

INSERT INTO `login` (id,password,team,modified_by) VALUES ('admin','admin','1','');
INSERT INTO `login` (id,password,team,modified_by) VALUES ('em_0001','password','3','');
INSERT INTO `login` (id,password,team,modified_by) VALUES ('us_0001','password','2','');

--USER table
DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `id`	VARCHAR(20)	 NOT NULL,
  `first_name`	VARCHAR(64)	NOT NULL DEFAULT '',
  `last_name`	VARCHAR(64)	NOT NULL DEFAULT '',
  `role` 	VARCHAR(20)	NOT NULL DEFAULT '',/*admin,technician,user*/
  `team`	INT		NOT NULL,
  `email`	VARCHAR(40)	NOT NULL,
  `created_time`	TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `created_by` VARCHAR(20)	NOT NULL DEFAULT 'admin',
  `modified_time`	TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `modified_by` VARCHAR(20)	NOT NULL DEFAULT 'admin',
   PRIMARY KEY (`id`)
) ;

ALTER TABLE `employee` 
ADD `mobile_num` INT(10) NOT NULL DEFAULT 0,
ADD `technology` VARCHAR(20) NOT NULL DEFAULT 'chc';

ALTER TABLE `employee`
ALTER COLUMN `mobile_num` NVARCHAR(15);

INSERT INTO `employee` (id,first_name,last_name,role,team,email) VALUES ('admin','Rahul','Adi','admin',1,'admin@itdesk.com');
INSERT INTO `employee` (id,first_name,last_name,role,team,email) VALUES ('em_0001','Raghu','Uppu','technician',3,'ragu1@itdesk.com');
INSERT INTO `employee` (id,first_name,last_name,role,team,email) VALUES ('us_0001','Raju','Maya','user',2,'raju@itdesk.com');

select max(id) from employee;

--Team table
DROP TABLE IF EXISTS `team`;

CREATE TABLE `team` (
  `id`          INT UNSIGNED NOT NULL,
  `name`	VARCHAR(20)	 NOT NULL,
  `rep`		VARCHAR(15)	NOT NULL DEFAULT ''
  ) ;

INSERT INTO `team` (id,name,rep) VALUES (1,'Admin','admin');
INSERT INTO `team` (id,name,rep) VALUES (2,'User','us');
INSERT INTO `team` (id,name,rep) VALUES (3,'Email','em');
INSERT INTO `team` (id,name,rep) VALUES (4,'Network','nw');
INSERT INTO `team` (id,name,rep) VALUES (5,'Desktop','ds');

--ISSUES table
DROP TABLE IF EXISTS `issue`;

CREATE TABLE `issue` (
  `id`          INT UNSIGNED NOT NULL,
  `team`	INT NOT NULL,
  `problem`	VARCHAR(30)	NOT NULL DEFAULT ''
  ) ;

INSERT INTO `issue` (id,team,problem) VALUES (1,3,'login');
INSERT INTO `issue` (id,team,problem) VALUES (2,3,'space');
INSERT INTO `issue` (id,team,problem) VALUES (3,3,'group-add');
INSERT INTO `issue` (id,team,problem) VALUES (4,3,'delivery');
INSERT INTO `issue` (id,team,problem) VALUES (5,4,'connection');
INSERT INTO `issue` (id,team,problem) VALUES (6,4,'login');
INSERT INTO `issue` (id,team,problem) VALUES (7,5,'instalation');
INSERT INTO `issue` (id,team,problem) VALUES (8,5,'space');
INSERT INTO `issue` (id,team,problem) VALUES (9,5,'RAM');

--Ticket_status table

DROP TABLE IF EXISTS `ticket_status`;

 CREATE TABLE `ticket_status` (
  `id` int(10) unsigned NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT ''
) ;

INSERT INTO `ticket_status`(id,status) VALUES (1,'open');
INSERT INTO `ticket_status`(id,status) VALUES (2,'work inprogress');
INSERT INTO `ticket_status`(id,status) VALUES (3,'reassign');
INSERT INTO `ticket_status`(id,status) VALUES (4,'clarification');
INSERT INTO `ticket_status`(id,status) VALUES (5,'review');
INSERT INTO `ticket_status`(id,status) VALUES (6,'Completed');
INSERT INTO `ticket_status`(id,status) VALUES (7,'reopened');

--Ticket table

DROP TABLE IF EXISTS `ticket`;

CREATE TABLE `ticket` (
  `id`	VARCHAR(20)	 NOT NULL,
  `user_id`	VARCHAR(20)	NOT NULL DEFAULT '',
  `assigned_to`	VARCHAR(20)	NOT NULL DEFAULT '',
  `team_id`	INT		NOT NULL,
  `issue_id`	INT		NOT NULL,  
  `subject`	TEXT 		NOT NULL DEFAULT '',
  `description` TEXT 		NOT NULL DEFAULT '',
  `status`	INT		NOT NULL DEFAULT 1,
  `reassigned`  CHAR 		NOT NULL DEFAULT 'N',
  `reopened`    CHAR 		NOT NULL DEFAULT 'N',
  `created_time`	TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `modified_time`	TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `modified_by` VARCHAR(20)	NOT NULL DEFAULT '',
  `chat_id`     VARCHAR(30),
   PRIMARY KEY (`id`)
);

INSERT INTO `ticket` (id,user_id,assigned_to,team_id,issue_id,subject,chat_id) VALUES ('T_00001','us_0001','em_0001',3,1,'cant login to email','ct_000001');
INSERT INTO `ticket` (id,user_id,assigned_to,team_id,issue_id,subject,chat_id) VALUES ('T_00002','us_0001','em_0001',3,4,'delivery problem','ct_000002');


--CHAT table

DROP TABLE IF EXISTS `chat`;


CREATE TABLE `chat` (
  `id`	VARCHAR(20)	 NOT NULL,
  `sender_id`	VARCHAR(20)	NOT NULL DEFAULT '',
  `reciever_id`	VARCHAR(20)	NOT NULL DEFAULT '',
  `message`	INT		NOT NULL,
  `created_time`	TIMESTAMP DEFAULT CURRENT_TIMESTAMP

  
);


INSERT INTO `chat`(id,sender_id,reciever_id,message) VALUES ('ct_000001','us_0001','em_0001','Hello');
INSERT INTO `chat`(id,sender_id,reciever_id,message) VALUES ('ct_000001','em_0001','us_0001','Hello,How can I help you');


CREATE TABLE `comment` (
  `ticket_id`	VARCHAR(20)	 NOT NULL,
  `sender_id`	VARCHAR(20)	NOT NULL DEFAULT '',
  `message`	TEXT		NOT NULL,
  `created_time`	TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO `comment`(ticket_id,sender_id,message) VALUES ('T_00001','us_0001','Hello');
INSERT INTO `comment`(ticket_id,sender_id,message) VALUES ('T_00001','em_0001','Hello,How can I help you');












