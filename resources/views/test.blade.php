
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="AlQuran Cloud - A resource to read, hear and progamatically interact with the Quran">
    <meta name="google-site-verification" content="arzs4C48XJM21SFRoVKstsDsebMt--HgB1hjr9y_7Ks" />

    <!--<link rel="icon" href="../../favicon.ico">-->

    <title>Al Quran Cloud</title>

    <!-- Bootstrap core CSS -->
    <!--<link href="https://alquran.cloud/public/libraries/bootstrap-3.3.6/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="https://bootswatch.com/3/paper/bootstrap.min.css" rel="stylesheet">
    <!-- AlQuran.Cloud CSS -->
    <link href="https://alquran.cloud/public/css/font-kitab.css?v=1" rel="stylesheet">
    <link href="https://alquran.cloud/public/libraries/bootstrap-multiselect/dist/css/bootstrap-multiselect.css?v=1" rel="stylesheet">
    <link href="https://alquran.cloud/public/css/stickyfooter.css?v=1" rel="stylesheet">
    <link href="https://alquran.cloud/public/css/alquran.cloud.css?v=2" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://alquran.cloud/public/libraries/bootstrap-3.3.6/js/bootstrap.min.js"></script>
    <script src="https://alquran.cloud/public/libraries/bootstrap-multiselect/dist/js/bootstrap-multiselect.js"></script>
  </head>

  <body style="margin-top: 70px;background:url(https://alquran.cloud/public/images/bg4.png); background-attachment: fixed; background-size: 100%; background position: center center;" >
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <!--<div class="container">-->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                  <a class="navbar-brand font-kitab rtl" style="margin-right: 10px;" href="https://alquran.cloud">الْقُرْآن الْكَرِيْم</a>
              </li>
          </ul>
          <ul class="nav navbar-nav">
            <li class="active"><a href="https://alquran.cloud">Home</a></li>
            <li class=""><a href="/read" >Quran</a></li>
            <li class=""><a href="/juzs">Juz</a></li>
            <li class=""><a href="/surahs">Surah</a></li>
            <li class=""><a href="/ayah">Ayah</a></li>
            <li class="dropdown ">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">API <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="/api">API Documentation</a></li>
                    <li><a href="/cdn">Content Delivery Network</a></li>
                    <!--<li><a href="/api-clients">API Clients</a></li>-->
                    <li><a href="/tajweed-guide">Tajweed Guide</a></li>
                    <li><a href="/arabic-font-edition-tester">Font Edition Tester</a></li>
                </ul>
            </li>
            <li class=""><a href="/cdn">CDN</a></li>

          </ul>
            <form class="navbar-form pull-right" style="margin-right: 20px;" role="search" method="GET" action="/search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search the Quran" name="keyword" id="search-term" value="">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>

        </div>
      <!--</div>-->
  </nav>
<div class="container">
    <div class="lead font-kitab align-center">
        بِسْمِ ٱللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ
    </div>
  <div class="lead font-kitab align-center">
ٱلْحَمْدُ لِلّٰهِ ٱلَّذِي خَلَقَ ٱلْإِنْسَانَ وَٱلْجَانَّ وَ ٱلسَّمٰوَاتِ وَ ٱلْأَرْضَ وَ مَا فِيهُمَا وَ مَا بَيْنَهُمَا وَ هُوَ ذُوْ ٱلْجَلَالِ وَ ٱلْإِكْرَامِ وَ هُوَ عَلَى كُلِّ شَيْءٍ قَدِيرٌ

  </div>
  <div class="lead align-center">
  All praise is for Allah Who created man and jinn and the heavens and the earth and what is in them and what is between them and He is the Lord of Majesty and Bounty and He has power over everything.
  </div>

  <h2>
    Al Quran Cloud - A Full Featured Quran App
  </h2>
  <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
          <p>
          The Al Quran Cloud is a simple web app that allows you to read and hear the Quran being recited by Juz, Surah or Ayah. You can also play the whole Quran in the browser. In addition, you can read a variety of translations alongside the arabic text.
          </p>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <h4>Read the Quran</h4>
        <p>
            Read the Quran and translations and stream audio for
            an ayah, surah, juz or the entire Quran.
        </p>
        <p>
            <a href="/read" class="btn btn-primary">Read the Quran</a>
        </p>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <h4>Build with the API</h4>
        <p>
            Build full featured web and mobile apps with the Al Quran REST API.
        </p>
        <p>
            <a href="/api" class="btn btn-primary">API Documentation</a>
            <a href="https://github.com/islamic-network" target="_blank" class="btn btn-primary">GitHub Resources</a>
        </p>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <h4>Stream with the CDN</h4>
        <p>
            Use our fast CDN to serve Quran audio or render images of ayahs.
        </p>
        <p>
            <a href="/cdn" class="btn btn-primary">CDN Documentation</a>
        </p>
    </div>

  </div>

  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <h4>Open Source</h4>
        <p>
            All code for this app is open source (and built with open source tools). You can use it or contribute to it.
        </p>
        <p>
            <a href="https://github.com/islamic-network/alquran-web-app" target="_blank" class="btn btn-primary">Code @ GitHub</a>
        </p>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <h4>Open Media</h4>
        <p>
            Quran audio, ayah images, the database - everything is available for use.
        </p>
        <p>
            <a href="/download-media" class="btn btn-primary">Get the Media</a>

        </p>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <h4>Tajweed Guide</h4>
        <p>
            Understand how to parse Tajweed data from the API. Our parser also makes it easier for you to render Tajweed data.
        </p>
        <p>
            <a href="/tajweed-guide" class="btn btn-primary">Tajweed Guide</a>
        </p>
    </div>

  </div>

</div>



<footer class="footer"  style="position: fixed; margin-top: 20px; border-top: 1px #ccc solid;">
    <!--<div class="container">-->
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
                <p class="" style="margin-top: 20px; margin-left: 10px;">
            &copy; 2023 <a href="https://islamic.network" target="_blank">Islamic Network</a> and respective <a href="https://alquran.cloud/contributors">contributors</a>.
                </p>
            </div>
            <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                <ul class="nav navbar-nav pull-right">
                    <li><a href="http://aladhan.com" target="_blank">Prayer Times</a></li>
                    <li><a href="http://aladhan.com/gregorian-hijri-calendar" target="_blank">Hijri Calendar</a></li>
                    <li><a href="https://alquran.cloud/contact">Contact</a></li>
                    <li><a href="https://alquran.cloud/terms-and-conditions">Terms &amp; Conditions</a></li>
                </ul>
            </div>
        </div>
    <!--</div>-->
</footer>
</div>


<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-3749682-29', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
