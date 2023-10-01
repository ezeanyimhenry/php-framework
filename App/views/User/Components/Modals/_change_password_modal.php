<div class="modal fade" id="changePasswordModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/change-password">
                    <div class="mb-3">
                        <label class="text-label form-label" for="old-password">Old Password <span
                                class="required">*</span></label>
                        <div class="input-group transparent-append">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            <input type="password" class="form-control" id="old-password" name="old_password"
                                placeholder="input old password.." required>
                            <div class="invalid-feedback">
                                Please Enter old Password.
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="text-label form-label" for="dlab-password">New Password <span
                                class="required">*</span></label>
                        <div class="input-group transparent-append">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            <input type="password" class="form-control" id="dlab-password" name="new_password"
                                placeholder="Choose a safe one.." required>
                            <span class="input-group-text show-pass border-left-end">
                                <i class="fa fa-eye-slash"></i>
                                <i class="fa fa-eye"></i>
                            </span>
                            <div class="invalid-feedback">
                                Please Enter old Password.
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="changePassword" class="btn btn-primary"
                        id="changePassword">Change Password</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>