<?php 

//classe dashboard
class Dashboard{

    public $data_inicio;
    public $data_fim;
    public $numeroVendas;
    public $totalVendas;

    public function __get($atributo){
        $this->atributo = $valor;
        return $this;
    }

    public function __set($atributo, $valor){
        $this->atributo = $valor;
        return $this;
    }

}
//classe de conexão bd

class Conexao {
    private $host = 'localhost';
    private $dbname = 'dashboard';
    private $user = 'root';
    private $pass = '';

    public function conectar(){
        try{
            $conexao = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                "$this->user",
                "$this->pass"
            );

            //
            $conexao->exec('set charset utf8');

            return $conexao;

        } catch(PDOException $e){
            echo '<p>'. $e->getMessage() . '</p>';
        }
    }
}

class Bd {
    private $conexao;
    private $dashboard;

    public function __construct(Conexao $conexao,Dashboard $dashboard){
        $this->conexao = $conexao->conectar();
        $this->dashboard = $dashboard;
    }

    
}

$dashboard = new Dashboard();

$conexao = new Conexao();

$bd = new Bd($conexao, $dashboard);


?>