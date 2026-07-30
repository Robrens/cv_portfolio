<?php

namespace App\Http\Middleware;

use App\Services\Analytics\UniqueVisitTracker;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackUniqueVisit
{
  public function __construct(
    private readonly UniqueVisitTracker $tracker,
  ) {}

  public function handle(Request $request, Closure $next): Response
  {
    $response = $next($request);

    if (
      $request->isMethod('GET')
      && $response->isSuccessful()
    ) {
      $this->tracker->record($request);
    }

    return $response;
  }
}
