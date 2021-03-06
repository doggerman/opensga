<?php
    $this->BreadCumbs->addCrumb('Alunos', '/alunos');
    $this->BreadCumbs->addCrumb('Lista de Alunos', '/alunos/index');

?>

<div class="row">
    <?php echo $this->fetch('top-actions'); ?>
    <div class="col-md-12">
        <!-- start: DYNAMIC TABLE PANEL -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="icon-external-link-sign"></i>
                Matriculados por Ano
                <div class="panel-tools">
                    <a href="#" class="btn btn-xs btn-link panel-collapse collapses">
                    </a>
                    <a data-toggle="modal" href="#panel-config" class="btn btn-xs btn-link panel-config">
                        <i class="icon-wrench"></i>
                    </a>
                    <a href="#" class="btn btn-xs btn-link panel-refresh">
                        <i class="icon-refresh"></i>
                    </a>
                    <a href="#" class="btn btn-xs btn-link panel-expand">
                        <i class="icon-resize-full"></i>
                    </a>
                    <a href="#" class="btn btn-xs btn-link panel-close">
                        <i class="icon-remove"></i>
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <div role="grid" class="dataTables_wrapper form-inline" id="tabelaAjax2">

                    <table id="tabela-ajax"
                           class="table table-striped table-bordered table-hover table-full-width dataTable">
                        <thead>

                        <tr>
                            <th>Ano Lectivo</th>
                            <th>Novos Ingressos</th>
                            <th>Renovacao de Matricula</th>
                            <th>Reingressos</th>
                        </tr>

                        </thead>
                        <tbody>
                        <?php foreach ($matriculas as $ano => $matricula) { ?>
                            <tr>
                                <td><?php echo $ano ?></td>
                                <?php foreach ($matricula as $m) { ?>
                                    <td><?php echo $m[0]['total'] ?></td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                </div>
                <div class="demo-container">
                    <div id="placeholder" class="demo-placeholder" width="800px" height="200px"
                         style="height: 300px"></div>
                </div>
            </div>
        </div>
        <!-- end: DYNAMIC TABLE PANEL -->
    </div>
</div>


