<?php

class Projects extends Dbh
{
    public function getProjectId()
    {
    }

    protected function getAllProjects()
    {

        $sql = "SELECT * FROM Projects;";

        $stmt = $this->connect()->query($sql);

        $stmt->execute();

        $row = $stmt->fetchAll();

        return $row;
    }



    protected function getProjectStmt($team_lead_id)
    {

        $sql = "SELECT * FROM Projects WHERE team_lead_id=?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$team_lead_id]);

        $names = $stmt->fetchAll();

        return $names;
    }


    protected function getDevProjects($developer_id)
    {

        $sql = "SELECT Projects.project_name, Projects.project_code, Projects.client_name, Projects.team_lead_id, Tasks.developer_id
        FROM Projects
        INNER JOIN Tasks ON Projects.project_id=Tasks.project_id";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute();

        $row = $stmt->fetchAll();

        return $row;
    }





    protected function setProjectStmt($project_name, $project_code, $project_description, $client_name, $team_lead_id, $created_by, $updated_by)
    {

        $sql = "INSERT INTO Projects(project_name, project_code, project_description, client_name, team_lead_id, created_by, updated_by) VALUES (?,?,?,?,?,?,?)";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$project_name, $project_code, $project_description, $client_name, $team_lead_id, $created_by, $updated_by]);
    }



    protected function setdeleteTaskStmt($project_id)
    {

        $sql = "DELETE FROM Tasks WHERE project_id=?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$project_id]);
    }

    protected function setdeleteStmt($project_id)
    {

        $sql = "DELETE FROM Projects WHERE project_id=?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$project_id]);
    }


    protected function getProjectDetailStmt($project_id)
    {

        $sql = "SELECT project_name, project_description, team_lead_id FROM Projects WHERE project_id=?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$project_id]);

        $names = $stmt->fetchAll();

        return $names;
    }
}
