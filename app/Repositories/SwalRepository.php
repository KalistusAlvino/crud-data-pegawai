<?php

namespace App\Repositories;

use SweetAlert2\Laravel\Swal;

class SwalRepository implements SwalInterface
{
    public static function fire($title, $icon)
    {
        Swal::fire([
            'title' => $title,
            'icon' => $icon,
            'toast' => true,
            'position' => 'top-end',
            'timer' => 3000,
            'showConfirmButton' => false,
        ]);
    }
}
