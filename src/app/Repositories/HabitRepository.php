<?php

namespace App\Repositories;

use App\Models\Habits;
use \Illuminate\Http\JsonResponse;

class HabitRepository extends Repository
{
    /*
     *
     */
    public function all(): JsonResponse
    {
        $locale = $this->getParameter('locale');
        $skip = $this->getParameter('skip');
        $take = $this->getParameter('take');
        $active = $this->getParameter('active');

        $model = Habits::join('habits_translations', 'habits_translations.habit', '=', 'habits.id')
            ->orderBy('habits_translations.title')
            ->where('habits_translations.locale', '=', $locale)
            ->skip($skip)
            ->take($take);

        if (!is_null($active)) {
            $model->where('habits.active', '=', $active);
        }

        $habits = $model->get([
            'habits_translations.title',
            'habits.photo1x',
            'habits.photo2x',
            'habits.photo3x',
            'habits.active',
        ]);

        return response()->json([
            'habits' => $habits,
            'params' => $this->parameters
        ]);
    }

    /**
     * @param string|null $locale
     * @return $this
     */
    public function setLocale(?string $locale): HabitRepository
    {
        $this->setParameter('locale', $locale ?? config('defaults.api.locale'));
        return $this;
    }

    /**
     * @param int|null $skip
     * @return HabitRepository
     */
    public function setSkip(?int $skip): HabitRepository
    {
        $this->setParameter('skip', $skip ?? config('defaults.api.skip'));
        return $this;
    }

    /**
     * @param int|null $take
     * @return HabitRepository
     */
    public function setTake(?int $take): HabitRepository
    {
        if ($take) {
            $this->setParameter(
                'take',
                $take > config('defaults.api.take')
                    ? config('defaults.api.take_max')
                    : config('defaults.api.take')
            );

        } else {
            $this->setParameter('take', config('defaults.api.take'));
        }
        return $this;
    }

    /**
     * @param int|null $active
     * @return HabitRepository
     */
    public function setActive(?int $active): HabitRepository
    {
        $this->setParameter('active', $active);
        return $this;
    }
}
