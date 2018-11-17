<?php

/**
 * @file
 * File provide class JsonApiEditEntityUrl
 */

namespace Drupal\jsonapi_enhance_entity\Field;

use Drupal\Core\Field\FieldItemList;
use Drupal\Core\TypedData\ComputedItemListTrait;

/**
 * Class JsonApiEditEntityUrl
 * @package Drupal\jsonapi_enhance_entity\Field
 */
class JsonApiEditEntityUrl extends FieldItemList {

  use ComputedItemListTrait;

  public function computeValue() {

    $entity = $this->getEntity();

    if (!$entity->isNew()) {
      $value = $entity->access('edit', NULL, FALSE) ?
        $entity->toUrl('edit-form', ['absolute' => TRUE])
          ->toString() : NULL;
      $this->list[] = $this->createItem(0, $value);
    }
  }
}

