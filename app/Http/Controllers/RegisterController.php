<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Auth;
use App\Models\Register;
use App\Models\Images; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class RegisterController extends Controller
{
   public function register(Request $req){
      return  view('register');
  }


  
  public function addregister(Request $req)
  {
      $validatedData = $req->validate([
          'first_name' => 'required|string|max:20',
          'last_name' => 'required|string|max:20',
          'contact_num' => 'required|string|min:9|max:10|regex:/^[0-9]+$/',
          'email_add' => 'required|email',
          'password' => 'required|string|min:8|max:12|regex:/^(?=.*?[A-Z])(?=.*?[!@#$%^&*()\-_=+{};:,<.>]).{8,12}$/',
          'profile_image.*' => 'required|image|mimes:jpeg,png,jpg|max:1024', 
      ], [
          'first_name.required' => __('First Name is required'),
          'last_name.required' => __('Last Name is required'),
          'contact_num.required' => __('Contact number is required'),
          'contact_num.numeric' => __('Contact number must be numeric'),
          'contact_num.min' => __('Contact number must be at least 9 digits'),
          'contact_num.max' => __('Contact number must not exceed 10 digits'),
          'email_add.required' => __('Email is required'),
          'email_add.email' => __('Email is invalid'),
          'password.max' => __('Password must have 12 characters'),
          'password.min' => __('Password must have at least 8 characters'),
          'password.required' => __('Password must be 8 - 12 characters, containing at least one uppercase letter and one special character'),
          'profile_image.*.required' => __('Please upload an image.'),
          'profile_image.*.image' => __('The file must be an image.'),
          'profile_image.*.max' => __('The image must not be greater than 1MB.'),
          'profile_image.*.mimes' => __('The image must be a file of type: jpeg, png, jpg.'),
      ]);
      
      $register = new Register;  
      $register->first_name = $req->first_name;
      $register->last_name = $req->last_name;
      $register->contact_num = $req->contact_num;
      $register->email_add = $req->email_add;
      $register->password = bcrypt($req->password);
      $register->save(); 


      if ($req->hasFile('profile_image')) {
          $uploadedImagesCount = 0;
         
          foreach ($req->file('profile_image') as $image) {
              if ($uploadedImagesCount >= 5) {
                  break; 
              }
  
              $imageName = $image->getClientOriginalName();
              $image->storeAs('public/profile_image', $imageName);
             
              $imageModel = new Images();
              $imageModel->profile_image = $imageName;
              $imageModel->user_id = $register->id;
              $imageModel->save();
  
              $uploadedImagesCount++;
          }
      }
      return  view('login');
    //   return redirect()->route('profile', ['id' => $register->id]);
  }
  
//    public function addregister(Request $req){
//       $validatedData = $req->validate([
//          'first_name' => 'required|string|max:20',
//          'last_name' => 'required|string|max:20',
//           'contact_num' => 'required|string|min:9|max:10|regex:/^[0-9]+$/',
//          'email_add' => 'required|email',
//          'password' => 'required|string|min:8|max:12|regex:/^(?=.*?[A-Z])(?=.*?[!@#$%^&*()\-_=+{};:,<.>]).{8,12}$/',
//          'profile_image.*' => 'required|image|mimes:jpeg,png,jpg|max:1024', 
//      ], [
//          'first_name.required' => __('First Name is required'),
//          'last_name.required' => __('Last Name is required'),
//          'contact_num.required' => __('Contact number is required'),
//          'contact_num.numeric' => __('Contact number must be numeric'),
//          'contact_num.min' => __('Contact number must be at least 9 digits'),
//          'contact_num.max' => __('Contact number must not exceed 10 digits'),
//          'email_add.required' => __('Email is required'),
//          'email_add.email' => __('Email is invalid'),
//          'password.max' => __('Password must have 12 characters'),
//          'password.min' => __('Password atleast have 8 characters'),
//          'password.required' => __('Password must be 8 - 12 characters, containing at least one uppercase letter and one special character'),
//          'profile_image.*.required' => __('Please upload an image.'),
//          'profile_image.*.image' => __('The file must be an image.'),
//          'profile_image.*.max' => __('The image must not be greater than 1MB.'),
//          'profile_image.*.mimes' => __('The image must be a file of type: jpeg, png, jpg.'),
//      ]);
     
  
//      $register = new Register;  
//      $register->first_name = $req->first_name;
//      $register->last_name = $req->last_name;
//      $register->contact_num = $req->contact_num;
//      $register->email_add = $req->email_add;
//      $register->password = bcrypt($req->password);
     
     
//      if ($req->hasFile('profile_image')) {
//          $uploadedImagesCount = 0;
//          $imageNames = [];        
//          foreach ($req->file('profile_image') as $profile_image) {
            
//              if ($uploadedImagesCount >= 5) {
//                  break; 
//              }          
//              $imageName = $profile_image->getClientOriginalName(); 
//              $profile_image->storeAs('public/profile_image', $imageName);       
//              $imageNames[] = $imageName;   
//              $uploadedImagesCount++;
//          }
//          $register->profile_image = implode(',', $imageNames);
//      }
//      $register->save(); 
//   return redirect()->route('profile', ['id' => $register->id]);
     

//    }
  
   // public function userlist(Request $req){
   //  $register = Register::all();
 
    
   //  return view('userlist')->with("register",$register);
   // }

   // public function profile(Request $req){
   //    $register = Register::find($req->id);
   
   //    return view('profile')->with("register",$register);
   // }

   public function userlist(Request $req)
   {
       $register = Register::with('images')->get();
       return view('userlist')->with("register", $register);
   }
   
   public function profile(Request $req)
   {
       $register = Register::with('images')->find($req->id);
       return view('profile')->with("register", $register);
   }


   
   
public function updateprofile(Request $req)
{
    $register = Register::with('images')->find($req->id);

    $validatedData = $req->validate([
        'first_name' => 'required|string|max:20',
        'last_name' => 'required|string|max:20',
        'contact_num' => 'required|string|min:9|max:10|regex:/^[0-9]+$/',
        'email_add' => 'required|email',
        'profile_image.*' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
    ], [
        'first_name.required' => __('First Name is required'),
        'last_name.required' => __('Last Name is required'),
        'contact_num.required' => __('Contact number is required'),
        'contact_num.numeric' => __('Contact number must be numeric'),
        'contact_num.min' => __('Contact number must be at least 9 digits'),
        'contact_num.max' => __('Contact number must not exceed 10 digits'),
        'email_add.required' => __('Email is required'),
        'email_add.email' => __('Email is invalid'),
        'profile_image.*.image' => __('The file must be an image.'), 
        'profile_image.*.mimes' => __('The image must be a file of type: jpeg, png, jpg.'), 
        'profile_image.*.max' => __('The image must not be greater than 1MB.'), 
    ]);

    $register->update([
        'first_name' => $req->first_name,
        'last_name' => $req->last_name,
        'contact_num' => $req->contact_num,
        'email_add' => $req->email_add,
    ]);

    $currentImageCount = $register->images()->count();
    $allowedImageCount = 5;

    if ($currentImageCount < $allowedImageCount) {
        if ($req->hasFile('profile_image')) {
            $uploadedImagesCount = 0;
            foreach ($req->file('profile_image') as $image) {
                if ($currentImageCount + $uploadedImagesCount >= $allowedImageCount) {
                    break;
                }

                $imageName = $image->getClientOriginalName();
                $image->storeAs('public/profile_image', $imageName);

                $imageModel = new Images();
                $imageModel->profile_image = $imageName;
                $imageModel->user_id = $register->id;
                $imageModel->save();

                $uploadedImagesCount++;
            }
        }
    }
   
    return redirect()->back();
}

   
   public function deleteprofile(Request $req){
      $register = Register::with('images')->find($req->id);
      // $register = Register::find($req->id);
      $register->delete();
      return view('register');
   }

   public function loginform()
    {
         return  view('login');
    }
   public function login(Request $req)
    {
        $req->validate([            
            'email_add'=>'required|email:users',
            'password'=>'required'
        ]);

        $register = Register::where('email_add','=',$req->email_add)->first();
        if($register){
            if(Hash::check($req->password, $register->password)){
               // $req->session()->put('loginId', $register->id);
               return redirect()->route('profile', ['id' => $register->id]);

            } else {
                return back()->with('fail','Password not match!');
            }
        } else {
            return back()->with('fail','This email is not registered.');
        }        
    }

     

}

