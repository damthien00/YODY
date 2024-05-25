<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    function login()
    {
        return view('pages/User/Auth/login');
    }
    function registation()
    {
        return view('pages/User/Auth/register');
    }
    function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'));
    }

    function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $findUser = User::where('google_id', $user->id)->first();
            if ($findUser) {
                Auth::login($findUser);
                return redirect()->intended(route('home'));
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => bcrypt('123456789')
                ]);
                Auth::login($newUser);
                return redirect()->intended(route('home'));
            }

            return redirect()->intended(route('home'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    function registationPost(Request $request)
    {
        // Ràng buộc dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:10',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        // Nếu dữ liệu đầu vào không hợp lệ, chuyển hướng người dùng về trang đăng ký với thông báo lỗi
        if ($validator->fails()) {
            return redirect(route('registation'))->withErrors($validator)->withInput();
        }

        // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu hay không
        $existingUser = User::where('email', $request->email)->first();

        // Nếu tài khoản đã tồn tại, chuyển hướng người dùng về trang đăng ký với thông báo lỗi
        if ($existingUser) {
            return redirect(route('registation'))->with('error', 'Tài khoản đã tồn tại. Vui lòng sử dụng email khác.');
        }

        // Nếu tài khoản chưa tồn tại, tiếp tục tạo tài khoản mới
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Kiểm tra xem tạo tài khoản có thành công hay không
        if (!$user) {
            // Nếu không tạo được tài khoản mới, chuyển hướng người dùng về trang đăng ký với thông báo lỗi
            return redirect(route('registation'))->with('error', 'Đã xảy ra lỗi trong quá trình đăng ký. Vui lòng thử lại sau.');
        }

        // Nếu tạo tài khoản thành công, chuyển hướng người dùng đến trang đăng nhập
        return redirect(route('login'))->with('success', 'Đăng ký thành công! Đăng nhập ngay.');
    }
    function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }


    function showForgetPasswordForm()
    {
        // Auth::logout();
        return view('pages/User/Auth/forgot');
    }
    public function submitForgetPasswordForm(Request $request)
    {
        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::send('pages.User.Auth.Email.forget-password', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    public function showResetPasswordForm($token)
    {
        return view('pages.User.Auth.reset', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $updatePassword = DB::table('password_reset_tokens')
            ->where('token', $request->token)
            ->first();
        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }
        $user = User::where('email', $updatePassword->email)->first();
        if (!$user) {
            return back()->withInput()->with('error', 'User not found!');
        }
        // Kiểm tra xem hai trường mật khẩu có khớp nhau không
        if ($request->password !== $request->password_confirmation) {
            return back()->withInput()->with('error', 'Password confirmation does not match!');
        }
        // Cập nhật mật khẩu của người dùng
        $user->password = Hash::make($request->password);
        $user->save();

        // Xóa dòng dữ liệu trong bảng password_reset_tokens dựa trên token
        DB::table('password_reset_tokens')->where('token', $request->token)->delete();
        return redirect()->route('login')->with('message', 'Your password has been changed!');
    }
}
