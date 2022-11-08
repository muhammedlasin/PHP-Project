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
}