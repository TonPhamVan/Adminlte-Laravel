<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class ProductController extends Controller
{
    private $sanpham;
    public function __construct()
    {
        $this->sanpham = new SanPham();
    }
    public function index(Request $request) {
        $title = 'List Product';
        if(!empty($searchProduct = $request->searchProduct)){
            $productList = $this->sanpham->searchProduct($searchProduct);
        } else{
            $productList = $this->sanpham->getAllProduct();
        }
        return view('clients.product.list',compact('title','productList'))->with('i',(request()->input('page',1)-1)*1);

    }
    public function add() {
        $title = 'Add Product';
        return view('clients.product.add',compact('title'));
    }
    public function postAdd(Request $request) {
        $request->validate([
            'name' => 'required|min:5',
            'Price' => 'required',

        ],[
            'name.required' => "Name bắt buộc phải nhập",
            'name.min' => "Name phải từ :min ký tự trở lên",
            'Price.required' => 'Price bắt buộc phải nhập',

        ]);
        $dataInsert = [
            $request->name,
            $request->Price,

        ];
        $this->sanpham->addProduct($dataInsert);

        return redirect()->route('sanpham.index')->with('msg','Thêm sản phẩm thành công');
    }
    public function getEdit(Request $request, $id=0) {
        $title = "Edit Product";
        if(!empty($id)){
            $productDetail = $this->sanpham->getDetail($id);
            if(!empty($productDetail[0])){
                $request->session()->put('id',$id);
                $productDetail = $productDetail[0];
            }
        } else {
            return redirect()->route('sanpham.index')->with('msg','Sản phẩm không tồn tại');
        }
        return view('clients.product.edit',compact('title','productDetail'));

    }
    public function postEdit(Request $request) {
        $id = session('id');
        if(empty($id)){
            return back()->with('msg','Liên kết không tồn tại');
        }
        $request->validate([
            'name' => 'required|min:5',
            'Price' => 'required',

        ],[
            'name.required' => "Name bắt buộc phải nhập",
            'name.min' => "Name phải từ :min ký tự trở lên",
            'Price.required' => 'Price bắt buộc phải nhập',

        ]);
        $dataUpdate = [
            $request->name,
            $request->Price,

        ];
        $this->sanpham->updateProduct($dataUpdate,$id);

        return redirect()->route('sanpham.index')->with('msg','Cập nhật sản phẩm thành công');

    }
    public function delete($id=0) {
        if(!empty($id)){
            $productDetail = $this->sanpham->getDetail($id);
            if(!empty($productDetail[0])){
                $deleteStatus = $this->sanpham->deleteProduct($id);
                if($deleteStatus){
                    $msg = 'Xóa người dùng thành công';
                } else {
                    $msg = 'Bạn không thể xóa người dùng lúc này. Vui lòng thử lại';
                }
            } else {
                $msg = 'Người dùng không tồn tại';
            }
        } else {
            $msg = 'Liên kết không tồn tại';
        }
        return redirect()->route('sanpham.index')->with('msg',$msg);
    }
}