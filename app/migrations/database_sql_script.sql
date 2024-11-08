-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema sgm
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema sgm
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sgm` DEFAULT CHARACTER SET latin1 ;
USE `sgm` ;

-- -----------------------------------------------------
-- Table `sgm`.`i0_sco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`i0_sco` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `cod_sco` VARCHAR(255) NULL DEFAULT NULL,
  `mes_i0_sco` VARCHAR(255) NOT NULL,
  `ano_i0_sco` VARCHAR(255) NULL DEFAULT NULL,
  `valor_i0_sco` VARCHAR(12) NULL DEFAULT 'ZERO',
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 209529
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`sco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`sco` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_contrato` INT(255) NOT NULL,
  `cod_i0_sco` INT(255) NOT NULL,
  `id_sco` INT(255) NOT NULL,
  `cod_sco` VARCHAR(255) NOT NULL,
  `descricao_sco` TEXT NOT NULL,
  `unidade` VARCHAR(10) NOT NULL,
  `tipo` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `cod_sco` (`cod_i0_sco` ASC) VISIBLE)
ENGINE = MyISAM
AUTO_INCREMENT = 19411
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_avaliacao_os3`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_avaliacao_os3` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_avaliacao_os` INT(255) NOT NULL,
  `ds_avaliacao` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_avaliacao_profissional`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_avaliacao_profissional` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `cd_avaliacao_profissional` VARCHAR(255) NOT NULL,
  `ds_avaliacao_profissional` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_calendario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_calendario` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_cliente` INT(255) NOT NULL,
  `dt_calendario` VARCHAR(255) NOT NULL,
  `id_calendarioLegenda` INT(255) NOT NULL,
  `descricao` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_calendario_legenda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_calendario_legenda` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `ds_calendarioLegenda` VARCHAR(255) NOT NULL,
  `cor` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_cargo` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `ds_cargo` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 59
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_categoria` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `ds_categoria` VARCHAR(255) NOT NULL,
  `tipo` INT(11) NULL DEFAULT '0',
  `cod_categoria` VARCHAR(10) NULL DEFAULT NULL,
  `ativo` VARCHAR(1) NULL DEFAULT '1',
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 43
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_categoria_servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_categoria_servico` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_categoria` INT(255) NOT NULL,
  `ds_categoriaServico` VARCHAR(255) NOT NULL,
  `ativo` VARCHAR(1) NULL DEFAULT '1',
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 285
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_cliente_classe_manutencao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_cliente_classe_manutencao` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_cliente` INT(255) NOT NULL,
  `id_equipClasseManutencao` INT(255) NOT NULL,
  `id_periodo` INT(255) NOT NULL,
  `duracao` INT(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_cliente_fornecedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_cliente_fornecedor` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `tipo` INT(1) NOT NULL,
  `logomarca_clifor` VARCHAR(255) NOT NULL,
  `nome_empresa` VARCHAR(255) NOT NULL,
  `nome_fantasia` VARCHAR(255) NOT NULL,
  `ds_cliente` TEXT NOT NULL,
  `id_esfera` INT(255) NOT NULL,
  `cnpj` VARCHAR(255) NOT NULL,
  `email_engenharia` VARCHAR(255) NOT NULL,
  `email_os_cc` VARCHAR(255) NOT NULL,
  `email_os_bcc` VARCHAR(255) NOT NULL,
  `email_ss_cc` VARCHAR(255) NOT NULL,
  `email_ss_bcc` VARCHAR(255) NOT NULL,
  `dt_inicontrato` DATE NOT NULL,
  `rua` VARCHAR(255) NOT NULL,
  `numero` VARCHAR(255) NOT NULL,
  `complemento_endereco` VARCHAR(255) NOT NULL,
  `bairro` VARCHAR(255) NOT NULL,
  `cidade` VARCHAR(255) NOT NULL,
  `uf` VARCHAR(255) NOT NULL,
  `cep` VARCHAR(255) NOT NULL,
  `inscricao_estadual` VARCHAR(255) NOT NULL,
  `inscricao_municipal` VARCHAR(255) NOT NULL,
  `telefone1` VARCHAR(255) NOT NULL,
  `telefone2` VARCHAR(255) NOT NULL,
  `telefone3` VARCHAR(255) NOT NULL,
  `telefone_celular` VARCHAR(255) NOT NULL,
  `clifor` VARCHAR(10) NULL DEFAULT NULL,
  `modelo_os` INT(1) NOT NULL,
  `celulares` TEXT NULL DEFAULT NULL,
  `email_compras` VARCHAR(255) NULL DEFAULT NULL,
  `zap` VARCHAR(255) NULL DEFAULT NULL,
  `sms_aprova` VARCHAR(255) NULL DEFAULT NULL,
  `cap` VARCHAR(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 269
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_cliente_local`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_cliente_local` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_cliente` INT(255) NOT NULL,
  `ds_clienteLocal` VARCHAR(255) NOT NULL,
  `cep` VARCHAR(255) NULL DEFAULT NULL,
  `rua` VARCHAR(255) NULL DEFAULT NULL,
  `bairro` VARCHAR(255) NULL DEFAULT NULL,
  `cidade` VARCHAR(45) NULL DEFAULT NULL,
  `uf` CHAR(2) NULL DEFAULT NULL,
  `numero` VARCHAR(10) NULL DEFAULT NULL,
  `complemento_endereco` VARCHAR(255) NULL DEFAULT NULL,
  `contato` VARCHAR(255) NULL DEFAULT NULL,
  `tel_contato` VARCHAR(255) NULL DEFAULT NULL,
  `latitude` VARCHAR(45) NULL DEFAULT NULL,
  `longitude` VARCHAR(45) NULL DEFAULT NULL,
  `inclinacao` VARCHAR(30) NULL DEFAULT NULL,
  `area_construida` DECIMAL(10,2) NULL DEFAULT NULL,
  `area_total` DECIMAL(10,2) NULL DEFAULT NULL,
  `valor_local` DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 440
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_cliente_local_entrega`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_cliente_local_entrega` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` VARCHAR(255) NULL DEFAULT NULL,
  `local` VARCHAR(255) NULL DEFAULT NULL,
  `cep` VARCHAR(255) NULL DEFAULT NULL,
  `rua` VARCHAR(255) NULL DEFAULT NULL,
  `numero` VARCHAR(255) NULL DEFAULT NULL,
  `complemento_endereco` VARCHAR(255) NULL DEFAULT NULL,
  `bairro` VARCHAR(255) NULL DEFAULT NULL,
  `cidade` VARCHAR(255) NULL DEFAULT NULL,
  `uf` VARCHAR(255) NULL DEFAULT NULL,
  `contato` VARCHAR(255) NULL DEFAULT NULL,
  `tel_contato` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`ta_cliente_operador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_cliente_operador` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_cliente` TEXT NOT NULL,
  `locais` TEXT NOT NULL,
  `nm_operador` VARCHAR(255) NOT NULL,
  `cpf` VARCHAR(255) NULL DEFAULT NULL,
  `matricula` VARCHAR(255) NULL DEFAULT NULL,
  `login` VARCHAR(255) NOT NULL,
  `psw` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `assinatura_digitalizada` VARCHAR(255) NULL DEFAULT NULL,
  `rubrica_digital` VARCHAR(255) NULL DEFAULT NULL,
  `tipo` INT(1) NOT NULL,
  `status` VARCHAR(255) NOT NULL,
  `dt_cadastro` DATETIME NOT NULL,
  `dt_alteracao` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ramal` VARCHAR(255) NULL DEFAULT NULL,
  `telefone` VARCHAR(255) NULL DEFAULT NULL,
  `primeiro_acesso` INT(1) NULL DEFAULT '0',
  `foto` VARCHAR(255) NULL DEFAULT NULL,
  `valor_aprovacao` DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 752
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_cliente_pavimento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_cliente_pavimento` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_cliente` INT(255) NOT NULL,
  `id_clienteLocal` INT(255) NOT NULL,
  `ds_clientePavimento` VARCHAR(255) NOT NULL,
  `status` INT(1) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 522
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_cliente_profissional`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_cliente_profissional` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_cliente` INT(255) NOT NULL,
  `id_profissional` INT(11) NOT NULL DEFAULT '0',
  `dt_inicio` DATE NOT NULL,
  `dt_termino` DATE NOT NULL,
  `status` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 190
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_cliente_secao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_cliente_secao` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `cd_secao` INT(255) NOT NULL,
  `id_cliente` INT(255) NOT NULL,
  `nm_secao` VARCHAR(255) NOT NULL,
  `id_pessoaalmo` INT(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_cliente_setor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_cliente_setor` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_cliente` INT(255) NOT NULL,
  `id_clientePavimento` INT(255) NOT NULL,
  `ds_clienteSetor` VARCHAR(255) NOT NULL,
  `status` INT(1) NOT NULL,
  `ocupantes_fixos` VARCHAR(255) NULL DEFAULT NULL,
  `ocupantes_flutuantes` VARCHAR(255) NULL DEFAULT NULL,
  `largura` DECIMAL(10,2) NULL DEFAULT NULL,
  `comprimento` DECIMAL(10,2) NULL DEFAULT NULL,
  `altura` DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 22529
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_contrato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_contrato` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_cliente` INT(255) NOT NULL,
  `ds_contrato` TEXT NOT NULL,
  `dt_inicio` DATE NOT NULL,
  `dt_fim` DATE NOT NULL,
  `valor_base` DECIMAL(10,2) NOT NULL,
  `BDI` DECIMAL(10,4) NULL DEFAULT NULL,
  `numero` VARCHAR(50) NULL DEFAULT NULL,
  `mes_sco` INT(2) NOT NULL DEFAULT '0',
  `ano_sco` INT(4) NOT NULL,
  `valor_base2` DECIMAL(10,2) NULL DEFAULT NULL,
  `valor_base3` DECIMAL(10,2) NULL DEFAULT NULL,
  `status` INT(1) NULL DEFAULT NULL,
  `processo` VARCHAR(30) NULL DEFAULT NULL,
  `valor_corretiva` DECIMAL(15,2) NULL DEFAULT NULL,
  `valor_preventiva` DECIMAL(15,2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 82
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_equip_classe_manutencao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_equip_classe_manutencao` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_equipGrupoManutencao` VARCHAR(255) NULL DEFAULT NULL,
  `id_equipSubgrupoManutencao` INT(255) NOT NULL,
  `ds_equipClasseManutencao` VARCHAR(255) NOT NULL,
  `periodo` INT(11) NOT NULL DEFAULT '0',
  `duracao` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
  `orientacoes` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 65
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_equip_grupo_manutencao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_equip_grupo_manutencao` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `ds_equipGrupoManutencao` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_equip_marcas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_equip_marcas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_equipGrupoManutencao` INT(11) NULL DEFAULT NULL,
  `ds_marca` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 23
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sgm`.`ta_equip_modelo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_equip_modelo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_equipGrupoManutencao` INT(11) NULL DEFAULT NULL,
  `id_equipMarca` INT(11) NULL DEFAULT NULL,
  `ds_modelo` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 204
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sgm`.`ta_equip_subgrupo_manutencao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_equip_subgrupo_manutencao` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_equipGrupoManutencao` INT(255) NOT NULL,
  `ds_equipSubgrupoManutencao` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_equipamento_grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_equipamento_grupo` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `ds_equipamentoGrupo` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_equipamento_situacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_equipamento_situacao` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `ds_equipamentoSituacao` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_esfera`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_esfera` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `ds_esfera` VARCHAR(255) NOT NULL,
  `form_os` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_estoque_cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_estoque_cliente` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_cliente` INT(255) NOT NULL,
  `cod_sco` VARCHAR(255) NOT NULL,
  `qtd` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 2773
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_feriado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_feriado` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `dt_feriado` DATE NOT NULL,
  `ds_feriado` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_ferramenta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_ferramenta` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_ferramentaSituacao` INT(11) NOT NULL DEFAULT '0',
  `nm_ferramenta` VARCHAR(255) NOT NULL DEFAULT '',
  `ds_ferramenta` TEXT NOT NULL,
  `serie` VARCHAR(255) NOT NULL,
  `nu_patrimonial` VARCHAR(255) NOT NULL,
  `voltagem_ferramenta` VARCHAR(255) NOT NULL DEFAULT '',
  `peso` VARCHAR(255) NULL DEFAULT NULL,
  `potencia` VARCHAR(255) NOT NULL DEFAULT '',
  `valor` DECIMAL(10,2) NOT NULL,
  `dt_aquisicao` DATETIME NOT NULL,
  `foto1` VARCHAR(255) NOT NULL,
  `foto2` VARCHAR(255) NOT NULL,
  `status` INT(1) NULL DEFAULT NULL,
  `id_profissional` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_ferramenta_historico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_ferramenta_historico` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_profissional` INT(11) NULL DEFAULT NULL,
  `data` DATETIME NULL DEFAULT NULL,
  `tipo` INT(1) NULL DEFAULT NULL,
  `id_ferramenta` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 18
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`ta_financeiro_fornecedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_financeiro_fornecedor` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` INT(11) NULL DEFAULT NULL,
  `banco` VARCHAR(255) NULL DEFAULT NULL,
  `agencia` VARCHAR(255) NULL DEFAULT NULL,
  `conta` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 145
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`ta_foto_obra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_foto_obra` (
  `id` BIGINT(20) NULL DEFAULT NULL,
  `id_diario_obra` VARCHAR(255) NULL DEFAULT NULL,
  `foto` VARCHAR(255) NULL DEFAULT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`ta_horario_obra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_horario_obra` (
  `id` BIGINT(20) NULL DEFAULT NULL,
  `ds_horarios` VARCHAR(200) NULL DEFAULT NULL,
  `horario` VARCHAR(255) NULL DEFAULT NULL,
  UNIQUE INDEX `AK_KEY_1_TA_HORAR` (`id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`ta_justificativa_obra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_justificativa_obra` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_obra` INT(11) NULL DEFAULT NULL,
  `justificativa` TEXT NULL DEFAULT NULL,
  `data` DATETIME NULL DEFAULT NULL,
  `dias` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB
AUTO_INCREMENT = 37
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`ta_marca_equipamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_marca_equipamento` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `nome_marca_equipamento` VARCHAR(255) NOT NULL,
  `obs_marca_equipamento` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_material`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_material` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_materialGrupo` INT(255) NOT NULL,
  `id_materialSubgrupo` INT(11) NULL DEFAULT NULL,
  `id_materialClasse` INT(11) NULL DEFAULT NULL,
  `id_marca` INT(11) NULL DEFAULT NULL,
  `cd_material` VARCHAR(255) NOT NULL,
  `ds_material` VARCHAR(255) NOT NULL,
  `id_unidade` INT(255) NOT NULL,
  `vl_material` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 7647
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_material_classe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_material_classe` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_grupo` INT(11) NULL DEFAULT NULL,
  `id_subgrupo` INT(11) NULL DEFAULT NULL,
  `codigo` VARCHAR(255) NULL DEFAULT NULL,
  `classe` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 986
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`ta_material_grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_material_grupo` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `cd_materialGrupo` VARCHAR(255) NOT NULL,
  `ds_materialGrupo` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 32
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_material_marca`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_material_marca` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_grupo` INT(11) NULL DEFAULT NULL,
  `marca` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 74
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`ta_material_subgrupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_material_subgrupo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_grupo` INT(11) NULL DEFAULT NULL,
  `codigo` VARCHAR(255) NULL DEFAULT NULL,
  `subgrupo` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 288
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`ta_modelo_equipamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_modelo_equipamento` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `nome_modelo_equipamento` VARCHAR(255) NOT NULL,
  `obs_modelo_equipamento` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_modelo_impressao_os`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_modelo_impressao_os` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(255) NULL DEFAULT NULL,
  `arquivo` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 34
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`ta_nivel_servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_nivel_servico` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `ds_nivel` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`ta_obras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_obras` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_cliente` INT(255) NOT NULL,
  `id_clienteLocal` INT(255) NOT NULL,
  `id_contrato` INT(11) NULL DEFAULT NULL,
  `nome_obra` VARCHAR(255) NOT NULL,
  `data_inicio` DATE NOT NULL,
  `tempo_obra` INT(5) NOT NULL,
  `id_rt` INT(11) NOT NULL DEFAULT '0',
  `valor_material` DECIMAL(10,2) NULL DEFAULT NULL,
  `valor_mao_de_obra` DECIMAL(10,2) NULL DEFAULT NULL,
  `aditivo_material` DECIMAL(10,2) NULL DEFAULT NULL,
  `aditivo_mao_de_obra` DECIMAL(10,2) NULL DEFAULT NULL,
  `status` INT(1) NULL DEFAULT NULL,
  `cei` VARCHAR(255) NULL DEFAULT NULL,
  `ART` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 48
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`ta_ordem_servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_ordem_servico` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `ds_ordemServico` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_pessoalprovento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_pessoalprovento` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `cd_provento` VARCHAR(255) NOT NULL,
  `gr_provento` VARCHAR(255) NOT NULL,
  `ordem` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_plano_area`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_plano_area` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `ds_materialGrupo` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_prioridade_os`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_prioridade_os` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `ds_prioridade_os` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_profissional`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_profissional` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `folha` VARCHAR(255) NOT NULL,
  `id_avaliacao_profissional` INT(255) NOT NULL,
  `nm_profissional` VARCHAR(255) NOT NULL,
  `cpf` VARCHAR(255) NOT NULL,
  `dt_nascimento` DATE NOT NULL,
  `telefone` VARCHAR(255) NOT NULL,
  `id_cargo` INT(255) NOT NULL,
  `status` VARCHAR(255) NOT NULL,
  `tamanho_pe` VARCHAR(255) NULL DEFAULT NULL,
  `tamanho_calca` VARCHAR(255) NULL DEFAULT NULL,
  `tamanho_camisa` VARCHAR(255) NULL DEFAULT NULL,
  `valor_passagem` DECIMAL(10,2) NULL DEFAULT NULL,
  `valor_passagem1` DECIMAL(10,2) NULL DEFAULT NULL,
  `valor_passagem2` DECIMAL(10,2) NULL DEFAULT NULL,
  `valor_passagem3` DECIMAL(10,2) NULL DEFAULT NULL,
  `qtd_passagem1` INT(11) NULL DEFAULT NULL,
  `qtd_passagem` INT(11) NULL DEFAULT NULL,
  `qtd_passagem2` INT(11) NULL DEFAULT NULL,
  `qtd_passagem3` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 313
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_relatorios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_relatorios` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `nome_relatorio` VARCHAR(255) NOT NULL,
  `tipo_rel` VARCHAR(255) NULL DEFAULT NULL,
  `caminho` VARCHAR(255) NOT NULL,
  `p1` VARCHAR(255) NOT NULL,
  `tipo1` INT(1) NOT NULL,
  `tabela1` VARCHAR(255) NOT NULL,
  `coluna1` VARCHAR(255) NOT NULL,
  `nome1` VARCHAR(255) NULL DEFAULT NULL,
  `p2` VARCHAR(255) NOT NULL,
  `tipo2` INT(1) NOT NULL,
  `tabela2` VARCHAR(255) NOT NULL,
  `coluna2` VARCHAR(255) NOT NULL,
  `nome2` VARCHAR(255) NULL DEFAULT NULL,
  `p3` VARCHAR(255) NOT NULL,
  `tipo3` INT(1) NOT NULL,
  `tabela3` VARCHAR(255) NOT NULL,
  `coluna3` VARCHAR(255) NOT NULL,
  `nome3` VARCHAR(255) NULL DEFAULT NULL,
  `p4` VARCHAR(255) NOT NULL,
  `tipo4` INT(1) NOT NULL,
  `tabela4` VARCHAR(255) NOT NULL,
  `coluna4` VARCHAR(255) NOT NULL,
  `nome4` VARCHAR(255) NULL DEFAULT NULL,
  `p5` VARCHAR(255) NOT NULL,
  `tipo5` INT(1) NOT NULL,
  `tabela5` VARCHAR(255) NOT NULL,
  `coluna5` VARCHAR(255) NOT NULL,
  `nome5` VARCHAR(255) NULL DEFAULT NULL,
  `p6` VARCHAR(255) NOT NULL,
  `tipo6` INT(1) NOT NULL,
  `tabela6` VARCHAR(255) NOT NULL,
  `coluna6` VARCHAR(255) NOT NULL,
  `nome6` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 57
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`ta_rt_obra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_rt_obra` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `nome_rt` VARCHAR(255) NULL DEFAULT NULL,
  `crea` VARCHAR(255) NULL DEFAULT NULL,
  `uf_crea` VARCHAR(2) NULL DEFAULT NULL,
  `dt_emissao` DATE NULL DEFAULT NULL,
  `titulo1` VARCHAR(255) NULL DEFAULT NULL,
  `titulo2` VARCHAR(255) NULL DEFAULT NULL,
  `titulo3` VARCHAR(255) NULL DEFAULT NULL,
  `titulo4` VARCHAR(255) NULL DEFAULT NULL,
  `titulo5` VARCHAR(255) NULL DEFAULT NULL,
  `telefone1` VARCHAR(255) NULL DEFAULT NULL,
  `telefone2` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `AK_KEY_1_TA_RT_OB` (`id` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`ta_situacao_os`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_situacao_os` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `ds_situacaoSS` VARCHAR(255) NOT NULL,
  `cor` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_situacao_ss`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_situacao_ss` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `ds_situacao` VARCHAR(255) NOT NULL,
  `cor` VARCHAR(255) NOT NULL,
  `fg_pedido` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ta_tempo_obra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_tempo_obra` (
  `id` BIGINT(20) NOT NULL,
  `ds_tempo_obra` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`ta_tipo_os`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_tipo_os` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `ta_tipo_os` VARCHAR(255) NULL DEFAULT NULL,
  `cod_os` VARCHAR(2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`ta_unidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ta_unidade` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `ds_unidade` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_almevento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_almevento` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `nm_evento` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_almlancamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_almlancamento` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `us_inseriu` INT(255) NOT NULL,
  `dt_inseriu` DATETIME NOT NULL,
  `cd_lancamentoRef` INT(255) NOT NULL,
  `cd_tipoLancamento` INT(255) NOT NULL,
  `cd_recebimentoNF` INT(255) NOT NULL,
  `id_cliente` INT(255) NOT NULL,
  `id_os` INT(255) NOT NULL,
  `CODCFO` VARCHAR(255) NOT NULL,
  `IDPRD` INT(255) NOT NULL,
  `dt_lancamento` DATETIME NOT NULL,
  `qt_material` DECIMAL(10,3) NOT NULL,
  `qt_saldoNota` DECIMAL(10,3) NOT NULL,
  `qt_saldoAlmo` DECIMAL(10,3) NOT NULL,
  `vl_material` DECIMAL(10,4) NOT NULL,
  `vl_medio` DECIMAL(10,4) NOT NULL,
  `nu_serie` INT(255) NOT NULL,
  `nu_notaFiscal` INT(255) NOT NULL,
  `dt_notaFiscal` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_almrecebimentonf`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_almrecebimentonf` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `us_inseriu` INT(255) NOT NULL,
  `dt_inseriu` DATETIME NOT NULL,
  `us_editou` INT(255) NOT NULL,
  `dt_editou` DATETIME NOT NULL,
  `id_cliente` INT(255) NOT NULL,
  `CODCFO` VARCHAR(255) NOT NULL,
  `nu_serie` INT(255) NOT NULL,
  `nu_notaFiscal` INT(255) NOT NULL,
  `dt_notaFiscal` DATETIME NOT NULL,
  `fg_almoxarifado` VARCHAR(255) NOT NULL,
  `status` INT(1) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 2029
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_almrecebimentonfmaterial`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_almrecebimentonfmaterial` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_entrada` INT(255) NOT NULL,
  `IDPRD` VARCHAR(255) NOT NULL,
  `qt_material` DECIMAL(10,3) NOT NULL,
  `vl_unitario` DECIMAL(10,2) NOT NULL,
  `vl_compra` DECIMAL(10,2) NOT NULL,
  `vl_total` DECIMAL(10,2) NOT NULL,
  `vl_total_compra` DECIMAL(10,2) NOT NULL,
  `status` INT(1) NOT NULL,
  `qtde_usado` DECIMAL(10,2) NULL DEFAULT '0.00',
  `qtde_saldo` DECIMAL(10,2) NULL DEFAULT '0.00',
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 4152
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_almtipolancamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_almtipolancamento` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `nm_tipoLancamento` VARCHAR(255) NOT NULL,
  `id_evento` INT(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_bordero`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_bordero` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `numero` INT(11) NULL DEFAULT NULL,
  `data` DATE NULL DEFAULT NULL,
  `id_obra` INT(11) NULL DEFAULT NULL,
  `id_cliente` INT(11) NULL DEFAULT NULL,
  `proposta` VARCHAR(255) NULL DEFAULT NULL,
  `cei` VARCHAR(255) NULL DEFAULT NULL,
  `valor` DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 940
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`tb_caixinha`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_caixinha` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` INT(11) NULL DEFAULT NULL,
  `data` DATETIME NULL DEFAULT NULL,
  `valor` DECIMAL(10,2) NULL DEFAULT NULL,
  `titulo` VARCHAR(255) NULL DEFAULT NULL,
  `arquivo` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 98
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`tb_classe_plano_manutencao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_classe_plano_manutencao` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_plano` INT(11) NULL DEFAULT NULL,
  `id_equipSubgrupoManutencao` INT(11) NULL DEFAULT NULL,
  `id_equipClasseManutencao` INT(11) NULL DEFAULT NULL,
  `periodo` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 29
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`tb_cotacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_cotacao` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` INT(11) NULL DEFAULT NULL,
  `id_clienteLocal` INT(11) NULL DEFAULT NULL,
  `dt_solicitacao` DATETIME NULL DEFAULT NULL,
  `id_operador` INT(11) NULL DEFAULT NULL,
  `id_situacao` INT(11) NULL DEFAULT NULL,
  `id_prioridade` INT(11) NULL DEFAULT NULL,
  `id_materialGrupo` INT(11) NULL DEFAULT NULL,
  `tipo` INT(11) NULL DEFAULT '0',
  `observacoes_reprovacao` TEXT NULL DEFAULT NULL,
  `observacoes` TEXT NULL DEFAULT NULL,
  `id_local_entrega` INT(11) NULL DEFAULT NULL,
  `observacoes_entrega` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 806
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`tb_despesa_anual`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_despesa_anual` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_ccusto` INT(255) NOT NULL,
  `ano` VARCHAR(4) NOT NULL,
  `vl_anoterior` DECIMAL(10,2) NOT NULL,
  `vl_jan` DECIMAL(10,2) NOT NULL,
  `vl_fev` DECIMAL(10,2) NOT NULL,
  `vl_mar` DECIMAL(10,2) NOT NULL,
  `vl_abr` DECIMAL(10,2) NOT NULL,
  `vl_mai` DECIMAL(10,2) NOT NULL,
  `vl_jun` DECIMAL(10,2) NOT NULL,
  `vl_jul` DECIMAL(10,2) NOT NULL,
  `vl_ago` DECIMAL(10,2) NOT NULL,
  `vl_set` DECIMAL(10,2) NOT NULL,
  `vl_out` DECIMAL(10,2) NOT NULL,
  `vl_nov` DECIMAL(10,2) NOT NULL,
  `vl_dez` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_diario_obra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_diario_obra` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_obra` INT(255) NULL DEFAULT NULL,
  `hora_inicio` VARCHAR(255) NOT NULL,
  `hora_final` VARCHAR(255) NOT NULL,
  `equipamentos` TEXT NOT NULL,
  `servicos_executados` TEXT NULL DEFAULT NULL,
  `anotacao_fiscalizacao` TEXT NULL DEFAULT NULL,
  `pessoal` TEXT NOT NULL,
  `quantidade` TEXT NULL DEFAULT NULL,
  `tempo_manha` VARCHAR(255) NULL DEFAULT NULL,
  `tempo_tarde` VARCHAR(255) NULL DEFAULT NULL,
  `tempo_noite` VARCHAR(255) NULL DEFAULT NULL,
  `chuva_manha` VARCHAR(255) NULL DEFAULT NULL,
  `chuva_tarde` VARCHAR(255) NULL DEFAULT NULL,
  `chuva_noite` VARCHAR(255) NULL DEFAULT NULL,
  `data` DATE NOT NULL,
  `fotos` TEXT NOT NULL,
  `anotacao_empresa` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `AK_KEY_1_TB_DIARI` (`id` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 1476
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`tb_equipamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_equipamento` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_equipamentoSituacao` INT(255) NOT NULL,
  `nm_equipamento` VARCHAR(255) NOT NULL,
  `ds_equipamento` TEXT NOT NULL,
  `serie` VARCHAR(255) NOT NULL,
  `sistema` VARCHAR(255) NOT NULL,
  `nu_patrimonial` VARCHAR(255) NOT NULL,
  `voltagem_equipamento` VARCHAR(255) NOT NULL DEFAULT '',
  `peso` VARCHAR(255) NULL DEFAULT NULL,
  `potencia` VARCHAR(255) NOT NULL DEFAULT '',
  `dt_situacao` DATETIME NOT NULL,
  `id_cliente` INT(255) NOT NULL,
  `id_clienteLocal` INT(255) NOT NULL,
  `id_clientePavimento` INT(255) NOT NULL,
  `id_clienteSetor` INT(255) NOT NULL,
  `id_equipGrupoManutencao` INT(255) NOT NULL,
  `id_equipSubGrupoManutencao` INT(255) NOT NULL,
  `id_modelo_equipamento` INT(255) NOT NULL,
  `id_marca_equipamento` INT(255) NOT NULL,
  `valor` DECIMAL(10,2) NOT NULL,
  `dt_aquisicao` DATETIME NOT NULL,
  `foto1` VARCHAR(255) NOT NULL,
  `foto2` VARCHAR(255) NOT NULL,
  `foto3` VARCHAR(255) NOT NULL,
  `altura` VARCHAR(255) NULL DEFAULT NULL,
  `largura` VARCHAR(255) NULL DEFAULT NULL,
  `id_plano` INT(11) NULL DEFAULT NULL,
  `arquivo` VARCHAR(255) NULL DEFAULT NULL,
  `responsavel` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 954
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_fases_cotacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_fases_cotacao` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_cotacao` INT(11) NULL DEFAULT NULL,
  `id_situacao` INT(11) NULL DEFAULT NULL,
  `dt_situacao` DATETIME NULL DEFAULT NULL,
  `id_operador` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 1021
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`tb_formas_pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_formas_pagamento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `forma_de_pagamento` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 18
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`tb_fornecedores_obra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_fornecedores_obra` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_obra` INT(11) NULL DEFAULT NULL,
  `id_fornecedor` INT(11) NULL DEFAULT NULL,
  `valor` DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`tb_itens_bordero`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_itens_bordero` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_bordero` INT(11) NULL DEFAULT NULL,
  `razao_social` VARCHAR(255) NULL DEFAULT NULL,
  `n_nota_fiscal` VARCHAR(255) NULL DEFAULT NULL,
  `vencimento` DATE NULL DEFAULT NULL,
  `valor` DECIMAL(10,2) NULL DEFAULT NULL,
  `banco` VARCHAR(255) NULL DEFAULT NULL,
  `agencia` VARCHAR(255) NULL DEFAULT NULL,
  `conta` VARCHAR(255) NULL DEFAULT NULL,
  `documento` VARCHAR(255) NULL DEFAULT NULL,
  `operacao` VARCHAR(255) NULL DEFAULT NULL,
  `servico` INT(1) NULL DEFAULT '0',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 1281
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`tb_itens_caixinha`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_itens_caixinha` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_caixinha` INT(11) NULL DEFAULT NULL,
  `id_usuario` INT(11) NULL DEFAULT NULL,
  `data` DATETIME NULL DEFAULT NULL,
  `valor` DECIMAL(10,2) NULL DEFAULT NULL,
  `titulo` VARCHAR(255) NULL DEFAULT NULL,
  `obs` TEXT NULL DEFAULT NULL,
  `arquivo` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2928
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`tb_itens_equipamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_itens_equipamentos` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_equipamento` INT(11) NULL DEFAULT NULL,
  `nm_item_equipamento` VARCHAR(255) NOT NULL,
  `ds_item_equipamento` TEXT NOT NULL,
  `identificador_numerico` VARCHAR(255) NULL DEFAULT NULL,
  `valor_item_equipamento` DECIMAL(10,2) NOT NULL,
  `peso_item_equipamento` VARCHAR(255) NOT NULL,
  `obs_equipamento` TEXT NOT NULL,
  `foto1` VARCHAR(255) NOT NULL,
  `foto2` VARCHAR(255) NOT NULL,
  `foto3` VARCHAR(255) NOT NULL,
  `n_serie` VARCHAR(255) NULL DEFAULT NULL,
  `modelo` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 735
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_itens_orca_obra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_itens_orca_obra` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_obra` INT(11) NULL DEFAULT NULL,
  `id_fornecedor` INT(11) NULL DEFAULT NULL,
  `cod_item` VARCHAR(255) NULL DEFAULT NULL,
  `item` VARCHAR(255) NULL DEFAULT NULL,
  `unidade` VARCHAR(255) NULL DEFAULT NULL,
  `quantidade` VARCHAR(255) NULL DEFAULT NULL,
  `valor` DECIMAL(10,2) NULL DEFAULT NULL,
  `total` DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`tb_materiais_cotacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_materiais_cotacao` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_cotacao` INT(11) NULL DEFAULT NULL,
  `id_material` INT(11) NULL DEFAULT NULL,
  `id_marca` INT(11) NULL DEFAULT NULL,
  `qtd` DECIMAL(10,2) NULL DEFAULT '1.00',
  `status` INT(1) NULL DEFAULT '0',
  `observacoes` TEXT NULL DEFAULT NULL,
  `obs_solicitante` TEXT NULL DEFAULT NULL,
  `imagem` VARCHAR(255) NULL DEFAULT NULL,
  `imagem5` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 1578
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`tb_material_obra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_material_obra` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_obra` INT(11) NULL DEFAULT NULL,
  `data` DATE NULL DEFAULT NULL,
  `id_fornecedor` INT(11) NULL DEFAULT NULL,
  `arquivo` VARCHAR(255) NULL DEFAULT NULL,
  `valor` DECIMAL(10,2) NULL DEFAULT NULL,
  `id_operador` INT(11) NULL DEFAULT NULL,
  `obs` TEXT NULL DEFAULT NULL,
  `obs2` TEXT NULL DEFAULT NULL,
  `nota_fiscal` VARCHAR(255) NULL DEFAULT NULL,
  `status` INT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`tb_medicao_obra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_medicao_obra` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_obra` INT(11) NULL DEFAULT NULL,
  `data` DATE NULL DEFAULT NULL,
  `descricao` VARCHAR(255) NULL DEFAULT NULL,
  `arquivo` VARCHAR(255) NULL DEFAULT NULL,
  `valor` DECIMAL(10,2) NULL DEFAULT NULL,
  `id_operador` INT(11) NULL DEFAULT NULL,
  `obs` TEXT NULL DEFAULT NULL,
  `obs2` VARCHAR(255) NULL DEFAULT NULL,
  `nota_fiscal` VARCHAR(255) NULL DEFAULT NULL,
  `status` INT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 16
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`tb_medicao_orca_obra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_medicao_orca_obra` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_obra` INT(11) NULL DEFAULT NULL,
  `id_fornecedor` INT(11) NULL DEFAULT NULL,
  `data` DATE NULL DEFAULT NULL,
  `descricao_servico` VARCHAR(255) NULL DEFAULT NULL,
  `quantidade` VARCHAR(255) NULL DEFAULT NULL,
  `total` DECIMAL(10,2) NULL DEFAULT NULL,
  `porcentagem` DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`tb_notas_cotacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_notas_cotacao` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_cotacao` INT(11) NULL DEFAULT NULL,
  `id_fornecedor` INT(11) NULL DEFAULT NULL,
  `n_nota_fiscal` VARCHAR(255) NULL DEFAULT NULL,
  `arquivo` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 43
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`tb_octmov`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_octmov` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `idmov` VARCHAR(255) NOT NULL,
  `dt_soliMaterial` DATETIME NOT NULL,
  `dt_prevEntrega` DATETIME NOT NULL,
  `dt_recebeMaterial` VARCHAR(255) NOT NULL,
  `nm_respRecebimento` DATETIME NOT NULL,
  `dt_emissaoNF` VARCHAR(255) NOT NULL,
  `dt_NFFaturadaIni` DATETIME NOT NULL,
  `dt_NFFaturadaFim` VARCHAR(255) NOT NULL,
  `nu_nf` INT(255) NOT NULL,
  `vl_nf` INT(255) NOT NULL,
  `vencimentos` INT(255) NOT NULL,
  `tipo_material` INT(255) NOT NULL,
  `tipo_fornecimento` INT(255) NOT NULL,
  `historico_item` TEXT NOT NULL,
  `avaliacao` TEXT NOT NULL,
  `observacao` TEXT NOT NULL,
  `dt_entradaSede` INT(255) NOT NULL,
  `fg_aprovado` INT(255) NOT NULL,
  `dt_inseriuunidade` VARCHAR(255) NOT NULL,
  `dt_inseriusede` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_orcamento_anexo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_orcamento_anexo` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_orcamento` INT(255) NOT NULL,
  `anexo` VARCHAR(255) NOT NULL,
  `titulo` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_orcamento_faturamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_orcamento_faturamento` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_orcamento` INT(255) NOT NULL,
  `dt_inicial` DATETIME NOT NULL,
  `dt_final` DATETIME NOT NULL,
  `dt_faturamento` DATETIME NOT NULL,
  `vl_faturado` DECIMAL(10,2) NOT NULL,
  `sequencial` INT(255) NOT NULL,
  `fg_desprezarSaldo` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_orcamento_item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_orcamento_item` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_orcamento` INT(255) NOT NULL,
  `vl_cliente` DECIMAL(10,2) NOT NULL,
  `vl_empresa` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_ordem_servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_ordem_servico` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `dt_validacao` DATETIME NOT NULL,
  `tipo` INT(255) NOT NULL,
  `total_validado` DECIMAL(10,2) NOT NULL,
  `id_situacao` INT(255) NULL DEFAULT NULL,
  `os` VARCHAR(255) NULL DEFAULT NULL,
  `dt_os` DATETIME NULL DEFAULT NULL,
  `dt_inicio` DATETIME NULL DEFAULT NULL,
  `dt_termino` DATETIME NULL DEFAULT NULL,
  `prioridade` INT(255) NULL DEFAULT NULL,
  `dt_assinatura_cliente` DATETIME NULL DEFAULT NULL,
  `dt_assinatura_fiscal` DATETIME NULL DEFAULT NULL,
  `solicitante` VARCHAR(255) NULL DEFAULT NULL,
  `matricula` VARCHAR(255) NULL DEFAULT NULL,
  `ramal` VARCHAR(255) NULL DEFAULT NULL,
  `id_cliente` INT(255) NULL DEFAULT NULL,
  `id_clienteLocal` INT(255) NULL DEFAULT NULL,
  `id_clientePavimento` INT(255) NULL DEFAULT NULL,
  `id_clienteSetor` INT(255) NULL DEFAULT NULL,
  `id_categoria` INT(255) NOT NULL,
  `id_categoriaServico` INT(255) NULL DEFAULT NULL,
  `vl_global` DECIMAL(10,2) NULL DEFAULT NULL,
  `dt_situacao` DATETIME NULL DEFAULT NULL,
  `ds_servico` TEXT NULL DEFAULT NULL,
  `ds_conclusao` TEXT NULL DEFAULT NULL,
  `id_ss` INT(255) NULL DEFAULT NULL,
  `id_tb_ordem_servico_total` INT(255) NULL DEFAULT NULL,
  `id_equipamento` INT(11) NULL DEFAULT NULL,
  `dt_cancelamento` DATETIME NULL DEFAULT NULL,
  `usuario_cancelamento` VARCHAR(255) NULL DEFAULT NULL,
  `usuario_assinatura_fiscal` VARCHAR(255) NULL DEFAULT NULL,
  `usuario_assinatura_cliente` VARCHAR(255) NULL DEFAULT NULL,
  `telefone` VARCHAR(255) NULL DEFAULT NULL,
  `dt_faturamento` DATETIME NOT NULL,
  `usuario_validacao` INT(255) NOT NULL,
  `usuario_faturamento` INT(255) NOT NULL,
  `obs_os` TEXT NOT NULL,
  `id_item_equipamento` INT(11) NULL DEFAULT NULL,
  `fg_autorizado` VARCHAR(5) NULL DEFAULT 'S',
  `id_nivel_servico` INT(3) NULL DEFAULT NULL,
  `usuario_aprovacao` VARCHAR(255) NULL DEFAULT NULL,
  `ressalva_aprovacao` VARCHAR(255) NULL DEFAULT NULL,
  `cd_pess_exe` VARCHAR(255) NULL DEFAULT NULL,
  `dt_pess_exe` DATETIME NULL DEFAULT NULL,
  `cd_pess_ser` VARCHAR(255) NULL DEFAULT NULL,
  `dt_pess_ser` DATETIME NULL DEFAULT NULL,
  `usuario_recusa` VARCHAR(255) NULL DEFAULT NULL,
  `motivo_recusa` VARCHAR(255) NULL DEFAULT NULL,
  `n_cliente` VARCHAR(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 72600
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sgm`.`tb_ordem_servico_anexo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_ordem_servico_anexo` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_os` INT(255) NOT NULL,
  `anexo` VARCHAR(255) NOT NULL,
  `titulo` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 29
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_ordem_servico_foto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_ordem_servico_foto` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_os` INT(255) NOT NULL,
  `foto` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 36
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_ordem_servico_material`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_ordem_servico_material` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_os` INT(255) NOT NULL,
  `id_recebimentoNF` INT(255) NOT NULL,
  `IDPRD` VARCHAR(255) NOT NULL,
  `qtde` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
  `vl_unitario` DECIMAL(10,2) NULL DEFAULT NULL,
  `vl_total` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 128660
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_ordem_servico_mt_estoque`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_ordem_servico_mt_estoque` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_os` INT(11) NULL DEFAULT NULL,
  `id_recebimento` INT(11) NULL DEFAULT NULL,
  `IDPRD` VARCHAR(255) NULL DEFAULT NULL,
  `qtde` DECIMAL(10,2) NULL DEFAULT NULL,
  `vl_unitario` DECIMAL(10,2) NULL DEFAULT NULL,
  `vl_total` DECIMAL(10,2) NULL DEFAULT NULL,
  `id_materialnf` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 711453
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`tb_ordem_servico_obs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_ordem_servico_obs` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_os` INT(255) NOT NULL,
  `nm_obs_os` VARCHAR(255) NOT NULL,
  `ds_obs_os` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 44
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_ordem_servico_obs_fiscalizacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_ordem_servico_obs_fiscalizacao` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_os` INT(255) NOT NULL,
  `nm_obs_os` VARCHAR(255) NOT NULL,
  `ds_obs_os` TEXT NOT NULL,
  `cd_pessoaadd` VARCHAR(255) NULL DEFAULT NULL,
  `dataadd` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 72
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_ordem_servico_profissional`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_ordem_servico_profissional` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_os` INT(255) NOT NULL,
  `id_profissional` INT(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 2962
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_ordem_servico_total`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_ordem_servico_total` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_os` INT(255) NOT NULL,
  `valor_tb_ordem_servico_total` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_partitem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_partitem` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_item` INT(255) NOT NULL,
  `nm_item` VARCHAR(255) NOT NULL,
  `id_subgrupo` VARCHAR(255) NOT NULL,
  `id_tipo` INT(255) NOT NULL,
  `id_especificacao` INT(255) NOT NULL,
  `dt_inseriu` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_patcompra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_patcompra` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `nu_compra` VARCHAR(255) NOT NULL,
  `codcfo` VARCHAR(255) NOT NULL,
  `nu_nf` VARCHAR(255) NOT NULL,
  `dt_nf` DATETIME NOT NULL,
  `vl_totalnote` DECIMAL(10,2) NOT NULL,
  `vl_ajuste` DECIMAL(10,2) NOT NULL,
  `vl_totalizador` DECIMAL(10,2) NOT NULL,
  `fg_gerouPatri` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_patcompraitem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_patcompraitem` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_item` INT(255) NOT NULL,
  `id_compra` INT(255) NOT NULL,
  `id_marca` INT(255) NOT NULL,
  `qt_material` INT(255) NOT NULL,
  `vl_unitario` DECIMAL(10,2) NOT NULL,
  `nu_ca` VARCHAR(255) NOT NULL,
  `dt_ca` DATETIME NOT NULL,
  `cd_tipoVencimento` INT(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_patespecificacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_patespecificacao` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `nm_especificacao` VARCHAR(255) NOT NULL,
  `id_subgrupo` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_patgrupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_patgrupo` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `num_grupo` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_patmarca`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_patmarca` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `nm_marca` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_patmovimentacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_patmovimentacao` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_patrimonio` VARCHAR(255) NOT NULL,
  `id_secao` INT(255) NOT NULL,
  `id_pessoa` INT(255) NOT NULL,
  `id_situacao` INT(255) NOT NULL,
  `id_operador` INT(255) NOT NULL,
  `dt_movimentacao` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_patpessoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_patpessoa` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_rm` VARCHAR(255) NOT NULL,
  `nm_pessoa` VARCHAR(255) NOT NULL,
  `fg_almoxarife` INT(1) NOT NULL,
  `cpf` VARCHAR(255) NOT NULL,
  `id_funcao` VARCHAR(255) NOT NULL,
  `id_secao` INT(255) NOT NULL,
  `fg_status` INT(1) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_patpessoamovimentacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_patpessoamovimentacao` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_tipoMovimentacao` INT(255) NOT NULL,
  `id_pessoa` INT(255) NOT NULL,
  `id_secao` INT(255) NOT NULL,
  `nu_protocolo` VARCHAR(255) NOT NULL,
  `dt_movimentacao` DATE NOT NULL,
  `dt_saida` DATETIME NOT NULL,
  `dt_retorno` DATETIME NOT NULL,
  `nu_movimentacao` INT(255) NOT NULL,
  `ano_movimentacao` INT(4) NOT NULL,
  `us_inseriu` INT(255) NOT NULL,
  `dt_inseriu` DATETIME NOT NULL,
  `us_editou` INT(255) NOT NULL,
  `dt_editou` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_patremessa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_patremessa` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_secao` VARCHAR(255) NOT NULL,
  `id_pessoa` VARCHAR(255) NOT NULL,
  `nu_remessa` VARCHAR(255) NOT NULL,
  `dt_remessa` DATETIME NOT NULL,
  `fg_liberada` INT(1) NOT NULL,
  `obs` TEXT NOT NULL,
  `id_secaoorig` INT(255) NOT NULL,
  `id_sitremessa` INT(255) NOT NULL,
  `us_inseriu` INT(255) NOT NULL,
  `us_editou` INT(255) NOT NULL,
  `dt_editou` DATETIME NOT NULL,
  `dt_inseriu` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_patremessaitem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_patremessaitem` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_patrimonio` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_patrimonio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_patrimonio` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_patrimonio` VARCHAR(255) NOT NULL,
  `id_item` VARCHAR(255) NOT NULL,
  `id_situacao` INT(255) NOT NULL,
  `id_marca` INT(255) NOT NULL,
  `id_compra` INT(255) NOT NULL,
  `vl_aquisicao` DECIMAL(10,2) NOT NULL,
  `nu_patrimonio` VARCHAR(255) NOT NULL,
  `id_secao` INT(255) NOT NULL,
  `id_pessoa` INT(255) NOT NULL,
  `id_compraitem` INT(255) NOT NULL,
  `id_remessa` INT(255) NOT NULL,
  `nu_ca` VARCHAR(255) NOT NULL,
  `dt_ca` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_patrimonio_ca`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_patrimonio_ca` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `cd_patrimonio` VARCHAR(255) NOT NULL,
  `dt_caVencto` DATE NOT NULL,
  `nu_ca` VARCHAR(255) NOT NULL,
  `id_tipoVencimento` INT(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_patsitremessa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_patsitremessa` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `nm_sitremessa` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_patsituacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_patsituacao` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `nm_situacao` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_patsubgrupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_patsubgrupo` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_grupo` INT(255) NOT NULL,
  `nm_subgrupo` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_pattipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_pattipo` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `nm_tipo` VARCHAR(255) NOT NULL,
  `id_subgrupo` INT(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_pattipomovimentacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_pattipomovimentacao` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `nm_movimentacao` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_pattipovencimento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_pattipovencimento` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `nm_tipoVencimento` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_plano_manutencao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_plano_manutencao` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `nm_plano` VARCHAR(255) NOT NULL DEFAULT '0',
  `id_equipGrupoManutencao` INT(11) NOT NULL DEFAULT '0',
  `dt_inicio` DATETIME NOT NULL,
  `dt_termino` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_preventiva_faturamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_preventiva_faturamento` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `dt_inicial` DATETIME NOT NULL,
  `dt_final` DATETIME NOT NULL,
  `dt_referencia` DATETIME NOT NULL,
  `vl_faturado` DECIMAL(10,2) NOT NULL,
  `sequencial` INT(255) NOT NULL,
  `id_ccusto` INT(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_prioridade_compra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_prioridade_compra` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `prioridade` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`tb_privilegios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_privilegios` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_usuario` INT(255) NOT NULL,
  `master` INT(1) NOT NULL,
  `cargo_visualizacao` INT(1) NOT NULL,
  `cargo_cadastro` INT(1) NOT NULL,
  `cargo_edicao` INT(1) NOT NULL,
  `cargo_exclusao` INT(1) NOT NULL,
  `clientes_visualizacao` INT(1) NULL DEFAULT NULL,
  `clientes_cadastro` INT(1) NULL DEFAULT NULL,
  `clientes_edicao` INT(1) NULL DEFAULT NULL,
  `clientes_exclusao` INT(1) NULL DEFAULT NULL,
  `categorias_visualizacao` INT(1) NOT NULL,
  `categorias_cadastro` INT(1) NOT NULL,
  `categorias_edicao` INT(1) NOT NULL,
  `categorias_exclusao` INT(1) NOT NULL,
  `cateservico_visualizacao` INT(1) NOT NULL,
  `cateservico_cadastro` INT(1) NOT NULL,
  `cateservico_edicao` INT(1) NOT NULL,
  `cateservico_exclusao` INT(1) NOT NULL,
  `esferas_visualizacao` INT(1) NOT NULL,
  `esferas_cadastro` INT(1) NOT NULL,
  `esferas_edicao` INT(1) NOT NULL,
  `esferas_exclusao` INT(1) NOT NULL,
  `feriados_visualizacao` INT(1) NOT NULL,
  `feriados_cadastro` INT(1) NOT NULL,
  `feriados_edicao` INT(1) NOT NULL,
  `feriados_exclusao` INT(1) NOT NULL,
  `unidades_visualizacao` INT(1) NOT NULL,
  `unidades_cadastro` INT(1) NOT NULL,
  `unidades_edicao` INT(1) NOT NULL,
  `unidades_exclusao` INT(1) NOT NULL,
  `grupos_material_visualizacao` INT(1) NOT NULL,
  `grupos_material_cadastro` INT(1) NOT NULL,
  `grupos_material_edicao` INT(1) NOT NULL,
  `grupos_material_exclusao` INT(1) NOT NULL,
  `material_visualizacao` INT(1) NOT NULL,
  `material_cadastro` INT(1) NOT NULL,
  `material_edicao` INT(1) NOT NULL,
  `material_exclusao` INT(1) NOT NULL,
  `tipo_os_visualizacao` INT(1) NOT NULL,
  `tipo_os_cadastro` INT(1) NOT NULL,
  `tipo_os_edicao` INT(1) NOT NULL,
  `tipo_os_exclusao` INT(1) NOT NULL,
  `situacao_ss_visualizacao` INT(1) NOT NULL,
  `situacao_ss_cadastro` INT(1) NOT NULL,
  `situacao_ss_edicao` INT(1) NOT NULL,
  `situacao_ss_exclusao` INT(1) NOT NULL,
  `situacao_os_visualizacao` INT(1) NOT NULL,
  `situacao_os_cadastro` INT(1) NOT NULL,
  `situacao_os_edicao` INT(1) NOT NULL,
  `situacao_os_exclusao` INT(1) NOT NULL,
  `prioridade_os_visualizacao` INT(1) NOT NULL,
  `prioridade_os_cadastro` INT(1) NOT NULL,
  `prioridade_os_edicao` INT(1) NOT NULL,
  `prioridade_os_exclusao` INT(1) NOT NULL,
  `cad_rel_visualizacao` INT(1) NOT NULL,
  `cad_rel_cadastro` INT(1) NOT NULL,
  `cad_rel_edicao` INT(1) NOT NULL,
  `cad_rel_exclusao` INT(1) NOT NULL,
  `grupos_equipamento_visualizacao` INT(1) NOT NULL,
  `grupos_equipamento_cadastro` INT(1) NOT NULL,
  `grupos_equipamento_edicao` INT(1) NOT NULL,
  `grupos_equipamento_exclusao` INT(1) NOT NULL,
  `subgrupos_equipamento_visualizacao` INT(1) NOT NULL,
  `subgrupos_equipamento_cadastro` INT(1) NOT NULL,
  `subgrupos_equipamento_edicao` INT(1) NOT NULL,
  `subgrupos_equipamento_exclusao` INT(1) NOT NULL,
  `classes_equipamento_visualizacao` INT(1) NOT NULL,
  `classes_equipamento_cadastro` INT(1) NOT NULL,
  `classes_equipamento_edicao` INT(1) NOT NULL,
  `classes_equipamento_exclusao` INT(1) NOT NULL,
  `situacao_equipamento_visualizacao` INT(1) NOT NULL,
  `situacao_equipamento_cadastro` INT(1) NOT NULL,
  `situacao_equipamento_edicao` INT(1) NOT NULL,
  `situacao_equipamento_exclusao` INT(1) NOT NULL,
  `marcas_equipamento_visualizacao` INT(1) NOT NULL,
  `marcas_equipamento_cadastro` INT(1) NOT NULL,
  `marcas_equipamento_edicao` INT(1) NOT NULL,
  `marcas_equipamento_exclusao` INT(1) NOT NULL,
  `modelos_equipamento_visualizacao` INT(1) NOT NULL,
  `modelos_equipamento_cadastro` INT(1) NOT NULL,
  `modelos_equipamento_edicao` INT(1) NOT NULL,
  `modelos_equipamento_exclusao` INT(1) NOT NULL,
  `equipamento_visualizacao` INT(1) NOT NULL,
  `equipamento_cadastro` INT(1) NOT NULL,
  `equipamento_edicao` INT(1) NOT NULL,
  `equipamento_exclusao` INT(1) NOT NULL,
  `profissional_visualizacao` INT(1) NOT NULL,
  `profissional_cadastro` INT(1) NOT NULL,
  `profissional_edicao` INT(1) NOT NULL,
  `profissional_exclusao` INT(1) NOT NULL,
  `estoque_visualizacao` INT(1) NOT NULL,
  `estoque_cadastro` INT(1) NOT NULL,
  `estoque_edicao` INT(1) NOT NULL,
  `estoque_exclusao` INT(1) NOT NULL,
  `ss_visualizacao` INT(1) NOT NULL,
  `ss_exclusao` INT(1) NOT NULL,
  `ss_orcar` INT(1) NOT NULL,
  `os_visualizacao` INT(1) NOT NULL,
  `os_cadastro` INT(1) NOT NULL,
  `os_edicao` INT(1) NOT NULL,
  `os_exclusao` INT(1) NOT NULL,
  `os_cancelar` INT(1) NOT NULL,
  `os_validar` INT(1) NOT NULL,
  `os_finalizar` INT(1) NOT NULL,
  `resp_tec_visualizacao` INT(1) NOT NULL,
  `resp_tec_cadastro` INT(1) NOT NULL,
  `resp_tec_edicao` INT(1) NOT NULL,
  `resp_tec_exclusao` INT(1) NOT NULL,
  `obras_visualizacao` INT(1) NOT NULL,
  `obras_cadastro` INT(1) NOT NULL,
  `obras_edicao` INT(1) NOT NULL,
  `obras_exclusao` INT(1) NOT NULL,
  `obras_data` INT(1) NULL DEFAULT '0',
  `relatorios_visualizacao` INT(1) NOT NULL,
  `validar_manutencao` INT(1) NOT NULL DEFAULT '0',
  `obras_diario` INT(11) NULL DEFAULT '0',
  `bordero_visualizacao` INT(1) NULL DEFAULT NULL,
  `bordero_cadastro` INT(1) NULL DEFAULT NULL,
  `bordero_edicao` INT(1) NULL DEFAULT NULL,
  `bordero_exclusao` INT(1) NULL DEFAULT NULL,
  `compras_visualizacao` INT(11) NULL DEFAULT NULL,
  `compras_cadastro` INT(11) NULL DEFAULT NULL,
  `compras_edicao` INT(11) NULL DEFAULT NULL,
  `compras_exclusao` INT(11) NULL DEFAULT NULL,
  `status_compra` INT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 434
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`tb_registro_plano_manutencao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_registro_plano_manutencao` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_plano` INT(11) NULL DEFAULT NULL,
  `id_equipamento` INT(11) NULL DEFAULT NULL,
  `id_classe_plano_manutencao` INT(11) NULL DEFAULT NULL,
  `dt_realizacao` DATETIME NULL DEFAULT NULL,
  `id_profissional` INT(11) NULL DEFAULT NULL,
  `observacoes` TEXT NULL DEFAULT NULL,
  `id_fiscal` INT(11) NULL DEFAULT NULL,
  `status` INT(11) NULL DEFAULT '0',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 58
DEFAULT CHARACTER SET = latin1
ROW_FORMAT = DYNAMIC;


-- -----------------------------------------------------
-- Table `sgm`.`tb_situacao_cotacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_situacao_cotacao` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `situacao` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`tb_solicitacao_servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_solicitacao_servico` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `ss` VARCHAR(255) NOT NULL,
  `dt_ss` DATETIME NOT NULL,
  `tipo` INT(255) NOT NULL,
  `id_cliente` INT(255) NOT NULL,
  `id_clienteLocal` INT(255) NOT NULL,
  `id_clientePavimento` INT(255) NOT NULL,
  `id_clienteSetor` INT(255) NOT NULL,
  `id_operador` INT(255) NOT NULL,
  `id_situacaoSS` INT(255) NOT NULL,
  `ds_servico` TEXT NOT NULL,
  `dt_autorizacao_ss` DATETIME NULL DEFAULT NULL,
  `dt_cancelamento_ss` DATETIME NULL DEFAULT NULL,
  `dt_modificacao_ss` DATETIME NULL DEFAULT NULL,
  `usuario_autorizador_ss` INT(255) NULL DEFAULT NULL,
  `usuario_cancelamento` INT(255) NULL DEFAULT NULL,
  `prioridade` INT(255) NOT NULL,
  `imagem1` VARCHAR(255) NULL DEFAULT NULL,
  `imagem2` VARCHAR(255) NULL DEFAULT NULL,
  `imagem3` VARCHAR(255) NULL DEFAULT NULL,
  `id_equipamento` INT(11) NULL DEFAULT NULL,
  `id_item_equipamento` INT(11) NULL DEFAULT NULL,
  `tipo_ss` INT(11) NULL DEFAULT '0',
  `descricao_negacao_orcamento` TEXT NULL DEFAULT NULL,
  `visitado` CHAR(1) NULL DEFAULT '0',
  `foto1` VARCHAR(255) NULL DEFAULT NULL,
  `foto2` VARCHAR(255) NULL DEFAULT NULL,
  `foto3` VARCHAR(255) NULL DEFAULT NULL,
  `ressalva_aprovacao` VARCHAR(500) NULL DEFAULT NULL,
  `motivo_cancelamento` LONGTEXT NULL DEFAULT NULL,
  `usuario_reprovador` INT(5) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 90061
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_solicitacao_servico_material`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_solicitacao_servico_material` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_ss` INT(255) NOT NULL,
  `IDPRD` VARCHAR(255) NOT NULL,
  `qtde` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
  `vl_unitario` DECIMAL(10,2) NOT NULL,
  `vl_total` DECIMAL(10,2) NOT NULL,
  `tipo` INT(11) NULL DEFAULT '0',
  `arquivo` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 8727
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_subgrupos_plano_manutencao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_subgrupos_plano_manutencao` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_plano` INT(11) NULL DEFAULT NULL,
  `id_equipSubgrupoManutencao` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`tb_tsmeses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_tsmeses` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `sg_mes` VARCHAR(255) NOT NULL,
  `nm_mes` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tb_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NULL DEFAULT NULL,
  `usuario` VARCHAR(255) NULL DEFAULT NULL,
  `codigo` VARCHAR(255) NULL DEFAULT NULL,
  `senha` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`tb_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_usuario` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `usuario` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  `codigo` VARCHAR(1000) NULL DEFAULT NULL,
  `id_cliente` TEXT NULL DEFAULT NULL,
  `aprovador` VARCHAR(255) NULL DEFAULT NULL,
  `foto` VARCHAR(255) NULL DEFAULT NULL,
  `limite` DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 65
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`tb_usuario_geral`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_usuario_geral` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(255) NULL DEFAULT NULL,
  `login` VARCHAR(255) NULL DEFAULT NULL,
  `senha` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB
AUTO_INCREMENT = 155
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`tb_valores_cotacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_valores_cotacao` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_cotacao` INT(11) NULL DEFAULT NULL,
  `id_material_cotacao` INT(11) NULL DEFAULT NULL,
  `id_fornecedor` INT(11) NULL DEFAULT NULL,
  `valor_unitario` DECIMAL(10,2) NULL DEFAULT NULL,
  `id_forma_pagamento` INT(11) NULL DEFAULT NULL,
  `prazo_entrega` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 1096
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`tb_valores_cotacao_aprovado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tb_valores_cotacao_aprovado` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_cotacao` INT(11) NULL DEFAULT NULL,
  `id_valor_cotacao` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 107
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sgm`.`tr_coluna`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tr_coluna` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_informacao` VARCHAR(255) NOT NULL,
  `coluna` VARCHAR(255) NOT NULL,
  `apelido` VARCHAR(255) NOT NULL,
  `tipo` VARCHAR(255) NOT NULL,
  `ordem` VARCHAR(255) NOT NULL,
  `filtro` VARCHAR(255) NOT NULL,
  `sequencial` INT(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tr_coluna2`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tr_coluna2` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `coluna` VARCHAR(255) NOT NULL,
  `apelido` VARCHAR(255) NOT NULL,
  `tipo` VARCHAR(255) NOT NULL,
  `ordem` VARCHAR(255) NOT NULL,
  `filtro` VARCHAR(255) NOT NULL,
  `sequencial` INT(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tr_informacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tr_informacao` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `informacao` VARCHAR(255) NOT NULL,
  `from` TEXT NOT NULL,
  `where` TEXT NOT NULL,
  `fg_fiscal` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`tr_parametro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`tr_parametro` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `rotina` VARCHAR(255) NOT NULL,
  `coluna` VARCHAR(255) NOT NULL,
  `apelido` VARCHAR(255) NOT NULL,
  `tipo` VARCHAR(255) NOT NULL,
  `ordem` VARCHAR(255) NOT NULL,
  `filtro` VARCHAR(255) NOT NULL,
  `sequencial` INT(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ts_menu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ts_menu` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ts_menu_acesso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ts_menu_acesso` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_menu` INT(255) NOT NULL,
  `id_operador` INT(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ts_operador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ts_operador` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `id_empresa` INT(255) NOT NULL,
  `nm_operador` VARCHAR(255) NOT NULL,
  `cpf` VARCHAR(255) NOT NULL,
  `matricula` VARCHAR(255) NOT NULL,
  `login` VARCHAR(255) NOT NULL,
  `psw` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `id_pergunta` INT(255) NOT NULL,
  `resposta` VARCHAR(255) NOT NULL,
  `status` INT(1) NOT NULL,
  `id_perfil` INT(255) NOT NULL,
  `id_perfilBlog` INT(255) NOT NULL,
  `dt_cadastro` DATETIME NOT NULL,
  `dt_alteracao` DATETIME NOT NULL,
  `obs` TEXT NOT NULL,
  `assinatura_digitalizada` VARCHAR(255) NOT NULL,
  `rubrica_digital` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ts_parametro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ts_parametro` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `exercicio` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ts_perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ts_perfil` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `ds_perfil` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sgm`.`ts_pergunta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`ts_pergunta` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `ds_pergunta` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

USE `sgm` ;

-- -----------------------------------------------------
-- Placeholder table for view `sgm`.`z_faturamento_2`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`z_faturamento_2` (`ds_clienteLocal` INT, `qtde` INT, `vl_unitario` INT, `id_situacao` INT, `id` INT, `nome_empresa` INT, `os` INT, `total_validado` INT, `dt_validacao` INT, `ta_tipo_os` INT, `ds_categoria` INT, `dt_os` INT, `BDI` INT, `Ident` INT, `sum(vl_total)` INT, `Id_OS_Principal` INT);

-- -----------------------------------------------------
-- Placeholder table for view `sgm`.`z_faturamento_sco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`z_faturamento_sco` (`TotalSCO` INT, `id_os` INT);

-- -----------------------------------------------------
-- Placeholder table for view `sgm`.`z_relatorio_estoque`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`z_relatorio_estoque` (`sum(vl_total)` INT, `id_os` INT);

-- -----------------------------------------------------
-- Placeholder table for view `sgm`.`z_setores_pavimentos_clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`z_setores_pavimentos_clientes` (`Nome do cliente` INT, `Nome do local` INT, `Pavimentos` INT, `Setores dos locais` INT, `Id do Pavimento` INT, `Id do Cliente` INT);

-- -----------------------------------------------------
-- Placeholder table for view `sgm`.`z_teste_fatura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`z_teste_fatura` (`ds_clienteLocal` INT, `qtde` INT, `vl_unitario` INT, `id_situacao` INT, `id` INT, `nome_empresa` INT, `os` INT, `total_validado` INT, `dt_validacao` INT, `ta_tipo_os` INT, `ds_categoria` INT, `dt_os` INT, `BDI` INT, `Ident` INT, `sum(vl_total)` INT, `Id_OS_Principal` INT);

-- -----------------------------------------------------
-- Placeholder table for view `sgm`.`z_total_bordero_uti`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`z_total_bordero_uti` (`razao_social` INT, `documento` INT, `Valor_Geral` INT);

-- -----------------------------------------------------
-- Placeholder table for view `sgm`.`z_total_validado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`z_total_validado` (`nome_empresa` INT, `ds_clientelocal` INT, `os` INT, `dt_os` INT, `prioridade` INT, `Total` INT);

-- -----------------------------------------------------
-- Placeholder table for view `sgm`.`z_usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sgm`.`z_usuarios` (`nm_operador` INT, `login` INT, `psw` INT);

-- -----------------------------------------------------
-- View `sgm`.`z_faturamento_2`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sgm`.`z_faturamento_2`;
USE `sgm`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sgm`.`z_faturamento_2` AS select `ta_cliente_local1`.`ds_clienteLocal` AS `ds_clienteLocal`,`tb_ordem_servico_material1`.`qtde` AS `qtde`,`tb_ordem_servico_material1`.`vl_unitario` AS `vl_unitario`,`tb_ordem_servico1`.`id_situacao` AS `id_situacao`,`ta_cliente_fornecedor1`.`id` AS `id`,`ta_cliente_fornecedor1`.`nome_empresa` AS `nome_empresa`,`tb_ordem_servico1`.`os` AS `os`,`tb_ordem_servico1`.`total_validado` AS `total_validado`,`tb_ordem_servico1`.`dt_validacao` AS `dt_validacao`,`ta_tipo_os1`.`ta_tipo_os` AS `ta_tipo_os`,`ta_categoria1`.`ds_categoria` AS `ds_categoria`,`tb_ordem_servico1`.`dt_os` AS `dt_os`,`ta_contrato1`.`BDI` AS `BDI`,`tb_ordem_servico1`.`id` AS `Ident`,`z_relatorio_estoque1`.`sum(vl_total)` AS `sum(vl_total)`,`tb_ordem_servico1`.`id` AS `Id_OS_Principal` from ((((((`sgm`.`tb_ordem_servico` `tb_ordem_servico1` join `sgm`.`tb_ordem_servico_material` `tb_ordem_servico_material1` on((`tb_ordem_servico1`.`id` = `tb_ordem_servico_material1`.`id_os`))) join `sgm`.`ta_cliente_local` `ta_cliente_local1` on((`tb_ordem_servico1`.`id_clienteLocal` = `ta_cliente_local1`.`id`))) join `sgm`.`ta_tipo_os` `ta_tipo_os1` on((`tb_ordem_servico1`.`tipo` = `ta_tipo_os1`.`id`))) join `sgm`.`ta_categoria` `ta_categoria1` on((`tb_ordem_servico1`.`id_categoria` = `ta_categoria1`.`id`))) join `sgm`.`z_relatorio_estoque` `z_relatorio_estoque1` on((`tb_ordem_servico1`.`id` = `z_relatorio_estoque1`.`id_os`))) join (`sgm`.`ta_contrato` `ta_contrato1` join `sgm`.`ta_cliente_fornecedor` `ta_cliente_fornecedor1` on((`ta_contrato1`.`id_cliente` = `ta_cliente_fornecedor1`.`id`))) on((`ta_cliente_local1`.`id_cliente` = `ta_cliente_fornecedor1`.`id`))) where ((`tb_ordem_servico1`.`id_situacao` = 6) and (`ta_cliente_fornecedor1`.`id` > 0) and (`tb_ordem_servico1`.`dt_validacao` >= TIMESTAMP'2023-06-01 00:00:00') and (`tb_ordem_servico1`.`dt_validacao` < TIMESTAMP'2050-12-31 23:59:59')) order by `ta_cliente_local1`.`ds_clienteLocal`;

-- -----------------------------------------------------
-- View `sgm`.`z_faturamento_sco`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sgm`.`z_faturamento_sco`;
USE `sgm`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sgm`.`z_faturamento_sco` AS select sum(`sgm`.`tb_ordem_servico_material`.`vl_total`) AS `TotalSCO`,`sgm`.`tb_ordem_servico_material`.`id_os` AS `id_os` from `sgm`.`tb_ordem_servico_material` group by `sgm`.`tb_ordem_servico_material`.`id_os`;

-- -----------------------------------------------------
-- View `sgm`.`z_relatorio_estoque`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sgm`.`z_relatorio_estoque`;
USE `sgm`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sgm`.`z_relatorio_estoque` AS select sum(`sgm`.`tb_ordem_servico_mt_estoque`.`vl_total`) AS `sum(vl_total)`,`sgm`.`tb_ordem_servico_mt_estoque`.`id_os` AS `id_os` from `sgm`.`tb_ordem_servico_mt_estoque` group by `sgm`.`tb_ordem_servico_mt_estoque`.`id_os`;

-- -----------------------------------------------------
-- View `sgm`.`z_setores_pavimentos_clientes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sgm`.`z_setores_pavimentos_clientes`;
USE `sgm`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sgm`.`z_setores_pavimentos_clientes` AS select `c`.`nome_empresa` AS `Nome do cliente`,`l`.`ds_clienteLocal` AS `Nome do local`,`p`.`ds_clientePavimento` AS `Pavimentos`,`s`.`ds_clienteSetor` AS `Setores dos locais`,`p`.`id` AS `Id do Pavimento`,`c`.`id` AS `Id do Cliente` from (((`sgm`.`ta_cliente_fornecedor` `c` join `sgm`.`ta_cliente_local` `l`) join `sgm`.`ta_cliente_pavimento` `p`) join `sgm`.`ta_cliente_setor` `s`) where ((`c`.`id` = `l`.`id_cliente`) and (`l`.`id` = `p`.`id_clienteLocal`) and (`p`.`id` = `s`.`id_clientePavimento`)) group by `c`.`nome_empresa`,`l`.`ds_clienteLocal`,`p`.`ds_clientePavimento`,`s`.`ds_clienteSetor`,`p`.`id` order by `c`.`nome_empresa`,`l`.`ds_clienteLocal`;

-- -----------------------------------------------------
-- View `sgm`.`z_teste_fatura`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sgm`.`z_teste_fatura`;
USE `sgm`;
CREATE  OR REPLACE ALGORITHM=MERGE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sgm`.`z_teste_fatura` AS select `ta_cliente_local1`.`ds_clienteLocal` AS `ds_clienteLocal`,`tb_ordem_servico_material1`.`qtde` AS `qtde`,`tb_ordem_servico_material1`.`vl_unitario` AS `vl_unitario`,`tb_ordem_servico1`.`id_situacao` AS `id_situacao`,`ta_cliente_fornecedor1`.`id` AS `id`,`ta_cliente_fornecedor1`.`nome_empresa` AS `nome_empresa`,`tb_ordem_servico1`.`os` AS `os`,`tb_ordem_servico1`.`total_validado` AS `total_validado`,`tb_ordem_servico1`.`dt_validacao` AS `dt_validacao`,`ta_tipo_os1`.`ta_tipo_os` AS `ta_tipo_os`,`ta_categoria1`.`ds_categoria` AS `ds_categoria`,`tb_ordem_servico1`.`dt_os` AS `dt_os`,`ta_contrato1`.`BDI` AS `BDI`,`tb_ordem_servico1`.`id` AS `Ident`,`z_relatorio_estoque1`.`sum(vl_total)` AS `sum(vl_total)`,`tb_ordem_servico1`.`id` AS `Id_OS_Principal` from ((((((`sgm`.`tb_ordem_servico` `tb_ordem_servico1` join `sgm`.`tb_ordem_servico_material` `tb_ordem_servico_material1` on((`tb_ordem_servico1`.`id` = `tb_ordem_servico_material1`.`id_os`))) join `sgm`.`ta_cliente_local` `ta_cliente_local1` on((`tb_ordem_servico1`.`id_clienteLocal` = `ta_cliente_local1`.`id`))) join `sgm`.`ta_tipo_os` `ta_tipo_os1` on((`tb_ordem_servico1`.`tipo` = `ta_tipo_os1`.`id`))) join `sgm`.`ta_categoria` `ta_categoria1` on((`tb_ordem_servico1`.`id_categoria` = `ta_categoria1`.`id`))) join `sgm`.`z_relatorio_estoque` `z_relatorio_estoque1` on((`tb_ordem_servico1`.`id` = `z_relatorio_estoque1`.`id_os`))) join (`sgm`.`ta_contrato` `ta_contrato1` join `sgm`.`ta_cliente_fornecedor` `ta_cliente_fornecedor1` on((`ta_contrato1`.`id_cliente` = `ta_cliente_fornecedor1`.`id`))) on((`ta_cliente_local1`.`id_cliente` = `ta_cliente_fornecedor1`.`id`))) where ((`tb_ordem_servico1`.`id_situacao` = 6) and (`ta_cliente_fornecedor1`.`id` > 0) and (`tb_ordem_servico1`.`dt_validacao` >= TIMESTAMP'2010-01-01 00:00:00') and (`tb_ordem_servico1`.`dt_validacao` < TIMESTAMP'2050-12-31 23:59:59')) order by `ta_cliente_local1`.`ds_clienteLocal`;

-- -----------------------------------------------------
-- View `sgm`.`z_total_bordero_uti`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sgm`.`z_total_bordero_uti`;
USE `sgm`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sgm`.`z_total_bordero_uti` AS select `i`.`razao_social` AS `razao_social`,`i`.`documento` AS `documento`,sum(`i`.`valor`) AS `Valor_Geral` from (`sgm`.`tb_itens_bordero` `i` join `sgm`.`tb_bordero` `b`) where ((`i`.`id_bordero` = `b`.`id`) and (`b`.`id_obra` = '6')) group by `i`.`razao_social`;

-- -----------------------------------------------------
-- View `sgm`.`z_total_validado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sgm`.`z_total_validado`;
USE `sgm`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sgm`.`z_total_validado` AS select `c`.`nome_empresa` AS `nome_empresa`,`l`.`ds_clienteLocal` AS `ds_clientelocal`,`s`.`os` AS `os`,`s`.`dt_os` AS `dt_os`,`s`.`prioridade` AS `prioridade`,round((((`s`.`total_validado` * `t`.`BDI`) / 100) + `s`.`total_validado`),2) AS `Total` from (((`sgm`.`tb_ordem_servico` `s` join `sgm`.`ta_cliente_fornecedor` `c`) join `sgm`.`ta_cliente_local` `l`) join `sgm`.`ta_contrato` `t`) where ((`s`.`id_cliente` = `c`.`id`) and (`c`.`id` = `l`.`id_cliente`) and (`t`.`id_cliente` = `c`.`id`)) group by `l`.`ds_clienteLocal`,`s`.`os`,`s`.`dt_os`,`s`.`prioridade` order by `c`.`nome_empresa`,`l`.`ds_clienteLocal`;

-- -----------------------------------------------------
-- View `sgm`.`z_usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sgm`.`z_usuarios`;
USE `sgm`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sgm`.`z_usuarios` AS select `sgm`.`ta_cliente_operador`.`nm_operador` AS `nm_operador`,`sgm`.`ta_cliente_operador`.`login` AS `login`,`sgm`.`ta_cliente_operador`.`psw` AS `psw` from `sgm`.`ta_cliente_operador` union select `sgm`.`tb_usuario`.`nome` AS `nome`,`sgm`.`tb_usuario`.`usuario` AS `usuario`,`sgm`.`tb_usuario`.`senha` AS `senha` from `sgm`.`tb_usuario`;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
