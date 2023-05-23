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
            <a class="btn btn-outline-dark me-1 bp-2" href="{{route('sanpham',['key'=>$category->id])}}">
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