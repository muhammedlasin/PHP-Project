<?php


class Projects extends Dbh
{


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

              $sql = "SELECT Projects.project_name, Projects.project_id, Projects.project_code, Projects.client_name, Projects.team_lead_id, Tasks.developer_id
              FROM Projects
              INNER JOIN Tasks ON Projects.project_id=Tasks.project_id where developer_id=?";

              $stmt = $this->connect()->prepare($sql);

              $stmt->execute([$developer_id]);

              $row = $stmt->fetchAll();

              return $row;

       }





       protected function setProjectStmt($project_name, $project_code, $project_description, $client_name, $team_lead_id, $created_by, $updated_by)
       {

              $sql = "INSERT INTO Projects(project_name, project_code, project_description, client_name, team_lead_id, created_by, updated_by) VALUES (?,?,?,?,?,?,?)";

              $stmt = $this->connect()->prepare($sql);

              $stmt->execute([$project_name, $project_code, $project_description, $client_name, $team_lead_id, $created_by, $updated_by]);

       }

       protected function getProjectId()
       {

              $sql = "select project_id from Projects
              order by project_id desc
              limit 1";

              $stmt = $this->connect()->prepare($sql);

              $stmt->execute();

              $row = $stmt->fetchAll();

              return $row;


       }

       protected function updateProjectCode($project_code, $latestpid)
       {

              $sql = "UPDATE Projects
              SET project_code = ?
              WHERE project_id = ?";

              $stmt = $this->connect()->prepare($sql);

              $stmt->execute([$project_code, $latestpid]);

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


       protected function changeLead($team_lead_id, $project_id)
       {

              $sql = "UPDATE Projects
              SET team_lead_id = ?
              WHERE project_id = ?";

              $stmt = $this->connect()->prepare($sql);

              $stmt->execute([$team_lead_id, $project_id]);
       }


       protected function changeDescription($updatedDescription, $pid)
       {

              $sql = "UPDATE Projects
              SET project_description=?
              WHERE project_id =?";

              $stmt = $this->connect()->prepare($sql);

              $stmt->execute([$updatedDescription, $pid]);

       }


       protected function changeHeading($updatedHeading, $pid)
       {

              $sql = "UPDATE Projects
              SET project_name=?
              WHERE project_id =?";

              $stmt = $this->connect()->prepare($sql);

              $stmt->execute([$updatedHeading, $pid]);

       }


       protected function checkProjectName($project_name)
       {

              $sql = "SELECT project_name FROM Projects WHERE project_name=?";
              $stmt = $this->connect()->prepare($sql);
              $stmt->execute([$project_name]);
              $result = $stmt->fetchAll();
              $resultCheck = '';
              if (empty($result)) {
                     $resultCheck = false;
              } else {
                     $resultCheck = true;
              }
              return $resultCheck;
       }

       protected function fetchLatestProjectsOfLead($team_lead_id, $limit)
       {

              $sql = "SELECT * FROM Projects WHERE team_lead_id =?
              ORDER BY updated_at DESC LIMIT $limit";


              $stmt = $this->connect()->prepare($sql);
              $stmt->execute([$team_lead_id]);

              $result = $stmt->fetchAll();

              return $result;

       }

       // get latest projects when tasks get updated in the project.
       protected function fetchLatestProjectsOfAdmin($project_id)
       {

              $sql = "SELECT * FROM Projects WHERE project_id=?";
              $stmt = $this->connect()->prepare($sql);
              $stmt->execute([$project_id]);
              $result = $stmt->fetchAll();

              return $result;

       }

       // get latest projects when project get updated.
       protected function fetchAllLatestProjectsOfAdmin($limit)
       {

              $sql = "SELECT * FROM Projects 
              ORDER BY updated_at DESC LIMIT $limit";
              $stmt = $this->connect()->prepare($sql);
              $stmt->execute([]);
              $result = $stmt->fetchAll();

              return $result;

       }

       protected function fetchLatestProjectsTaskOfLead($team_lead_id, $project_id)
       {

              $sql = "SELECT * FROM Projects WHERE team_lead_id =? AND project_id=?";
              $stmt = $this->connect()->prepare($sql);
              $stmt->execute([$team_lead_id, $project_id]);
              $result = $stmt->fetchAll();

              return $result;

       }





}