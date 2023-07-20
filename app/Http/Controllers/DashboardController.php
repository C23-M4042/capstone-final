<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Complete;
use App\Models\Routine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Carbon\CarbonTimeZone;



class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $routine = Routine::where('user_id', Auth::id())->first();

        if ($routine) {
            $startdate = Carbon::createFromFormat('Y-m-d', $routine->start)->startOfDay();
            $endDate = $startdate->copy()->addDays($routine->hari)->endOfDay();
            // $jakartaTimeZone = CarbonTimeZone::create('Asia/Jakarta');

            $isExists = Routine::where('start', '<=', Carbon::now()->endOfDay())
                ->where(function ($query) use ($startdate) {
                    $query->where('start', '>=', $startdate);
                })->where('end_date', '>=', Carbon::now()->endOfDay())
                ->exists();

            if ($isExists) {
                $rows = Routine::with(['activities', 'complete'])->where('user_id', Auth::id())->limit(10)->get();

                foreach ($rows as $row) {
                    $createdAt = Carbon::parse($row->created_at);
                    $now = Carbon::now();
                    $differenceInDays = $now->diffInDays($createdAt);

                    if ($differenceInDays > $row->hari) {
                        Routine::where('id', $row->id)->delete();
                    }
                }

                $currentDate = Carbon::now()->toDateString();


                $activities = $rows[0]->activities;
                $complete = $rows[0]->complete;


                $activityIds = $activities->pluck('id');
                $completeIds = $complete->where('tanggal', $currentDate)->pluck('activity_id');

                $uniqueIds = $activityIds->diff($completeIds);
                $duplicates = $completeIds->filter(function ($completeId) use ($activityIds) {
                    return $activityIds->contains($completeId);
                });

                $activity = [];
                $completed = [];



                foreach ($uniqueIds as $id) {
                    $activity[] = Activity::where('id', $id)->get();
                    // Lakukan tindakan yang ingin Anda lakukan dengan nilai yang tidak sama
                }

                foreach ($duplicates as $id) {
                    $completed[] = Activity::where('id', $id)->get();
                    // Lakukan tindakan yang ingin Anda lakukan dengan nilai yang tidak sama
                }


                return view('dashboard.progress', [
                    'routine' => $rows,
                    'activity' => $activity,
                    'completed' => $completed

                ]);
            } else {
                $rows = Routine::with(['activities', 'complete'])->where('user_id', Auth::id())->limit(10)->get();
                return view('dashboard.index', [
                    'routine' => $rows,
                ]);
            }
            // Lakukan tindakan yang diinginkan dengan $routines (data dari tanggal hari ini hingga $endDate)
        } else {
            $rows = Routine::with(['activities', 'complete'])->where('user_id', Auth::id())->limit(10)->get();
            return view('dashboard.index', [
                'routine' => $rows,
            ]);
        }
    }

    public function complated(Request $request)
    {
        $data['routine_id'] = $request->input('routine_id');
        $data['activity_id'] = $request->input('activity_id');
        $data['tanggal'] = $request->input('tanggal');
        $activity = Activity::find($request->input('activity_id'));
        $activity->increment('progress');
        Complete::create($data);
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $startdate = Carbon::createFromFormat('Y-m-d', $request->date)->startOfDay();
        $endDate = $startdate->copy()->addDays($request->hari)->endOfDay();
        $routine['user_id'] = auth()->user()->id;
        $routine['start'] = $request->date;
        $routine['hari'] = $request->hari;
        $routine['name'] = $request->name;
        $routine['end_date'] = $endDate->toDateString();
        $newRoutine = Routine::create($routine);
        $newRoutineId = $newRoutine->id;

        $activities = $request->activity;
        $dataToInsert = [];
        foreach ($activities as $activity) {
            if ($activity != null) {
                $dataToInsert[] = [
                    'routine_id' => $newRoutineId,
                    'activity' => $activity,
                    'progress' => 0,
                    // tambahkan kolom lainnya jika diperlukan
                ];
            }
        }
        Activity::insert($dataToInsert);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Routine::find($id)->delete();
        return redirect()->back();
    }
}
