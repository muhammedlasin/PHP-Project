<?php


class ProjectsView extends Projects
{


    public function showProjects($team_lead_id)
    {
        $results = $this->getProjectStmt($team_lead_id);
        return $results;
    }

    public function showAllProjects()
    {
        $results = $this->getAllProjects();
        return $results;
    }

    public function showDevProjects($developer_id)
    {
        $results = $this->getDevProjects($developer_id);
        return $results;
    }

    public function showProjectDetails($project_id)
    {
        $results = $this->getProjectDetailStmt($project_id);
        return $results;
    }


    public function getLatestProjectId()
    {
        $results = $this->getProjectId();
        return $results;
    }


    public function getLatestProjectsOfLead($team_lead_id, $limit)
    {
        $results = $this->fetchLatestProjectsOfLead($team_lead_id, $limit);

        return $results;

    }

    public function getLatestProjectsOfAdmin($project_id)
    {
        $results = $this->fetchLatestProjectsOfAdmin($project_id);

        return $results;

    }

    public function getAllLatestProjectsOfAdmin($limit)
    {
        $results = $this->fetchAllLatestProjectsOfAdmin($limit);

        return $results;

    }

    function getLatestProjectsTaskOfLead($team_lead_id, $project_id)
    {
        $results = $this->fetchLatestProjectsTaskOfLead($team_lead_id, $project_id);
        return $results;
    }

}