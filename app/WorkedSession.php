<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Worked;

class WorkedSession extends Model
{
    public function workeds()
    {
        return $this->hasMany('App\Worked', 'session_id', 'id');
    }
    
    public static function getCurrentSession()
    {
        return WorkedSession::orderByDesc('created_at')->first();
    }

    public static function canStart()
    {
        return (WorkedSession::getCurrentSession() == null || WorkedSession::getCurrentSession()->status == 'stop');
    }

    public static function canPause()
    {
        return (WorkedSession::getCurrentSession() != null && in_array(WorkedSession::getCurrentSession()->status, ['start', 'resume']));
    }

    public static function canResume()
    {
        return (WorkedSession::getCurrentSession() != null && WorkedSession::getCurrentSession()->status == 'pause');
    }
    
    public static function canStop()
    {
        return (WorkedSession::getCurrentSession() != null && in_array(WorkedSession::getCurrentSession()->status, ['start', 'pause', 'resume']));
    }

    public function getStatusColor()
    {
        $color = [
            "start" => "success",
            "pause" => "warning",
            "resume" => "success",
            "stop" => "danger"
        ];

        return $color[$this->status];
    }

    public function displayFinalizedSession()
    {   
        $worked = $this->workeds()->where('status', 'stop')->orderByDesc('id')->first();
        return $this->status == 'stop' ?  $worked->updated_at->translatedFormat('H:i:s') :  '¡A currar, no te entretengas!';   
    }
}
