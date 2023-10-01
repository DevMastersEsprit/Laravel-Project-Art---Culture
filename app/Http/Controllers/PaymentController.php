<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;


class PaymentController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    // Récupérez toutes les transactions de paiement depuis la base de données
    $payments = Payment::all();

    // Chargez la vue 'payments.index' en passant les transactions comme données.
    return view('Payment.index', compact('payments'));
}

  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create()
{

   return view('Payment.create');
}
 /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $payments = Payment::create($request->all());

        /*$product = new Product([
            "name" => $request->get('name'),
            "description" => $request->get('description'),
            "price" => $request->get('price'),
            "stock" => $request->get('stock'),
        ]);*/


        return redirect()->route('payments.index');
    }
   /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment = Payment::find($id);
        return view('Payment.edit',compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $payment = Payment::find($id);
 
        $payment->amount = $request->amount;
        $payment->payment_method = $request->payment_method;
        $payment->transaction_id = $request->transaction_id;
        $payment->status = $request->status;
        $payment->payment_date = $request->payment_date;

        $payment->save();
     
        return redirect()->route('payments.index')
                        ->with('success','Payment Has Been updated successfully');
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Payment $payment)
    {
        //$product = Product::find($id) ;
        return view('Payment.show', compact('payment'));
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::find($id) ;
        $payment->delete() ;
        return redirect()->route('payments.index')
            ->with('success','Payment deleted successfully') ;

    }

   
}
