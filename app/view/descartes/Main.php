<?php
#VIEW @Descartes
include DIRREQ . '/src/helpers/data.php';
include DIRREQ . '/src/helpers/paginationDescartes.php';
?>      
<div class="container" id="tableEspecie" style="display:block;">    
    <h1 style='font-weight:bold;'>Percas e Descartes</h1>
    <hr>
    <div class="wrapper">
        <div class="form-group form-inline">
            <form method="post" action="<?= DIRPAGE . '/descartes?pagina=1' ?>">
                <button class="btn btn-sm btn-primary" type="submit" id="btn_consulta" name="btn_consultar"><span class='glyphicon glyphicon-search'></span></button>
                <input id="consultar" name='consultar' placeholder='Consultar' type='text' class='form-control'>           
            </form>
        </div>
        <div class="table">    
            <div class="row header green">
                <div class="cell">
                    ID
                </div>
                <div class="cell">
                    Espécie
                </div>
                <div class="cell">
                    Data
                </div>
                <div class="cell">
                    Quantidade
                </div>
                <div class="cell">
                    Motivo
                </div>
                <div class="cell">
                    Ações
                </div>
            </div>
            <?php
            if ($limite->rowCount() > 0) {
                while ($data = $limite->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <div class="row">
                        <div class="cell" data-title="ID">
                            <?= $data['id'] ?>
                        </div>
                        <div class="cell" data-title="Espécie">
                            <?= $data['especie'] ?>
                        </div>
                        <div class="cell" data-title="Data">
                            <?= $data['dt'] ?>
                        </div>
                        <div class="cell" data-title="Quantidade">
                            <?= $data['qtde'] ?>
                        </div>
                        <div class="cell" data-title="Motivo">
                            <?= $data['motivo'] ?>
                        </div>
                        <div class="cell" data-title="Ações">
                            <button class='btn btn-sm btn-warning' type='button'>Editar <span class='glyphicon glyphicon-pencil'></span></button>
                            <button class='btn btn-sm btn-danger ' type='submit' id='btn_excluir' name="btn_excluir" onclick="btn_excluir(<?= $data['id'] ?>)">Excluir <span class='glyphicon glyphicon-trash'></span></button>
                            <button class='btn btn-sm btn-info' type='button' data-toggle='modal' data-target='#info<?= $data["id"] ?>'><span class='glyphicon glyphicon-info-sign'></span></button>
                        </div>
                    </div>
                    <!-- JANELA MODAL DE INFORMAÇÕES-->
                    <div class="modal fade" id="info<?= $data["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLabel"><?= $data["especie"] ?></h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">                    
                                        <form action="" method="post" id="formEspecie" class="form-horizontal">                   
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="especie">Espécie:</label>
                                                <div class="col-sm-3">
                                                    <input type="text" value="<?= $data["especie"] ?>" name="especie" id="especie" class="form-control" disabled="true">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="data">Data:</label>
                                                <div class="col-sm-3">
                                                    <input type="date" value="<?= $data["dt"] ?>" name="data" id="data" class="form-control" disabled="true">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="qtde">Quantidade:</label>
                                                <div class="col-sm-3">
                                                    <input type="text" value="<?= $data["qtde"] ?>" name="qtde" id="qtde" class="form-control" disabled="true">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="motivo">Motivo:</label>
                                                <div class="col-sm-3">
                                                    <textarea  name="motivo" id="motivo" class="form-control" rows="5" disabled="true"><?= $data["motivo"] ?></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
            <?php if ($pc > 1) { ?>
                <a href="?pagina=<?= $anterior ?>"><button  class='btn btn-primary btn-sm'><span class='glyphicon glyphicon-backward'></button></a>
            <?php } ?>

            <?php if ($pc < $tp) { ?>
                <a href="?pagina=<?= $proximo ?>"><button class='btn btn-primary btn-sm'><span class='glyphicon glyphicon-forward'></button></a>
                <?php
            } else {
                
            }
            ?>
        </div>
        <a href="<?= DIRPAGE . '/descartes?pagina=0' ?>" class="btn btn-info btn-lg" name="excel"><span class="glyphicon glyphicon-save"></span></a>
        <button class='btn btn-success btn-lg' type='button' onclick="showForm()" name="novo"><span class="glyphicon glyphicon-plus"></span></button>    
    </div>

</div>

<!--=========================================================================-->
<div class="container">                    
    <form action="<?= DIRPAGE . '/descartes?pagina=1' ?>" method="post" id="formEspecie" class="form-horizontal" style="display:none;">
        <h1 style='font-weight:bold;'>Percas e Descartes</h1>
        <hr>
        <div class="form-group">
            <label class="control-label col-sm-2" for="especie">Nome popular da Espécie:</label>
            <div class="col-sm-5">
                <input type="text" name="especie" id="especie" class="form-control" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="data">Data:</label>
            <div class="col-sm-5">
                <input type="date" name="data" id="data" class="form-control" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="qtde">Quantidade:</label>
            <div class="col-sm-5">
                <input type="text" name="qtde" id="qtde" class="form-control" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="motivo">Motivo:</label>
            <div class="col-sm-5">
                <textarea  name="motivo" id="motivo" class="form-control" rows="5"></textarea>
            </div>
        </div>

        <div class="form-group form-inline">
            <label class="control-label col-sm-2"></label>
            <div class="col-sm-3">
                <input type="submit" name="btn_enviar" id="nome" value="Enviar" class="btn btn-success" >
                <input type="submit" name="btn_voltar" id="nome" value="Voltar" class="btn btn-primary" onclick="reload();">
            </div>
        </div>
    </form>
</div>
