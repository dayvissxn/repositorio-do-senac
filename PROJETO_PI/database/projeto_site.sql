-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: projeto_site
-- ------------------------------------------------------
-- Server version	8.0.37

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_completo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `cpf` varchar(14) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `telefone` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `data_nascimento` text COLLATE utf8mb4_general_ci NOT NULL,
  `genero` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `caminho_curriculo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `caminho_fotoperfil` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `experiencia_antecessora` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (13,'Dayvisson Henrique da Silva','121.232.574-00','aa','(82) 99395-2639','2003-08-04','Masculino',NULL,NULL,'sfasda',''),(14,'dayvissom','121.232.574-11','a','(99) 99999-9999','08/04/2003','Masculino',NULL,NULL,'sfasda',NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vagas`
--

DROP TABLE IF EXISTS `vagas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vagas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` text COLLATE utf8mb4_general_ci,
  `tipo` text COLLATE utf8mb4_general_ci,
  `disponivel` text COLLATE utf8mb4_general_ci,
  `quantidade_vagas` text COLLATE utf8mb4_general_ci,
  `escolaridade` text COLLATE utf8mb4_general_ci,
  `empresa` text COLLATE utf8mb4_general_ci,
  `localidade` text COLLATE utf8mb4_general_ci,
  `carga_horaria` text COLLATE utf8mb4_general_ci,
  `descricao_vaga` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vagas`
--

LOCK TABLES `vagas` WRITE;
/*!40000 ALTER TABLE `vagas` DISABLE KEYS */;
INSERT INTO `vagas` VALUES (9,'OPERADOR DE CAIXA','CLT','Disponível até 10/09','1 vaga','Ensino Médio','CIMEC COMERCIO, SERVICOS, IMPORTACAO E EXPORTACAO LTDA','Arapiraca - AL','6 horas','1. **Registro de Vendas**: - Escanear produtos e inserir manualmente os preços no sistema. - Verifique se os códigos de barras estão legíveis e corrija problemas quando necessário. 2. **Processamento de Pagamentos**: - Receber pagamentos em diversas formas: dinheiro, cartões de crédito/débito, vales e outros meios eletrônicos. - Emitir recibos e notas fiscais para os clientes. 3.'),(11,'AUXILIAR CONTÁBIL','Contrato','Disponível até 09/09','1 vaga','Superior','THOMPSON CONSULTORES','Arapiraca - AL','4:20 horas','Há 36 anos plantamos as sementes de uma bela história com a fundação da Thompson consultores. E durante todo esse tempo, nossa trajetória foi repleta de desafios e vitórias, em um universo que até hoje nos fascina, o mundo da engenharia. Somos projetistas, gerenciadores de obras apaixonados pela nossa atividade, afinal, é um privilégio contribuir para a implantação de obras cada vez mais necessárias para a sobrevivência e o bem-estar do ser humano.\r\n\r\n\r\nAtuamos em mais de 15 países nos segmentos de Água e energia, Infraestrutura e Óleo & Gás. E em cada uma dessas unidades de negócio contamos com líderes determinados a entregar as melhores soluções, porque esse é o jeito Intertechne de fazer acontecer.'),(12,'AUXILIAR DE PRODUÇÃO','CLT','Disponível até 20/10','5 vagas','Ensino médio','SOLITO ALIMENTOS','Arapiraca - AL','8 horas','Responsável por carregar, descarregar e empacotar manualmente mercadorias da empresa.\r\nPaletizar produtos manualmente.\r\nE algumas outras necessidades da empresa.'),(15,'VENDEDORA','Temporario','Disponível até 18/10','2 vagas','Ensino médio','FULECOS','Arapiraca - AL','8 horas','Se você possui experiência em vendas e está em busca de uma chance no mercado de trabalho, estamos com oportunidade em aberto para atuar na Zona Oeste de Arapiraca.\r\nBuscamos pessoas para realizar vendas de produtos com desenvoltura e profissionalismo, gerenciar as próprias vendas e metas atribuídas pela gerência e diretoria.'),(16,'PRODUCT OWNER','CLT','Disponível até 30/10','1 vaga','Superior','GESTÃO CLICK','Arapiraca - AL','7 horas','Responsabilidades:\r\nVisão Estratégica: Definir a visão de produto, a estratégia de roadmap e o posicionamento competitivo dos nossos produtos ERP SaaS.\r\nGerenciamento de Backlog: Criar, priorizar e manter o backlog de produtos, alinhando as necessidades dos clientes e do mercado com as capacidades da equipe de desenvolvimento.\r\nColaboração com a Equipe: Trabalhar em estreita colaboração com as equipes de desenvolvimento, design e qualidade para garantir a entrega de produtos de alta qualidade e valor.\r\nGestão de Stakeholders: Interagir com diversas partes interessadas, como clientes, equipe de vendas, executivos e outras áreas da empresa, para coletar feedback e garantir o alinhamento das expectativas.\r\nAnálise de Mercado: Realizar pesquisas de mercado, analisar dados de mercado e acompanhar as tendências do setor para identificar oportunidades de crescimento e inovação.\r\nMetrização e Otimização: Definir e acompanhar métricas de sucesso do produto, utilizando dados para tomar decisões estratégicas e otimizar o desempenho do produto.\r\nCultura Ágil: Promover a cultura ágil dentro da equipe, facilitando as cerimônias ágeis e incentivando a colaboração e a autonomia.'),(17,'DESENVOLVERDOR SOFT','PJ','Disponível até 20/10','4 vagas','Superior','RAMO SISTEMAS DIGITAIS LTDA','Arapiraca - AL','6 Horas','Será responsável por desenvolver soluções voltadas para o SAP Business One onde trabalhará em contato com o cliente para participar do levantamento processual e posteriormente desenvolverá a solução de modo a garantir sua eficácia e funcionamento em produção. Em paralelo, você irá fazer parte de um ambiente de trabalho colaborativo onde será exposto à diversos nichos de processos de um ERP e terá oportunidade de aprender sobre eles.'),(18,'CONSULTOR DE VIAGENS','Contrato','Disponível até 09/09','3 vagas','Ensino Médio','BEST WAY TRIPS AGENCIA DE VIAGENS E TURISMO LTDA','Arapiraca - AL','8 Horas','A BWT Operadora é uma das empresas do grupo de turismo Serra Verde Express. Em 1996, a BWT foi fundada, em conjunto com a Serra Verde, concessionária do Governo Federal, nos trens turísticos da Serra do Mar do Paranaense.\r\nA partir de 2011, a BWT ampliou o seu portfólio e passou a disponibilizar produtos para destinos turísticos de todo o mundo. Atualmente, conta com escritórios em Curitiba (PR), Joinville (SC), Manaus (AM), Porto Alegre e Vitória (ES), e com mais de 80 profissionais qualificados, prontos para operar roteiros personalizados, sejam eles nacionais ou internacionais. Com isso, vem sendo referência em qualidade, credibilidade e diversidade em serviços, atuando no ramo de distribuição de produtos e serviços de turismo.'),(19,'ANALISTA ADMINISTRATIVO','CLT','Disponível até 10/08','5 vagas','Ensino médio','MACEDO RH','Arapiraca - AL','6 horas','Atividades:   \r\nAtuar em diferentes áreas administrativas com foco em RH e financeiro;\r\nAtuar com processos de recrutamento e seleção;\r\nRealizar fechamento de folha de pagamento;\r\nRealizar demandas de Departamento Pessoal (ponto, banco de horas, atestados, etc)\r\nOrganizar documentos financeiros e fiscais;');
/*!40000 ALTER TABLE `vagas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-02 18:38:15
