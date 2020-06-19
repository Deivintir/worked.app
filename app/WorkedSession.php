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

    public function getTotalPaused()
    {
        $last_pause = null;
        $total_time = null;
        foreach ($this->workeds as $worked){
            if ($worked->status == 'pause') {
                $last_pause = $worked;
            }
            if ($last_pause != null && $last_pause->status == 'pause'){
                $rested_time = $worked->created_at->diffAsCarbonInterval($last_pause->created_at);
                if ($total_time == null) {
                    $total_time = $rested_time;
                }else{
                    $total_time = $total_time->add($rested_time);
                }
            }
        }
        return $total_time;
    }

    public function getTotalWorked()
    {
        
    }


    public function getTotalSession()
    {

    }
}
