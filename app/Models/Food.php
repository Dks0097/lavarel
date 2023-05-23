<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table = 'foods';
    public function categorys()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function scopeSearch($query){
        if($key = request()->key) {
            $query = $query-> whereHas('categorys', function ($query) use ($key) {
                $query->where('category_name', 'LIKE', '%' . $key . '%');
            })
            ->orwhere('name','like', '%' . $key . '%')
            ->orWhere('detail', 'LIKE', '%'.$key.'%')
            ->orWhere('price', 'LIKE', '%'.$key.'%')

            ->orWhere('produced_on', 'LIKE', '%'.$key.'%');
        }
        else {
            Food::all();
        }
        return $query;
    }
}
