<div class="modal fade" id="planTypeModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Invest</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/investment">
                    <div class="form-group">
                        <label class="form-label">Select Investment Type</label>
                        <div class="form-control-wrap">
                            <select id="planTypeSelect" name="type" class="default-select form-control wide mb-3">
                                <?php foreach ($planTypes as $type): ?>
                                    <option value="<?= $type['name'] ?>">
                                        <?= $type['name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" name="investButton" class="btn btn-primary" id="investButton">Invest</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>