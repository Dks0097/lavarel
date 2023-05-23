<!doctype html>
<html lang="en">
  <head>

    <title>Sửa sản phẩm</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
   <div class="container py-5">
    <h4>Sửa food</h4>

    <form action="{{route('product.update',$food->id)}}"  method="post" class="container" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label" >Name </label>
            <input name="name" type="text" class="form-control" id="formGroupExampleInput" value="{{ isset($food)?$food->name: "" }}" placeholder="tên xe">
          </div>
          @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
          <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">price </label>
            <input name="price" type="text" class="form-control" id="formGroupExampleInput2" value="{{ isset($food)?$food->price: "" }}" placeholder="price">
          </div>
          @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="mb-3">
    <label for="formGroupExampleInput" class="form-label" >detail </label>
    <input name="detail" type="text" class="form-control" id="formGroupExampleInput" value="{{ isset($food)?$food->detail: "" }}" placeholder="tên xe">
  </div>
  @error('detail')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Product_on</label>
            <input name="produced_on" type="date" class="form-control" id="formGroupExampleInput" value="{{ isset($food)?$food->produced_on: "" }}" placeholder="produced_on">
          </div>
          @error('produced_on')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror


<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">category_name</label>
  <select name="category_id"  class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
    <option value="">Chọn mã nhà sản xuất</option>
    @foreach ($categorys as $key => $category)
    <option value="{{$category->id}}" {{$category->id==$food->category_id?"selected":""}}>{{$category->category_name}}</option>
    @endforeach
  </select>
</div> 
          
<div class="form-group">
    <label for="exampleFormControlFile1">Hình ảnh</label>
    <img src="/assets/{{$food->img}}" alt="{{$food->img}}">
    <input name="img" type="file" class="form-control-file" value="{{ isset($food)?$food->img: "" }}"id="exampleFormControlFile1">
  </div>
  @error('img')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
          <button type="submit" class="btn btn-success">Cập nhật</button>
    </form>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>