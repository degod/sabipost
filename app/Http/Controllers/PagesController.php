<?php

namespace App\Http\Controllers;

use App\OfferBid;
use App\OfferRequest;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{
    use UploadTrait;

    private $template;

    public function __construct() {
        $this->template = "frontend";
    }

    public function index(Request $request) {
        $data['title'] = 'SabiPost';
        return view($this->template.".index",$data);
    }

    public function register(Request $request) {
        $data['title'] = 'Register';
        return view($this->template.".signup",$data);
    }

    public function login(Request $request) {
        $data['title'] = 'Login';
        return view($this->template.".signin",$data);
    }

    public function home(Request $request) {
        $data['title'] = 'Home';
        return view($this->template.".home",$data);
    }

    public function editProfile(Request $request) {
        //get data
        $data = $request->only('firstname','lastname');
        $validator = Validator::make($data,[
            'firstname' => 'string|nullable',
            'lastname' => 'string|nullable'
        ]);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json(["error" => $validator->errors()->toArray()],500);
            }else{
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }

        $user = User::find(Auth::user()->id);

        if(!empty($user)) {
            $user->update([
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname']
            ]);
    
            if($request->ajax()) {
                return response()->json(["data" => "Update was successful!"],200);
            }else{
                session()->flash('status', 'Update was successful!');
                return redirect()->back();
            }
        }else{
            if($request->ajax()) {
                return response()->json(["link" => "login"],302);
            }else{
                return redirect("/login");
            }
        }
    }

    public function postOffer(Request $request) {
        $data['title'] = 'Post an Offer';
        return view($this->template.".post_offer",$data);
    }
}
