<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SanPham extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    public function getAllProduct() {
        return SanPham::paginate(4);
    }
    public function searchProduct($searchProduct) {
        return DB::table($this->table)
        ->select('*')
        ->where('name','like','%'.$searchProduct.'%')
        ->paginate(4);
    }
    public function addProduct($data){
        return DB::table($this->table)
        ->insert([
            'name'=> $data[0],
            'Price'=>$data[1],
            'create_at'=>$data[2]
        ]);
    }
    public function getDetail($id) {
        return DB::table($this->table)
        ->where('id',$id)
        ->get();
    }
    public function updateProduct($data,$id){
        $data[] = $id;
        return DB::table($this->table)
        ->where('id',$id)
        ->update([
            'name'=> $data[0],
            'Price'=>$data[1],
            'update_at'=>$data[2]

        ]);
    }
    public function deleteProduct($id) {
        return DB::table($this->table)
        ->where('id',$id)
        ->delete();
    }
}