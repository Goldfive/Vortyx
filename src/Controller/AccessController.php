<?php
// src/Controller/AccessController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AccessController
{
    /** 
    * @Route("/access/random", name="access") 
    */
    public function number()
    {
        $number = random_int(5,70065);
        
        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}

?>