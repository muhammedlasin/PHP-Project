CREATE TABLE attachment-task (
	attachment_task_id (INT) NOT NULL PRIMARY KEY,
	task_id (INT) NOT NULL FOREIGN KEY,
	attachment_id (INT)  NOT NULL FOREIGN KEY
);

CREATE TABLE attachments (
	attachment_id (INT NOT NULL PRIMARY KEY,
	attachment_file (VARCHAR(255) NOT NULL
);
