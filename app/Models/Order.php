<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'invoice_id',
        'quantity',
        'price',
        'discounts',
        'shippingCharges',
        'shipperCode',
        'IVA',
        'IVAReturn',
        'status_id',
        'user_ip',
        'user_agent',
        'request_url',
        'request_data',
        'unique_machine',
        'user_id',
        'updated_user_id',
        'referal_user_id',
        'authorizationResult',
        'authorizationCode',
        'errorCode',
        'errorMessage',
        'phone',
        'latitude',
        'longitude',
        'added_at',
        'notes',
        'delivery_date',
        'delivery_name',
        'delivery_email',
        'delivery_address',
        'delivery_phone',
        'delivery_to',
        'delivery_from',
        'delivery_message',
        'payment_form',
        'payment_id',
        'session_id',
    ];

    /**
     * Get the product associated with the order.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the invoice associated with the order.
     */
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    /**
     * Get the status of the order.
     */
    public function status()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    /**
     * Get the payment associated with the order.
     */
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    /**
     * Get the user who created the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user who updated the order.
     */
    public function updatedUser()
    {
        return $this->belongsTo(User::class, 'updated_user_id');
    }

    /**
     * Get the user who referred the order.
     */
    public function referalUser()
    {
        return $this->belongsTo(User::class, 'referal_user_id');
    }

    public function getTotal()
    {
        // Suponiendo que tienes un atributo price, quantity, y discounts
        $subtotal = $this->price * $this->quantity;
        $totalDiscount = $subtotal * ($this->discounts / 100);

        return $subtotal - $totalDiscount + $this->shippingCharges + $this->IVA - $this->IVAReturn;
    }
}
