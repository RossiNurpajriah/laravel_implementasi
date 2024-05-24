<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class UserDashboardController extends Controller
{
    public function showDashboard()
    {
        $user = Auth::user();
        return view('auth.dashboard', compact('user'));
    }

    public function exportData()
    {
        $user = Auth::user();
        $data = [
            'Name' => $user->name,
            'Email' => $user->email,
            'Gender' => $user->gender,
            'Age' => $user->age,
            'Birth Date' => $user->birth_date,
            'Address' => $user->address,
        ];

        $filename = 'user_data.csv';
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array_keys($data));
        fputcsv($handle, $data);
        fclose($handle);

        return Response::download($filename);
    }
}
