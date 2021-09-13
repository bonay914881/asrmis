
<div class="modal" id="deleteCategoryGroup{{ $categorygroup->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form method="post" action="{{ route('categorygroups.destroy',$categorygroup) }}">	
                @csrf
                @method('delete')
                
                <div class="modal-body text-center mb--4">
                    <div class="py-3 text-center">
                        <i class="fas fa-trash text-danger fa-5x"></i>
                    </div>

                    <p class="mt-5">
                        Are you sure you want to Delete<br />
                        <font style="font-weight: 900;"><b>{{ $categorygroup->category_group_code }}</b></font>?
                    </p>
                    <input type="hidden" name="category_group_code" value="{{ $categorygroup->category_group_code }}">
                    <input type="hidden" name="category_group_desc" value="{{ $categorygroup->category_group_desc }}">
                    <input type="hidden" name="action" value="DELETE">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                </div><hr />

                <div class="modal-footer mt--4 mb-2">
                    <div class="left-side">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                    <div class="divider"></div>
                    <div class="right-side">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
