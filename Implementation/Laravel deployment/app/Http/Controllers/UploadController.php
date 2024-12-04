<?php

namespace App\Http\Controllers;

use App\DataTables\UploadDataTable;
use App\Http\Requests\CreateUploadRequest;
use App\Http\Requests\UpdateUploadRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\UploadRepository;
use Illuminate\Http\Request;
use Flash;

class UploadController extends AppBaseController
{
    /** @var UploadRepository $uploadRepository*/
    private $uploadRepository;

    public function __construct(UploadRepository $uploadRepo)
    {
        $this->uploadRepository = $uploadRepo;
    }

    /**
     * Display a listing of the Upload.
     */
    public function index(UploadDataTable $uploadDataTable)
    {
    return $uploadDataTable->render('uploads.index');
    }


    /**
     * Show the form for creating a new Upload.
     */
    public function create()
    {
        return view('uploads.create');
    }

    /**
     * Store a newly created Upload in storage.
     */
    public function store(CreateUploadRequest $request)
    {
        $input = $request->all();

        $upload = $this->uploadRepository->create($input);

        $request->validate([
            'file' => 'required|file|mimes:jpg,png,pdf|max:2048',
        ]);

        $path = $request->file('file')->store('uploads', 'public');

        Flash::success('Upload saved successfully.');

        return response()->json(['path' => asset('storage/' . $path)], 200);
    }  

    /**
     * Display the specified Upload.
     */
    public function show($id)
    {
        $upload = $this->uploadRepository->find($id);

        if (empty($upload)) {
            Flash::error('Upload not found');

            return redirect(route('uploads.index'));
        }

        return view('uploads.show')->with('upload', $upload);
    }

    /**
     * Show the form for editing the specified Upload.
     */
    public function edit($id)
    {
        $upload = $this->uploadRepository->find($id);

        if (empty($upload)) {
            Flash::error('Upload not found');

            return redirect(route('uploads.index'));
        }

        return view('uploads.edit')->with('upload', $upload);
    }

    /**
     * Update the specified Upload in storage.
     */
    public function update($id, UpdateUploadRequest $request)
    {
        $upload = $this->uploadRepository->find($id);

        if (empty($upload)) {
            Flash::error('Upload not found');

            return redirect(route('uploads.index'));
        }

        $upload = $this->uploadRepository->update($request->all(), $id);

        Flash::success('Upload updated successfully.');

        return redirect(route('uploads.index'));
    }

    /**
     * Remove the specified Upload from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $upload = $this->uploadRepository->find($id);

        if (empty($upload)) {
            Flash::error('Upload not found');

            return redirect(route('uploads.index'));
        }

        $this->uploadRepository->delete($id);

        Flash::success('Upload deleted successfully.');

        return redirect(route('uploads.index'));
    }
    public function uploadFile(Request $request){
        $data = array();

        $validator = validator::make($request->all(),[
            'file' => 'required|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);

            if($validator->fails()){

                $data['success'] = 0; $data['error'] = $validator->errors()->first('file');// Error response
                
            }else{
                
                    $file = $request->file('file');
                
                    $filename = time().'_'.$file->getClientOriginalName();
                
                    // File upload location
                
                    $location = 'files';
                
                    // Upload file
                
                    $file->move($location, $filename);
                
                    //Response
                
                    $data['success'] = 1;
                
                    $data['message'] = 'Uploaded Scessfully';
            } 

            return response()->json($data);
    }
}
