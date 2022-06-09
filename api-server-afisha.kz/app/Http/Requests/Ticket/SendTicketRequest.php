<?php

namespace App\Http\Requests\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class SendTicketRequest extends FormRequest
{
    public function rules()
    {
        return [
            'seance_id' => ['required', 'exists:seances,id'],
//            'seance_id' => ['required', 'exists:seances,id'],
        ];
    }
}
