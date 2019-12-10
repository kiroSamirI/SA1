@extends('layouts.app')
@section('head_content')
<!doctype html>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
          <link href="css/heroic-features.css" rel="stylesheet">

        <!-- Styles -->
<style>
        /* jssor slider loading skin spin css */
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }


        .jssora061 {display:block;position:absolute;cursor:pointer;}
        .jssora061 .a {fill:none;stroke:#fff;stroke-width:360;stroke-linecap:round;}
        .jssora061:hover {opacity:.8;}
        .jssora061.jssora061dn {opacity:.5;}
        .jssora061.jssora061ds {opacity:.3;pointer-events:none;}
    </style>
    @endsection
   <!-- Page Content -->
   @section('content')
   <div align="center">
    <object class="embed-responsive-item">
  
    <!-- Jumbotron Header -->
    <!-- #region Jssor Slider Begin -->
    <!-- Generator: Jssor Slider Maker -->
    <!-- Source: https://www.jssor.com -->
    
    
    <div class="container-fluid">
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:480px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="svg/loading/static-svg/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:480px;overflow:hidden;">
            <!--<div>
                <img data-u="image" src="img/gallery/980x380/045.jpg" />
                <div data-u="thumb">Slide Description 001</div>
            </div>
            <div>
                <img data-u="image" src="img/gallery/980x380/043.jpg" />
                <div data-u="thumb">Slide Description 002</div>
            </div>
            <div>
                <img data-u="image" src="img/gallery/980x380/046.jpg" />
                <div data-u="thumb">Slide Description 003</div>
            </div>
            <div>
                <img data-u="image" src="img/gallery/980x380/047.jpg" />
                <div data-u="thumb">Slide Description 004</div>
            </div>
            <div>
                <img data-u="image" src="img/gallery/980x380/048.jpg" />
                <div data-u="thumb">Slide Description 005</div>
            </div>
            <div>
                <img data-u="image" src="img/gallery/980x380/044.jpg" />
                <div data-u="thumb">Slide Description 006</div>
            </div>
            <div>
                <img data-u="image" src="img/gallery/980x380/050.jpg" />
                <div data-u="thumb">Slide Description 007</div>
            </div>
            <div>
                <img data-u="image" src="img/gallery/980x380/049.jpg" />
                <div data-u="thumb">Slide Description 008</div>
            </div>
            <div>
                <img data-u="image" src="img/gallery/980x380/052.jpg" />
                <div data-u="thumb">Slide Description 009</div>
            </div>
            <div>
                <img data-u="image" src="img/gallery/980x380/051.jpg" />
                <div data-u="thumb">Slide Description 010</div>
            </div>-->
            <div>
                <img data-u="image" src="panar/panar1.jpeg" />
                <div data-u="thumb">Slide Description 001</div>
            </div>
            <div>
                <img data-u="image" src="panar/panar2.jpeg" />
                <div data-u="thumb">Slide Description 002</div>
            </div>
            <div>
                <img data-u="image" src="panar/panar3.jpeg" />
                <div data-u="thumb">Slide Description 003</div>
            </div>
            <div>
                <img data-u="image" src="panar/panar4.jpeg" />
                <div data-u="thumb">Slide Description 004</div>
            </div>
            <!--<div style="background-color:#ff7c28;">
                <div style="position:absolute;top:50px;left:50px;width:450px;height:62px;z-index:0;font-size:16px;color:#000000;line-height:24px;text-align:left;padding:5px;box-sizing:border-box;">Photos in this slider are to demostrate jssor slider,<br />
                    which are not licensed for any other purpose.
                </div>
                <div data-u="thumb">Terms of use photos in this slider</div>
            </div>-->
        </div>
        <!-- Thumbnail Navigator -->
        
        <div data-u="thumbnavigator" style="position:absolute;bottom:0px;left:0px;width:980px;height:50px;color:#FFF;overflow:hidden;cursor:default;background-color:rgba(0,0,0,.5);">
            <div data-u="slides">
                <div data-u="prototype" style="position:absolute;top:0;left:0;width:980px;height:50px;">
                    <div data-u="thumbnailtemplate" style="position:absolute;top:0;left:0;width:100%;height:100%;font-family:verdana;font-weight:normal;line-height:50px;font-size:16px;padding-left:10px;box-sizing:border-box;"></div>
                </div>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora061" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M11949,1919L5964.9,7771.7c-127.9,125.5-127.9,329.1,0,454.9L11949,14079"></path>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora061" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M5869,1919l5984.1,5852.7c127.9,125.5,127.9,329.1,0,454.9L5869,14079"></path>
            </svg>
        </div>
    </div>
    
    <br />
</object>
   </div>
    <!-- #endregion Jssor Slider End -->

<!--tezszt-->

<!-- Page Features -->
   
    <div class="row text-center">
        @if(count($cards) > 0)
            @foreach($cards as $card)
                <div class="col-lg-3 col-md-6 mb-4" >
                    <div class="card">
                    <img class="card-img-top" src="cards/card1.jpeg" width="500px" height="325px" alt="">
                    <div class="card-body">
                        <h4 class="card-title">{{$card->title}}</h4>
                        <p class="card-text">{{ str_limit($card->discrption , 20 , '...') }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="/cards/{{$card->id}}" class="btn btn-primary">Find Out More!</a>
                    </div>
                    </div>
                </div>
                @endforeach
        @else
              
           
          @endif
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card">
          <img class="card-img-top" src="cards/card1.jpeg" width="500px" height="325px" alt="">
          <div class="card-body">
            <h4 class="card-title">اوائل السنتر</h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Find Out More!</a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card">
          <img class="card-img-top" src="cards/card2.jpeg" width="500px" height="325px" alt="">
          <div class="card-body">
            <h4 class="card-title">رحلات المركز</h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni sapiente, tempore debitis beatae culpa natus architecto.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Find Out More!</a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card">
          <img class="card-img-top" src="cards/card3.jpeg" width="500px" height="325px" alt="">
          <div class="card-body">
            <h4 class="card-title">مركز رواد المستقبل</h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Find Out More!</a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card">
          <img class="card-img-top" src="cards/card4.jpeg" width="500px" height="325px" alt="">
          <div class="card-body">
            <h4 class="card-title">مسابقتنا وجوايزنا</h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni sapiente, tempore debitis beatae culpa natus architecto.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Find Out More!</a>
          </div>
        </div>
      </div>

    </div>    <!-- /.row -->

  </div>
  <!-- /.container -->
  <div class="card" style="width: 90% ;text-align:center; margin: auto;">
<div class="embed-responsive embed-responsive-21by9">
  <iframe class="embed-responsive-item" width="50%" height="70%" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" ></iframe>
</div>
  </div>
<br />
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/jssor.slider.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideshowTransitions = [
              {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Orientation: 2,
                $NoDrag: true
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 4200;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
  <script type="text/javascript">jssor_1_slider_init();</script>

</body>

</html>
@endsection