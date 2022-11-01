
CREATE TABLE Attachment_task (
	attachment_task_id (INT) NOT NULL PRIMARY KEY,
	task_id (INT) NOT NULL FOREIGN KEY,
	attachment_id (INT)  NOT NULL FOREIGN KEY
);

CREATE TABLE Attachments (
	attachment_id (INT NOT NULL PRIMARY KEY,
	attachment_file (VARCHAR(255) NOT NULL
);

CREATE TABLE Users (
  user_id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name varchar(64) NOT NULL DEFAULT,
  email varchar(255) NOT NULL UNIQUE,
  role varchar(128) NOT NULL,
  password_hashed varchar(64) NOT NULL,
  remember_pwd bool NOT NULL,
  created_at timestamp DEFAULT CURRENT_TIMESTAMP ,
  updated_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  created_by varchar(64) NOT NULL,
  updated_by varchar(64) NOT NULL
);

CREATE TABLE Comments (
  comment_id int PRIMARY KEY NOT NULL AUTO_INCREMNET,
  task_id int NOT NULL,
  content text NOT NULL,
  user_id int NOT NULL,
  FOREIGN KEY (task_id) REFERENCES TASKS(task_id),
  created_at date NOT NULL,
  updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE Tasks (
   task_id INT NOT NULL AUTO_INCREMENT,
   project_id INT, NOT NULL, 
   task_name VARCHAR(255) NOT NULL, 
   task_description TEXT NOT NULL, 
   status VARCHAR(64) NOT NULL DEFAULT 'Open',
   developer_id INT NOT NULL, 
   priority VARCHAR(64) NOT NULL DEFAULT 'Low',
   created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
   updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   created_by VARCHAR(64) NOT NULL,
   updated_by VARCHAR(64) NOT NULL,
   PRIMARY KEY (task_id),
   FOREIGN KEY(project_id) REFERENCES PROJECTS(project_id)
);


CREATE TABLE Projects  (
    project_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(128) NOT NULL,
    project_code VARCHAR(64) NOT NULL,
    project_description TEXT NOT NULL,
    client_name VARCHAR(128) NOT NULL,
    team_lead_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created_by INT NOT NULL,
    updated_by INT NOT NULL  
);

