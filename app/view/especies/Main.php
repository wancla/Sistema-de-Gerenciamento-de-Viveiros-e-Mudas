<?php
#<!--VIEW @Repicagem -->
include DIRREQ . '/src/helpers/data.php';
include DIRREQ . '/src/helpers/paginationEspecies.php';
?>
<div class="container" id="tableEspecie" style="display:block;">
    <h1 style='font-weight:bold;'>Espécies</h1>
    <hr>
    <div class="wrapper">
        <div class="form-group form-inline">
            <form method="post" action="<?= DIRPAGE . '/especies?pagina=1' ?>">
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
                    Popular
                </div>
                <div class="cell">
                    Familia
                </div>
                <div class="cell">
                    Dispersão
                </div>
                <div class="cell">
                    Habito
                </div>
                <div class="cell">
                    Bioma
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
                        <div class="cell" data-title="Popular">
                            <?= $data['nPopular'] ?>
                        </div>
                        <div class="cell" data-title="Familia">
                            <?= $data['familia'] ?>
                        </div>
                        <div class="cell" data-title="Dispersão">
                            <?= $data['dispersao'] ?>
                        </div>
                        <div class="cell" data-title="Habito">
                            <?= $data['habito'] ?>
                        </div>
                        <div class="cell" data-title="Bioma">
                            <?= $data['bioma'] ?>
                        </div>
                        <div class="cell" data-title="Ações">
                            <button class='btn btn-sm btn-warning' type='button'>Editar<span class='glyphicon glyphicon-pencil'></span></button>
                            <button class='btn btn-sm btn-danger' type='button' id='btn_excluir' name="btn_excluir" onclick="btn_excluir(<?= $data['id'] ?>)">Excluir<span class='glyphicon glyphicon-trash'></span></button>
                            <button class='btn btn-sm btn-info' type='button' data-toggle='modal' data-target='#info<?= $data["id"] ?>'><span class='glyphicon glyphicon-info-sign'></span></button>
                        </div>
                    </div>
                    <!-- JANELA MODAL DE INFORMAÇÕES-->
                    <div class="modal fade" id="info<?= $data["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLabel"><?= $data["nPopular"] ?></h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">                    
                                        <form action="" method="post" id="formEspecie" class="form-horizontal">
                                            
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="nPopular">Nome Popular:</label>
                                                <div class="col-sm-3">
                                                    <input type="text" value="<?= $data["nPopular"] ?>" name="nPopular" id="nPopular" class="form-control" disabled="true">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="nCientifico">Nome Cientifico:</label>
                                                <div class="col-sm-3">
                                                    <input type="text" value="<?= $data["nCientifico"] ?>" name="nCientifico" id="nCientifico" class="form-control" disabled="true">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="familia">Familia:</label>
                                                <div class="col-sm-3">
                                                    <input type="text" value="<?= $data["familia"] ?>" name="familia" id="familia" class="form-control" disabled="true">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="classeSucessional">Grupo Ecológico:</label>
                                                <div class="col-sm-3">
                                                    <input type="text" value="<?= $data["classeSucessional"] ?>" name="classeSucessional" id="classeSucessional" class="form-control" disabled="true">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="extincao">Extinção:</label>
                                                <div class="col-sm-3">
                                                    <input type="text" value="<?= $data["extincao"] ?>" name="extincao" id="extincao" class="form-control" disabled="true">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="dispersao">Dispersão:</label>
                                                <div class="col-sm-3">
                                                    <input type="text" value="<?= $data["dispersao"] ?>" name="dispersao" id="dispersao" class="form-control" disabled="true">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="categoria">Categoria:</label>
                                                <div class="col-sm-3">
                                                    <input type="text" value="<?= $data["categoria"] ?>" name="categoria" id="categoria" class="form-control" disabled="true">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="bioma">Bioma:</label>
                                                <div class="col-sm-3">
                                                    <input type="text" value="<?= $data["bioma"] ?>" name="bioma" id="bioma" class="form-control" disabled="true">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="indicacao">Áreas indicas:</label>
                                                <div class="col-sm-3">
                                                    <input type="text" value="<?= $data["indicacao"] ?>" name="indicao" id="indicacao" class="form-control" disabled="true">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="habito">Habito de Crescimento:</label>
                                                <div class="col-sm-3">
                                                    <input type="text" value="<?= $data["habito"] ?>" name="habito" id="habito" class="form-control" disabled="true">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="descricao">Descrição:</label>
                                                <div class="col-sm-3">
                                                    <textarea  name="descricao" id="descricao" class="form-control" rows="5" disabled="true"><?= $data["descricao"] ?></textarea>
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
        <a href="<?= DIRPAGE . '/especies?pagina=0' ?>" class="btn btn-info btn-lg" name="excel"><span class="glyphicon glyphicon-save"></span></a>
        <button class='btn btn-success btn-lg' type='button' onclick="showForm()" name="novo"><span class="glyphicon glyphicon-plus"></span></button>    
    </div>

</div>

<!--=========================================================================-->
<div class="container">                    
    <form action="<?= DIRPAGE . '/especies?pagina=1' ?>" method="post" id="formEspecie" class="form-horizontal" style="display:none;">
        <h1 style='font-weight:bold;'>Espécies</h1>
        <hr>
        <div class="form-group">
            <label class="control-label col-sm-2" for="nPopular">Nome Popular:</label>
            <div class="col-sm-5">
                <input type="text" name="nPopular" id="nPopular" class="form-control" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="nCientifico">Nome Cientifico:</label>
            <div class="col-sm-5">
                <input type="text" name="nCientifico" id="nCientifico" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="familia">Familia:</label>
            <div class="col-sm-5">
                <input type="text" name="familia" id="familia" class="form-control" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="classeSucessional">Grupo Ecológico:</label>
            <div class="col-sm-3">
                <select id="inputClasseSucessional" class="form-control" name="classeSucessional" required>
                    <option  selected value="null">Escolha...</option>
                    <option value="P">Pioneira</option>
                    <option value="NP">Não Pioneira</option>                          
                    <option value="St">Secundária Inicial</option>                          
                    <option value="St">Secundária Tardia</option>                          
                    <option value="Climax">Climax</option>                          
                    <option value="NC">Não Classificado</option>                          
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="extincao">Extinção:</label>
            <div class="col-sm-3">
                <select id="inputClasseSucessional" class="form-control" name="extincao" required>
                    <option  selected value="null">Escolha...</option>
                    <option value="CR">Corre Risco</option>
                    <option value="SR">Sem Risco</option>                                                                           
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="dispersao">Dispersão:</label>
            <div class="col-sm-3">
                <select id="dispersao" class="form-control" name="dispersao" required>
                    <option  selected value="null">Escolha...</option>
                    <option value="Aut">Autocórica</option>
                    <option value="Ane">Anemocórica</option>                                                                           
                    <option value="Zoo">Zoocórica</option>                                                                           
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="categoria">Categoria:</label>
            <div class="col-sm-3">
                <select id="categoria" class="form-control" name="categoria" required>
                    <option  selected value="null">Escolha...</option>
                    <option value="frutifera">Frutífera</option>
                    <option value="ornamental">Ornamental</option>                                                                           
                    <option value="arborea">Arbórea</option>                                                                           
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="bioma">Bioma:</label>
            <div class="col-sm-3">
                <select id="bioma" class="form-control" name="bioma" required>
                    <option  selected value="null">Escolha...</option>
                    <option value="cerrado">Cerrado</option>
                    <option value="mata atlantica">Mata atlântica</option>                                                                                                                                                   
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="indicacao">Áreas indicas:</label>
            <div class="col-sm-3">
                <select id="categoria" class="form-control" name="indicacao" required>
                    <option  selected value="null">Escolha...</option>
                    <option value="encharcamento permanente do solo">Encharcamento permanente</option>
                    <option value="encharcamento temporario do solo">Encharcamento temporário</option>                                                                           
                    <option value="drenadas, sem alagamento">Área drenada/Sem alagamento</option>                                                                           
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="habito">Habito de Crescimento:</label>
            <div class="col-sm-5">
                <input type="text" name="habito" id="habito" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="descricao">Descrição:</label>
            <div class="col-sm-5">
                <textarea  name="descricao" id="descricao" class="form-control" rows="5"></textarea>
            </div>
        </div>

        <div class="form-group form-inline">
            <label class="control-label col-sm-2" for="nome"></label>
            <div class="col-sm-3">
                <input type="submit" name="btn_enviar" id="nome" value="Enviar" class="btn btn-success" >
                <input type="submit" name="btn_voltar" id="nome" value="Voltar" class="btn btn-primary" onclick="reload();">
            </div>
        </div>
    </form>
</div>
