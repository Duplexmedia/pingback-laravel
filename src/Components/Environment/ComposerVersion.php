<?php

namespace Duplexmedia\Pingback\Components\Environment;

use Symfony\Component\Process\Process;

class ComposerVersion
{
    /*
     * @toDo Implement logic to define custom binary or null (from config?)
     */
    public function get(): string
    {
        $composerProcess = new Process(['composer', '-V']);
        $composerProcess->run();

        return $this->extractVersionNumber($composerProcess->getOutput());
    }

    private function extractVersionNumber($composerProcessOutput)
    {
        return explode(' ', $composerProcessOutput)[2] ?? null;
    }
}
