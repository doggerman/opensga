<?php
    /**
     * OpenSGA - Sistema de Gest�o Acad�mica
     *   Copyright (C) 2010-2011  INFOmoz (Inform�tica-Mo�ambique)
     *
     * Este programa � um software livre: Voc� pode redistribuir e/ou modificar
     * todo ou parte deste programa, desde que siga os termos da licen�a por nele
     * estabelecidos. Grande parte do c�digo deste programa est� sob a licen�a
     * GNU Affero General Public License publicada pela Free Software Foundation.
     * A vers�o original desta licen�a est� dispon�vel na pasta raiz deste software.
     *
     * Este software � distribuido sob a perspectiva de que possa ser �til para
     * satisfazer as necessidades dos seus utilizadores, mas SEM NENHUMA GARANTIA. Veja
     * os termos da licen�a GNU Affero General Public License para mais detalhes
     *
     * As redistribui��es deste software, mesmo quando o c�digo-fonte for modificado significativamente,
     * devem manter est� informa��o legal, assim como a licen�a original do software.
     *
     * @copyright     Copyright 2010-2011, INFOmoz (Inform�tica-Mo�ambique) (http://infomoz.net)
     ** @link          http://opensga.com OpenSGA  - Sistema de Gestão Académica
     * @author          Elisio Leonardo (elisio.leonardo@gmail.com)
     * @package       opensga
     * @subpackage    opensga.core.controller
     * @since         OpenSGA v 0.10.0.0
     *
     */
?>

<?php //include('menu.ctp'); $grupo = $this->Session->read('Auth.User.group_id');?>

<div class="projectos form" id="center-column">
    <div class="top-bar">
        <?php echo $this->Html->link(sprintf(__('Lancamento de Notas', true)), ['action' => 'registo_de_notas'],
                ['class' => 'button']); ?>
        <h1><?php echo __('Avaliacoes - Lancamento de Notas'); ?></h1>

    </div>
    <div class="table">
        <img src="/sistema/img/ajax-loader.gif" style="display:none" id="ajax-loader">
        <?php echo $this->Form->create('Avaliacaos'); ?>
        <table class="listingform" cellpadding="0" cellspacing="0">
            <tr>
                <th class="full" colspan="2">Lancamento de Notas das Avaliacoes</th>
            </tr>
            <?php

                echo $this->Form->input('tal', [
                        'disabled' => 'true',
                        'value'    => $ano_lectivo_codigo,
                        'label'    => 'Ano Lectivo',
                        'before'   => '<tr><td>',
                        'between'  => '</td><td>',
                        'after'    => '</td></tr>',
                        'div'      => false,
                        'id'       => 'anolectivoid',
                ]);

                echo $this->Form->input('tc', [
                        'disabled' => 'true',
                        'value'    => $curso_name,
                        'size'     => '50',
                        'label'    => 'Curso',
                        'before'   => '<tr><td>',
                        'between'  => '</td><td>',
                        'after'    => '</td></tr>',
                        'div'      => false,
                        'id'       => 'cursoid',
                ]);

                echo $this->Form->input('tp', [
                        'disabled' => 'true',
                        'value'    => $plano_name,
                        'label'    => 'Plano de estudo',
                        'before'   => '<tr><td>',
                        'between'  => '</td><td>',
                        'after'    => '</td></tr>',
                        'id'       => 'planoid',
                        'div'      => false,
                ]);

                echo $this->Form->input('tt', [
                        'disabled' => 'true',
                        'value'    => $turma_name,
                        'size'     => '50',
                        'label'    => 'Turma',
                        'before'   => '<tr><td>',
                        'between'  => '</td><td>',
                        'after'    => '</td></tr>',
                        'div'      => false,
                        'id'       => 'turma',
                ]);


                echo $this->Form->input('tea', [
                        'disabled' => 'true',
                        'value'    => $epoca_avalicao1,
                        'label'    => 'Epoca de Avaliacao',
                        'before'   => '<tr><td>',
                        'between'  => '</td><td>',
                        'after'    => '</td></tr>',
                        'div'      => false,
                ]);

                echo $this->Form->input('tea', [
                        'disabled' => 'true',
                        'value'    => $tipoavaliacao2,
                        'label'    => 'Epoca de Avaliacao',
                        'before'   => '<tr><td>',
                        'between'  => '</td><td>',
                        'after'    => '</td></tr>',
                        'div'      => false,
                ]);

            ?>
            <tr>
                <td></td>
                <td><?php //echo $this->Form->end(__('SEGUINTE', true));?></form></td>
            </tr>
        </table>
        <br/>
        <br/>

    </div>


    <div class="table">
        <img src="/sistema/img/ajax-loader.gif" style="display:none" id="ajax-loader">
        <?php echo $this->Form->create('Avaliacaos'); ?>
        <table cellpadding="0" cellspacing="0" class="listing">
            <tr>

                <th><?php echo 'Codigo do aluno'; ?></th>
                <th><?php echo 'Nome do Aluno'; ?></th>
                <th><?php echo 'Nota de ' . $tipoavaliacao2; ?></th>
                <th><?php echo 'Estado da Inscricao'; ?></th>
            </tr>
            <?php
                $estado = "";
                foreach ($alunosByTurma as $alunos):
                    //var_dump($alunos);
                    $class = null;
                    $i = 0;
                    if ($i++ % 2 == 0) {
                        $class = ' class="altrow"';
                    }
                    if ($alunos['ti']['tg0020estadoinscricao_id'] == 1) {
                        $estado = "inscrito";
                    }
                    if ($alunos['ti']['tg0020estadoinscricao_id'] == 2) {
                        $estado = "Aprovado";
                    }
                    if ($alunos['ti']['tg0020estadoinscricao_id'] == 3) {
                        $estado = "Reprovado";
                    }
                    if ($alunos['ti']['tg0020estadoinscricao_id'] == 4) {
                        $estado = "Cancelada";
                    }
                    if ($alunos['ti']['tg0020estadoinscricao_id'] == 5) {
                        $estado = "Anulada";
                    }
                    // var_dump($controle_epoca);
                    //var_dump($datahora);
                    if ($controle_epoca < $datahora || $grupo == 3) {
                        $status = 1;
                    }
                    ?>
                    <tr <?php echo $class; ?>>
                        <td><?php echo $alunos['ta']['codigo']; ?>&nbsp;</td>
                        <td><?php echo $alunos['ta']['name']; ?>&nbsp;</td>
                        <?php echo $this->Form->input('notas.' . $alunos['ta']['codigo'] . '.t0013inscricao_id',
                                ['value' => $alunos['ti']['id'], 'type' => 'hidden', 'div' => false]); ?>
                        <td><?php if ($status == 1 && $grupo != 1 && $grupo != 2) {
                                echo $this->Form->input('notas.' . $alunos['ta']['codigo'] . '.nota', [
                                        'disabled' => 'true',
                                        'label'    => false,
                                        'value'    => $alunos['ti']['notafrequencia'],
                                ]);
                            } else {
                                echo $this->Form->input('notas.' . $alunos['ta']['codigo'] . '.nota',
                                        ['label' => false, 'value' => $alunos['ti']['notafrequencia']]);
                            }
                            ?>&nbsp;</td>
                        <td><?php if ($status == 1 && $grupo != 1) {
                                echo $this->Form->input('notas.' . $alunos['ta']['codigo'] . '.tg0020estadoinscricao_id',
                                        [
                                                'disabled' => 'true',
                                                'empty'    => '--seleccione--',
                                                'value'    => $estado,
                                                'options'  => $estadoinscricao,
                                                'label'    => false,
                                                'div'      => false,
                                        ]);
                            } else {
                                echo $this->Form->input('notas.' . $alunos['ta']['codigo'] . '.tg0020estadoinscricao_id',
                                        [
                                                'empty' => '--seleccione--',
                                                'value' => $estado,
                                                'options' => $estadoinscricao,
                                                'label' => false,
                                                'div' => false,
                                        ]);
                            } ?>&nbsp;</td>

                    </tr>
                <?php endforeach; ?>
            <?php
                echo $this->Form->input('turma_id', ['value' => $turma_id, 'type' => 'hidden', 'div' => false]);
                echo $this->Form->input('tipo_avaliacao',
                        ['value' => $tipo_avaliacao, 'type' => 'hidden', 'div' => false]);
                echo $this->Form->input('epoca_avaliacao',
                        ['value' => $epoca_avaliacao, 'type' => 'hidden', 'div' => false]);
            ?>
            <tr>
                <td></td>
                <td></td>
                <td><?php if ($status != 1 || $grupo == 1) {
                        if ($alunos != null) {
                            echo $this->Form->end(__('GRAVAR', true));
                        }
                    }
                    ?></td>
                <td></td>
                <td></td>
            </tr>
        </table>

    </div>
</div>







