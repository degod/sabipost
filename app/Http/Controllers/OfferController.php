<?php

namespace App\Http\Controllers;

use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    use UploadTrait;

    private $template;

    public function __construct() {
        $this->template = "frontend";
    }

    public function makeOffer(Request $request) {
        $data = $request->only('description','amount','file');
        //validate
        $validator = Validator::make($data,[
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'file' => 'nullable|image',
            'type' => 'string|required'
        ]);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json($validator->errors()->toArray(),422);
            }else{
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }

        $file = null; 
        if($request->has('file')) {
            //store file
            $filename = 'offer-'.time();
            $folder = '/uploads/offers/';
            $this->uploadOne($request->file('file'),$folder,$filename);
            $file = $filename.".".$request->file('file')->guessExtension();
        }

        //create offer
        $offer = Offer::create([
            'sabi_man_id' => \Auth::user()->id,
            'description' => $data['description'],
            'initial_amount' => (float) $data['amount'],
            'status' => 'initiated',
            'file_path' => $file,
            'type' => $data['type']
        ]);

        if(!empty($offer)) {
            if($request->ajax()) {
                return response()->json(["link" => "offer/".$offer->id],200);
            }else{
                return redirect("offer/".$offer->id);
            }
        }else{
            if($request->ajax()) {
                return response()->json(["error" => "Error!"],500);
            }else{
                return redirect()->back()->withErrors("Error!")->withInput();
            }
        }
    }

    public function makeOfferRequest(Request $request,$offer) {
        //get offer
        $offer = Offer::where([
            ['id',$offer],
            ['type','non-negotiable']
        ])->whereIn('status',['initiated'])->first();
        if(empty($offer)) {
            if($request->ajax()) {
                return response()->json(["data" => "Offer is no longer available."],422);
            }else{
                return redirect()->back()->withErrors('Offer is no longer available');
            } 
        }
        //create offer request
        $offerRequest = OfferRequest::create([
            'offer_id' => $offer->id,
            'sabi_hunter_id' => \Auth::user()->id,
            'status' => 'initiated',
            'sabi_hunter_status' => 'accepted',
            'sabi_man_status' => 'pending'
        ]);

        if($offerRequest) {
            if($request->ajax()) {
                return response()->json(["data" => "Your application was successful."],422);
            }else{
                session()->flash('status', 'Your application was successful.');
                return redirect()->back();
            } 
        }else{
            if($request->ajax()) {
                return response()->json(["error" => "Error!"],500);
            }else{
                return redirect()->back()->withErrors("Error!")->withInput();
            }
        }
    }

    public function makeOfferBid(Request $request,$offer) {
        //get offer
        $offer = Offer::where([
            ['id',$offer],
            ['type','negotiable']
        ])->whereIn('status',['initiated'])->first();
        if(empty($offer)) {
            if($request->ajax()) {
                return response()->json(["data" => "Offer is no longer available."],422);
            }else{
                return redirect()->back()->withErrors('Offer is no longer available');
            } 
        }

        //get data
        $data = $request->only('amount');
        $validator = Validator::make($data,[
            'amount' => 'nullable|numeric',
        ]);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json($validator->errors()->toArray(),422);
            }else{
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }

        //create offer bid
        $offerBid = OfferBid::create([
            'offer_id' => $offer->id,
            'sabi_hunter_id' => \Auth::user()->id,
            'status' => 'initiated',
            'sabi_hunter_status' => 'pending',
            'sabi_man_status' => 'pending',
            'bid_amount' => !empty((float) $data['amount']) ? (float) $data['amount'] : $offer->initial_amount
        ]);

        if($offerBid) {
            if($request->ajax()) {
                return response()->json(["data" => "Your bid has been placed."],422);
            }else{
                session()->flash('status', 'Your bid has been placed.');
                return redirect()->back();
            } 
        }else{
            if($request->ajax()) {
                return response()->json(["error" => "Error!"],500);
            }else{
                return redirect()->back()->withErrors("Error!")->withInput();
            }
        }
    }

    public function sabimanBidReoffer(Request $request,$bid) {
        $offerbid = OfferBid::where('id',$bid)->whereIn('status',['initiated','pending'])->first();
        if(empty($offerbid)) {
            if($request->ajax()) {
                return response()->json(["data" => "Offer bid is no longer available."],422);
            }else{
                return redirect()->back()->withErrors('Offer bid is no longer available');
            } 
        }

        //get data
        $data = $request->only('amount');
        $validator = Validator::make($data,[
            'amount' => 'required|numeric',
        ]);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json($validator->errors()->toArray(),422);
            }else{
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }

        $offerbid->update([
            'reoffer_amount' => (float) $data['amount'],
            'status' => 'pending'
        ]);

        if($request->ajax()) {
            return response()->json(["data" => "Your re-offer was successful."],422);
        }else{
            session()->flash('status', 'Your re-offer was successful.');
            return redirect()->back();
        } 
    }

    public function sabihunterRenegotiate(Request $request, $prevBid) {
        $offerbid = OfferBid::where('id',$prevBid)->whereIn('status',['pending'])->first();
        if(empty($offerbid)) {
            if($request->ajax()) {
                return response()->json(["data" => "Offer bid is no longer available."],422);
            }else{
                return redirect()->back()->withErrors('Offer bid is no longer available');
            } 
        }

        //get data
        $data = $request->only('amount');
        $validator = Validator::make($data,[
            'amount' => 'required|numeric',
        ]);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json($validator->errors()->toArray(),422);
            }else{
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }

        //create offer bid
        $offerBid = OfferBid::create([
            'offer_id' => $offerbid->offer_id,
            'sabi_hunter_id' => \Auth::user()->id,
            'status' => 'pending',
            'sabi_hunter_status' => 'pending',
            'sabi_man_status' => 'pending',
            'bid_amount' => (float) $data['amount']
        ]);

        if($offerBid) {
            if($request->ajax()) {
                return response()->json(["data" => "Re-negotiation was successful."],422);
            }else{
                session()->flash('status', 'Re-negotiation was successful.');
                return redirect()->back();
            } 
        }else{
            if($request->ajax()) {
                return response()->json(["error" => "Error!"],500);
            }else{
                return redirect()->back()->withErrors("Error!")->withInput();
            }
        }
    }

    public function sabimanOfferRequestAgreement(Request $request,$offerRequest) {
        //get offer request
        $offerRequest = OfferRequest::where('id',$offerRequest)->whereIn('status',['initiated'])->first();
        if(empty($offerRequest)) {
            if($request->ajax()) {
                return response()->json(["error" => "Offer request is no longer available."],422);
            }else{
                return redirect()->back()->withErrors('Offer request is no longer available');
            } 
        }
        //get offer
        $offer = Offer::where([
            ['id',$offerRequest->offer_id],
            ['type','non-negotiable']
        ])->whereIn('status',['initiated'])->first();
        if(empty($offer)) {
            if($request->ajax()) {
                return response()->json(["error" => "Offer is no longer available."],422);
            }else{
                return redirect()->back()->withErrors('Offer is no longer available');
            } 
        }

        //check if sabiman has money in his wallet
        $sabimanWalletBalance = Wallet::where('user_id',$offer->sabi_man_id)->sum('amount');
        if(((float) $sabimanWalletBalance - (float) $offer->initial_amount) < (float) 0) {
            if($request->ajax()) {
                return response()->json(["error" => "low wallet balance."],422);
            }else{
                return redirect()->back()->withErrors('low wallet balance');
            } 
        }

        $offerRequest->update([
            'sabi_man_status' => 'accepted',
            'status' => 'accepted'
        ]);

        $offer->update([
            'status' => 'ongoing',
            'sabi_hunter_id' => $offerRequest->sabi_hunter_id,
            'sabi_man_status' => 'pending',
            'sabi_hunter_status' => 'pending'
        ]);

        OfferRequest::where([
            ['offer_id',$offer_id],
            ['status','initiated']
        ])->update(['status' => 'unsuccessful']);

        DB::transaction(function() {
            //create transaction
            $transaction = Transaction::create([
                'transactionId' => 'trans-'.rand(100000000,9999999999).'etl'.rand(11111,99999),
                'sabi_man_id' => $offer->sabi_man_id,
                'sabi_hunter_id' => $offer->sabi_hunter_id,
                'offer_description' => $offer->description,
                'offer_id' => $offer->id,
                'status' => 'initiated'
            ]);

            //deduct from sabi man's wallet
            $sabimanWallet = Wallet::create([
                'user_id' => $offer->sabi_man_id,
                'type' => 'debit',
                'transaction_id' => $transaction->id,
                'amount' => -(float) $offer->initial_amount
            ]);

            //add to sabi man's temp_wallet
            $sabimanTempWallet = TempWallet::create([
                'user_id' => $offer->sabi_man_id,
                'type' => 'credit',
                'transaction_id' => $transaction->id,
                'amount' => (float) $offer->initial_amount
            ]);

            //add to sabi hunter's temp_wallet
            $sabihunterTempWallet = TempWallet::create([
                'user_id' => $offer->sabi_hunter_id,
                'type' => 'credit',
                'transaction_id' => $transaction->id,
                'amount' => (float) $offer->initial_amount
            ]);
        });

        if($request->ajax()) {
            return response()->json(["data" => "Deal Struck."],200);
        }else{
            session()->flash('status', 'Deal Struck.');
            return redirect()->back();
        } 
    }

    public function sabihunterBidOfferAgreement(Request $request,$bid) {
        //get offer bid
        $offerBid = OfferBid::where('id',$bid)->whereIn('status',['initiated','pending'])->orderBy('created_at','desc')->first();
        if(empty($offerBid)) {
            if($request->ajax()) {
                return response()->json(["error" => "Offer bid is no longer available."],422);
            }else{
                return redirect()->back()->withErrors('Offer bid is no longer available');
            } 
        }
        //get offer
        $offer = Offer::where([
            ['id',$offerBid->offer_id],
            ['type','negotiable']
        ])->whereIn('status',['initiated'])->first();
        if(empty($offer)) {
            if($request->ajax()) {
                return response()->json(["error" => "Offer is no longer available."],422);
            }else{
                return redirect()->back()->withErrors('Offer is no longer available');
            } 
        }

        
        $offerBid->update(['sabi_hunter_status'=>'accepted']);
        if($request->ajax()) {
            return response()->json(["data" => "Deal accepted by you."],200);
        }else{
            session()->flash('status', 'Deal accepted by you.');
            return redirect()->back();
        } 
    }

    public function sabimanBidOfferAgreement(Request $request,$bid) {
        //get offer bid
        $offerBid = OfferBid::where('id',$bid)->whereIn('status',['initiated','pending'])->orderBy('created_at','desc')->first();
        if(empty($offerBid)) {
            if($request->ajax()) {
                return response()->json(["error" => "Offer bid is no longer available."],422);
            }else{
                return redirect()->back()->withErrors('Offer bid is no longer available');
            } 
        }
        //get offer
        $offer = Offer::where([
            ['id',$offerBid->offer_id],
            ['type','negotiable']
        ])->whereIn('status',['initiated'])->first();
        if(empty($offer)) {
            if($request->ajax()) {
                return response()->json(["error" => "Offer is no longer available."],422);
            }else{
                return redirect()->back()->withErrors('Offer is no longer available');
            } 
        }

        if($offerBid->sabi_hunter_status != "accepted") {
            if($request->ajax()) {
                return response()->json(["error" => "Offer has not being accepted by hunter."],422);
            }else{
                return redirect()->back()->withErrors('Offer has not being accepted by hunter');
            } 
        }

        $offer->update(['counter_amount' => (float) $offerBid->bid_amount]);

        //check if sabiman has money in his wallet
        $sabimanWalletBalance = Wallet::where('user_id',$offer->sabi_man_id)->sum('amount');
        if(((float) $sabimanWalletBalance - (float) $offerBid->bid_amount) < (float) 0) {
            if($request->ajax()) {
                return response()->json(["error" => "low wallet balance."],422);
            }else{
                return redirect()->back()->withErrors('low wallet balance');
            } 
        }

        $offerBid->update([
            'sabi_man_status' => 'accepted',
            'status' => 'accepted'
        ]);

        $offer->update([
            'status' => 'ongoing',
            'sabi_hunter_id' => $offerBid->sabi_hunter_id,
            'sabi_man_status' => 'pending',
            'sabi_hunter_status' => 'pending'
        ]);

        OfferBid::where('offer_id',$offer_id)->whereIn('status',['initiated','pending'])->update(['status' => 'unsuccessful']);

        DB::transaction(function() {
            //create transaction
            $transaction = Transaction::create([
                'transactionId' => 'trans-'.rand(100000000,9999999999).'etl'.rand(11111,99999),
                'sabi_man_id' => $offer->sabi_man_id,
                'sabi_hunter_id' => $offer->sabi_hunter_id,
                'offer_description' => $offer->description,
                'offer_id' => $offer->id,
                'status' => 'initiated'
            ]);

            //deduct from sabi man's wallet
            $sabimanWallet = Wallet::create([
                'user_id' => $offer->sabi_man_id,
                'type' => 'debit',
                'transaction_id' => $transaction->id,
                'amount' => -(float) $offer->counter_amount
            ]);

            //add to sabi man's temp_wallet
            $sabimanTempWallet = TempWallet::create([
                'user_id' => $offer->sabi_man_id,
                'type' => 'credit',
                'transaction_id' => $transaction->id,
                'amount' => (float) $offer->counter_amount
            ]);

            //add to sabi hunter's temp_wallet
            $sabihunterTempWallet = TempWallet::create([
                'user_id' => $offer->sabi_hunter_id,
                'type' => 'credit',
                'transaction_id' => $transaction->id,
                'amount' => (float) $offer->counter_amount
            ]);
        });

        if($request->ajax()) {
            return response()->json(["data" => "Deal Struck."],200);
        }else{
            session()->flash('status', 'Deal Struck.');
            return redirect()->back();
        } 
    }

    public function sabihunterConfirmation(Request $request,$id) {
        $offer = Offer::where([
            ['id',$id]
        ])->whereIn('status',['ongoing'])->first();
        if(empty($offer)) {
            if($request->ajax()) {
                return response()->json(["error" => "Offer is no longer available."],422);
            }else{
                return redirect()->back()->withErrors('Offer is no longer available');
            } 
        }

        $offer->update([
            'sabi_hunter_status' => 'delivered'
        ]);

        if($request->ajax()) {
            return response()->json(["data" => "Deal done!."],200);
        }else{
            session()->flash('status', 'Deal done!.');
            return redirect()->back();
        } 
    }

    public function sabimanConfirmation(Request $request,$id) {
        $offer = Offer::where([
            ['id',$id]
        ])->whereIn('status',['ongoing'])->first();
        if(empty($offer)) {
            if($request->ajax()) {
                return response()->json(["error" => "Offer is no longer available."],422);
            }else{
                return redirect()->back()->withErrors('Offer is no longer available');
            } 
        }

        if($offer->sabi_hunter_status  != 'delivered') {
            if($request->ajax()) {
                return response()->json(["error" => "Offer hunter has not confirmed delivery."],422);
            }else{
                return redirect()->back()->withErrors('Offer hunter has not confirmed delivery');
            } 
        }

        $offer->update([
            'sabi_man_status' => 'delivered',
            'status' => 'delivered'
        ]);

        $transaction = Transaction::where([
            ['offer_id',$offer->id],
            ['status','initiated']
        ])->orderBy('created_at','desc')->first();

        if(empty($transaction)) {
            if($request->ajax()) {
                return response()->json(["data" => "Offer delivered."],200);
            }else{
                return redirect()->back()->withErrors('Offer delivered');
            } 
        }

        //deduct from sabi man's wallet
        $sabimanWallet = Wallet::create([
            'user_id' => $offer->sabi_hunter_id,
            'type' => 'credit',
            'transaction_id' => $transaction->id,
            'amount' => $offer->type == "non-negotiable" ? (float) $offer->initial_amount : (float) $offer->counter_amount
        ]);

        //add to sabi man's temp_wallet
        $sabimanTempWallet = TempWallet::create([
            'user_id' => $offer->sabi_man_id,
            'type' => 'debit',
            'transaction_id' => $transaction->id,
            'amount' => $offer->type == "non-negotiable" ? -(float) $offer->initial_amount : -(float) $offer->counter_amount
        ]);

        //add to sabi hunter's temp_wallet
        $sabihunterTempWallet = TempWallet::create([
            'user_id' => $offer->sabi_hunter_id,
            'type' => 'debit',
            'transaction_id' => $transaction->id,
            'amount' => $offer->type == "non-negotiable" ? -(float) $offer->initial_amount : -(float) $offer->counter_amount
        ]);

        $transaction->update(['status','delivered']);

        if($request->ajax()) {
            return response()->json(["data" => "Deal done!."],200);
        }else{
            session()->flash('status', 'Deal done!.');
            return redirect()->back();
        } 
    }
}
