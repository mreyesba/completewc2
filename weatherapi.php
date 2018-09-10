<?php
	//http://completewebdevelopercourse.com/locations/London
	$weather = "";
  $error = "";

	if(array_key_exists('city', $_GET)){
		/*$forecastPage = file_get_contents("http://completewebdevelopercourse.com/locations/London");
		
		$pageArray = explode('3 Day Weather Forecast Summary:</b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">', $forecastPage);
		
		$secondPageArray = explode('</span></span></span>',$pageArray[1]);

		$weather = $secondPageArray[0];*/

    $urlContents = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".urlencode($_GET['city'])."&appid=1be89d93e30848c104a1dcbded48aff0");


    $weatherArray = json_decode($urlContents, true);

    print_r($weatherArray);

    if ($weatherArray['cod'] == 200) {
        $weather = "The weather in ".$_GET['city']." is currently '".$weatherArray['weather'][0]['description']."'. ";

        $tempInCelcius = intval($weatherArray['main']['temp'] - 273);

        $weather .= " The temperature is ".$tempInCelcius."&deg;C and the wind speed is ".$weatherArray['wind']['speed']."m/s.";
    } else {
      $error = "Could not find city - please try again.";
    }

    


	}
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">


    <title>Weather Scraper</title>
    <!-- Bootstrap CSS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
    	html{
    		background: url(background.jpg) no-repeat center center fixed;
    		-webkit-background-size: cover;
    		-moz-background-size: cover;
    		background-size: cover;
    	}

    	body{
    		background: none;
    	}

    	.container{
    		text-align: center;
    		margin-top: 100px;
    		width: 450px;
    	}

    	input{
    		margin: 20px 0;
    	}

    	#weather{
    		margin-top: 15px;
    	}


    </style>
  
  </head>

  <body >
  	<div class="container">
  			<h1 style="color : white;">What's the weather?</h1>

  			<form>
			  <div class="form-group">
			    <label for="city" style="color:white;">Enter the name of a city</label>
			    <input type="text" class="form-control" name="city" id="city" placeholder="Eg. London, Tokyo">
			  </div>
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
			<div id="weather"><?php 
        if($error) {
          echo '<div class="alert alert-danger" role="alert">
    '.$error.'
</div>';
        }
				if($weather) {
					echo '<div class="alert alert-success" role="alert">
  	'.$weather.'
</div>';
				}
			?></div>
  	</div>
  	
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<script type="text/javascript">
		
			
	</script>  
  </body>
</html>