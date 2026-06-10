<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckBranch
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $user = auth()->user();

        // Owner bisa akses semua branch
        if ($user->isOwner()) {
            return $next($request);
        }

        // Selain owner harus punya branch_id
        if (!$user->branch_id) {
            return response()->view('errors.403', [], 403);
        }

        return $next($request);
    }
}
