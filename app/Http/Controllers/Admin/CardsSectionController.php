<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCardsSectionRequest;
use App\Http\Requests\StoreCardsSectionRequest;
use App\Http\Requests\UpdateCardsSectionRequest;
use App\Models\CardsSection;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CardsSectionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cards_section_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cardsSections = CardsSection::all();

        return view('admin.cardsSections.index', compact('cardsSections'));
    }

    public function create()
    {
        abort_if(Gate::denies('cards_section_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cardsSections.create');
    }

    public function store(StoreCardsSectionRequest $request)
    {
        $cardsSection = CardsSection::create($request->all());

        return redirect()->route('admin.cards-sections.index');
    }

    public function edit(CardsSection $cardsSection)
    {
        abort_if(Gate::denies('cards_section_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cardsSections.edit', compact('cardsSection'));
    }

    public function update(UpdateCardsSectionRequest $request, CardsSection $cardsSection)
    {
        $cardsSection->update($request->all());

        return redirect()->route('admin.cards-sections.index');
    }

    public function show(CardsSection $cardsSection)
    {
        abort_if(Gate::denies('cards_section_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cardsSections.show', compact('cardsSection'));
    }

    public function destroy(CardsSection $cardsSection)
    {
        abort_if(Gate::denies('cards_section_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cardsSection->delete();

        return back();
    }

    public function massDestroy(MassDestroyCardsSectionRequest $request)
    {
        $cardsSections = CardsSection::find(request('ids'));

        foreach ($cardsSections as $cardsSection) {
            $cardsSection->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
