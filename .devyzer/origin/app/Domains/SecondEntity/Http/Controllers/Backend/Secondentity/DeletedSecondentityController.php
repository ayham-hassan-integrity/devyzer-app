<?php

namespace App\Domains\SecondEntity\Http\Controllers\Backend\Secondentity;

use App\Http\Controllers\Controller;
use App\Domains\SecondEntity\Models\Secondentity;
use App\Domains\SecondEntity\Services\SecondentityService;

/**
 * Class DeletedSecondentityController.
 */
class DeletedSecondentityController extends Controller
{
    /**
     * @var SecondentityService
     */
    protected $secondentityService;

    /**
     * DeletedSecondentityController constructor.
     *
     * @param  SecondentityService  $secondentityService
     */
    public function __construct(SecondentityService $secondentityService)
    {
        $this->secondentityService = $secondentityService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.second-entity.deleted');
    }

    /**
     * @param  Secondentity  $deletedSecondentity
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(Secondentity $deletedSecondentity)
    {
        $this->secondentityService->restore($deletedSecondentity);

        return redirect()->route('admin.secondentity.index')->withFlashSuccess(__('The  Secondentities was successfully restored.'));
    }

    /**
     * @param  Secondentity  $deletedSecondentity
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(Secondentity $deletedSecondentity)
    {
        $this->secondentityService->destroy($deletedSecondentity);

        return redirect()->route('admin.secondentity.deleted')->withFlashSuccess(__('The  Secondentities was permanently deleted.'));
    }
}