--Primeiro crie a base de dados
CREATE DATABASE IF NOT EXISTS projetoestoque;

--Use a base de dados que foi criada
USE projetoestoque;

--Cria a tabela itens_estoque
CREATE TABLE `itens_estoque` (
  `id_item` INT NOT NULL AUTO_INCREMENT,            
  `nome` VARCHAR(100) NOT NULL,                    
  `quantidade` INT NOT NULL,                       
  `categoria` VARCHAR(50) NOT NULL,                
  `descricao` TEXT NOT NULL,                       
  PRIMARY KEY (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;