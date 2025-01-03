<?php

namespace App\Http\Controllers\dosen_tendik;

use App\Http\Controllers\Controller;
use App\Models\AlpaModel;
use App\Models\ApprovalModel;
use App\Models\ProgressModel;
use App\Models\TugasModel;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $breadcrumb = (object) [
            'title' => 'Dashboard Page',
            'list' => ['Home', 'Welcome']
        ];

        $activeMenu = 'landing';

        $tugas = TugasModel::where('user_id', $user->user_id)->get();

        $alpa = AlpaModel::with(['approval.tugas'])->count();

        $progress = ProgressModel::with(['tugas', 'mahasiswa'])
        ->whereHas('tugas', function ($query) use ($user) {
            $query->where('user_id', $user->user_id);
        })
        ->where('status', null) 
        ->count();

        return view('dosen_tendik.landing', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'tugas' => $tugas, 'alpa' => $alpa, 'progress' => $progress]);
    }
}
