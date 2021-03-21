<?php

class ReviewController{
    public function __construct()
    {
        $this->database = new Database;;
    }

    public function getAverageRatingForHeroeById($id)
    {
        $response = $this->database->query("SELECT * FROM reviews WHERE heroe_id='$id';")->fetch_all();


        $count = 0;
        $total = 0;
        foreach ($response as $review) {
            $count++;
            $total += $review[1];
        }
        
        return round($total / $count);
    }

    public function createReviewHeroe($id, $stars)
    {
        $response = $this->database->query("INSERT INTO reviews (stars, heroe_id) VALUES ('$stars', '$id');");

        return $response;
    }
}