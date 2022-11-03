<?php

class ProjectsView extends Projects{

    public function showProjects($team_lead_id){
        $results = $this->getProjectStmt($team_lead_id);
        return $results;
    }

    public function showAllProjects(){
        $results = $this->getAllProjects();
        return $results;
    }

    public function showDevProjects($developer_id){
        $results = $this->getDevProjects($developer_id);
        return $results;
    }

    public function showProjectDetails($project_id){
        $results = $this->getProjectDetailStmt($project_id);
        return $results;
    }

}