<?php

namespace App\Auth\Http\Routes;

use HEGO\Support\Units\Http\Routing\Router;

class Api extends Router
{
    /**
     * Declare as rotas da API.
     */
    public function routes()
    {
        $this->registerDefaultRoutes();
        $this->registerV1Routes();
    }

    /**
     * Registra as rotas padrões da API.
     */
    protected function registerDefaultRoutes()
    {
        $this->signUpRoutes();
    }

    /**
     * Registra as rotas da versão 1.0 da API.
     */
    protected function registerV1Routes()
    {
        $this->router->group(['prefix' => 'v1'], function () {
            $this->signUpRoutes();
        });
    }

    /**
     * Rotas para cadastrar usuário.
     */
    protected function signUpRoutes()
    {
        $this->router->post('register', 'RegisterController@register');
    }
}