<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TelegramAuth
{
    public function handle(Request $request, Closure $next)
    {
        $initData = $request->header('X-Telegram-Init-Data');
        
        if (!$initData) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $data = [];
        parse_str($initData, $data);

        if (!isset($data['user'])) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $userData = json_decode($data['user'], true);
        
        // Создаем или обновляем пользователя
        $user = \App\Models\User::updateOrCreate(
            ['telegram_id' => $userData['id']],
            [
                'first_name' => $userData['first_name'] ?? null,
                'last_name' => $userData['last_name'] ?? null,
                'username' => $userData['username'] ?? null,
            ]
        );

        Auth::login($user);

        return $next($request);
    }
} 