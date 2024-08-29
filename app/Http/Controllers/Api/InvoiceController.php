<?php

namespace App\Http\Controllers\Api;

use App\Models\invoice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\InvoiceResource;

 
class InvoiceController extends Controller
{
  
    public function index(){
        $invoice = Invoice::get();
        if($invoice){
            return InvoiceResource::collection($invoice);
        }else {
            return response()->json(['message' => "no record"], 200);
        }
    }

        public function store(Request $request){
            $validator = Validator::make($request->all(),[
                'status' => 'required|max:191',
                'invoice' => 'required|max:191',
                'customer' => 'required|max:191',
                'amount' => 'required|max:191',
                'due' => 'required|max:191',
                'issued' => 'required|max:191',
             
            ]);

            $invoice = Invoice::create([
                'status' => $request->status,
                'invoice' => $request->invoice,
                'customer' => $request->customer,
                'amount' => $request->amount,
                'due' => $request->due,
                'issued' => $request->issued,
         
            ]);

            if($validator->fails()){
                return response()->json([
                'status' => 422,
                'errors' => $validator->message()
            ], 422);
            }else{

                return response()->json([
                    'message' => 'created',
                    'data' => new InvoiceResource($invoice)
                ], 200);
                

            }
        }

        public function show(Invoice $invoice){
            return new InvoiceResource($invoice);
        }

        public function update(Request $request, Invoice $invoice){
            $validator = Validator::make($request->all(),[
                'status' => 'required|max:191',
                'invoice' => 'required|max:191',
                'customer' => 'required|max:191',
                'amount' => 'required|max:191',
                'due' => 'required|max:191',
                'issued' => 'required|max:191',
             
            ]);

            $invoice->update([
                'status' => $request->status,
                'invoice' => $request->invoice,
                'customer' => $request->customer,
                'amount' => $request->amount,
                'due' => $request->due,
                'issued' => $request->issued,
         
            ]);

            if($validator->fails()){
                return response()->json([
                'status' => 422,
                'errors' => $validator->message()
            ], 422);
            }else{

                return response()->json([
                    'message' => 'created',
                    'data' => new InvoiceResource($invoice)
                ], 200);
                

            }
        }

        public function destroy(Invoice $invoice){
            $invoice->delete();
            return response()->json([
                'message' => 'deleted',
            ], 200);
        }
    }

