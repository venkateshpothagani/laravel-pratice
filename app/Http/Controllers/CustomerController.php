<?php

/**
 *
 */

namespace App\Http\Controllers;

use App\Mail\Subscribe;
use App\Models\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;
use App\Helpers\CustomValueGenerator;

class CustomerController extends Controller
{
    private function sendResponse($result, $meta, string $message): \Illuminate\Http\JsonResponse
    {
        $response = [
            'success' => true,
            'status'  => 200,
            'code'    => 'success',
            'message' => $message,
            'data'    => [...$result],
            'meta' => $meta
        ];

        return response()->json($response, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // return Customer::all(['name', 'slug', 'email', 'mobile_number', 'address',  'is_verified'])
        // $customers = DB::table('customers')->simplePaginate(perPage: 1, columns: ['email'], page: 2);
        $customers = Customer::paginate(perPage: 5, columns: ['*'], page: 1);



        return $this->sendResponse(
            $customers,
            ["total" => $customers->count(), "current_page" => $customers->currentPage(), "first_item" => $customers->firstItem(), "last_page" => $customers->lastPage(), "per_page" => $customers->perPage(), 'has_next_page' => $customers->hasMorePages()],
            'Done'
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            "name" => "required|min:3",
            "email" => "required|email|unique:customers,email",
            "mobile_number" => "required|string",
            "address" => "required|string",
        ]);

        $password = CustomValueGenerator::get_password(10);

        $mail_response = Mail::to(trim($fields["email"]))->send(new Subscribe(trim($fields["email"]), $password));

        $customer = Customer::create([
            "name" => trim($fields["name"]),
            "slug" => trim(strtolower(str_replace(" ", ".", $fields["name"]))),
            "email" => trim($fields["email"]),
            "mobile_number" => trim($fields["mobile_number"]),
            "address" => trim($fields["address"]),
            "password" => bcrypt($password)
        ]);

        $response = [
            'customer' => $customer,
            "mail" => $mail_response
        ];

        return response($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        return Customer::destroy($id);
    }
}
