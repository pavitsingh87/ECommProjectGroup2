<?php

namespace App\Http\Controllers;
use App\Models\Tax;

use Illuminate\Http\Request;

class TaxController extends Controller
{
        public function index()
        {
            $taxes = Tax::all();
            return view('admin.taxes.index', compact('taxes'));
        }
    
        public function create()
        {
            return view('admin.taxes.create');
        }
    
        public function store(Request $request)
        {
    
            $orderTotal = $request->input('order_total');
            $provinceId = $request->input('province_id');

            $calculatedTaxAmount = $this->calculateTaxAmount($orderTotal, $provinceId);

            Tax::create([
                'amount' => $calculatedTaxAmount,
                'order_id' => $request->input('order_id'),
                'province_id' => $provinceId,
            ]);

            return redirect()->route('admin.taxes.index')->with('success', 'Tax created successfully.');
        }
    
        public function show(Tax $tax)
{
    // Load the related Order and Province
    $tax->load('order', 'province');

    return view('admin.taxes.show', compact('tax'));
}
    
        public function edit(Tax $tax)
        {
            return view('admin.taxes.edit', compact('tax'));
        }

        public function update(Request $request, Tax $tax)
        {
            // Load the related Order and Province
            $tax->load('order', 'province');
        
            // Check if the 'order' relationship is loaded and not null
            if ($tax->order) {
                // Retrieve the updated values from the request
                $updatedGST = $request->input('gst');
                $updatedPST = $request->input('pst');
        
                // Calculate the updated tax amount using your logic
                $updatedTaxAmount = $this->calculateTaxAmount(
                    $tax->order->total,  // Assuming 'total' is a property of the Order model
                    $tax->province->id,
                    $updatedGST,
                    $updatedPST
                );
        
                // Update the tax record
                $tax->update([
                    'amount' => $updatedTaxAmount,
                    'gst_rate' => $updatedGST, // Update GST rate in the taxes table
                    'pst_rate' => $updatedPST, // Update PST rate in the taxes table
       
                ]);
        
                return redirect()->route('admin.taxes.index')->with('success', 'Tax updated successfully.');
            } else {
                // Handle the case where the 'order' relationship is null
                return redirect()->route('admin.taxes.index')->with('error', 'Tax update failed. Order not found.');
            }
        }
        public function destroy(Tax $tax)
        {
            $tax->delete();
            return redirect()->route('admin.taxes.index')->with('success', 'Tax deleted successfully.');
        }
}