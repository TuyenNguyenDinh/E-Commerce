<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customers;
use Illuminate\Http\Request;
use App\Repositories\CustomerEloquentRepository;

class CustomerController extends Controller
{

    protected $customers;

    public function __construct(CustomerEloquentRepository $customers)
    {
        $this->customers = $customers;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customers->getAll();
        return view('admin.customers.index', ['customers' => $customers]);
    }


}
