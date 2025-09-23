<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Helpers\Constants;
use App\Models\User;

class AdminDashboardController extends Controller
{
    protected $data = [];
    
    public function dashboard()
    {
        // Existing role counts
        $this->data['admins'] = User::where('role', Constants::ROLE_ADMIN)->count();
        $this->data['moderators'] = User::where('role', Constants::ROLE_MODERATOR)->count();
        $this->data['institutes'] = User::where('role', Constants::ROLE_INSTITUTE)->count();
        $this->data['teachers'] = User::where('role', Constants::ROLE_TEACHER)->count();
        $this->data['parents'] = User::where('role', Constants::ROLE_PARENT)->count();
        $this->data['students'] = User::where('role', Constants::ROLE_STUDENT)->count();

        // Students registered in the last 6 months
        $monthlyStudentRegistrations = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->where('role', Constants::ROLE_STUDENT)
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Prepare data for chart: Fill months with 0 if no data
        $labels = [];
        $studentData = [];

        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i)->format('n'); // numeric month
            $monthName = Carbon::now()->subMonths($i)->format('F'); // full month name
            $labels[] = $monthName;
            $studentData[] = $monthlyStudentRegistrations[$month] ?? 0;
        }

        $this->data['studentChartLabels'] = $labels;
        $this->data['studentChartData'] = $studentData;

        return view('backend.admin.dashboard', $this->data);
    }
}
