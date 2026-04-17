<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Bureau;
use App\Models\Division;
use App\Models\Stagiaire;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAgents = Agent::count(); 
        $hommes = Agent::where('genre', 'M')->count();
        $femmes = Agent::where('genre', 'F')->count();
        $totalCB = Agent::where('categorie_grade', 'LIKE', '%Chef de Bureau%')->count();
        $totalCD = Agent::where('categorie_grade', 'LIKE', '%Chef de Division%')->count();
        $doyen = Agent::orderBy('date_naissance', 'asc')->first();
        $plusJeune = Agent::orderBy('date_naissance', 'desc')->first();
        
        $ageMoyen = Agent::selectRaw('AVG(TIMESTAMPDIFF(YEAR, date_naissance, CURDATE())) as avg_age')
                         ->value('avg_age') ?? 0;

        $ageData = [
            '18-25' => Agent::whereRaw('TIMESTAMPDIFF(YEAR, date_naissance, CURDATE()) BETWEEN 18 AND 25')->count(),
            '26-35' => Agent::whereRaw('TIMESTAMPDIFF(YEAR, date_naissance, CURDATE()) BETWEEN 26 AND 35')->count(),
            '36-45' => Agent::whereRaw('TIMESTAMPDIFF(YEAR, date_naissance, CURDATE()) BETWEEN 36 AND 45')->count(),
            '46-55' => Agent::whereRaw('TIMESTAMPDIFF(YEAR, date_naissance, CURDATE()) BETWEEN 46 AND 55')->count(),
            '55+'   => Agent::whereRaw('TIMESTAMPDIFF(YEAR, date_naissance, CURDATE()) >= 56')->count(),
        ];

        $colors = ['bg-blue-500', 'bg-indigo-500', 'bg-amber-500', 'bg-emerald-500', 'bg-pink-500', 'bg-slate-500'];
        
        $divisionsData = Division::withCount('agents')->get()->map(function ($division, $index) use ($totalAgents, $colors) {
            return [
                'label'   => $division->nom,
                'count'   => $division->agents_count,
                'percent' => $totalAgents > 0 ? round(($division->agents_count / $totalAgents) * 100, 1) : 0,
                'color'   => $colors[$index % count($colors)], // Assigne une couleur par index
            ];
        });
        $mouvementsRecents = Agent::with(['bureau.division'])
        ->latest()
        ->take(6)
        ->get();

        return view('dashboard', compact(
            'totalAgents', 
            'hommes', 
            'femmes', 
            'totalCB', 
            'totalCD', 
            'doyen', 
            'plusJeune', 
            'ageMoyen', 
            'ageData', 
            'divisionsData', 
            'mouvementsRecents'
        ));
    }
}