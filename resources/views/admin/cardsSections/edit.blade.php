@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.cardsSection.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cards-sections.update", [$cardsSection->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="invitee_name">{{ trans('cruds.cardsSection.fields.invitee_name') }}</label>
                <input class="form-control {{ $errors->has('invitee_name') ? 'is-invalid' : '' }}" type="text" name="invitee_name" id="invitee_name" value="{{ old('invitee_name', $cardsSection->invitee_name) }}" required>
                @if($errors->has('invitee_name'))
                    <span class="text-danger">{{ $errors->first('invitee_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cardsSection.fields.invitee_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="persons_invited">{{ trans('cruds.cardsSection.fields.persons_invited') }}</label>
                <input class="form-control {{ $errors->has('persons_invited') ? 'is-invalid' : '' }}" type="number" name="persons_invited" id="persons_invited" value="{{ old('persons_invited', $cardsSection->persons_invited) }}" step="1">
                @if($errors->has('persons_invited'))
                    <span class="text-danger">{{ $errors->first('persons_invited') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cardsSection.fields.persons_invited_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('sahra_included') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="sahra_included" id="sahra_included" value="1" {{ $cardsSection->sahra_included || old('sahra_included', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="sahra_included">{{ trans('cruds.cardsSection.fields.sahra_included') }}</label>
                </div>
                @if($errors->has('sahra_included'))
                    <span class="text-danger">{{ $errors->first('sahra_included') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cardsSection.fields.sahra_included_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="invite_url">{{ trans('cruds.cardsSection.fields.invite_url') }}</label>
                <input class="form-control {{ $errors->has('invite_url') ? 'is-invalid' : '' }}" type="text" name="invite_url" id="invite_url" value="{{ old('invite_url', $cardsSection->invite_url) }}">
                @if($errors->has('invite_url'))
                    <span class="text-danger">{{ $errors->first('invite_url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cardsSection.fields.invite_url_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection