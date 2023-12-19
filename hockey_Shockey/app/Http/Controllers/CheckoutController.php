<?php

// CheckoutController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\OrderItem;

use App\Models\Province;
use App\Models\Tax;

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

    
}
