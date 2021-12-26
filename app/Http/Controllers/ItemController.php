<?php

    namespace App\Http\Controllers;
    use App\Http\Requests;  
    use Illuminate\Http\Request;
    use DB;  
    use PDF;  

    class ItemController extends Controller
    {
        /**
        * Write code on Method
        *
        * @return response()
        */  
        public function itemPdfView(Request $request)  
        {  
            $posts = DB::table("posts")->get();  
            view()->share('posts',$posts);  
      
            if($request->has('download')){  
                $pdf = PDF::loadView('itemPdfView');  
                return $pdf->download('itemPdfView.pdf');  
            }      
            return view('itemPdfView');  
        }  
    }
?>