<?php
//include 'conexao.php';

$sql_consult = mysqli_query("SELECT * FROM ta_relatorios WHERE id='".$_GET['id']."'") or die (mysqli_error());
$row_consult = mysqli_fetch_assoc($sql_consult);
?>

<input type="hidden" name="pn" value="<?php echo $row_consult['nome_relatorio'] ?>" />
<input type="hidden" name="p0" value="<?php echo $row_consult['caminho'] ?>" />

<!-- PARAMETROS 1 -->
<?php
if($row_consult['p1'] != '') {
    ?>
    <div class="col-md-12">
        <div class="form-group">
            <label><?php echo $row_consult['p1'] ?></label>

            <?php if($row_consult['tipo1'] == '1') { ?>
                <input type="text" class="form-control" name="p1" id="p1" placeholder="<?php echo $row_consult['p1'] ?>" required="required" />
            <?php } ?>
            <?php if($row_consult['tipo1'] == '2') { ?>
                <input type="text" class="form-control data" name="p1" id="p1" placeholder="<?php echo $row_consult['p1'] ?>" required="required" />
            <?php } ?>
            <?php if($row_consult['tipo1'] == '3') { ?>
                <select class="form-control" id="p1" name="p1" required="required">
                    <option value="" selected>Selecione</option>
                    <?php
                    $tabela1 = $row_consult['tabela1'];
                    $coluna1 = $row_consult['coluna1'];
                    $nome1 = $row_consult['nome1'];

                    if($tabela1 == 'ta_cliente_fornecedor') {
                        foreach($clientes_listagem as $value) {
                            $sql_cliente = mysqli_query("SELECT * FROM ta_cliente_fornecedor WHERE id='$value'") or die (mysqli_error());
                            $row_cliente = mysqli_fetch_assoc($sql_cliente);
                            ?>
                            <option value="<?php echo $row_cliente['id'] ?>"><?php echo $row_cliente['nome_empresa'] ?></option>
                            <?php
                        }
                    }

                    if($tabela1 != 'ta_cliente_fornecedor') {
                        $sql_cliente = mysqli_query("SELECT * FROM $tabela1 $b1 ORDER BY $coluna1 ASC") or die (mysqli_error());
                        while ($row_cliente = mysqli_fetch_assoc($sql_cliente)) {
                            ?>
                            <option value="<?php echo $row_cliente[$coluna1] ?>"><?php echo $row_cliente[$nome1] ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            <?php } ?>
        </div>
    </div>
    <?php
}
?>

<!-- PARAMETROS 2 -->
<?php
if($row_consult['p2'] != '') {
    ?>
    <div class="col-md-12">
        <div class="form-group">
            <label><?php echo $row_consult['p2'] ?></label>

            <?php if($row_consult['tipo2'] == '1') { ?>
                <input type="text" class="form-control" name="p2" id="p2" placeholder="<?php echo $row_consult['p2'] ?>" required="required" />
            <?php } ?>
            <?php if($row_consult['tipo2'] == '2') { ?>
                <input type="text" class="form-control data" name="p2" id="p2" placeholder="<?php echo $row_consult['p2'] ?>" required="required" />
            <?php } ?>
            <?php if($row_consult['tipo3'] == '3') { ?>
                <select class="form-control" id="p2" name="p2" required="required">
                    <option value="" selected>Selecione</option>
                    <?php
                    $tabela2 = $row_consult['tabela2'];
                    $coluna2 = $row_consult['coluna2'];
                    $nome2 = $row_consult['nome2'];

                    if($tabela2 == 'ta_cliente_fornecedor') { $b2 = "WHERE tipo='1'"; } else { $b2 = ""; }

                    $sql_cliente = mysqli_query("SELECT * FROM $tabela2 $b2 ORDER BY $coluna2 ASC") or die (mysqli_error());
                    while ($row_cliente = mysqli_fetch_assoc($sql_cliente)) {
                        ?>
                        <option value="<?php echo $row_cliente[$coluna2] ?>"><?php echo $row_cliente[$nome2] ?></option>
                        <?php
                    }
                    ?>
                </select>
            <?php } ?>
        </div>
    </div>
    <?php
}
?>

<!-- PARAMETROS 3 -->
<?php
if($row_consult['p3'] != '') {
    ?>
    <div class="col-md-12">
        <div class="form-group">
            <label><?php echo $row_consult['p3'] ?></label>

            <?php if($row_consult['tipo3'] == '1') { ?>
                <input type="text" class="form-control" name="p3" id="p3" placeholder="<?php echo $row_consult['p3'] ?>" required="required" />
            <?php } ?>
            <?php if($row_consult['tipo3'] == '2') { ?>
                <input type="text" class="form-control data" name="p3" id="p3" placeholder="<?php echo $row_consult['p3'] ?>" required="required" />
            <?php } ?>
            <?php if($row_consult['tipo3'] == '3') { ?>
                <select class="form-control" id="p3" name="p3" required="required">
                    <option value="" selected>Selecione</option>
                    <?php
                    $tabela3 = $row_consult['tabela3'];
                    $coluna3 = $row_consult['coluna3'];
                    $nome3 = $row_consult['nome3'];

                    if($tabela3 == 'ta_cliente_fornecedor') { $b3 = "WHERE tipo='1'"; } else { $b3 = ""; }

                    $sql_cliente = mysqli_query("SELECT * FROM $tabela3 $b3 ORDER BY $coluna3 ASC") or die (mysqli_error());
                    while ($row_cliente = mysqli_fetch_assoc($sql_cliente)) {
                        ?>
                        <option value="<?php echo $row_cliente[$coluna3] ?>"><?php echo $row_cliente[$nome3] ?></option>
                        <?php
                    }
                    ?>
                </select>
            <?php } ?>
        </div>
    </div>
    <?php
}
?>

<!-- PARAMETROS 4 -->
<?php
if($row_consult['p4'] != '') {
    ?>
    <div class="col-md-12">
        <div class="form-group">
            <label><?php echo $row_consult['p4'] ?></label>

            <?php if($row_consult['tipo4'] == '1') { ?>
                <input type="text" class="form-control" name="p4" id="p4" placeholder="<?php echo $row_consult['p4'] ?>" required="required" />
            <?php } ?>
            <?php if($row_consult['tipo4'] == '2') { ?>
                <input type="text" class="form-control data" name="p4" id="p4" placeholder="<?php echo $row_consult['p4'] ?>" required="required" />
            <?php } ?>
            <?php if($row_consult['tipo4'] == '3') { ?>
                <select class="form-control" id="p4" name="p4" required="required">
                    <option value="" selected>Selecione</option>
                    <?php
                    $tabela4 = $row_consult['tabela4'];
                    $coluna4 = $row_consult['coluna4'];
                    $nome4 = $row_consult['nome4'];

                    if($tabela4 == 'ta_cliente_fornecedor') { $b4 = "WHERE tipo='1'"; } else { $b4 = ""; }

                    $sql_cliente = mysqli_query("SELECT * FROM $tabela4 $b4 ORDER BY $coluna4 ASC") or die (mysqli_error());
                    while ($row_cliente = mysqli_fetch_assoc($sql_cliente)) {
                        ?>
                        <option value="<?php echo $row_cliente[$coluna4] ?>"><?php echo $row_cliente[$nome4] ?></option>
                        <?php
                    }
                    ?>
                </select>
            <?php } ?>
        </div>
    </div>
    <?php
}
?>

<!-- PARAMETROS 5 -->
<?php
if($row_consult['p5'] != '') {
    ?>
    <div class="col-md-12">
        <div class="form-group">
            <label><?php echo $row_consult['p5'] ?></label>

            <?php if($row_consult['tipo5'] == '1') { ?>
                <input type="text" class="form-control" name="p5" id="p5" placeholder="<?php echo $row_consult['p5'] ?>" required="required" />
            <?php } ?>
            <?php if($row_consult['tipo5'] == '2') { ?>
                <input type="text" class="form-control data" name="p5" id="p5" placeholder="<?php echo $row_consult['p5'] ?>" required="required" />
            <?php } ?>
            <?php if($row_consult['tipo5'] == '3') { ?>
                <select class="form-control" id="p5" name="p5" required="required">
                    <option value="" selected>Selecione</option>
                    <?php
                    $tabela5 = $row_consult['tabela5'];
                    $coluna5 = $row_consult['coluna5'];
                    $nome5 = $row_consult['nome5'];

                    if($tabela5 == 'ta_cliente_fornecedor') { $b5 = "WHERE tipo='1'"; } else { $b5 = ""; }

                    $sql_cliente = mysqli_query("SELECT * FROM $tabela5 $b5 ORDER BY $coluna5 ASC") or die (mysqli_error());
                    while ($row_cliente = mysqli_fetch_assoc($sql_cliente)) {
                        ?>
                        <option value="<?php echo $row_cliente[$coluna5] ?>"><?php echo $row_cliente[$nome5] ?></option>
                        <?php
                    }
                    ?>
                </select>
            <?php } ?>
        </div>
    </div>
    <?php
}
?>

<!-- PARAMETROS 6 -->
<?php
if($row_consult['p6'] != '') {
    ?>
    <div class="col-md-12">
        <div class="form-group">
            <label><?php echo $row_consult['p6'] ?></label>

            <?php if($row_consult['tipo6'] == '1') { ?>
                <input type="text" class="form-control" name="p6" id="p6" placeholder="<?php echo $row_consult['p6'] ?>" required="required" />
            <?php } ?>
            <?php if($row_consult['tipo6'] == '2') { ?>
                <input type="text" class="form-control data" name="p6" id="p6" placeholder="<?php echo $row_consult['p6'] ?>" required="required" />
            <?php } ?>
            <?php if($row_consult['tipo6'] == '3') { ?>
                <select class="form-control" id="p6" name="p6" required="required">
                    <option value="" selected>Selecione</option>
                    <?php
                    $tabela6 = $row_consult['tabela6'];
                    $coluna6 = $row_consult['coluna6'];
                    $nome6 = $row_consult['nome6'];

                    if($tabela6 == 'ta_cliente_fornecedor') { $b6 = "WHERE tipo='1'"; } else { $b6 = ""; }

                    $sql_cliente = mysqli_query("SELECT * FROM $tabela6 $b6 ORDER BY $coluna6 ASC") or die (mysqli_error());
                    while ($row_cliente = mysqli_fetch_assoc($sql_cliente)) {
                        ?>
                        <option value="<?php echo $row_cliente[$coluna6] ?>"><?php echo $row_cliente[$nome6] ?></option>
                        <?php
                    }
                    ?>
                </select>
            <?php } ?>
        </div>
    </div>
    <?php
}
?>