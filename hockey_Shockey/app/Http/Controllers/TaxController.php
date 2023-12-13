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
                $updatedGST = $request->input('gst');
                $updatedPST = $request->input('pst');
            
                $tax->update([
                    'gst_rate' => $updatedGST,
                    'pst_rate' => $updatedPST,
                ]);
            
                return redirect()->route('admin.taxes.index')->with('success', 'Tax updated successfully.');  
            } 
        
        public function destroy(Tax $tax)
        {
            $tax->delete();
            return redirect()->route('admin.taxes.index')->with('success', 'Tax deleted successfully.');
        }
}