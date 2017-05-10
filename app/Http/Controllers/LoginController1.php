?php

namespace App\Http\Controllers;

use App\LoginUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Exceptions\SocialAuthException;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $loginUser;
 
    public function __construct(LoginUser $loginUser)
    {
        $this->loginUser = $loginUser;
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function credentials(Request $request)
    {
        return [
            'email' => $request->email,
            'password' => $request->password,
            'verified' => 1,
        ];
    }

    public function showLoginPage()
    {
       return view('auth.login');
    }

    public function showDashboard()
    {
        return view('dashboard');
    }

    public function auth($provider)
    {
        return $this->loginUser->authenticate($provider);
    }
 
    public function login($provider)
    {
        try {
            $this->loginUser->login($provider);
            return redirect()->action('LoginController@showDashBoard');
        } catch (SocialAuthException $e) {
            return redirect()->action('LoginController@showLoginPage')
                ->with('flash-message', $e->getMessage());
        }
    }


 
    public function logout()
    {
       auth()->logout();
       return redirect()->to('/'); 
    }
}
