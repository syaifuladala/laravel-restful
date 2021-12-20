<!-- Button trigger modal -->
<button type="button" id="modal-button" class="modal-button btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah Order
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_cust" id="id_cust" value="">
                <div class="mb-3">
                    <label for="cust_name" class="form-label">Customer</label>
                    <input type="text" class="form-control" name="cust_name" id="cust_name" value="" data-val="true">
                </div>
                <script>
                    document.getElementById("cust_name").innerHTML = window.localStorage['custname'];
                </script>
                <div class="mb-3">
                    <label for="product_id" class="form-label">Produk</label>
                    <select class="form-select" name="product_id" id="product_id"></select>
                </div>
                <div class="mb-3">
                    <label for="qty" class="form-label">Jumlah</label>
                    <input type="number" name="qty" id="" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="simpan" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script src="{{ url('/assets/pages/modalorder.js') }}"></script>