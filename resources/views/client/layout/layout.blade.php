<!DOCTYPE html>
<html lang="zxx">

<head>
    <base href="{{asset('/')}}">
    <meta charset="UTF-8">
    <meta name="description" content="codelean Template">
    <meta name="keywords" content="codelean, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') | CodeGym</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="front/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="front/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/style.css" type="text/css">
   
</head>

<body>
    <!-- Start coding here -->
    
    <!-- Page preloder -->

    <div id="preloder">
        <div class="loader"></div>
    </div>

@include('client.layout.header')

    @yield('body')
      <!-- Partner Logo Section Begin-->
      <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section Begin END-->

@include('client.layout.footer')

    <!-- Js Plugins -->
    <script src="{{asset('front/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('front/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('front/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('front/js/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('front/js/jquery.dd.min.js')}}"></script>
    <script src="{{asset('front/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('front/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('front/js/main.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
          $('#timkiem').keyup(function(){
             $('#result').html('');
             var search = $('#timkiem').val();
             if(search != ''){
                $('#result').css('display', 'inherit');
                var expression = new RegExp(search, "i");
                $.getJSON('/json/product.json', function(data){
                   $.each(data, function(key, value){
                      if(value.name.search(expression) != -1){
                         $('#result').append('<li class="list-group-item" style="cursor:pointer"><img height="30" width="40" src="/uploads/product_des/'+value.image+'">'+value.name+'</li>');
                      }
                   });
                })
             }else{
                $('#result').css('display', 'none');
             }
          })
          $('#result').on('click', 'li', function(){
             var click_text = $(this).text().split('|');
             $('#timkiem').val($.trim(click_text[0]));
             $('#result').html('');
             $('#result').css('display', 'none');
          });
        })
       </script>
</body>

</html>