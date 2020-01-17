<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ URL::asset('css/startGameStyles.css') }}"  type="text/css">
</head>
<body>
    <div class="container">
        <div class="login-wrapper">
          <form class="login-form" action="/start" method="post" >
          @csrf
            <!-- username --> 
            <div class="username">
              <label><span class="entypo-user"></span></label>
              <input name="username" type="text" placeholder="Username" required/>
            </div>
            <!-- password -->
            <!-- <div class="password">
              <label><span class="entypo-lock"></span></label>
              <input type="password" placeholder="Password"/>
            </div> -->
            <!-- button -->
            <button type="submit" class="btn">Join Game</button>
            <p>
              Not a member? <a href="#" class="link">Sign up now <span class="entypo-right-thin"></span></a>
            </p>
          </form>
        </div> <!-- /login-wrapper -->
      </div>  <!-- /container -->          
      
      <a class="the-most" target="_blank" href="https://codepen.io/2016/popular/pens/8/">
    <!-- <img src="https://raw.githubusercontent.com/supahfunk/supah-codepen/master/themost-2016.png"> -->
    <img src="{{ URL::asset('photo/coke_logo_2.png')}}" >
  </a>
  
</body>
</html>