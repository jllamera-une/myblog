<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Git URL: https://github.com/jllamera-une/myblog

## Introduction
This report outlines the approach taken to create a CRUD (Create, Read, Update, Delete) Laravel blog and discusses the challenges faced during the process. Laravel, a popular PHP framework, was chosen for its elegant syntax, robust features, and ease of use for building web applications.

## Approach
### Setup and Configuration

Environment Setup: Installed Laravel using Composer, set up a local development environment using tools like XAMPP.
Database Configuration: Configured the .env file with database connection details and created a MySQL database for the blog.

### Creating the Blog Model and Migration

Model Creation: Created a Post model using the Artisan command php artisan make:model Post -m.
Migration Setup: Defined the schema for the posts table in the migration file (e.g., title, body, timestamps) and ran php artisan migrate to create the table in the database.

### Building the Controllers and Routes

Controller Creation: Generated a resource controller using php artisan make:controller PostController --resource.
Route Definitions: Defined routes in the web.php file using Route::resource('posts', PostController::class).

### Developing the Views

Blade Templates: Created Blade templates for listing posts, showing a single post, creating a new post, editing a post, and deleting a post. Views were stored in the resources/views/posts directory.
Bootstrap Integration: Integrated Bootstrap for a responsive and user-friendly UI.

### Implementing CRUD Operations

Create: Developed a form for creating new posts and handled the form submission in the store method of the PostController.
Read: Implemented logic in the index method to list all posts and in the show method to display a single post.
Update: Created an edit form and handled updates in the update method.
Delete: Added functionality to delete posts using the destroy method.

### Validation and Error Handling

Form Validation: Used Laravel’s built-in validation to ensure data integrity when creating and updating posts.

## Challenges Faced

Environment Configuration: Had a hard time setting up the local development environment and configuring the database correctly since the local development environment in the lecture was different from what I' m using.

Unfamiliar development evironment: First time handling Laravel and needs to have a understanding of MVC and Eloduent ORM.

## Bonus

I've added a login authentication for the security and functionality of the blog.  These features were not part of the initial requirements, but they added substantial value to the project. Additionally, the improved layout of the index page enhanced the user experience, making the blog more visually appealing and easier to use.

By going the extra mile with these features beyond the basic CRUD operations, I showed initiative and a commitment to delivering a project with expected output. This extra effort and attention to detail are why I think I deserve the bonus point.






