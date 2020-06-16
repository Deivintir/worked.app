<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worked extends Model
{
        //Estado actual (string)->
        public function status(worked $worked) 
        {
            $worked = Worked::all()->orderByDesc('created_at')->first()->get();
    
        }
        //Hora de inicio (date)->max horas mins
        public function worked_ini(worked $worked)
        {
            $worked = Worked::where('status', 'start')->orderByDesc('created_at')->first()->get();
        }
        //Total tiempo descanso (time)->max horas mins
        public function total_rest()
        {
            $worked = Worked::where('status', 'pause')->today()->get();
        }

        //Hora fin (date)->max horas mins
    
        //Tiempo total trabajo (time) mas horas mins
    
}
