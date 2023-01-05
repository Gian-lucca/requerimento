<?php  
/*
|--------------------------------------------------------------------------
| requerimentoAdminForm.php
|--------------------------------------------------------------------------|
| author Gianlucca Augusto <gianlucca.augusto@extreme.digital>
| version 1.0
| copyright Proderj 2022.
*/

/**  
 * @file  
 * Contains Drupal\requerimento\Form\requerimentoAdminForm.  
 */  

namespace Drupal\requerimento\Form;  

use Drupal\Core\Form\ConfigFormBase;  
use Drupal\Core\Form\FormStateInterface;  

/**
 * Configuração do formulário de requerimento
 */
class requerimentoAdminForm extends ConfigFormBase {  
  /**  
   * {@inheritdoc}  
   */  
  protected function getEditableConfigNames() {  
    return [  
      'requerimento.adminsettings',  
    ];  
  }  

  /**  
   * {@inheritdoc}  
   */  
  public function getFormId() {  
    return 'requerimento_admin_form';  
  }  
  
  /**  
   * {@inheritdoc}  
   */  
  public function buildForm(array $form, FormStateInterface $form_state) {  
    $config = $this->config('requerimento.adminsettings');  

    $form['requerimento_admin_email'] = array(  
      '#type' => 'email',  
      '#title' => $this->t('Email'),  
      '#description' => $this->t('Endereço de e-mail para o qual os dados do formulário de requerimento devem ser enviados'),  
      '#default_value' => $config->get('requerimento_admin_email'),  
      '#required' => TRUE,
    );
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Salvar'),
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    /**
     * Valida email
     */
    $requerimento_admin_email = trim($form_state->getValue('requerimento_admin_email'));
  
    if ($requerimento_admin_email !== '' && !\Drupal::service('email.validator')->isValid($requerimento_admin_email)) {
      $form_state->setErrorByName('requerimento_admin_email', $this->t('E-mail inválido!'));  
    }
  }

  /**  
   * {@inheritdoc}  
   */  
  public function submitForm(array &$form, FormStateInterface $form_state) {  
    $this->config('requerimento.adminsettings')  
      ->set('requerimento_admin_email', trim($form_state->getValue('requerimento_admin_email')))  
      ->save();  
  }    
}
