<?php namespace Syscover\Crm\Middleware;

use Closure;

class CrmAuthenticate
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */

	public function handle($request, Closure $next, $guard = 'crm')
	{
		if(auth($guard)->guest())
		{
			if($request->ajax())
            {
				return response('Unauthorized.', 401);
            }
			else
            {
				return redirect()->guest(route('web.login-' . user_lang()));
            }
		}

		return $next($request);
	}
}