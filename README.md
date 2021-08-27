<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects.
Laravel is accessible, powerful, and provides tools required for large, robust applications.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Credits

- Basic grid and styling by **[Bootstrap](https://getbootstrap.com/)**
- CSS by **[ColorLib](https://colorlib.com/)**
- Icons by **[Font Awesome](https://fontawesome.com/)**
- DateTime package by **[Nesbot Carbon](https://carbon.nesbot.com/)**

## Mikko-test requirements
You are required to create a utility in PHP to help us determine the dates we need to pay salaries to the sales department.
We handle our sales payroll as follows:

- Sales staff get a regular monthly fixed base salary. The salary for a month is paid on the last day of the month, unless that day is a weekend day (Saturday, Sunday). In that case, the salary is paid on the Friday before said weekend.
- Sales staff get a monthly bonus. On the 15th of every month the bonus is paid for the previous month, unless that day is a weekend day (Saturday, Sunday). In that case, the bonus is paid on the first Wednesday after the 15th.
- The application needs to be (at the least) able to output the results in a CSV file. The file should contain the results for the whole year. The file should contain 3 columns: month, the salary payment date for that month and the bonus payment date for the bonus of that month.
- The user needs to be able to input the year they want to receive the dates for.

