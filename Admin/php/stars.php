<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<style>
    @import url(http://fonts.googleapis.com/css?family=Roboto:500,100,300,700,400);

    * {
      margin: 0;
      padding: 0;
      font-family: roboto;
    }


    .cont {
      width: 93%;
      max-width: 350px;
      text-align: center;
      margin: 4% auto;
      padding: 30px 0;
      background: #111;
      color: #EEE;
      border-radius: 5px;
      border: thin solid #444;
      overflow: hidden;
    }

    hr {
      margin: 20px;
      border: none;
      border-bottom: thin solid rgba(255,255,255,.1);
    }

    div.title { font-size: 2em; }

    h1 span {
      font-weight: 300;
      color: #Fd4;
    }

    div.stars {

      display: inline-block;
    }

    input.star { display: none; }

    label.star {
      float: right;
      padding: 10px;
      font-size: 36px;
      color: #444;
      transition: all .2s;
    }

    input.star:checked ~ label.star:before {
      content: '\f005';
      color: #FD4;
      transition: all .25s;
    }

    input.star-5:checked ~ label.star:before {
      color: #FE7;
      text-shadow: 0 0 20px #952;
    }

    input.star-1:checked ~ label.star:before { color: #F62; }

    label.star:hover { transform: rotate(-15deg) scale(1.3); }

    label.star:before {
      content: '\f006';
      font-family: FontAwesome;
    }
</style>
</head>

<body>
<?php


  echo '<div class="stars">';
  echo " <form method='post'>";
  echo '<input class="star"  value="6" id="star-6-2" type="radio" name="star"/>';
  echo '<label class="star" for="star-6-2"></label>';
  echo '<input class="star"  value="5" id="star-5-2" type="radio" name="star"/>';
  echo '<label class="star" for="star-5-2"></label>';
  echo '<input class="star"  value="4" id="star-4-2" type="radio" name="star"/>';
  echo '<label class="star" for="star-4-2"></label>';
  echo '<input class="star"  value="3" id="star-3-2" type="radio" name="star"/>';
  echo '<label class="star" for="star-3-2"></label>';
  echo '<input class="star"  value="2" id="star-2-2" type="radio" name="star"/>';
  echo '<label class="star" for="star-2-2"></label>';
  echo '<input class="star" value="1" id="star-1-2" type="radio" name="star"/>';
  echo '<label class="star" for="star-1-2"></label>';


?>
    </form>
    <?php
          if ($_POST){

          }
      ?>

  </div>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46156385-1', 'cssscript.com');
  ga('send', 'pageview');

</script>
</body>
</html>
