<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ChartController extends Controller
{
    public function userActiveTime()
    {

        
            $users = User::all();
    
            $data = [];
            foreach ($users as $user) {
                // Check if user has a token
                if ($user->token()) {
                    $accessToken = $user->token();
                    $expiresAt = $accessToken->expires_at;
    
                    // Calculate time remaining in minutes
                    $now = Carbon::now();
                    $timeRemaining = $expiresAt->diffInSeconds($now);
                    $minutesRemaining = $timeRemaining / 60;
                } else {
                    $minutesRemaining = 0; // Default value if no token exists
                }
    
                $data[] = [
                    'username' => $user->name,
                    'active_time' => $minutesRemaining
                ];
            }


        return view('users', compact('data'));
        }

        public function index(Request $request)
        {
         
                $data = User::latest()->get();
               
        
    
            return view('table', compact('data'));
        }
        }
