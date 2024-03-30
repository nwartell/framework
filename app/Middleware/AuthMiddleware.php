<?php

namespace App\Middleware;

class AuthMiddleware {
    // Require login to view page 
    public function handle() {
        if (!$_SESSION['AUTH_STATE'] === true) {
            header('Location: signin');
        } else {
            return;
        }
    }
}

?>