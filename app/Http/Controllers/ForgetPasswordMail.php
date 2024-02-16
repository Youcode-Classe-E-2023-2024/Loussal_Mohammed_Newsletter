<?php

namespace App\Http\Controllers;

use App\Models\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;

class ForgetPasswordMail extends Controller
{
    public function index() {
        return view('emails.forgetPassword');
    }

    public function PasswordResetMail(Request $request): RedirectResponse
    {
        $messages = [
            'email.required' => 'Email is required',
            'email.email' => 'The email format is incorrect',
        ];

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ], $messages);

        if ($validator->fails()) {
            return redirect('forgetPassword.index')
                ->withErrors($validator)
                ->withInput();
        }

        $email = $request->email;
        $user = User::where('email', $email)->first();
        if(!$user) {
            return redirect()->route('forgetPass')->with('error', 'there is no user with this email');
        }
        // Retrieve existing token or create a new one
        $tokenRecord = DB::table('password_reset_tokens')->where('email', $email)->first();
        $token = $tokenRecord ? $tokenRecord->token : implode('', array_map(fn() => random_int(0, 9), range(1, 4)));

        // Update or insert the record in the database
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $email],
            ['token' => $token, 'created_at' => Carbon::now()]
        );

        // Send the email with the token
        Mail::send('emails/setPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect('code')->with(['success' => 'Link sent to your email', 'email' => $request->email]);
    }



    public function authIndex() {
        return view('emails.code');
    }

    public function verifyToken(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'num1' => 'required',
            'num2' => 'required',
            'num3' => 'required',
            'num4' => 'required',
            'email' => 'required'
        ]);

        if($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $gottenTokenarray[] = $request->num1;
        $gottenTokenarray[] = $request->num2;
        $gottenTokenarray[] = $request->num3;
        $gottenTokenarray[] = $request->num4;
        $gottenToken = implode('', $gottenTokenarray);
        $token = DB::table('password_reset_tokens')->select('token')->where('email', $request->email)->first();
        if(!is_null($token)) {
            return match ($token->token) {
                $gottenToken => redirect('newPassword')->with(['allow' => true, 'email' => $request->email]),
                default => back()->with(['error' => 'code incorrect!']),
            };
        }
        else {
            return back()->with('error', 'token is empty');
        }



    }


}
