<?php

class Attachments extends Tasks {
    protected function insertAttachmentsModel($arrayOfFilePath, $taskId) {
        foreach ($arrayOfFilePath as $val) {
            $sql = "INSERT INTO Attachments (task_id,attachment_file) VALUES (?,?);";

            $stmt = $this->connect()->prepare($sql);

            $stmt->execute([$taskId, $val]);
        }
    }

    protected function insertToAttachmentTaskTableModel($arrayOfAttachmentId, $taskId) {
        foreach ($arrayOfAttachmentId as $val) {
            $sql = "INSERT INTO Attachments_task (task_id, attachment_id) VALUES (?, ?);";

            $stmt = $this->connect()->prepare($sql);

            $stmt->execute([$taskId, $val]);
        }
    }

    protected function getAttachmentsFromTaskIdModel($taskId) {
        //for a given task id, we need to fetch all the attachment ids from the attachment-task table. Then from the attachments table
        //we fetch the attachment files corresponding to the attachment id. 

        $sql = "SELECT attachment_file from Attachments WHERE task_id = ?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$taskId]);  
        
        return $stmt->fetchAll();
        
    }

    protected function fetchFilesUsingAttachmentIdModel($attachmentIdArray) {
        $listOfFiles = array();
        foreach ($attachmentIdArray as $val) {
            $sql = "SELECT attachment_file FROM Attachments WHERE attachment_id = ?;";

            $stmt = $this->connect()->prepare($sql);

            $stmt->execute([$val]);

            $row = $stmt->fetchAll();

            array_push($listOfFiles, $row);
        }

        return $listOfFiles;
    }

    protected function deleteAttachmentsModel($taskId) {
        $sql = "DELETE FROM Attachments WHERE task_id = ?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$taskId]);
    }

}