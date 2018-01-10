<?php namespace Syscover\Crm\Controllers;

use Illuminate\Http\Request;
use Syscover\Core\Controllers\CoreController;
use Syscover\Crm\Models\Customer;
use Syscover\Crm\Services\CustomerService;

class CustomerController extends CoreController
{
    protected $model = Customer::class;

    /**
     * Store a newly created customer.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $response['status'] = "success";
        $response['data']   = CustomerService::create($request->all());

        return response()->json($response);
    }

    /**
     * Update the specified customer.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function update(Request $request, $id)
    {
        $response['status'] = "success";
        $response['data']   = CustomerService::update($request->all(), $id);

        return response()->json($response);
    }

    public function hasUser(Request $request)
    {
        $n = Customer::where('user', 'like', $request->input('user'))->count();

        return response()->json([
            'status'    => 'success',
            'hasUser'   => $n > 0
        ]);
    }
}
