<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function demo(): void
    {
        /** @var User $user */
        $user = User::query()->first();
        $notifications = $user->unreadNotifications()->get();

        $notifications->map(fn (DatabaseNotification $notification) => $notification->toArray());
    }
}
