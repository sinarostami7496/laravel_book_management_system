###learn_laravel

####route

1. 默认的两个路由文件
  有状态： routes/web.php
  无状态： routes/api.hp
  在 Route / api.php 文件中定义的路由由 RouteServiceProvider 嵌套在路由组中.在这个路由组中,以 api 为前缀，后面无需添加。

2. 可获得路由的方法
  Route::get($uri, $callback); 
  Route::post($uri, $callback);
  Route::put($uri, $callback);
  Route::patch($uri, $callback);
  Route::delete($uri, $callback);
  Route::options($uri, $callback);
  Route::any()可以匹配任意路由方法。 也可以用 match()可以匹配任意方法。

3. 路由的重定向

  Route::redirect('/here', '/there', 301);

4. 路由参数

  4.1 动态路由由大花括号表示,回调函数的参数顺序跟动态路由的参数顺序有关。参数不能有横线,可以有数字，但不能用数字开头，可以包含下划线。
 
  Route::get('/user{id}', function($id) {
    return $id;
  });

  4.2 可选参数

  Route::get('/user{id?}', function($id = null) {
    return $id;
    <!-- 当id为空时，没有输出，当id不为空时，返回id，简化代码，统一处理 -->
  });

  4.3 参数命名的时候可以使用正则表达式

  Route::get('/user{name}', function($name) {
    return $name;
  })->where('name', '[A-Za-z]+');

  4.4 全局约束

  可以在 RouterServicePriver 中,在 boot 方法中设置 id 。

  public function boot () {
    Route::pattern(‘id’, [0-9]+);
    parent::boot();
  };

5. 命名路由

Route::get('user/profile', function() {
  return $profile;
})->name('profile');

6. 路由分组

Route::middleware(['first', 'second'])->group(function() {
  Route::get('/', function(){
    <!--  -->
  })

  Route::get('/user', function() {
    <!--  -->
  });
});

7. 费率限制

Route::middleware('ath:api', 'throttle: 60, 1')->group(function() {
  Route::get('/user', function() {
    <!--  -->
  })
})
 
 ### 中间件
 

