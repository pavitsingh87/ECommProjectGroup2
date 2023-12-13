<?php

namespace App\Http\Controllers;
use App\Models\Tax;
use App\Models\Province;

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

            $request->validate([
                'gst' => 'required|numeric|min:0',
                'pst' => 'required|numeric|min:0',
                'hst' => 'required|numeric|min:0',
                'province' => 'required|string'
            ]);

            $province = Province::create([
                'name' => $request->input('province'),
            ]);

            // dd($province->name);
            $tax = Tax::create([
                'gst_rate' => $request->input('gst'),
                'pst_rate' => $request->input('pst'),
                'hst_rate' => $request->input('hst'),
                'province_id' => $province->id
            ]);

            return redirect()->route('admin.taxes.index')->with('success', 'Tax updated successfully.');  
        }
    
        public function show(Tax $tax)
            {
                $tax->load('province');

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
                $updatedHST = $request->input('hst');
            
                $tax->update([
                    'gst_rate' => $updatedGST,
                    'pst_rate' => $updatedPST,
                    'hst_rate' => $updatedHST,
                ]);
            
                return redirect()->route('admin.taxes.index')->with('success', 'Tax updated successfully.');  
            } 
        
        public function destroy(Tax $tax)
        {
            $tax->delete();
            return redirect()->route('admin.taxes.index')->with('success', 'Tax deleted successfully.');
        }
}