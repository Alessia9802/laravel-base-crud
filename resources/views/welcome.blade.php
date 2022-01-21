@extends('layouts.app')

@section('content')

<div class="main_container">
    <div class="jumbo">
        <div class="current_series">current series</div>
    </div>
    
    <div class="container_comics">
        
        @foreach($series as $serie)
        <div class="cont_comics">

            <div class="image_wrap">
                <img class="card_comics" src="{{ $serie['thumb'] }}" alt="">
                <h5 class="card_title">{{ $serie['title'] }}</h5>

            </div>
            

        </div>
        @endforeach
        <div class="load">Load More</div>
    </div>
    <div class="icons">
         <div class="icon">
              <img class="img_icon" src="{{asset('img/buy-comics-digital-comics.png')}}" alt="">
             <p>digital comics</p>
            </div>
        <div class="icon">
            <img class="img_icon" src="{{asset('img/buy-comics-merchandise.png')}}" alt="">
            <p>dc merchandise</p>
        </div>
        <div class="icon">
            <img class="img_icon" src="{{asset('img/buy-comics-shop-locator.png')}}" alt="">
            <p>subscription</p>
        </div>
        <div class="icon">
            <img class="img_icon" src="{{asset('img/buy-comics-subscriptions.png')}}" alt="">
            <p>comic shop locator</p>
        </div>
        <div class="icon">
            <img class="img_icon card_visa" src="{{asset('img/buy-dc-power-visa.svg')}}" alt="">
            <p>dc power visa</p>
        </div>
        
    </div>
</div>

@endsection
