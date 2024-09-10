<?php

namespace App\Markdown;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\CommonMark\Node\Block\FencedCode;
use League\CommonMark\Extension\CommonMark\Node\Block\IndentedCode;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Node\Block\Paragraph;
use League\CommonMark\Node\Inline\Text;

class CodeTitlesExtension implements ExtensionInterface
{
    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addEventListener(DocumentParsedEvent::class, [$this, 'onDocumentParsed']);
    }

    public function onDocumentParsed(DocumentParsedEvent $event): void
    {
        foreach ($event->getDocument()->iterator() as $node) {
            if (!$node instanceof FencedCode && !$node instanceof IndentedCode) {
                continue;
            }

            $info = $node->getInfo();

            if (strpos($info, ':') !== false) {
                [$language, $title] = explode(':', $info, 2);
                $node->setInfo($language);

                $titleNode = new Paragraph();
                $titleNode->data->set('attributes', ['class' => 'code-title']);
                $titleNode->appendChild(new Text($title));

                $node->insertBefore($titleNode);
            }
        }
    }
}
