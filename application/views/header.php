<!DOCTYPE html>
<html>
<head>
    <title><?= $this->config->item('ProjectName'); ?> | <?= $fxtitle ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/images/favicon.ico'); ?>">

    <!-- UIkit -->
    <link rel="stylesheet" href="<?= base_url('core/uikit/css/uikit.min.css'); ?>"/>
    <script src="<?= base_url('core/uikit/js/uikit.min.js'); ?>"></script>
    <script src="<?= base_url('core/uikit/js/uikit-icons.min.js'); ?>"></script>

    <!-- Font Awesome and Rpg Awesome -->
    <script defer src="<?= base_url('core/fontawesome/js/all.js'); ?>"></script>
    <link rel="stylesheet" href="<?=base_url('core/rpg_awesome/css/rpg-awesome.css')?>">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('core/css/blizzcms-general.css'); ?>">
    <link rel="stylesheet" type="text/css" media="all" href="<?= base_url('theme/'); ?><?= $this->config->item('theme_name'); ?>/css/<?= $this->config->item('theme_name'); ?>.css"/>

    <!-- Wowhead -->
    <script>var whTooltips = {colorLinks: true, iconizeLinks: false, renameLinks: false};</script>
    <script type="text/javascript" src="//wow.zamimg.com/widgets/power.js"></script>

    <!-- JQuery -->
    <script src="<?= base_url('core/js/jquery-3.3.1.min.js'); ?>"></script>

    <?php if($this->m_data->isLogged()) { ?>
        <link type="text/css" rel="stylesheet" media="all" href="<?= base_url('assets/chat/css/chat/chat.css') ?>" />
        <link type="text/css" rel="stylesheet" media="all" href="<?= base_url('assets/chat/css/chat/screen.css') ?>" />
        <script type="text/javascript" src="<?= base_url('assets/chat/js/chat/jquery.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/chat/js/chat/chat.js') ?>"></script>
    <?php } ?>

    <!-- notify -->
    <link rel="stylesheet" href="<?= base_url('core/amaranjs/dist/css/amaran.min.css') ?>">
    <script src="<?= base_url('core/amaranjs/dist/js/jquery.amaran.min.js') ?>"></script>

    <link rel="stylesheet" href="<?= base_url('core/cookieconsent/css/cookieconsent.min.css') ?>"/>
    <script type="text/javascript" src="<?= base_url('core/cookieconsent/js/cookieconsent.min.js') ?>"></script>
    <script>
    window.addEventListener("load", function(){
    window.cookieconsent.initialise({
      "palette": {
        "popup": {
          "background": "#252e39"
        },
        "button": {
          "background": "#14a7d0"
        }
      },
      "theme": "edgeless",
      "position": "bottom-right",
      "content": {
        "message": "This website uses cookies to ensure you get the best experience on our website. ",
        "dismiss": "Got it!",
        "link": "Learn more",
        "href": "<?= base_url(); ?>cookies"
      }
    })});
    </script>
    <!-- Page loader -->
    <link href="<?= base_url('core/pageloader/pace-theme-minimal.tmpl.css'); ?>" rel="stylesheet" />
    <script src="<?= base_url('core/pageloader/pace.min.js'); ?>"></script>
</head>

<body class="<?= $this->config->item('theme_name'); ?>">

<?php $this->load->view('general/menu'); ?>