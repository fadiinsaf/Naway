<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileCompletionController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\InstrumentController;
use App\Http\Controllers\MaqamController;
use App\Http\Controllers\RhythmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminUserController;
use App\Models\User;
use App\Models\Artist;
use App\Models\Instrument;
use App\Models\Maqam;
use App\Models\Rhythm;
use App\Models\Comment;
use App\Models\Genre;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('home'); });
Route::get('/home', function () { return view('home'); });
Route::get('/about', function () { return view('about'); });

Route::get('/account/suspended', function () { return view('auth.suspended'); })->name('account.suspended');
Route::get('/account/banned', function () { return view('auth.banned'); })->name('account.banned');

Route::get('/artists', function () { return view('artist.index', ['artists' => Artist::where('is_published', true)->paginate(9)]); });
Route::get('/artists/{artist}', function (Artist $artist) { return view('artist.show', compact('artist')); })->name('artists.show');
Route::get('/instruments', function () { return view('instrument.index', ['instruments' => Instrument::where('is_published', true)->paginate(9)]); });
Route::get('/instruments/{instrument}', function (Instrument $instrument) { return view('instrument.show', compact('instrument')); })->name('instruments.show');
Route::get('/maqams', function () { return view('maqam.index', ['maqams' => Maqam::where('is_published', true)->get()]); });
Route::get('/rhythms', function () { return view('rhythm.index', ['rhythms' => Rhythm::where('is_published', true)->get()]); });
Route::get('/genres', function () { return view('genre.index', ['genres' => Genre::where('is_published', true)->get()]); });

Route::get('/search', [\App\Http\Controllers\SearchController::class, 'search'])->name('search');

Route::middleware('auth')->group(function () {
    Route::get('/complete-profile', [ProfileCompletionController::class, 'edit'])->name('profile.complete');
    Route::patch('/complete-profile', [ProfileCompletionController::class, 'update'])->name('profile.complete.update');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/theme', [ProfileController::class, 'updateTheme'])->name('profile.theme.update');

    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::put('/comments/{comment}', [CommentController::class, 'userUpdate'])->name('comments.userUpdate');
    Route::delete('/comments/{comment}', [CommentController::class, 'userDestroy'])->name('comments.userDestroy');
    Route::post('/likes/toggle', [\App\Http\Controllers\LikeController::class, 'toggle'])->name('likes.toggle');
});

Route::middleware(['auth', 'profile.completed'])->group(function () {
    Route::get('/social', function (\Illuminate\Http\Request $request) { 
        $query = App\Models\User::where('id', '!=', \Illuminate\Support\Facades\Auth::id());
        $tab = $request->query('tab', 'all');
        
        if ($tab === 'admin') {
            $query->where('role', 'admin');
        } elseif ($tab === 'oud') {
            $query->where('speciality', 'Oud');
        } elseif ($tab === 'singer') {
            $query->where('speciality', 'Singer');
        }
        
        $users = $query->paginate(9)->appends(['tab' => $tab]);
        return view('social.index', compact('users', 'tab')); 
    })->name('social.index');
    Route::get('/messages', function () { return view('social.messages'); });
    Route::get('/conversation', function () { return view('social.conversation'); });
    Route::get('/game', function () { return view('game.index'); });
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard', [
            'totalUsers' => User::count(),
            'totalArtists' => Artist::count(),
            'totalInstruments' => Instrument::count(),
            'totalMaqams' => Maqam::count(),
            'totalRhythms' => Rhythm::count(),
            'totalComments' => Comment::count(),
            'libraryItems' => Artist::count() + Instrument::count() + Maqam::count() + Rhythm::count(),
            'pendingMods' => Comment::where('approved', false)->count(),
        ]);
    });

    Route::get('/admin/artists', [ArtistController::class, 'index'])->name('admin.artists.index');
    Route::post('/admin/artists', [ArtistController::class, 'store'])->name('admin.artists.store');
    Route::put('/admin/artists/{artist}', [ArtistController::class, 'update'])->name('admin.artists.update');
    Route::delete('/admin/artists/{artist}', [ArtistController::class, 'destroy'])->name('admin.artists.destroy');

    Route::get('/admin/instruments', [InstrumentController::class, 'index'])->name('admin.instruments.index');
    Route::post('/admin/instruments', [InstrumentController::class, 'store'])->name('admin.instruments.store');
    Route::put('/admin/instruments/{instrument}', [InstrumentController::class, 'update'])->name('admin.instruments.update');
    Route::delete('/admin/instruments/{instrument}', [InstrumentController::class, 'destroy'])->name('admin.instruments.destroy');

    Route::get('/admin/rhythms', [RhythmController::class, 'index'])->name('admin.rhythms.index');
    Route::post('/admin/rhythms', [RhythmController::class, 'store'])->name('admin.rhythms.store');
    Route::put('/admin/rhythms/{rhythm}', [RhythmController::class, 'update'])->name('admin.rhythms.update');
    Route::delete('/admin/rhythms/{rhythm}', [RhythmController::class, 'destroy'])->name('admin.rhythms.destroy');

    Route::get('/admin/genres', [GenreController::class, 'index'])->name('admin.genres.index');
    Route::post('/admin/genres', [GenreController::class, 'store'])->name('admin.genres.store');
    Route::put('/admin/genres/{genre}', [GenreController::class, 'update'])->name('admin.genres.update');
    Route::delete('/admin/genres/{genre}', [GenreController::class, 'destroy'])->name('admin.genres.destroy');

    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::post('/admin/users/{user}/suspend', [AdminUserController::class, 'suspend'])->name('admin.users.suspend');
    Route::post('/admin/users/{user}/unsuspend', [AdminUserController::class, 'unsuspend'])->name('admin.users.unsuspend');
    Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
    Route::post('/admin/users/{id}/restore', [AdminUserController::class, 'restore'])->name('admin.users.restore');

    Route::get('/admin/maqams', [MaqamController::class, 'index'])->name('admin.maqams.index');
    Route::post('/admin/maqams', [MaqamController::class, 'store'])->name('admin.maqams.store');
    Route::put('/admin/maqams/{maqam}', [MaqamController::class, 'update'])->name('admin.maqams.update');
    Route::delete('/admin/maqams/{maqam}', [MaqamController::class, 'destroy'])->name('admin.maqams.destroy');

    Route::get('/admin/comments', [CommentController::class, 'index'])->name('admin.comments.index');
    Route::post('/admin/comments/{comment}/approve', [CommentController::class, 'approve'])->name('admin.comments.approve');
    Route::delete('/admin/comments/{comment}', [CommentController::class, 'destroy'])->name('admin.comments.destroy');

    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
});

require __DIR__.'/auth.php';