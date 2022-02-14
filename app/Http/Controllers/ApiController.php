<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail; // da inserire x invio mail

use Illuminate\Http\Request;
use App\Videogame;

use App\Mail\VideogameDeleteMail; // da inserire x invio mail

class ApiController extends Controller
{
    public function getVideogames()
    {
        $videogames = Videogame::all();
        return json_encode($videogames);
    }

    public function deleteVideogame($id)
    {
        $videogame = Videogame::findOrFail($id);
        $videogame -> delete();
    
        $this -> sendDeleteMail(); //possiamo anche eliminare sendDeleteMail ed inserire Mail::to.... qui!

        return json_encode($videogame);
    }

    public function sendDeleteMail()
    {
        Mail::to('test@test.com')->send(new VideogameDeleteMail); // comando resend mail
    }
}
