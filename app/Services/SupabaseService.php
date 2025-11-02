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

    public function get($table, $filters = [], $select = '*')
    {
        $url = $this->baseUrl . $table;
        $query = ['select' => $select];

        foreach ($filters as $key => $value) {
            $query[$key] = $value;
        }

        $response = Http::withHeaders(array_merge($this->headers, [
            'Accept' => 'application/json'  // ✅ 強制 Supabase 回傳 JSON
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

        $response = Http::withHeaders($this->headers)->patch($url, $data, $query);
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
