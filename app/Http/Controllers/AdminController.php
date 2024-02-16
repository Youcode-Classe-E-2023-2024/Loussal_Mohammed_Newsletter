<?php

namespace App\Http\Controllers;

use App\Models\BrowserStatistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{

    public function dashboard()
    {
        $usersCount = User::count();
        $user = User::all();
        $membersCount = $user->where('role', 'Member')->count();

        return view('admin.admin', compact('usersCount', 'membersCount'));
    }


    public function download() {

        $usersCount = User::count();
        $user = User::all();
        $membersCount = $user->where('role', 'Member')->count();
        $users = User::latest()->get();
        $bladeContent = view('admin.admin', compact( 'users', 'usersCount', 'membersCount'))->render();
        return response()->streamDownload(function () use ($bladeContent) {
            echo $bladeContent;}, 'downloadable_page.pdf');


    }
}
