<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Applicant;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is authenticated
        if ($user) {
            // Retrieve the user's name
            $name = $user->name;

            // Pass the user's name to the view
            return view('verification.verification', ['name' => $name]);
        }
    }

    public function verify(Request $request) 
    {
        $request->validate([
            'appointmentCode' => 'required'
        ]);
    
        // Check if the applicant with the given appointment code exists
        $applicant = Applicant::where('appointmentCode', $request->appointmentCode)->first();
    
        // Return success if applicant exists, otherwise return error
        if ($applicant) {
            // If applicant with appointment code exists, return success message
            return redirect()->back()->with('success', 'Appointment code verified successfully')->with('playAudio', true);
        } else {
            // If applicant with appointment code doesn't exist, return error message
            return redirect()->back()->with('error', 'Invalid appointment code. Today is not your appointment.')->with('playAudio', true);
        }
    }

}

