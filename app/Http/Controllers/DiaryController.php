<?php

namespace App\Http\Controllers;

use App\Models\account;
use Illuminate\Http\Request;

class DiaryController extends Controller
{
    public function test () {
        return view('test');
    }

    public function getInput(Request $request) {
        $user_input = $request->input('user_input');

        $data = [
            'user_input' => $user_input, 
        ];
        return view('user_input', $data);
    }

    public function get() {
        $user = new account();
        $result = $user->getAcc();

        $data = [
            'account' => $result,
        ];
        return view('get', $data);


    }

    public function add() {
        return view('add');
    }

    public function create(Request $request) {
        $Name = $request->input('Name');

        $model = new account();
        $model->createAcc($Name);
        return redirect('/add');
    }

    public function edit($status_id) {
        $user = new account();
        $result = $user->editAcc($$status_id);
        
        $data = [
            'AccountEdit' => $result,
        ];
        return view('edit', $data);
    }

    public function update($status_id, Request $request) {
        $model = new account();
        $Name = $request->input('Name');
        $model->updateAcc($status_id, $Name);

        return redirect('/add');
    }

    public function delete($status_id) {
       $user = new account();
        $result = $user->editAcc($status_id);
        
        $data = [
            'AccountEdit' => $result,
        ];
        return view('delete', $data);
    }

    public function destroy($status_id) {
        $model = new account();
        $model->destroyAcc($status_id);
        return redirect('/users');
    }
}