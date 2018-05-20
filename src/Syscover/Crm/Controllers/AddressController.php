<?php namespace Syscover\Crm\Controllers;

use Illuminate\Http\Request;
use Syscover\Core\Controllers\CoreController;
use Syscover\Crm\Models\CustomerGroup;
use Syscover\Crm\Services\AddressService;

class AddressController extends CoreController
{
    protected $model = CustomerGroup::class;

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $response['status'] = "success";
        $response['data']   = AddressService::create($request->all());

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function update(Request $request)
    {
        $response['status'] = "success";
        $response['data']   = AddressService::update($request->all());

        return response()->json($response);
    }
}
