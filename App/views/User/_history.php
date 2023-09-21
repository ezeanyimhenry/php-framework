
<div class="nk-content">
            <div class="container">
              <div class="nk-content-inner">
                <div class="nk-content-body">
                  <div class="nk-block-head nk-page-head">
                    <div class="nk-block-head-content">
                      <h1 class="nk-block-title">History</h1>
                      <p>
                        A list of all Transaction History
                      </p>
                    </div>
                  </div>
                  <div class="nk-block">
                    <div class="nk-block-head">
                      <div class="nk-block-head-content">
                        <h3 class="nk-block-title">All History</h3>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-body">
                        <table
                          class="datatable-init table"
                          data-nk-container="table-responsive table-border"
                        >
                          <thead>
                            <tr>
                              <th><span class="overline-title">Date</span></th>
                              <th>
                                <span class="overline-title">Activity</span>
                              </th>
                              <th>
                                <span class="overline-title">Amount</span>
                              </th>
                              <th><span class="overline-title">Fiat</span></th>
                              <th>
                                <span class="overline-title">Description</span>
                              </th>
                              <th>
                                <span class="overline-title">Status</span>
                              </th>
                            </tr>
                          </thead>
                          <tbody>

                          <?php foreach ($activities as $activity): ?>
                            <tr>
                              <td><?= $activity['create_time'] ?></td>
                              <td><?= $activity['activity_type'] ?></td>
                              <td><?= $activity['amount'] ?></td>
                              <td><?= $activity['fiat'] ?></td>
                              <td><?= $activity['description'] ?></td>
                              <td><?= $activity['status'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                           
                           
                          </tbody>
                        </table>
                        
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>