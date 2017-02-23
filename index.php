<!DOCTYPE html>
<html>
    <head>
        <title>SilverJack</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        
    </head>
    <body>
        
        <div id="main">
            
            <?php
            
            $used_cards = array();
            
            $players = 0;
            
            $playerPics = array("1.png", "2.png", "3.png", "4.png", "5.png", "6.png", "7.png", "8.png");    
            $used_pics = array();
            
            $cards = array("2_of_clubs.png", "2_of_spades.png", "2_of_hearts.png", "2_of_diamonds.png",
                
                               "3_of_clubs.png", "3_of_spades.png", "3_of_hearts.png", "3_of_diamonds.png",
                               
                               "4_of_clubs.png", "4_of_spades.png", "4_of_hearts.png", "4_of_diamonds.png",
                               
                               "5_of_clubs.png", "5_of_spades.png", "5_of_hearts.png", "5_of_diamonds.png",
                               
                               "6_of_clubs.png", "6_of_spades.png", "6_of_hearts.png", "6_of_diamonds.png",
                               
                               "7_of_clubs.png", "7_of_spades.png", "7_of_hearts.png", "7_of_diamonds.png",
                               
                               "8_of_clubs.png", "8_of_spades.png", "8_of_hearts.png", "8_of_diamonds.png",
                               
                               "9_of_clubs.png", "9_of_spades.png", "9_of_hearts.png", "9_of_diamonds.png",
                               
                               "10_of_clubs.png", "10_of_spades.png", "10_of_hearts.png", "10_of_diamonds.png",
                               
                               "jack_of_clubs.png", "jack_of_spades.png", "jack_of_hearts.png", "jack_of_diamonds.png",
                               
                               "queen_of_clubs.png", "queen_of_spades.png", "queen_of_hearts.png", "queen_of_diamonds.png",
                               
                               "king_of_clubs.png", "king_of_spades.png", "king_of_hearts.png", "king_of_diamonds.png",
                               
                               "ace_of_clubs.png", "ace_of_spades.png", "ace_of_hearts.png", "ace_of_diamonds.png");
                               
                               
            function draw_card(){
            
                global $cards;
                global $used_cards;
                
                $rand_num = rand(0,51);
                while(in_array ($rand_num , $used_cards)){
                    $rand_num = rand(0,51);
                }
                
                array_push($used_cards, $rand_num);
                
                $card = $cards[$rand_num];
                
                echo '<img src="Cards/'. $card .'" alt="Card" height="100" width="65" >';
                
                
                
                if($rand_num < 4){return 2;}
                if($rand_num < 8){return 3;}
                if($rand_num < 12){return 4;}
                if($rand_num < 16){return 5;}
                if($rand_num < 20){return 6;}
                if($rand_num < 24){return 7;}
                if($rand_num < 28){return 8;}
                if($rand_num < 32){return 9;}
                if($rand_num < 36){return 10;}
                if($rand_num < 40){return 11;}
                if($rand_num < 44){return 12;}
                if($rand_num < 48){return 13;}
                if($rand_num < 53){return 1;}
                
            }
            
            function draw_player_pic(){
                global $used_pics;
                
                $random = rand(0,7);
                while(in_array ($random , $used_pics)){
                    $random = rand(0,7);
                }
                
                array_push($used_pics, $random);
                
                return $random;
            }
            
            function play_silverjack(){
                global $playerPics;
                global $players;
                $players++;
                $score = 0;
                
                
                $player = draw_player_pic();
                
                echo '<div class="player">';
                    echo '<img src="ProfilePictures/'. $playerPics[$player] .'" alt="Card" height="65" width="65" >';
                    
                    $score += draw_card();
                    $score += draw_card();
                    $score += draw_card();
                    $score += draw_card();
                    
                    if($score < 35){$score += draw_card();}
                    if($score < 37){$score += draw_card();}
                    echo "<span>";
                    echo "Score: " . $score;
                    echo "</span>";
                echo "</div>";
                
                echo '<span>';
                echo "Player " . $players;
                echo "</span>";
                
                return $score;
                
            }
            
            
            $score1 = play_silverjack();
            $score2 = play_silverjack();
            $score3 = play_silverjack();
            $score4 = play_silverjack();
            
            $scores = array($score1, $score2, $score3, $score4);
            
            $winner = 0;
            $diff = 100;
            
           for($i = 0; $i < 4; $i++)
           {
               if($scores[$i] == 42){
                   $winner = $i + 1;
                   break;
               }
               
               if($scores[$i] < 42)
               {
                   if((42 - $scores[$i]) < $diff)
                   {
                       $winner = $i + 1;
                       $diff = (42 - $scores[$i]);
                   }
                }
           }
            
            
            echo '<div id="winner">';
                echo "<br>";
                if($winner == 0){echo "Nobody won!";}
                else {
                    echo "PLAYER " . $winner . " WINS!";
                }
                
            echo "</div>";
            
            ?>
            
        </div>
    </body>
</html>