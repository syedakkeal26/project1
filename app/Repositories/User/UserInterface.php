<?php

namespace App\Repositories\User;
use Illuminate\Http\Request;


interface UserInterface {

    public function loginpost(Request $request);
    public function registerpost(Request $request);

    public function store(Request $request);

   public function update(Request $request, string $id);


   public function destroy(string $id);
}
