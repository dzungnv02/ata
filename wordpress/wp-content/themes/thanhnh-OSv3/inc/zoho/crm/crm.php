<?php

namespace Zoho;

require __DIR__.'/vendor/autoload.php';

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client as GuzzleHttpClient;

class CRM
{
    const ACCOUNT_ENDPOINT_BASE_URL = 'https://accounts.zoho.com';
    const CRM_API_ENDPOINT_BASE_URL = 'https://www.zohoapis.com';

    // Modules
    const MODULE_CONTACTS = 'contacts';
    const MODULE_LEADS = 'leads';

    /**
     * @var \GuzzleHttp\Client
     */
    protected $account_client;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $crm_api_client;

    /**
     * CRM constructor.
     */
    public function __construct()
    {
        $this->connect();
    }

    /**
     * pre setup guzzle http client
     */
    private function connect()
    {
        $this->account_client = new GuzzleHttpClient([
            'base_uri' => self::ACCOUNT_ENDPOINT_BASE_URL,
            'timeout'  => 2.0,
        ]);
  
        $this->crm_api_client = new GuzzleHttpClient([
            'base_uri' => self::CRM_API_ENDPOINT_BASE_URL,
            'timeout'  => 2.0,
        ]);
    }

    /**
     * get access token before every requests
     * @return bool|string
     */
    public function getAccessToken()
    {
        $options = [
            'http_errors' => true,
            'query' => [
                'refresh_token' => ZOHO_APP_REFRESH_CODE,
                'client_id' => ZOHO_APP_CLIENT_ID,
                'client_secret' => ZOHO_APP_CLIENT_SECRET,
                'grant_type' => 'refresh_token',
            ]
        ];

        try {
            $res = $this->account_client->request('POST','/oauth/v2/token',$options);
        } catch (GuzzleException $e) {
            // do sth
            // eg: notify admin, re-call, etc
            /**
             * ...
             */
            return false;
        } catch (Exception $e) {
            return false;
        }

        if ($res && $res->getStatusCode() === 200)
            if ($data = json_decode($res->getBody()))
                return isset($data->access_token) ? $data->access_token : false;

        return false;
    }

    /**
     * insert a record to $module module
     * @param string $module
     * @param array $data
     * @return bool|array
     */
    public function insertRecord($module, array $data)
    {
        if (!$module || !$data)
            return false;

        $uri_path = "/crm/v2/$module";
        $token = $this->getAccessToken();

        if ($token) {
            $options = [
                'http_errors' => true,
                'json' => $data,
                'headers' => [
                    'Authorization' => "Zoho-oauthtoken $token"
                ]
            ];
            try {
                $res = $this->crm_api_client->request('POST', $uri_path, $options);
            } catch (GuzzleException $e) {
                // do sth
                // eg: notify admin, re-call, etc
                /**
                 * ...
                 */
                return false;
            } catch (Exception $e) {
                return false;
            }

            if ($res && $res->getStatusCode() === 201)
                if ($body = json_decode($res->getBody()))
                    return isset($body->data) ? $body->data : false;
        }

        return false;
    }

    /**
     * search record by module, field name, and value
     * @param string|array $module
     * @param string|array $field
     * @param string $value
     * @return array|bool
     */
    public function search($module, $field, $value) {
        if (!$module || !$field || !$value)
            return false;

        $uri_path = "/crm/v2/$module/search";
        $token = $this->getAccessToken();

        if ($token) {
            $options = [
                'http_errors' => true,
                'query' => [
                    $field => $value
                ],
                'headers' => [
                    'Authorization' => "Zoho-oauthtoken $token"
                ]
            ];
            try {
                $res = $this->crm_api_client->request('GET', $uri_path, $options);
            } catch (GuzzleException $e) {
                // do sth
                // eg: notify admin, re-call, etc
                /**
                 * ...
                 */
                return false;
            } catch (Exception $e) {
                return false;
            }

            if ($res && $res->getStatusCode() === 200)
                if ($body = json_decode($res->getBody()))
                    return isset($body->data) ? $body->data : false;
        }

        return false;
    }

}