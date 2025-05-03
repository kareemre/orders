<?php
namespace App\Repositories;

use App\Repositories\Managers\RepositoryManager;
use App\Models\Order;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

Class OrdersRepository extends RepositoryManager
{
    /**
     * Model name
     * 
     * @const string
     */
    const MODEL = Order::class;

    /**
     * Table name
     *
     * @const string
     */
    const TABLE = 'orders';


    public function orderStats()
    {
        $stats = DB::table(static::TABLE)
            ->select('status', DB::raw('COUNT(*) as order_count'), DB::raw('SUM(price * quantity) as total_revenue'))
            ->groupBy('status')
            ->get();

        return $stats;
    }
}