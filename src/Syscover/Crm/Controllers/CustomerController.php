<?php namespace Syscover\Crm\Controllers;

use Illuminate\Http\Request;
use Syscover\Core\Controllers\CoreController;
use Syscover\Crm\Models\Customer;
use Syscover\Crm\Services\CustomerService;

class CustomerController extends CoreController
{
    protected $model = Customer::class;

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response['status'] = "success";
        $response['data']   = CustomerService::create($request->all());

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param   \Illuminate\Http\Request  $request
     * @param   int     $id
     * @return  \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $response['status'] = "success";
        $response['data']   = CustomerService::update($request->all(), $id);

        return response()->json($response);
    }
}
