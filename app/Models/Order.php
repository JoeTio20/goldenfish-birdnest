<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    protected $fillable = ['order_number','first_name','last_name','email','whatsapp','address','city','postal_code','total','payment_method','status','items','midtrans_token'];
    protected $casts = ['items' => 'array'];
    public function getFullNameAttribute(): string { return trim($this->first_name.' '.$this->last_name); }
    public function getDisplayStatusAttribute(): string {
        return [
            'pending'=>'Baru','dikonfirmasi'=>'Diproses','dikemas'=>'Dikemas','diantar'=>'Dikirim','selesai'=>'Selesai','dibatalkan'=>'Dibatalkan'
        ][$this->status] ?? ucfirst($this->status);
    }
}
