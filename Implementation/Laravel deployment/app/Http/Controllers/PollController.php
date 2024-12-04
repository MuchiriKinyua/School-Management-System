<?php

namespace App\Http\Controllers;

use App\DataTables\PollDataTable;
use App\Http\Requests\CreatePollRequest;
use App\Http\Requests\UpdatePollRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\PollRepository;
use Illuminate\Http\Request;
use Flash;

class PollController extends AppBaseController
{
    /** @var PollRepository $pollRepository*/
    private $pollRepository;

    public function __construct(PollRepository $pollRepo)
    {
        $this->pollRepository = $pollRepo;
    }

    /**
     * Display a listing of the Poll.
     */
    public function index(PollDataTable $pollDataTable)
    {
    return $pollDataTable->render('polls.index');
    }


    /**
     * Show the form for creating a new Poll.
     */
    public function create()
    {
        return view('polls.create');
    }

    /**
     * Store a newly created Poll in storage.
     */
    public function store(CreatePollRequest $request)
    {
        $input = $request->all();

        $poll = $this->pollRepository->create($input);

        Flash::success('Poll saved successfully.');

        return redirect(route('polls.index'));
    }

    /**
     * Display the specified Poll.
     */
    public function show($id)
    {
        $poll = $this->pollRepository->find($id);

        if (empty($poll)) {
            Flash::error('Poll not found');

            return redirect(route('polls.index'));
        }

        return view('polls.show')->with('poll', $poll);
    }

    /**
     * Show the form for editing the specified Poll.
     */
    public function edit($id)
    {
        $poll = $this->pollRepository->find($id);

        if (empty($poll)) {
            Flash::error('Poll not found');

            return redirect(route('polls.index'));
        }

        return view('polls.edit')->with('poll', $poll);
    }

    /**
     * Update the specified Poll in storage.
     */
    public function update($id, UpdatePollRequest $request)
    {
        $poll = $this->pollRepository->find($id);

        if (empty($poll)) {
            Flash::error('Poll not found');

            return redirect(route('polls.index'));
        }

        $poll = $this->pollRepository->update($request->all(), $id);

        Flash::success('Poll updated successfully.');

        return redirect(route('polls.index'));
    }

    /**
     * Remove the specified Poll from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $poll = $this->pollRepository->find($id);

        if (empty($poll)) {
            Flash::error('Poll not found');

            return redirect(route('polls.index'));
        }

        $this->pollRepository->delete($id);

        Flash::success('Poll deleted successfully.');

        return redirect(route('polls.index'));
    }
}
