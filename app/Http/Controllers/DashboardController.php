<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Stagiaire;
use App\Models\Bureau;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAgents = Agent::where('status', 'actif')->count();
    
        $statsDivisions = Division::withCount('agents')->get();
        $totalGeneral = Agent::count();

        $currentTotal = $totalGeneral; 
        $percentage = $currentTotal;
        $currentPercent = $totalGeneral;
        $hommes = Agent::where('genre', 'M')->count();
        $femmes = Agent::where('genre', 'F')->count();

        $totalBureaux = Bureau::count();
        $totalDivisions = Division::count();

        $doyen = Agent::orderBy('date_naissance', 'asc')->first();
        $plusJeune = Agent::orderBy('date_naissance', 'desc')->first();
        
        $ageMoyen = Agent::selectRaw('AVG(DATEDIFF(CURRENT_DATE, date_naissance) / 365.25) as average_age')->value('average_age');

        $ageData = [
            '18-25' => Agent::whereRaw('TIMESTAMPDIFF(YEAR, date_naissance, CURDATE()) BETWEEN 18 AND 25')->count(),
            '26-35' => Agent::whereRaw('TIMESTAMPDIFF(YEAR, date_naissance, CURDATE()) BETWEEN 26 AND 35')->count(),
            '36-45' => Agent::whereRaw('TIMESTAMPDIFF(YEAR, date_naissance, CURDATE()) BETWEEN 36 AND 45')->count(),
            '46-55' => Agent::whereRaw('TIMESTAMPDIFF(YEAR, date_naissance, CURDATE()) BETWEEN 46 AND 55')->count(),
            '56+'   => Agent::whereRaw('TIMESTAMPDIFF(YEAR, date_naissance, CURDATE()) >= 56')->count(),
        ];

        $statsDivisions = DB::table('divisions')
            ->join('bureaus', 'divisions.id', '=', 'bureaus.division_id')
            ->join('agents', 'bureaus.id', '=', 'agents.bureau_id')
            ->select('divisions.nom', DB::raw('count(agents.id) as total'))
            ->groupBy('divisions.nom')
            ->get();

        $mouvementsRecents = Agent::with(['bureau.division'])
            ->latest()
            ->take(5)
            ->get();

        $stagiairesActifs = Stagiaire::where('statut', 'encours')->count();

        return view('dashboard', compact(
            'totalAgents', 'hommes', 'femmes', 'totalBureaux', 'totalDivisions',
            'doyen', 'plusJeune', 'ageMoyen', 'ageData', 'statsDivisions','currentPercent',
            'mouvementsRecents', 'stagiairesActifs','totalGeneral','totalDivisions','currentTotal','percentage'
        ));
    }
}