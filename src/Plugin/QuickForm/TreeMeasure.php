<?php

namespace Drupal\farm_tree_measure\Plugin\QuickForm;

use Drupal\Component\Datetime\TimeInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\State\StateInterface;
use Drupal\farm_quick\Plugin\QuickForm\QuickFormBase;
use Drupal\farm_quick\Traits\QuickAssetTrait;
use Drupal\farm_quick\Traits\QuickLogTrait;
use Drupal\farm_quick\Traits\QuickQuantityTrait;
use Drupal\farm_quick\Traits\QuickStringTrait;
use Drupal\taxonomy\TermInterface;
use Psr\Container\ContainerInterface;

/**
 * Tree measurement quick form.
 *
 * @QuickForm(
 *   id = "tree_measure",
 *   label = @Translation("Tree measurement"),
 *   description = @Translation("Record a tree growth measurement."),
 *   helpText = @Translation("This form will create an observation log to record measurements of tree growth."),
 *   permissions = {
 *     "create observation log",
 *   }
 * )
 */
class TreeMeasure extends QuickFormBase {

  use QuickLogTrait;
  use QuickQuantityTrait;

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['tree'] = [
      '#type' => 'entity_autocomplete',
      '#title' => $this->t('Tree ID'),
      '#target_type' => 'asset',
      '#target_bundle' => 'plant',
    ];

    $form['dbh'] = [
      '#type' => 'number',
      '#title' => $this->t('Diameter breast height'),
    ];

    $form['vigor'] = [
      '#type' => 'number',
      '#title' => $this->t('Vigor'),
    ];

    $form['setup']['recommendation_files'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Photo upload'),
      '#multiple' => TRUE,
      '#extended' => TRUE,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

  }

}
