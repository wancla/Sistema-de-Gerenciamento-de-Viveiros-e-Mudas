<?php
namespace Src\database;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Model\ClassConexao;
use App\Model\ClassUser;
use Src\Classes\ClassPassword;
use Src\Classes\ClassValidate;
use PDO;
/**
 * Description of ClassDatabase
 *
 * @author Wanclei <wanclei.santos@fatec.sp.gov.br>
 */
class ClassDatabase extends ClassConexao{
    //put your code here
   private $nameDB = DB;
    /**
     * Cria uma base de dados
     * 
     *   
    public function createDB(){
        try{
            $con=$this->conexaoDB();
            $con=$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
            $stmt="CREATE DATABASE IF NOT EXISTS {$this->nameDB}";
            $con->exec($stmt);
            $stmt="ALTER DATABASE $this->nameDB CHARSET = UTF8 COLLATE = utf8_general_ci;";
            $con->exec($stmt);
            echo "database=> criada com sucesso!<br>";
        } catch (PDOException $e) {
            echo $stmt . "<br>" .$e->getMessage();
        }
    }
    /**
     * 
     */
     private function insertAdministrador(){
         $validate = new ClassValidate();
         $user = "admin";
         $senha = "@dmin0000";
         $password = new ClassPassword($senha);
         $hash= $password->passwordHash($senha);
         $verify=$validate->validateUsuario($user);
       
       
        
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d H:i');
        
        if($verify == false){
            echo "O sistema ja possui um administrador <br>";
        }else{
            $nome = "Administrador do Sistema";
            $usuario = "admin";
            $email = "sgvmroot00@gmail.com";
            $tipo = "admin"; 
            $status = "ativo"; 
            $arrVar=[
                "nome"=>$nome,
                "usuario"=>$usuario,
                "hashSenha"=>$hash,
                "email"=>$email,                
                "tipo"=>$tipo,
                "data"=>$date,
                "status"=>$status
            ];       
           $validate->validateFinal($arrVar);
           echo '<div class="" style="color:red; font-weight:bold;">'.$validate->getErro().'</div>';
           echo "usuario administrador criado!<br>";
        }     
        
        
    }
    /**
     * @author Wanclei <wanclei.santos@fatec.sp.gov.br>
     * cria a tabela usuario
     * 
     */
    public function createTableUserDB(){
        try{
            $con=$this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt="use ".$this->nameDB;
            $con->exec($stmt);
            $stmt="CREATE TABLE IF NOT EXISTS tb_users("
                    . "id int (4) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,"
                    . "nome varchar (100),"
                    . "usuario varchar (30),"
                    . "hashSenha varchar(255),"
                    . "email varchar(100),"
                    . "tipo varchar(30),"
                    . "data datetime,"
                    . "status varchar(15)"
                    . ")AUTO_INCREMENT=1 ENGINE=INNODB";
            $con->exec($stmt);
            
            if($con == true){
                $this->insertAdministrador();
            }
            echo "tb_users=> criado com sucesso!<br>";
        } catch (PDOException $e) {
           echo $stmt . "<br>" .$e->getMessage(); 
        }
    }
    /**
     * @author Wanclei <wanclei.santos@fatec.sp.gov.br>
     * 
     * 
     */
    public function createTableAttemptDB(){
        try{
           $con=$this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt="use ".$this->nameDB;
            $con->exec($stmt);
            $stmt="";
            $stmt="CREATE TABLE IF NOT EXISTS tb_attempt("
                    . "id int (4) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,"
                    . "ip varchar (20),"
                    . "data datetime"
                    . ")AUTO_INCREMENT=1 ENGINE=INNODB";
            $con->exec($stmt);
            echo "tb_attempt=>,criado com sucesso!<br>";
        } catch (PDOException $e) {
            echo $stmt . "<br>" .$e->getMessage(); 
        }
    }
    /**
     * 
     * 
     */
    public function createTableConfirmation(){
        try{
            $con=$this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt="use ".$this->nameDB;
            $con->exec($stmt);
            $stmt="";
            $stmt="CREATE TABLE IF NOT EXISTS tb_confirmation("
                    . "id int (4) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,"
                    . "email varchar (90),"
                    . "token text"
                    . ")AUTO_INCREMENT=1 ENGINE=INNODB";
            $con->exec($stmt);
            echo "tb_confirmation=> criada a tabela com sucesso!<br>";
        } catch (PDOException $e) {
            echo $stmt . "<br>" .$e->getMessage(); 
        }
    }
    /**
     * 
     * 
     */
    public function createTableEspecies(){
        try{
            $con=$this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt="use ".$this->nameDB;
            $con->exec($stmt);
            $stmt="";
            $stmt="CREATE TABLE IF NOT EXISTS tb_especies("
                    . "id int (4) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,"
                    . "nPopular varchar(20),"
                    . "nCientifico varchar(30),"
                    . "familia varchar (15),"
                    . "classeSucessional varchar(20),"
                    . "extincao varchar(15),"
                    . "dispersao varchar(20),"
                    . "habito varchar(10),"
                    . "bioma varchar(20),"
                    . "categoria varchar(15),"
                    . "indicacao varchar(25),"
                    . "descricao varchar(255)"
                    . ")AUTO_INCREMENT=1 ENGINE=INNODB";
            $con->exec($stmt);
            echo "tb_especies=> criada a tabela com sucesso!<br>";
        } catch (PDOException $e) {
            echo $stmt . "<br>" .$e->getMessage(); 
        }
    }
    /**
     * 
     * 
     */
    public function createTableClientes(){
        try{
            $con=$this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt="use ".$this->nameDB;
            $con->exec($stmt);
            $stmt="";
            $stmt="CREATE TABLE IF NOT EXISTS tb_clientes("
                    . "id int (4) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,"
                    . "razaosocial varchar(30),"
                    . "documento char(30),"
                    . "contato char(30),"
                    . "email varchar(30),"
                    . "cep char(30),"
                    . "endereco varchar(30),"
                    . "bairro varchar(30),"
                    . "cidade varchar(30),"
                    . "uf varchar(2),"
                    . "descricao varchar(255)"
                    . ")AUTO_INCREMENT=1 ENGINE=INNODB";
            $con->exec($stmt);
            echo "tb_clientes=> criada a tabela com sucesso!<br>";
        } catch (PDOException $e) {
            echo $stmt . "<br>" .$e->getMessage(); 
        }
    }
    /**
     * 
     * 
     */
    public function createTableSementes(){
        try{
            $con=$this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt="use ".$this->nameDB;
            $con->exec($stmt);
            $stmt="";
            $stmt="CREATE TABLE IF NOT EXISTS tb_sementes("
                    . "id int (4) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,"
                    . "local varchar(30),"
                    . "especie varchar(30),"
                    . "dt date,"
                    . "cep char(30),"
                    . "endereco varchar(30),"
                    . "bairro varchar(30),"
                    . "cidade varchar(30),"
                    . "uf varchar(2),"                 
                    . "descricao varchar(255)"                   
                    . ")AUTO_INCREMENT=1 ENGINE=INNODB";
            $con->exec($stmt);
            echo "tb_sementes=> criada a tabela com sucesso!<br>";
        } catch (PDOException $e) {
            echo $stmt . "<br>" .$e->getMessage(); 
        }
    }
    /**
     * 
     * 
     */
    public function createTableViveiro(){
        try{
            $con=$this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt="use ".$this->nameDB;
            $con->exec($stmt);
            $stmt="";
            $stmt="CREATE TABLE IF NOT EXISTS tb_viveiro("
                    . "id int (4) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,"
                    . "local varchar(30),"
                    . "nome varchar(30),"
                    . "dt date,"
                    . "manutencao date,"
                    . "cep char(30),"
                    . "endereco varchar(30),"
                    . "bairro varchar(30),"
                    . "cidade varchar(30),"
                    . "uf varchar(2),"
                    . "descricao varchar(255)"
                    . ")AUTO_INCREMENT=1 ENGINE=INNODB";
            $con->exec($stmt);
            echo "tb_viveiro=> criada a tabela com sucesso!<br>";
        } catch (PDOException $e) {
            echo $stmt . "<br>" .$e->getMessage(); 
        }
    }
    /**
     * 
     * 
     */
    public function createTableGerminacao(){
        try{
            $con=$this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt="use ".$this->nameDB;
            $con->exec($stmt);
            $stmt="";
            $stmt="CREATE TABLE IF NOT EXISTS tb_germinacao("
                    . "id int (4) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,"
                    . "especie varchar(30),"
                    . "dt date,"
                    . "qtde int(30),"
                    . "descricao varchar(255)"
                    . ")AUTO_INCREMENT=1 ENGINE=INNODB";
            $con->exec($stmt);
            echo "tb_germinacao=> criada a tabela com sucesso!<br>";
        } catch (PDOException $e) {
            echo $stmt . "<br>" .$e->getMessage(); 
        }
    }
    /**
     * 
     * 
     */
    public function createTableRepicagem(){
        try{
            $con=$this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt="use ".$this->nameDB;
            $con->exec($stmt);
            $stmt="";
            $stmt="CREATE TABLE IF NOT EXISTS tb_repicagem("
                    . "id int (4) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,"
                    . "especie varchar (30),"
                    . "dt date,"
                    . "qtde int(30),"
                    . "material varchar(45),"
                    . "descricao varchar(255)"
                    . ")AUTO_INCREMENT=1 ENGINE=INNODB";
            $con->exec($stmt);
            echo "tb_especies=> criada a tabela com sucesso!<br>";
        } catch (PDOException $e) {
            echo $stmt . "<br>" .$e->getMessage(); 
        }
    }
    /**
     * 
     * 
     */
    public function createTableInsumos(){
        try{
            $con=$this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt="use ".$this->nameDB;
            $con->exec($stmt);
            $stmt="";
            $stmt="CREATE TABLE IF NOT EXISTS tb_insumos("
                    . "id int (4) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,"
                    . "nome varchar(30),"
                    . "categoria varchar(30),"
                    . "tipo varchar(30),"
                    . "qtde int(30),"
                    . "descricao varchar(255)"
                    . ")AUTO_INCREMENT=1 ENGINE=INNODB";
            $con->exec($stmt);
            echo "tb_insumos=> criada a tabela com sucesso!<br>";
        } catch (PDOException $e) {
            echo $stmt . "<br>" .$e->getMessage(); 
        }
    }
    /**
     * 
     * 
     */
    public function createTableDescartes(){
        try{
            $con=$this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt="use ".$this->nameDB;
            $con->exec($stmt);
            $stmt="";
            $stmt="CREATE TABLE IF NOT EXISTS tb_descartes("
                    . "id int (4) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,"
                    . "especie varchar(30),"
                    . "dt date,"
                    . "qtde int(30),"
                    . "motivo varchar(30)"
                    . ")AUTO_INCREMENT=1 ENGINE=INNODB";
            $con->exec($stmt);
            echo "tb_descartes=> criada a tabela com sucesso!<br>";
        } catch (PDOException $e) {
            echo $stmt . "<br>" .$e->getMessage(); 
        }
    }
    /**
     * 
     * 
     *
    public function createTableLotes(){
        try{
            $con=$this->conexaoDB();
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt="use ".$this->nameDB;
            $con->exec($stmt);
            $stmt="";
            $stmt="CREATE TABLE IF NOT EXISTS tb_lotes("
                    . "id int (4) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,"
                    . "especie varchar(30),"
                    . "dt date,"
                    . "qtde int(30),"
                    . ")AUTO_INCREMENT=1 ENGINE=INNODB";
            $con->exec($stmt);
            echo "tb_lotes=> criada a tabela com sucesso!<br>";
        } catch (PDOException $e) {
            echo $stmt . "<br>" .$e->getMessage(); 
        }
    }*/
}
