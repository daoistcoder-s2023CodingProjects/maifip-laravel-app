<?php

namespace App\Helpers;

class SmsHelper
{
    // Set your Semaphore API key and sender name here
    protected static $apiKey = 'e2e320c4abd1a6f1455742b840765b09';
    protected static $senderName = '';

    /**
     * Send SMS using Semaphore API.
     * @param string $contact_number
     * @param string $message
     * @return array ['success' => bool, 'status' => string, 'response' => array, 'error' => string|null]
     */
    public static function send($contact_number, $message)
    {
        $parameters = [
            'apikey' => self::$apiKey,
            'number' => $contact_number,
            'message' => $message,
            'sendername' => self::$senderName,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/priority');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $output = curl_exec($ch);
        $curlError = curl_error($ch);
        curl_close($ch);

        if ($curlError) {
            \Log::error('SMS sending failed (cURL error)', [
                'contact_number' => $contact_number,
                'message' => $message,
                'error' => $curlError,
            ]);
            return [
                'success' => false,
                'status' => 'curl_error',
                'response' => [],
                'error' => $curlError,
            ];
        }

        $response = json_decode($output, true);

        // Semaphore returns an array of message objects on success, or an error object
        if (is_array($response) && isset($response[0]['status'])) {
            $success = in_array($response[0]['status'], ['Queued', 'Pending', 'Sent']);
            if ($success) {
                \Log::info('SMS sent successfully', [
                    'contact_number' => $contact_number,
                    'message' => $message,
                    'response' => $response[0],
                ]);
            } else {
                \Log::error('SMS sending failed (API status)', [
                    'contact_number' => $contact_number,
                    'message' => $message,
                    'response' => $response[0],
                ]);
            }
            return [
                'success' => $success,
                'status' => $response[0]['status'],
                'response' => $response[0],
                'error' => null,
            ];
        } elseif (is_array($response) && isset($response['error'])) {
            \Log::debug('SMS sending failed (API error)', [
                'contact_number' => $contact_number,
                'message' => $message,
                'response' => $response,
            ]);
            return [
                'success' => false,
                'status' => 'api_error',
                'response' => $response,
                'error' => $response['error'],
            ];
        } else {
            \Log::debug('SMS sending failed (Unknown response)', [
                'contact_number' => $contact_number,
                'message' => $message,
                'output' => $output,
            ]);
            return [
                'success' => false,
                'status' => 'unknown',
                'response' => $output,
                'error' => 'Unknown response format',
            ];
        }
    }
}
