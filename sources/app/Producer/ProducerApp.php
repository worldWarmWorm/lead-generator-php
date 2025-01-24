<?php

declare(strict_types=1);

namespace Producer;

use Infrastructure\Contracts\Queue;
use Infrastructure\Definitions;
use LeadGenerator\Generator;
use LeadGenerator\Lead;

final readonly class ProducerApp
{
    public function __construct(private Generator $generator, private Queue $queue) {}

    public function run(): void
    {
        $this->generator->generateLeads(Definitions::LEADS_COUNT, self::handleLead(...));
    }

    private function handleLead(Lead $lead): void
    {
        $this->queue->push($this->leadToString($lead));
    }

    private function leadToString(Lead $lead): string
    {
        return sprintf('%d | %s', $lead->id, $lead->categoryName);
    }
}
