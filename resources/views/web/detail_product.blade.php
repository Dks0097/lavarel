<!doctype html>
<html lang="en">
  <head>
    <title>Chitieet</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    @include('web.navbar')
    <div>
      
      <div class="container py-5">
        <div class="row py-4">
          <div class="col md-6">
            <img
              src="/assets/{{$food['img']}}"
              alt={{$food['img']}}
              height="400px"
              width="400px"
            />
          </div>
          <div class="col md-6">
            <h4 class="text-uppercase text-black-50">{{$food['category_name']}}</h4>
            <h1 class="display-5">{{$food['name']}}</h1>
            <p class="lead">
              Rating {product.rating && product.rating.rate}
              <i class="fa fa-star"></i>
            </p>
            <h3 class="display-6 fw-bold my-4"> {{$food['price']}} đ</h3>
            <button
              class="btn btn-outline-dark px-4 py-2"
             
            >
              Add to Cart
            </button>
            <a href="/cart" class="btn btn-dark ms-2 px-3 py-2">
              Go to Cart
            </a>
          </div>
        </div>
      </div>
   
  </div>
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>