<?php

namespace Grav\Plugin\Shortcodes;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;

class BibTeXifyShortcode extends Shortcode
{
    public function init()
    {
        $this->shortcode->getHandlers()->add('bibtexify', function(ShortcodeInterface $sc) {

            // Add assets
            $this->shortcode->addAssets('js', ['jquery', 101]);
            $this->shortcode->addAssets('js', 'plugin://bibtexify/js/bibtexify.js');
            $this->shortcode->addAssets('css', 'plugin://bibtexify/css/bibtexify.css');

            $hash = $this->shortcode->getId($sc);

            $output = $this->twig->processTemplate('partials/bibtexify.html.twig', [
                'hash'      => $hash,
                'params'    => $sc->getParameters(),
                'bibtexify' => $sc,
            ]);

            return $output;
        });
    }
}
