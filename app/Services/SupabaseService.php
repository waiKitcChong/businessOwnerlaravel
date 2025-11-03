<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SupabaseService
{
    protected $baseUrl;
    protected $headers;

    public function __construct()
    {
        $this->baseUrl = rtrim(env('SUPABASE_URL'), '/') . '/rest/v1/';
        $this->headers = [
            'apikey' => env('SUPABASE_KEY'),
            'Authorization' => 'Bearer ' . env('SUPABASE_KEY'),
            'Content-Type' => 'application/json',
        ];
    }

    public function get($table, $filters = [], $select = '*', $limit = null, $offset = null, $orderBy = null, $desc = false)
    {
        $url = $this->baseUrl . $table;
        $query = ['select' => $select];

        foreach ($filters as $key => $value) {
            $query[$key] = $value;
        }

        if ($limit !== null) {
            $query['limit'] = $limit;
        }
        if ($offset !== null) {
            $query['offset'] = $offset;
        }

        if ($orderBy) {
            $query['order'] = $orderBy . ($desc ? '.desc' : '.asc');
        }

        $response = Http::withHeaders(array_merge($this->headers, [
            'Accept' => 'application/json'
        ]))->get($url, $query);

        $body = $response->body();
        $json = json_decode($body, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('Invalid JSON from Supabase: ' . $body);
        }

        return $json;
    }


    public function insert($table, $data)
    {
        $url = $this->baseUrl . $table;
        $response = Http::withHeaders($this->headers)->post($url, $data);
        return $response->json();
    }

    public function update($table, $filters, $data)
    {
        $url = $this->baseUrl . $table;

        $query = [];
        foreach ($filters as $key => $value) {
            $query[$key] = 'eq.' . $value;
        }

        $response = Http::withHeaders($this->headers)
            ->withOptions(['query' => $query])
            ->patch($url, $data);

        return $response->json();
    }
    public function delete($table, $filters)
    {
        $url = $this->baseUrl . $table;
        $query = [];

        foreach ($filters as $key => $value) {
            $query[$key] = 'eq.' . $value;
        }

        $response = Http::withHeaders($this->headers)->delete($url, $query);
        return $response->json();
    }
}
