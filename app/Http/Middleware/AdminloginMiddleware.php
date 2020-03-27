<?php

namespace App\Http\Middleware;

use Closure;

class AdminloginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->session()->has('isadmin')){
            $nodelist = session('nodelist');
            // 获取访问模块控制器和方法名
            $actions = explode('\\',\Route::current()->getActionName());
            $modelName = $actions[count($actions) - 2 ] == 'Controllers'?null:
            $actions[count($actions) - 2 ]; 
            $func = explode('@',$actions[count($actions) - 1 ]);
            $controllerName = $func[0];
            $actionName = $func[1];
            // echo $controllerName.':'.$actionName;
            // 如果session没有控制器和方法名就不能访问
            if(empty($nodelist[$controllerName]) || !in_array($actionName,$nodelist[$controllerName])){
                return redirect('/admin')->with('error','您没有权限访问该模块，请联系管理员');
            }
                return $next($request);
            
        }else{
            return redirect('/adminlogin/create');
        }
    }

}
