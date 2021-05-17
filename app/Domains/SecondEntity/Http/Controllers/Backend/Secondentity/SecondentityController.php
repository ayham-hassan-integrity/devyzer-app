<?php

namespace App\Domains\SecondEntity\Http\Controllers\Backend\Secondentity;

use App\Http\Controllers\Controller;
use App\Domains\SecondEntity\Models\Secondentity;
use App\Domains\SecondEntity\Services\SecondentityService;
use App\Domains\SecondEntity\Http\Requests\Backend\Secondentity\DeleteSecondentityRequest;
use App\Domains\SecondEntity\Http\Requests\Backend\Secondentity\EditSecondentityRequest;
use App\Domains\SecondEntity\Http\Requests\Backend\Secondentity\StoreSecondentityRequest;
use App\Domains\SecondEntity\Http\Requests\Backend\Secondentity\UpdateSecondentityRequest;

/**
 * Class SecondentityController.
 */
class SecondentityController extends Controller
{
    /**
     * @var SecondentityService
     */
    protected $secondentityService;

    /**
     * SecondentityController constructor.
     *
     * @param SecondentityService $secondentityService
     */
    public function __construct(SecondentityService $secondentityService)
    {
        $this->secondentityService = $secondentityService;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.second-entity.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.second-entity.create');
    }

    /**
     * @param StoreSecondentityRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreSecondentityRequest $request)
    {
        $secondentity = $this->secondentityService->store($request->validated());

        return redirect()->route('admin.secondentity.show', $secondentity)->withFlashSuccess(__('The  Secondentities was successfully created.'));
    }

    /**
     * @param Secondentity $secondentity
     *
     * @return mixed
     */
    public function show(Secondentity $secondentity)
    {
        return view('backend.second-entity.show')
            ->withSecondentity($secondentity);
    }

    /**
     * @param EditSecondentityRequest $request
     * @param Secondentity $secondentity
     *
     * @return mixed
     */
    public function edit(EditSecondentityRequest $request, Secondentity $secondentity)
    {
        return view('backend.second-entity.edit')
            ->withSecondentity($secondentity);
    }

    /**
     * @param UpdateSecondentityRequest $request
     * @param Secondentity $secondentity
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(UpdateSecondentityRequest $request, Secondentity $secondentity)
    {
        $this->secondentityService->update($secondentity, $request->validated());

        return redirect()->route('admin.secondentity.show', $secondentity)->withFlashSuccess(__('The  Secondentities was successfully updated.'));
    }

    /**
     * @param DeleteSecondentityRequest $request
     * @param Secondentity $secondentity
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(DeleteSecondentityRequest $request, Secondentity $secondentity)
    {
        $this->secondentityService->delete($secondentity);

        return redirect()->route('admin.$secondentity.deleted')->withFlashSuccess(__('The  Secondentities was successfully deleted.'));
    }
}