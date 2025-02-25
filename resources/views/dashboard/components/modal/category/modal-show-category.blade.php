<!-- Modal -->
<div class="modal fade " id="show{{ $cas->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog bg-neutral-500 bg-neutral-500 ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-secondary-light " id="staticBackdropLabel">Category
                    Show</h1>
                <button type="button" class="btn-close text-secondary-light" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>ID:</strong> {{ $cas->id }}</p>
                <p><strong>Code Category:</strong> {{ $cas->code_category }}</p>
                <p><strong>Nama Category:</strong> {{ $cas->name_category }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary-600 text-white" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
