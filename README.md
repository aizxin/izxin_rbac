# izxin
laravel 5.2.* 
[cms的设计思想](http://oomusou.io/laravel/laravel-architecture)
![](http://oomusou.io/images/laravel/laravel-architecture/arch002.svg)
#1、 验证 prettus/laravel-validation
[自定义验证](https://github.com/aizxin/izxin/blob/master/app/Aizxin/Extensions/IzxinValidator.php)
#2、 自定义 namespace的Aizxin包名
		"Aizxin\\": "app/Aizxin"

# 安装
- 问题 角色删除
	`Class name must be a valid object or a string`
	找到zizaco/entrust下EntrustRoleTrait.php的51行
    把`Config::get('auth.model')`改为`Config::get('auth.providers.admins.model')`

- 安装,`redis`

- **clone**代码到本地, `git clone https://github.com/aizxin/izxin_rbac.git`

- 项目目录下执行 `composer install`

- 配置 `.env` 中数据库连接信息

- 执行 `php artisan key`

- 数据库  `php artisan db:seed`

- 项目目录下执行 `php artisan serve` 使用默认的 `http://localhost:8000`访问首页

- 默认后台账号: `admin@admin.com` 密码 : `admin888`

- 测试后台账号: `demo@demo.com` 密码 : `demo888`
