<?php

namespace App\Http\Requests;

use App\Models\CardsSection;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCardsSectionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('cards_section_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:cards_sections,id',
        ];
    }
}
