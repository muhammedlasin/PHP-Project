<?php

class TasksView extends Tasks {
    public function viewAllTasks($currentUserRole, $currentUserId, $projectId) {

        if($currentUserRole === 'developer') {
            return $this->getTasksForDeveloper($currentUserId, $projectId);
        }

        else {
            return $this->getTasksForAdminOrTeamLead($projectId);
        }
    }
}