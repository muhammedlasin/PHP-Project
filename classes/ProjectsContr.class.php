<?php



class ProjectsContr extends Projects{


    public function createProjects($project_name, $project_code, $project_description, $client_name, $team_lead_id, $created_by, $updated_by){

        $this->setProjectStmt($project_name, $project_code, $project_description, $client_name, $team_lead_id, $created_by, $updated_by);

    }

    public function deleteProjects($project_id){

        $this->setdeleteStmt($project_id);

    }

    public function deleteTasks($project_id){

        $this->setdeleteTaskStmt($project_id);

    }


    public function setProjectCode($project_code, $latestpid){

        $this->updateProjectCode($project_code, $latestpid);

    }


    public function updateLead($team_lead_id, $project_id){
        $this->changeLead($team_lead_id, $project_id );
    }

    public function updateDescription($updatedDescription, $pid){
        $this->changeDescription($updatedDescription, $pid);
    }

    public function updateHeading($updatedHeading, $pid){
        $this->changeHeading($updatedHeading, $pid);
    }


}