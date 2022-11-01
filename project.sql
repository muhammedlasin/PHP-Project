CREATE TABLE Users (
  user_id int PRIMARY KEY NOT NULL,
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
  comment_id int PRIMARY KEY NOT NULL,
  task_id int NOT NULL,
  content text NOT NULL,
  user_id int NOT NULL,
  FOREIGN KEY (task_id) REFERENCES TASKS(task_id),
  created_at date NOT NULL,
  updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);