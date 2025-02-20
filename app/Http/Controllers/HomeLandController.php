<?php

namespace App\Http\Controllers;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\PropertyListingType;
use App\Models\ContactAgent;
use App\Models\Rating;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendContactForm;

class HomeLandController extends Controller
{
    public function index(){
        $properties = Property::all(); //Acceder a la tabla de la base de datos

        return view('homeland.index',compact('properties')); //compact es una función de PHP que crea un array a partir de las variables que se le pasan
    }

    public function property_details(Request $request, $property_id)
    {
        if ($request->isMethod("POST")) {
            $request->validate([
                'contact_name' => 'required|string|max:255',
                'contact_email' => 'required|email|max:50',
                'contact_phone' => 'required|max:20|regex:/^[0-9+\-() ]+$/',
                'contact_message' => 'required|string|max:1000',
            ], [
                'contact_name.required' => 'The name field is required.',
                'contact_email.required' => 'The email field is required.',
                'contact_email.email' => 'The email must be a valid email address.',
                'contact_phone.regex' => 'The phone number format is invalid.',
                'contact_message.required' => 'The message field is required.',
            ]);

            $contact = new ContactAgent();
            $contact->name = $request->input('contact_name');
            $contact->email = $request->input('contact_email');
            $contact->phone = $request->input('contact_phone');
            $contact->message = $request->input('contact_message');
            $contact->property_id = $property_id;
            $contact->save();

            session()->now('message', 'Your message has been sent successfully');
        }

        $ratings = Rating::where('property_id',$property_id)->get(); //reseñas relacionadas
        $property = Property::find($property_id);
        return view('homeland.property_details', compact('property', 'ratings'));
    }

    public function ratings(Request $request, $property_id)
    {
        if ($request->isMethod("POST")) {
            $request->validate([
                'rating_name' => 'required|string|max:255',
                'rating_email' => 'required|email|max:50',
                'rating_stars' => 'required|integer|min:1|max:5',
                'rating_opinion' => 'nullable|string|max:500',
            ], [
                'rating_name.required' => 'The name field is required.',
                'rating_email.required' => 'The email field is required.',
                'rating_email.email' => 'The email must be a valid email address.',
                'rating_stars.min' => 'The rating must be at least 1 star.',
                'rating_stars.max' => 'The rating must be no more than 5 stars.',
                'rating_opinion.required' => 'The opinion field is required.',
            ]);

            $rating = new Rating();
            $rating->name = $request->input('rating_name');
            $rating->email = $request->input('rating_email');
            $rating->opinion = $request->input('rating_opinion');
            $rating->rating = $request->input('rating_stars');
            $rating->property_id = $property_id;
            $rating->save();

            session()->now('message', 'Your review has been submitted successfully');
            $ratings = Rating::where('property_id',$property_id)->get(); //reseñas relacionadas
            $property = Property::find($property_id);
            return view('homeland.property_details', compact('property', 'ratings'));
        }

        $ratings = Rating::where('property_id',$property_id)->get(); //reseñas relacionadas
        $property = Property::find($property_id);
        return view('homeland.property_details', compact('property', 'ratings'));
    }

    public function contact_submit(Request $request){

        if ($request->isMethod("POST")){
            echo "Contact Submitdsdfsfsdsd";
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|string|max:1000',
            ],[
                'name.required' => 'The name field is required.',
                'email.required' => 'The email field is required.',
                'email.email' => 'The email must be a valid email address.',
                'subject.required' => 'The subject field is required.',
                'message.required' => 'The message field is required.',
            ]);

            //guardar datos
            $contact = new Contact();
            $contact->name = $request->input('name');
            $contact->email = $request->input('email');
            $contact->subject = $request->input('subject');
            $contact->message = $request->input('message');
            $contact->save();

            //Enviar correo al administrador
            Mail::to('lalo212003@gmail.com')->send(new SendContactForm($contact));


            session()->flash('message', 'Your message has been submitted successfully.');
            return view('homeland.contact');
        }
        return view('homeland.contact');
    }
    public function about(){
        return view('homeland.about');
    }
    public function buy(){
        $properties = Property::where("offer_type","For Sale")->get();
        return view('homeland.buy',compact('properties'));
    }
    public function rent(){
        $properties = Property::where("offer_type","For Rent")->get();
        return view('homeland.rent',compact('properties'));
    }
    public function properties_listing_type($property_listing_type_id){
        //$properties = property::where("property_listing_types_id",$listing_type_id);
        $properties = PropertyListingType::find($property_listing_type_id)->properties;
        return view('homeland.index',compact('properties'));
    }
    public function login(){
        return view('homeland.login');
    }
    public function register(){
        return view('homeland.register');
    }
}
