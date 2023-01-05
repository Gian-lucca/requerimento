<?php
/*
|--------------------------------------------------------------------------
| requerimentoForm.php
|--------------------------------------------------------------------------|
| author Gianlucca Augusto <gianlucca.augusto@extreme.digital>
| version 1.0
| copyright Proderj 2022.
*/
 
namespace Drupal\requerimento\Form;

use Drupal\Core\Database\Database;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class requerimentoForm extends FormBase {
    public function getFormId() {
      return 'requerimento_form_id';
    }

    public function buildForm(array $form, FormStateInterface $form_state) {

            $form['title'] = [
              '#type' => 'markup',
              '#markup' => '<h1>Formulário de Requerimento</h1>',
            ];

            $form['dados'] = [
              '#type' => 'markup',
              '#markup' => '<h3>Dados do Concurso</h3>',
            ];

            $form['tipodeatendimento'] = array(
              '#title' => t('Tipo de Atendimento'),
              '#type' => 'select',
              '#required' => TRUE,
              '#description' => '',
              '#options' => array(
                t('Declaração de Aprovação em Concurso'), t('Declaração de Presença em Dia de Prova'),
                t('Correção de Dados Pessoais'),t('Declaração de Participação em Banca Examinadora'),t('Outros')
              ),
              '#attributes'=> [
                'class' => ['inputs']
              ]
            );

            $form['concurso'] = array(
              '#type' => 'textfield',
              '#title' => t('Concurso'),
              '#size' => 60,      
              '#maxlength' => 60,
              '#required' => TRUE,
              '#attributes'=> [
                'placeholder' => '',
                'class' => ['inputs']
              ]
            );

            $form['ano'] = array(
              '#type' => 'textfield',
              '#title' => t('Ano de realização do concurso'),
              '#size' => 60,      
              '#maxlength' => 60,
              '#required' => TRUE,
              '#attributes'=> [
                'placeholder' => '',
                'class' => ['inputs']
              ]
            );

            $form['cargo'] = array(
              '#type' => 'textfield',
              '#title' => t('Nome ou Designação do Cargo/Vaga concorrido'),
              '#size' => 60,      
              '#maxlength' => 60,
              '#required' => TRUE,
              '#attributes'=> [
                'placeholder' => '',
                'class' => ['inputs']
              ]
            );

            $form['incricao'] = array(
              '#type' => 'textfield',
              '#title' => t('Nº da Inscrição'),
              '#size' => 60,
              '#maxlength' => 100,
              '#required' => FALSE,
              '#attributes'=> [
                'placeholder' => '',
                'class' => ['inputs']
              ]
            );
            
            $form['pessoais'] = [
              '#type' => 'markup',
              '#markup' => '<h3>Dados Pessoais</h3>',
            ];

            $form['nome'] = array(
                '#type' => 'textfield',
                '#title' => t('Nome Completo'),
                '#size' => 60,      
                '#maxlength' => 60,
                '#required' => TRUE,
                '#attributes'=> [
                  'placeholder' => 'Nome Completo',
                  'class' => ['inputs']
                ]
            );

            $form['nascimento'] = array(
              '#type' => 'date',
              '#title' => t('Data de Nascimento'),
              '#size' => 60,
              '#maxlength' => 60,
              '#required' => TRUE,
              '#attributes'=> [
                'placeholder' => '00/00/0000',
                'class' => ['inputs']
              ]
            );
            
            $form['nomemae'] = array(
              '#type' => 'textfield',
              '#title' => t('Filiação: Mãe'),
              '#size' => 60,      
              '#maxlength' => 60,
              '#required' => FALSE,
              '#attributes'=> [
                'placeholder' => '',
                'class' => ['inputs']
              ]
            );

            $form['nomepai'] = array(
              '#type' => 'textfield',
              '#title' => t('Filiação: Pai'),
              '#size' => 60,      
              '#maxlength' => 60,
              '#required' => FALSE,
              '#attributes'=> [
                'placeholder' => '',
                'class' => ['inputs']
              ]
            );
            
            $form['civil'] = array(
              '#title' => t('Estado Civil'),
              '#type' => 'select',
              '#required' => TRUE,
              '#description' => '',
              '#options' => array(
                t('Solteiro'), t('Casado'),
                t('Divorciado'),t('Viúvo'),t('Separado Judicialmente'),t('União Estável')
              ),
              '#attributes'=> [
                'class' => ['inputs']
              ]
            );

            $form['RG'] = array(
              '#type' => 'textfield',
              '#title' => t('RG nº'),
              '#size' => 60,
              '#maxlength' => 11,
              '#required' => TRUE,
              '#attributes'=> [
                'placeholder' => '',
                'class' => ['inputs']
              ]
            );

            $form['CPF'] = array(
              '#type' => 'textfield',
              '#title' => t('CPF'),
              '#size' => 60,
              '#maxlength' => 11,
              '#required' => TRUE,
              '#attributes'=> [
                'placeholder' => '',
                'class' => ['inputs']
              ]
            );
            
            $form['endereco'] = [
              '#type' => 'markup',
              '#markup' => '<h3>Endereço</h3>',
            ];

            $form['logradouro'] = array(
              '#type' => 'textfield',
              '#title' => t('Endereço'),
              '#size' => 60,      
              '#maxlength' => 60,
              '#required' => TRUE,
              '#disabled',
              '#attributes'=> [
                'placeholder' => 'Sua Rua',
                'class' => ['inputs']
              ]
            );
        
            $form['bairro'] = array(
              '#id' => 'bairroEl',
              '#type' => 'textfield',
              '#title' => t('Bairro'),
              '#size' => 60,      
              '#maxlength' => 60,
              '#required' => FALSE,
              '#disabled',
              '#attributes'=> [
                'placeholder' => 'Seu Bairro',
                'class' => ['inputs']
              ]
            );
        
            $form['cidade'] = array(
              '#id' => 'cidadeEl',
              '#type' => 'textfield',
              '#title' => t('Cidade'),
              '#size' => 60,      
              '#maxlength' => 60,
              '#required' => FALSE,
              '#disabled',
              '#attributes'=> [
                'placeholder' => 'Sua Cidade',
                'class' => ['inputs']
              ]
            );
        
            $form['estado'] = array(
              '#id' => 'estadoEl',
              '#type' => 'textfield',
              '#title' => t('Estado'),
              '#size' => 60,
              '#maxlength' => 2,
              '#required' => FALSE,
              '#disabled',
              '#attributes'=> [
                'placeholder' => 'Seu Estado',
                'class' => ['inputs']
              ]
            );

            $form['CEP'] = array(
              '#id' => 'cepEl',
              '#type' => 'textfield',
              '#title' => t('Código Postal'),
              '#size' => 60,      
              '#maxlength' => 8,
              '#required' => FALSE,
              '#attributes'=> [
                'placeholder' => '00000-000',
                'class' => ['inputs']
              ]
            );

            $form['contato'] = [
              '#type' => 'markup',
              '#markup' => '<h3>Contato</h3>',
            ];

            $form['telefone'] = array(
              '#type' => 'textfield',
              '#title' => t('Telefone residêncial/celular com DDD'),
              '#size' => 60,
              '#maxlength' => 100,
              '#required' => TRUE,
              '#attributes'=> [
                'placeholder' => 'DDD + Telefone',
                'class' => ['inputs']
              ]
            );

            $form['email'] = array(
                '#type' => 'email',
                '#title' => t('E-mail'),
                '#size' => 60,
                '#maxlength' => 100,
                '#required' => TRUE,
                '#attributes'=> [
                  'placeholder' => 'E-mail válido',
                  'class' => ['inputs']
                ]
            );

            $form['requerimentomsg'] = [
              '#type' => 'markup',
              '#markup' => '<h3>Requerimento</h3>',
            ];

            $form['msg'] = array(
                '#type' => 'textarea',
                '#title' => t('Fundamentação'),
                '#size' => 60,
                '#maxlength' => 1500,
                '#required' => TRUE,
                '#resizable' => 'none',
                '#attributes'=> [
                  'class' => ['inputs'],
                  'placeholder' => 'Mensagem',
                ]
            );

            $form['description'] = [
              '#type' => 'markup',
              '#markup' => '<h3>Declaração de consentimento</h3>',
              '<a href="?page_id=2072" target="_blank" role="link">Ler Declaração de consentimento para tratamento de dados pessoais</a>',
            ];

            $form['declaracao'] = [
              '#type' => 'text',
              '#markup' => '<a href="/declaracao-consentimento">Ler Declaração de consentimento para tratamento de dados pessoais</a>',
            ];

            $form['ciencia'] = [
              '#type' => 'checkbox',
              '#title' => 'Estou ciente'
            ];

            $form['#attributes']['enctype'] = 'multipart/form-data';
            $form['submit'] = array(
              '#type' => 'submit',
              '#value' => t('Enviar'),
              '#attributes'=> [
                'class' => ['botao']
              ]
            );

            $form['#theme'] = 'requerimentoform';
            $form['#attached']['library'] = [
              'requerimento/requerimento_assets',
            ];

        return $form;
    }

   /**
   * @return array
   */
  private function getAllowedFileExtensions(){
    return array('pdf');
  }

  /**
   * @param $entity_type
   * @return string
   */
  public function buildFileLocaton($entity_type){
    // Build file location
    return $entity_type.'/'.date('Y_m_d');
  }

    /**
     * {@inheritdoc}
    */
    public function validateForm(array &$form, FormStateInterface $form_state) {

        //Valida nome 
        $nome = trim($form_state->getValue('nome'));
        
        if (!preg_match("/^([a-zA-Z ]+)$/", $nome)) {
            $form_state->setErrorByName('nome', $this->t('Carateres inválidos no seu nome'));
        }
        
        //Valida email
        $email = trim($form_state->getValue('email'));
    
        if ($email !== '' && !\Drupal::service('email.validator')->isValid($email)) {
        $form_state->setErrorByName('email', $this->t('Endereço de email inválido'));  
        }

        // CPF com caracter não numero
        if (!preg_match("/^([0-9]+)$/", trim($form_state->getValue('CPF')))) {
          $form_state->setErrorByName('CPF', $this->t('CPF Apenas números'));
        }

        // RG com caracter não numero
        if (!preg_match("/^([0-9]+)$/", trim($form_state->getValue('RG')))) {
          $form_state->setErrorByName('RG', $this->t('RG Apenas números'));
        }

        // CEP APENAS NUMEROS
        if (!preg_match("/^([0-9]+)$/", trim($form_state->getValue('CEP')))) {
          $form_state->setErrorByName('CEP', $this->t('CEP Apenas números'));
        }

        // TELEFONE APENAS NUMEROS
        if (!preg_match("/^([0-9]+)$/", trim($form_state->getValue('telefone')))) {
          $form_state->setErrorByName('telefone', $this->t('Telefone Apenas números'));
        }

    }

    /**
     * {@inheritdoc}
    */

    public function submitForm(array &$form, FormStateInterface $form_state) {
        /**
         * Pega os dados do Imput
         */
        $concurso = trim($form_state->getValue('concurso'));
        $ano = trim($form_state->getValue('ano'));
        $cargo = trim($form_state->getValue('cargo'));
        $incricao = trim($form_state->getValue('incricao'));
        $nome = trim($form_state->getValue('nome'));
        $nascimento = trim($form_state->getValue('nascimento'));
        $nomemae = trim($form_state->getValue('nomemae'));
        $nomepai = trim($form_state->getValue('nomepai'));
        $civil = trim($form_state->getValue('civil'));
        $RG = trim($form_state->getValue('RG'));
        $CPF = trim($form_state->getValue('CPF'));
        $logradouro = trim($form_state->getValue('logradouro'));
        $bairro = trim($form_state->getValue('bairro'));
        $cidade = trim($form_state->getValue('cidade'));
        $estado = trim($form_state->getValue('estado'));
        $CEP = trim($form_state->getValue('CEP'));
        $email = trim($form_state->getValue('email'));
        $telefone = trim($form_state->getValue('telefone'));
        $msg = trim($form_state->getValue('msg'));
        $ciencia = trim($form_state->getValue('ciencia'));
    
        $files = $form_state->getValue('files');

        /**
        * Pegando os arquivos
        */
        $filenames = array();
        foreach ($files as $fid) {
        $file = File::load($fid);
        $file->setPermanent();
        $file->save();
        $name = $file->getFilename();
        $url = file_create_url($file->getFileUri());
        $filenames [] = [$name, $url];
        
        }
        /**
         * Pega o email que será enviado 
         */
        $config = $this->config('requerimento.adminsettings');
        $requerimento_admin_email = trim($config->get('requerimento_admin_email'));
        
        if ($requerimento_admin_email) {
            /**
             * Envia email
             */
            $this->logger($str);
            $mail_manager = \Drupal::service('plugin.manager.mail');
            $langcode = \Drupal::currentUser()->getPreferredLangcode();

            $params['message']['concurso'] = $concurso;
            $params['message']['ano'] = $ano;
            $params['message']['cargo'] = $cargo;
            $params['message']['incricao'] = $incricao;
            $params['message']['nome'] = $nome;
            $params['message']['nascimento'] = $nascimento;
            $params['message']['nomemae'] = $nomemae;
            $params['message']['nomepai'] = $nomepai;
            $params['message']['civil'] = $civil;
            $params['message']['RG'] = $RG;
            $params['message']['CPF'] = $CPF;
            $params['message']['logradouro'] = $logradouro;
            $params['message']['bairro'] = $bairro;
            $params['message']['cidade'] = $cidade;
            $params['message']['estado'] = $estado;
            $params['message']['CEP'] = $CEP;
            $params['message']['email'] = $email;
            $params['message']['telefone'] = $telefone;
            $params['message']['msg'] = $msg;
            $params['message']['ciencia'] = $ciencia;
        
            $params['message']['requerimentofiles'] = $filenames;

            
            $to = $requerimento_admin_email;
            //envia email para o email que foi salvo no painel de administrativo
            $result = $mail_manager->mail('requerimento', 'requerimento_notificacao', $to, $langcode, $params, NULL, 'true');
            //envia protocolo para o usuário que solicitou o email
            $result = $mail_manager->mail('requerimento', 'requerimento_protocolo', $email, $langcode, $params, NULL, 'true');
        }

        /**
         * Retorna mensagem Sucesso
         */
        \Drupal::messenger()->addStatus(t('Obrigado ' . $nome . ',sua mensagem foi enviada com sucesso, para seu email!'));
    }
}
