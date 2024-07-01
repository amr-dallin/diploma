<?php
declare(strict_types=1);

namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;

/**
 * SetNumbers command.
 */
class SetNumbersCommand extends Command
{
    protected $defaultTable = 'Graduates';

    /**
     * Hook method for defining this command's option parser.
     *
     * @see https://book.cakephp.org/4/en/console-commands/commands.html#defining-arguments-and-options
     * @param \Cake\Console\ConsoleOptionParser $parser The parser to be defined
     * @return \Cake\Console\ConsoleOptionParser The built parser.
     */
    public function buildOptionParser(ConsoleOptionParser $parser): ConsoleOptionParser
    {
        $parser = parent::buildOptionParser($parser);

        return $parser;
    }

    /**
     * Implement this method with your command's logic.
     *
     * @param \Cake\Console\Arguments $args The command arguments.
     * @param \Cake\Console\ConsoleIo $io The console io
     * @return null|void|int The exit code or null for success
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $firstNumberGraduate = $this->fetchTable()->find()
            ->order(['Graduates.number' => 'ASC'])
            ->first();
        
        $graduates = $this->fetchTable()->find()
            ->order(['Graduates.number' => 'ASC']);

        $number = $firstNumberGraduate->number;
        foreach($graduates as $graduate) {
            $graduate->set('number', $number);
            if (!$this->fetchTable()->save($graduate)) {
                $io->error('Danger!!! Failed to change numbers. Try again.');
                exit;
            }
            $number++;
        }
    }
}
