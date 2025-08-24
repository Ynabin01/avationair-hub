<?php
namespace App\Http\Controllers;
use App\Models\GlobalSetting;
use App\Models\Navigation;
use Illuminate\Http\Request;
use App\Models\NavigationItems;
use App\Job;
use App\Contact;

class HomeController extends Controller
{
    public function index(){


        // $all_jobs = Navigation::all()->where("page_type","Job")->first();
        // return $all_jobs;


        $menus = Navigation::query()->where('nav_category','Main')->where('page_type','!=','Job')->where('page_type','!=','Photo Gallery')->where('page_type','!=','Notice')->where('parent_page_id',0)->where('page_status','1')->orderBy('position','ASC')->get();
        //return $menus;
        //return $menus->first()->submenus;

        $jobs = Navigation::query()->where('page_type','Job')->latest()->get();
    
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', '%vacancy%')->where('page_type', 'Group')->latest()->exists()) {
            $vacancy_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', '%vacancy%')->where('page_type', 'Group')->latest()->first()->id;
            $vacancy = Navigation::query()->where('parent_page_id', $vacancy_id)->latest()->get();
        } else {
            $vacancy = null;
        }
        
       if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%about%")->where('page_type','Group')->latest()->first()!=null){
            $about_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%about%")->where('page_type','Group')->latest()->first()->id;
            $About = Navigation::query()->where('parent_page_id',$about_id)->latest()->first();
        }
        else{
            $About = null;
        }
      
        if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%banner%")->where('page_type','Group')->latest()->first()!=null){
            $banner_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%banner%")->where('page_type','Group')->latest()->first()->id;
            $banners = Navigation::query()->where('parent_page_id',$banner_id)->latest()->get();
        }
        else{  
            $banners = null;
        } 
        if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%slider%")->where('page_type','Group')->latest()->first()!=null){
            $slider_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%slider%")->where('page_type','Group')->latest()->first()->id;
            $sliders = Navigation::query()->where('parent_page_id',$slider_id)->latest()->get();
        }
        else{
            $sliders = null;
        }
        if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%misson%")->where('page_type','Group')->latest()->first()!=null){
            $misson_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%misson%")->where('page_type','Group')->latest()->first()->id;
            $missons = Navigation::query()->where('parent_page_id',$misson_id)->latest()->get();
            //return $misson;
        }
        else{
            $missons = null;
        }
        if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%vision%")->where('page_type','Group')->latest()->first()!=null){
            $vision_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%vision%")->where('page_type','Group')->latest()->first()->id;
            $vision = Navigation::query()->where('parent_page_id',$vision_id)->latest()->get();
            //return $misson;
        }
        else{
            $vision = null;
        }
        if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%partner%")->where('page_type','Group')->latest()->first()!=null){
            $partners_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%partner%")->where('page_type','Group')->latest()->first()->id;
            $partners = Navigation::query()->where('parent_page_id',$partners_id)->latest()->get();
            //return $partners;
        }
        else{
            $partners = null;
        }
        if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%goal%")->where('page_type','Group')->latest()->first()!=null){
            $goal_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%goal%")->where('page_type','Group')->latest()->first()->id;
            $goal = Navigation::query()->where('parent_page_id',$goal_id)->latest()->get();
            //return $misson;
        }
        else{
            $goal = null;
        }
        if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%message%")->where('page_type','Group')->latest()->first()!=null){
            $message_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%message%")->where('page_type','Group')->latest()->first()->id;
            $message = Navigation::query()->where('parent_page_id',$message_id)->latest()->first();
        }
        else{
            $message = null;
        } 
        if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%testimonial%")->where('page_type','Group')->latest()->first()!=null){
            $testimonial_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%testimonial%")->where('page_type','Group')->latest()->first()->id;
            $testimonial = Navigation::query()->where('parent_page_id',$testimonial_id)->latest()->get();
        }
        else{
            $testimonial = null;
        }
        if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%statistic%")->where('page_type','Group')->latest()->first()!=null){
            $statistic_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%statistic%")->where('page_type','Group')->latest()->first()->id;
            $statistics = Navigation::query()->where('parent_page_id',$statistic_id)->latest()->get();
        }
        else{
            $statistics = null;
        } 
        
        if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%offers%")->where('page_type','Group')->latest()->first()!=null){
            $offers_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%offers%")->where('page_type','Group')->latest()->first()->id;
            $offers = Navigation::query()->where('parent_page_id',$offers_id)->latest()->get();
            //return $partners;
        }
        else{
            $offers = null;
        }
        if(Navigation::query()->where('nav_category','Main')->where('nav_name', 'LIKE', "%services%")->where('page_type','Group')->latest()->first()!=null){
            $services_id = Navigation::query()->where('nav_category','Main')->where('nav_name', 'LIKE', "%services%")->where('page_type','Group')->latest()->first()->id;
            $services = Navigation::query()->where('id',$services_id)->latest()->first();
            // return $services;
        }
        else{
            $services = null;
        }
        if(Navigation::query()->where('nav_category','Home')->where('id', 2907)->where('page_type','Group')->latest()->first()!=null){
            $abroad = Navigation::query()->where('parent_page_id',2907)->get();
            // return $abroad;
        }
        else{
            $abroad = null;
        }
        if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%projectlist%")->where('page_type','Group')->latest()->first()!=null){
            $projectlist_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%projectlist%")->where('page_type','Group')->latest()->first()->id;
            $projectlist = Navigation::query()->where('parent_page_id',$projectlist_id)->latest()->get();
            // return $projectlist;
        }
        
        else{
            $projectlist = null;
        }
        if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%newsbanner%")->where('page_type','Group')->latest()->first()!=null){
            $newsbanner_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%newsbanner%")->where('page_type','Group')->latest()->first()->id;
            $newsbanner = Navigation::query()->where('parent_page_id',$newsbanner_id)->latest()->get();
            //return $partners;
        }
        else{
            $newsbanner = null;
        }
        if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%features%")->where('page_type','Group')->latest()->first()!=null){
            $features_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%features%")->where('page_type','Group')->latest()->first()->id;
            $features  = Navigation::query()->where('parent_page_id',$features_id)->latest()->get();
            //return $partners;
        }
        else{
            $features = null;
        }
        if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%pricingplan%")->where('page_type','Group')->latest()->first()!=null){
            $pricingplan_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%pricingplan%")->where('page_type','Group')->latest()->first()->id;
            $pricingplan  = Navigation::query()->where('parent_page_id',$pricingplan_id)->latest()->get();
            //return $partners;
        }
        else{
            $pricingplan = null; 
        }
        // if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%photos%")->where('page_type','Group')->latest()->first()!=null){
        //     $photos_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%photos%")->where('page_type','Group')->latest()->first()->id;
        //     $photos= Navigation::query()->where('parent_page_id',$photos_id)->latest()->get();
        //     //return $partners;
        // }
        // else{
        //     $photos= null;
        // }
        // if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%jobs%")->where('page_type','Group')->latest()->first()!=null){
        //     $jobs_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%jobs%")->where('page_type','Group')->latest()->first()->id;
        //     $jobs = Navigation::query()->where('parent_page_id',$jobs_id)->orderBy('position','DESC')->get();
        // }
        // else{
        //     $jobs = null;
        // }
        //return $misson;
        $job_categories = Navigation::all()->where('page_type','Group Jobs');
        // if($category->count()>0){
        //     $category_id = $category->first()->id;
        //     $job_categories = Navigation::all()->where('parent_page_id',$category_id);
        // }
        // $category = Navigation::all()->where('page_type','Group News');
        // if($category->count()>0){
        //     $category_id = $category->first()->id;
        //     $newsevents = Navigation::query()->where('parent_page_id',2633)->latest()->get();
            // return "d";
        // }
        // return $job_categories;
    
        $global_setting = GlobalSetting::all()->first(); 
        $photos = Navigation::query()->where('id',2650)->where('page_status','1')->first();
        $blogs = Navigation::query()->where('id',2756)->where('page_status','1')->first();

        //return $missons;       
        return view("website.index")->with(['blogs'=>$blogs, 'partners'=>$partners,'offers'=>$offers,'photos'=>$photos,'vacancy'=>$vacancy,'pricingplan'=>$pricingplan,'features'=>$features,'vision'=>$vision,'goal'=>$goal,'services'=>$services,'newsbanner'=>$newsbanner,'job_categories'=>$job_categories,'testimonial'=>$testimonial,'statistics'=>$statistics,'banners'=>$banners, 'about'=>$About,'menus'=>$menus,'global_setting'=>$global_setting,'sliders'=>$sliders,'missons'=>$missons,'message'=>$message,'jobs'=>$jobs,'abroad'=>$abroad]);
    }


    public function category($menu){

        
        // return $menu." this is category";
        $menus = Navigation::query()->where('nav_category','Main')->where('page_type','!=','Job')->where('page_type','!=','Photo Gallery')->where('page_type','!=','Notice')->where('parent_page_id',0)->where('page_status','1')->orderBy('position','ASC')->get();
        //return $menus->first()->submenus;
        $jobs = Navigation::query()->where('page_type','Job')->latest()->get();
        if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%about%")->where('page_type','Group')->latest()->first()!=null){
            $about_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%about%")->where('page_type','Group')->latest()->first()->id;
            $About = Navigation::query()->where('parent_page_id',$about_id)->latest()->first();
        }
        else{
            $About = null;
        }
        if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%banner%")->where('page_type','Group')->latest()->first()!=null){
            $banner_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%banner%")->where('page_type','Group')->latest()->first()->id;
            $banners = Navigation::query()->where('parent_page_id',$banner_id)->latest()->get();
        }
        else{
            $banners = null;
        }
        
        if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%slider%")->where('page_type','Group')->latest()->first()!=null){
            $slider_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%slider%")->where('page_type','Group')->latest()->first()->id;
            $sliders = Navigation::query()->where('parent_page_id',$slider_id)->latest()->get();
        }
        else{
            $sliders = null;
        }
        if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%misson%")->where('page_type','Group')->latest()->first()!=null){
            $misson_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%misson%")->where('page_type','Group')->latest()->first()->id;
            $missons = Navigation::query()->where('parent_page_id',$misson_id)->latest()->get();
            //return $misson;
        }
        else{
            $missons = null;
        }
        if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%message%")->where('page_type','Group')->latest()->first()!=null){
            $message_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%message%")->where('page_type','Group')->latest()->first()->id;
            $message = Navigation::query()->where('parent_page_id',$message_id)->latest()->first();
        }
        else{
            $message = null;
        }
        if(Navigation::query()->where('nav_category','Main')->where('nav_name', 'LIKE', "%services%")->where('page_type','Group')->latest()->first()!=null){
            $services_id = Navigation::query()->where('nav_category','Main')->where('nav_name', 'LIKE', "%services%")->where('page_type','Group')->latest()->first()->id;
            $services = Navigation::query()->where('parent_page_id',$services_id)->latest()->paginate(8);
            // return $services;
        }
        else{
            $services = null;
        }
        if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%process%")->where('page_type','Group')->latest()->first()!=null){
            $process_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%process%")->where('page_type','Group')->latest()->first()->id;
            $process = Navigation::query()->where('parent_page_id',$process_id)->latest()->get();
        }
        else{
            $process = null;
        }
        if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%application%")->where('page_type','Group')->latest()->first()!=null){
            $application_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%application%")->where('page_type','Group')->latest()->first()->id;
            $application = Navigation::query()->where('parent_page_id',$application_id)->latest()->get();
        }
        else{
            $application = null;
        }
        if(Navigation::query()->where('nav_category','Main')->where('page_type','Group Project')->latest()->first()!=null){
            $projectlist_id = Navigation::query()->where('nav_category','Main')->where('page_type','Group Project')->latest()->first()->parent_page_id;
            $projectlist = Navigation::query()->where('parent_page_id',$projectlist_id)->latest()->get();
            // return $projectlist_id;
            // return $projectlist;
        }
        else{
            $projectlist = null;
        }
        
        $job_categories = Navigation::all()->where('nav_category','Main')->where('page_type','Group')->where('banner_image','!=',null);
        //sreturn $job_categories;
        $global_setting = GlobalSetting::all()->first();        
        //return view("website.index")->with(['jobs'=>$jobs,'banners'=>$banners,'about'=>$About,'menus'=>$menus,'global_setting'=>$global_setting,'sliders'=>$sliders,'missons'=>$missons,'job_categories'=>$job_categories,'message'=>$message,'process'=>$process]);
        if(Navigation::all()->where('nav_name',$menu)->count()>0){
            // $job_id = Navigation::all()->where('nav_name',$menu)->first()->id;        
            $jobs = Navigation::query()->where('page_type','Job')->orderBy('created_at', 'desc')->get();
        }
        else{
            $jobs = null;
        }
        $slug_detail = Navigation::all()->where('nav_name',$menu);
        $slug1 = $slug_detail->first();
        //
        if(Navigation::all()->where('nav_name',$menu)->count()>0){
                    //$normal_notice_page = Navigation::all()->where('nav_name',$slug)->first();
            $category_id = Navigation::all()->where('nav_name',$menu)->first()->id;
            if(Navigation::all()->where('parent_page_id',$category_id)->count()>0){
                   $category_type = Navigation::all()->where('parent_page_id',$category_id)->first()->page_type;
                }
            else{
                   $category_type = Navigation::all()->where('nav_name',$menu)->where('page_type','!=','Notice')->first()->page_type;
                 }
         }
        else{
            $category_type = null;
        }
        if($category_type == "Photo Gallery"){
            //return "return to page gallary";
            $photos = Navigation::query()->where('parent_page_id',$category_id)->where('page_status','1')->latest()->get();
            return view("website.Photo Gallery")->with(['photos'=>$photos,'jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug_detail'=>$slug_detail]);
        }
        elseif($category_type == "Job"){
            // return "return to view Job";
            $normal = Navigation::find($category_id);
            // return $normal->childs;
            return view("website.Project")->with(['jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug_detail'=>$slug_detail]);
        }
        elseif($category_type == "Notice"){
            // return "return to view Notice";
            $notices = Navigation::query()->where('parent_page_id',$category_id)->latest()->get();
            $notice_heading = Navigation::find('parent_page_id');
            // return $notice_heading;
            return view("website.notice")->with(['notices'=>$notices,'jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug_detail'=>$slug_detail]);
        }
        elseif($menu == "services"){
            // return "hlo";
            return view("website.mainservice")->with(['services'=>$services, 'jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug1'=>$slug1,'slug2'=>""]);

        }
        elseif($menu == "enquiry"){
            // return "hlo";
            return view("website.enquiry")->with(['services'=>$services, 'jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug1'=>$slug1,'slug2'=>""]);

        }
        elseif($menu == "blog"){
            // return "hlo";
            // $blogs = $slug1->childs()->paginate(5);

            $contentFilter = request()->input('content');    
            $blogs = $slug1->childs()->where('long_content', $contentFilter)->paginate(5)->appends(['content' => $contentFilter]);

            // return $filteredBlogs;
            return view("website.blog")->with(['blogs'=>$blogs, 'jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug1'=>$slug1,'slug2'=>""]);

        }
        elseif($menu == "universities"){
            // return "hlo";
            return view("website.universities")->with(['services'=>$services, 'jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug1'=>$slug1,'slug2'=>""]);

        }
        elseif($category_type == "Normal"){
            // return $category_id;
            $normal = Navigation::find($category_id);
            return view("website.normal")->with(['normal'=>$normal,'jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug1'=>$slug1]);
        }
        elseif($category_type == "Group Project"){
            $normal = Navigation::find($category_id);
            if ($normal->nav_name == "project") {
                # code...
                return view("website.projectlist")->with(['projectlist'=>$projectlist, 'normal'=>$normal,'jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug1'=>$slug1]);
            }
            else{
                // return $normal;
            return view("website.projectlist")->with(['projectlist'=>$projectlist, 'normal'=>$normal,'jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug1'=>$slug1,]);

            }
        }
        elseif($category_type == "Pricing"){
            //return $category_id;
            $pricing = Navigation::find($category_id);
            return view("website.pricing")->with(['pricing'=>$pricing, 'jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug1'=>$slug1]);
        }

        // elseif ($category_type == "Group News") {
        //     $newsevents = Navigation::find($category_id);
        //     // $newsevents = Navigation::where("id",$category_id)->latest()->get();
        //     $newsevents = $newsevents->childslatest;
        //     return view("website.newsevents")->with(['newsevents' => $newsevents,'jobs' => $jobs,'menus' => $menus,'sliders' => $sliders,'about' => $About,'global_setting' => $global_setting,'slug1' => $slug1]);
        // }
        elseif($category_type == "Group Project"){
        
            // return $category_id; 

            $Project = Navigation::find($category_id);
            return view("website.projectlist")->with(['projectlist'=>$projectlist, 'jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug1'=>$slug1]);
        }
        else{
            if($jobs!=null){   
                return redirect('/');         
                //  return view("website.job-list")->with(['jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug_detail'=>$slug_detail]);
            }
            else{
                return redirect('/');
            }
        }

    }

    public function subcategory($slug1,$submenu){
        
        // return "subcategory::".$submenu;
            $menus = Navigation::query()->where('nav_category','Main')->where('page_type','!=','Job')->where('page_type','!=','Photo Gallery')->where('page_type','!=','Notice')->where('parent_page_id',0)->where('page_status','1')->orderBy('position','ASC')->get();
            //return $menus->first()->submenus;
            $jobs = Navigation::query()->where('page_type','Job')->latest()->get();
            if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%about%")->where('page_type','Group')->latest()->first()!=null){
                $about_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%about%")->where('page_type','Group')->latest()->first()->id;
                $About = Navigation::query()->where('parent_page_id',$about_id)->latest()->first();
            }
            else{
                $About = null;
            }
            if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%banner%")->where('page_type','Group')->latest()->first()!=null){
                $banner_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%banner%")->where('page_type','Group')->latest()->first()->id;
                $banners = Navigation::query()->where('parent_page_id',$banner_id)->latest()->get();
            }
            else{
                $banners = null;
            }
            if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%slider%")->where('page_type','Group')->latest()->first()!=null){
                $slider_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%slider%")->where('page_type','Group')->latest()->first()->id;
                $sliders = Navigation::query()->where('parent_page_id',$slider_id)->latest()->get();
            }
            else{
                $sliders = null;
            }
            if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%misson%")->where('page_type','Group')->latest()->first()!=null){
                $misson_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%misson%")->where('page_type','Group')->latest()->first()->id;
                $missons = Navigation::query()->where('parent_page_id',$misson_id)->latest()->get();
                //return $misson;
            }
            else{
                $missons = null;
            }
            if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%detailspage%")->where('page_type','Projectdetails')->latest()->first()!=null){
                $detailspage_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%detailspage%")->where('page_type','Projectdetails')->latest()->first()->id;
                $detailspage = Navigation::query()->where('parent_page_id',$detailspage_id)->latest()->get();
        //    return  $detailspage;
        
            }
            else{
                $detailspage = null;
            } 
            
            if(Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%process%")->where('page_type','Group')->latest()->first()!=null){
                $process_id = Navigation::query()->where('nav_category','Home')->where('nav_name', 'LIKE', "%process%")->where('page_type','Group')->latest()->first()->id;
                $process = Navigation::query()->where('parent_page_id',$process_id)->latest()->get();
            }
            else{
                $process = null;
            }
            // return $misson; 
            $job_categories = Navigation::all()->where('nav_category','Main')->where('page_type','Group')->where('banner_image','!=',null);
            //sreturn $job_categories;
            $global_setting = GlobalSetting::all()->first();        
            //return view("website.index")->with(['jobs'=>$jobs,'banners'=>$banners,'about'=>$About,'menus'=>$menus,'global_setting'=>$global_setting,'sliders'=>$sliders,'missons'=>$missons,'job_categories'=>$job_categories,'message'=>$message,'process'=>$process]);
            if(Navigation::all()->where('nav_name',$submenu)->count()>0){
                $job_id = Navigation::all()->where('nav_name',$submenu)->first()->id;        
                $jobs = Navigation::query()->where('parent_page_id',$job_id)->where('page_type','Job')->orderBy('created_at', 'desc')->get();
            }
            else{
                $jobs = null;
            }
        
            $slug_detail = Navigation::all()->where('nav_name',$submenu);
            $slug1 = Navigation::where('nav_name',$slug1)->first();
            $slug2 = Navigation::where('nav_name',$submenu)->first();
            // $slug1 = $slug1;
            // $slug2 = $submenu;
            //
            if($slug1->id == '2753'){
                return view("website.study-abroad")->with(['jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug_detail'=>$slug_detail,'slug1'=>$slug1,'slug2'=>$slug2]);

            }
            else if($slug1->id == '2751'){
                return view("website.universitydetails")->with(['jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug_detail'=>$slug_detail,'slug1'=>$slug1,'slug2'=>$slug2]);

            }
            else if($slug1->id == '2756'){
                return view("website.blogdetails")->with(['jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug_detail'=>$slug_detail,'slug1'=>$slug1,'slug2'=>$slug2]);

            }
            if(Navigation::all()->where('nav_name',$submenu)->count()>0){
                $subcategory_id = Navigation::all()->where('nav_name',$submenu)->first()->id;
                if(Navigation::all()->where('parent_page_id',$subcategory_id)->count()>0){
                    $subcategory_type = Navigation::all()->where('parent_page_id',$subcategory_id)->first()->page_type;//slug/slug2(GROUP)
                    
                    if($subcategory_type == "Team"){
                        //return "return to page gallary";
                        $teams = Navigation::query()->where('parent_page_id',$subcategory_id)->orderBy('position','ASC')->get();
                        // ->latest()->get();
                        
                        return view("website.team")->with(['teams'=>$teams,'jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug_detail'=>$slug_detail,'slug1'=>$slug1,'slug2'=>$slug2]);
                     
                    }
                    // if($subcategory_type == "Photo Gallery"){
                    //     //return "return to page gallary";
                    //     $photos = Navigation::query()->where('parent_page_id',$subcategory_id)->latest()->get();
                    //     return view("website.Photogallery")->with(['photos'=>$photos,'jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug_detail'=>$slug_detail,'slug1'=>$slug1,'slug2'=>$slug2]);
                    // }
                }
                if(Navigation::all()->where('nav_name',$submenu)->where('page_type','Group Jobcategory')->count()>0){
                    $subcategory_type = Navigation::all()->where('nav_name',$submenu)->first()->page_type;//slug/slug2(group)
                }
                else{
                
                    #return Navigation::all()->where('nav_name',$submenu)->where('page_type','Normal');
                    if(Navigation::all()->where('nav_name',$submenu)->where('page_type','Normal')->count()>0){
                        $subcategory_type = Navigation::all()->where('nav_name',$submenu)->where('page_type','Normal')->first()->page_type;//slug/slug2(except group)
                    }
                    else if(Navigation::all()->where('nav_name',$submenu)->where('page_type','Group News')->count()>0){
                        $subcategory_type = Navigation::all()->where('nav_name',$submenu)->first()->page_type;//slug/slug2(group)
                    }
                    else if(Navigation::all()->where('nav_name',$submenu)->where('page_type','Photo Gallery')->count()>0){
                        $subcategory_type = Navigation::all()->where('nav_name',$submenu)->where('page_type','Photo Gallery')->first()->page_type;//slug/slug2(except group)
                    
                    }
                    else if(Navigation::all()->where('nav_name',$submenu)->where('page_type','Video Gallery')->count()>0){
                        $subcategory_type = Navigation::all()->where('nav_name',$submenu)->where('page_type','Video Gallery')->first()->page_type;//slug/slug2(except group)
                    }
                    else if(Navigation::all()->where('nav_name',$submenu)->where('page_type','Message')->count()>0){
                        $subcategory_type = Navigation::all()->where('nav_name',$submenu)->where('page_type','Message')->first()->page_type;//slug/slug2(except group)
                    }
                    else if(Navigation::all()->where('nav_name',$submenu)->where('page_type','Team')->count()>0){
                        $subcategory_type = Navigation::all()->where('nav_name',$submenu)->where('page_type','Team')->first()->page_type;//slug/slug2(except group)
                    }
                    else if(Navigation::all()->where('nav_name',$submenu)->where('page_type','Group')->count()>0){
                        $subcategory_type = Navigation::all()->where('nav_name',$submenu)->where('page_type','Group')->first()->page_type;//slug/slug2(except group)
                    }
                    else if(Navigation::all()->where('nav_name',$submenu)->where('page_type','Pricing')->count()>0){
                        $subcategory_type = Navigation::all()->where('nav_name',$submenu)->where('page_type','Pricing')->first()->page_type;//slug/slug2(except group)
                    }
                    
                    else if(Navigation::all()->where('nav_name',$submenu)->where('page_type','Projectdetails')->count()>0){
                        $subcategory_type = Navigation::all()->where('nav_name',$submenu)->where('page_type','Projectdetails')->first()->page_type;//slug/slug2(except group)
                    }
                    
                    else{
                        
                        if($submenu=="team")
                        {
                            
                            return view("website.team")->with(['jobs'=>Job::all(),'slug1'=>$slug1,'slug2'=>$slug2]);
                        }
                        // return "Sad";
                        return redirect('/');
                        //submenu is page_type=Group and its internal items are empty
                    }
                }
            
            }
            else{
                $subcategory_type = null;
            }
                // return "return to view Notice";
            
            if($subcategory_type == "Photo Gallery"){
                // return $subcategory_id;
            
                $photos = NavigationItems::query()->where('navigation_id',$subcategory_id)->latest()->get();
                return view("website.photogallery")->with(['photos'=>$photos,'jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug_detail'=>$slug_detail,'slug1'=>$slug1,'slug2'=>$slug2]);
                
            }
            
            // if($subcategory_type == "Group News"){
            //     // return "return to page gallary";
            
            //     $newsevents = Navigation::query()->where('id',$subcategory_id)->latest()->get();
            //     $news =  $newsevents->first()->childs;
            //     // return $newsevents;
            //     return view("website.newsevents")->with(['newsevents'=>$news,'jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug_detail'=>$slug_detail,'slug1'=>$slug1,'slug2'=>$slug2]);
                
            // }
            // if($subcategory_type == "Projectdetails"){
            //     // return "return to page gallary";
            
            //     $detailspage = Navigation::query()->where('id',$subcategory_id)->latest()->get();
            //     $detailspage =  $detailspage->first()->childs;
            //     // return $subcategory_id;
            //     return view("website.detailspage")->with(['detailspage'=>$detailspage,'jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug_detail'=>$slug_detail,'slug1'=>$slug1,'slug2'=>$slug2]);
                
            // }
            if($subcategory_type == "Video Gallery"){
                // return "return to page gallary";
                $photos = NavigationItems::query()->where('navigation_id',$subcategory_id)->latest()->paginate(8);
                return view("website.videogallery")->with(['photos'=>$photos,'jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug_detail'=>$slug_detail,'slug1'=>$slug1,'slug2'=>$slug2]);
            }
        
            elseif($subcategory_type == "Job"){
                // return $subcategory_type;
                //return "return to view job";
                return view("website.Project")->with(['jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug_detail'=>$slug_detail,'slug1'=>$slug1,'slug2'=>$slug2]);
            }
        
            elseif($subcategory_type == "Notice"){
                // return "return to view Notice";
                $notices = Navigation::query()->where('parent_page_id',$subcategory_id)->where('page_type','Notice')->latest()->get();
                $notice_heading = Navigation::find($subcategory_id);
                //return $notice_heading;
                return view("website.notice")->with(['notice_heading'=>$notice_heading,'notices'=>$notices,'jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug_detail'=>$slug_detail,'slug1'=>$slug1,'slug2'=>$slug2]);
            }
            elseif($subcategory_type == "Normal"){
                
                $normal = Navigation::find($subcategory_id);
                return view("website.normal")->with(['normal'=>$normal,'jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug1'=>$slug1,'slug2'=>$slug2]);
            }
        
            elseif($subcategory_type == "Group Project"){
                
                $universities = Navigation::find($subcategory_id);
                return view("website.universities")->with(['universities'=>$universities,'jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug1'=>$slug1,'slug2'=>$slug2]);
            }
        

            elseif($subcategory_type == "Message"){
                    
                $messagechairman = Navigation::find($subcategory_id);
                // return $normal;
                return view("website.messagechairman")->with([ 'messagechairman'=>$messagechairman,'jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug1'=>$slug1,'slug2'=>$slug2]);
            }

            elseif($subcategory_type == "Team"){
                    
                $team = Navigation::find($subcategory_id);
                // return $normal;
                return view("website.team")->with([ 'teams'=>$team,'jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug1'=>$slug1,'slug2'=>$slug2]);
            }
            elseif($subcategory_type == "Group"){   
                
                $photos = Navigation::query()->where('parent_page_id',$subcategory_id)->paginate(6);
                // return $photos;
                return view("website.galleryfolder")->with(['photos'=>$photos,'jobs'=>$jobs,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug1'=>$slug1,'slug2'=>$slug2]);
            }
        
            elseif($subcategory_type == "Group"){
                //return "return to job else";
                return view("website.Project")->with(['jobs'=>$jobs, 'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug_detail'=>$slug_detail,'slug1'=>$slug1,'slug2'=>$slug2]);
            }
            elseif($subcategory_type == "Group project"){
                //return "return to job else";
                $job_categories = Navigation::query()->where('parent_page_id',$subcategory_id)->get();
                #return $job_categories;
                return view("website.jobcategories")->with(['job_categories'=>$job_categories,'menus'=>$menus,'sliders'=>$sliders,'about'=>$About,'global_setting'=>$global_setting,'slug_detail'=>$slug_detail,'slug1'=>$slug1,'slug2'=>$slug2]);
            }
            else{
            
                return redirect("/");
            }
            
        }

    public function singlePage($slug){
        
            // $slug1 = Navigation::all()->where('nav_name',$Job)->first();
            $job =Navigation::all()->where('nav_name',$slug)->first();
            // return $job->parent_page_id;
            // $job_details_parent = Navigation::find($job->parent_page_id);
            // return 
            if($job->parents){
                $slug1 = $job->parents->caption;
            }
            else{
                $slug1 = "Jobdetails";
            }
    
            $slug2 = $job->caption;
            $global_setting = GlobalSetting::all()->first(); 
            $menus = Navigation::all()->where('nav_category','Main')->where('page_type','!=','Job')->where('page_type','!=','Photo Gallery')->where('page_type','!=','Notice')->where('parent_page_id',0);
            return view("website.job_detail_single_page")->with(['jobdetail'=>$job,'job'=>$job,'menus'=>$menus,'global_setting'=>$global_setting,'slug1'=>$slug1,'slug2'=>$slug2]);
        
    }


    public function search(Request $req){

        $slug = $req->input('slug');
        $contentFilter = request()->input('content');    

        // return $slug.$contentFilter;
      
        // $blogs = Navigation::where('parent_page_id', 2756)
        //         ->where(function($query) use ($slug) {
        //             $query->where('caption', 'LIKE', '%' . $slug . '%')
        //                   ->orWhere('updated_at', 'LIKE', '%' . $slug . '%');
        //         })
        //         ->paginate(5);

        // $blogs = Navigation::where('parent_page_id', 2756)
        //         ->where(function($query) use ($slug) {
        //             $query->where('caption', 'LIKE', '%' . $slug . '%')
        //                   ->orWhereRaw("DATE_FORMAT(updated_at, '%Y-%m-%d') LIKE ?", ['%' . $slug . '%'])
        //                   ->orWhereRaw("DATE_FORMAT(updated_at, '%Y-%m') LIKE ?", ['%' . $slug . '%'])
        //                   ->orWhereRaw("DATE_FORMAT(updated_at, '%Y') LIKE ?", ['%' . $slug . '%']);
        //         })
        //         ->paginate(5);
        
        $blogs = Navigation::where('parent_page_id', 2756)
                        ->where('long_content', $contentFilter)
                        ->where(function($query) use ($slug) {
                            $query->where('caption', 'LIKE', '%' . $slug . '%')
                                ->orWhereRaw("MONTHNAME(updated_at) LIKE ?", ['%' . $slug . '%'])
                                ->orWhereRaw("DATE_FORMAT(updated_at, '%Y-%m-%d') LIKE ?", ['%' . $slug . '%'])
                                ->orWhereRaw("DATE_FORMAT(updated_at, '%Y-%m') LIKE ?", ['%' . $slug . '%'])
                                ->orWhereRaw("DATE_FORMAT(updated_at, '%Y') LIKE ?", ['%' . $slug . '%']);
                        })
                        ->paginate(5);

            


        $slug1 = Navigation::where('id', 2756)->first(); 
        $slug2 = $slug;


        $global_setting = GlobalSetting::all()->first(); 
        $menus = Navigation::all()->where('nav_category','Main')->where('page_type','!=','Job')->where('page_type','!=','Photo Gallery')->where('page_type','!=','Notice')->where('parent_page_id',0);
        
        // $blogs = $slug1->childs()->paginate(5);
        return view("website.blog")->with(['blogs'=>$blogs, 'jobs'=>'','menus'=>$menus,'sliders'=>'','about'=>'','global_setting'=>$global_setting,'slug1'=>$slug1,'slug2'=>$slug2]);

    }

    public function ReadMore($slug){
        // return $slug;
        $normal = Navigation::where('parent_page_id',$slug)->first();
        // return $normal;
        $global_setting = GlobalSetting::all()->first(); 
        $menus = Navigation::query()->where('nav_category','Main')->where('page_type','!=','Job')->where('page_type','!=','Photo Gallery')->where('page_type','!=','Notice')->where('parent_page_id',0)->where('page_status','1')->orderBy('position','ASC')->get();
        return view("website.normal")->with(['normal'=>$normal,'menus'=>$menus,'global_setting'=>$global_setting,'job_slug'=>$slug]);
    }


    public function FullStoryRead($slug){
        // return $slug;
        $detailspage = Navigation::where('id',$slug)->first();
        // return $detailspage;
        $global_setting = GlobalSetting::all()->first(); 
        $menus = Navigation::query()->where('nav_category','Main')->where('page_type','!=','Job')->where('page_type','!=','Photo Gallery')->where('page_type','!=','Notice')->where('parent_page_id',0)->where('page_status','1')->orderBy('position','ASC')->get();
        return view("website.detailspage")->with(['detailspage'=>$detailspage,'menus'=>$menus,'global_setting'=>$global_setting,'job_slug'=>$slug]);
    }
    public function viewAll(){
         $menus = Navigation::query()->where('nav_category','Main')->where('page_type','!=','Job')->where('page_type','!=','Photo Gallery')->where('page_type','!=','Notice')->where('parent_page_id',0)->where('page_status','1')->orderBy('position','ASC')->get();
         //return $menus;
         $job_categories = Navigation::all()->where('nav_category','Main')->where('page_type','Group')->where('banner_image','!=',null);
        $global_setting = GlobalSetting::all()->first();
        return view("website.all_category")->with(['job_categories'=>$job_categories,'global_setting'=>$global_setting,'menus'=>$menus]);
    }
    public function getJobListWithCategory($category_name){

        $slug1 = Navigation::all()->where('nav_name',$category_name)->first();
        // return $slug1
        // $slug1 = [];
        // $slug1 = Navigation::where('nav_name',joblist)
        $category_id = Navigation::all()->where('nav_name',$category_name)->first()->id;
        $jobs = Navigation::query()->where('parent_page_id',$category_id)->get();
        return view('website.job-list')->with(['jobs'=>$jobs,'slug1'=>$slug1,]);
    }
    public function GotoGallery($slug){
        // return "hi";
        $slug1  = "Photos";
        $slug2 = $navigation_id = Navigation::all()->where('nav_name',$slug)->first()->caption;
        // return Navigation::all()->where('id',$subcategory_id);
        $navigation_id = Navigation::all()->where('nav_name',$slug)->first()->id;
        // return $navigation_id;
        $photos = NavigationItems::query()->where('navigation_id',$navigation_id)->latest()->get();
        return view("website.photogallery")->with(['photos'=>$photos,'slug1'=>$slug1,'slug2'=>$slug2]);
    }

    public function Appointment(){
        //$job =Navigation::all()->where('nav_name',$slug)->first();        
         $global_setting = GlobalSetting::all()->first(); 
         $menus = Navigation::query()->where('nav_category','Main')->where('page_type','!=','Job')->where('page_type','!=','Photo Gallery')->where('page_type','!=','Notice')->where('parent_page_id',0)->where('page_status','1')->orderBy('position','ASC')->get();
         return view("website.enquiry")->with(['menus'=>$menus,'global_setting'=>$global_setting,]);
    }

    public function AppointmentStore(Request $req)
    {

        // $validated = $req->validate([
        //     'name' => 'required',
        //     'number' => 'required',
        // ]);

        $contact = new Contact;
        $contact->first_name = $req['name'];
        $contact->email = $req['email'];
        $contact->country = $req['country'];
        $contact->permanent_address = $req['faculty'];
        $contact->temporary_address = $req['edu_lvl'];

        $selectedValues = $req['have_you_done'];
        $contact->cv =  implode(', ', $selectedValues);

        $contact->number = $req['phone'];
        $contact->file = $req['score'];

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

            return redirect()->back()->with('contact', 'Appointment sent successfully!');
        } else {
            return redirect()->back()->with('error', 'Oops! Error occurred while submitting the form.');
        }
    }


  
}

