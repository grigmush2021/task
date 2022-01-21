<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Film\AddToFavouritesRequest;
use App\Http\Requests\Film\StoreRequest;
use App\Http\Resources\FilmResource;
use App\Models\User;
use App\Repositories\FilmRepository;
use Illuminate\Support\Facades\Auth;

class FilmController extends Controller
{
    public function index(FilmRepository $repository)
    {
        $userId = Auth::id();
        $films = $repository->getFilmsExceptFavourites($userId);

        return FilmResource::collection($films);
    }

    public function store(StoreRequest $request, FilmRepository $repository)
    {
        $inputs = $request->validated();
        $userId = Auth::id();
        $film = $repository->createFilm($inputs['title'], $inputs['description'], $inputs['release_year'], $userId);

        return FilmResource::make($film);
    }

    public function addToFavourites(AddToFavouritesRequest $request, FilmRepository $repository)
    {
        /** @var User $user */
        $user = Auth::user();
        $inputs = $request->validated();
        $repository->addToFavourites($user, $inputs['film_id']);

        return response()->json([
            'success' => 'true',
        ]);
    }
}
