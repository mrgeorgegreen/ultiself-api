<?php

namespace App\Http\Controllers;

use App\Models\Habits;
use App\Http\Requests\HabitsRequest;
use App\Repositories\HabitRepository;
use \Illuminate\Http\JsonResponse;

class HabitsController extends Controller
{
    /**
     * @param HabitsRequest $habits
     * @return JsonResponse
     */
    public function habits(HabitsRequest $habits): JsonResponse
    {
        // todo make class fore response
        return (new HabitRepository())
            ->setLocale($habits->input('locale'))
            ->setSkip($habits->input('skip'))
            ->setTake($habits->input('take'))
            ->setActive($habits->input('active'))
            ->all();
    }
}
