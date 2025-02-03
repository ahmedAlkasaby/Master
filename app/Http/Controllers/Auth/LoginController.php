<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Api\FireBaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\FirebaseNotificationService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/dashboard';

    public function logout(Request $request)
    {
       $this->guard()->logout();

       $request->session()->invalidate();

       $request->session()->regenerateToken();

       if ($response = $this->loggedOut($request)) {
            return $response;
       }

       return $request->wantsJson()
           ? new JsonResponse([], 204)
           : redirect('/');
   }

   public function login(Request $request)
   {
       $request->validate([
           'phone' => 'required|string|exists:users,phone',
           'password' => 'required|min:8'
       ]);
   
       $user = User::where('phone', $request->phone)->first();
   
       if ($user && $user->is_admin == 1) {
           if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {
               return redirect()->route('admin'); 
           } else {
               return redirect()->back()->with('error', 'البيانات المدخلة غير صحيحة.'); 
           }
       } else {
           return redirect()->back()->with('error', 'ليس لديك صلاحية بالدخول على هذه الصفحة.'); 
       }
   }



   protected function credentials(Request $request)
   {
       $credentials = ['phone' => $request->phone, 'password' => $request->password];
       return $credentials;
   }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
