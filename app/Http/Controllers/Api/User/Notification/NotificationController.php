<?php

namespace App\Http\Controllers\Api\User\Notification;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\User\Notification\NotificationRepositories;

class NotificationController extends Controller
{

    public function index(Request $request)
    {
        $notifications = Notification::with('sender')->where('user_id', Auth::user()->id ?? '')->orderBy('created_at', 'DESC')->get()->groupBy(function ($item) {
            return $item->created_at->format('m/d/Y');
        });

        $NotificationArr = [];

        if ($notifications->count()) {
            foreach ($notifications as $date => $userObj) {
                $user['date'] = $date;
                $user['notifications'] = $userObj;
                $NotificationArr[] = $user;
            }

            $status = 1;
            $message = 'Success';
            $count_not = Notification::where('user_id', Auth::user()->id)->where('is_read', 0)->count();
            $data = ['badge' => $count_not, 'notifications' => $NotificationArr];
        } else {
            $status = 0;
            $message = 'Notifications Not Found!';
            $data = $NotificationArr;
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ]);
    }

    public function notificationDelete(Request $request)
    {
        if ($request->type == 'single') {

            $notification = Notification::find($request->notification_id);

            if ($notification) {
                $notification->delete();
                $status = 1;
                $message = 'Notification has been removed successfully';
            } else {
                $status = 0;
                $message = 'Invalid Notification Id';
            }

            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => []
            ]);
        } elseif ($request->type == 'mass') {

            $notifications = Notification::where('user_id', Auth::user()->id)->get();

            if (count($notifications) > 0) {
                foreach ($notifications as $notification) {
                    $notification->delete();
                }

                return response()->json([
                    'status' => 1,
                    'message' => 'Notifications has been removed successfully',
                    'data' => []
                ]);
            } else {
                return response()->json([
                    'status' => 0,
                    'message' => 'No Record Found!',
                    'data' => []
                ]);
            }

        } else {
            return response()->json([
                'status' => 0,
                'message' => 'No Type Found',
                'data' => []
            ]);
        }
    }

    public function notificationRead(Request $request)
    {
        $notifications = Notification::where('user_id', Auth::user()->id)->get();

        if (count($notifications) > 0) {
            foreach ($notifications as $notification) {
                $notification->is_read = 1;
                $notification->save();
            }

            return response()->json([
                'status' => 1,
                'message' => 'Notifications has been read successfully',
                'data' => []
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'No Record Found!',
                'data' => []
            ]);
        }
    }
}
