<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function read(string $notificationId)
    {
        $notification = Auth::user()->notifications()->findOrFail($notificationId);
        $notification->markAsRead();

        return redirect()->back();
    }

    public function readAll()
    {
        Auth::user()->unreadNotifications()->update([
            'read_at' => now(),
        ]);

        return redirect()->back();
    }
}
