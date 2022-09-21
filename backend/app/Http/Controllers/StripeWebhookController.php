<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeWebhookController extends Controller
{
    public function webhookHandler(Request $request)
    {

        // Stripe Webhook Secret
        $endpoint_secret = config('stripe.webhook');

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload,
                $sig_header,
                $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            http_response_code(400);
            exit();
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            http_response_code(400);
            exit();
        }


        // The "actual handler"
        switch ($event->type) {
            case 'checkout.session.completed':
                //
                break;

            case 'checkout.session.expired':
                //
                break;

            case 'charge.failed':
                //
                break;

            case 'charge.refunded':
                //
                break;

            case 'customer.created':
                //
                break;

            case 'charge.dispute.created':
                //
                break;

            default:
                break;
        }


        http_response_code(200);
    }
}
