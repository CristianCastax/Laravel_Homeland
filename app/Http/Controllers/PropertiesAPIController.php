<?php

namespace App\Http\Controllers;
use App\Models\Property;
use App\Models\ContactAgent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PropertiesAPIController extends Controller
{
    public function properties (){
        //return response()->json(property::all());
        $properties = Property::with('city')->with('listType')->get(); //debe coincidir con el modelo
        return response()->json($properties);
    }

    public function properties_datatables (){
        $properties = Property::with('city')->with('listType')->get(); //debe coincidir con el modelo
        return response()->json(["data"=>$properties]);
    }

    public function saveContact(Request $request){
        $validator = Validator::make($request->all(), [
            'name'    => 'required|max:50',
            'email'   => 'required|email|max:50',
            'phone'   => 'required|max:20|regex:/^[0-9+\-() ]+$/',
            'message' => 'required|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages()->toArray(), 400);
        }

        $contact = new ContactAgent();
        if ($request->isMethod('post')){
            $contact->name = $request->input('name');
            $contact->email = $request->input('email');
            $contact->phone = $request->input('phone');
            $contact->message = $request->input('message');
            $contact->property_id = $request->input('property_id');
            $contact->save();
        }
        return response()->json(["message" => "Contacto guardado exitosamente"]);
    }
}
