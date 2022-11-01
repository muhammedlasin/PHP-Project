
CREATE TABLE TASKS (
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





