<?php

declare(strict_types=1);

namespace Drupal\simple_dblog_control\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure Not cron messages in watchdog settings for this site.
 */
final class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'simple_dblog_control_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames(): array {
    return ['simple_dblog_control.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {
    $form['channels'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Channels'),
      '#default_value' => $this->config('simple_dblog_control.settings')->get('channels'),
    ];
    $form['strings'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Strings'),
      '#default_value' => $this->config('simple_dblog_control.settings')->get('strings'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state): void {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state): void {
    $this->config('simple_dblog_control.settings')
      ->set('channels', $form_state->getValue('channels'))
      ->set('strings', $form_state->getValue('strings'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
