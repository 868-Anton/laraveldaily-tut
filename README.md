# ****Laravel 9 For Beginners: Your First Project****




### Intro and static pages

- `assets()` to get files from public
- `→name('home')` at the end of routes to give it a special name to then add to `route()`
- `route('home’)` in href for links
- `@yeild('content')` passes into app.blade.php
- `@section('content')` wraps content of view eg Home, About, Contacts
- `@foreach` make sure to begin before the div and end after the closing tag of div

### Viewing Data from Database

- `php artisan migrate`
- `php artisan make:migration create_categories_table` generates a new class
- run  `php artisan migrate` again to complete
- `php artisan migrate:rollback`= will run only the rollback the last batch
- `php artisan make:model Category`
- ways to pass dynamic data to view from `controller` function index
    1. manually - creating array  = `$allCategories` `= [’Category 1’ , ’Category 1’]`
    2. calling DB directly = `$allCategories = DB::table(table:’categories’)→get();` 
    3. using model = `$allCategories` = `Category::all();`
    4. `return view(’index’,[’categories’ ⇒ $allCategories]);`
- routes ⇒ `Route::get(’/’,[HomeController::class,’index’])→name(’home’);`
- relationships every `post` belongs to a `category`
- Eloquent `**“Tricks"`**  `php artisan make:model Post -m`  - creates a model called post and a migration for it
- make more fields in the migration create_posts_table.php and define a relationship post to categories
    - `$table→string(column:’title’);`  a field for DB table
    - `$table→foreignId(column:’category_id’)→constrained();` a relationship field or ForeginId for another table field
        - `→constrained()` ***which means it refers to the id field on the category tabl***e
- run  `php artisan migrate` again to complete
- ways to pass dynamic data to view from `controller` function index, adding Post
    1. `$posts = Post::orderBy(’id’, ‘desc’);` here it sort the post by id in desc order
    2. `$posts = Post::latest()->**get**();`  here it gets the lasted 
    3. `return view(’index’,[’categories’ ⇒ $allCategories, 'posts'=> $posts]);`
- When can have an array  with the same keys and values
- `key => value`  **use a method called compact()  so the following will work**
    1. `return view(’index’, [’categories’ ⇒ $categories, 'posts'=> $posts]);` so this 
    2. `return view(’index’, **compact**('categories' , 'posts' );` becomes this
