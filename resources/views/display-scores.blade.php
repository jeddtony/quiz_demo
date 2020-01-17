<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
	<link rel="stylesheet" href="{{URL::asset('css/display-scores.css')}}" type="text/css" >
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>

<div id="custom-body">
<div class="wrapper">
    <!-- <div class="counter col_fourth">
      <i class="fa fa-code fa-2x"></i>
      <h2 class="timer count-title count-number" data-to="300" data-speed="1500"></h2>
       <p class="count-text ">SomeText GoesHere</p>
    </div> -->

    <!-- <div class="counter col_fourth">
      <i class="fa fa-coffee fa-2x"></i>
      <h2 class="timer count-title count-number" data-to="1700" data-speed="1500"></h2>
      <p class="count-text ">SomeText GoesHere</p>
    </div> -->

	
    <div class="counter col_fourth" style="margin-top: 50px">
		
      <i class="fa fa-lightbulb-o fa-2x"></i>
      <h2 class="timer count-title count-number" data-to="{{$player->score}}" data-speed="1500"></h2>
      <p class="count-text ">Your Score</p>
    </div>
<!-- 
    <div class="counter col_fourth end">
      <i class="fa fa-bug fa-2x"></i>
      <h2 class="timer count-title count-number" data-to="157" data-speed="1500"></h2>
      <p class="count-text ">SomeText GoesHere</p>
    </div>
</div> -->
</div>



    <div class="table">
        <div class="table-cell">
            
          <ul class="leader">
            <div id="decoration"><h3 style="color: white"> Players Scores </h3></div>
            <div id="decoration2"><h3 style="color: white"> Players Scores </h3></div>
            <div id="decoration3"><h3 style="color: white"> Players Scores </h3></div>
			<h2 style="color: white"> Top 10 Scores </h2>
			<span style="display: none">{{$counter = 0}} </span>
			@foreach($topPlayers as $topPlayer)
            <li>
              <span class="list_num">{{++$counter}}</span>
              <!-- <img src="https://d13yacurqjgara.cloudfront.net/users/36050/avatars/small/1d8a44e2ee79af698f5079b705e2bab7.jpeg?1445833398" /> -->
			<h2>{{ $topPlayer->name }} <span class="number">{{ $topPlayer->score }}</span></h2>
			</li>
			@endforeach
            <!-- <li>
              <span class="list_num">2</span>
              <img src="https://lh6.googleusercontent.com/-566ZpvrYxRo/AAAAAAAAAAI/AAAAAAAAAAA/kZk-O1q__A0/s128-c-k/photo.jpg" />
              <h2>Jesse Nelson<span class="number">8,364</span</h2>
            </li>
            <li>
              <span class="list_num">3</span>
              <img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg" />
              <h2>Joel Bullis<span class="number">7,621</span</h2>
            </li>
            <li>
              <span class="list_num">4</span>
              <img src="https://s3.amazonaws.com/uifaces/faces/twitter/uxceo/128.jpg" />
              <h2>Carmen SanDiego<span class="number">4,582</span</h2>
            </li>
            <li>
              <span class="list_num">5</span>
              <img src="http://www.adweek.com/tvnewser/files/2010/10/Charles-Barkley.jpg" />
              <h2>Charles Barkley<span class="number">2,651</span</h2>
			</li> -->
			<!-- <a href="#" class="button">CLICK</a> -->
			<a href="/start" class="btn-gradient red large">Play Again</a>
		  </ul>
		 
		</div>
		
      </div> 

      <a class="the-most" target="_blank" href="https://codepen.io/2016/popular/pens/8/">
    <!-- <img src="https://raw.githubusercontent.com/supahfunk/supah-codepen/master/themost-2016.png"> -->
    <img src="{{ URL::asset('photo/coke_logo_2.png')}}" >
  </a>
  

  <script>
 (function ($) {
	$.fn.countTo = function (options) {
		options = options || {};
		
		return $(this).each(function () {
			// set options for current element
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);
			
			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;
			
			// references & variables that will change with each update
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};
			
			$self.data('countTo', data);
			
			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			
			// initialize the element with the starting value
			render(value);
			
			function updateTimer() {
				value += increment;
				loopCount++;
				
				render(value);
				
				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}
				
				if (loopCount >= loops) {
					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;
					
					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}
			
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
	};
	
	$.fn.countTo.defaults = {
		from: 0,               // the number the element should start at
		to: 0,                 // the number the element should end at
		speed: 1000,           // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,           // the number of decimal places to show
		formatter: formatter,  // handler for formatting the value before rendering
		onUpdate: null,        // callback method for every time the element is updated
		onComplete: null       // callback method for when the element finishes updating
	};
	
	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));

jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
	formatter: function (value, options) {
	  return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
	}
  });
  
  // start all the timers
  $('.timer').each(count);  
  
  function count(options) {
	var $this = $(this);
	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
	$this.countTo(options);
  }
});
  </script>


</body>
</html>