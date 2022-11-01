


CREATE TABLE Users (
  users_id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  users_name varchar(64) NOT NULL,
  email varchar(255) NOT NULL UNIQUE,
  users_role varchar(128) NOT NULL,
  password_hashed varchar(64) NOT NULL,
  remember_pwd boolean NOT NULL,
  created_at timestamp DEFAULT CURRENT_TIMESTAMP ,
  updated_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  created_by varchar(64) NOT NULL,
  updated_by varchar(64) NOT NULL
);


CREATE TABLE Projects  (
    project_id INT NOT NULL AUTO_INCREMENT,
    project_name VARCHAR(128) NOT NULL,
    project_code VARCHAR(64) NOT NULL,
    project_description TEXT NOT NULL,
    client_name VARCHAR(128) NOT NULL,
    team_lead_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created_by INT NOT NULL,
    updated_by INT NOT NULL,
    PRIMARY KEY (project_id),
    FOREIGN KEY(team_lead_id) REFERENCES Users(users_id)
);



CREATE TABLE Tasks (
   task_id INT NOT NULL AUTO_INCREMENT,
   project_id INT NOT NULL, 
   task_name VARCHAR(255) NOT NULL, 
   task_description TEXT NOT NULL, 
   task_status VARCHAR(64) NOT NULL DEFAULT 'Open',
   developer_id INT NOT NULL, 
   task_priority VARCHAR(64) NOT NULL DEFAULT 'Low',
   created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
   updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   created_by VARCHAR(64) NOT NULL,
   updated_by VARCHAR(64) NOT NULL,
   PRIMARY KEY (task_id),
   FOREIGN KEY(project_id) REFERENCES Projects(project_id)
);



CREATE TABLE Comments (
  comment_id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  task_id int NOT NULL,
  content text NOT NULL,
  users_id int NOT NULL,
  FOREIGN KEY (task_id) REFERENCES Tasks(task_id),
  created_at date NOT NULL,
  updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE Attachments (
	attachment_id INT NOT NULL ,
    PRIMARY KEY (attachment_id),
	attachment_file VARCHAR(255) NOT NULL
);

CREATE TABLE Attachment_task (
	attachment_task_id INT NOT NULL ,
    PRIMARY KEY (attachment_task_id),
	task_id INT NOT NULL ,
	attachment_id INT  NOT NULL ,
    FOREIGN KEY (task_id) REFERENCES Tasks (task_id) ,
    FOREIGN KEY (attachment_id) REFERENCES Attachments (attachment_id)
    
);
