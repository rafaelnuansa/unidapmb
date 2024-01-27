<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\UserActivity;

class LogUserActivity
{
    public function handle($request, Closure $next)
    {
        // Execute the middleware after authentication
        $response = $next($request);

        // Check if the user is logged in
        if (Auth::check() && in_array($request->method(), ['POST', 'PUT', 'PATCH', 'DELETE'])) {
            $activityMessage = $this->getActivityMessage($request);

            // Record user activity
            $this->recordActivity($activityMessage);
        }

        return $response;
    }

    private function getActivityMessage($request)
    {
        // $activityMessage = 'Mengakses ' . $request->getPathInfo();

        // Check if it's a POST request (creating)
        if ($request->isMethod('post')) {
            $activityMessage = 'Membuat ' . $request->getPathInfo();
            return $activityMessage;
        }

        // Check if it's a PUT or PATCH request (editing)
        if ($request->isMethod('put') || $request->isMethod('patch')) {
            $activityMessage = 'Mengedit  ' . $request->getPathInfo();
            return $activityMessage;
        }

        if ($request->isMethod('put') || $request->isMethod('patch')) {
            $activityMessage = 'Menghapus  ' . $request->getPathInfo();
            return $activityMessage;
        }

        if ($request->isMethod('delete')) {
            $activityMessage = 'Menghapus data ' . $request->getPathInfo();
            return $activityMessage;
        }

    }

    private function recordActivity($message)
    {
        // Assuming UserActivity model exists with 'user_id' and 'activity' columns
        UserActivity::create([
            'user_id' => Auth::user()->id,
            'activity' => $message,
        ]);
    }
}
