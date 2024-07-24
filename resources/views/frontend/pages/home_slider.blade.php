
<link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/slick.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/slick-theme.min.css')}}"/>
<script type="text/javascript" src="{{asset('public/assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/js/slick-carousel/slick.min.js')}}"></script>

{{-- <title>Slick Slider Add and Remove Slides</title> --}}
<style>
    .main {
font-family:Arial;
height: ;
display:block;
margin:0 auto;
}
h2 {
background: #FFD700;
color: #0000CD;
font-size: 36px;
line-height: 100px;
margin: 10px;
padding: 2%;
position: relative;
text-align: center;
}
.slick-dots {
bottom: 0px;
width: 100%;
list-style: none;
text-align: center;
cursor: pointer;
}
.slick-dots li button::before {
font-size: 40px;
color: #000;
}
.slider.slider-item img{
width:100%;
height: 330px;
}
</style>
<div class="main">
    <div class="slider slide-show">

        {{-- <div class="slider-item"> <img src="public/assets/images/sabka_banner.jpg" class="d-block w-100" alt="Ajadi Ka amrit"></div>
        <div class="slider-item"> <img src="public/assets/images/mann_kibaat.jpg" class="d-block w-100" alt="Mann ki baat"></div>
        <div class="slider-item"><img src="public/assets/images/ajadi_banner.jpg" class="d-block w-100" alt="Ajadi Ka amrit"></div> --}}
        {{-- @foreach ($front_banner as $sliders )
        <div class="slider-item"> <img src="{{ asset('public/storage/media/banner/slider/'.$sliders->image) }}" class="d-block w-100" alt="Ajadi Ka amrit"></div>
        @endforeach --}}
    </div>
    {{-- <div class="button-style">
        <a class="button-slide add-slide">Add</a>
        <a class="button-slide remove-slide">Remove</a>
    </div> --}}
</div>
</div>
<style>*
img{
max-width: 100%;
}
@media only screen and (max-width: 480px) {
    .banner_slider .slick-next{
        top: 80% !important;
    }
    .banner_slider .slick-prev{
        top: 80% !important;
    }

}
.banner_slider .slick-next{
/* background:#000 url('../images/arrow-right.png') center center no-repeat; */
background:#022759 center center no-repeat;
font-size: 0;
border:0;
width: 40px;
height: 40px;
background-size: 80%;
position: absolute;
right: 0;
top: 50%;
margin-top: -36px;
cursor: pointer;
z-index: 20;
border-radius: 50px;
margin-right: 5px;
}
.banner_slider .slick-prev{
/* background:#000 url("{{asset('assets/images/arrow-left.png')}}") center center no-repeat; */
background:#022759 center center no-repeat;
font-size: 0;
border:0;
width: 40px;
height: 40px;
background-size: 80%;
position: absolute;
left: 0;
top: 50%;
margin-top: -36px;
cursor: pointer;
z-index: 20;
border-radius: 50px;
margin-left: 5px;
}
.banner_slider .slick-dots{
position: absolute;
bottom: 0;
left: 0;
width: 100%;
z-index: 10;
text-align: center;
margin: 0 0 10px;
padding: 0
}
.banner_slider .slick-dots li{
list-style: none;
width: 15px;
height: 15px;
border-radius: 50%;
background:gray;
display: inline-block;
margin: 5px;
}
.banner_slider .slick-dots li.slick-active{
background:#000;
}
.banner_slider .slick-dots li button{
display: none;
}</style>
<div class="banner_slider_wrap">
<div class="banner_slider">
    <!-- @foreach ($front_banner as $sliders )
    <div class="slider-item"> <img src="{{ asset('public/storage/media/banner/slider/'.$sliders->image) }}" class="d-block w-100" alt="Ajadi Ka amrit"></div>
    @endforeach  -->
   <!--<div><img src="public/assets/images/sabka_banner.jpg"></div>
    <div><img src="public/assets/images/mann_kibaat.jpg"></div>-->
    <div><img src="public/assets/images/ajadi_banner.jpg"></div>
</div>
</div>

<script>$('.banner_slider').slick({
dots: true,
infinite: true,
autoplay:true,
fade:false,
speed:300,
pauseOnFocus: false,
    pauseOnHover: true,
    pauseOnDotsHover: false,
    slidesToShow: 1,
    slidesToScroll: 1
});</script>
{{-- <script>
$('.slide-show').slick({
    infinite: true,
    dots:true,
    speed: 300,
    autoplay: true,
    pauseOnFocus: false,
    pauseOnHover: true,
    pauseOnDotsHover: false,
    slidesToShow: 1,
    slidesToScroll: 1
});
</script> --}}



