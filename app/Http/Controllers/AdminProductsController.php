<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $foods = Food::all();
        return view('web.food', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $food = Food::all();
        return view('web.food.create', compact('food') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'produced_on' => 'nullable|date',
            'category_id' => 'required',
            'detail' => 'required',
           
            
            
        ], [
            'name.required' => 'Bạn chưa nhập tên !',
            'price.required' => 'Bạn chưa nhập giá !',
            'produced_on.required' => 'Bạn chưa nhập ngày !',
            'category_id.required' => 'bạn chưa nhập category_id !',
            'detail.required' => 'Bạn chưa nhập mô tả !',

           
        ]);
       
        $getimg = '';
        if($request->hasFile('img')){
            //Hàm kiểm tra dữ liệu
            $this->validate($request, 
                [
                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                    'img' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ],			
                [
                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                    'img.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'img.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                ]
            );
              
            //Lưu hình ảnh vào thư mục public/upload/img
            $img = $request->file('img');
            $getimg = time().'_'.$img->getClientOriginalName();
            $destinationPath = public_path('assets');
            $img->move($destinationPath, $getimg);
        }
        // $img = $request->file('img');
        // $getimg = time().'_'.$img->getClientOriginalName();
        // $destinationPath = public_path('assets');
        // $img->move($destinationPath, $getimg);
        //
        $food = new Food;
        $food->name = $request->name; 
        $food->price = $request->price;
        $food->detail = $request->detail;
        $food->produced_on = $request->produced_on;
        $food->img = $getimg;
        $food->category_id = $request->category_id;
        
       
        $food->save();
        return redirect('admin/product')->with('thongbao','Thêm xe thành công!');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $categorys = Category::all();
        $food = Food::find($id); //1.b
        return view('web.food.edit', compact('food', 'categorys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'produced_on' => 'nullable|date',
            'category_id' => 'required',
            'detail' => 'required',
           
            
            
        ], [
            'name.required' => 'Bạn chưa nhập tên !',
            'price.required' => 'Bạn chưa nhập giá !',
            'produced_on.required' => 'Bạn chưa nhập ngày !',
            'category_id.required' => 'bạn chưa nhập category_id !',
            'detail.required' => 'Bạn chưa nhập mô tả !',

           
        ]);
        $getimg = '';
        if($request->hasFile('img')){
            //Hàm kiểm tra dữ liệu
            $this->validate($request, 
                [
                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                    'img' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ],			
                [
                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                    'img.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'img.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                ]
            );
              
            //Lưu hình ảnh vào thư mục public/upload/img
            $img = $request->file('img');
            $getimg = time().'_'.$img->getClientOriginalName();
            $destinationPath = public_path('assets');
            $img->move($destinationPath, $getimg);
        }
        // $img = $request->file('img');
        // $getimg = time().'_'.$img->getClientOriginalName();
        // $destinationPath = public_path('assets');
        // $img->move($destinationPath, $getimg);
        //
     
        $name = $request->name; 
        $price = $request->price;
        $detail = $request->detail;
        $produced_on = $request->produced_on;
        $img = $getimg;
        $category_id = $request->category_id;

        DB::table('foods')->where('id', $id)->update([
            'name' =>   $name ,
            'price' =>  $price,
            'detail' =>  $detail,
            'produced_on' =>   $produced_on,
            'img'=> $img,
            'category_id' => $category_id,
        ]);
        return redirect('admin/product')->with('thongbao','Cập nhật food thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id)
    {
        //
        DB::delete('delete from foods where id = ?', [$id]);
        // $id->delete();
        return redirect('admin/product')->with('thongbao','Xóa food thành công!');
    }
}
