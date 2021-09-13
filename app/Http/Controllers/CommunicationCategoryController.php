<?php

namespace App\Http\Controllers;

use App\Models\CommunicationCategory;
use App\Models\CategoryGroup;
use Illuminate\Http\Request;
use App\Http\Requests\CommunicationCategoryRequest;

class CommunicationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, CommunicationCategory $communicationcategories)
    {
        $total_communicationcategories = CommunicationCategory::count();
        $search = $request->get('search');

        if ($search != "") {
            $communicationcategories = CommunicationCategory::where('category_code', 'LIKE', '%' . $search . '%')->latest()->paginate(10)->setPath('');
            if (isset($communicationcategories)) {
                $pagination = $communicationcategories->appends(array(
                    'search' => $request->get('search')
                ));
                if (count($communicationcategories) > 0) {
                    return view('references.c4s.category.index', 
                    [
                        'total_communicationcategories' => $total_communicationcategories,
                        'communicationcategories' => $communicationcategories
                    ])
                    ->withStatus($communicationcategories)->withQuery($search);
                }
                $records = 'No';
                return view('references.c4s.category.index', 
                [
                    'records' => $records, 
                    'total_communicationcategories' => $total_communicationcategories,
                    'communicationcategories' => $communicationcategories
                ])
                ->withStatus($communicationcategories)->withQuery($search);
            }
        }
        return view('references.c4s.category.index', 
        [
            'total_communicationcategories' => $total_communicationcategories,
            'communicationcategories' => $communicationcategories->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorygroups = CategoryGroup::get();
        return view('references.c4s.category.create',compact('categorygroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommunicationCategoryRequest $request)
    {
        $this->validate($request, [
            'category_code' => 'required|unique:c4s_category,category_code',
            'category_description' => 'required',
            'category_group_id' => 'required',
        ]);

        $communicationcategories = CommunicationCategory::create([
            'category_code' => $request->input('category_code'),
            'category_description' => $request->input('category_description'),
            'category_group_id' => $request->input('category_group_id')
        ]);

        return redirect()->route('c4s category - create')->withStatus(__('Category Successfully Created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommunicationCategory  $communicationCategory
     * @return \Illuminate\Http\Response
     */
    public function show(CommunicationCategory $communicationCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommunicationCategory  $communicationCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(CommunicationCategory $communicationcategory)
    {
        $categorygroups = CategoryGroup::get();
        $communicationcategory = CommunicationCategory::find($communicationcategory->id);
        return view('references.c4s.category.edit',compact('categorygroups','communicationcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommunicationCategory  $communicationCategory
     * @return \Illuminate\Http\Response
     */
    public function update(CommunicationCategoryRequest $request, CommunicationCategory $communicationcategory)
    {
        $this->validate($request, [
            'category_code' => 'required',
            'category_description' => 'required',
            'category_group_id' => 'required',
        ]);

        $communicationcategory = CommunicationCategory::find($communicationcategory->id);
        $communicationcategory->category_code = $request->input('category_code');
        $communicationcategory->category_description = $request->input('category_description');
        $communicationcategory->category_group_id = $request->input('category_group_id');
        $communicationcategory->save();

        return redirect()->route('c4s category')->withStatus(__('Category Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommunicationCategory  $communicationCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommunicationCategory $communicationcategory)
    {
        $communicationcategory->delete();
        return redirect()->route('c4s category')->withStatus(__('Category Successfully Deleted.'));
    }
}
