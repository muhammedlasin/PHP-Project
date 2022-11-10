<?php

class AttachmentsContr extends Attachments {
    public function getAttachmentsFromTaskId($taskId) {
        return $this->getAttachmentsFromTaskIdModel($taskId);
    }

    public function insertAttachments($arrayOfFilePath, $taskId) {
        $this->insertAttachmentsModel($arrayOfFilePath, $taskId);
    }

    public function fetchFilesUsingAttachmentId($attachmentIdArray) {
        return $this->fetchFilesUsingAttachmentIdModel($attachmentIdArray);
    }

    public function deleteAttachments($taskId) {
        $this->deleteAttachmentsModel($taskId);
    }

    public function delteAttachmentById($attachmentId) {
        $this->deleteAttachmentByIdModel($attachmentId);
    }
}