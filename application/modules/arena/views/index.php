<?= $fx_adds ?>
<div class="uk-container">
<div class="uk-space-xlarge"></div>
<div class="uk-grid uk-grid-large" data-uk-grid>
    <div class="uk-width-1-6@l"></div>
    <div class="uk-width-4-6@l">
    	<!-- 2v2 START -->
		<h3 class="uk-h3 uk-text-uppercase uk-text-bold {textcolor}"><i class="ra ra-arena"></i> {nav_arena_statistics}</h3>
        <span class="uk-label uk-text-bold uk-label-danger">{lang_2v2}</span>
        <ul uk-tab="connect: #2v2statistics; {uk-tab}">
            <?php foreach ($realms as $charsMultiRealm): ?>
                <li><a class="uk-text-bold {textcolor}"><span uk-icon="icon: server"></span> <?= $this->m_general->getRealmName($charsMultiRealm->realmID); ?></a></li>
            <?php endforeach ?>
        </ul>
        <ul id="2v2statistics" class="uk-switcher">
            <?php foreach ($realms as $charsMultiRealm):
                $multiRealm = $this->m_data->getRealmConnectionData($charsMultiRealm->id);
            ?>
                <li>
                    <table class="uk-table uk-table-responsive uk-table-divider">
                        <thead>
                            <tr>
                                <th class="uk-width-small {textcolor}"><i class="fas fa-sitemap"></i> {column_team_name}</th>
                                <th class="uk-width-small uk-text-center {textcolor}"><i class="fas fa-users"></i> {column_members}</th>
                                <th class="uk-width-small uk-text-center {textcolor}"><i class="fas fa-chart-line"></i> <?=$this->lang->line('column_rating');?></th>
                                <th class="uk-width-small uk-text-center {textcolor}"><i class="fas fa-chart-line"></i> <?=$this->lang->line('column_games');?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->arena_model->getTopArena2v2($multiRealm)->result() as $tops2v2): ?>
                                <tr>
                                    <td class="{textcolor}"><?=$tops2v2->name?></td>
                                    <td class="uk-text-center">
                                        <?php foreach ($this->arena_model->getMemberTeam($tops2v2->arenaTeamId, $multiRealm)->result() as $mmberteam): ?>
                                            <img class="uk-border-circle" src="<?= base_url('assets/images/class/').$this->m_general->getClassIcon($this->arena_model->getRaceGuid($mmberteam->guid, $multiRealm)) ?>" title="<?= $this->arena_model->getNameGuid($mmberteam->guid, $multiRealm) ?>"  width="30px" height="30px" uk-tooltip="pos: bottom">
                                        <?php endforeach ?>
                                    </td>
                                    <td class="uk-text-center {textcolor}"><?=$tops2v2->rating?></td>
                                    <td class="uk-text-center {textcolor}"><?=$tops2v2->seasonWins?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </li>
            <?php endforeach ?>
        </ul>
    	<!-- 2v2 END -->
    	<!-- 3v3 START -->
        <span class="uk-label uk-text-bold uk-label-warning">{lang_3v3}</span>
        <ul uk-tab="connect: #3v3statistics; {uk-tab}">
            <?php foreach ($this->m_data->getRealms()->result() as $charsMultiRealm): ?>
                <li><a class="uk-text-bold {textcolor}"><span uk-icon="icon: server"></span> <?= $this->m_general->getRealmName($charsMultiRealm->realmID); ?></a></li>
            <?php endforeach ?>
        </ul>
        <ul id="3v3statistics" class="uk-switcher">
            <?php foreach ($this->m_data->getRealms()->result() as $charsMultiRealm):
                $multiRealm = $this->m_data->getRealmConnectionData($charsMultiRealm->id);
            ?>
                <li>
                    <table class="uk-table uk-table-responsive uk-table-divider">
                        <thead>
                            <tr>
                                <th class="uk-width-small {textcolor}"><i class="fas fa-sitemap"></i> {column_team_name}</th>
                                <th class="uk-width-small uk-text-center {textcolor}"><i class="fas fa-users"></i> {column_members}</th>
                                <th class="uk-width-small uk-text-center {textcolor}"><i class="fas fa-chart-line"></i> {column_rating}</th>
                                <th class="uk-width-small uk-text-center {textcolor}"><i class="fas fa-chart-line"></i> <?=$this->lang->line('column_games');?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->arena_model->getTopArena3v3($multiRealm)->result() as $tops3v3): ?>
                                <tr>
                                    <td class="{textcolor}"><?=$tops3v3->name?></td>
                                    <td class="uk-text-center {textcolor}">
                                        <?php foreach ($this->arena_model->getMemberTeam($tops3v3->arenaTeamId, $multiRealm)->result() as $mmberteam): ?>
                                            <img class="uk-border-circle" src="<?= base_url('assets/images/class/').$this->m_general->getClassIcon($this->arena_model->getRaceGuid($mmberteam->guid, $multiRealm)) ?>" title="<?= $this->arena_model->getNameGuid($mmberteam->guid, $multiRealm) ?>"  width="30px" height="30px" uk-tooltip="pos: bottom">
                                        <?php endforeach ?>
                                    </td>
                                    <td class="uk-text-center {textcolor}"><?=$tops3v3->rating?></td>
                                    <td class="uk-text-center {textcolor}"><?=$tops3v3->seasonWins?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </li>
            <?php endforeach ?>
        </ul>
    	<!-- 3v3 END -->
    	<!-- 5v5 START -->
        <span class="uk-label uk-text-bold uk-label-success">{lang_5v5}</span>
        <ul uk-tab="connect: #5v5statistics; {uk-tab}">
            <?php foreach ($this->m_data->getRealms()->result() as $charsMultiRealm): ?>
                <li><a class="uk-text-bold {textcolor}"><span uk-icon="icon: server"></span> <?= $this->m_general->getRealmName($charsMultiRealm->realmID); ?></a></li>
            <?php endforeach ?>
        </ul>
        <ul id="5v5statistics" class="uk-switcher">
            <?php foreach ($this->m_data->getRealms()->result() as $charsMultiRealm):
                $multiRealm = $this->m_data->getRealmConnectionData($charsMultiRealm->id);
            ?>
                <li>
                    <table class="uk-table uk-table-responsive uk-table-divider">
                        <thead>
                            <tr>
                                <th class="uk-width-small {textcolor}"><i class="fas fa-sitemap"></i> {column_team_name}</th>
                                <th class="uk-width-small uk-text-center {textcolor}"><i class="fas fa-users"></i> {column_members}</th>
                                <th class="uk-width-small uk-text-center {textcolor}"><i class="fas fa-chart-line"></i> <?=$this->lang->line('column_rating');?></th>
                                <th class="uk-width-small uk-text-center {textcolor}"><i class="fas fa-chart-line"></i> <?=$this->lang->line('column_games');?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->arena_model->getTopArena5v5($multiRealm)->result() as $tops5v5): ?>
                                <tr>
                                    <td class="{textcolor}"><?=$tops5v5->name?></td>
                                    <td class="uk-text-center">
                                        <?php foreach ($this->arena_model->getMemberTeam($tops5v5->arenaTeamId, $multiRealm)->result() as $mmberteam): ?>
                                            <img class="uk-border-circle" src="<?= base_url('assets/images/class/').$this->m_general->getClassIcon($this->arena_model->getRaceGuid($mmberteam->guid, $multiRealm)) ?>" title="<?= $this->arena_model->getNameGuid($mmberteam->guid) ?>"  width="30px" height="30px" uk-tooltip="pos: bottom">
                                        <?php endforeach ?>
                                    </td>
                                    <td class="uk-text-center {textcolor}"><?=$tops5v5->rating?></td>
                                    <td class="uk-text-center {textcolor}"><?=$tops5v5->seasonWins?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </li>
            <?php endforeach ?>
        </ul>
    	<!-- 5v5 END -->
    </div>
    <div class="uk-width-1-6@l"></div>
</div>