<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Git URL: https://github.com/jllamera-une/myblog/tree/feature/auth-admin-panel

## Introduction
This report outlines the approach taken to enhance basic blog application by adding user authentication and discusses the challenges faced during the process. 

## 1. Setup and Initialize Project
- **Environment Setup**: Ensure your development environment is set up with the basic blog application from Assessment 1.

Setting up your development environment on your local machine:
```bash
$ git clone https://github.com/jllamera-une/myblog.git
$ cd my-blog
$ cp .env.example .env
$ php artisan migrate --seed
$ npm install
$ npm run dev
$ php artisan serve
$ Now open http://localhost:8000/admin

Admin login:
- Email: testing@mail.com
- Password: password

## Challenges Faced

1. **Time management and Scope Creep**: Keeping the project within scope and delivered on time can be difficult, especially if new requirements or unforeseen challenges arise.

2. **Route Structuring**: Getting routes set up properly in Laravel isn't always straightforward. When you're dealing with route groups, prefixes, and middleware, it takes some careful planning to make sure all the admin routes are locked down and separate from the public ones.

3. **Admin Interface Design**: Making the admin interface both user-friendly and in line with the rest of the app can be a bit of a time sink. Using Bootstrap to create layouts that are both responsive and functional also requires some extra attention to detail.





