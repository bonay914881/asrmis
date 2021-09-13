<?php

namespace App\Http\Controllers;

use App\Models\CategoryGroup;
use App\Models\AuditTrail;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryGroupRequest;

class CategoryGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, CategoryGroup $categorygroups)
    {
        $total_categorygroups = CategoryGroup::count();
        $search = $request->get('search');

        if ($search != "") {
            $categorygroups = CategoryGroup::where('category_group_code', 'LIKE', '%' . $search . '%')->latest()->paginate(10)->setPath('');
            if (isset($categorygroups)) {
                $pagination = $categorygroups->appends(array(
                    'search' => $request->get('search')
                ));
                if (count($categorygroups) > 0) {
                    return view('references.c4s.categorygroup.index', 
                    [
                        'total_categorygroups' => $total_categorygroups,
                        'categorygroups' => $categorygroups
                    ])
                    ->withStatus($categorygroups)->withQuery($search);
                }
                $records = 'No';
                return view('references.c4s.categorygroup.index', 
                [
                    'records' => $records, 
                    'total_categorygroups' => $total_categorygroups,
                    'categorygroups' => $categorygroups
                ])
                ->withStatus($categorygroups)->withQuery($search);
            }
        }
        return view('references.c4s.categorygroup.index', 
        [
            'total_categorygroups' => $total_categorygroups,
            'categorygroups' => $categorygroups->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('references.c4s.categorygroup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryGroupRequest $request)
    {
        $this->validate($request, [
            'category_group_code' => 'required|unique:c4s_category_group,category_group_code',
            'category_group_desc' => 'required',
        ]);

        $category_group_code = $request->input('category_group_code');
        $category_group_desc = $request->input('category_group_desc');

        $permissions = CategoryGroup::create([
            'category_group_code' => $category_group_code,
            'category_group_desc' => $category_group_desc
        ]);

        $audittrails = AuditTrail::create([
            'user_id' => $request->input('user_id'),
            'action' => $request->input('action'),
            'remarks' => "Added a record with the fields of <font class='text-danger'>$category_group_code</font> and <font class='text-danger'>$category_group_desc</font>"
        ]);

        return redirect()->route('c4s category group - create')->withStatus(__('Category Group Successfully Created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryGroup  $categoryGroup
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryGroup $categoryGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryGroup  $categoryGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryGroup $categorygroup)
    {
        $categorygroup = CategoryGroup::find($categorygroup->id);

        return view('references.c4s.categorygroup.edit',compact('categorygroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryGroup  $categoryGroup
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryGroupRequest $request, CategoryGroup $categorygroup)
    {
        $this->validate($request, [
            'category_group_code' => 'required',
            'category_group_desc' => 'required',
        ]);

        $prev_value_category_group_code = $request->input('prev_value_category_group_code');
        $prev_value_category_group_desc = $request->input('prev_value_category_group_desc');

        $category_group_code = $request->input('category_group_code');
        $category_group_desc = $request->input('category_group_desc');

        $categorygroup = CategoryGroup::find($categorygroup->id);
        $categorygroup->category_group_code = $category_group_code;
        $categorygroup->category_group_desc = $category_group_desc;
        $categorygroup->save();

        $audittrails = AuditTrail::create([
            'user_id' => $request->input('user_id'),
            'action' => $request->input('action'),
            'remarks' => "Updated a record from the fields of <font class='text-danger'>$prev_value_category_group_code</font> to <font class='text-success'>$category_group_code</font> and <font class='text-danger'>$prev_value_category_group_desc</font> to <font class='text-success'>$category_group_desc</font>"
        ]);

        return redirect()->route('c4s category group')->withStatus(__('Category Group Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryGroup  $categoryGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CategoryGroup $categorygroup)
    {
        $category_group_code = $request->input('category_group_code');
        $category_group_desc = $request->input('category_group_desc');

        $audittrails = AuditTrail::create([
            'user_id' => $request->input('user_id'),
            'action' => $request->input('action'),
            'remarks' => "Deleted a record with the fields of <font class='text-danger'>$category_group_code</font> and <font class='text-danger'>$category_group_desc</font>"
        ]);

        CategoryGroup::where('id', $categorygroup->id)->delete();
        return redirect()->route('c4s category group')->withStatus(__('Category Groups Successfully Deleted.'));
    }
}
