<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Resources\Frontend\Notification\Notification as Notifications;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Support\Facades\Auth;

class Notification extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'notifications';
    protected $fillable = ['user_id','sender_id', 'title', 'message','trigger_id','trigger_type','device_type','success','failure' ,'image','is_read','job_id','source'];

    protected static $logAttributes = ['trigger_id','sender_id', 'trigger_type', 'title', 'message','job_id','source'];
    protected static $logName = 'Notification';
    protected static $logOnlyDirty = true;

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function notificationListing()
    {
        $records = $this->listingNotification();

        $result = [];

        if (count($records) > 0) 
        {
            $result = Notifications::collection($records);
        }

        return $result;
    }

    public function listingNotification()
    {
        $records = $this::with('vendor.user_profiles')->orderBy('created_at', 'desc')
        ->orderBy('created_at', 'desc')
        ->where('user_id',Auth::user()->id)
        ->get();

        return $records;
    }

    public function sendPushNotification($fcm_token, $title, $message, $id = "", $trigger_type = "home", $trigger_id = "", $job_id = "", $source = "")
    {
        try {
            $device = User::where('device_token', $fcm_token)->first();
            $push_notification_key = "AAAAX2TDq_w:APA91bEmoIx1jcWEGHG6iYKNI1KS58OhT0Zp9XWKTSuv3mJDleNbaK_mAEkF2afFapDwyxKUYDSn3454_ox2utaJ3oBLtpmEHTFmoG4gd9mVgIC5nzk6aMN4VNt0H3d8A7nLX3-vwE-5";


            if ($device) {
                $url = "https://fcm.googleapis.com/fcm/send";

                $header = [
                    'Authorization:key=' . $push_notification_key,
                    'Content-Type: application/json',
                ];

                $postdata = '{
                        "to" : "' . $fcm_token . '",
                        "notification" : {
                            "title":"' . $title . '",
                            "text" : "' . $message . '",
                            "body" : "' . $message . '"
                        },
                    "data" : {
                        "id" : "' . $id . '",
                        "title":"' . $title . '",
                        "description" : "' . $message . '",
                        "text" : "' . $message . '",
                        "body" : "' . $message . '",
                        "trigger_type" : "' . $trigger_type . '",
                        "trigger_id" : "' . $trigger_id . '",
                        "job_id" : "' . $job_id . '",
                        "source" : "' . $source . '",
                        "is_read": 0
                      }
                }';

                $ch = curl_init();
                $timeout = 120;
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                // Get URL content
                $result = curl_exec($ch);
                // close handle to release resources
                curl_close($ch);
                $success = '';
                $failure = '';
                $res = (array) json_decode($result);
                if (isset($res['success'])) {
                    $success = $res['success'];
                }
                if (isset($res['failure'])) {
                    $failure = $res['failure'];
                }
                $this->title = $title;
                $this->message = $message;
                $this->trigger_type = $trigger_type;
                $this->trigger_id = $trigger_id;
                $this->job_id = $job_id;
                $this->source = $source;
                $this->user_id = $device->id;
                $this->sender_id = Auth::user()->id;
                $this->device_type = $device->device_type;
                $this->success = $success;
                $this->failure = $failure;
                $this->save();

                return $this;
            }
        } catch (\Exception $ex) {
            dd($ex);
        }
    }
}
