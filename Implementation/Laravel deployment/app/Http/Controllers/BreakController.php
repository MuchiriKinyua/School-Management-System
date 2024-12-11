<?php

namespace App\Http\Controllers;

use App\DataTables\BreakDataTable;
use App\Http\Requests\CreateBreakRequest;
use App\Http\Requests\UpdateBreakRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\BreakRepository;
use Illuminate\Http\Request;
use Flash;

class BreakController extends AppBaseController
{
    /** @var BreakRepository $breakRepository*/
    private $breakRepository;

    public function __construct(BreakRepository $breakRepo)
    {
        $this->breakRepository = $breakRepo;
    }

    /**
     * Display a listing of the Break.
     */
    public function index(BreakDataTable $breakDataTable)
    {
    return $breakDataTable->render('breaks.index');
    }


    /**
     * Show the form for creating a new Break.
     */
    public function create()
    {
        return view('breaks.create');
    }

    /**
     * Store a newly created Break in storage.
     */
    public function store(CreateBreakRequest $request)
    {
        $input = $request->all();

        $break = $this->breakRepository->create($input);

        Flash::success('Break saved successfully.');

        return redirect(route('breaks.index'));
    }

    /**
     * Display the specified Break.
     */
    public function show($id)
    {
        $break = $this->breakRepository->find($id);

        if (empty($break)) {
            Flash::error('Break not found');

            return redirect(route('breaks.index'));
        }

        return view('breaks.show')->with('break', $break);
    }

    /**
     * Show the form for editing the specified Break.
     */
    public function edit($id)
    {
        $break = $this->breakRepository->find($id);

        if (empty($break)) {
            Flash::error('Break not found');

            return redirect(route('breaks.index'));
        }

        return view('breaks.edit')->with('break', $break);
    }

    /**
     * Update the specified Break in storage.
     */
    public function update($id, UpdateBreakRequest $request)
    {
        $break = $this->breakRepository->find($id);

        if (empty($break)) {
            Flash::error('Break not found');

            return redirect(route('breaks.index'));
        }

        $break = $this->breakRepository->update($request->all(), $id);

        Flash::success('Break updated successfully.');

        return redirect(route('breaks.index'));
    }

    /**
     * Remove the specified Break from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $break = $this->breakRepository->find($id);

        if (empty($break)) {
            Flash::error('Break not found');

            return redirect(route('breaks.index'));
        }

        $this->breakRepository->delete($id);

        Flash::success('Break deleted successfully.');

        return redirect(route('breaks.index'));
    }
}
