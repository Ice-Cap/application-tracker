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

        $totalResponses = $totalCollection->filter(function (object $value, int $key) {
            return $value->response != 'none';
        })->count();

        $totalContacted = $totalCollection->filter(function (object $value, int $key) {
            return $value->contacted === true;
        })->count();

        $totalCoverLetters = $totalCollection->filter(function (object $value, int $key) {
            return $value->cover_letter === true;
        })->count();

        $interviewPercentage = $total > 0 ? ($totalInterviews / $total) * 100 : 0;
        $interviewPercentage = round($interviewPercentage, 2);
        $responsePercentage = $total > 0 ? ($totalResponses / $total) * 100 : 0;
        $responsePercentage = round($responsePercentage, 2);

        return view('analytics', [
            'total' => $total,
            'totalFull' => $totalFull,
            'totalEasy' => $totalEasy,
            'totalInterviews' => $totalInterviews,
            'totalOffers' => $totalOffers,
            'totalContacted' => $totalContacted,
            'totalCoverLetters' => $totalCoverLetters,
            'interviewPercentage' => "$interviewPercentage%",
            'responsePercentage' => "$responsePercentage%"
        ]);
    }
}
