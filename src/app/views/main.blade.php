<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title> {{$title}} | {{$ministarstvo}} </title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico">  
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> 
    <!-- Global CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/font-awesome/css/font-awesome.css')}}">
    
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head> 

<body>
    <!-- ******HEADER****** --> 
    <header class="header">
        <div class="container">
            <a href="{{url('/home')}}">                       
                <img class="profile-image img-responsive pull-left" src="{{asset($emblem.'" width="150" height="150')}}" />
            </a>
            <div class="profile-content">
                <h1 class="name">{{$ministarstvo}}</h1>
                <h2 class="desc">{{$podnaziv}}</h2>   

            </div><!--//profile-->

        </div><!--//container-->
    </header><!--//header-->
    
    <div class="container sections-wrapper">

        @if(isset($alert))
        <div class="alert alert-danger">
            <h4>{{$alert['title']}}</h4/>
            <p>{{ $alert['content']}}</p>
        </div>
        @endif

        <div class="row">

            <div class="primary col-md-8 col-sm-12 col-xs-12">
                
                @yield('mainbar')

             
            </div><!--//primary-->

            <div class="secondary col-md-4 col-sm-12 col-xs-12">
 
                @yield('sidebar')
                
              
            </div><!--//secondary-->    
        </div><!--//row-->
    </div><!--//masonry-->
    
    <!-- ******FOOTER****** --> 
    <footer class="footer">
        <div class="container text-center">
                <small class="copyright">Ministarstvo interstelarnog dostavljanja paketa 3001. - 3015.</small>
        </div><!--//container-->
    </footer><!--//footer-->
 
    <!-- Javascript -->          
    <script type="text/javascript" src="{{asset('assets/plugins/jquery-1.11.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/jquery-migrate-1.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>    
    <script type="text/javascript" src="{{asset('assets/plugins/jquery-rss/dist/jquery.rss.min.js')}}"></script> 
    <!-- custom js -->
    <script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>            
</body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-7252431-12', 'auto');
  ga('send', 'pageview');

</script>
</html> 

