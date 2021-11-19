<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{
    // post
    public function create( Request $request ) {
        $data = $request->validate([
            'name' => 'required|min:4|string',
            'age' => 'required'
        ]);

        $userId = Auth::user();

        $person = ['name' => $data['name'], 'age' => $data['age'], 'fk_user_id' => $userId->id];

        Person::create($person);

        return redirect()->back();
    }
    
    // PUT
    // --get
    public function changeView( int $id ) {
        $person = Person::all()->where('id', $id)->first();
        return view('Dashboard.change-person', ['person' => $person]);
    }

    // editing the person
    public function changePerson( Request $request, int $id ) {
        $person = $request->validate([
            'name' => 'required|min:4|string',
            'age' => 'required'
        ]);

        return $person;
        // Person::where('id', $id)->update($person);

        // return redirect()->route('dashboard');
    }


    // DELETE
    public function delete( int $id ) {
        Person::where('id', $id)->delete();
        return redirect()->back();
    }
}
