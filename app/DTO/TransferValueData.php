<?php

namespace App\DTO;

final class TransferValueData implements DataTransferObjectContract
{
    public function __construct(
        public readonly int $source,
        public readonly float $amount,
        public readonly int $target
    ) {
    }

    public static function fromRequest($request)
    {
        return new self(
            $request['source'],
            $request['amount'],
            $request['target'],
        );
    }

    public function toArray(): array
    {
        return [
            'source' => $this->source,
            'amount' => $this->amount,
            'target' => $this->target,
        ];
    }
}
