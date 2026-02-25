<?php

namespace App\Http\Controllers\addmission;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    // 👀 Invoice Preview (Browser)
    public function show($id)
    {
        $invoice = Invoice::with('items')->findOrFail($id);

        return view('addmissionofficer.invoice', [
            'invoice' => $invoice,
        ]);
    }

    // 📄 Invoice Download (PDF)
    public function download($id)
    {
        $invoice = Invoice::with('items')->findOrFail($id);

        $pdf = Pdf::loadView('addmissionofficer.invoice', [
            'invoice' => $invoice,
            'isPdf'   => true, // 🔑 tell blade this is PDF mode
        ])->setPaper('A4', 'portrait');

        return $pdf->download($invoice->invoice_no . '.pdf');
    }
}
