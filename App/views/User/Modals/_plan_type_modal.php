<div class="modal fade" id="planTypeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="planTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="planTypeModalLabel">Invest</h5> <button type="button" class="btn-close"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/investment">
                    <div class="form-group">
                        <label class="form-label">Select Investment Type</label>
                        <div class="form-control-wrap">
                            <select id="planTypeSelect" name="type" class="js-select" data-search="true" data-sort="false">
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
            <div class="modal-footer"> <button type="button" class="btn btn-sm btn-secondary"
                    data-bs-dismiss="modal">Close</button> <button type="button"
                    class="btn btn-sm btn-primary">Understood</button> </div>
        </div>
    </div>
</div>

<!-- <script>
    // JavaScript to handle user interaction
    document.getElementById('investButton').addEventListener('click', function () {
        var selectedType = document.getElementById('planTypeSelect').value;
        // Redirect to /invest with the selected type as a parameter
        window.location.href = '/investment?type=' + selectedType;
    });
</script> -->