<?php

namespace Kenmush\UjumbeSMS;

use function config;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use function implode;
use function json_decode;
use function json_encode;
use Kenmush\UjumbeSMS\Models\Ujumbe;

class UjumbeSMS
{
    public $recipients = [];

    public static function to(array $recipients)
    {
        $instance = new static();
        $instance->recipients = $recipients;

        return $instance;
    }

    public function message($message)
    {
        $payload = [
                'data' => [
                        [
                                'message_bag' => [
                                        'numbers' => implode(",", $this->recipients),
                                        'message' => $message,
                                        'sender' => config('ujumbesms.sender_id'),
                                ],
                        ],
                ],
        ];

        try {
            $response = $this->request('POST', 'api/messaging', $payload);
            $ujumbe = Ujumbe::create([
                    'uuid' => Str::uuid(),
                    'response_code' => $response['status']['code'],
                    'response_type' => $response['status']['type'],
                    'response_description' => $response['status']['description'],
                    'recipients' => implode(",", $this->recipients),
                    'credits_deducted' => $response['meta']['credits_deducted'],
                    'available_credits' => $response['meta']['available_credits'],
                    'user_email' => $response['meta']['user_email'],
                    'message' => $message,
                    'message_sent_at' => $response['meta']['date_time']['date'] ?? '',
                    'meta' => json_encode($response),
            ]);


            return true;
        } catch (Exception $exception) {
            throw new Exception($exception);
        }
    }

    protected function request($method, $path, array $parameters = [])
    {
        $response = (new Client())->{$method}('https://ujumbesms.co.ke/'.ltrim($path, '/'), [
                'headers' => [
                        'X-Authorization' => config('ujumbesms.api_key'),
                        'email' => config('ujumbesms.email'),
                ],
                'json' => $parameters,
        ]);

        return json_decode((string) $response->getBody(), true);
    }
}
