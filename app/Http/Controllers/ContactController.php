<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ApplyMailer;
use App\Mail\RegisterMail;
use App\Mail\BookMail;
use App\Mail\ResponseMail;
use App\Models\Comment;
use App\Models\GlobalSetting;
use Session;
use App\Models\Navigation;
use App\Job;
use App\Contact;

use Mail;

class ContactController extends Controller
{

    public function send(Request $request)
    {
        $data = $request->all();
        $mail = GlobalSetting::first();
        $token = $request->input('g-recaptcha-response');
        if(is_null($token)){
            //dd($token);
            return redirect('/contact-us')->with('error',"Recaptcha not checked. Submit With recaptcha again !!");
        }else{
        $email = $mail->site_email;
        $asd = "production@radiantnepal.com";
        $user_email = $request->input('email');
        
        $subject = "Contact Message";
            $msg = '<table border="1" style="background: #f1f1f1; color: #1b1b1b;">';
            $msg .= '<tr><td colspan="2"><h3>Contact message by '.$data['name'].'</h3></td></tr>';
            $msg .= '<tr><th>Full Name</th><td>'.$data['name'].'</td></tr>';
            $msg .= '<tr><th>Email Address</th><td>'.$data['email'].'</td></tr>';
            $msg .= '<tr><th>Phone Number</th><td>'.$data['phone'].'</td></tr>';
            $msg .= '<tr><th>Subject</th><td>'.$data['subject'].'</td></tr>';
            $msg .= '<tr><th>Message</th><td>' . $data['comment'] . '</td></tr>';
            $msg .= '</table>';
            
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        mail($email,$subject,$msg,$headers);
        
        if($data){
            return redirect('/contact-us')->with('success',"Message sent Sucessfully. Thank You!!");
        }
        }
        // return redirect()->back()->with('error',"Feedback Message failed. Try Again Later");
    }
    public function Contact(){
       //$job =Navigation::all()->where('nav_name',$slug)->first();        
        $global_setting = GlobalSetting::all()->first(); 
        $menus = Navigation::query()->where('nav_category','Main')->where('page_type','!=','Job')->where('page_type','!=','Photo Gallery')->where('page_type','!=','Notice')->where('parent_page_id',0)->where('page_status','1')->orderBy('position','ASC')->get();
        return view("admin.contact")->with(['menus'=>$menus,'global_setting'=>$global_setting,]);
    }
    public function jobApply($slug){
        $global_setting = GlobalSetting::all()->first(); 
        $menus = Navigation::query()->where('nav_category','Main')->where('page_type','!=','Job')->where('page_type','!=','Photo Gallery')->where('page_type','!=','Notice')->where('parent_page_id',0)->where('page_status','1')->orderBy('position','ASC')->get();
        return view("admin.apply")->with(['menus'=>$menus,'global_setting'=>$global_setting,'job_slug'=>$slug]);
    }
    public function jobApplyForm()
    {
      
        return view('admin.apply');
    }

    public function ContactStore(Request $req)
    {
        $validated = $req->validate([
            'first_name' => 'required',
        ]);

        if ($req->hasFile('file')) {
            $cv_file = $req->file('file');
            $extension = strtolower($cv_file->getClientOriginalExtension());
            $name = time() . '_' . $cv_file->getClientOriginalName();
            $destinationPath = public_path('contact_files');

            // Check if the uploaded file is a photo
            if ($extension === 'jpg' || $extension === 'jpeg' || $extension === 'png' || $extension === 'pdf' || $extension === 'docx' || $extension === 'doc' || $extension === 'xls' || $extension === 'xlxs')  {
                $cv_file->move($destinationPath, $name);
            }
            // Check if the uploaded file is a PDF
            // elseif ($extension === 'pdf') {
            //     $name = time() . '_' . $name; // Append timestamp to ensure unique file name
            //     $cv_file->storeAs('contact_files', $name);
            // } 
            else {
                return "Invalid file format. Please upload a photo (JPEG,JPG, PNG) or a PDF file.";
                return redirect()->back()->with('error', 'Invalid file format. Please upload a photo (JPEG, PNG) or a PDF file.');
            }
        } else {
            $name = null;
        }

        $contact = new Contact;
        $contact->first_name = $req['first_name'];
        $contact->number = $req['number'];
        $contact->email = $req['email'];
        $contact->file = $name;

        $contact->cv = $name; // Save the file name in the 'cv' field
        $contact->country = $req['country'];

        $contact->message = $req['message'];
        $contact->subject = $req['subject'];
        $contact->job_id = $req['job_id'];
        $contact->save();

        if ($contact) {
            // $name = $req['first_name'];
            // $number = $req['number'];
            // $email = $req['email'];
            // $country = $req['country'];
            // $message = $req['message'];
            // $file = "https://abizglobal.com.np/contact_files/".$contact->file;
            // $db_file_name = 'contact_files/'.$contact->file ;
            // $data = compact('name', 'email', 'number', 'message','country','file');
            // // return $data;
            // Mail::to('abizglobalnepal@gmail.com')->send(new ApplyMailer($data,$db_file_name));

            return redirect()->back()->with('contact', 'Message sent successfully!');
        } else {
            return redirect()->back()->with('error', 'Oops! Error occurred while submitting the form.');
        }
    }

    public function Destroy($slug){
        $contact = Contact::where('nav_name',$slug)->delete();
        return redirect('/');
    }

    public function AppliedJob(){
        //$navigations  = Navigation::where('page_type','Job')->orderBy('position','ASC')->get();
        $contacts = Contact::all();
        //return $jobs;
        //return $jobs->navigation;
        $categories = Navigation::where('page_type','Group')->where('parent_page_id',0)->get();
        //return $navigations;
        return view('admin.job.applied_job_list', compact('contacts','categories'));
    }
    public function Contactelete($slug){
        Contact::find($slug)->delete();
        return redirect()->back();
    }

   
}
