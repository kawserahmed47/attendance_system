<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function attendance(){
        $data = array();
        $data['clas']="";
        $data['results']="";
        return view('back.pages.attendance',$data);
    }

    public function insertStudent(Request $request){
        $data = array();
        $data['roll']= $request->roll;
        $data['name']= $request->name;
        $data['class']= $request->class;
        $data['comments']= $request->comments;

        $result=DB::table('students')->insert($data);
        if($result){
            Session::flash('message', 'Student Added Successful');
            return redirect()->route('attendance');
        }

    }

    public function viewStudents(Request $request){
        $class = $request->class;
        $data = array();
        $data['clas']=$class;
        $query=$data['results'] = DB::table('students')->where('class', $class)->get();
        if($query){
            return view('back.pages.attendance',$data);
        }

    }

    public function insertAttendance(Request $request){

        $status= $request->status;
        $student_id= $request->student_id;
        foreach($status as $sta){
            $data_Status[]=$sta;

        }
        // print_r($data_Status);
        // print_r($student_id);

        //  $time=time();    
         $data = array();
         $data['student_id']= json_encode($student_id);
         $data['status']=json_encode($data_Status);
         $data['date']= $request->date;
       $query=  DB::table('tbl_attendance_call')->insert($data);
        if($query){
            Session::flash('message', 'Attendance Added Successful');
            return redirect()->route('attendance');

        }


    }
}
