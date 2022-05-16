<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\CarruselController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\EncabezadoController;
use App\Http\Controllers\DatoController;
use App\Http\Controllers\Datos_miembroController;
use App\Http\Controllers\QuienController;
use App\Http\Controllers\Encabezados_dicenController;
use App\Http\Controllers\Datos_dicenController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\Footer_tituloController;
use App\Http\Controllers\Footer_utilController;
use App\Http\Controllers\Carrusel_nosotroController;
use App\Http\Controllers\Carrusel_servicioController;
use App\Http\Controllers\Carrusel_contactoController;
use App\Http\Controllers\Encabezado_miembroController;
use App\Http\Controllers\Inicio_imagenController;
use App\Http\Controllers\LocationController;
use App\Models\Header;
use App\Models\Inicio_imagen;
use App\Models\Carrusel;
use App\Models\Servicio;
use App\Models\Encabezado;
use App\Models\Dato;
use App\Models\Quien;
use App\Models\Encabezados_dicen;
use App\Models\Encabezado_miembro;
use App\Models\Datos_dicen;
use App\Models\Datos_miembro;
use App\Models\Contact;
use App\Models\Email;
use App\Models\Contacto;
use App\Models\Footer_titulo;
use App\Models\Footer_util;
use App\Models\Carrusel_nosotro;
use App\Models\Carrusel_servicio;
use App\Models\Carrusel_contacto;
use App\Models\Location;
use App\Mail\MailSend;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
  //  return view('/principal/index');
//});

Route::get('/', function () {
    $header = Header::first();
    $carrusel = Carrusel::all();
    $servicio = Servicio::all();
    $crecimiento = Encabezado::first();
    $datos = Dato::all();
    $quienes = Quien::first();
    $encabezados_dicen = Encabezados_dicen::first();
    $datos_dicen = Datos_dicen::all();
    $contacto = Contacto::first();
    $footer_titulo = Footer_titulo::first();
    $footer_utiles = Footer_util::all();
    return view('/principal/index',compact("header","carrusel","servicio","crecimiento","datos","quienes","encabezados_dicen","datos_dicen","contacto","footer_titulo","footer_utiles"));
});

Route::get('/contactos', function () {
    $header = Header::first();
    $carrusel = Carrusel::all();
    $servicio = Servicio::all();
    $crecimiento = Encabezado::first();
    $carrusel_contactos = Carrusel_contacto::first();
    $datos = Dato::all();
    $datos_miembros = Datos_miembro::all();
    $locations = Location::all();
    $quienes = Quien::first();
    $encabezados_dicen = Encabezados_dicen::first();
    $datos_dicen = Datos_dicen::all();
    $contacto = Contacto::first();
    $footer_titulo = Footer_titulo::first();
    $footer_utiles = Footer_util::all();
    return view('/principal/contacto',compact("header","carrusel","servicio","crecimiento","datos","quienes","encabezados_dicen","datos_dicen","contacto","footer_titulo","footer_utiles","carrusel_contactos","datos_miembros","locations"));
});

Route::get('/nosotros', function () {
    $header = Header::first();
    $carrusel = Carrusel::all();
    $carrusel_nosotros = Carrusel_nosotro::first();
    $carrusel_servicios = Carrusel_servicio::first();
    $encabezado_miembros = Encabezado_miembro::first();
    $servicio = Servicio::all();
    $crecimiento = Encabezado::first();
    $datos = Dato::all();
    $quienes = Quien::first();
    $encabezados_dicen = Encabezados_dicen::first();
    $datos_dicen = Datos_dicen::all();
    $datos_miembros = Datos_miembro::all();
    $contacto = Contacto::first();
    $footer_titulo = Footer_titulo::first();
    $footer_utiles = Footer_util::all();
    return view('/principal/about',compact("header","carrusel","servicio","crecimiento","datos","quienes","encabezados_dicen","datos_dicen","contacto","footer_titulo","footer_utiles","carrusel_nosotros","carrusel_servicios","encabezado_miembros","datos_miembros"));
});

Route::get('/servicios', function () {
    $header = Header::first();
    $carrusel = Carrusel::all();
    $servicio = Servicio::all();
    $carrusel_servicios = Carrusel_servicio::first();
    $footer_titulo = Footer_titulo::first();
    $footer_utiles = Footer_util::all();
   // $about = About::find(1);
   // $item = Item::all();
   // $seccion = Seccion::all();
   // $categoria = Categoria::all();
   // $img_cat = Imagenes_categoria::all();
   // $sub = Sub::find(1);
   // $subport = SubPort::find(1);
   // $team = Team::all();
   // $footer = Footer::find(1);
   // $config = Config::find(1);
    return view('/principal/servicios',compact("header","carrusel","servicio","carrusel_servicios","footer_titulo","footer_utiles"));
});

Route::middleware(['auth:sanctum', 'verified'])->resource('admin/header', HeaderController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('admin/new_carrusel', CarruselController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('admin/servicio', ServicioController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('admin/encabezado_crecimiento', EncabezadoController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('admin/datos_crecimiento', DatoController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('admin/encabezado_miembros', Encabezado_miembroController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('admin/datos_miembros', Datos_miembroController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('admin/quienes', QuienController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('admin/encabezados_dicen', Encabezados_dicenController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('admin/datos_dicen', Datos_dicenController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('admin/email', EmailController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('admin/contacto', ContactoController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('admin/footer_titulo', Footer_tituloController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('admin/footer_utiles', Footer_utilController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('admin/carrusel_nosotros', Carrusel_nosotroController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('admin/carrusel_servicios', Carrusel_servicioController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('admin/carrusel_contactos', Carrusel_contactoController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('admin/inicio_imagenes', Inicio_imagenController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('admin/locations', LocationController::class);




Route::post('/datos_contacto', function (Request $request) {

    $mail= Email::first();
    $contacts = new Contact();
    $request->validate([
        'name' => 'required|min:1',
        'email' => 'required|email|min:1',
        'subject' => 'required|min:1',
        'message' => 'required|min:1',

    ]);
    $contacts->name=$request->name;
    $contacts->email=$request->email;
    $contacts->subject=$request->subject;
    $contacts->message=$request->message;
    $subject=$request->subject;
    $for="$mail->mail";
    $of=env('MAIL_FROM_ADDRESS', 'hello@example.com');
    $contacts->save();

$subject = "$request->subject";
        Email::send('mail',[ 'name' => "$request->name",
        'email' => "$request->email",
        'mssg' => "$request->message",
        'subject' => "$request->subject"], function($msj) use($subject,$for,$of){
            $msj->from($of,"Blaster");
            $msj->subject($subject);
            $msj->to($for);
        });
   return redirect()->back();
})->name("contacts.store");


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

