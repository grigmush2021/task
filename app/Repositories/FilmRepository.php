<?php

namespace App\Repositories;

use App\Models\Film;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class FilmRepository extends BaseRepository
{
    protected $model = Film::class;

    /**
     * @param int $userId
     * @return Collection
     */
    public function getFilmsExceptFavourites(int $userId): Collection
    {
        return $this->query()
            ->select('id', 'title', 'description', 'release_year', 'user_id', 'created_at')
            ->whereDoesntHave('favouriteOfUsers', function ($query) use ($userId) {
                return $query->where('users.id', $userId);
            })->get();
    }

    /**
     * @param string $title
     * @param string $description
     * @param $releaseYear
     * @param int $userId
     * @return Film
     */
    public function createFilm(string $title, string $description, $releaseYear, int $userId): Film
    {
        /** @var Film $film */
        return $this->query()->create([
            'title' => $title,
            'description' => $description,
            'release_year' => $releaseYear,
            'user_id' => $userId,
        ]);
    }

    public function addToFavourites(User $user, int $filmId)
    {
        $user->favourites()->attach($filmId);
    }
}
