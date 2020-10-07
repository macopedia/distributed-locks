<?php

defined('TYPO3_MODE') or die();

(static function () {
    // since some environments might not have Redis installed and configured,
    // we do not want to add RedisLockingStrategy for them
    if (is_array($GLOBALS['TYPO3_CONF_VARS']['SYS']['locking']['redis'])) {
        $lockFactory = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Locking\LockFactory::class);
        $lockFactory->addLockingStrategy(\B13\DistributedLocks\RedisLockingStrategy::class);
    }
})();
