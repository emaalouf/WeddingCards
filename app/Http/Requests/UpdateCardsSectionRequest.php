<?php

namespace App\Http\Requests;

use App\Models\CardsSection;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCardsSectionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cards_section_edit');
    }

    public function rules()
    {
        return [
            'invitee_name' => [
                'string',
                'required',
            ],
            'persons_invited' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'sahra_included' => [
                'required',
            ],
            'invite_url' => [
                'string',
                'nullable',
            ],
        ];
    }
}
