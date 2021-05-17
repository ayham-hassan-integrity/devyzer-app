<?php

namespace App\Domains\FirstEntity\Http\Controllers\Backend\Firstentity;

use App\Http\Controllers\Controller;
use App\Domains\FirstEntity\Models\Firstentity;
use App\Domains\FirstEntity\Services\FirstentityService;
use App\Domains\FirstEntity\Http\Requests\Backend\Firstentity\DeleteFirstentityRequest;
use App\Domains\FirstEntity\Http\Requests\Backend\Firstentity\EditFirstentityRequest;
use App\Domains\FirstEntity\Http\Requests\Backend\Firstentity\StoreFirstentityRequest;
use App\Domains\FirstEntity\Http\Requests\Backend\Firstentity\UpdateFirstentityRequest;

/**
 * Class FirstentityController.
 */
class FirstentityController extends Controller
{
    /**
     * @var FirstentityService
     */
    protected $firstentityService;

    /**
     * FirstentityController constructor.
     *
     * @param FirstentityService $firstentityService
     */
    public function __construct(FirstentityService $firstentityService)
    {
        $this->firstentityService = $firstentityService;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.first-entity.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.first-entity.create');
    }

    /**
     * @param StoreFirstentityRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreFirstentityRequest $request)
    {
        $firstentity = $this->firstentityService->store($request->validated());

        return redirect()->route('admin.firstentity.show', $firstentity)->withFlashSuccess(__('The  Firstentities was successfully created.'));
    }

    /**
     * @param Firstentity $firstentity
     *
     * @return mixed
     */
    public function show(Firstentity $firstentity)
    {
        return view('backend.first-entity.show')
            ->withFirstentity($firstentity);
    }

    /**
     * @param EditFirstentityRequest $request
     * @param Firstentity $firstentity
     *
     * @return mixed
     */
    public function edit(EditFirstentityRequest $request, Firstentity $firstentity)
    {
        return view('backend.first-entity.edit')
            ->withFirstentity($firstentity);
    }

    /**
     * @param UpdateFirstentityRequest $request
     * @param Firstentity $firstentity
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(UpdateFirstentityRequest $request, Firstentity $firstentity)
    {
        $this->firstentityService->update($firstentity, $request->validated());

        return redirect()->route('admin.firstentity.show', $firstentity)->withFlashSuccess(__('The  Firstentities was successfully updated.'));
    }

    /**
     * @param DeleteFirstentityRequest $request
     * @param Firstentity $firstentity
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(DeleteFirstentityRequest $request, Firstentity $firstentity)
    {
        $this->firstentityService->delete($firstentity);

        return redirect()->route('admin.$firstentity.deleted')->withFlashSuccess(__('The  Firstentities was successfully deleted.'));
    }
}