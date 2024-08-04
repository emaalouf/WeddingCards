@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.cardsSection.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cards-sections.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.cardsSection.fields.id') }}
                        </th>
                        <td>
                            {{ $cardsSection->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cardsSection.fields.invitee_name') }}
                        </th>
                        <td>
                            {{ $cardsSection->invitee_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cardsSection.fields.persons_invited') }}
                        </th>
                        <td>
                            {{ $cardsSection->persons_invited }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cardsSection.fields.sahra_included') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $cardsSection->sahra_included ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cardsSection.fields.invite_url') }}
                        </th>
                        <td>
                            {{ $cardsSection->invite_url }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cards-sections.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection