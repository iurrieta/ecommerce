<?php

namespace App;

class PayPal
{
    /**
     * Attributes
     */
    private $_apiContext;
    private $shopping_cart;
    private $_ClientId = "AQnayqA16q6c14uoJlu3MHX1__S3RzMDU866HVwbipJqVv8KCGUN8wlsSt0t8HLhRJPFxCed_2BbkfUg";
    private $_ClientSecret = "ELIiOioM6znAm_QbQWejk89aGQbkbthayTCebwsIHYlIxGThfywFPR4xyvprUF5DTcT3qmxwx-PGhJgn";

    /**
     * PayPal constructor.
     * @param $shopping_cart
     */
    public function __construct($shopping_cart)
    {
        $this->_apiContext = \PaypalPayment::ApiContext($this->_ClientId, $this->_ClientSecret);
        $config = config("paypal_payment");
        $flatConfig = array_dot($config);
        $this->_apiContext->setConfig($flatConfig);
        $this->shopping_cart = $shopping_cart;
    }

    /**
     * Generate payment
     *
     * @return mixed
     */
    public function generate()
    {
        $payment = \PaypalPayment::payment()->setIntent("sale")
                                            ->setPayer($this->payer())
                                            ->setTransactions([$this->transaction()])
                                            ->setRedirectUrls($this->redirectUrls());
        try {
            $payment->create($this->_apiContext);
        } catch (\Exception $ex) {
            dd($ex);
            exit(1);
        }

        return $payment;
    }

    /**
     * Payment method
     * @return mixed
     */
    public function payer()
    {
        return \PaypalPayment::payer()->setPaymentMethod("paypal");
    }

    /**
     * Transaction
     * @return mixed
     */
    public function transaction()
    {
        return \PaypalPayment::transaction()
                                ->setAmount($this->amount())
                                ->setItemList($this->items())
                                ->setDescription("Tu compra en ProductosFacilito")
                                ->setInvoiceNumber(uniqid());
    }

    /**
     * Amount of the product
     * @return mixed
     */
    public function amount()
    {
        return \PaypalPayment::amount()
                                ->setCurrency("USD")
                                ->setTotal($this->shopping_cart->totalUSD());
    }

    /**
     * Items of the transaction
     * @return mixed
     */
    public function items()
    {
        $items = [];
        $products = $this->shopping_cart->products()->get();

        foreach ($products as $product)
        {
            array_push($items, $product->paypalItem());
        }

        return \PaypalPayment::itemList()->setItems($items);
    }

    /**
     * Urls from success or fail
     * @return mixed
     */
    public function redirectUrls()
    {
        $baseUrl = url("/");
        return \PaypalPayment::redirectUrls()
                                ->setReturnUrl("$baseUrl/payments/store")
                                ->setCancelUrl("$baseUrl/carrito");
    }

    /**
     * Execution of the transaction
     *
     * @param $paymentId
     * @param $payerId
     * @return mixed
     */
    public function execute($paymentId, $payerId)
    {
        $payment = \PaypalPayment::getById($paymentId, $this->_apiContext);
        $excecution = \PaypalPayment::PaymentExecution()->setPayerId($payerId);

        dd($payment->execute($excecution, $this->_apiContext));
    }
}