<?php
/**
 * Created by PhpStorm.
 * User: eli
 * Date: 17/11/14
 * Time: 10:20 PM
 */

class PrivateController extends BaseController {

    public function showMain(){

        return View::make('privatecontroller.main');

    }

    public function salir(){

        Auth::user()->logout();
        return Redirect::to('login');

    }

} 