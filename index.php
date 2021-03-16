<?php

include './autoload.php';

$team = new TeamController;
$heroe = new HeroeController;
$review = new ReviewController;

//echo json_encode($team->getTeamById(1));
//echo json_encode($heroe->getAllHeroes());
//echo json_encode($heroe->getHeroeById(1));
//echo json_encode($heroe->getHeroesByTeamId(1));
//echo json_encode($heroe->getHeroeByName('flash'));
//echo json_encode($review->getAverageRatingForHeroeById(1));
echo json_encode($review->createReviewHeroe(1,5));


?>
