<?= $tiny ?>
<?= $fx_adds ?>
        <div class="uk-space-xlarge"></div>
        <div class="uk-grid uk-grid-large" data-uk-grid>
            <div class="uk-width-1-6@l"></div>
            <div class="uk-width-4-6@l">
                <div class="uk-principal-title uk-text-white"><i class="fas fa-bug"></i> <?= $this->lang->line('nav_bugtracker'); ?></div>
                <?php if ($this->m_data->isLogged()) { ?>
                    <span class="uk-align-right">
                        <a href="#" class="uk-button uk-button-primary" uk-toggle="target: #createReport"><i class="fas fa-pencil-alt"></i> <?= $this->lang->line('button_create_report'); ?></a>
                    </span>
                <?php } ?>
                <p class="uk-text-uppercase uk-text-bold uk-text-white"><?= $this->lang->line('bugtracker_report_list'); ?></p>
                <div class="uk-overflow-auto uk-width-1-1 uk-margin-small">
                  <table class="uk-table uk-table-divider">
                    <thead>
                      <tr>
                        <th class="uk-text-white"><i class="fas fa-book"></i> <?=$this->lang->line('column_id'); ?></th>
                        <th class="uk-text-center uk-text-white"><i class="fas fa-bookmark"></i> <?= $this->lang->line('form_title'); ?></th>
                        <th class="uk-text-center uk-text-white"><i class="fas fa-list"></i> <?= $this->lang->line('form_type'); ?></th>
                        <th class="uk-text-center uk-text-white"><i class="fas fa-info-circle"></i> <?= $this->lang->line('column_status'); ?></th>
                        <th class="uk-text-center uk-text-white"><i class="fas fa-exclamation-circle"></i> <?= $this->lang->line('column_priority'); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(isset($bugtrackerList) && !empty($bugtrackerList)) { ?>
                      <?php foreach($bugtrackerList as $tracker) { ?>
                        <tr>
                          <td>
                            <a href="<?= base_url('bugtracker/post/'.$tracker->id); ?>">
                              <?= $tracker->id ?>
                            </a>
                          </td>
                          <td class="uk-text-center">
                            <a href="<?= base_url('bugtracker/post/'.$tracker->id); ?>">
                                <?= $tracker->title ?>
                            </a>
                          </td>
                          <td class="uk-text-center">
                            <a href="<?= base_url('bugtracker/post/'.$tracker->id); ?>">
                                <span class="uk-label"><?= $this->bugtracker_model->getType($tracker->type); ?></span>
                            </a>
                          </td>
                          <td class="uk-text-center">
                            <a href="<?= base_url('bugtracker/post/'.$tracker->id); ?>">
                                <?php if ($tracker->status == 1 || $tracker->status == 8 || $tracker->status == 3) { ?>
                                <span class="uk-label uk-label-success"><?= $this->bugtracker_model->getStatus($tracker->status); ?></span>
                                <?php } else if($tracker->status == 2 || $tracker->status == 5 || $tracker->status == 6) { ?>
                                <span class="uk-label uk-label-warning"><?= $this->bugtracker_model->getStatus($tracker->priority); ?></span>
                                <?php } else { ?>
                                <span class="uk-label uk-label-danger"><?= $this->bugtracker_model->getStatus($tracker->priority); ?></span>
                                <?php } ?>
                            </a>
                          </td>
                          <td class="uk-text-center">
                            <a href="<?= base_url('bugtracker/post/'.$tracker->id); ?>">
                                <?php if ($tracker->priority == 1) { ?>
                                <span class="uk-label uk-label-danger"><?= $this->bugtracker_model->getPriority($tracker->priority); ?></span>
                                <?php } else if($tracker->priority == 2) { ?>
                                <span class="uk-label uk-label-warning"><?= $this->bugtracker_model->getPriority($tracker->priority); ?></span>
                                <?php } else { ?>
                                <span class="uk-label uk-label-success"><?= $this->bugtracker_model->getPriority($tracker->priority); ?></span>
                                <?php } ?>
                            </a>
                          </td>
                        </tr>
                      <?php } ?>
                      <?php } else { ?>
                        <tr>
                          <td class="uk-text-warning uk-text-bold"><i class="fas fa-exclamation-circle"></i> <?= $this->lang->line('bugtracker_report_notfound'); ?></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div> 
                <div class="uk-text-right">
                  <?php if (isset($bugtrackerList) && is_array($bugtrackerList)) echo $pagination_links; ?>
                </div>
            </div>
            <div class="uk-width-1-6@l"></div>
        </div>
