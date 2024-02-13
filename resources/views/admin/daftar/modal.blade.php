  <!-- Verification Modal -->
  <div class="modal fade" id="verificationModal" tabindex="-1"
  aria-labelledby="verificationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="verificationModalLabel">
                  Verification Confirmation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close"></button>
          </div>
          <div class="modal-body">
              Are you sure you want to verify this registration?
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary"
                  data-bs-dismiss="modal">Close</button>
              {{-- <a href="{{ route('admin.daftar.verify', $registration->id) }}"
          class="btn btn-success">Verify</a> --}}
          </div>
      </div>
  </div>
</div>


<!-- Rejection Modal -->

<div class="modal fade" id="rejectionModal" tabindex="-1"
  aria-labelledby="rejectionModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="rejectionModalLabel">
                  Rejection
                  Confirmation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close"></button>
          </div>
          <div class="modal-body">
              Are you sure you want to reject this registration?
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary"
                  data-bs-dismiss="modal">Close</button>
              {{-- <a href="{{ route('admin.daftar.reject', $registration->id) }}" class="btn btn-danger">Reject</a> --}}
          </div>
      </div>
  </div>
</div>

<!-- Cancellation Modal -->
<div class="modal fade" id="cancellationModal" tabindex="-1"
  aria-labelledby="cancellationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="rejectionModalLabel">
                  Rejection
                  Confirmation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close"></button>
          </div>
          <div class="modal-body">
              Are you sure you want to reject this registration?
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary"
                  data-bs-dismiss="modal">Close</button>
              {{-- <a href="{{ route('admin.daftar.reject', $registration->id) }}" class="btn btn-danger">Reject</a> --}}
          </div>
      </div>
  </div>
</div>
