<?php
// Arquivo de agendamento de consulta

require_once('globals.php');
require_once('db.php');

require_once('../../Classes/Modelagem/Message.php');
require_once('../../Classes/Modelagem/Agendamento.php');
require_once('../../../controller/DAO/AgendamentoDAO/AgendamentoDAO.php');
require_once('../../../controller/DAO/ClienteDAO/ClienteDAO.php');

$message = new Message($BASE_URL);
$clienteDao = new ClienteDAO($conn, $BASE_URL);
$agendamentoDao = new AgendamentoDAO($conn, $BASE_URL);

$clienteData = $clienteDao->verifyToken();

// Resgata o tipo do formulário
$type = filter_input(INPUT_POST, "type");

// ===== COMEÇO DO AGENDAMENTO =====

if ($type === 'create_appointment') {

    $unidade = filter_input(INPUT_POST, "unidade");
    $servico = filter_input(INPUT_POST, "servico");
    $especialidade = filter_input(INPUT_POST, "especialidade");
    $funcionario = filter_input(INPUT_POST, "funcionario");
    $data = filter_input(INPUT_POST, "data");
    $horario = filter_input(INPUT_POST, "horario");
    $pet = filter_input(INPUT_POST, "pet");

    // Verificação de dados mínimos 
    if (!$unidade || !$servico || !$especialidade || !$funcionario || !$data || !$horario || !$pet) {

        // Enviar uma msg de erro, de dados faltantes
        $message->setMessage("Preencha todos os campos.", "error", "popup", "../../../view/pages/Perfil/agendamento.php");
    } else {
        $agendamento = new Agendamento();

        $agendamento->CodUnidade = $unidade;
        $agendamento->CodServico = $servico;
        $agendamento->CodCliente = $clienteData->codcliente;
        // $agendamento->especialidade = $especialidade;
        $agendamento->CodFuncionario = $funcionario;
        $agendamento->Data = $data;
        $agendamento->Hora = $horario;
        $agendamento->CodAnimal = $pet;
        $agendamento->Cancelado = false;

        $agendamentoDao->create($agendamento, 0);
    }
} else if ($type === 'cancelar') {
    $codagendamento = filter_input(INPUT_POST, "id");
    $agendamentoDao->cancel($codagendamento);

    //Envio do relatorio
} else if ($type === 'enviarrelatorio') {
    // Coleta de informações 
    $codagendamento = filter_input(INPUT_POST, "id");
    $info = filter_input(INPUT_POST, "info");
    
   $agendamento = new Agendamento();

   if (isset($_FILES["pdf"]) && !empty($_FILES["pdf"]["tmp_name"])) {

    $pdf = $_FILES["pdf"];
    // Define os tipos permitidos de arquivo (somente PDF)
    $allowedTypes = ["application/pdf"];

    // Verifica se o tipo do arquivo é válido (PDF)
    if (!in_array($pdf["type"], $allowedTypes)) {
        // Mensagem de erro caso o tipo do arquivo seja inválido
        $message->setMessage("Tipo de arquivo inválido, permitido apenas PDF!", "error", "popup", "back");
    } else {
        // Gera um nome único para o arquivo PDF
        $pdfName = $agendamento->fileGenerateName() . ".pdf";

        // Define o caminho onde o arquivo será salvo
        $uploadPath = "../../../view/assets/img/ArquivosAgendamdento/" . $pdfName;

        // Move o arquivo para o diretório desejado
        if (move_uploaded_file($pdf["tmp_name"], $uploadPath)) {
            // Atualiza a propriedade 'Resultado' com o nome do arquivo PDF
            $agendamento->Resultado = $pdfName;

            // Define o caminho para a cópia do arquivo
            $copyPath = "../../../view/assets/img/ArquivosAgendamdento/copy_" . $pdfName;

            // Verifica se o diretório de destino para a cópia existe, senão cria
            $copyDir = dirname($copyPath); // Obtém o diretório onde a cópia será salva
            if (!is_dir($copyDir)) {
                
                mkdir($copyDir, 0777, true);
            }

            // Usa a função copy() para fazer a cópia do arquivo
            if (copy($uploadPath, $copyPath)) {
                // Mensagem de sucesso: arquivo original e cópia foram salvos
                $message->setMessage("Arquivo PDF carregado e copiado com sucesso!", "success", "popup", "back");
            } else {
                // Mensagem de erro caso a cópia não tenha sido bem-sucedida
                $message->setMessage("Erro ao criar a cópia do arquivo. Tente novamente.", "error", "popup", "back");
            }
        } else {
            // Mensagem de erro caso o upload do arquivo falhe
            
            $message->setMessage("Erro ao fazer upload do arquivo. Tente novamente.", "error", "popup", "back");
        }
    }
}


  if($agendamentoDao->update($agendamento)){
    
    $message->setMessage("Relatório enviado com Sucesso!", "success", "toast", "back");

  }



} else {
    $message->setMessage("Informações inválidas!", "error", "toast", "../../../view/pages/index/index.php");
}
// ===== FIM DO AGENDAMENTO =====