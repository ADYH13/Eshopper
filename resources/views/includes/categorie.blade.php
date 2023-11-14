<div class="col-lg-4 col-md-6 pb-1">
    <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
        <p class="text-right">{{count($categorie->produits)}} Produits</p>
        <a href="" class="cat-img position-relative overflow-hidden mb-3">
            <img class="img-fluid" src="{{asset('storage/'.$categorie->image)}}" alt="">
        </a>
        <h5 class="font-weight-semi-bold m-0">{{$categorie->nom_categorie}}</h5>
    </div>
</div>
