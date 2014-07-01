Laravel App Boilerplate
=======================

When creating web apps with [Laravel](http://laravel.com) there is always a fair bit of legwork to be
done in getting the project up and running. There are some common tasks that need to be done that
apply to almost every web application. For example:

* Configuring and setting up the database
* Configuring routes and filters
* Creating an authentication controller
* Creating the "login" and "signup" views
* Configuring your "User" model

The Laravel App Boilerplate seeks to do some of the heavy lifting when it comes to these tasks
without tying you into some pre-configured, inflexible setup. The boilerplate is completely
compatible with the default installation of Laravel and customizable to whatever level you see fit.

Requirements
------------

The Laravel App Boilerplate requires **Laravel v4.2+**

Install
-------

To install the Laravel App Boilerplate please do the following:

1. Make sure you have already installed [Laravel](http://laravel.com). Using a clean install is best.
2. Add the Laravel App Boilerplate to the "require" section of your `composer.json`

    "gilbitron/laravel-app-boilerplate": "0.1.*"

3. Run `composer update` to install the boilerplate
4. Open `app/config/app.php` and add the following line to the `$providers` array

	'Gilbitron\LaravelAppBoilerplate\LaravelAppBoilerplateServiceProvider',

5. Run `php artisan config:publish gilbitron/laravel-app-boilerplate` to copy the config file to the
`app/config/packages/gilbitron/laravel-app-boilerplate` folder
6. Run `php artisan migrate --package="gilbitron/laravel-app-boilerplate"` to generate the "users" table
in the database (note that the settings in your `app/config/database.php` need to be correctly configured)

Usage
-----

Your web app is now setup and ready to use. The following routes are defined and can be used:

* `login`
* `signup`
* `logout`

Note that the Laravel App Boilerplate uses Laravel's built in methods and filters for authentication.

You can change the default settings in `app/config/packages/gilbitron/laravel-app-boilerplate/config.php`.

Customization
-------------

By default the Laravel App Boilerplate uses a pre-configured `layout.blade.php` and some other views
(login, signup etc) that can optionally be customized. To do this you need to run the following command
to copy the views to the `app/views/packages` directory so your changes won't be lost if you update the
boilerplate package:

    php artisan view:publish gilbitron/laravel-app-boilerplate

The Laravel App Boilerplate uses a custom `User` model for it's built in authentication pages. A default
installation of Laravel provides it's own `User` model so it is advised that you add the following code to the
default `User` model to make it compatible.

```php
/**
* The attributes that can be mass assigned
*
* @var array
*/
protected $fillable = array('email', 'password', 'name');

/**
* Automatically hash a password when it is being set
*/
public function setPasswordAttribute($pass)
{
	$this->attributes['password'] = \Hash::make($pass);
}
```

Credits
-------

The Laravel App Boilerplate was created by [Gilbert Pellegrom](http://gilbert.pellegrom.me) from
[Dev7studios](http://dev7studios.com). Released under the MIT license.
