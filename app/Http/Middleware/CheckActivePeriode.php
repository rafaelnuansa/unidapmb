<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\Periode;

class CheckActivePeriode
{
    public function handle($request, Closure $next)
    {
        $currentDate = Carbon::now();
        $periodeAktif = Periode::whereDate('start_date', '<=', $currentDate)
            ->whereDate('end_date', '>=', $currentDate)
            ->first();

        if (!$periodeAktif) {
            return redirect()->route('dashboard')->with('error', 'Tidak ada periode aktif saat ini.');
        }

        // Make the active periode available in the request
        $request->attributes->add(['active_periode' => $periodeAktif]);

        return $next($request);
    }
}
