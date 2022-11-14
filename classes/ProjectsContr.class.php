<?php



class ProjectsContr extends Projects
{


    public function createProjects($project_name, $project_code, $project_description, $client_name, $team_lead_id, $created_by, $updated_by)
    {
        if ($this->emptyInput($project_name, $project_description, $client_name) == false) {
            header("location: ../createProject.php?error=emptyinput");
            exit();
        }

        if ($this->checkProjectName($project_name) == true) {
            header("location: ../createProject.php?error=projectNameTaken");
            exit();
        }

        $this->setProjectStmt($project_name, $project_code, $project_description, $client_name, $team_lead_id, $created_by, $updated_by);

    }

    public function deleteProjects($project_id)
    {

        $this->setdeleteStmt($project_id);

    }

    public function deleteTasks($project_id)
    {

        $this->setdeleteTaskStmt($project_id);

    }


    public function setProjectCode($project_code, $latestpid)
    {

        $this->updateProjectCode($project_code, $latestpid);

    }


    public function updateLead($team_lead_id, $project_id)
    {
        $this->changeLead($team_lead_id, $project_id);
    }

    public function updateDescription($updatedDescription, $pid)
    {
        $this->changeDescription($updatedDescription, $pid);
    }

    public function updateHeading($updatedHeading, $pid)
    {
        $this->changeHeading($updatedHeading, $pid);
    }
    private function emptyInput($project_name, $description, $client_name)
    {
        $result = '';
        if (empty($project_name) || empty($description) || empty($client_name)) {

            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }


}