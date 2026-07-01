@auth
    @php
        $notifications = auth()->user()->unreadNotifications()->latest()->take(5)->get();
        $notificationColors = [
            'success' => 'bg-green-50 border-green-200 text-green-800',
            'error' => 'bg-red-50 border-red-200 text-red-800',
            'warning' => 'bg-yellow-50 border-yellow-200 text-yellow-800',
            'info' => 'bg-blue-50 border-blue-200 text-blue-800',
        ];
    @endphp

    @if($notifications->isNotEmpty())
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
            <div class="flex items-center justify-between mb-3">
                <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                    Notifications
                </h3>

                <form method="POST" action="{{ route('notifications.read-all') }}">
                    @csrf
                    <button type="submit" class="text-sm text-indigo-600 hover:text-indigo-700">
                        Tout marquer comme lu
                    </button>
                </form>
            </div>

            <div class="space-y-3">
                @foreach($notifications as $notification)
                    <div class="border rounded-lg px-4 py-3 {{ $notificationColors[$notification->data['type'] ?? 'info'] }}">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="font-semibold">
                                    {{ $notification->data['title'] ?? 'Notification' }}
                                </p>
                                <p class="text-sm mt-1">
                                    {{ $notification->data['message'] ?? '' }}
                                </p>
                                <p class="text-xs mt-2 opacity-70">
                                    {{ $notification->created_at->diffForHumans() }}
                                </p>
                            </div>

                            <form method="POST" action="{{ route('notifications.read', $notification->id) }}">
                                @csrf
                                <button type="submit" class="text-sm underline">
                                    Marquer comme lu
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endauth
