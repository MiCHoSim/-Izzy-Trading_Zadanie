<?php

namespace App\Http\Controllers;

use App\Http\Requests\Part\FilterRequest;
use App\Http\Requests\Part\StoreRequest;
use App\Http\Requests\Part\UpdateRequest;
use App\Models\Car;
use App\Models\Part;
use App\Models\PartFilter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Exception;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(FilterRequest $request, PartFilter $partFilter) : View
    {
        $activeFilter = $partFilter->getActiveFilter($request);

        return view('part.index',
            [
                'parts' => Part::getWithFilter($activeFilter),
                'carFilters' => $partFilter->getCarFilter(),
                'activFilter' => $activeFilter,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create() : View
    {
        return view('part.create',['cars' => Car::orderBy('name')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request) : RedirectResponse
    {
        Part::create($request->all());

        return redirect()->route('part.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Part $part
     * @return View
     */
    public function show(Part $part) : View
    {
        return view('part.show',['part' => $part]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Part $part
     * @return View
     */
    public function edit(Part $part) : View
    {
        return view('part.edit', ['part' => $part, 'cars' => Car::orderBy('name')->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Part $part
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Part $part) : RedirectResponse
    {
        $part->update($request->all());

        return redirect()->route('part.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Part $part
     * @return RedirectResponse
     */
    public function destroy(Part $part) : RedirectResponse
    {
        try {
            $part->delete();
        }
        catch (Exception $exception){
            return redirect()->back()->withErrors(['An error occurred while deleting the Part.']);
        }
        return redirect()->route('part.index');
    }
}
