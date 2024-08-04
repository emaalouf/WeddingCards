<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCardsSectionRequest;
use App\Http\Requests\UpdateCardsSectionRequest;
use App\Http\Resources\Admin\CardsSectionResource;
use App\Models\CardsSection;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CardsSectionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cards_section_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CardsSectionResource(CardsSection::all());
    }

    public function store(StoreCardsSectionRequest $request)
    {
        $cardsSection = CardsSection::create($request->all());

        return (new CardsSectionResource($cardsSection))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CardsSection $cardsSection)
    {
        abort_if(Gate::denies('cards_section_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CardsSectionResource($cardsSection);
    }

    public function update(UpdateCardsSectionRequest $request, CardsSection $cardsSection)
    {
        $cardsSection->update($request->all());

        return (new CardsSectionResource($cardsSection))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CardsSection $cardsSection)
    {
        abort_if(Gate::denies('cards_section_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cardsSection->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
