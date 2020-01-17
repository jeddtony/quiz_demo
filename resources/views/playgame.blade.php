<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Quiz Game</title>
        
        <meta name="Title" content="Quiz Game" />
        <meta name="description" content="Quiz Game is a HTML5 game with free general knowledge quiz questions and multiple choice answers.">
		<meta name="keywords" content="quiz, game, multiple, knowledge, questions, choice, answers, layout, iq, brain, stupid, idiot">
        
        <!-- for Facebook -->
        <meta property="og:title" content="Quiz Game"/>
        <meta property="og:site_name" content="Quiz Game"/>
        <meta property="og:image" content="http://demonisblack.com/code/2016/quizgame/game/share.jpg" />
        <meta property="og:url" content="http://demonisblack.com/code/2016/quizgame/game/" />
        <meta property="og:description" content="Quiz Game is a HTML5 game with free general knowledge quiz questions and multiple choice answers.">
        
        <!-- for Twitter -->
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="Quiz Game" />
        <meta name="twitter:description" content="Quiz Game is a HTML5 game with free general knowledge quiz questions and multiple choice answers." />
        <meta name="twitter:image" content="http://demonisblack.com/code/2016/quizgame/game/share.jpg" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<script>
        if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
            var msViewportStyle = document.createElement("style");
            msViewportStyle.appendChild(
                document.createTextNode(
                    "@-ms-viewport{width:device-width}"
                )
            );
            document.getElementsByTagName("head")[0].
                appendChild(msViewportStyle);
        }
        </script>

        <link rel="shortcut icon" href="icon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="{{URL::asset('game-template/js/vendor/modernizr-2.6.2.min.js}}"></script>
    </head>
    <body>
        <!-- PERCENT LOADER START-->
    	<div id="mainLoader">0</div>
        <!-- PERCENT LOADER END-->
        
        <!-- CONTENT START-->
        <div id="mainHolder">
        
        	<!-- BROWSER NOT SUPPORT START-->
        	<div id="notSupportHolder">
                <div class="notSupport">YOUR BROWSER ISN'T SUPPORTED.<br/>PLEASE UPDATE YOUR BROWSER IN ORDER TO RUN THE GAME</div>
            </div>
            <!-- BROWSER NOT SUPPORT END-->
            
            <!-- ROTATE INSTRUCTION START-->
            <div id="rotateHolder">
                <div class="mobileRotate">
                	<div class="rotateImg"><img src="{{URL::asset('game-template/assets/rotate.png}}" /></div>
                    <div class="rotateDesc">Rotate your device <br/>to landscape</div>
                </div>
            </div>
            <!-- ROTATE INSTRUCTION END-->
            
            <!-- CANVAS START-->
            <div id="canvasHolder">
                <canvas id="gameCanvas" width="1024" height="768"></canvas>
            </div>
            <!-- CANVAS END-->
            
        </div>
        <!-- CONTENT END-->
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write(`<script src="{{URL::asset('game-template/js/vendor/jquery-1.12.4.min.js}}"><\/script>`)</script>
        
        <script src="{{URL::asset('game-template/js/vendor/detectmobilebrowser.js}}"></script>
        <script src="{{URL::asset('game-template/js/vendor/createjs-2015.11.26.min.js}}"></script>
		<script src="{{URL::asset('game-template/js/vendor/TweenMax.min.js}}"></script>
        
        <script src="{{URL::asset('game-template/js/plugins.js}}"></script>
        <script src="{{URL::asset('game-template/js/sound.js}}"></script>
        <script src="{{URL::asset('game-template/js/canvas.js}}"></script>
        <script src="{{URL::asset('game-template/js/game.js}}"></script>
        <script src="{{URL::asset('game-template/js/mobile.js}}"></script>
        <script src="{{URL::asset('game-template/js/main.js}}"></script>
        <script src="{{URL::asset('game-template/js/loader.js}}"></script>
        <script src="{{URL::asset('game-template/js/init.js}}"></script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-86567323-39"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-424386-45');
        </script>
    </body>
</html>