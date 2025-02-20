<?php

namespace App\Http\Controllers\Admin\Label;

use App\DataTables\LabelDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\LabelRequest;
use App\Models\Label;
use App\Services\LabelService;
use App\Utils\GlobalConstant;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $labelService;

    public function __construct(LabelService $labelService)
    {
        $this->labelService = $labelService;
    }

    public function index(LabelDataTable $dataTable)
    {
        set_page_meta('Labels');
        return $dataTable->render('admin.label.index');
    }

    public function create()
    {
        set_page_meta('Create Label');
        return view('admin.label.create');
    }

    public function store(LabelRequest $request)
    {
        $data = $request->validated();

        try {

            $label = $this->labelService->storeOrUpdate($data, null);


            record_created_flash();
            return redirect()->route('admin.label.index');
        } catch (\Exception $e) {
        }
        return back();
    }

    public function edit($id)
    {
        try {
            set_page_meta('Edit Label');
            $label = $this->labelService->get($id);
            return view('admin.label.edit', compact('label'));
        } catch (\Exception $e) {
            log_error($e);
        }
        return back();
    }

    public function update(LabelRequest $request, $id)
    {
        $data = $request->validated();

        try {
            $this->labelService->storeOrUpdate($data, $id);

            record_updated_flash();
            return redirect()->route('admin.label.index');
        } catch (\Exception $e) {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $label = Label::find($id);
            $this->labelService->delete($id);
            record_deleted_flash();
            return back();
        } catch (\Exception $e) {
            return back();
        }
    }

    public function printLabels(){
        set_page_meta('Edit Label');
        $labels = Label::where('status','!=',GlobalConstant::STATUS_PRINTED)->get();
        return view('admin.label.print', compact('labels'));
    }
}
