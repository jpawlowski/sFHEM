<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateBackendRequest;
use App\Http\Requests\UpdateBackendRequest;
use App\Repositories\BackendRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Backend;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class BackendController extends InfyOmBaseController
{
    /** @var  BackendRepository */
    private $backendRepository;

    public function __construct(BackendRepository $backendRepo)
    {
        $this->backendRepository = $backendRepo;
    }

    /**
     * Display a listing of the Backend.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->backendRepository->pushCriteria(new RequestCriteria($request));
        $backends = $this->backendRepository->all();

        return view('admin.backends.index')
            ->with('backends', $backends);
    }

    /**
     * Show the form for creating a new Backend.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.backends.create');
    }

    /**
     * Store a newly created Backend in storage.
     *
     * @param CreateBackendRequest $request
     *
     * @return Response
     */
    public function store(CreateBackendRequest $request)
    {
        $input = $request->all();

        $backend = $this->backendRepository->create($input);

        Flash::success('Backend saved successfully.');

        return redirect(route('admin.backends.index'));
    }

    /**
     * Display the specified Backend.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $backend = $this->backendRepository->findWithoutFail($id);

        if (empty($backend)) {
            Flash::error('Backend not found');

            return redirect(route('backends.index'));
        }

        return view('admin.backends.show')->with('backend', $backend);
    }

    /**
     * Show the form for editing the specified Backend.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $backend = $this->backendRepository->findWithoutFail($id);

        if (empty($backend)) {
            Flash::error('Backend not found');

            return redirect(route('backends.index'));
        }

        return view('admin.backends.edit')->with('backend', $backend);
    }

    /**
     * Update the specified Backend in storage.
     *
     * @param  int              $id
     * @param UpdateBackendRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBackendRequest $request)
    {
        $backend = $this->backendRepository->findWithoutFail($id);

        if (empty($backend)) {
            Flash::error('Backend not found');

            return redirect(route('backends.index'));
        }

        $backend = $this->backendRepository->update($request->all(), $id);

        Flash::success('Backend updated successfully.');

        return redirect(route('admin.backends.index'));
    }

    /**
     * Remove the specified Backend from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.backends.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Backend::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.backends.index'))->with('success', Lang::get('message.success.delete'));

       }

}
