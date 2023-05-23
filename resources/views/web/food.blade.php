<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    @include('web.navbar_admin')
    <a href="{{route('product.create')}}">them</a>
    
    @if (Session::has('thongbao'))
    <div class="alert alert-success">
      {{Session::get('thongbao')}}
    </div>
@endif
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">price</th>
            <th scope="col">detail</th>
            <th scope="col">produced_on</th>
            <th scope="col">image</th>
            <th scope="col">Edit</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($foods as $food)
            <tr>
                <th scope="row">{{$food->id}}</th>
                <td>{{$food->name}}</td>
                <td>{{$food->price}}</td>
                <td>{{$food->detail}}</td>
                <td>{{$food->produced_on}}</td>
                <td><img src="/assets/{{$food->img}}" alt="{{$food->img}}" height="50px" width="auto"></td>
                <td><a href="{{route('product.edit',$food->id)}}"><button class="btn btn-outline-dark">Sửa</button></a></td>
                <td><form action="{{route('product.destroy',$food->id)}}" method="post">
                     
                  @csrf
                  @method('DELETE')
                  <input type="submit" class="btn btn-danger" value="Xóa">
                </form></td>
              </tr>  
            @endforeach
         
        </tbody>
      </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>