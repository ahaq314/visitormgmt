<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Visitor;
use App\Models\Visitorlog;
use Illuminate\Support\Collection;
use DB;

class VisitorapiController extends Controller
{
    
    // list all visitors
    public function index()
    {


        $res = Visitor::orderBy("id", "desc") -> get();

         if ($res -> isEmpty()){
         return response()->json([
                                    'exit_code'=>'1',
                                    'message' => 'No data found',
                                    'data'=> null
                                ], 200);
        }
        else {
            return response()->json([
                                    'exit_code'=>'0',
                                    'message' => 'Retrieved successfuly',
                                    'data'=>$res
                                ], 200);
        }
       
    }

    public function visitorLog(Request $request){
        
         $visitor_id = $request -> visitor_id;

         $res = DB::table('visitors_log')
            ->join('visitors_info', 'visitors_log.visitor_id', '=', 'visitors_info.id')
            ->select('visitors_info.first_name', 'visitors_info.last_name', 'visitors_info.phone_no','visitors_info.address','visitors_log.*')
            ->where('visitors_log.visitor_id','=',$visitor_id)
            ->orderBy('id','desc')
            ->get();

        if ($res -> isEmpty()){
         return response()->json([
                                    'exit_code'=>'1',
                                    'message' => 'No data found',
                                    'data'=> null
                                ], 200);
        }
        else {
            return response()->json([
                                    'exit_code'=>'0',
                                    'message' => 'Retrieved successfuly',
                                    'data'=>$res
                                ], 200);
        }

    }

    public function visitorLogSearch(Request $request){
        
        $visitor_id = $request -> visitor_id;

        
            $sql = "select visitors_info.first_name, visitors_info.last_name,   visitors_info.phone_no,visitors_info.address,visitors_log.*
                from visitors_info, visitors_log
                where visitors_log.visitor_id = visitors_info.id
                AND visitors_log.visitor_id = '$visitor_id'";

            if ($request->has('from')) {
                $from = date('Y-m-d',strtotime($request -> from));
                $to = date('Y-m-d',strtotime($request -> to));
                        $sql .= " AND DATE_FORMAT(check_in,'%Y-%m-%d') between '$from' AND '$to'";
                       

             }

         $res = collect(DB::select($sql));
  
        if ($res -> isEmpty()){
         return response()->json([
                                    'exit_code'=>'1',
                                    'message' => 'No data found',
                                    'data'=> null
                                ], 200);
        }
        else {
            return response()->json([
                                    'exit_code'=>'0',
                                    'message' => 'Retrieved successfuly',
                                    'data'=>$res
                                ], 200);
        }

    }

 
  

    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'phone_no' => 'required|digits:10|unique:visitors_info',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address' => 'required|string',
        ]);


        if ($validator->fails()) {
            $errorString = implode(",",$validator->messages()->all());
            return response()->json(['exit_code' => '1','message' => $errorString], 200);
     
        }

        

        $input = [
                    'phone_no' => request('phone_no'),
                    'first_name' => request('first_name'),
                    'last_name' => request('last_name'),
                    'address' => request('address'),
                 ];

       
          

    
            DB::beginTransaction();

            $visitor = Visitor::firstOrCreate(['phone_no' => $request -> phone_no],$input);
            $vlog_data = array(
                            'check_in' => date('Y-m-d H:i:s'),
                            'visitor_id' => $visitor -> id,
                            'purpose' => $request -> purpose
                        );

            $visitor_log = Visitorlog::create($vlog_data);

  

            if (!$visitor || !$vlog_data) {

               DB::rollBack();

                 return response()->json([
                                    'exit_code'=>'1',
                                    'message' => 'Problem adding visitor',
                                    'data'=> null
                                ], 200);

            } else {

                DB::commit();

                 return response()->json([
                                    'exit_code'=>'0',
                                    'message' => 'Added successfuly',
                                    'data'=>$visitor_log
                                ], 200);

            }

    }

    public function visitorSearch(Request $request){
            $keyword = $request -> keyword;

            $res = Visitor::where('first_name','LIKE','%'.$keyword.'%')
                                ->orWhere('last_name','LIKE','%'.$keyword.'%')
                                ->orWhere('phone_no','=',$keyword)
                                ->get();


        if ($res -> isEmpty()){
         return response()->json([
                                    'exit_code'=>'1',
                                    'message' => 'No data found',
                                    'data'=> null
                                ], 200);
        }
        else {
            return response()->json([
                                    'exit_code'=>'0',
                                    'message' => 'Retrieved successfuly',
                                    'data'=>$res
                                ], 200);
        }                    
    }



    public function visitorExist(Request $request){


           $phone_no = $request -> phone_no;
           
           $vinfo = Visitor::where('phone_no',$phone_no) -> first();

           if (is_null($vinfo)){

             return response()->json(['exit_code'=> '1', 'data' => null], 200);
           } else {

            return response()->json(['exit_code'=> '0', 'data' => $vinfo], 200);
           }
         
    }

     public function visitorCheckout(Request $request){


           $log_id = $request -> log_id;
           
           $result = Visitorlog::find($log_id);

           if ($result){
                  $result -> check_out = date('Y-m-d H:i:s');
                  $result -> save();

             return response()->json(['exit_code'=> '1', 'message'=> 'Checked out successfully!', 'data' => $result], 200);
           } else {

               return response()->json(['exit_code'=> '0', 'message'=> 'Problem occured, cant checkout!', 'data' => null], 200);
           }
         
    }
}
