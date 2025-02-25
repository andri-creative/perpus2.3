<!-- Modal -->
<div class="modal fade " id="edit{{ $rack->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
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
                <form action="{{ route('update.rak', $rack->id) }}" method="POST" class="row gy-3 ">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $rack->id }}">
                    <div class="col-12">
                        <label class="form-label">Code Category</label>
                        <input type="text" name="code_rack" class="form-control" placeholder="Input category code"
                            value="{{ $rack->code_rack }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Name Category</label>
                        <input type="text" name="name_rack" class="form-control" placeholder="Input category name"
                            value="{{ $rack->name_rack }}">
                    </div>
                    <div class="col-12">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary-600 text-white"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary-600 text-white">Update</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
