<?php
    class TeamController{
        public function __construct()
        {
            $this->database = new Database;;
        }
        

        public function getAllTeams()
        {
            $response = $this->database->query('SELECT * FROM teams ;')->fetch_all();

            return $response;
        }

        public function getTeamById($id)
        {
            $response = $this->database->query("SELECT * FROM teams WHERE id='$id';")->fetch_row();

            return $response;
        }
    }