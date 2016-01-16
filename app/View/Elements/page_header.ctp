<div class="row">
    <div class="col-sm-6">
        <!-- start: PAGE TITLE & BREADCRUMB -->
        <?php
            echo $this->BreadCumbs->getCrumbList(['class' => 'breadcrumb'], [
                'text'   => '<li>
                            <i class="clip-home-3"></i>
                            <a href="#">
                                Home
                            </a>
                        </li>',
                'url'    => '/',
                'escape' => false
            ]);
        ?>

    </div>
    <div class="col-sm-6 text-right">
        <ul class="breadcrumb">
            <li>Ano Lectivo: <?php echo Configure::read('OpenSGA.ano_lectivo') ?></li>
            <li>Semestre Lectivo: <?php echo Configure::read('OpenSGA.semestre_lectivo') ?></li>
            <li><a onclick="$zopim(function() {
    $zopim.livechat.window.show();
  });"><i class="fa  fa-wrench fa-2x" style="color:red"></i><b>Ajuda/Suporte</b></a></li>

        </ul>

    </div>
    <div class="col-sm-12">
        <?php if (isset($siga_page_title)) { ?>
            <div class="page-header">
                <h1><?php echo $siga_page_title ?>
                    <small><?php echo $siga_page_overview ?></small>
                </h1>
            </div>
        <?php } ?>
        <!-- end: PAGE TITLE & BREADCRUMB -->
    </div>
</div>