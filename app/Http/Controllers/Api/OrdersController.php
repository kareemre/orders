<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Repositories\OrdersRepository;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    
    protected $orderRepo;

    /**
     * OrderController constructor.
     * 
     * @param \App\Repositories\Contracts\RepositoryInterface $repository
     */
    public function __construct(OrdersRepository $orderRepo)
    {
        $this->orderRepo = $orderRepo;
    }


    /**
     * List of orders
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $orders = $this->orderRepo->list([]);
        return response()->json([
            'payload' => $orders,
            'success' => true,
            'message' => "successfully retrieved list of orders",
        ], 200);
    }


    /**
     * Get a specific order
     * 
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $order = $this->orderRepo->get($id);
        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Order not found',
                'payload' => null
            ], 404);
        }

        return response()->json([
            'payload' => $order,
            'success' => true,
            'message' => "successfully retrieved",
        ], 200);
        
    }

    /**
     * Create a new order
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(OrderRequest $request)
    {
        $order = $this->orderRepo->create($request->validated());
        return response()->json([
            'payload' => $order,
            'success' => true,
            'message' => "successfully created",
        ], 201);
    }

    /**
     * Update an existing order
     * 
     * @param int $id
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, OrderRequest $request)
    {
        $order = $this->orderRepo->update($id, $request->validated());
        return response()->json([
            'payload' => $order,
            'success' => true,
            'message' => "successfully updated",
        ], 200);
    }


    /**
     * Delete an order
     * 
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $this->orderRepo->delete($id);
        return response()->json(['message' => 'Order deleted successfully']);
    }


    /**
     * Get order stats
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function orderStats()
    {
        $stats = $this->orderRepo->orderStats();
        return response()->json([
            'payload' => $stats,
            'success' => true,
            'message' => "successfully retrieved order stats",
        ], 200);
    }
}
