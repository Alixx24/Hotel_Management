<?php

use App\Http\Controllers\Admin\Ticket\TicketAdminController;
use App\Http\Controllers\Admin\Ticket\TicketCategoryController;
use App\Http\Controllers\admin\ticket\TicketController;
use App\Http\Controllers\Admin\Ticket\TicketPriorityController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Service\HotelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\Profile\OrderController as ProfileOrderController;
use App\Http\Controllers\Customer\Profile\TicketController as ProfileTicketController;
use App\Http\Controllers\Customer\Profile\ProfileController;
use App\Http\Controllers\MySessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



// Route::get('/', [AdminController::class, 'index']);
Route::get('/home', [AdminController::class, 'index'])->name('home');
Route::get('/create_room', [AdminController::class, 'create_room'])->name('room.create');
Route::post('/add_room', [AdminController::class, 'add_room'])->name('room.store');
Route::get('/view_room', [AdminController::class, 'view_room'])->name('room.view');
Route::get('/delete_room/{id}', [AdminController::class, 'delete_room'])->name('room.delete');
Route::get('/update_room/{id}', [AdminController::class, 'update_room'])->name('room.update');
Route::post('/edit_room/{id}', [AdminController::class, 'edit_room'])->name('room.edit');




//home
Route::get('/', [HomeController::class, 'index'])->name('room.home');

Route::get('/room_details/{id}', [HomeController::class, 'room_details'])->name('room.home.details');
Route::post('/add_booking/{id}', [HomeController::class, 'add_booking'])->name('room.home.add');
Route::get('/room_details/{fetchRoom}/hotel_violation/{violation}', [HomeController::class, 'violation'])->name('room.home.violation');
Route::get('/hotel_details/{id}', [HomeController::class, 'hotel_details'])->name('hotel.home.details');

Route::post('/hotel_details/{id}/comment', [HomeController::class, 'commentStore'])->name('hotel.home.comment');
Route::post('/hotel_details/{id}/commentGuest', [HomeController::class, 'commentGuestStore'])->name('hotel.home.comment');

//Services Hotel

Route::get('/hotels', [HotelController::class, 'index'])->name('hotel.view');
Route::get('/hotel/add', [HotelController::class, 'create'])->name('hotel.add');
Route::get('/hotel/edit/{id}', [HotelController::class, 'edit'])->name('hotel.agent.edit');
Route::post('/hotel/update/{id}', [HotelController::class, 'update'])->name('hotel.agent.update');


Route::get('/agent/register', [HotelController::class, 'agentRegister'])->name('hotel.agent.register.view');
Route::post('/agent/register', [HotelController::class, 'agentRegisterStore'])->name('hotel.agent.register.store');

//Agents Hotels
Route::get('/agent/login', [HotelController::class, 'login'])->name('hotel.agent.login.view');
Route::post('/agent/login', [HotelController::class, 'checkLogin'])->name('hotel.agent.login.check');
Route::get('/agent/dashboard/{id}', [HotelController::class, 'agentDashboard'])->name('hotel.agent.dashboard');

// https://www.youtube.com/watch?v=1K-4KcTVGIs&list=PLm8sgxwSZofeShFFRAfENHymQoKemCGtR&index=3

//Ticket
Route::prefix('admin/ticket')->namespace('Ticket')->group(function () {

    //category
    Route::prefix('category')->group(function () {
        Route::get('/', [TicketCategoryController::class, 'index'])->name('admin.ticket.category.index');
        Route::get('/create', [TicketCategoryController::class, 'create'])->name('admin.ticket.category.create');
        Route::post('/store', [TicketCategoryController::class, 'store'])->name('admin.ticket.category.store');
        Route::get('/edit/{ticketCategory}', [TicketCategoryController::class, 'edit'])->name('admin.ticket.category.edit');
        Route::put('/update/{ticketCategory}', [TicketCategoryController::class, 'update'])->name('admin.ticket.category.update');
        Route::delete('/destroy/{ticketCategory}', [TicketCategoryController::class, 'destroy'])->name('admin.ticket.category.destroy');
        Route::get('/status/{ticketCategory}', [TicketCategoryController::class, 'status'])->name('admin.ticket.category.status');
    });

    //priority
    Route::prefix('priority')->group(function () {
        Route::get('/', [TicketPriorityController::class, 'index'])->name('admin.ticket.priority.index');
        Route::get('/create', [TicketPriorityController::class, 'create'])->name('admin.ticket.priority.create');
        Route::post('/store', [TicketPriorityController::class, 'store'])->name('admin.ticket.priority.store');
        Route::get('/edit/{ticketPriority}', [TicketPriorityController::class, 'edit'])->name('admin.ticket.priority.edit');
        Route::put('/update/{ticketPriority}', [TicketPriorityController::class, 'update'])->name('admin.ticket.priority.update');
        Route::delete('/destroy/{ticketPriority}', [TicketPriorityController::class, 'destroy'])->name('admin.ticket.priority.destroy');
        Route::get('/status/{ticketPriority}', [TicketPriorityController::class, 'status'])->name('admin.ticket.priority.status');
    });

    //admin
    Route::prefix('admin')->group(function () {
        Route::get('/', [TicketAdminController::class, 'index'])->name('admin.ticket.admin.index');
        Route::get('/set/{admin}', [TicketAdminController::class, 'set'])->name('admin.ticket.admin.set');
    });

    //main
    Route::get('/', [TicketController::class, 'index'])->name('admin.ticket.index');
    Route::get('/new-tickets', [TicketController::class, 'newTickets'])->name('admin.ticket.newTickets');
    Route::get('/open-tickets', [TicketController::class, 'openTickets'])->name('admin.ticket.openTickets');
    Route::get('/close-tickets', [TicketController::class, 'closeTickets'])->name('admin.ticket.closeTickets');
    Route::get('/show/{ticket}', [TicketController::class, 'show'])->name('admin.ticket.show');
    Route::post('/answer/{ticket}', [TicketController::class, 'answer'])->name('admin.ticket.answer');
    Route::get('/change/{ticket}', [TicketController::class, 'change'])->name('admin.ticket.change');
});


Route::prefix('userprofile')->namespace('Profile')->group(function () {

    Route::get('/orders', [ProfileOrderController::class, 'index'])->name('customer.profile.orders');
    Route::get('/profile', [ProfileController::class, 'index'])->name('customer.profile.profile');
    Route::get('/my-tickets', [ProfileTicketController::class, 'index'])->name('customer.profile.my-tickets');
    Route::get('my-tickets/show/{ticket}', [ProfileTicketController::class, 'show'])->name('customer.profile.my-tickets.show');
    Route::post('my-tickets/answer/{ticket}', [ProfileTicketController::class, 'answer'])->name('customer.profile.my-tickets.answer');
    Route::get('my-tickets/change/{ticket}', [ProfileTicketController::class, 'change'])->name('customer.profile.my-tickets.change');
    Route::get('my-tickets/create', [ProfileTicketController::class, 'create'])->name('customer.profile.my-tickets.create');
    Route::post('my-tickets/store', [ProfileTicketController::class, 'store'])->name('customer.profile.my-tickets.store');
    // Route::post('my-tickets/dowload/{file_name}', [ProfileTicketController::class, 'store'])->name('customer.profile.my-tickets.store');

});

Route::get('session/get',[MySessionController::class, 'accessSessionData']);
Route::get('session/set',[MySessionController::class, 'storeSessionData']);
Route::get('session/remove',[MySessionController::class, 'deleteSessionData']);