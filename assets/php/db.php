<?php

    define('HOST','localhost');
    define('USER','root');
    define('PASSWORD','');
    define('DB_NAME', 'quemtinhasdb');

    class db {

        public $db;

        // Construtor
        public function __construct(){
            $this->connect();
        }

        // Função conectar
        public function connect(){
            $this->db = new PDO('mysql:host='.HOST .'; dbname='.DB_NAME,USER,PASSWORD);
        }

        // Função get id
        public function get_id(){
            return $this->id;
        }

        public function getAllOngs(){
            $consulta = $this->db->prepare("select * from ong;");
            $consulta->execute();
            $linha = $consulta->fetchAll(PDO::FETCH_OBJ);

            echo("
                <div id='return-button-container'>
                    <a href='../../index.html'>
                        <img src='../img/backarrow.svg'>
                    </a>
                </div>
                </div>
                <div class='outer-container'>
                <header class='header'>
                <h1>Escolha onde quer comer!</h1>
                </header>
                <main class='orgs-display-container'>
            ");
            foreach($linha as $p){
                $total = $p->dailyCapacity - $p->eatingToday;
                echo("
                    <div class='org-container'>
                        <div class='org-name-container'>
                        <p class='org-name-label'>Nome:</p>
                        <p class='org-name-text'>".$p->name."</p>
                        </div>
                        <div class='org-information-container'>
                        <p class='org-label'>Descrição:</p>
                        <p class='org-text'>".$p->description."</p>
                        <p class='org-label'>Endereço:</p>
                        <p class='org-text'>".$p->place."</p>
                        <p class='org-label'>Capacidide diária:</p>
                        <p class='org-text'>".$total."</p>
                        <form action='./iWant.php' method='POST'>
                            <input type='submit' value='Quero comer!' class='iwant-button'/>
                            <input style='display: none;' type='hidden' name='ident' id='ident' value=".$p->id."/>
                        </form>
                        </div>
                    </div>
                ");
            }
            echo("
                </main>
                </div>
            ");
        }

        // Função cadastrar ong
        public function insertOng($ong){
            $save = $this->db->prepare("insert into ong(id,name,description,place,dailyCapacity,eatingToday) values (?,?,?,?,?,?)");
            $save->execute(array($ong->get_id(),$ong->get_name(),$ong->get_desc(),$ong->get_place(),$ong->get_dailyCapacity(),$ong->get_eatingToday()));
            if($save){
                echo("<br>Ok!");
            }else{
                echo("<br> Erro!");
            }
        }

        public function deleteOng($id){
            $delete = $this->db->prepare("delete from ong where id=?");
            $delete->execute(array($id));
            if($delete){
                echo("<br>Ok!");
            }else{
                echo("<br> Erro!");
            }
        }

        // Função "Eu quero"
        public function iWant($id){
            $increment = $this->db->prepare("update ong set eatingToday = eatingToday + 1 where id = ?");
            $increment->execute(array($id));
            if($increment){
                echo("<br>Ok!");
            }else{
                echo("<br> Erro!");
            }
        }
    }
?>