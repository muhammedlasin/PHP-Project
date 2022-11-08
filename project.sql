CREATE TABLE Users (
  users_id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  users_name varchar(64) NOT NULL,
  email varchar(255) NOT NULL UNIQUE,
  users_role varchar(128) NOT NULL,
  password_hashed varchar(64) NOT NULL,
  remember_pwd int NOT NULL,
  created_at timestamp DEFAULT CURRENT_TIMESTAMP ,
  updated_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  created_by int NOT NULL,
  updated_by int NOT NULL
);

