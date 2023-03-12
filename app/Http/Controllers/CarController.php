<?php

namespace App\Http\Controllers;

use App\Http\Requests\Car\FilterRequest;
use App\Http\Requests\Car\StoreRequest;
use App\Http\Requests\Car\UpdateRequest;
use App\Models\Car;
use App\Models\CarFilter;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Exception;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(FilterRequest $request, CarFilter $carFilter) : View
    {
        $activeFilter = $carFilter->getActiveFilter($request);

        return view('car.index',
            [
                'cars' => Car::getWithFilter($activeFilter),
                'isRegisteredFilters' => $carFilter->getIsRegistratedFilter(),
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
        return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request) : RedirectResponse
    {
        $data = $request->all();
        $data['registration_number'] = !empty($data['is_registered']) ? $data['registration_number'] : null;

        Car::create($data);

        return redirect()->route('car.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Car $car
     * @return View
     */
    public function show(Car $car) : View
    {
        return view('car.show', ['car' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Car $car
     * @return View
     */
    public function edit(Car $car) : View
    {
        return view('car.edit', ['car' => $car]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Car $car
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Car $car) : RedirectResponse
    {
        $data = $request->all();
        $data['is_registered'] = empty($data['is_registered']) ? 0 : 1;
        $data['registration_number'] = !empty($data['is_registered']) ? $data['registration_number'] : null;

        $car->update($data);

        return redirect()->route('car.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Car $car
     * @return RedirectResponse
     */
    public function destroy(Car $car) : RedirectResponse
    {
        try {
            $car->delete();
        }
        catch (Exception $exception) {
            return redirect()->back()->withErrors(['An error occurred while deleting the Car.']);
        }

        return redirect()->route('car.index');
    }
}
