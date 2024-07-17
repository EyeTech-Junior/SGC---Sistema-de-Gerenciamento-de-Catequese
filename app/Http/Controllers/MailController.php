<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    public function sendEmail(String $id)
    {
        $list =DB::table('classroom_students')
            ->select('id','classroom_id','student_id')
            ->where('classroom_id','LIKE','%'.$id.'%')->get();
        $students = DB::table('students')->select('id','email')->get();
        try{
            foreach ($list as $item){
                foreach ($students as $mail){
                    if ($item->student_id == $mail->id)
                        Mail::to("$mail->email")->send(new Contact());
                }
            }
            return redirect()->back()->with('success', 'success');
        }catch(Exception){
            return redirect()->back()->with('error', 'error');
        }
    }
}
