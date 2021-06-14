<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_id' => 'integer|required|exists:customer,id',
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'kode_pos' => 'required|max:255',
            'no_telp' => 'required|max:255',
            'ongkir' => 'required|integer',
            'pajak' => 'required|integer',
            'transaksi_total' => 'required|integer',
            'transaksi_status' => 'nullable|string|in:SUKSES,GAGAL,PENDING',
            'transaksi_details' => 'required|array',
            'transaksi_details.*' => 'integer|exists:product,id'
        ];
    }
}
