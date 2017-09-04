<?php



namespace App\Http\Controllers\Seller\Auth;



use App\Http\Controllers\Controller;

use App\Seller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;



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

    protected $redirectTo = 'seller';



    /**

     * Create a new controller instance.

     *

     * @return void

     */

   

     public function showLoginForm()

    {

        return view('seller.login');

    }

    public function login(Request $request)

    {

        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {

            return $this->sendLoginResponse($request);

        }

        return $this->sendFailedLoginResponse($request);

    }

  

    public function __construct()

    {

        $this->middleware('guest:seller')->except('logout');

    }

    protected function guard()

    {

        return Auth::guard('seller');

    }

}

