<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AnalyticsController extends Controller
{
    public function index(Request $request): View
    {
        $total = DB::table('applications')->count();
        $totalFull = DB::table('applications')
            ->where('application_type', 'full')
            ->count();
        $totalEasy = DB::table('applications')
            ->where('application_type', 'easy')
            ->count();
        $totalInterviews = DB::table('applications')
            ->where('response', 'interview')
            ->count();
        $totalOffers = DB::table('applications')
            ->where('response', 'job offer')
            ->count();
        $totalContacted = DB::table('applications')
            ->where('contacted', 'true')
            ->count();
        $totalCoverLetters = DB::table('applications')
            ->where('cover_letter', 'true')
            ->count();

        return view('analytics', [
            'total' => $total,
            'totalFull' => $totalFull,
            'totalEasy' => $totalEasy,
            'totalInterviews' => $totalInterviews,
            'totalOffers' => $totalOffers,
            'totalContacted' => $totalContacted,
            'totalCoverLetters' => $totalCoverLetters
        ]);
    }
}
