<?php

namespace App\Domains\FirstEntity\Http\Controllers\Backend\Firstentity;

use App\Http\Controllers\Controller;
use App\Domains\FirstEntity\Models\Firstentity;
use App\Domains\FirstEntity\Services\FirstentityService;

/**
 * Class DeletedFirstentityController.
 */
class DeletedFirstentityController extends Controller
{
    /**
     * @var FirstentityService
     */
    protected $firstentityService;

    /**
     * DeletedFirstentityController constructor.
     *
     * @param  FirstentityService  $firstentityService
     */
    public function __construct(FirstentityService $firstentityService)
    {
        $this->firstentityService = $firstentityService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.first-entity.deleted');
    }

    /**
     * @param  Firstentity  $deletedFirstentity
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(Firstentity $deletedFirstentity)
    {
        $this->firstentityService->restore($deletedFirstentity);

        return redirect()->route('admin.firstentity.index')->withFlashSuccess(__('The  Firstentities was successfully restored.'));
    }

    /**
     * @param  Firstentity  $deletedFirstentity
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(Firstentity $deletedFirstentity)
    {
        $this->firstentityService->destroy($deletedFirstentity);

        return redirect()->route('admin.firstentity.deleted')->withFlashSuccess(__('The  Firstentities was permanently deleted.'));
    }
}