<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\VacationModelRequest;
use App\Models\Vacation;
use Illuminate\Http\Request;

class VacationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard.vacations', [
            'is_add' => isAdd('vacations'),
            'is_edit' => isEdit('vacations'),
            'is_delete' => isDelete('vacations'),
        ]);
    }

    public function addVacation(VacationModelRequest $request)
    {
        $startDate = $request->post('start_date');
        $endDate = $request->post('end_date');

        Vacation::query()
            ->where('user_id', auth()->id())
            ->delete();

        Vacation::create([
            'user_id' => auth()->id(),
            'start_date' => $startDate,
            'end_date' => $endDate,
        ]);

        return redirect()->back();
    }

    public function approveVacation(Request $request, $userId)
    {
        Vacation::query()
            ->where('user_id', $userId)
            ->update([
                'approved' => true,
            ]);

        return redirect()->back();
    }
}
