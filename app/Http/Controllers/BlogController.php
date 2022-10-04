<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Blog;
use DataTables;
class BlogController extends Controller
{


    public function index(){

        return view("data");
    }
    public function GetData(Request $request){

        if($request->ajax()){
            $data=Blog::select('*');
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function($row)
            {
                $actionBtn='<a href="javascript:void(0);" class="edit btn btn-success btn-sm ">Edit</a> <a href="javascript:void(0);" class="delete btn btn-danger btn-sm ">Delete</a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    }

    public function Search(Request $request){


        if($request->ajax())
            {

                // return $request->searchEmail;
                $output="";
                    if($request->get('searchEmail')){
                        $products=Blog::where('email','LIKE','%'.$request->searchEmail."%")
                         ->get();
                      }

                     if($request->get('searchName')){
                        $products=Blog::where('name','LIKE','%'.$request->searchName."%")
                       ->get();
                       }
                    if($request->get('searchSalary')){
                         $products=Blog::where('salary','LIKE','%'.$request->searchSalary."%")
                         ->get();
                       }

                // $products=Blog::where('name','LIKE','%'.$request->search."%")
                // // ->orWhere('email','LIKE','%'.$request->searchEmail."%")
                // // ->orWhere('salary','LIKE','%'.$request->searchSalary."%")
                // ->get();
                if($products)
                {
                foreach ($products as $key => $product) {
                $output.='<tr>'.
                '<td>'.$product->name.'</td>'.
                '<td>'.$product->email.'</td>'.
                '<td>'.$product->salary.'</td>'.
                '</tr>';
                }
                return Response($output);
                }
            }


    }
}
