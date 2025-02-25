<!-- Modal -->
<div class="modal fade " id="edit{{ $cas->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog bg-neutral-500 bg-neutral-500 ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Category
                    Edit</h1>
                <button type="button" class="btn-close text-secondary-light" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update.category', $cas->id) }}" method="POST" class="row gy-3 ">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $cas->id }}">
                    <div class="col-12">
                        <label class="form-label">Code Category</label>
                        <input type="text" name="code_category" class="form-control"
                            placeholder="Input category code" value="{{ $cas->code_category }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Name Category</label>
                        <input type="text" name="name_category" class="form-control"
                            placeholder="Input category name" value="{{ $cas->name_category }}">
                    </div>
                    <div class="col-12">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary-600 text-white" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary-600 text-white">Update</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
