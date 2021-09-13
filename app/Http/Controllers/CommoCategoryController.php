<?php

namespace App\Http\Controllers;

use App\Models\CommoCategory;
use App\Models\CategoryGroup;
use App\Models\CommunicationCategory;
use Illuminate\Http\Request;
use App\Http\Requests\CommoCategoryRequest;

class CommoCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, CommoCategory $commocategories)
    {
        $total_commocategories = CommoCategory::count();
        $search = $request->get('search');

        if ($search != "") {
            $commocategories = CommoCategory::where('commo_code', 'LIKE', '%' . $search . '%')->latest()->paginate(10)->setPath('');
            if (isset($commocategories)) {
                $pagination = $commocategories->appends(array(
                    'search' => $request->get('search')
                ));
                if (count($commocategories) > 0) {
                    return view('references.c4s.commocategory.index', 
                    [
                        'total_commocategories' => $total_commocategories,
                        'commocategories' => $commocategories
                    ])
                    ->withStatus($commocategories)->withQuery($search);
                }
                $records = 'No';
                return view('references.c4s.commocategory.index', 
                [
                    'records' => $records, 
                    'total_commocategories' => $total_commocategories,
                    'commocategories' => $commocategories
                ])
                ->withStatus($commocategories)->withQuery($search);
            }
        }
        return view('references.c4s.commocategory.index', 
        [
            'total_commocategories' => $total_commocategories,
            'commocategories' => $commocategories->latest()->paginate(10)
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
        $categories = CommunicationCategory::get();
        return view('references.c4s.commocategory.create',compact('categorygroups','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommoCategoryRequest $request)
    {
        $this->validate($request, [
            'commo_code' => 'required|unique:c4s_commo_category,commo_code',
            'commo_category' => 'required',
            'commo_desc' => 'required',
            'category_group_id' => 'required',
            'category_id' => 'required',
        ]);

        $commocategories = CommoCategory::create([
            'commo_code' => $request->input('commo_code'),
            'commo_category' => $request->input('commo_category'),
            'commo_desc' => $request->input('commo_desc'),
            'category_group_id' => $request->input('category_group_id'),
            'category_id' => $request->input('category_id')
        ]);

        return redirect()->route('c4s commo category - create')->withStatus(__('Commo Category Successfully Created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommoCategory  $commoCategory
     * @return \Illuminate\Http\Response
     */
    public function show(CommoCategory $commoCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommoCategory  $commoCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(CommoCategory $commocategory)
    {
        $categorygroups = CategoryGroup::get();
        $categories = CommunicationCategory::get();
        $commocategory = CommoCategory::find($commocategory->id);
        return view('references.c4s.commocategory.edit',compact('categorygroups','categories','commocategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommoCategory  $commoCategory
     * @return \Illuminate\Http\Response
     */
    public function update(CommoCategoryRequest $request, CommoCategory $commocategory)
    {
        $this->validate($request, [
            'commo_code' => 'required',
            'commo_category' => 'required',
            'commo_desc' => 'required',
            'category_group_id' => 'required',
            'category_id' => 'required',
        ]);

        $commocategory = CommoCategory::find($commocategory->id);
        $commocategory->commo_code = $request->input('commo_code');
        $commocategory->commo_category = $request->input('commo_category');
        $commocategory->commo_desc = $request->input('commo_desc');
        $commocategory->category_group_id = $request->input('category_group_id');
        $commocategory->category_id = $request->input('category_id');
        $commocategory->save();

        return redirect()->route('c4s commo category')->withStatus(__('Commo Category Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommoCategory  $commoCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommoCategory $commocategory)
    {
        $commocategory->delete();
        return redirect()->route('c4s commo category')->withStatus(__('Commo Category Successfully Deleted.'));
    }
}
