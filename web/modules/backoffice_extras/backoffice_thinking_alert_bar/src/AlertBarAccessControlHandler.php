<?php

namespace Drupal\backoffice_thinking_alert_bar;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Alert Bar Message entity.
 *
 * @see \Drupal\backoffice_thinking_alert_bar\Entity\AlertBar.
 */
class AlertBarAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\backoffice_thinking_alert_bar\Entity\AlertBarInterface $entity */

    switch ($operation) {

      case 'view':

        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished alert bar message entities');
        }


        return AccessResult::allowedIfHasPermission($account, 'view published alert bar message entities');

      case 'update':

        return AccessResult::allowedIfHasPermission($account, 'edit alert bar message entities');

      case 'delete':

        return AccessResult::allowedIfHasPermission($account, 'delete alert bar message entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add alert bar message entities');
  }


}
