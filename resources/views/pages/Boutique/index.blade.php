@extends('layouts.app')

@section('content')


<article>

<section id="top3">

 <!-- Hero Section-->
 <section class="presentation">
  <div class="container">
    <div class="row align-items-stretch">
      <div class="col-lg-6 d-flex align-items-center">
        <div class="content">
          <h1>BDE CESI</h1>
          <p class="hero-text">La Rochelle</p>
          <p class="hero-text"><strong>Plusieurs produits uniques</strong> pour avoir un max de<strong> flow</strong></p><btn onclick='window.scrollTo({top: 640, behavior: "smooth"});' class="buy btn btn-primary">Acheter <i class="fas fa-shopping-basket"></i></btn>
          @auth
          @if(Auth::user()->Role_id == 2 || Auth::user()->Role_id == 3)
             <a href="/products/create" class="buy btn btn-success">Ajouter un produit +</a>
          @endif
          @endauth
        </div>
      </div>
      <div class="col-lg-6">               
        <div class="image d-none d-lg-block"><img src="https://d19m59y37dris4.cloudfront.net/shirt/2-1-1/img/hero-shirt.jpg" alt="t-shirt" class="img-fluid mx-auto d-block"></div>
      </div>
    </div>
  </div>
</section>
<!-- End Hero Section-->
<!-- Intro Section-->
<section class="intro">
  <div class="container text-center">
    <h2 class="heading-center">Bienvenue sur la boutique de ton BDE du CESI La Rochelle</h2>
  
  </div>
</section>
<!-- End Intro Section-->
<!-- Features Section-->
<section class="features">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 info">
        <h2 class="heading-left">Nos incroyable<br>Produits</h2>
        <p class="lead">
         Tu vas pouvoir acheter des tshirts, des sweats, des mugs et même plus encore, tous ça à l'effigie de ton école.
      </div>
      <div class="col-lg-6 items">
        <div class="row">
          <div class="col-md-6 feature">
            <div class="text">
              <h4>Des Design uniques <i class="fas fa-drafting-compass"></i></h4>
              <p>Je te jure personne d'autres à les mêmes</p>
            </div>
          </div>
          <div class="col-md-6 feature">
            <div class="text">
              <h4>Taille des vêtements parfaites <i class="fas fa-ruler"></i></h4>
              <p>Pas comme sur AliExpress hum hum</p>
            </div>
          </div>
          <div class="col-md-6 feature">
            <div class="text">
              <h4>Qualité supérieure <i class="fas fa-handshake"></i></h4>
              <p>Comme le jambon</p>
            </div>
          </div>
          <div class="col-md-6 feature">
            <div class="text">
              <h4>Des prix compétitifs <i class="fas fa-tags"></i></h4>
              <p>20 balles le T-Shirt, c'est donné, non ?</p>
            </div>
          </div>
        </div>
      </div>
  </div>
</section>
<!-- End Features Section-->

<!-- barre de recherche produits-->
<div class="cadre">
  <input id="searchBar" type="text" name="Search" onkeyup="myFunction()">
  <div id="Produit" style="display : block"></div>
  <script>
  function myFunction(){
    var search = document.getElementById("searchBar");
    var products = document.getElementsByClassName(" Productcontainer");
   
    Array.prototype.forEach.call(products, function(product){
  
        if(product.id.includes(search.value)){
           product.style.display = "block";
         }else{
           product.style.display="none";
         }
         if(search.value == "")
          
            product.style.display ="block";
        });
  }
  </script>
  </div>
  <!-- End barre de recherche produits-->

@if(count($products) > 0)
@foreach($products as $product)

<div class="container" id="Produit">
  <div class="row">
    <div class="col-md-4 product"><img src="{{$product->image}}" alt="t-shirt" class="img-fluid"></div>
    <div class="col-md-8 info">
      <div class="info-wrapper">
      <h2 ><a href="/products/{{$product->id}}">{{$product->name}}</a></h2>
      <span class="badge badge-pill-lg badge-warning" style="font-size: 14px"> Catégorie : {{$product->Category_id}}</span>
      <p class="font-weight-normal">
          <span class="font-weight-bolder" style="font-size: 16px">Description :</span>
         {{$product->description}}
        </p>
        <ul class="product-info list-unstyled">
          <li class="size">
            <select title="Choisi ta taille" class="selectpicker">
              <option value="small">Small</option>
              <option value="medium">Medium</option>
              <option value="large">Large</option>
              <option value="x-large">X-Large</option>
            </select>
          </li>
          <li class="Taille">
            <div class="product-quantity">
              <input type="text" placeholder="T'en veux combien ?" class="quantity">
            </div>
          </li>
          <li class="price">{{$product->price}} €</li>
        </ul>
        @auth 
      </div><a href="{{ route('product.addToCart' , ['id' => $product->id])}}" class="add-to-cart btn btn-primary">Ajouter au panier <i class="fas fa-shopping-cart"></i></a>
@endauth
@guest
<button href="" class="add-to-cart btn btn-primary" disabled>Ajouter au panier <i class="fas fa-shopping-cart"></i></button>
@endguest
    </div>
  </div>
</div>

@endforeach
{{$products->links()}}
@else

<div class="cadre">
<h1>Aucun produits disponible</h1>
</div>

@endif

</article>

@endsection