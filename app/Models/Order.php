<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    protected $fillable = ['order_number','first_name','last_name','email','whatsapp','address','city','postal_code','total','payment_method','status','items','midtrans_token'];
    protected $casts = ['items' => 'array'];
    public function getFullNameAttribute(): string { return trim($this->first_name.' '.$this->last_name); }
    public function getDisplayOrderNumberAttribute(): string {
        if (!empty($this->order_number)) return $this->order_number;
        $date = $this->created_at ? $this->created_at->format('Ymd') : now()->format('Ymd');
        return 'GBN-' . $date . '-' . str_pad((string) $this->id, 4, '0', STR_PAD_LEFT);
    }

    public function getDisplayStatusAttribute(): string {
        return [
            'pending'=>'Baru','dikonfirmasi'=>'Diproses','dikemas'=>'Dikemas','diantar'=>'Dikirim','selesai'=>'Selesai','dibatalkan'=>'Dibatalkan'
        ][$this->status] ?? ucfirst($this->status);
    }
}
