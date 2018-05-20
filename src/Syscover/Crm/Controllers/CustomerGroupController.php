<?php namespace Syscover\Crm\Controllers;

use Illuminate\Http\Request;
use Syscover\Core\Controllers\CoreController;
use Syscover\Crm\Models\CustomerGroup;
use Syscover\Crm\Services\CustomerGroupService;

class CustomerGroupController extends CoreController
{
    protected $model = CustomerGroup::class;

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response['status'] = "success";
        $response['data']   = CustomerGroupService::create($request->all());

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param   \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $response['status'] = "success";
        $response['data']   = CustomerGroupService::update($request->all());

        return response()->json($response);
    }
}
