<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WhatsAppController extends Controller
{
    public function sendMessage(Request $request)
    {
        $message = $request->input('message', 'Hello! How can I assist you today?');

        // Twilio API credentials (from .env)
        $twilio_sid = env('TWILIO_SID');
        $twilio_token = env('TWILIO_AUTH_TOKEN');
        $twilio_from = env('TWILIO_WHATSAPP_FROM'); // e.g. whatsapp:+14155238886
        $to = 'whatsapp:+9779824708181'; // Your WhatsApp number

        $response = Http::withBasicAuth($twilio_sid, $twilio_token)
            ->post("https://api.twilio.com/2010-04-01/Accounts/$twilio_sid/Messages.json", [
                'From' => $twilio_from,
                'To' => $to,
                'Body' => $message,
            ]);

        if ($response->successful()) {
            return response()->json(['status' => 'Message sent successfully']);
        } else {
            return response()->json(['status' => 'Failed to send message'], 500);
        }
    }
}
