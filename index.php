<?php

include './autoload.php';

$teamController = new TeamController;
$heroeController = new HeroeController;
$reviewController = new ReviewController;

if (!empty($_GET['rating']) && !empty($_GET['id'])) {
    $reviewController->createReviewHeroe($_GET['id'],$_GET['rating']);
    echo json_encode(['message'=>'success']);
    return;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="/css/dist.css">
    <title>DCheroes</title>
</head>
<body class="font-main">
    <div class="flex w-full h-screen">
        <div class="w-1/4 bg-gray-100 h-full overflow-y-auto flex flex-col items-center pt-12">
            <h1 class="lg:text-6xl text-gray-800">Teams</h1>
            <ul>
                <?php
                    $teams = $teamController->getAllTeams();
                    foreach ($teams as $team) {
                        
                ?> 
                <div class="flex items-center">
                    <?php
                        if($team[2] != null){
                    ?>
                        <img class="h-10" src="<?php echo $team[2] ?>" alt="">
                    <?php
                        }
                        else{
                    ?>
                        <p class="font-bold text-6xl">T</p>
                    <?php
                        }
                    ?>
                    <a class="text-gray-600" href="?mode=team&team_id=<?php echo $team[0] ?>"><li><?php echo $team[1] ?></li></a>
                </div>
                <?php
                    }
                ?>
                
            </ul>
        </div>
        <div class="w-1/4 h-full overflow-y-auto flex flex-col">
            <?php
                if(!empty($_GET['mode']) && !empty($_GET['team_id'])){
                    $heroes = $heroeController->getHeroesByTeamId($_GET['team_id']);

                    $count = 0;

                    foreach ($heroes as $heroe) {
                        if($count % 2 == 0){
            ?>
                <a href="?mode=heroe&id=<?php echo $heroe[0] ?>&team_id=<?php echo $_GET['team_id'] ?>">
                    <div class="w-full flex justify-between bg-gray-100">
                        <div>
                            <img class="w-32 h-52 object-cover" src="<?php echo $heroe[3] ?>" alt="">
                        </div>
                        <div class="text-right pr-5">
                            <h2 class="text-5xl"><?php echo $heroe[1] ?></h2>
                        </div>   
                    </div>
                </a>
            <?php
                }
                else{
            ?>
                <a href="?mode=heroe&id=<?php echo $heroe[0] ?>&team_id=<?php echo $_GET['team_id'] ?>">
                    <div class="w-full flex justify-between ">
                        <div class="text-left pr-5">
                            <h2 class="text-5xl"><?php echo $heroe[1] ?></h2>
                        </div>    
                        <div class="">
                            <img class="w-32 h-52 object-cover" src="<?php echo $heroe[3] ?>" alt="">
                        </div>
                    </div>
                </a>
            <?php
                    }
                        $count++;
                    }
                }
            ?>
        </div>

        <div class="w-2/4 bg-gray-200 h-full overflow-y-auto flex flex-col items-center">
            <?php
                if(!empty($_GET['mode']) && !empty($_GET['id'])){
                    $heroe = $heroeController->getHeroeById($_GET['id']);
            ?>
                <div  class="w-full">
                    <a class="hidden" id="currentStars"><?php echo $reviewController->getAverageRatingForHeroeById($_GET['id']) ?></a>
                    <img class="w-full h-60 object-cover" src="<?php echo $heroe[3] ?>" alt="">
                </div>
                <div class="p-4 bg-white shadow-2xl -mt-9">
                    <h4 class="text-7xl"><?php echo $heroe[1] ?></h4>
                </div>
                <input id="ratinginput" type="number" value="0" name="rating" class="hidden">
                <div class="flex justify-center mb-3">
                    <i onclick="starOne()" id="star1" class="las la-star text-white text-4xl cursor-pointer"></i>
                    <i onclick="starTwo()" id="star2" class="las la-star text-white text-4xl cursor-pointer"></i>
                    <i onclick="starThree()" id="star3" class="las la-star text-white text-4xl cursor-pointer"></i>
                    <i onclick="starFour()" id="star4" class="las la-star text-white text-4xl cursor-pointer"></i>
                    <i onclick="starFive()" id="star5" class="las la-star text-white text-4xl cursor-pointer"></i>
                </div>
                <div>
                    <button onclick="sendRating(<?php echo $heroe[0] ?>)" class="hidden bg-gray-800 px-10 py-1 rounded-lg hover:shadow-2xl duration-300 font-extralight text-white" id="sendStarsButton">Verstuur</button>
                </div>
                <div class="text-left w-full px-10">
                    <div class="mb-3">
                        <h5 class="text-3xl">Description</h5>
                        <p class="text-gray-700">
                            <?php echo $heroe[2] ?>
                        </p>
                    </div>
                    <div>
                        <h5 class="text-3xl">Krachten</h5>
                        <ul class="list-disc list-inside">
                        <?php
                            foreach ($heroeController->getPowersByHeroeId($_GET['id']) as $power) {
                            ?>
                                <li class="text-gray-700"><?php echo $power[1] ?></li> 
                            <?php
                            }
                        ?>
                        </ul>
                    </div>
                </div>
            <?php
                }
            ?>
            
        </div>
    </div>

    <script src="/js/index.js"></script>
</body>
</html>