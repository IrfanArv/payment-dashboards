<?php

namespace App\Http\Controllers\CMS;

use Firebase\JWT\JWT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;
use App\Models\Category;


class SyncproductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getProductData(Request $request)
    {
        $responseData = $this->fetchData();
        $data = $responseData['data'];
        return response()->json($data);
    }

    public function getCategoryData(Request $request)
    {
        $responseData = $this->fetchData();
        $data = $responseData['data'];
        $categories = array_column($data, 'category');
        $uniqueCategories = array_unique($categories);
        foreach ($uniqueCategories as $category) {
            $existingCategory = Category::where('name', $category)->first();
            if (!$existingCategory) {
                Category::create(['name' => $category]);
            }
        }
        return response()->json($uniqueCategories);
    }

    private function fetchData()
    {
        $secret = env('AYOCONNECT_SECRET');
        $key = env('AYOCONNECT_KEY');
        $ayoconnectVersion = env('AYOCONNECT_VERSION');
        $payload = [
            'partnerId' => $key
        ];
        $algorithm = 'HS256';
        $token = JWT::encode($payload, $secret, $algorithm);

        $response = Http::withHeaders([
            'KEY' => $key,
            'TOKEN' => $token,
            'VERSION' => $ayoconnectVersion
        ])->post(env('AYOCONNECT_ENDPOINT') . 'partner/products', $payload);

        $status = $response->status();
        $responseData = $response->json();
        if ($status !== 200) {
            return response()->json(['message' => 'Gagal memuat data dari ayoconnect'], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        return [
            'status' => $status,
            'data' => $responseData['data']
        ];
    }
}
