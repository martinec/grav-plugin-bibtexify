<?php
namespace Grav\Plugin;

class BibTeXifyTwigExtension extends \Twig_Extension
{
    /**
     * Returns extension name.
     *
     * @return string
     */
    public function getName()
    {
        return 'BibTeXifyExtension';
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('bibtexify_parsePosition', [$this, 'parsePositionFunc']),
        ];
    }

    public function parsePositionFunc($position)
    {
        preg_match('/(.+), *(.+), *(\w+)/', $position, $matches);

        $position = [
            'location' => 'top:'.$matches[1].';left:'.$matches[2].';',
            'coords'   => isset($matches[3]) ? $matches[3] : 'nw',
            ];

        return $position;
    }

}
