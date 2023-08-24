<?php

namespace App\Http\Controllers\Admin;

use App\Models\Invoice;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ClientAccount;
use App\Models\PdfTheme;
use App\Models\InvoiceItem;

class InvoiceController extends Controller
{
    public function index()
    {
        if(Auth::user()->role->slug == 'admin' || Auth::user()->role->slug == 'super-admin') {
            session([
                'menu_active' => 'invoice-all',
                'page_title' => 'Invoice Manager',
                'page_title_description' => 'Manage all invoices in one place',
                'breadcrumb' => [
                    'Home' => route('admin.dashboard'),
                    'Invoices' => '',
                ],
            ]);

            $invoiceList = Invoice::all();
            return view('admin.invoices.index', compact('invoiceList'));
        }
        else{
            return redirect()->route('login');
        }
    }

    public function create()
    {
        if(Auth::user()->role->slug == 'admin' || Auth::user()->role->slug == 'super-admin') {
            session([
                'menu_active' => 'invoice-all',
                'page_title' => 'Invoice Manager',
                'page_title_description' => 'Manage all invoices in one place',
                'breadcrumb' => [
                    'Home' => route('admin.dashboard'),
                    'Invoices' => route('admin.invoice-management.index'),
                    'Create' => '',
                ],
            ]);

            $clientAccountsList = ClientAccount::all();
            $themeList = PdfTheme::all();
            $lastInvoiceItem = Invoice::orderBy('id', 'desc')->first();
            $lastInvoiceNumber = ($lastInvoiceItem == null) ? "INV-0000" : $lastInvoiceItem->invoice_number;
            $invoice_number = "INV-" . str_pad((int)explode('-', $lastInvoiceNumber)[1] + 1, 3, '0', STR_PAD_LEFT);
            return view('admin.invoices.create', compact('clientAccountsList', 'themeList', 'invoice_number'));
        }
        else{
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {
        if(Auth::user()->role->slug == 'admin' || Auth::user()->role->slug == 'super-admin') {
            // dd($request->all());

            // sum of all invoice items total
            $invoiceTotal = 0;
            $countItems = count($request->item_name);
            for($i = 0; $i < $countItems; $i++){
                $invoiceTotal += $request->item_total[$i];
            }

            $invoice = new Invoice();
            $invoice->client_account_id     = $request->client_account_id;
            $invoice->theme_id              = $request->theme_id;
            $invoice->invoice_number        = $request->invoice_number;
            $invoice->invoice_date          = $request->invoice_date;
            $invoice->due_date              = $request->due_date;
            $invoice->status                = $request->invoice_status;
            $invoice->client_name           = $request->client_name;
            $invoice->client_email          = $request->client_email;
            $invoice->client_phone          = $request->client_phone;
            $invoice->client_address        = $request->client_address;
            $invoice->discount              = $request->discount;
            $invoice->tax                   = $request->tax;
            $invoice->shipping              = $request->shipping;
            $invoice->total_payable         = $invoiceTotal;
            $invoice->total_after_discount  = $invoiceTotal - $request->discount;
            $invoice->balance               = ($invoiceTotal - $request->discount) - $request->advance_payment;
            $invoice->advance_payment       = $request->advance_payment;
            $invoice->save();

            // add invoice items to database
            $countItems = count($request->item_name);
            for($i = 0; $i < $countItems; $i++){
                $invoiceItem = new InvoiceItem();
                $invoiceItem->invoice_id        = $invoice->id;
                $invoiceItem->item_name         = $request->item_name[$i];
                $invoiceItem->item_description  = $request->item_description[$i];
                $invoiceItem->quantity          = $request->item_quantity[$i];
                $invoiceItem->unit_price        = $request->item_price[$i];
                $invoiceItem->total             = $request->item_total[$i];
                $invoiceItem->save();
            }

            return redirect()->route('admin.invoice-management.index')->with([
                'message' => 'Invoice created successfully',
                'alert-type' => 'success'
            ]);
        }
        else{
            return redirect()->route('login');
        }
    }

    public function downloadInvoicePdf($invoice){
        $invoice = Invoice::find($invoice);
        $invoiceItems = InvoiceItem::where('invoice_id', $invoice->id)->get();
        $pdfTheme = PdfTheme::find($invoice->theme_id);
        $pdf = \PDF::loadView('admin.pdfs.invoices.zonhack', compact('invoice', 'invoiceItems', 'pdfTheme'));
        // set paper size
        $pdf->setPaper('A4', 'portrait');
        // set page margins
        $pdf->setOption('margin-top', 0);
        $pdf->setOption('margin-bottom', 0);
        $pdf->setOption('margin-left', 0);
        $pdf->setOption('margin-right', 0);
        return $pdf->stream($invoice->invoice_number . '.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvoiceRequest  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
