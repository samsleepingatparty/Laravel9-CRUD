<!-- Improved compatibility of back to top link: See: https://github.com/othneildrew/Best-README-Template/pull/73 -->
<a name="readme-top"></a>
<!-- -->

<!-- BADGE-->
<p align="center">
<img src='https://forthebadge.com/images/badges/built-with-love.svg' />
</p>

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/othneildrew/Best-README-Template">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/50px-Laravel.svg.png?20190820171151" alt="Laravel" width="80" height="80">
  </a>
<h3 align="center">CRUD menggunakan Laravel 9 & Bootstrap (AdminLTE)</h3>
  <p align="center">
  <img src='https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white' />
  <img src='https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white' />
  <img src='https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white' />
  <img src='https://img.shields.io/badge/JavaScript-323330?style=for-the-badge&logo=javascript&logoColor=F7DF1E' />
  <br>
    <a href="https://github.com/othneildrew/Best-README-Template">View Demo</a>
    ·
    <a href="https://github.com/othneildrew/Best-README-Template/issues">Report Bug</a>
  </p>
</div>


<!-- ABOUT THE PROJECT -->
## Tentang Project
Project Create, Read, Update, Delete (CRUD) dengan menggunakan Laravel 9 dan Bootstrap.

Points:
* Struktur penuh dengan Model, Controller, dan Route.
* Styling dengan Bootstrap dan menggunakan Laravel UI
* Menggunakan auth

### Frameworks
* <img src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white" />
* <img src='https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white' />
* <img src='https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white' />
* <img src='https://img.shields.io/badge/Node.js-339933?style=for-the-badge&logo=nodedotjs&logoColor=white' />

<!-- GETTING STARTED -->
## Permulaan

Siapkan XAMPP, dan NodeJS versi terbaru. Start XAMPP Server & PHPmyAdmin.

### Installation

_Installation. CMD._

1. Create Project (Composer)
   ```sh
   composer create-project laravel/laravel folder
   ```
2. Serve to run for the first time
   ```sh
   php artisan serve
   ```
Open VSCode with (code .)

<!-- Awal -->
## Route, Model, dan Koneksi

### Route
* _Sebelu melakukan route, buat database dan table di Phpmyadmin._
* _Konfigurasi database dan koneksi ada pada file .env bagian DB._

1. Migrate
   ```sh
   php artisan migrate
   ```
2. Create new table
   ```sh
   php artisan make:migration create_product_table
   ```
   
* _On create_product_table add._

3. Add variables on public function up()
   ```sh
   $table->id();
   $table->string('nama')->nullable();
   $table->string('harga')->nullable();
   $table->enum('stock', ['Ready','No']);
   $table->timestamps();
   ```
<b>nullable() artinya bisa dikosongkan. enum untuk berupa pilihan</b>

<b>Migrasikan tabel baru</b>

4. Migrate
   ```sh
   php artisan migrate
   ```

### Model 
_Model, perwakilan dari tiap-tiap tabel yang akan dimanipulasi di Laravel._

1. Membuat model
   ```sh
   php artisan make:model Product
   ```
   <b>Nama table harus sama dengan model.</b>

2. Tambahkan command setelah _use HasFactory._
   ```sh
   protected $table = 'Product'
   ```

<!-- Tengah -->
## Create, Read, Update, & Delete

### Membaca data dari Database

1. Menambahkan route pada web.php
   ```sh
   Route::get('/product',[ProductController::class]);
   ```
  
2. Membuat Controller dengan terminal
   ```sh
   php artisan make:controller ProductController
   ```
<b>Folder Controller ada di app/Http/Controllers</b>

3. Edit route
   ```sh
   Route::get('/product',[ProductController::class,'index']);
   ```
4. Tambah use
   ```sh
   use App\Http\Controller\ProductControllers;
   ```
5. Tambahkan data secara manual di database
6. Menambahkan function pada ProductController
   ```sh
   public function index() {
    $product = Product::all();
    return view('product.index',compact(['product']);
   ```
7. Membuat tampilan table sementara di index.blade.php (resources/views/product)
   ```sh
   <table border="5">
   <tr>
      <th>Nama</th>
      <th>Harga</th>
      <th>Stock</th>
   <tr>
   @foreach($product as $p)
      <td{{$p->id}}</td
      <td{{$p->nama</td>
      <td{{$p->stock}}</td>
   <tr>
   @endforeach

### Membuat data dan dimasukan ke database
1. Menambahkan route di web.php
   ```sh
   Route::get('/product/create',[ProductController::class,'create']);
   ```
2. Menambahkan function di ProductController
   ```sh
   public function create() 
   {
   return view('product.create');
   }
   ```
3. Pada resources/views/product, buat create.blade.php
   <br>
4. Tambahkan button pada index.blade.php
   ```sh
   <a href="/product/create">Add Product</a>
   ```
5. Pada create.blade.php tambahkan:
   ```sh
   form action="/product/store" method="POST"
   @csrf
   <input type="text" name="nama" placeholder="Nama">
   <input type="text" name="harga" placeholder="Harga"
   <select name="stock">
          <option value="">--</option>
          <option value="Ready">Ready</option>
          <option value="No">Not Ready</option>
   </select>
   <input type="submit" name="submit" value="save">
   ```
6. Menambahkan Route Store pada web.php
   ```sh
   Route::post('/product/store',[ProductController::class,'store']);
   ```
7. Menambahkan function store pada ProductController
   ```sh
   public function store(Request $request)
   {
      Product::create($request->except(['_token','submit']);
      return redirect('/product');
   }
   ```
9. Menambahkan Model
   ```sh
   protected $guarded = [];
   ```
<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Membuat fungsi update
1. Pada index.blade.php menambahkan <th>Action</th> dan <td>Edit</td>
   ```sh
   <td><a href="/product/{{ $p->id }}/edit">Edit</a></td>
   @method('put')
   @csrf
   <form action="/product/{{ $product->id }}>
   ```
2. Menambahka route
   ```sh
   Route::get('/product/{id}/edit',[ProductController::class,'edit']);
   ```
3. Membuat edit.blade.php dengan isi yang sama dengan create.blade.php
4. Menambahkan function pada Controller
   ```sh
   $product = Product::find($id);
   return view('product.edit',compact(['product']);
   ```
5. Pada edit.blade.php menambahkan value
   ```sh
   <value="{{ $product->nama }}">
   <option value="Ready" @if($product->stock == "Ready") selected @endif>
   Pada submit ubah value="update"
   ```
6. Menambahkan route
   ```sh
   Route::put('/product/{id},[ProductController::class,'update']);
   ```
7. Tambahkan function pada ProductController
   ```sh
   public function update($id, Request $request)
   {
   $product = Product::find($id);
   $product -> update($request->expect(['_token','submit']);
   return redirect('/product');
   }
   ```

### Membuat fungsi delete
1. Pada index.blade.php membuat form baru
   ```sh
   <form action="/product/{{ $p->id }}" method="POST">
   @csrf
   @method('delete)
   <input type="submit" value="delete">
   </form>
   ```
2. Tambahkan route
   ```sh
   Route::delete('/product/{id}',[ProductController::class,'destroy']);
   ```
3. Tambahka function pada ProductController
   ```sh
   public function destroy($id)
   {
   $product = Product::find($id);
   $product->delete();
   return redirect('/product');
   }
   ```
   <br>
   <br>
### Auth (Laravel UI)
1. Installasi Laravel UI
   ```sh
   composer require laravel/ui
   ```
2. Installasi styling login/register dasar
   ```sh
   php artisan ui bootstrap --auth
   ```
3. Jalankan NPM
   ```sh
   npm install
   npm run dev
   npm run build
   ```
4. Setting middleware pada web.php
   ```sh
   Route::middleware(['auth'])->group(function()
   {
   Route::get('/product',[ProductController::class,'index']);
   Route::get('/product/create',[ProductController::class,'create']);
   Route::post('/product/store',[ProductController::class,'store']);
   Route::get('/product/{id}/edit',[ProductController::class,'edit']);
   Route::put('/product/{id}',[ProductController::class,'update']);
   Route::delete('/product/{id}',[ProductController::class,'destroy']);
   });
   ```
   <p align="right">(<a href="#readme-top">back to top</a>)</p>
