<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editProductForm">
            <input type="hidden" class="form-control" id="editProductId" name="editProductId" required>
          <div class="form-group">
            <label for="editProductName">Product Name</label>
            <input type="text" class="form-control" id="editProductName" name="editProductName" required>
          </div>
          <div class="form-group">
            <label for="editProductQuantity">Quantity</label>
            <input type="number" class="form-control" id="editProductQuantity" name="editProductQuantity" required>
          </div>
          <div class="form-group">
            <label for="editProductPrice">Price per Unit</label>
            <input type="number" class="form-control" id="editProductPrice" name="editProductPrice" step="0.01" required>
          </div>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
