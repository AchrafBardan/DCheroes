<?php
    class HeroeController {

        public function __construct()
        {
            $this->database = new Database;;
        }

        public function getAllHeroes()
        {

            $response = $this->database->query('SELECT * FROM heroes')->fetch_all();

            return $response;
        }

        public function getHeroeById($id)
        {
            $response = $this->database->query("SELECT * FROM heroes WHERE id='$id';")->fetch_row();

            return $response;
        }

        public function getPowersByHeroeId($id)
        {
            $response = $this->database->query("SELECT * FROM powers WHERE heroe_id='$id';")->fetch_all();

            return $response;
        }

        public function getHeroesByTeamId($id)
        {
            $response = $this->database->query("SELECT * FROM heroes WHERE team_id='$id'")->fetch_all();

            return $response;
        }

        public function getHeroeByName($q)
        {
            $response = $this->database->query("SELECT * FROM heroes WHERE name LIKE '%{$q}%';")->fetch_all();

            return $response;
        }

    }
