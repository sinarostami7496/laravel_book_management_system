<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\DB;
use App\Preference;


use Closure;
use PhpParser\Node\Stmt\TraitUseAdaptation\Precedence;

class CheckSystemIsInitialed
{
    private $init_borrow_days = 60;
    private $renew_days = 30;
    private $penalty = 0.2;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $preferences = Preference::find(1);

        // 若配置不存在则初始化系统配置
        if ($preferences == null) {
            Preference::insert([
                'init_borrow_days' => $this->init_borrow_days,
                'renew_days' => $this->renew_days,
                'penalty' => $this->penalty
            ]);
        }

        return $next($request);
    }
}
