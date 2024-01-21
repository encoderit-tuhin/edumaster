<?php

namespace App\Traits;

use App\UserLog;

trait Trackable
{
    public function trackAction($action = 'create', $model = null, $model_id = null, $detail = null): void
    {
        try {
            if (!auth()->check()) return;

            $user = auth()->user();
            $user_id = $user->id;
            $ip_address = request()->ip();
            $url = request()->fullUrl();

            $userLog = new UserLog();
            $userLog->user_id = $user_id;
            $userLog->ip_address = $ip_address;
            $userLog->action = $action;
            $userLog->detail = $detail;
            $userLog->model = $model;
            $userLog->url = $url;
            $userLog->model_id = $model_id;
            $userLog->save();
        } catch (\Throwable $th) {
            //
        }
    }
}
