<?php
namespace Src\Classes;

/**
 * @author John Doe <john.doe@example.com>
 * @license http://URL name
 * 
 */


use Src\Traits\TraitUrlParser;

/**
 * Classe de rotas nela é possivel pegar a rota via URL,
 * Nota que essa classe depende do @method parseUrl() que vem de outra classe
 * chamada TraiturlParser;
 * 
 */
class ClassRoutes{
    /**
     * Chama a classe TraitUrlParser
     */
    use TraitUrlParser;
    
    /**
     * @attrib $rota;
     */
    private $Rota;
    
    /**
     * @get Rota();
     * metodo da classe de rotas responsavel por pegar a URL e chamar o controller
     * que indicará a rota da URL requirida.
     */
    public function getRota(){
        $Url=$this->parseUrl();
        $I = $Url[0];
        
        $this->Rota= [
            ""=>"ControllerLogin",
            "login"=>"ControllerLogin", 
            "home"=>"ControllerHome",
            "sitemap"=>"ControllerSitemap",
            "users"=>"ControllerUsers",  
            "clientes"=>"ControllerClientes",           
            "coleta_sementes"=>"ControllerColeta_sementes",           
            "doacao"=>"ControllerDoacao",           
            "especies"=>"ControllerEspecies",           
            "estoque_mudas"=>"ControllerEstoque_mudas",                                
            "relatorioPorData"=>"ControllerRelatorioPorData",                                
            "relatorioPorEspecie"=>"ControllerRelatorioPorEspecie",                                
            "relatorioPorFamilia"=>"ControllerRelatorioPorFamilia",                                                              
            "relatorioGerminacao"=>"ControllerRelatorioGerminacao",                                                              
            "germinacao"=>"ControllerGerminacao",           
            "insumos"=>"ControllerInsumos",           
            "inventario"=>"ControllerInventario",           
            "locais_coleta"=>"ControllerLocais_coleta",                                          
            "repicagem"=>"ControllerRepicagem",          
            "descartes"=>"ControllerDescartes",                                                           
            "controllerUsers"=>"ControllerUsers",
            "database"=>"ControllerDatabase",
            "teste"=>"ControllerTeste",
            "Json"=>"ControllerJson",
            "Acesso_negado"=>"ControllerAcessDenied",
            "logout"=>"ControllerLogout",
            "viveiros"=>"ControllerViveiros"
            
            ];
        if(array_key_exists($I, $this->Rota)){
           if(file_exists(DIRREQ."/app/controller/{$this->Rota[$I]}.php")){
               return $this->Rota[$I];
           }else{
               return "ControllerLogin";
           }                       
        }else{
            return "Controller404";
        }
    }
        
    
    
    
}