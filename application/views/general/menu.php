<div class="uk-position-top uk-width-1-1">
    <div class="uk-navbar-container uk-navbar-transparent" style="position: relative; z-index: 10;">
        <div class="uk-container">
            <nav class="uk-navbar" uk-navbar>
                <div class="uk-navbar-left">
                    <a href="<?= base_url(); ?>" class="uk-navbar-item uk-logo uk-margin-small-right" width="28" height="34"><?= $this->config->item('ProjectName'); ?></a>
                    <ul class="uk-navbar-nav uk-visible@m">
                        <?php foreach ($this->m_general->getMenu()->result() as $menulist): ?>
                            <?php if($this->m_permissions->getMyPermissions($menulist->permissions)): //permissions ?>
                                <?php if($menulist->father == '1'): ?>
                                    <li>
                                        <a href="<?= $menulist->url ?>" class="uk-text-white" <?= $menulist->extras ?>>
                                            <i class="<?= $menulist->icon ?>"></i>&nbsp;<?= $menulist->name ?>
                                        </a>
                                        <!-- -->
                                        <div class="uk-navbar-dropdown">
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                <?php foreach ($this->m_general->getMenuSon($menulist->id)->result() as $menusonlist): ?>
                                                    <li>
                                                        <a href="<?= $menusonlist->url ?>" <?= $menusonlist->extras ?>>
                                                            <i class="<?= $menusonlist->icon ?>"></i>&nbsp;<?= $menusonlist->name ?>
                                                        </a>
                                                    </li>
                                                <?php endforeach ?>
                                            </ul>
                                        </div>
                                        <!-- -->
                                    </li>
                                <?php elseif($menulist->father == '0' && $menulist->son == '0'): ?>
                                    <li>
                                        <a href="<?= $menulist->url ?>" class="uk-text-white" <?= $menulist->extras ?>>
                                            <i class="<?= $menulist->icon ?>"></i>&nbsp;<?= $menulist->name ?>
                                        </a>
                                    </li>
                                <?php endif ?>
                            <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="uk-navbar-right">
                    <ul class="uk-navbar-nav uk-visible@m">
                        <?php if (!$this->m_data->isLogged()) { ?>
                            <li><a href="#desk" class="uk-text-white" uk-toggle><span uk-icon="icon: user"></span><?= $this->lang->line('nav_account'); ?></a></li>
                        <?php } ?>
                        <?php if ($this->m_data->isLogged()) { ?>
                            <?php if ($this->m_modules->getMessages() == '1') { ?>
                            <?php if($this->m_permissions->getMyPermissions('Permission_Chat')) { //permissions ?>
                                <li><a href="#chat" class="uk-text-white" uk-tooltip="title: <?= $this->lang->line('nav_chat'); ?>; pos: left" uk-toggle><span uk-icon="icon: commenting"></span></a></li>
                            <?php } ?>
                            <?php } ?>
                            <li><a href="#desk" class="uk-text-white" uk-toggle><span uk-icon="icon: user"></span></a></li>
                        <?php } ?>
                    </ul>
                    <?php if ($this->m_data->isLogged()) { ?>
                        <?php if ($this->m_modules->getMessages() == '1') { ?>
                        <?php if($this->m_permissions->getMyPermissions('Permission_Chat')) { //permissions ?>
                            <a class="uk-navbar-toggle uk-hidden@m" href="#chat" uk-tooltip="title: <?= $this->lang->line('nav_chat'); ?>; pos: left" uk-toggle><span uk-icon="icon: commenting"></span></a></li>
                        <?php } ?>
                        <?php } ?>
                    <?php } ?>
                    <a class="uk-navbar-toggle uk-hidden@m" uk-navbar-toggle-icon href="#mobile" uk-toggle></a>
                    <div class="uk-offcanvas-content">
                        <div id="desk" uk-offcanvas="flip: true">
                            <div class="uk-offcanvas-bar">
                                <button class="uk-offcanvas-close" type="button" uk-close></button>
                                <div class="uk-panel">
                                    <ul class="uk-nav uk-nav-default">
                                        <li class="uk-nav-header uk-text-center"><span uk-icon="icon: user"></span><?= $this->lang->line('nav_account'); ?></li>
                                        <li class="uk-nav-divider"></li>
                                        <?php if (!$this->m_data->isLogged()) { ?>
                                            <?php if($this->m_modules->getStatusLogin() == '1') { ?>
                                                <li><a href="<?= base_url(); ?>login" class="uk-button uk-button-default uk-button-small uk-text-white"><span uk-icon="icon: sign-in"></span> <?= $this->lang->line('button_login'); ?></a></li>
                                            <?php } ?>
                                            <?php if($this->m_modules->getStatusRegister() == '1') { ?>
                                            <?php if($this->m_permissions->getMyPermissions('Permission_Register')) { //permissions ?>
                                                <li class="uk-text-center"><a href="<?= base_url('register'); ?>"><span uk-icon="icon: plus-circle"></span> <?= $this->lang->line('button_account_create'); ?></a></li>
                                            <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                        <?php if ($this->m_data->isLogged()) { ?>
                                            <li class="uk-text-center">
                                                <a href="<?= base_url('profile/'.$this->session->userdata('fx_sess_id')); ?>">
                                                    <?php if($this->m_general->getUserInfoGeneral($this->session->userdata('fx_sess_id'))->num_rows()) { ?>
                                                        <img class="uk-border-circle" src="<?= base_url('assets/images/profiles/').$this->m_data->getNameAvatar($this->m_data->getImageProfile($this->session->userdata('fx_sess_id'))); ?>" width="60" height="60" alt="" uk-tooltip="title: Profile; pos: right">
                                                    <?php } else { ?>
                                                        <img class="uk-border-circle" src="<?= base_url('assets/images/profiles/default.png'); ?>" width="60" height="60" alt="" uk-tooltip="title: Profile; pos: right">
                                                    <?php } ?>
                                                </a>
                                                <?= $this->session->userdata('fx_sess_username'); ?> #<?= $this->session->userdata('fx_sess_tag'); ?>
                                                <?php if($this->m_modules->getStatusUCP() == '1') { ?>
                                                <?php if($this->m_permissions->getMyPermissions('Permission_Panel')) { //permissions ?>
                                                    <a href="<?= base_url('panel'); ?>">
                                                        <button class="uk-button uk-button-primary"><i class="far fa-user-circle"></i> <?= $this->lang->line('button_user_panel'); ?></button>
                                                    </a>
                                                <?php } ?>
                                                <?php } ?>
                                            </li>
                                            <li class="uk-nav-divider"></li>
                                            <?php if($this->m_modules->getACP() == '1') { //i want use this module ?>
                                            <?php if($this->m_permissions->getMyPermissions('Permission_ACP')) { //permissions ?>
                                                <li><a href="<?= base_url('admin'); ?>"><span uk-icon="icon: cog"></span> <?= $this->lang->line('button_admin_panel'); ?></a></li>
                                            <?php } ?>
                                            <?php } ?>
                                            <?php if($this->m_modules->getStatusGifts() == '1') { ?>
                                                <li><a href="<?= base_url('user/gifts'); ?>"><span uk-icon="icon: cog"></span> <?= $this->lang->line('button_gifts'); ?></a></li>
                                            <?php } ?>
                                            <script>
                                                $(document).ready(function() {
                                                    $("#fx_logout").click(function(e) {
                                                        e.preventDefault();
                                                        $.ajax({
                                                            url: '<?= base_url('user/logout') ?>',
                                                            cache: false,
                                                            success:function(data) {
                                                                location.reload();
                                                            }
                                                        });
                                                    });
                                                });
                                            </script>
                                            <li><a href="#" id="fx_logout"><span uk-icon="icon: sign-out"></span> <?= $this->lang->line('button_logout'); ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- friends -->
                    <div class="uk-offcanvas-content">
                        <div id="chat" uk-offcanvas="flip: false">
                            <div class="uk-offcanvas-bar">
                                <button class="uk-offcanvas-close" type="button" uk-close></button>
                                <div class="uk-panel">
                                    <ul class="uk-nav uk-nav-default">
                                        <li class="uk-nav-header uk-text-center"><span uk-icon="icon: commenting"></span> <?= $this->lang->line('chat_header'); ?></li>
                                        <li class="uk-nav-divider"></li>
                                        <?php foreach ($this->m_data->getUsers()->result() as $users) { 
                                            if($users->id != $this->session->userdata('fx_sess_id')) {
                                        ?>
                                            <li class="uk-text-center">
                                                <img class="uk-border-circle" src="<?= base_url('assets/images/profiles/').$this->m_data->getNameAvatar($this->m_data->getImageProfile($users->profile)); ?>" width="25" height="25" alt=""/>
                                                <button class="uk-button uk-button-text" onclick="javascript:chatWith('<?= $users->id ?>','<?= $users->username ?>#<?= $this->m_data->getTag($users->id); ?>')"><?= $users->username ?>#<?= $this->m_data->getTag($users->id); ?></button>
                                            </li>
                                        <?php } } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- friends -->
                    <div class="uk-offcanvas-content">
                        <div id="mobile" uk-offcanvas="flip: true">
                            <div class="uk-offcanvas-bar">
                                <div class="uk-panel">
                                    <ul class="uk-nav uk-nav-default">
                                        <li class="uk-nav-header uk-text-center"><span uk-icon="icon: user"></span><?= $this->lang->line('nav_account'); ?></li>
                                        <li class="uk-nav-divider"></li>
                                        <?php if (!$this->m_data->isLogged()) { ?>
                                            <?php if($this->m_modules->getStatusLogin() == '1') { ?>
                                            <?php if($this->m_permissions->getMyPermissions('Permission_Login')) { //permissions ?>
                                                <li><a href="<?= base_url(); ?>login" class="uk-button uk-button-default uk-button-small uk-text-white"><span uk-icon="icon: sign-in"></span> <?= $this->lang->line('button_login'); ?></a></li>
                                            <?php } ?>
                                            <?php } ?>
                                            <?php if($this->m_modules->getStatusRegister() == '1') { ?>
                                            <?php if($this->m_permissions->getMyPermissions('Permission_Register')) { //permissions ?>
                                                <li class="uk-text-center"><a href="<?= base_url('register'); ?>"><span uk-icon="icon: plus-circle"></span> <?= $this->lang->line('button_account_create'); ?></a></li>
                                            <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                        <?php if ($this->m_data->isLogged()) { ?>
                                            <li class="uk-text-center">
                                                <a href="<?= base_url('profile/'.$this->session->userdata('fx_sess_id')); ?>">
                                                    <?php if($this->m_general->getUserInfoGeneral($this->session->userdata('fx_sess_id'))->num_rows()) { ?>
                                                        <img class="uk-border-circle" src="<?= base_url('assets/images/profiles/').$this->m_data->getNameAvatar($this->m_data->getImageProfile($this->session->userdata('fx_sess_id'))); ?>" width="60" height="60" alt="" uk-tooltip="title: Profile; pos: right">
                                                    <?php } else { ?>
                                                        <img class="uk-border-circle" src="<?= base_url('assets/images/profiles/default.png'); ?>" width="60" height="60" alt="" uk-tooltip="title: Profile; pos: right">
                                                    <?php } ?>
                                                </a>
                                                <?= $this->session->userdata('fx_sess_username'); ?> #<?= $this->session->userdata('fx_sess_tag'); ?>
                                                <?php if($this->m_modules->getStatusUCP() == '1') { ?>
                                                <?php if($this->m_permissions->getMyPermissions('Permission_Panel')) { //permissions ?>
                                                    <a href="<?= base_url('panel'); ?>">
                                                        <button class="uk-button uk-button-primary"><i class="far fa-user-circle"></i> <?= $this->lang->line('button_user_panel'); ?></button>
                                                    </a>
                                                <?php } ?>
                                                <?php } ?>
                                            </li>
                                            <li class="uk-nav-divider"></li>
                                            <?php if($this->m_modules->getACP() == '1') { //i want use this module ?>
                                            <?php if($this->m_permissions->getMyPermissions('Permission_ACP')) { //permissions ?>
                                                <li><a href="<?= base_url('admin'); ?>"><span uk-icon="icon: cog"></span> <?= $this->lang->line('button_admin_panel'); ?></a></li>
                                            <?php } ?>
                                            <?php } ?>
                                            <?php if($this->m_modules->getStatusGifts() == '1') { ?>
                                                <li><a href="<?= base_url('user/gifts'); ?>"><span uk-icon="icon: cog"></span> <?= $this->lang->line('button_gifts'); ?></a></li>
                                            <?php } ?>
                                            <script>
                                                $(document).ready(function() {
                                                    $("#fx_mobile_logout").click(function(e) {
                                                        e.preventDefault();
                                                        $.ajax({
                                                            url: '<?= base_url('user/logout') ?>',
                                                            cache: false,
                                                            success:function(data) {
                                                                location.reload();
                                                            }
                                                        });
                                                    });
                                                });
                                            </script>
                                            <li><a href="#" id="fx_mobile_logout"><span uk-icon="icon: sign-out"></span> <?= $this->lang->line('button_logout'); ?></a></li>
                                        <?php } ?>
                                        <li class="uk-nav-header uk-text-center"><span uk-icon="icon: world"></span>Navigation</li>
                                        <li class="uk-nav-divider"></li>
                            <?php foreach ($this->m_general->getMenu()->result() as $menulist): ?>
                                <?php if($this->m_permissions->getMyPermissions($menulist->permissions)): //permissions ?>
                                    <?php if($menulist->father == '1'): ?>
                                        <li class="uk-parent">
                                            <a href="<?= $menulist->url ?>" class="uk-text-white" <?= $menulist->extras ?>>
                                                <i class="<?= $menulist->icon ?>"></i>&nbsp;<?= $menulist->name ?>
                                            </a>
                                            <ul class="uk-nav-sub">
                                                <?php foreach ($this->m_general->getMenuSon($menulist->id)->result() as $menusonlist): ?>
                                                    <li>
                                                        <a href="<?= $menusonlist->url ?>" <?= $menusonlist->extras ?>>
                                                            <i class="<?= $menusonlist->icon ?>"></i>&nbsp;<?= $menusonlist->name ?>
                                                        </a>
                                                    </li>
                                                <?php endforeach ?>
                                            </ul>
                                        </li>
                                        <?php elseif($menulist->father == '0' && $menulist->son == '0'): ?>
                                        <li class="uk-parent">
                                            <a href="<?= $menulist->url ?>" class="uk-text-white" <?= $menulist->extras ?>>
                                                <i class="<?= $menulist->icon ?>"></i>&nbsp;<?= $menulist->name ?>
                                            </a>
                                        </li>
                                    <?php endif ?>
                                <?php endif ?>
                            <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
