<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Orders;
use Illuminate\Support\Carbon;

class OrderController extends BaseController
{
    public function __construct()
    {
        $this->middleware('authorization');
    }

    public function store()
    {
        // cari data product berasarkan product_id
        $product = Products::find(\request('product_id'));

        if ($product == null) {
            return $this->out(status:'Gagal', code:404, error:['Produk Tidak Ditemukan']);
        }

        $order = new Orders();
        $order->order_date  = Carbon::now('Asia/Jakarta');
        $order->product_id  = $product->id;
        $order->customer_id = request('customer_id');
        $order->qty         = request('qty');
        $order->price       = $product->price;

        if ($order->save() == true) {
            return $this->out(data:$order, status:'OK', code:201);
        } else {
            return $this->out(status:'Gagal', error:['Order Gagal Disimpan'], code:504);
        }
    }

    public function findAll()
    {
        $order = Orders::query()
            -> leftJoin('customers', 'customers.id', '=', 'orders.customer_id')
            -> leftJoin('products', 'products.id', '=', 'orders.product_id');

        if (request()->has('q')) { //jika ada query "q" untuk pencarian products.title
            $q = request('q');
            $order->where('products.title', 'like', "%$q%");
        }

        $data = $order->paginate(10,
            [
                'orders.*',
                'customers.first_name', 'customers.last_name', 'customers.address', 'customers.city',
                'products.title as product_title'
            ]);

        return $this->out(data:$data, status:'OK');
    }

    public function update(Orders $order)
    {
        // return $this->out(data:$order, status:'OK');

        $product = Products::find($order->product_id);

        if ($product == null) {
            return $this->out(status:'Gagal', code:404, error:['Produk Tidak Ditemukan']);
        }

        $order->product_id  = $product->id;
        $order->customer_id = $order->customer_id;
        $order->qty         = request('qty');
        $order->price       = $product->price;

        $hasil              = $order->save();

        return $this->out(
            status  : $hasil ? 'OK'     : 'Gagal',
            data    : $hasil ? $order   : null,
            error   : $hasil ? null     : ['Gagal Merubah Data'],
            code    : $hasil ? 201      : 504
        );

    }

    public function delete(Orders $order)
    {
        $hasil = $order->delete();
        return $this->out(
            status  : $hasil ? 'OK'     : 'Gagal',
            data    : $hasil ? $order   : null,
            error   : $hasil ? null     : ['Gagal Hapus Data'],
            code    : $hasil ? 200      : 504
        );
    }
}
