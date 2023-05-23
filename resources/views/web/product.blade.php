<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

      @include('web.navbar')
      <div>
        <div class="container my-5 py-5">
          <div class="row">
            <div class="col-12 mb-5">
              <h1 class="display-6 fw-bolder text-center">SẢN PHẨM CỦA CHÚNG TÔI</h1>
              <hr />
            </div>
          </div>
          {{-- <form action="" method="post"> --}}
            <div class="button d-flex justify-content-center mb-5 bp-5">
              <form action="{{route('products.index')}}">
                <a class="btn btn-outline-dark me-1 bp-2" href="?">All</a>
                @foreach ($categorys as $key => $category)
                <a class="btn btn-outline-dark me-1 bp-2" href="{{route('sanpham',['key'=>$category->category_name])}}">
                  {{$category->category_name}}</a>
                    
                @endforeach</form>
              
             
            </div>
          {{-- </form> --}}
          <div class="row justify-content-center">
           
           
            @foreach ($foods as $key => $food)
            <div class="col-md-3 mb-4">
              <div class="card h-100 text-center p4 " key={Products.id} >
                <img src="/assets/{{$food->img}}" class="card-img-top" alt={{$food->img}} height="250px" />
                <div class="card-body">
                  <h5 class="card-title mb-0">{{$food->name}}...</h5>
                  <p class="card-text lead fw-bold">
                    {{$food->price}} đ
                  </p>
                  <a href={{route('products.show',$food->id)}} class="btn btn-outline-dark">
                    Buy now
                  </a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <div>
        {{$foods->appends(request()->all())->links()}}
      </div>
     
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>