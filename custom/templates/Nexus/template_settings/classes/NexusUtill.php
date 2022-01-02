<?php

class NexusUtill {

  private static Language $_nexus_language;

  public static function isInstalled() {}

  public static function getLanguage(string $file, string $term): string {
    if (!isset(self::$_nexus_language)) {
        self::$_nexus_language = new Language(ROOT_PATH . '/custom/templates/Nexus/_language', LANGUAGE);
    }
    return self::$_nexus_language->get($file, $term);
  }

  public static function languageFileToSmarty(string $file): array {
    require ROOT_PATH . '/custom/templates/Nexus/_language/' . LANGUAGE . DIRECTORY_SEPARATOR . $file . '.php';
    $result = array();
    foreach ($language as $key => $value) {
      $result[strtoupper($key)] = $value;
    }
    return $result;
  } 

}