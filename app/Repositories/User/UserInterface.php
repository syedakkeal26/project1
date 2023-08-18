<?php

namespace App\Repositories\User;
use Illuminate\Support\Facades\Request;


interface UserInterface {

    public function loginpost(Request $request);
    public function registerpost(Request $request);
    public function index();

    public function store(Request $request);

   public function edit(string $id);


   public function update(Request $request, string $id);


   public function destroy(string $id);
}
