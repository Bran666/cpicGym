<?php

namespace App\Controller;

class BaseController
{
    protected string $layout = "";
    public function render($view, $data = null)
    {

        // $data = [
        //     "nombre" => "Ana",
        //     "cedula" => "1234",
        //     "telefono" => "3115642"
        // ];

        if ($data != null && is_array($data)) {

            foreach ($data as $key => $value) {
                // echo "<br>key>".$key;
                // echo "<br>Value>".$key;

                $$key = $value;
            }
        }

        $content =  MAIN_APP_ROUTE . "../views/$view";
        $layout = MAIN_APP_ROUTE . "../views/layouts/{$this->layout}.php";
        include_once $layout;
    }
    public function formatCurrency($amount)
    {
        return "$" . number_format($amount, 2);
    }
    public function redirectTo($url)
    {
        header("Location: " . $url);
        exit;
    }
}
;
