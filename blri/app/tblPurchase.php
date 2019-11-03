<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class tblpurchase extends Model
{
    protected $table = 'tblpurchase';

    public static function getuserData($id=null){

        $value=DB::table('tblpurchase')->orderBy('id', 'asc')->get();
        return $value;

    }

    public static function insertData($data){

//        $value=DB::table('tblpurchase')->where('username', $data['username'])->get();
//        if($value->count() == 0){
            $insertid = DB::table('tblpurchase')->insertGetId($data);
            return $insertid;
//        }else{
////            return 0;
//        }

    }

//    public static function updateData($id,$data){
//        DB::table('tblpurchase')->where('id', $id)->update($data);
//    }
//
//    public static function deleteData($id=0){
//        DB::table('tblpurchase')->where('id', '=', $id)->delete();
//    }

}
