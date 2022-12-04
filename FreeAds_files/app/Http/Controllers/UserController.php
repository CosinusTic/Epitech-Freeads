<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Mail\MailtrapExample;
use App\Mail\User\AfterRegister;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use Hamcrest\SelfDescribing;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

 
class UserController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function DisplayName($name)
    {
        $results = DB::select('select name from users where name = ?', [$name]);
        //$results = json_decode($results[0]["name"], true);
        return $results[0]->name;
    }

    public function DisplayRegisterView()
    {
        return view("/my_auth/my_register");
    }

    public function DisplayLoginView()
    {
        return view("/my_auth/my_login");
    }

    public function displayUserProfileView($id)
    {
        $user = Users::find($id);
        return view("users.userProfile", ["user" => $user]);
    }


    public function Register(Request $request)
    {
        $user = new Users();
        $existing_user = Users::where('email', '=', $request->email)->firstOrNew();

        if($request->password != $request->password_confirmation) //check if password matches password confirmation
        {
            echo "password does not match password confirmation";
        }
        elseif($request->email == $existing_user->email) //check if email already exits
        {
            echo "this email is already registered, please login or choose another one";
        }
        else
        {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->phone_number = $request->phone_number;
            $user->save();

            Mail::to($request->email)->send(new MailtrapExample($user->id));
            echo "Please verify your email, a confirmation link has been sent to you.";
        }
        
    }

    public function displayLoggedInView()
    {   
        return view("my_auth.logged_in");
    }   

    public function Login(Request $request)
    {
        $user = Users::where('email', '=', $request->email)->firstOrNew(); //contains all user credentials at precise email
        $user_name = $user->name;
        $user_email = $user->email;
        $user_password = $user->password;
        $user_verified_status = $user->email_verified_at;
        if($user_verified_status === NULL)
        {
            $user->delete();
            return "Email was not verified, user delete from database";
        }
        else
        {
            if($user_name === NULL || $user_email === NULL || $user_password === NULL)
            {
                return "Incorrect credentials"; 
            }
    
            if($user_name === $request->name && $user_password === $request->password) //if form data matches database data
            {
                dump($user_name);
                dump($user_email);
                dump($user_password);
                dump($user->id);
                return view("/my_auth/logged_in", ["user_id" => $user->id, "user" => $user]);
            } 
            else
            {
                return "credentials don't match";
            }
        }

        
    }

    public function verifyEmail($id) {
        $user = User::find($id);
        $user->email_verified_at = date("Y-m-d H:i:s");
        $user->save();
        return "Your email is verified, feel free to leave this page";
    }


    public static function displayUsersManagement() //creates a reference to users in the usersManagement
    {
        return view("usersManagement", ["users" => Users::all()]);
    }

    public static function deleteUser($id)
    {
        $user_to_delete = Users::where('id', $id)->firstOrNew(); 
        $username_before_deletion = $user_to_delete->name; 
        $user_to_delete->delete();
        //return view ("users.delete", ["user_to_delete" => $user_to_delete]);
        return "sucessfully deleted user " . $username_before_deletion;
    }

    public function displayUpdateUser($id)
    {
        $user_to_update = Users::find($id);
        return view("users.update", ["user_to_update" => $user_to_update]);
    }

    public static function updateUser($id, Request $request)
    {
        $user_to_update = Users::find($id);

        /* -- old credentials -- */
        $old_name = $user_to_update->name;
        $old_email = $user_to_update->email;
        $old_password = $user_to_update->password;
        $old_phone_number = $user_to_update->phone_number;
        $old_admin_status = $user_to_update->admin_status;

        /* -- Enabling to not fill fields -- */
        if($request->name == NULL)
        {
            $request->name = $old_name;
        }
        if($request->email == NULL)
        {
            $request->email = $old_email;
        }
        if($request->password == NULL)
        {
            $request->password = $old_password;
        }
        if($request->phone_number == NULL)
        {
            $request->phone_number = $old_phone_number;
        }
        if($request->admin_status == NULL)
        {
            $request->admin_status = $old_admin_status;
        }

        /* -- new credentials -- */
        $user_to_update->name = $request->name;
        $user_to_update->email = $request->email;
        $user_to_update->password = $request->password;
        $user_to_update->phone_number = $request->phone_number;
        $user_to_update->admin_status = $request->admin_status;

        /* -- Update user with info above -- */
        $user_to_update->save();
        return "User " . $old_name . " successfully updated to " . $user_to_update->name;
    }

    public static function updateMyProfile($id, Request $request)
    {
        $user_to_update = Users::find($id);

        /* -- old credentials -- */
        $old_name = $user_to_update->name;
        $old_email = $user_to_update->email;
        $old_password = $user_to_update->password;
        $old_phone_number = $user_to_update->phone_number;

        /* -- Enabling to not fill fields -- */
        if($request->name == NULL)
        {
            $request->name = $old_name;
        }
        if($request->email == NULL)
        {
            $request->email = $old_email;
        }
        if($request->phone_number == NULL)
        {
            $request->phone_number = $old_phone_number;
        }
        if($request->password == NULL && $request->password_confirmation == NULL)
        {
            $request->password = $old_password;
        }
        elseif(($request->password != $request->password_confirmation) || ($request->password == NULL || $request->password_confirmation == NULL)) //check if password matches password confirmation
        {
            return "Incorrect filling of password fields: both must be filled and must match.";
        }
        

        /* -- new credentials -- */
        $user_to_update->name = $request->name;
        $user_to_update->email = $request->email;
        $user_to_update->password = $request->password;
        $user_to_update->phone_number = $request->phone_number;

        /* -- Update user with info above -- */
        $user_to_update->save();
        return "User " . $old_name . " successfully updated to " . $user_to_update->name;
    }

    
}