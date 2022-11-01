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




