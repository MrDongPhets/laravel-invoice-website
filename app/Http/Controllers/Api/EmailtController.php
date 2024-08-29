<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\InvoiceMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
class EmailtController extends Controller
{
    public function sendInvoice(Request $request)
    {
        // Validate the request
        $request->validate([
            'to' => 'required|email',
            'subject' => 'required|string',
            'text' => 'required|string',
            'customer' => 'required|string',
            'amount' => 'required|numeric',
            'due' => 'required|date',
            'issued' => 'required|date',
        ]);
    
        try {
            // Send the email
            Mail::raw($request->input('text'), function ($message) use ($request) {
                $message->to($request->input('to'))
                        ->subject($request->input('subject'));
            });
    
            return response()->json(['message' => 'Invoice sent successfully!'], 200);
        } catch (\Exception $e) {
            Log::error('Error sending invoice: ' . $e->getMessage());
            return response()->json(['message' => 'Error sending invoice.'], 500);
        }
    }
    
}
