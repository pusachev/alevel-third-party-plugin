<?php
/**
 * @author Pavel Usachev <webcodekeeper@hotmail.com>
 * @copyright Copyright (c) 2019, Pavel Usachev
 */
namespace ALevel\ThirdPartyPlugin\Plugin\Console\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use ALevel\Plugins\Console\Command\PluginTestCommand as Subject;
use ALevel\Plugins\Plugin\Console\Command\AbstractPlugin;

/**
 * Class PluginD
 * @package ALevel\ThirdPartyPlugin\Plugin\Console\Command
 */
class PluginD extends AbstractPlugin
{
    /**
     * @param Subject         $subject
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    public function beforeExecute(
        Subject $subject,
        InputInterface $input,
        OutputInterface $output
    ) {
        $this->displayMessage($output, __METHOD__);
        $this->logMessage(__METHOD__);
    }

    /**
     * @param Subject           $subject
     * @param callable          $proceed
     * @param InputInterface    $input
     * @param OutputInterface   $output
     * @return mixed
     */
    public function aroundExecute(
        Subject $subject,
        callable $proceed,
        InputInterface $input,
        OutputInterface $output
    ) {
        /** Before proceed call */
        $this->displayMessage($output, __METHOD__);
        $this->logMessage(__METHOD__);

        $result = $proceed($input, $output);

        /** After proceed call */
        $this->displayMessage($output);
        $this->logMessage();

        return $result;
    }

    /**
     * @param Subject         $subject
     * @param mixed           $result
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return mixed
     */
    public function afterExecute(
        Subject $subject,
        $result,
        InputInterface $input,
        OutputInterface $output
    ) {
        $this->displayMessage($output, __METHOD__);
        $this->logMessage(__METHOD__);

        return $result;
    }
}
