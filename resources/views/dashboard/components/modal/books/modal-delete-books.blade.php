<!-- Modal -->
<div class="modal fade " id="delete{{ $books->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-secondary-light " id="staticBackdropLabel">Delete Books</h1>
                <button type="button" class="btn-close text-secondary-light" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this item?</p>
            </div>
            <form action="{{ route('delete.books', $books->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger text-white" id="confirmDelete" ">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
