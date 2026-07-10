<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Yakin ingin menghapus <strong id="deleteItemName"></strong>? Data yang sudah dihapus tidak dapat
                    dikembalikan.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

@once
    @push('script')
        <script>
            document.addEventListener('click', function (event) {
                const btn = event.target.closest('.btn-delete');
                if (!btn) return;

                document.getElementById('deleteForm').action = btn.dataset.url;
                document.getElementById('deleteItemName').textContent = btn.dataset.name;
                new bootstrap.Modal(document.getElementById('deleteModal')).show();
            });
        </script>
    @endpush
@endonce
