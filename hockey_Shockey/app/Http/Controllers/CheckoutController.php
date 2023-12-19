<?php

// CheckoutController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    // Función para mostrar la página de checkout
    public function checkout()
    {
        Session::put('checkout', 1);
        $cartItems = Session::get('cart', []);
        return view('checkout');
    }

    // Función para procesar el checkout
    public function processCheckout(Request $request)
    {
        // Validar los datos de la solicitud
        $validatedData = $request->validate([
            'email' => 'required|email',
            'delivery_method' => 'required',
            'country' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            // Agrega cualquier otro campo que necesites validar
        ]);

        // Generar un order_id único
        $order_id = $this->generateUniqueOrderId();

        // Verificar si el order_id generado ya existe
        while (Order::where('order_id', $order_id)->exists()) {
            $order_id = $this->generateUniqueOrderId();
        }

        // Crear una nueva instancia de Order y llenarla con los datos validados
        $order = new Order($validatedData);
        $order->order_id = $order_id;

        // Asociar el pedido con el usuario autenticado actualmente, si está disponible
        if (Auth::check()) {
            $order->user_id = Auth::id();
        }

        // Guardar el pedido en la base de datos
        $order->save();

        // Recuperar los elementos del carrito de la sesión o de donde los almacenes
        $cartItems = session('cart', []);
        
        // Guardar los elementos del pedido
        foreach ($cartItems as $cartItem) {
            $orderItem = new OrderItem([
                'order_id' => $order->id,
                'product_id' => $cartItem['product_id'],
                'quantity' => $cartItem['quantity'],
                'price' => $cartItem['price'],
                // Agrega cualquier otro campo que necesites guardar
            ]);

            $orderItem->save();
        }

        Session::put('order_id', $order->order_id);

        // Realizar acciones adicionales según sea necesario

        // Redirigir al formulario de pago con el order_id
        return redirect()->route('payment.form');
    }

    // Función auxiliar para generar un order_id único
    private function generateUniqueOrderId()
    {
        return Str::random(8); // Ajusta la longitud según sea necesario
    }

    // Función para obtener las transacciones del usuario
    public function getUserTransactions()
    {
        $userId = Auth::id();
        
        $query = "
            SELECT 
                transactions.id AS trans_id,
                transactions.ref_number,
                transactions.result_code,
                transactions.result_message,
                transactions.response_code,
                transactions.auth_code,
                transactions.errors,
                transactions.trans_id,
                transactions.status AS transaction_status,
                transactions.created_at AS transaction_created_at,
                transactions.updated_at AS transaction_updated_at,
                orders.id AS order_id,
                orders.email,
                orders.delivery_method,
                orders.country,
                orders.first_name,
                orders.last_name,
                orders.address,
                orders.city,
                orders.state,
                orders.zip_code,
                orders.payment_status,
                orders.user_id,
                orders.created_at AS order_created_at,
                orders.updated_at AS order_updated_at
            FROM transactions
            JOIN orders ON transactions.ref_number = orders.order_id
            GROUP BY transactions.id, orders.id
        ";

        $result = DB::select($query);

        if (empty($result)) {
            return response()->json(['error' => 'Data not found'], 404);
        }

        $formattedItems = [];

        foreach ($result as $item) {
            $query1 = "
                SELECT 
                    order_items.*,
                    products.*
                FROM transactions
                JOIN orders ON transactions.ref_number = orders.order_id
                LEFT JOIN order_items ON orders.id = order_items.order_id 
                LEFT JOIN products ON products.product_id = order_items.product_id 
                WHERE transactions.ref_number = ?
            ";
            $result1 = DB::select($query1, [$item->ref_number]);

            if (empty($result1)) {
                return response()->json(['error' => 'Data not found'], 404);
            }

            $productsArray = [];

            foreach ($result1 as $item1) {
                $productsArray[] = [
                    'product_name' => $item1->product_name,
                    'product_description' => $item1->product_description,
                    'short_description' => $item1->short_description,
                    'product_image' => $item1->product_image,
                    'product_size' => $item1->product_size,
                ];
            }       
            
            $formattedItems[] = [
                'trans_id' => $item->trans_id,
                'ref_number' => $item->ref_number,
                'auth_code' => $item->auth_code,
                'transaction_status' => $item->transaction_status,
                'created_at' => $item->transaction_created_at,
                'updated_at' => $item->transaction_updated_at,
                'productsArray' => $productsArray 
            ];
        }

        $userOrders = $formattedItems;

        // Renderizar la vista 'ordersProfile' con los resultados
        return view('ordersProfile', compact('userOrders'));
    }
}
