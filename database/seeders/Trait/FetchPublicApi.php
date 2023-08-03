<?php

namespace Database\Seeders\Trait;

use App\Models\City;
use GuzzleHttp\Client;
use App\Models\Village;
use App\Models\District;
use Illuminate\Support\Facades\Http;

trait FetchPublicApi
{
    protected $url = 'https://dev.farizdotid.com/api/daerahindonesia/';
    protected $client;
    // protected $cityId = 1206;
    protected $provinceId = 18;

    public function __construct()
    {
        $this->client = new Client(
            [
                'base_url'  =>  $this->url,
            ]
        );
    }

    public function fetch($target, $id)
    {
        if ($target == 'dsitrict') {
        }
    }

    public function prepareQuery(array $queries)
    {
        $query = '?';
        foreach ($queries as $key => $value) {
            $query .= $key . '=' . $value . '&';
        }
        return $query;
    }

    public function fetchCity($provinceId = null)
    {
        if ($provinceId == null) {
            $provinceId = $this->provinceId;
        }
        $query = $this->prepareQuery(
            [
                'id_provinsi'   =>  $provinceId,
            ],
        );
        $request = $this->client->request('GET', $this->url . 'kota' . $query);

        $response = $request ? $request->getBody()->getContents() : null;
        $status = $request ? $request->getStatusCode() : 500;

        if ($response && $status === 200 && $response !== 'null') {
            $json = json_decode($response, true);
            foreach ($json['kota_kabupaten'] as $city) {
                $newCity = City::create(
                    [
                        'name'  =>  $city['nama']
                    ]
                );
                $this->fetchDistrict($city['id'], $this->provinceId, $newCity->id);
            }
        }
    }

    public function fetchDistrict($cityId = null, $provinceId = null, $appendTo = null): void
    {
        if ($provinceId == null) {
            $provinceId = $this->provinceId;
        }

        $query = $this->prepareQuery(
            [
                'id_kota'       =>  $cityId,
                'id_provinsi'   =>  $provinceId,
            ]
        );

        $request = $this->client->request('GET', $this->url . 'kecamatan' . $query);

        $response = $request ? $request->getBody()->getContents() : null;
        $status = $request ? $request->getStatusCode() : 500;

        if ($response && $status === 200 && $response !== 'null') {
            $json = json_decode($response, true);
            foreach ($json['kecamatan'] as $district) {
                $newDistrict = District::create(
                    [
                        'name'  =>  $district['nama'],
                        'city_id'   =>  $appendTo,
                    ]
                );
                $this->fetchVillage($district['id'], $cityId, $provinceId, $newDistrict->id);
            }
        }
    }

    public function fetchVillage($districtId, $cityId = null, $provinceId = null, $appendTo = null): void
    {
        if ($provinceId == null) {
            $provinceId = $this->provinceId;
        }

        $query = $this->prepareQuery(
            [
                'id_kecamatan'  =>  $districtId
            ]
        );

        $request = $this->client->request('GET', $this->url . 'kelurahan' . $query);

        $response = $request ? $request->getBody()->getContents() : null;
        $status = $request ? $request->getStatusCode() : 500;

        if ($response && $status === 200 && $response !== 'null') {
            $json = json_decode($response, true);
            foreach ($json['kelurahan'] as $village) {
                Village::create(
                    [
                        'name'  =>  $village['nama'],
                        'district_id'   =>  $appendTo,
                    ],
                );
            }
        }
    }
}
