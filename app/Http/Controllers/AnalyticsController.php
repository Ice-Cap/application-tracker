<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AnalyticsController extends Controller
{
    public function index(Request $request): View
    {
        $totalCollection = DB::table('applications')->get();
        $total = $totalCollection->count();

        $totalFull = $totalCollection->filter(function (object $value, int $key) {
            return $value->application_type === 'full';
        })->count();

        $totalEasy = $totalCollection->filter(function (object $value, int $key) {
            return $value->application_type === 'easy';
        })->count();

        $totalInterviews = $totalCollection->filter(function (object $value, int $key) {
            return $value->response === 'interview';
        })->count();

        $totalOffers = $totalCollection->filter(function (object $value, int $key) {
            return $value->response === 'job offer';
        })->count();

        $totalContacted = $totalCollection->filter(function (object $value, int $key) {
            return $value->contacted === true;
        })->count();

        $totalCoverLetters = $totalCollection->filter(function (object $value, int $key) {
            return $value->cover_letter === true;
        })->count();

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
