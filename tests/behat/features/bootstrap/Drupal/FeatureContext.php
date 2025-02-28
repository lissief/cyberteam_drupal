<?php

namespace Drupal;

use Drupal\DrupalExtension\Context\RawDrupalContext;

/**
 * FeatureContext class defines custom step definitions for Behat.
 */
class FeatureContext extends RawDrupalContext {

  /**
   * Every scenario gets its own context instance.
   *
   * You can also pass arbitrary arguments to the
   * context constructor through behat.yml.
   */
  public function __construct() {

  }

  /**
   * Waits a while, for debugging.
   *
   * @param int $seconds
   *   How long to wait.
   *
   * @When I wait :seconds second(s)
   */
  public function wait($seconds) {
    sleep($seconds);
  }

  /**
  * @Given I click the :arg1 element
  */
  public function iClickTheElement($selector)
  {
    $page = $this->getSession()->getPage();
    $element = $page->find('css', $selector);

    if (empty($element)) {
        throw new Exception("No html element found for the selector ('$selector')");
    }

    $element->click();
  }

}
